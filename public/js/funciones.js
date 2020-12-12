function cargarDiv(div,url){
    $('#' + div).load(url);
}

function patoescondido(cual) {
 var c=document.getElementById(cual)
 if(c.style.display=='none') {
      c.style.display='block';
 } else {
      c.style.display='none';
 }    return false;
}

function AutocompletarForm (PalabrasClave, DivDestino, ArchivoBuscador, idBuscador){
  var dataString = idBuscador + '=' + PalabrasClave + '&DivDestino=' + DivDestino ;
  $.ajax({	
      type: "POST",
      url: ArchivoBuscador,
      data: dataString,
      success: function(data) {
          $('#' + DivDestino).fadeIn(0).html(data);            
      }
  });	
}

function EnviarPosts (DivDestino, ArchivoBuscador, JuegoDePosts){  // formato del juego de post:  &variable1=contenido1&variable2=contenido2
  var dataString = 'DivDestino=' + DivDestino + JuegoDePosts;
  $.ajax({	
      type: "POST",
      url: ArchivoBuscador,
      data: dataString,
      success: function(data) {
          $('#' + DivDestino).fadeIn(0).html(data);            
      }
  });	
}

function on_off(cual, condicion) {
 var c=document.getElementById(cual)
 if (condicion==='on') {
      c.style.display='block';
  } else {
      c.style.display='none';
  } return false;
}

function enviar(formulario){
  document.getElementById(formulario).submit();
} 

function imprimirSeleccion(muestra)	{
  var ficha=document.getElementById(muestra);
  ficha.style.display="block";
  var ventimp=window.open(' ','popimpr');
  ventimp.document.write(ficha.innerHTML);
  ficha.style.display="none";
  ventimp.document.close();
  setTimeout(function(){ ventimp.print();ventimp.close();},100);
}	

function imprimir(muestra)	{
  var ficha=document.getElementById(muestra);
  var ventimp=window.open(' ','popimpr');
  ventimp.document.write(ficha.innerHTML);
  //ventimp.document.close();
  //setTimeout(function(){ 
  ventimp.print();
  ventimp.close();
  //},50);
}	

function enter(e, CajaTexto) {
var tecla = (document.all) ? e.keyCode : e.which;
if (tecla==13) {
    if (CajaTexto==="NitCliente") { var c = document.getElementById("NombreCliente"); c.select(); }
  if (CajaTexto==="NombreCliente") { var c = document.getElementById("TelefonoCliente"); c.select(); }
  if (CajaTexto==="TelefonoCliente") { var c = document.getElementById("NitCliente"); c.select(); }
}
}

function currency(value, decimals, separators) {
  decimals = decimals >= 0 ? parseInt(decimals, 0) : 2;
  separators = separators || [".", "'", ','];
  var number = (parseFloat(value) || 0).toFixed(decimals);
  if (number.length <= (4 + decimals))
      return number.replace('.', separators[separators.length - 1]);
  var parts = number.split(/[-.]/);
  value = parts[parts.length > 1 ? parts.length - 2 : 0];
  var result = value.substr(value.length - 3, 3) + (parts.length > 1 ?
      separators[separators.length - 1] + parts[parts.length - 1] : '');
  var start = value.length - 6;
  var idx = 0;
  while (start > -3) {
      result = (start > 0 ? value.substr(start, 3) : value.substr(0, 3 + start))
          + separators[idx] + result;
      idx = (++idx) % 2;
      start -= 3;
  }
  return (parts.length == 3 ? '-' : '') + result;
}

function MaysPrimera(string){ 
  return string.substr(0,1).toUpperCase()+string.substr(1,string.length);
}

function checkselected(radio) {
  for (i=0; i<radio.length; i++) {
      if (radio[i].checked) { return i; }
  }
  return false
}

function Insertar_Html(div,contenido) {
  document.getElementById(div).innerHTML = contenido;	
}

function solonumeros (e) {
      key=e.keycode || e.which;
      teclado=String.fromCharCode(key);
      numeros="0123456789.";
      especiales="8-37-38-46";//array teclas backspace, left, right, delete
      teclado_especial=false;

      for (var i in especiales) {
          if (key==especiales[i]) {
              teclado_especial=true;
          }
      }

      if (numeros.indexOf(teclado)==-1 && !teclado_especial) {
          return false;
      }
}
function solonumeros2 (e) {
      key=e.keycode || e.which;
      teclado=String.fromCharCode(key);
      numeros="0123456789";
      especiales="8-37-38-46";//array teclas backspace, left, right, delete
      teclado_especial=false;

      for (var i in especiales) {
          if (key==especiales[i]) {
              teclado_especial=true;
          }
      }

      if (numeros.indexOf(teclado)==-1 && !teclado_especial) {
          return false;
      }
}

function sololetrasynumeros (e) {
      key=e.keycode || e.which;
      teclado=String.fromCharCode(key);
      numeros="0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ. ";
      especiales="8-37-38-46";//array teclas backspace, left, right, delete
      teclado_especial=false;

      for (var i in especiales) {
          if (key==especiales[i]) {
              teclado_especial=true;
          }
      }

      if (numeros.indexOf(teclado)==-1 && !teclado_especial) {
          return false;
      }
}
function aparecer (contenedor) {
      $("#" + contenedor).fadeIn("slow");
}

