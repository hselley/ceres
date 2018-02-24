function validarVacio(nombre, texto)
{
	var x= document.getElementById(nombre);
	if (trim(x.value) == "")
	{x.focus();alerta1(texto);return false;}
	return true;
}
function validateEmail(email, texto) {
	var x= document.getElementById(email);
	var patt = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (patt.test(trim(x.value))){
		return true;
	}else {
		x.focus();alerta1(texto);return false;
	}
}

function validarCoincidencia(c1, c2, texto)
{
	var pswd1= document.getElementById(c1);
	var pswd2= document.getElementById(c2);
	if (trim(pswd1.value) != trim(pswd2.value))
	{pswd2.focus();alerta1(texto);return false;}
	return true;
}
function validarSeleccion(nombre, texto)
{
	var x= document.getElementById(nombre);
	if (x.selectedIndex == 0)
	{x.focus();alerta1(texto);return false;}
	return true;
}

function validarChecked(nombre, texto)
{
	var x= document.getElementById(nombre);
	if (x.checked == false)
	{x.focus();alerta1(texto);return false;}
	return true;
}

function trim (myString)
{
	return myString.replace(/^\s+/g,'').replace(/\s+$/g,'')
}
function acentos2(cual)
{
	 cual = cual.replace('�','\u00e1');
     cual = cual.replace('�','\u00e9');
     cual = cual.replace('�','\u00ed');
     cual = cual.replace('�','\u00f3');
     cual = cual.replace('�','\u00fa');
     cual = cual.replace('�','\u00c1');
     cual = cual.replace('�','\u00c9');
     cual = cual.replace('�','\u00cd');
     cual = cual.replace('�','\u00d3');
     cual = cual.replace('�','\u00da');
     cual = cual.replace('�','\u00f1');
     cual = cual.replace('�','\u00d1');
	 return cual;
}

function alerta1(x)
{
	alert(acentos2(x));
}
