{{-- Import Data Beneficiaries Modal  --}}
<div class="modal fade modal-light import-modal" aria-hidden="true" aria-labelledby="exampleOptionalSmall" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-simple">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="exampleOptionalSmall"><i class="icon ti-alert"></i>Import Beneficiaries</h4>
        </div>
        <div class="modal-body">
            <p class="pt-10 text-default text-dark">Please Upload the Excel Sheet to import to database of beneficiaries.</p>
            <form action="{{ route('import.beneficiaries') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="attachment" type="file" id="input-file-now" data-plugin="dropify" />
            <button type="submit" class="btn btn-danger">Import</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close">Dismiss</button>
            </form>
        </div>
        </div>
    </div>
</div>
{{-- Import Data Beneficiaries Modal --}}