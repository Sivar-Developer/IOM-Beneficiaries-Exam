<?php

namespace App\Http\Controllers;

use App\Beneficiary;
use Illuminate\Http\Request;
use App\Http\Requests\BeneficiaryStoreRequest;
use App\Http\Requests\BeneficiaryUpdateRequest;
use DataTables;
use Hash;
use Auth;
use App\Exports\BeneficiaryExport;
use App\Imports\BeneficiaryImport;
use Excel;

class BeneficiaryController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('beneficiaries.index');
    }

    public function datatable()
    {
        return DataTables::of(Beneficiary::all())
            ->setRowId('id')
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beneficiaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeneficiaryStoreRequest $request)
    {
        $filename = NULL;

        if ($request->hasFile('photo'))
        {
            $file=request()->file('photo');
            $filename=uniqid().'.'.$file->guessClientExtension();
            $moved = $file->move('contents/photos', $filename);
            $path=public_path().'/contents/photos/'.$filename;
        }

        $data = $request->except('photo');
        if($filename) {
            $data['photo'] = $filename;
        }

        Beneficiary::create($data);

        return redirect()->route('beneficiaries.index')->with('msg', 'Beneficiary ('.request('name').') has been updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiary $beneficiary)
    {
        // dd($beneficiary->services);
        return view('beneficiaries.show', compact('beneficiary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiary $beneficiary)
    {
        return view('beneficiaries.edit', compact('beneficiary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function update(BeneficiaryUpdateRequest $request, Beneficiary $beneficiary)
    {
        $filename = NULL;
        if ($request->hasFile('photo'))
        {
            $file=request()->file('photo');
            $filename=uniqid().'.'.$file->guessClientExtension();
            $moved = $file->move('contents/photos', $filename);
            $path=public_path().'/contents/photos/'.$filename;
        }

        $data = $request->except('photo');
        if($filename) {
            $data['photo'] = $filename;
        }

        $beneficiary->update($data);

        return redirect()->back()->with('msg', 'Beneficiary ('.$beneficiary->name.') has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Beneficiary $beneficiary)
    {
        if(Hash::check(request('password'), Auth::user()->password)) {
            $beneficiary->delete();
            return redirect()->route('beneficiaries.index')->with('msg','Beneficiary has been Deleted');
        } else {
            return redirect()->route('beneficiaries.index')->with('error','Unauthorized action due to incorrect credentials');
        }
    }

    public function bulkDestroy(Request $request)
    {
        $this->validate($request, ['ids' => 'required'],['ids.required' => 'Please select the beneficiaries to delete.']);

        Beneficiary::destroy(request('ids'));

        return redirect()->route('beneficiaries.index')->with('msg','Beneficiaries has been Deleted');
    }

    public function services(Beneficiary $beneficiary)
    {
        return view('beneficiaries.services', compact('beneficiary'));
    }

    public function export() 
    {
        return Excel::download(new BeneficiaryExport, 'beneficiaries.xlsx');
    }

    public function import()
    {
        Excel::import(new BeneficiaryImport, request()->file('attachment'));

        return redirect()->back()->with('msg', 'Beneficiaries Imported to the database successfully.');
    }
}
