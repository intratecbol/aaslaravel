<?php
if ($valores[0]=="texto")    { $formulario->form_texto  ($valores[1],$valores[2],$valores[3],$valores[4],$valores[5]); }
if ($valores[0]=="numero")   { $formulario->form_numero  ($valores[1],$valores[2],$valores[3],$valores[4],$valores[5]); }
if ($valores[0]=="oculto") 	 { $formulario->form_oculto ($valores[1],$valores[2],$valores[3]); }
if ($valores[0]=="password") { $formulario->form_pass   ($valores[1],$valores[2],$valores[3],$valores[4],$valores[5]); }
if ($valores[0]=="caja")     { $formulario->form_caja   ($valores[1],$valores[2],$valores[4],$valores[5],$valores[6],$valores[7]);} 
if ($valores[0]=="archivo")  { $formulario->form_archivo($valores[1],$valores[2]);}
if ($valores[0]=="combo")    { $formulario->form_combo ($valores[1],$valores[4],$valores[5],$valores[2],$valores[6]); }
?>