// JavaScript Document
function validarlogint()
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
			if (!validarVacio("logint_" + obl_login[i],t_login[cual_login]))
				return;

			cual_login++;
	}
	logint();
}

function logint()
{
		//document.getElementById("iuser_waiting").style.display="";
	 var formObj = $("#form_ltransp");
    var formData = new FormData(document.getElementById('form_ltransp'));
    $.ajax({
        url: '../gadgets/iuser_transp/ajax/logintransportista.php',
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

function arregloRegistro(){
	var textos = new Array();
		var i = 0;
		textos[i] = "Favor de ingresar la Razón Social"; i++;
		textos[i] = "Favor de ingresar el nombre del conductor"; i++;
		textos[i] = "Favor de ingresar un correo electrónico válido"; i++;
		textos[i] = "Favor de ingresar su contraseña"; i++;
		textos[i] = "Su contraseña no coincide en Reintroduce tu Contraseña"; i++;
		textos[i] = "Favor de ingresar su teléfono"; i++;
		textos[i] = "Favor de escribir el nombre del Banco"; i++;
		textos[i] = "Favor de escribir su número de cuenta"; i++;
		textos[i] = "Favor de escribir su CLABE Interbancaria"; i++;

		textos[i] = "Favor de escribir el propietario del vehículo"; i++;
		textos[i] = "Favor de escribir el no. de placas del vehículo"; i++;
		textos[i] = "Favor de escribir el no. de serie del vehículo"; i++;
		textos[i] = "Favor de escribir el tipo de vehículo"; i++;
		textos[i] = "Favor de escribir el año del vehículo"; i++;

		textos[i] = "Favor de seleccionar su estado"; i++;
		textos[i] = "Favor de seleccionar la marca del vehículo"; i++;
		textos[i] = "Favor de seleccionar la capacidad del vehículo"; i++;
		textos[i] = "Favor de seleccionar si su vehículo tiene refrigeración"; i++;
		textos[i] = "Favor de seleccionar si esta disponible para entregas"; i++;
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
	obl[oi] = 14; oi++;
	obl[oi] = 15; oi++;
	obl[oi] = 17; oi++;
	cual = 0;


	for(var i2 = 0; i2 < oi; i2++)
	{
		if(i2==2){
			if (!validateEmail("iusert_" + obl[i2], al[cual]))
				return;
			cual++;
		}else if(i2==4){
			if (!validarCoincidencia("iusert_4", "iusert_5", al[cual]))
				return;
			cual++;
		}else{
			if (!validarVacio("iusert_" + obl[i2],al[cual]))
				return document.getElementById("iusert_" + obl[i2]).focus();;
			cual++;
		}
	}

	if (!validarSeleccion("iusert_8", al[cual]))
		return;
	cual++;
	if (!validarSeleccion("iusert_16", al[cual]))
		return;
	cual++;
	if (!validarSeleccion("iusert_18", al[cual]))
		return;
	cual++;
	if (!validarSeleccion("iusert_19", al[cual]))
		return;
	cual++;
	if (!validarSeleccion("iusert_20", al[cual]))
		return;
	cual++;

	if (!validarChecked("chkt_1", al[cual]))
		return;
	cual++;

		ajaxRegistroT();
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
	ajaxRequest.open("GET", "../gadgets/iuser_transp/ajax/salir.php", true);
	ajaxRequest.send(null);
}

function cambioDisp()
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
	ajaxRequest.open("GET", "../gadgets/iuser_transp/ajax/cambDisp.php", true);
	ajaxRequest.send(null);
}

function ajaxRegistroT(){
	//alert("e");
	document.getElementById("iuser_waiting").style.display="";
	var formObjT = $("#form_registert");
	    var formDataT = new FormData(document.getElementById('form_registert'));
	    $.ajax({
	        url: '../gadgets/iuser_transp/ajax/email.php',
	    type: 'POST',
	        data:  formDataT,
	    mimeType:"multipart/form-data",
	    contentType: false,
	        cache: false,
	        processData:false
	}).done(function (res) {

		//document.getElementById("iuser_waiting").style.display="none";
		if (res == "OK")
		{
		registerUserT();
		}
		else
		{
		alerta1(res);
		//document.getElementById("iuser_2").focus();
		}
	}).fail(function () {

	});
}

function registerUserT()
{
		//document.getElementById("iuser_waiting").style.display="";
	 var formObj = $("#form_registert");
    var formData = new FormData(document.getElementById('form_registert'));
    $.ajax({
        url: '../gadgets/iuser_transp/ajax/register.php',
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

function marcarEntregado(idpe)
{
		//document.getElementById("iuser_waiting").style.display="";
		var algo = idpe;
    $.ajax({
			type:'POST',
			url:'../gadgets/iuser_transp/ajax/entregar.php',
			data:'id='+algo,
	}).done(function (response) {
		document.getElementById("iuser_waiting").style.display="none";
			if (response == "OK") {
				window.location="transportista";
			}else{
				alerta1(response);
			}
	}).fail(function () {

	});

}

//calificar a los demás
function verificarCalif(idp){
	var calif_text = new Array();
	calif_text[1] = "Favor de escribir un comentario constructivo para Productor";
	calif_text[2] = "Favor de escribir un comentario constructivo para Cliente";

	if (!validarVacio("c1_6",calif_text[1]))
		return;
	if (!validarVacio("c2_6",calif_text[2]))
		return;

	calificar(idp);
}

function calificar(id){
	//alerta1(id);
	var algo = id;
	var formObjCalif = $("#Calif");
	var formDataCalif = new FormData(document.getElementById('Calif'));
	formDataCalif.append("id", algo);
	$.ajax({
		type:'POST',
		url:'../gadgets/iuser_transp/ajax/calificar.php',
		data: formDataCalif,
		mimeType:"multipart/form-data",
		contentType: false,
	  cache: false,
	  processData:false
}).done(function (response) {
	document.getElementById("iuser_waiting").style.display="none";
		if (response == "OK") {
			window.location="cliente";
		}else{
			alerta1(response);
		}
}).fail(function () {

});
}
