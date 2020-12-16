<?php 
  


  $Titulo_caja="Datos de Usuario";
  $Imagen_cabecera='<img style="width: 120px;" class="profile-user-img img-fluid img-circle" src="archivos/imagenes/iconos/llaves.png" alt="Datos del Usuario">';

  $tablas="usuarios_niveles";
      $campos="*";
      $condicion="Nivel_Usuario >0 order by Cargo_Nivel asc";
     
      //niveles de usuario
      $resultados_niveles = $BD->Listar_BD($tablas,$campos,$condicion);
      $opciones_niveles_usuario[]="0;Elija ..."; 
      foreach ($resultados_niveles as $clave => $valor) {
        $opciones_niveles_usuario[]=$valor["Nivel_Usuario"].";".$valor["Cargo_Nivel"];
      }

  $opciones_estado_usuario=array("1;Activo", "2;Inactivo");
   

  $campos_usuario=array();

      $campos_usuario[]= array("texto", "Usuario_Usuario","", "Nombre de Usuario"," autofocus","form-control");

      $campos_usuario[]= array("password","Password_Usuario", "", "Contraseña","","form-control");

      $campos_usuario[]= array("combo", "Nivel_Usuario", "", "Tipo de usuario", $opciones_niveles_usuario,"0","form-control");

      $campos_usuario[]= array("combo", "Estado_Usuario", "", "Estado usuario", $opciones_estado_usuario,"1","form-control");
?>

          <!-- /.col-md-6 -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h5 class="m-0"><?php echo $Titulo_caja; ?></h5>
              </div>
              <div class="card-body">
                  
                  <div class="text-center">
                    <?php echo $Imagen_cabecera; ?>
                   </div>

                   <div class="form-group">
                      <?php
                      foreach ($campos_usuario as $key => $valores) {
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

<!-- Validar datos del formulario -->
<script language="javascript">

function Validar_Datos_Usuario () {

    var formulario=document.getElementById('Formulario');
    
    if (formulario.Usuario_Usuario.value.length < 5)
      {
        alert("Elija un nombre de Usuario válido");
        formulario.Usuario_Usuario.focus();
        return (false);
      }

    if (formulario.Password_Usuario.value.length < 5)
      {
        alert("Elija una contraseña válida, por lo menos 5 caracteres");
        formulario.Password_Usuario.focus();
        return (false);
      }

    if (formulario.Nivel_Usuario.selectedIndex ==0)
      {
        alert("Elija un tipo de usuario válido");
        formulario.Nivel_Usuario.focus();
        return (false);
      }

    return true;

  } //fin formulario

</script>

<!-- Fin Validar datos del formulario -->
