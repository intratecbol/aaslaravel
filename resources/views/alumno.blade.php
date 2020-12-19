@extends('template')
@extends('templates.cabeceras')
@extends('templates.menutop')
@extends('templates.menu')
@extends('templates.central')
@extends('templates.pie')
@extends('templates.scripts')
<?php
 $Titulo_Modulo='<i class="fa fa-users"></i> Alumnos';
 $Modulo='Alumnos';
 $Titulo_Listado='Listado de Alumnos';
 $Boton_Nuevo='Nuevo Alumno';
?>
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1><?=$Titulo_Modulo ?></h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active"><?=$Modulo ?></li>
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
              <button class="btn btn-success m-1" data-toggle="modal" data-target="#crear"><i class="fa fa-plus"></i> <?=$Boton_Nuevo ?></button>
            </div>
              <div class="col-sm-12">

                  @if(session()->get('success'))
                      <div class="alert alert-success">
                          {{ session()->get('success') }}
                      </div>
                  @endif
              </div>
            <div class="col-12">

              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><i class="fa fa-file"></i> <?=$Titulo_Listado ?></h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Nombre Completo</th>
                      <th>CI</th>
                      <th>Celular</th>
                      <th>Estado</th>
                      <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datos as $dato)
                        <tr>
                            <td><img src="{{$dato->Url_Foto}}" width="100" alt=""></td>
                            <td>{{$dato->Nombre_Persona}} {{$dato->Ap_Paterno_Persona}} {{$dato->Ap_Materno_Persona}}</td>
                            <td>{{$dato->Num_Documento_Persona}}</td>
                            <td>{{$dato->Celular_Persona}}</td>
                            <td>
                                @if($dato->Estado_Usuario==1)
                                    <form action="{{ route('profesor.estado', $dato->Id_Persona)}}" method="post">
                                        @csrf
{{--                                        @method('DELETE')--}}
                                        <button class="btn btn-danger" type="submit">ACTIVO</button>
                                    </form>
                                @else
                                    <form action="{{ route('profesor.estado', $dato->Id_Persona)}}" method="post">
                                        @csrf
                                        {{--                                        @method('DELETE')--}}
                                        <button class="btn btn-danger" type="submit">INACTIVO</button>
                                    </form>
                                @endif
{{--                                {{$dato->persona->Estado_Persona}}--}}
                            </td>

                            <td>
                                <button  data-toggle="modal" data-id="{{$dato->Id_Alumno}}" data-target="#editar">Editar</button>
                                <form action="{{ route('alumno.destroy', $dato->Id_Alumno)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar curso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" id="fedit" action="{{ route('alumno.update', '') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="Nombre_Alumno" class="col-sm-1 col-form-label">Nombre</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Nombre_Alumno" id="Nombre_Alumno" placeholder="Nombre" required>
                    </div>
                    <label for="Ap_Paterno_Alumno" class="col-sm-1 col-form-label">Apellido Paterno</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Ap_Paterno_Alumno" id="Ap_Paterno_Alumno" placeholder="Apellido Paterno" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Id_Tipo_Documento2" class="col-sm-2 col-form-label">Tipo Documento</label>
                    <div class="col-sm-10">
                        {{--                      <input type="text" class="form-control" name="Id_Tipo_Documento" id="Id_Tipo_Documento" placeholder="Tipo Documento" required>--}}
                        <select name="secciones" class="form-control" id="Id_Tipo_Documento2" required>

                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Num_Documento_Persona" class="col-sm-2 col-form-label">Numero de documento</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Num_Documento_Persona" id="Num_Documento_Persona" placeholder="Apellido Materno" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image" id="image" placeholder="image" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="secciones2" class="col-sm-2 col-form-label">Seccion</label>
                    <div class="col-sm-10">
                        {{--                          <input type="text" class="form-control" name="Usuario_Usuario" id="nombre" placeholder="Curso">--}}
                        <select name="secciones" class="form-control" id="secciones2" required>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Ciclo curso</label>
                    <div class="col-sm-10">
                        {{--                      <input type="text" class="form-control" name="Usuario_Usuario" id="ciclo" placeholder="Ciclo curso">--}}
                        <select name="ciclo" class="form-control" id="ciclo" required>
                            <option value="PRE-KINDER">PRE-KINDER</option>
                            <option value="KINDER">KINDER</option>
                            <option value="PRIMARIA">PRIMARIA</option>
                            <option value="SECUNDARIA">SECUNDARIA</option>
                        </select>
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
  <!-- Crear Nuevo ************************************************************************ -->

    <div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalLabel"><?=$Boton_Nuevo?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('alumno.store')}}" enctype="multipart/form-data">
              @csrf
                <div class="form-group row">
                  <label for="Nombre_Alumno" class="col-sm-1 col-form-label">Nombre</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="Nombre_Alumno" id="Nombre_Alumno" placeholder="Nombre" required>
                  </div>
                  <label for="Ap_Paterno_Alumno" class="col-sm-1 col-form-label">Apellido Paterno</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control" name="Ap_Paterno_Alumno" id="Ap_Paterno_Alumno" placeholder="Apellido Paterno" required>
                  </div>
                </div>

              <div class="form-group row">
                  <label for="Id_Tipo_Documento" class="col-sm-2 col-form-label">Tipo Documento</label>
                  <div class="col-sm-10">
{{--                      <input type="text" class="form-control" name="Id_Tipo_Documento" id="Id_Tipo_Documento" placeholder="Tipo Documento" required>--}}
                      <select name="secciones" class="form-control" id="Id_Tipo_Documento" required>

                      </select>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="Num_Documento_Persona" class="col-sm-2 col-form-label">Numero de documento</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="Num_Documento_Persona" id="Num_Documento_Persona" placeholder="Apellido Materno" required>
                  </div>
              </div>


                  <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image" id="image" placeholder="image" required>
                    </div>
                  </div>
                  <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Seccion</label>
                      <div class="col-sm-10">
{{--                          <input type="text" class="form-control" name="Usuario_Usuario" id="nombre" placeholder="Curso">--}}
                          <select name="secciones" class="form-control" id="secciones" required>

                          </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Ciclo curso</label>
                    <div class="col-sm-10">
{{--                      <input type="text" class="form-control" name="Usuario_Usuario" id="ciclo" placeholder="Ciclo curso">--}}
                        <select name="ciclo" class="form-control" id="ciclo" required>
                            <option value="PRE-KINDER">PRE-KINDER</option>
                            <option value="KINDER">KINDER</option>
                            <option value="PRIMARIA">PRIMARIA</option>
                            <option value="SECUNDARIA">SECUNDARIA</option>
                        </select>
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



  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js" integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ==" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script>
          //console.log('aa');0
          window.onload=function(){
              axios.get('/tabla/tipo_documentos').then(res=>{
                  console.log(res.data);
                  res.data.forEach(r=>{
                      $('#Id_Tipo_Documento').append("<option value='"+r.Id_Tipo_Documento+"'>"+r.Tipo_Documento+"</option>");
                      $('#Id_Tipo_Documento2').append("<option value='"+r.Id_Tipo_Documento+"'>"+r.Tipo_Documento+"</option>");
                  });

              });
              axios.get('/seccion').then(res=>{
                  // console.log(res.data);
                  res.data.forEach(r=>{
                      $('#secciones').append("<option value='"+r.Id_Seccion_Curso+"'>"+r.Nombre_Seccion+"</option>");
                      $('#secciones2').append("<option value='"+r.Id_Seccion_Curso+"'>"+r.Nombre_Seccion+"</option>");
                  });
              });
              var id=0;
            var table =$("#example1").DataTable({
              // "ajax": '/profesor',
              // "columns":[
              //   {data:'<img src="persona.Url_Foto" > '},
              //   {data:'persona.Nombre_Persona'},
              //   {data:'persona.Num_Documento_Persona'},
              //     {data:'persona.Celular_Persona'},
              //     {data:'persona.Estado_Persona'},
              //   {"defaultContent": ""+
              //   "<button id='btnmodificar' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i> Editar  </button>"+
              //   "<button id='btneliminar' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Elimnar  </button>                "}
              // ],
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
            $('#example1 tbody').on( 'click', '#btnmodificar', function () {
                var data = table.row( $(this).parents('tr') ).data();
                //alert( data.Id_Usuario +"'s salary is: "+ data.Id_Usuario );
                id=data.Id_Curso;
                $('#codigo2').val(data.Codigo_Curso);
                $('#nombre2').val(data.Nombre_Curso);
                $('#ciclo2').val(data.Ciclo_Curso);
                $('#editar').modal('show');
            } );
            $('#example1 tbody').on( 'click', '#btneliminar', function () {
                var data = table.row( $(this).parents('tr') ).data();
                //alert( data.Id_Usuario +"'s salary is: "+ data.Id_Usuario );
                id=data.Id_Curso;


                Swal.fire({
                    title: 'Seguro de eliminar?',
                    //text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete('/curso/'+id).then(res=>{
                            Swal.fire(
                                'Eliminado!',
                                'El dato fue borrado.',
                                'success'
                                )
                            table.ajax.reload();
                        });

                    }
                    })

                /*if(confirm('Seguro de eliminar?')){
                    axios.delete('/curso/'+id).then(res=>{
                        table.ajax.reload();
                    });
                }*/
            } );
            var url=$('#fedit').attr('action');
            $('#editar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id');
                // var usuario = button.data('usuario');
                // $('#usuario').val(usuario);
                // console.log($('#fedit').attr('action').split("/"));
                // $('#user_id').val(id);
                $('#fedit').attr('action',url+'/'+id);
                console.log($('#fedit').attr('action'));
            });
            // $('#formulario').submit(function(){
            //     // let data={
            //     //     Codigo_Curso:$('#codigo').val(),
            //     //     Nombre_Curso:$('#nombre').val(),
            //     //     Id_Seccion_Curso:$('#secciones').val(),
            //     //     Ciclo_Curso:$('#ciclo').val(),
            //     // };
            //     var formData = new FormData();
            //     var imagefile = document.querySelector('#foto');
            //     formData.append("image", imagefile.files[0]);
            //     // formData.append("nombre", $('#'));
            //     axios.post('/profesor',formData, {
            //         headers: {
            //             'Content-Type': 'multipart/form-data'
            //         }
            //     }).then(res=>{
            //         console.log(res.data);
            //         if (res.data=='1'){
            //             $('#crear').modal('hide');
            //             $('#codigo').val(''),
            //                 $('#nombre').val(''),
            //                 $('#ciclo').val(''),
            //                 //table ={"ajax" '/curso'};
            //                 Swal.fire(
            //                     'Guardado!',
            //                     'El dato fue guardado.',
            //                     'success'
            //                 )
            //             table.ajax.reload();
            //         }else{
            //             Swal.fire(
            //                 'Error!',
            //                 res.data,
            //                 'error'
            //             )
            //         }
            //
            //     }).catch(err=>{
            //         Swal.fire(
            //             'Error!',
            //             'El nombre del usuario no esta disponible',
            //             'error'
            //         )
            //     });
            //     return false;
            // })
            //
            // $('#aupdate').submit(function(){
            //     let data={
            //         Codigo_Curso:$('#codigo2').val(),
            //         Nombre_Curso:$('#nombre2').val(),
            //         Id_Seccion_Curso:$('#secciones2').val(),
            //         Ciclo_Curso:$('#ciclo2').val(),
            //     };
            //     //console.log(id);
            //     axios.put('/curso/'+id,data).then(res=>{
            //         //console.log(res.data);
            //         if(res.data=='SI'){
            //             Swal.fire(
            //                     'Actualizado!',
            //                     'El dato fue actualizado.',
            //                     'success'
            //                     )
            //             $('#editar').modal('hide');
            //             $('#codigo2').val(''),
            //             $('#nombre2').val(''),
            //             $('#ciclo2').val(''),
            //             //table ={"ajax" '/curso'};
            //             table.ajax.reload();
            //         }else{
            //             Swal.fire(
            //                     'Error!',
            //                     res.data,
            //                     'error'
            //                     )
            //         }
            //
            //     });
            //     return false;
            // })
          }

      </script>


@endsection

