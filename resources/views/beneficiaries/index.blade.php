@extends('layouts.application')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                          <table class="table table-hover dataTable table-striped w-full" id="beneficiaries-table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Gender</th>
                                <th>Martial Status</th>
                                <th>Phone Number</th>
                                <th>Score</th>
                                <th>Created At</th>
                                {{-- <th>Updated At</th> --}}
                                <th>Action</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @foreach(App\Beneficiary::all() as $beneficiary)
        @include('beneficiaries.delete', $beneficiary)
    @endforeach

@endsection

@push('scripts')
@include('layouts.modules.tabs-accordions.scripts')
@include('layouts.modules.datatable.scripts')
<script>
$(document).ready( function () {
  var table = $('#beneficiaries-table').DataTable({
      dom: 'Bfrtip',
      processing: true,
      serverSide: true,
      ajax: '{!! route('beneficiaries.datatable') !!}',
      columns: [
          {data: 'id', name: 'id'},
          {
            data: 'photo',
            orderable: false,
            render: function (data) {
              console.log(data)
              return `<img src="${data}" class="img-fluid avatar" />`
            }
          },
          {data: 'name', name: 'name'},
          {data: 'birthdate', name: 'birthdate'},
          {data: 'gender', name: 'gender'},
          {data: 'martial_status', name: 'martial_status'},
          {data: 'phone_number', name: 'phone_number'},
          {data: 'score', name: 'score'},
          {data: 'created_at', name: 'created_at'},
        //   {data: 'updated_at', name: 'updated_at'},
          {
            data: 'id',
            orderable: false,
            render: function (data) {
              console.log(data)
              return `<a href="/beneficiaries/${data}" class="btn btn-sm btn-light"><i class="icon wb-eye"></i> Details</a>
                    <a href="/beneficiaries/${data}/edit" class="btn btn-sm btn-light"><i class="icon wb-pencil"></i> Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" title="Delete Beneficiary Permanently" data-target=".delete${data}" data-toggle="modal"><i class="icon wb-trash" aria-hidden="true"></i> Delete</button>
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
