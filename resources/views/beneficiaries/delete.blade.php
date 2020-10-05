{{-- Delete Modal  --}}
<div class="modal fade modal-danger delete{{ $beneficiary->id }}" aria-hidden="true" aria-labelledby="exampleOptionalSmall" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple modal-sm modal-center">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleOptionalSmall"><i class="icon ti-alert"></i>Delete Beneficiary</h4>
        </div>
        <div class="modal-body">
            <p class="pt-10 text-default text-dark">Enter Your password below, and the beneficiary profile will be <b style="font-weight: bold;">Deleted Permanently</b></p>
            <form action="{{ route('beneficiaries.destroy',$beneficiary->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-danger">Confirm</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Dismiss</button>
            </form>
        </div>
        </div>
    </div>
</div>
{{-- Delete Modal --}}