@extends('template')
@extends('templates.cabeceras')
@extends('templates.menutop')
@extends('templates.menu')
@extends('templates.central')
@extends('templates.pie')
@extends('templates.scripts')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Tablas</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 text-right">
              <button class="btn btn-success m-1" data-toggle="modal" data-target="#crear"><i class="fa fa-plus"></i>Crear nuevo</button>
            </div>
            <div class="col-12">
  
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><i class="fa fa-file"></i> Titulo Caja</h3>
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Contraseña</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                                   

                
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  <!-- Modificar -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{ route('adm') }}">
            @csrf
            @method('POST')
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Usuario</label>
                  <div class="col-sm-10">
                      <input type="text" id="user_id" name="id" hidden>
                    <input type="text" class="form-control" name="Usuario_Usuario" id="usuario" placeholder="Password">
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
        </form>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Crear -->
  <div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear usuarios</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('adminsert') }}">
            @csrf
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Usuario</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Usuario_Usuario" id="usuario" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Password_Usuario" id="usuario" placeholder="Password">
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    
      <script>
          //console.log('aa');0
          window.onload=function(){
            var table =$("#example1").DataTable({
              "ajax": '/contenido_datatables',
              "columns":[
                {data:'Usuario_Usuario'},
                {data:'Password_Usuario'},
                {data:'Estado_Usuario'},
                {"defaultContent": "<button>Click!  </button>"}
              ],
              "order": [[ 0, "desc" ]],
              "responsive": true,
              "autoWidth": false,
              "language": {
                    "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
              }
            });
            $('#example1 tbody').on( 'click', 'button', function () {
                var data = table.row( $(this).parents('tr') ).data();
                alert( data.Id_Usuario +"'s salary is: "+ data.Id_Usuario );
            } );
            $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id');
            var usuario = button.data('usuario');
                $('#usuario').val(usuario);
                $('#user_id').val(id);
            })
          }
          
      </script>


@endsection

