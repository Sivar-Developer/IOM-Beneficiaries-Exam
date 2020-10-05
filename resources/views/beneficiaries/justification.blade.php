{{-- Justification Modal  --}}
<div class="modal fade modal-light reject{{ $beneficiary->id }}" aria-hidden="true" aria-labelledby="exampleOptionalSmall" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleOptionalSmall"><i class="icon ti-alert"></i>Reject</h4>
        </div>
        <div class="modal-body">
            <p class="pt-10 text-default text-dark">Please write a justification for beneficiary <b>({{ $beneficiary->name }})</b> reject</p>
            <form action="{{ route('beneficiaries.store.rejected', $beneficiary->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="justification">Justification</label>
                <textarea class="form-control" name="justification" id="justification" cols="15" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-danger">Confirm Reject</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Dismiss</button>
            </form>
        </div>
        </div>
    </div>
</div>
{{-- Justification Modal --}}