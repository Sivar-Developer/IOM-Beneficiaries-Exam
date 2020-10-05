<?php

namespace App\Http\Controllers;

use App\Approval;
use App\Beneficiary;
use Illuminate\Http\Request;
use App\Http\Requests\RejectApprovalRequest;

class ApprovalController extends Controller
{
    public function storeApprove(Beneficiary $beneficiary)
    {
        Approval::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'beneficiary_id' => $beneficiary->id,
                'is_approved' => true,
                'justification' => ''
            ]
        );

        return redirect()->back()->with('msg', 'Beneficiary ('.$beneficiary->name.') has been approved.');
    }

    public function storeReject(RejectApprovalRequest $request, Beneficiary $beneficiary)
    {
        Approval::updateOrCreate(
            ['beneficiary_id' => $beneficiary->id],
            [
                'beneficiary_id' => $beneficiary->id,
                'is_approved' => false,
                'justification' => request('justification')
            ]
        );

        return redirect()->back()->with('error', 'Beneficiary ('.$beneficiary->name.') has been rejected.');
    }
}
