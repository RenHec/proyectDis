@extends('layouts.app', ['activePage' => 'notes', 'titlePage' => __('Notas')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card card-nav-tabs">
            <h4 class="card-header card-header-success text-uppercase">Persona agregadas en el sistema</h4>
            <div class="card-body">
              @can('Crear Personas')
                <h4 class="card-title text-right text-uppercase"><a class="btn btn-info" data-backdrop="static" data-keyboard="false" href="javascript:void(0)" id="createPerson">Crear</a></h4>                
              @endcan
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

      <div class="row">
          <div class="modal fade bd-example-modal-lg" id="personModel" aria-hidden="true">
              <div class="modal-dialog modal-lg">  
                  <div class="modal-content">          
                      <div class="modal-header">          
                          <h4 class="modal-title text-uppercase" id="modelHeading"></h4>   
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="material-icons">clear</i></button>       
                      </div>
          
                      <div class="modal-body">          
                          <form id="personForm" name="personForm" class="form-horizontal">     
                            <div class="row">      
                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="cui" name="cui" placeholder="Número de DPI (CUI)" value="">
                                </div>
                              </div>   
                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico" value="">
                                </div>
                              </div>                                 
                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="name_one" name="name_one" placeholder="Primer nombre" value="">
                                </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="name_two" name="name_two" placeholder="Segundo nombre" value="">
                                </div>
                              </div>  
                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="last_name_one" name="last_name_one" placeholder="Primer apellido" value="">
                                </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="last_name_two" name="last_name_two" placeholder="Segundo apellido" value="">
                                </div>
                              </div>   
                              <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                  <select class="selectpicker text-uppercase" id="municipalities_id" name="municipalities_id" data-live-search="true">
                                    <option value="default">Seleccionar uno</option>
                                    @foreach ($municipios as $municipio)
                                      <option value="{{ $municipio->id }}">{{ $municipio->name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>   
                              <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                  <input type="text" class="form-control" id="direction" name="direction" placeholder="Dirección" value="">
                                </div>
                              </div>                                                           
                              <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                  <select class="selectpicker text-uppercase" id="gender" name="gender" data-live-search="true">
                                    <option value="default">Seleccionar uno</option>
                                    <option value="MASCULINO">Masculino</option>
                                    <option value="FEMENINO">Femenino</option>
                                  </select>
                                </div>
                              </div>                                                                                         
                            </div>                        
                            <hr>
                            <div class="row">
                              <div class="col-sm-6 text-left"><button type="reset" class="btn btn-danger" id="cancelBtn" value="cancel">Cancelar</button></div>
                              <div class="col-sm-6 text-right"><button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar</button></div>             
                            </div>
                          </form>   
                      </div>    
                  </div>          
              </div>
          </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script type="text/javascript">
    var formulario = "#personForm";
    var registro = {};
    var id = 0;

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
                { data: 'accion', name: 'accion', orderable: false, searchable: false},
            ]
        });  
        
        //Validar formulario Persona    
        $(formulario).validate({
          rules: {
            cui: {required: true, digits: true, rangelength: [13, 13]},
            email: {required: true, maxlength: 75, email: true},
            name_one: {required: true, maxlength: 40, minlength: 3, alfaOespacio: true},
            name_two: {required: false, maxlength: 40, alfaOespacio: true},
            last_name_one: {required: true, maxlength: 40, minlength: 3, alfaOespacio: true},
            last_name_two: {required: false, maxlength: 40, alfaOespacio: true},
            municipalities_id: {valueNotEquals: 'default'},
            direction: {required: false, maxlength: 150},
            gender: {valueNotEquals: 'default'},
          }
        });  
      
        $('#createPerson').click(function () {
          $(formulario).validate().resetForm()
          $(formulario)[0].reset();
          $('#modelHeading').html("Crear registro");
          $('#personModel').modal({backdrop: 'static', keyboard: false})
          $(".loader").show();

        }); 

        $('body').on('click', '.editPerson', function () {
          var registro = $(this).data('id');
          console.log(registro)
          $(formulario).validate().resetForm()
          $(formulario)[0].reset();
          $('#modelHeading').html("Editar registro");
          $('#personModel').modal({backdrop: 'static', keyboard: false})

          $('#cui').val(registro.cui);
          $('#email').val(registro.email);
          $('#name_one').val(registro.name_one);
          $('#name_two').val(registro.name_two);
          $('#last_name_one').val(registro.last_name_one);
          $('#last_name_two').val(registro.last_name_two);
          $('#municipalities_id').val(registro.municipalities_id.id);
          $('#direction').val(registro.direction);
          $('#gender').val(registro.gender);
        });        
        
        $('#cancelBtn').click(function () {
          $(formulario).validate().resetForm()
          $(formulario)[0].reset();
        });       
        
        $('#saveBtn').click(function (e) {  
          if($(formulario).valid())   
          {
            if(id > 0)
              update()
            else
              store()
          }
          console.log($(formulario).valid())
        }); 
    }); 
    
    function store()
    {

    }

    function update()
    {

    }
  </script>  
@endpush