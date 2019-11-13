@extends('layouts.app', ['activePage' => 'notes', 'titlePage' => __('Notas')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="card card-nav-tabs">
          <h4 class="card-header card-header-success text-uppercase">Persona agregadas en el sistema</h4>
          <div class="card-body">
            <h4 class="card-title text-right text-uppercase"><a class="btn btn-info " href="javascript:void(0)" id="createNewProduct">Crear</a></h4>
            <br>
            <div class="col-md-12">
              <table class="table table-striped table-no-bordered table-hover dataTable dtr-inline" style="font-size:12px;" id="users-table">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase">DPI</th>
                        <th class="text-center text-uppercase">Persona</th>
                        <th class="text-center text-uppercase">Email</th>                        
                        <th class="text-center text-uppercase">Dirección</th>
                        <th class="text-center text-uppercase">Fecha de creación</th>
                        <th class="text-center text-uppercase">Opciones</th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script type="text/javascript">
    $(function () {
      $.ajaxSetup({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
      });
    
      var table = $('#users-table').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
            ajax: '{!! route('persons.anyData') !!}',
            columns: [
                { data: 'cui', name: 'cui' },
                { data: 'name_one', name: 'name_one'},
                { data: 'email', name: 'email'},
                { data: 'municipality.name', name: 'municipality.name'},
                { data: 'created_at', name: 'created_at' },
                {data: 'accion', name: 'accion', orderable: false, searchable: false},
            ]
        });
    });
  
  </script>  
@endpush