@extends('template')
@extends('templates.cabeceras')
@extends('templates.menutop')
@extends('templates.menu')
@extends('templates.central')
@extends('templates.pie')
@extends('templates.scripts')


<?php
 $Titulo_Modulo='<i class="fa fa-users"></i> Profesores';
 $Modulo='Profesores';
 $Titulo_Listado='Listado de Profesores';
 $Boton_Nuevo='Nuevo Profesor';


//DATOS PARA EL FORMULARIO DE DATOS PERSONALES ****************************************************
  $Titulo_caja1="Datos Personales";
  
  $a_mayusculas='onkeyup="javascript:this.value=this.value.toUpperCase();"';
  $no_mostrar='style="display:none;"';
  $no_autocompletar='autocomplete="off"';
  $solo_numeros='onkeypress="return solonumeros2(event)"';
  $requerido=' required ';
  
  $Imagen_cabecera='<img style="width: 150px;" class="profile-user-img img-responsive img-circle" src="archivos/imagenes/fotos/usuarios/0.jpg" alt="Foto de perfil de usuario">';
  
  //niveles de usuario
  $opciones_sexo=array("M;Masculino", "F;Femenino");
   

  $campos_persona=array();

      $campos_persona[]= array("texto", "Nombre_Persona","", "Nombre"," autofocus".' '.$a_mayusculas.$requerido,"form-control");
      $campos_persona[]= array("texto", "Ap_Paterno_Persona","", "Ap. Paterno",$a_mayusculas,"form-control");
      $campos_persona[]= array("texto", "Ap_Materno_Persona","", "Ap. Materno",$a_mayusculas,"form-control"); 

      $campos_persona[]= array("combo", "Sexo_Persona", "", "Género", $opciones_sexo,"0","form-control");

      $campos_persona[]= array("texto", "Ci_Persona","", "N° Cédula de Identidad",$a_mayusculas,"form-control");
      $campos_persona[]= array("texto", "Ci_Emitido_Persona","", "Lugar emisión CI",$a_mayusculas,"form-control");

      $campos_persona[]= array("texto", "Celular_Persona","", "Número de Celular",$solo_numeros,"form-control");
      $campos_persona[]= array("texto", "Email_Persona","", "Correo Electrónico","".$no_autocompletar,"form-control");

// *****************************************************************************************************

//DATOS PARA EL FORMULARIO DE DATOS COMPLEMENTARIOS ****************************************************
$Titulo_caja2="Datos Complementarios";
  
$Imagen_cabecera='';
  
  //estado civil
  $opciones_estado_civil=array("0;Elija ...", "SOLTERO(A);SOLTERO(A)", "CASADO(A);CASADO(A)","VUIDO(A);VUIDO(A)","DIVORCIADO(A);DIVORCIADO(A)");
   
  $campos_persona_complementarios=array();

      $campos_persona_complementarios[]= array("texto", "Direccion_Persona","", "Dirección",$a_mayusculas,"form-control");
      $campos_persona_complementarios[]= array("texto", "Ciudad_Persona","", "Ciudad",$a_mayusculas,"form-control");
      $campos_persona_complementarios[]= array("texto", "Provincia_Persona","", "Provincia",$a_mayusculas,"form-control");
      $campos_persona_complementarios[]= array("texto", "Telefono_Persona","", "Teléfono"," ","form-control"); 
      $campos_persona_complementarios[]= array("combo", "Estado_Civil_Persona", "", "Estado Civil Persona", $opciones_estado_civil,"0","form-control");    
      $campos_persona_complementarios[]= array("texto", "Nacionalidad_Persona","", "Nacionalidad",$a_mayusculas,"form-control"); 
      $campos_persona_complementarios[]= array("texto", "Lugar_Nac_Persona","", "Lugar de nacimiento",$a_mayusculas,"form-control");    

// ***************************************************************************************************

//DATOS PARA EL FORMULARIO DE DATOS USUARIO  *********************************************************

$Titulo_caja3="Datos de Usuario";
$Imagen_cabecera='<img style="width: 120px;" class="profile-user-img img-fluid img-circle" src="archivos/imagenes/iconos/llaves.png" alt="Datos del Usuario">';

      $resultados_niveles=DB::table('usuarios_niveles')->get();
      foreach ($resultados_niveles as $clave) {
        $opciones_niveles_usuario[]=$clave->Nivel_Usuario.";".$clave->Cargo_Nivel;
      }
  
  $opciones_estado_usuario=array("1;Activo", "2;Inactivo");

  $campos_usuario=array();

      $campos_usuario[]= array("texto", "Usuario_Usuario","", "Nombre de Usuario"," autofocus","form-control");
      $campos_usuario[]= array("password","Password_Usuario", "", "Contraseña","","form-control");
      $campos_usuario[]= array("combo", "Nivel_Usuario", "", "Tipo de usuario", $opciones_niveles_usuario,"0","form-control");
      $campos_usuario[]= array("combo", "Estado_Usuario", "", "Estado usuario", $opciones_estado_usuario,"1","form-control");

// ***************************************************************************************************
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
            
            <div class="col-sm-12">
              @if(session()->get('success'))
                  <div class="alert alert-success">
                      {{ session()->get('success') }}
                  </div>
              @endif
            </div>

            <div class="col-12 text-right">
              <button class="btn btn-success m-1" data-toggle="modal" data-target="#crear"><i class="fa fa-plus"></i> <?=$Boton_Nuevo ?></button>
            </div>
              
            <div class="col-12">
                    
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"><i class="fa fa-file"></i> <?=$Titulo_Listado ?></h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                  <table id="tabla_de_datos" class="table table-bordered table-hover">
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
                            <td><img src="{{$dato->Url_Foto}}" width="80" alt=""></td>
                            <td>{{$dato->Nombre_Persona}} {{$dato->Ap_Paterno_Persona}} {{$dato->Ap_Materno_Persona}}</td>
                            <td>{{$dato->Num_Documento_Persona}}</td>
                            <td>{{$dato->Celular_Persona}}</td>
                            <td>
                                @if($dato->Estado_Usuario==1)
                                    <form action="{{ route('profesor.estado', $dato->Id_Persona)}}" method="post">
                                        @csrf
{{--                                        @method('DELETE')--}}
                                        <button class="btn btn-success" type="submit">ACTIVO</button>
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
                              <div class="btn-group">
                                <button class="btn btn-warning"  data-toggle="modal" data-id="{{$dato->Id_Profesor}}" data-target="#editar"><i class="fa fa-edit"></i></button>
                                <form name="form_eliminar" action="{{ route('profesor.destroy', $dato->Id_Profesor)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                              </div>
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
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalLabel">
            <?=$Boton_Nuevo?>
            
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="fedit" action="{{ route('profesor.update', '') }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div id="loading" class="container-fluid">
              <div class="row">
                <div class="col-12 text-center">
                  <div  class="spinner-border text-muted">
                  </div>
                </div>
              </div>
            </div>
            
            <div id="forms" class="container-fluid">
              <div class="row">
              
               <!-- /.col-md-6 -->
               <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h5 class="m-0"><?php echo $Titulo_caja1; ?></h5>
                  </div>
                  <div class="card-body">
                      
                      <div class="text-center">
                          <div><output id="list"><?php echo $Imagen_cabecera; ?></output></div>
                          <label class="custom-file-upload" id="BotonFoto" tabindex="0">
                              <input type="file" id="foto" name="foto" /> <i class="fa fa-camera"></i> Foto 
                          </label>    
                      </div>

                      <div class="form-group">
                          <?php
                          foreach ($campos_persona as $key => $valores) {
                          ?>
                            <div id="div_<?php echo $valores[1];?>">     
                              <label><?php echo $valores[3]; ?>:</label>
                              <?php crear_campos ($valores); ?>
                            </div>
                          <?php
                          } 
                          ?>
                      </div>
                        
                  </div>
                </div>
              </div>
              <!-- /.col-md-6 -->

              <!-- /.col-md-6 -->
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h5 class="m-0"><?php echo $Titulo_caja2; ?></h5>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                          <?php
                          foreach ($campos_persona_complementarios as $key => $valores) {
                          ?>
                            <div id="div_<?php echo $valores[1];?>">     
                              <label><?php echo $valores[3]; ?>:</label>
                                <?php crear_campos ($valores); ?>
                            </div>
                          <?php
                          } 
                          ?>
                      </div>
                        
                  </div>
                </div>
              </div>
              <!-- /.col-md-6 -->

              <!-- /.col-md-6 -->
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h5 class="m-0"><?php echo $Titulo_caja3; ?></h5>
                  </div>
                  <div class="card-body">
                      <div class="form-group">
                          <?php
                          foreach ($campos_usuario as $key => $valores) {
                          ?>
                            <div id="div_<?php echo $valores[1];?>">     
                              <label><?php echo $valores[3]; ?>:</label>
                                <?php crear_campos ($valores); ?>
                            </div>
                          <?php
                          } 
                          ?>
                      </div>
                        
                  </div>
                </div>
              </div>
              <!-- /.col-md-6 -->
      
               
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-window-close"></i> Cancelar</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>







  <!-- Crear Nuevo ************************************************************************ -->

  <div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title" id="exampleModalLabel"><?=$Boton_Nuevo?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{route('profesor.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
              
                <!-- /.col-md-6 -->
                <div class="col-md-6">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h5 class="m-0"><?php echo $Titulo_caja1; ?></h5>
                    </div>
                    <div class="card-body">
                        
                        <div class="text-center">
                            <div><output id="list"><?php echo $Imagen_cabecera; ?></output></div>
                            <label class="custom-file-upload" id="BotonFoto" tabindex="0">
                                <input type="file" id="foto" name="foto" /> <i class="fa fa-camera"></i> Foto 
                            </label>    
                        </div>

                        <div class="form-group">
                            <?php
                            foreach ($campos_persona as $key => $valores) {
                            ?>
                              <div id="div_<?php echo $valores[1];?>">     
                                <label><?php echo $valores[3]; ?>:</label>
                                <?php crear_campos ($valores); ?>
                              </div>
                            <?php
                            } 
                            ?>
                        </div>
                          
                    </div>
                  </div>
                </div>
                <!-- /.col-md-6 -->

                <!-- /.col-md-6 -->
                <div class="col-md-6">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h5 class="m-0"><?php echo $Titulo_caja2; ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <?php
                            foreach ($campos_persona_complementarios as $key => $valores) {
                            ?>
                              <div id="div_<?php echo $valores[1];?>">     
                                <label><?php echo $valores[3]; ?>:</label>
                                  <?php crear_campos ($valores); ?>
                              </div>
                            <?php
                            } 
                            ?>
                        </div>
                          
                    </div>
                  </div>
                </div>
                <!-- /.col-md-6 -->

                <!-- /.col-md-6 -->
                <div class="col-md-6">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h5 class="m-0"><?php echo $Titulo_caja3; ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <?php
                            foreach ($campos_usuario as $key => $valores) {
                            ?>
                              <div id="div_s<?php echo $valores[1];?>">     
                                <label><?php echo $valores[3]; ?>:</label>
                                  <?php crear_campos ($valores); ?>
                              </div>
                            <?php
                            } 
                            ?>
                        </div>
                          
                    </div>
                  </div>
                </div>
                <!-- /.col-md-6 -->


              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-window-close"></i> Cancelar</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>







      <script>
          window.onload=function(){
            $('#forms').hide();
            $('#loading').hide();
            $('#editar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id');
            //console.log(id);
            $('#forms').hide();
            $('#loading').show();
            $.ajax(
              {
                url: "/profesor/"+id,
                success: function(res){
                  //console.log(res);
                  let r= res[0];
                  //console.log(r.Nombre_Persona);
                  $('#Nombre_Persona').val(r.Nombre_Persona);
                  $('#forms').show();
                  $('#loading').hide();
                },
                 beforeSend: function(){
                  $('#loading').show();
                }
                });
            });

            var table =$("#tabla_de_datos").DataTable({

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
            
          }

      </script>


@endsection

