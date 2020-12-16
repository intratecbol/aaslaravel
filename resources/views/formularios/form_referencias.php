<?php 


  $Titulo_caja="Referencias";
  
  $a_mayusculas='onkeyup="javascript:this.value=this.value.toUpperCase();"';
  $no_mostrar='style="display:none;"';
  $no_autocompletar='autocomplete="off"';
  $solo_numeros='onkeypress="return solonumeros2(event)"';
  
  $Imagen_cabecera='';
  $cant_referencias=2;   
  $i=1;

  $campos_referencia=array();

      $campos_referencia[]= array("texto", "Nombre_Referencia","", "Nombre Completo","$a_mayusculas","form-control");
      $campos_referencia[]= array("texto", "Telefono_Referencia","", "Teléfono(s)",$a_mayusculas,"form-control");
      $campos_referencia[]= array("texto", "Relacion_Referencia","", "Tipo de relación",$a_mayusculas,"form-control"); 
     
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
                      $formulario -> form_Oculto ('Cant_Referencias',$cant_referencias,'', '','form-control'); 

                      for ($i=1; $i<=$cant_referencias;$i++) {
                          echo '<br><h3>Persona de referencia '.$i.':</h3>';
                          foreach ($campos_referencia as $key => $valores) {
                          ?>
                             <div id="<?php echo $valores[1];?>">     
                               <label><?php echo $valores[3]; ?>:</label>

                                 <?php $formulario->form_texto  ($valores[1]."[$i]",$valores[2],$valores[3],$valores[4],$valores[5]); ?>
                            </div>
                          <?php
                          }
                      }
                      ?>

                    </div>
                    
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->

<!-- Validar datos del formulario -->
<script language="javascript">

function Validar_Datos_Referencias () {

    var formulario=document.getElementById('Formulario');
    
    if (document.getElementById('Nombre_Referencia[1]').value.length < 5)
      {
        alert("Escriba el nombre del contacto de Referencia");
        document.getElementById('Nombre_Referencia[1]').focus();
        return (false);
      }

    if (document.getElementById('Telefono_Referencia[1]').value.length < 5)
      {
        alert("Escriba el telefono del contacto de Referencia");
        document.getElementById('Telefono_Referencia[1]').focus();
        return (false);
      }

    if (document.getElementById('Relacion_Referencia[1]').value.length < 5)
      {
        alert("Escriba el Tipo de relación del contacto de Referencia");
        document.getElementById('Relacion_Referencia[1]').focus();
        return (false);
      }
      
    return true;

  } //fin formulario

</script>

<!-- Fin Validar datos del formulario -->