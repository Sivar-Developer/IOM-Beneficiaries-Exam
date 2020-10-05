<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Beneficiary Approval</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            @if($beneficiary->approval)
                <div class="col-sm-3 mb-20 font-weight-600">Status:</div>
                <div class="col-sm-9 mb-20">{{ $beneficiary->approval->isApproved() }}</div>
                @if($beneficiary->approval->justification)
                <div class="col-sm-3 mb-20 font-weight-600">Justification:</div>
                <div class="col-sm-9 mb-20">{{ $beneficiary->approval->justification }}</div>
                @endif
            @else
            <div class="button-group">
                <form action="{{ route('beneficiaries.store.approved', $beneficiary->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success"><i class="icon wb-check" aria-hidden="true"></i> Approve</button>
                    <button type="button" class="btn btn-danger" title="Reject Beneficiary" data-target=".reject{{ $beneficiary->id }}" data-toggle="modal"><i class="icon wb-close" aria-hidden="true"></i> Reject</button>
                </form>
                @include('beneficiaries.justification', $beneficiary)
            </div>
            @endif
        </div>
    </div>
</div>