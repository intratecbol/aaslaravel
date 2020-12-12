<?php 
  //*****************************************************************************
  $modulo="usuarios";
  $icono_modulo="fa-users";
  $titulo_modulo="Usuarios";
  $Boton_nuevo_icono="fa-user-plus";
  $Boton_nuevo_etiqueta="Nuevo Usuario";
?>
<div class="modal fade show" id="modal-lg" style="padding-right: 17px; display: block;" aria-modal="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title"><i class="nav-icon fas <?php echo $Boton_nuevo_icono; ?>"></i> <?php echo $Boton_nuevo_etiqueta;?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="help-block">Datos personales:</h4>
                            <?Php /*
                            $formulario -> form_Oculto ('procesar','','', '','form-control'); 
                            $formulario -> form_Oculto ('llaveFormulario',md5(_llaveFormulario).'P4t0'.time(),'', '','form-control');  */
                            ?>
                        <div class="form-group">   
                            <?Php /*
                               foreach ($campos_persona as $key => $valores) {
                                    ?>
                                        <div id="<?php echo $valores[1];?>">  	  
                                            <label class="help-block"><?php echo $valores[3]; ?>:</label>
                                          <?php include ("../../../librerias/php/generar_campos_form.php"); ?>
                                     </div>
                            <?php
                            } */
                             
                            ?>
                            <input type="text" name="Nombre">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h4 class="help-block">Datos para el usuario:</h4>
                        <div class="form-group">
                            <?Php /*
                               foreach ($campos_usuario as $key => $valores) {
                                    ?>
                                        <div id="<?php echo $valores[1];?>">  	  
                                            <label class="help-block"><?php echo $valores[3]; ?>:</label>
                                          <?php include ("../../../librerias/php/generar_campos_form.php"); ?>
                                     </div>
                            <?php 
                            } */
                            ?>
                            <input type="text" name="Nombre">
                        </div>
                        <label class="custom-file-upload" id="BotonFoto" tabindex="0">
                            <input type="file" id="foto" name="foto" /> <i class="fa fa-camera"></i> Añadir Foto 
                        </label>
                        <div><output id="list"></output></div>
                    </div>
                </div>
             </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


<!-- Foto -->
  <style type="text/css">
    .thumb { width:80%; padding:5px; border:solid 1px #B1B1B1; border-radius:5px; margin:10px; background:#FFFFFF; }
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
