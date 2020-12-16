
<?php
// funcion que permite convertir una cadena de texto a una cadena tipo URL
function TextoaUrl($cadena){
		$table = array('Š'=>'S', 'š'=>'s', 'Ð'=>'Dj', 'd'=>'d', 'Ž'=>'Z', 'ž'=>'z', 'C'=>'C', 'c'=>'c', 'C'=>'C', 'c'=>'c','À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E','Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O','Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e','ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o','ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b','ÿ'=>'y', 'R'=>'R', 'r'=>'r');
		$cadena=ReduceCadena($cadena,50,' ','');
		$a= strtr($cadena, $table);
		$spacer = "_";
		$string = trim($a);
		$string = strtolower($string);
		$string = trim(ereg_replace("[^ A-Za-z0-9_]", " ", $string));
		$string = ereg_replace("[ \t\n\r]+", "-", $string);
		$string = str_replace(" ", $spacer, $string);
		$string = ereg_replace("[ -]+", "-", $string);
		return $string;
}

// funcion que reduce la cantidad de texto a mostrar   
function ReduceCadena($string, $limit, $break=".", $pad="(…)") {
        if(strlen($string) <= $limit)
        	return $string;
		if(false !== ($breakpoint = strpos($string, $break, $limit))) 
		{   if ($breakpoint < strlen($string)-1) 
			{   $string = substr($string, 0, $breakpoint).$pad;}
		}
		return $string;
}

//REMPLAZAR ACENTOS, CARACTERES INVALIDOS Y ESPACIOS
function Archivo_URL($string_in){
	$string_output=mb_strtolower($string_in, 'UTF-8');
	//caracteres inválidos en una url
	$find=array('¥','µ','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ð','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','\'','"');
	//traduccion caracteres válidos
	$repl=array('-','-','a','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','ny','o','o','o','o','o','o','u','u','u','u','y','y','','' );
	$string_output=str_replace($find, $repl, $string_output);
	//más caracteres inválidos en una url que sustituiremos por guión
	$find=array(' ', '&','%','$','·','!','(',')','?','¿','¡',':','+','*','\n','\r\n', '\\', '´', '`', '¨', ']', '[');
	$string_output=str_replace($find, '-', $string_output);
	$string_output=str_replace('--', '', $string_output);
	return $string_output;
}

//funcion que retorna la fecha en formato dd/mes/AA	  
function Fecha($variable) {
	$meses=array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
	$mes=substr($variable,5,2);
	$fecha=substr($variable,8,2)." de ".$meses[($mes-1)]." de ".substr($variable,0,4);
	return $fecha;
}

//funcion que calcula la cantidad de dias que faltan para un evento
function Faltan_X_Dias($fecha_final) {  
    $fecha_actual = date("Y-m-d");  
    $s = strtotime($fecha_final)-strtotime($fecha_actual);  
    $d = intval($s/86400);  
    $diferencia = $d;  
    return $diferencia;  
}

//funcion que saca la url de la imagen de la nota
function Sacar_Imagen_Nota ($nota) {
	$re_extractImages = '/<img.*?src=["\'](.*?)["\']/s';
 
	// uso de preg_mach_all con la expresion regular
	preg_match_all($re_extractImages, $nota , $matches );
	// pasamos a variable solo el que nos interesa
	
	if (!empty($matches[1])) {
		$url=$matches[1];
		$url=str_replace(_url_sitio_web, "/", $url);
		return $url[0];
	}
	else {
		return;	
	}

}

//funcion que elimina las imagenes de la nota
function Nota_Sin_Imagen ($nota) {
	$contenido_a_limpiar = '<img[^>]*>';
	//retorna el contenido html sin las imagenes
	return eregi_replace($contenido_a_limpiar,'',$nota);
}

//funcion  para enviar emails
function Enviar_Email ($nombre_escribe, $email_escribe, $destino, $asunto ,$mensaje) {
	$fecha=date ('d/m/Y H:i');
	$contenido="Nombre: ".$nombre_escribe."\nEmail: ".$email_escribe."\nFecha: ".$fecha."\n\nAsunto: ".$asunto."\n\n".$mensaje;
  	$cabeceras ="FROM:".$email_escribe;
  	if (mail($destino,$asunto,$contenido,$cabeceras)) {
  		return true;
  	}  else {
  		return false;
  	}      
}
function sanear_texto ($cadena) {
	    $texto_limpio=str_replace("\\", "/", $cadena);
    	$texto_limpio=trim(str_replace("'", "`", $cadena));
    	return $texto_limpio;
    }
//funcion cambiar fecha a formato base de datos
function Fecha_BD ($fecha) {
	$nuevafecha=substr($fecha,6,4)."-".substr($fecha,3,2)."-".substr($fecha,0,2);
	return $nuevafecha;
}
//funcion cambiar fecha a formato base de datos
function Fecha_Calendario ($fecha) {
	$nuevafecha=substr($fecha,8,2)."/".substr($fecha,5,2)."/".substr($fecha,0,4);
	return $nuevafecha;
}
//funcion que cambia la fecha y hora de la BD a tipo calendario
function Fecha_Calendario_Con_Hora ($fecha) {
	$nuevafecha=substr($fecha,8,2)."/".substr($fecha,5,2)."/".substr($fecha,0,4)." ".substr($fecha,10,9);
	return $nuevafecha;
}

function Fecha_ayer () {
	$ayer= date('d/m/Y', strtotime('-1 day'));
	return $ayer;
}
function Fecha_manana () {
	$manana= date('d/m/Y', strtotime('+1 day'));
	return $manana;
}
function Fecha_dia($nombredia) {
$dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sábado','Domingo');
$fecha = $dias[date('N', strtotime($nombredia))-1];
return $fecha;
}

function Fecha_menor_o_igual ($fecha) {
	$fecha_actual=date("Y-m-d");
	if (strtotime($fecha_actual)<=strtotime($fecha)) {
		return true;
	} 
	else {
		return false;
	}
}

function sanear_string($string) {
    $string = trim($string);
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
    return $string;
}


?>