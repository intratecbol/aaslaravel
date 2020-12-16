<?php 

  $Titulo_caja="Datos Complementarios";
  $Imagen_cabecera='';
  
  //estado civil
  $opciones_estado_civil=array("0;Elija ...", "SOLTERO(A);SOLTERO(A)", "CASADO(A);CASADO(A)","VUIDO(A);VUIDO(A)","DIVORCIADO(A);DIVORCIADO(A)");
   

  $campos_persona=array();

      $campos_persona[]= array("texto", "Direccion_Persona","", "Dirección",$a_mayusculas,"form-control");

      $campos_persona[]= array("texto", "Ciudad_Persona","", "Ciudad",$a_mayusculas,"form-control");

      $campos_persona[]= array("texto", "Provincia_Persona","", "Provincia",$a_mayusculas,"form-control");

      $campos_persona[]= array("texto", "Telefono_Persona","", "Teléfono"," ","form-control"); 
      
      $campos_persona[]= array("combo", "Estado_Civil_Persona", "", "Estado Civil Persona", $opciones_estado_civil,"0","form-control");

     
      $campos_persona[]= array("texto", "Nacionalidad_Persona","", "Nacionalidad",$a_mayusculas,"form-control"); 

      $campos_persona[]= array("texto", "Lugar_Nac_Persona","", "Lugar de nacimiento",$a_mayusculas,"form-control");    
?>

                    <!-- /.col-md-6 -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h5 class="m-0"><?php echo $Titulo_caja; ?></h5>
              </div>
              <div class="card-body">
                  
                   <?php echo $Imagen_cabecera; ?>

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
                      <div class="form-group">
                        <label>Fecha de Nacimiento:</label>
                          <div class="input-group date" data-target-input="nearest">
                              <input type="text"  name="Fecha_Nac_Persona" id="Fecha_Nac_Persona"  class="form-control datetimepicker-input" data-target="#Fecha_Nac_Persona">
                              <div class="input-group-append" data-target="#Fecha_Nac_Persona" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>

                    </div>
                    
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->

<!-- Validar datos del formulario -->
<script language="javascript">

function Validar_Datos_Complementarios () {

    var formulario=document.getElementById('Formulario');
    
    if (formulario.Direccion_Persona.value.length < 5)
      {
        alert("Escriba la Dirección de la persona");
        formulario.Direccion_Persona.focus();
        return (false);
      }

    if (formulario.Ciudad_Persona.value.length < 5)
      {
        alert("Escriba la Ciudad donde vive  la persona");
        formulario.Ciudad_Persona.focus();
        return (false);
      }

    if (formulario.Provincia_Persona.value.length < 5)
      {
        alert("Escriba la Provincia donde vive la persona");
        formulario.Provincia_Persona.focus();
        return (false);
      }

    
    if (formulario.Estado_Civil_Persona.selectedIndex ==0)
      {
        alert("Elija el estado civil válido");
        formulario.Estado_Civil_Persona.focus();
        return (false);
      }

    if (formulario.Nacionalidad_Persona.value.length < 5)
      {
        alert("Coloque la nacionalidad de la persona");
        formulario.Nacionalidad_Persona.focus();
        return (false);
      }

    if (formulario.Lugar_Nac_Persona.value.length < 5)
      {
        alert("Coloque el lugar de nacimiento de la persona");
        formulario.Lugar_Nac_Persona.focus();
        return (false);
      }

    if (formulario.Fecha_Nac_Persona.value.length < 10)
      {
        alert("Coloque la fecha de nacimiento de la persona");
        formulario.Fecha_Nac_Persona.focus();
        return (false);
      }
      
    return true;

  } //fin formulario

</script>

<!-- Fin Validar datos del formulario -->
