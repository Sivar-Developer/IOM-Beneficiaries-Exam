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
                          <h3 class="panel-title">List of Open Reviews</h3>
                        </header>
                        <div class="panel-body">
                          <table class="table table-hover dataTable table-striped w-full" id="open-feedback">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Created At</th>
                                <th>Updated At</th>
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
@endsection

@push('scripts')
@include('layouts.modules.tabs-accordions.scripts')
@include('layouts.modules.datatable.scripts')
<script>
$(document).ready( function () {
  var table = $('#open-feedback').DataTable({
      dom: 'Bfrtip',
      processing: true,
      serverSide: true,
      ajax: '{!! route('beneficiaries.datatable') !!}',
      columns: [
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
          {data: 'birthdate', name: 'birthdate'},
          {data: 'created_at', name: 'created_at'},
          {data: 'updated_at', name: 'updated_at'},
          {
            data: 'id',
            orderable: false,
            render: function (data) {
              console.log(data)
              return `<div class="text-center">
                        <a href="${data}" class="btn btn-light"><i class="icon wb-eye"></i> Review</a>
                      </div>`
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
