@extends('layouts.application')

@push('head')
@include('layouts.modules.file-upload.head')
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.partials.alert')
            <div class="card">
                <div class="card-header">{{ __('Beneficiaries List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel">
                        <header class="panel-heading">
                          <div class="panel-actions"></div>
                          <h3 class="panel-title">List of Beneficiaries</h3>
                        </header>
                        <div class="panel-body">
                          <form action="{{ route('beneficiaries.destroy.bulk') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="button-group mb-10 ml-15">
                              <a href="{{ route('export.beneficiaries') }}" class="btn btn-default">Excel Export</a>
                              <button class="btn btn-default" data-target=".import-modal" data-toggle="modal" >Excel Import</button>
                              <button type="submit" class="btn btn-danger">Bulk Delete</button>
                            </div>
                            <table class="table table-hover dataTable table-striped w-full" id="beneficiaries-table">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>ID</th>
                                  <th>Photo</th>
                                  <th>Name</th>
                                  {{-- <th>Birthdate</th> --}}
                                  <th>Gender</th>
                                  <th>Martial Status</th>
                                  <th>Age</th>
                                  <th>Employment</th>
                                  <th>Phone Number</th>
                                  <th>Score</th>
                                  <th>Created At</th>
                                  {{-- <th>Updated At</th> --}}
                                  <th>Action</th>
                                </tr>
                              </thead>
                            </table>
                          </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('beneficiaries.import')

    @foreach(\App\Beneficiary::all() as $beneficiary)
        @include('beneficiaries.delete', $beneficiary)
    @endforeach

@endsection

@push('scripts')
@include('layouts.modules.file-upload.scripts')
@include('layouts.modules.datatable.scripts')
<script>
$(document).ready( function () {
  var table = $('#beneficiaries-table').DataTable({
      dom: 'Bfrtip',
      processing: true,
      serverSide: true,
      ajax: '{!! route('beneficiaries.datatable') !!}',
      columns: [
        {
            data: 'id',
            orderable: false,
            render: function (data) {
                if(data != null) {
                    return `
                    <div class="checkbox-success">
                      <input type="checkbox" id="beneficiaries-delete" name="ids[]" value="${data}">
                    </div>
                    `
                } else {
                    return null;
                }
            }
          },
          {data: 'id', name: 'id'},
          {
            data: 'photoPath',
            orderable: false,
            render: function (data) {
                if(data != null) {
                    return `<img src="${data}" class="img-fluid avatar" />`
                } else {
                    return null;
                }
            }
          },
          {data: 'name', name: 'name'},
        //   {data: 'birthdate', name: 'birthdate'},
          {data: 'gender', name: 'gender'},
          {data: 'martial_status', name: 'martial_status'},
          {data: 'age', name: 'age'},
          {data: 'employment', name: 'employment'},
          {data: 'phone_number', name: 'phone_number'},
          {data: 'score', name: 'score'},
          {data: 'created_at', name: 'created_at'},
        //   {data: 'updated_at', name: 'updated_at'},
          {
            data: 'id',
            orderable: false,
            render: function (data) {
              return `<a href="/beneficiaries/${data}" class="btn btn-sm btn-light"><i class="icon wb-eye"></i></a>
                    <a href="/beneficiaries/${data}/edit" class="btn btn-sm btn-light"><i class="icon wb-pencil"></i></a>
                    <button type="button" class="btn btn-sm btn-danger" title="Delete Beneficiary Permanently" data-target=".delete${data}" data-toggle="modal"><i class="icon wb-trash" aria-hidden="true"></i></button>
                    <a href="/beneficiaries/${data}/services" class="btn btn-sm btn-light" title="Services"><i class="icon wb-settings"></i></a>
                    `
            }
          }
      ],
      lengthMenu: [
          [ 10, 25, 50, -1 ],
          [ '10 rows', '25 rows', '50 rows', 'Show all' ]
      ],
      // select: false,
      buttons: ['pageLength', 'copy', 'csv', 'excel', 'pdf', 'print'],
    });
});
</script>
@endpush
