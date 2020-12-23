<?php

function form_Texto ($id,$valor,$fondo, $condiciones,$estilo) {
    echo '<input type="text" name="'.$id.'" id="'.$id.'" value="'.$valor.'" placeholder="'.$fondo.'" '.$condiciones.' class="'.$estilo.'"  >
          ';
   }
function form_Numero ($id,$valor,$fondo, $condiciones,$estilo) {
         echo '<input type="number" name="'.$id.'" id="'.$id.'" value="'.$valor.'" placeholder="'.$fondo.'" '.$condiciones.' class="'.$estilo.'"  >
        ';
       }
function form_Pass ($id,$valor,$fondo, $condiciones,$estilo) {
     echo '<input type="password" name="'.$id.'" id="'.$id.'" value="'.$valor.'" placeholder="'.$fondo.'" '.$condiciones.' class="'.$estilo.'"  >
          ';
   }
function form_Email ($id,$valor,$fondo, $condiciones,$estilo) {
     echo '<input type="email" name="'.$id.'" id="'.$id.'" value="'.$valor.'" placeholder="'.$fondo.'" '.$condiciones.' class="'.$estilo.'"  >
          ';
   }
function form_Oculto ($id,$valor,$fondo, $condiciones,$estilo) {
     echo '<input type="hidden" name="'.$id.'" id="'.$id.'" value="'.$valor.'" placeholder="'.$fondo.'" '.$condiciones.' class="'.$estilo.'"  >
        ';
   }
function form_Toggle ($id) {
     echo '<br>
      <label class="switch">
        <input type="checkbox" name="'.$id.'" id="'.$id.'" onChange="if(this.checked) {document.getElementById(\'Toggle_Texto_'.$id.'\').value = \'Activo\';} else {document.getElementById(\'Toggle_Texto_'.$id.'\').value = \'Inactivo\';}">
        <span class="slider round"></span>
      </label>
     ';
     echo '<input type="text" id="Toggle_Texto_'.$id.'" value="" style="border:none; background:white;" disabled>
          ';
   }
   


function form_Combo ($id,$opciones,$seleccionado,$condiciones,$estilo) {
     if ($estilo != "") { $estilo = ' class="'.$estilo.' "'; }
     echo '<select name="'.$id.'" id="'.$id.'"  '.$condiciones.$estilo.'>'; 
     $i=0;
     foreach ($opciones as $valores) {
          $datos = explode(";", $valores);
          $seleccion="";
          if ($datos[0]==$seleccionado) { $seleccion=" selected='selected' "; }
          echo '<option value="'.$datos[0].'"'.$seleccion.'>'.$datos[1].'</option>
          ';
          $i++;
         }        
     echo '</select>';
   }
function form_Radio ($id,$opciones,$seleccionado,$condiciones,$estilo) {
     $i=0;
     if ($estilo != "") { $estilo = ' class="'.$estilo.' "'; }
     foreach ($opciones as $valores) {
      $datos = explode(";", $valores);
      $seleccion = "";
      if ($seleccionado == $datos[0]) { $seleccion = " checked "; } 
      echo '<br><label class="radioboxContainer">'.$datos[1].'<input type="radio" name="'.$id.'" id="'.$id.'_'.$i.'" '.$condiciones.$estilo.' value="'.$datos[0].'"'.$seleccion.'><span class="radiomark"><i class="fa fa-hand-o-right" aria-hidden="true"></i></span>
                </label> ';
      $i++;
     } echo '<br>';
   }
function form_Checkbox ($id,$opciones,$seleccionado,$condiciones,$estilo) { // $seleccionado es un array
     $i=0;
     if ($estilo != "") { $estilo = ' class="'.$estilo.' "'; }
     if ($seleccionado == "") { $seleccionado = array(); };
     foreach ($opciones as $valores) {
         $datos = explode(";", $valores);
         $seleccion = "";
         foreach ($seleccionado as $clave => $valor) {
          if ($valor == $datos[0]) { $seleccion = " checked "; }
         }
          echo '<br><label class="checkboxContainer">'.$datos[1].'<input type="checkbox" name="'.$id.'['.$datos[1].']" id="'.$id.'_'.$datos[1].'" value="'.$datos[0].'" '.$condiciones.$estilo.$datos[0].'"'.$seleccion.'><span class="checkmark"><i class="fa fa-check" aria-hidden="true"></i></span>
                </label>';
          $i++;
     } echo '<br>';
   } 

function form_Caja ($id,$valor, $condiciones,$columnas,$filas,$estilo) {
     echo '<textarea name="'.$id.'" id="'.$id.'" cols="'.$columnas.'" rows="'.$filas.'"  '.$condiciones.' class="'.$estilo.'"  >'.$valor.'</textarea>
          ';
   }
function form_Autocompletar ($id, $valor, $fondo, $condiciones, $estilo, $contenedor, $UrlBuscador) {
     echo '<input type="text" name="'.$id.'" id="'.$id.'" value="'.$valor.'" placeholder="'.$fondo.'" '.$condiciones.' class="'.$estilo.'" onkeypress="enter(event, \''.$id.'\');" onKeyUp="this.value=this.value.toUpperCase(); AutocompletarForm(this.value, \''.$contenedor.'\', \''.$UrlBuscador.'\', \''.$id.'\');"  autocomplete="off"  >
          ';
   }

function form_archivo ($id, $condiciones) {
     echo '<input type="file" name="'.$id.'" id="'.$id.'" '.$condiciones.' >
          ';
   }
function form_boton_enviar ($id,$valor, $condiciones, $estilo) {
     echo '<input type="submit" name="'.$id.'" id="'.$id.'" value="'.$valor.'" '.$condiciones.' class="'.$estilo.'" >
          ';
   }
function form_boton ($id,$valor, $condiciones, $estilo) {
     echo '<input type="button" name="'.$id.'" id="'.$id.'" value="'.$valor.'" '.$condiciones.' class="'.$estilo.'" >
          ';
   }


function crear_campos ($valores) {
    if ($valores[0]=="texto")    { form_Texto  ($valores[1],$valores[2],$valores[3],$valores[4],$valores[5]); }
    if ($valores[0]=="numero")   { form_Numero  ($valores[1],$valores[2],$valores[3],$valores[4],$valores[5]); }
    if ($valores[0]=="oculto") 	 { form_Oculto ($valores[1],$valores[2],$valores[3],"",""); }
    if ($valores[0]=="password") { form_Pass   ($valores[1],$valores[2],$valores[3],$valores[4],$valores[5]); }
    if ($valores[0]=="caja")     { form_Caja   ($valores[1],$valores[2],$valores[4],$valores[5],$valores[6],$valores[7]);} 
    if ($valores[0]=="archivo")  { form_Archivo($valores[1],$valores[2]);}
    if ($valores[0]=="combo")    { form_Combo  ($valores[1],$valores[4],$valores[5],$valores[2],$valores[6]); }
    }
?>