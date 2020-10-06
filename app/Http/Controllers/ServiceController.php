<?php

namespace App\Http\Controllers;

use App\Service;
use App\Beneficiary;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function attach(Request $request, Beneficiary $beneficiary)
    {
        if(request('training_session') || request('training_session')) { $beneficiary->services()->detach(); }
        request('training_session') ? $beneficiary->services()->attach(1, ['mark' => request('training_session')]) : null;
        request('shelter_rehabilitation') ? $beneficiary->services()->attach(2, ['mark' => request('shelter_rehabilitation')]) : null;

        return redirect()->route('beneficiaries.show', $beneficiary->id)->with('msg', 'Beneficiary ('.$beneficiary->name.') services has been attached.');
    }
}
