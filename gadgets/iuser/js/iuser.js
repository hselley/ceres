// JavaScript Document
function validarlogin()
{
	var t_login = new Array();
	t_login[0] = "Favor de ingresar correo electrónico registrado"; i++;
	t_login[1] = "Favor de ingresar la contraseña"; i++;
	var obl_login = new Array(); var oi_login = 0;
	obl_login[oi_login] = 1; oi_login++;
	obl_login[oi_login] = 2; oi_login++;

	cual_login = 0;
	for(var i = 0; i < oi_login; i++)
	{
			if (!validarVacio("login_" + obl_login[i],t_login[cual_login]))
				return;

			cual_login++;
	}
	loginpr();
}

function loginpr()
{
		//document.getElementById("iuser_waiting").style.display="";
	 var formObj = $("#form4");
    var formData = new FormData(document.getElementById('form4'));
    $.ajax({
        url: '../gadgets/iuser/ajax/loginproductor.php',
    type: 'POST',
        data:  formData,
    mimeType:"multipart/form-data",
    contentType: false,
        cache: false,
        processData:false
	}).done(function (response) {
		//document.getElementById("iuser_waiting").style.display="none";
			if (response == "OK") {
			//window.location=window.location;
			location.reload();
			}
			else
			{
				alerta1(response);
			}
	}).fail(function () {

	});

}

function arregloRegistro()
{
	var textos = new Array();
		var i = 0;
		textos[i] = "Favor de ingresar su nombre"; i++;
		textos[i] = "Favor de ingresar su apellido"; i++;
		textos[i] = "Favor de ingresar un correo electrónico válido"; i++;
		//textos[i] = "Su correo electrónico ya está registrado. Inicie Sesión."; i++;
		textos[i] = "Favor de ingresar su contraseña"; i++;
		textos[i] = "Su contraseña no coincide en Reintroduce tu Contraseña"; i++;
		textos[i] = "Favor de ingresar su teléfono"; i++;
		textos[i] = "Favor de escribir sobre su terreno agrícola"; i++;
		textos[i] = "Favor de escribir sus características técnico-productivas"; i++;
		textos[i] = "Favor de escribir el nombre del Banco"; i++;
		textos[i] = "Favor de escribir su número de cuenta"; i++;
		textos[i] = "Favor de escribir su CLABE Interbancaria"; i++;
		textos[i] = "Favor de seleccionar su estado"; i++;
		textos[i] = "Favor de aceptar las condiciones de participación"; i++;
	return textos;
}

function validarRegistro()
{
	var al = arregloRegistro();
	var obl = new Array(); var oi = 0;
	obl[oi] = 1; oi++;
	obl[oi] = 2; oi++;
	obl[oi] = 3; oi++;
	obl[oi] = 4; oi++;
	obl[oi] = 5; oi++;
	obl[oi] = 6; oi++;
	obl[oi] = 9; oi++;
	obl[oi] = 10; oi++;
	obl[oi] = 11; oi++;
	obl[oi] = 12; oi++;
	obl[oi] = 13; oi++;
	cual = 0;
	for(var i2 = 0; i2 < oi; i2++)
	{
		if(i2==2){
			if (!validateEmail("iuser_" + obl[i2], al[cual]))
				return;
			cual++;
			/*if (!validateExEmail("iuser_" + obl[i2], al[cual]))
				return;
			cual++;*/
		}else if(i2==4){
			if (!validarCoincidencia("iuser_4", "iuser_5", al[cual]))
				return;
			cual++;
		}else{
			if (!validarVacio("iuser_" + obl[i2],al[cual]))
				return document.getElementById("iuser_" + obl[i2]).focus();;
			cual++;
		}
	}

	if (!validarSeleccion("iuser_8", al[cual]))
		return;
	cual++;

	if (!validarChecked("chk_1", al[cual]))
		return;
	cual++;

		registerUser();
}

function ajaxLogOut()
{
	// Create a function that will receive data sent from the server
	var ajaxRequest = ajaxFunction();
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var res = ajaxRequest.responseText;
			document.getElementById("iuser_waiting").style.display="none";
			var location = window.location.toString();
			if (location.indexOf("?code=") >= 0)
			{

				window.location = location.substring(0,location.indexOf("?code="));
			}
			else
				window.location = window.location;
		}
	}
	document.getElementById("iuser_waiting").style.display="";
	ajaxRequest.open("GET", "../gadgets/iuser/ajax/salir.php", true);
	ajaxRequest.send(null);
}

function registerUser()
{
		//document.getElementById("iuser_waiting").style.display="";
	 var formObj = $("#form3");
    var formData = new FormData(document.getElementById('form3'));
    $.ajax({
		    url: '../gadgets/iuser/ajax/register.php',
		    type: 'POST',
		    data:  formData,
		    mimeType:"multipart/form-data",
		    contentType: false,
        cache: false,
        processData:false
	}).done(function (response) {
		//document.getElementById("iuser_waiting").style.display="none";
			if (response == "OK") {
			window.location=window.location;
			}
			else
			{
				alerta1(response);
			}
	}).fail(function () {

	});

}

function arregloRegistroP()
{
	var textos_prod = new Array();
		var i = 0;
		textos_prod[i] = "Favor de ingresar el nombre del producto"; i++;
		textos_prod[i] = "Favor de ingresar el tipo del producto"; i++;
		textos_prod[i] = "Favor de ingresar las características"; i++;
		textos_prod[i] = "Favor de ingresar el precio unitario"; i++;
		textos_prod[i] = "Favor de ingresar el empaque"; i++;
		textos_prod[i] = "Favor de ingresar el volumen"; i++;
		textos_prod[i] = "Favor de indicar la unidad de medida del producto"; i++;
		textos_prod[i] = "Favor de indicar la disponibilidad del producto"; i++;
		textos_prod[i] = "Favor de indicar la fecha de fin de oferta"; i++;
		textos_prod[i] = "Favor seleccionar una foto"; i++;
	return textos_prod;
}

function validarRegistroP()
{
	var al_prod = arregloRegistroP();
	var obl_prod = new Array(); var oi_prod = 0;
	obl_prod[oi_prod] = 1; oi_prod++;
	obl_prod[oi_prod] = 2; oi_prod++;
	obl_prod[oi_prod] = 3; oi_prod++;
	obl_prod[oi_prod] = 4; oi_prod++;
	obl_prod[oi_prod] = 5; oi_prod++;
	obl_prod[oi_prod] = 6; oi_prod++;
	obl_prod[oi_prod] = 7; oi_prod++;
	obl_prod[oi_prod] = 8; oi_prod++;
	obl_prod[oi_prod] = 9; oi_prod++;
	obl_prod[oi_prod] = 10; oi_prod++;

	cual_prod = 0;
	for(var i3 = 0; i3 < oi_prod; i3++)
	{
			if (!validarVacio("prod_" + obl_prod[i3],al_prod[cual_prod]))
				return document.getElementById("prod_" + obl_prod[i3]).focus();;
			cual_prod++;
	}

		registerProductos();
}

function registerProductos()
{
		//document.getElementById("iuser_waiting").style.display="";
	 var formObj = $("#form_PROD");
    var formData = new FormData(document.getElementById('form_PROD'));
    $.ajax({
        url: '../gadgets/iuser/ajax/registerP.php',
    type: 'POST',
        data:  formData,
    mimeType:"multipart/form-data",
    contentType: false,
        cache: false,
        processData:false
	}).done(function (response) {
		//document.getElementById("iuser_waiting").style.display="none";
			if (response == "OK") {
			window.location=window.location;
			}
			else
			{
				alerta1(response);
			}
	}).fail(function () {

	});

}
