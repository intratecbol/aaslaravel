<?php 

  $Titulo_caja="Datos Personales";
  
  $a_mayusculas='onkeyup="javascript:this.value=this.value.toUpperCase();"';
  $no_mostrar='style="display:none;"';
  $no_autocompletar='autocomplete="off"';
  $solo_numeros='onkeypress="return solonumeros2(event)"';
  
  $Imagen_cabecera=' <img style="width: 150px;" class="profile-user-img img-responsive img-circle" src="archivos/imagenes/fotos/usuarios/0.jpg" alt="Foto de perfil de usuario">';
  
  //niveles de usuario
  $opciones_sexo=array("0;Elija ...", "M;Masculino", "F;Femenino");
   

  $campos_persona=array();

      $campos_persona[]= array("texto", "Nombre_Persona","", "Nombre"," autofocus".' '.$a_mayusculas,"form-control");
      $campos_persona[]= array("texto", "Ap_Paterno_Persona","", "Ap. Paterno",$a_mayusculas,"form-control");
      $campos_persona[]= array("texto", "Ap_Materno_Persona","", "Ap. Materno",$a_mayusculas,"form-control"); 

      $campos_persona[]= array("combo", "Sexo_Persona", "", "Género", $opciones_sexo,"0","form-control");

      $campos_persona[]= array("texto", "Ci_Persona","", "N° Cédula de Identidad",$a_mayusculas,"form-control");
      $campos_persona[]= array("texto", "Ci_Emitido_Persona","", "Lugar emisión CI",$a_mayusculas,"form-control");

      $campos_persona[]= array("texto", "Celular_Persona","", "Número de Celular",$solo_numeros,"form-control");
      $campos_persona[]= array("texto", "Email_Persona","", "Correo Electrónico","".$no_autocompletar,"form-control");
     
?>

          <!-- /.col-md-6 -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h5 class="m-0"><?php echo $Titulo_caja; ?></h5>
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
                         <div id="<?php echo $valores[1];?>">     
                           <label><?php echo $valores[3]; ?>:</label>
                             <?php include ("librerias/php/generar_campos_form.php"); ?>
                        </div>
                      <?php
                      }
                      ?>

                   </div>
                    
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->


      
    <!-- SCRIPT PARA LA FOTO -->
          <style type="text/css">
            .thumb { width:180px; padding:5px; border:solid 1px #B1B1B1; border-radius:5px; margin:10px; background:#FFFFFF; }
            input[type="file"] {
              display: none;
            }
            .custom-file-upload {
                border: 1px solid #ccc;
                border-radius:5px;
                display: inline-block;
                padding: 6px 12px;
                cursor: pointer;
                background:#f0f0f0;
            }
          </style>
          <script language="javascript">
            function archivo(evt) {
                    var files = evt.target.files; // FileList object
         
                    // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                      //Solo admitimos imágenes.
                      if (!f.type.match('image.*')) {
                          continue;
                      }
               
                      var reader = new FileReader();
               
                      reader.onload = (function(theFile) {
                          return function(e) {
                            // Insertamos la imagen
                           document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                          };
                      })(f);
               
                      reader.readAsDataURL(f);
                    }
              }          
            document.getElementById('foto').addEventListener('change', archivo, false);
          </script>
    <!-- Foto -->

<!-- Validar datos del formulario -->
<script language="javascript">

function Validar_Datos_Persona () {

    var formulario=document.getElementById('Formulario');
    
    if (formulario.Nombre_Persona.value.length < 3)
      {
        alert("Complete los datos de Nombre Completo");
        formulario.Nombre_Persona.focus();
        return (false);
      }
    if (formulario.Ap_Paterno_Persona.value.length < 3)
      {
        alert("Complete los datos del Apellido Paterno");
        formulario.Ap_Paterno_Persona.focus();
        return (false);
      }
    if (formulario.Ap_Materno_Persona.value.length < 3)
      {
        alert("Complete los datos del Apellido Materno");
        formulario.Ap_Materno_Persona.focus();
        return (false);
      }
    if (formulario.Sexo_Persona.selectedIndex==0) {
         alert("Debe Elegir por lo menos un Género.");
         formulario.Sexo_Persona.focus();
         return (false);
      }
    if (formulario.Ci_Persona.value.length < 5)
      {
        alert("Complete los datos del Carnet de Identidad");
        formulario.Ci_Persona.focus();
        return (false);
      }

    if (formulario.Ci_Emitido_Persona.value.length < 2)
      {
        alert("Complete los datos del Lugar de Emisión del CI");
        formulario.Ci_Emitido_Persona.focus();
        return (false);
      }
    if (formulario.Celular_Persona.value.length < 7)
      {
        alert("Complete los datos del Número de Celular");
        formulario.Celular_Persona.focus();
        return (false);
      }

    return true;

  } //fin formulario

</script>

<!-- Fin Validar datos del formulario -->