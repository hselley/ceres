// JavaScript Document

//Inicio de Sesión de Cliente
function validarloginc()
{
	var tc_login = new Array();
	tc_login[0] = "Favor de ingresar correo electrónico registrado";
	tc_login[1] = "Favor de ingresar la contraseña";
	var obl_lc = new Array(); var oi_lc = 0;
	obl_lc[oi_lc] = 1; oi_lc++;
	obl_lc[oi_lc] = 2; oi_lc++;

	cual_lc = 0;
	for(var i_lc = 0; i_lc < oi_lc; i_lc++)
	{
			if (!validarVacio("loginc_" + obl_lc[i_lc],tc_login[cual_lc]))
				return;
			cual_lc++;
	}
	loginc();
}

function loginc()
{
		//document.getElementById("iuser_waiting").style.display="";
	 var formObj = $("#LIClient");
    var formData = new FormData(document.getElementById('LIClient'));
    $.ajax({
        url: '../gadgets/iuser_cliente/ajax/loginclient.php',
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

//Registro de Clientes a la Plataforma
function arregloRegistroC()
{
	var textos = new Array();
		var i = 0;
		textos[i] = "Favor de ingresar su razón social"; i++;
		textos[i] = "Favor de ingresar su RFC"; i++;
		textos[i] = "Favor de ingresar un correo electrónico válido"; i++;
		textos[i] = "Favor de ingresar su contraseña"; i++;
		textos[i] = "Su contraseña no coincide en Reintroduce tu Contraseña"; i++;
		textos[i] = "Favor de ingresar su teléfono"; i++;
		textos[i] = "Favor de ingresar su celular"; i++;
		textos[i] = "Favor de ingresar su calle"; i++;
		textos[i] = "Favor de ingresar su número exterior"; i++;
		textos[i] = "Favor de ingresar su número de tarjeta"; i++;
		textos[i] = "Favor de escribir el CVV correspondiente a su tarjeta"; i++;
		textos[i] = "Favor de seleccionar su estado"; i++;
		textos[i] = "Favor de seleccionar su municipio"; i++;
		textos[i] = "Favor de seleccionar su código postal"; i++;
		textos[i] = "Favor de seleccionar su colonia"; i++;
		textos[i] = "Favor de aceptar las condiciones de participación"; i++;
	return textos;
}

function validarRegistroC()
{
	var al_c = arregloRegistroC();
	var obl_c = new Array(); var oi_c = 0;
	obl_c[oi_c] = 1; oi_c++;
	obl_c[oi_c] = 2; oi_c++;
	obl_c[oi_c] = 3; oi_c++;
	obl_c[oi_c] = 4; oi_c++;
	obl_c[oi_c] = 5; oi_c++;
	obl_c[oi_c] = 6; oi_c++;
	obl_c[oi_c] = 7; oi_c++;
	obl_c[oi_c] = 12; oi_c++;
	obl_c[oi_c] = 13; oi_c++;
	obl_c[oi_c] = 15; oi_c++;
	obl_c[oi_c] = 16; oi_c++;

	cual_c = 0;
	for(var ic = 0; ic < oi_c; ic++)
	{
		if(ic==2){
			if (!validateEmail("iuserc_" + obl_c[ic], al_c[cual_c]))
				return;
			cual_c++;
		}else if(ic==4){
			if (!validarCoincidencia("iuserc_4", "iuserc_5", al_c[cual_c]))
				return;
			cual_c++;
		}else{
			if (!validarVacio("iuserc_" + obl_c[ic],al_c[cual_c]))
				return;
			cual_c++;
		}
	}

	if (!validarSeleccion("iuserc_8", al_c[cual_c]))
		return;
	cual_c++;
	if (!validarSeleccion("iuserc_9", al_c[cual_c]))
		return;
	cual_c++;
	if (!validarSeleccion("iuserc_10", al_c[cual_c]))
		return;
	cual_c++;
	if (!validarSeleccion("iuserc_11", al_c[cual_c]))
		return;
	cual_c++;

	if (!validarChecked("chk_1", al_c[cual_c]))
		return;
	cual_c++;
	var i=1;
		ajaxRegistroC();
}

function registerClient()
{
		//document.getElementById("iuser_waiting").style.display="";
	 var formObj = $("#RClient");
    var formData = new FormData(document.getElementById('RClient'));
    $.ajax({
        url: '../gadgets/iuser_cliente/ajax/register.php',
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

function ajaxRegistroC(){
	//alert("e");
	document.getElementById("iuser_waiting").style.display="";
	var formObj2 = $("#RClient");
	    var formData2 = new FormData(document.getElementById('RClient'));
	    $.ajax({
	        url: '../gadgets/iuser_cliente/ajax/email.php',
	    type: 'POST',
	        data:  formData2,
	    mimeType:"multipart/form-data",
	    contentType: false,
	        cache: false,
	        processData:false
	}).done(function (result) {
	//document.getElementById("iuser_waiting").style.display="none";
	if (result == "OK")
	{
	registerClient();
	}
	else
	{
	alerta1(result);
	//document.getElementById("iuser_2").focus();
	}
	}).fail(function () {

	});
}

//Agreagar al Carrito de COMPRAS
function validarAddCart()
{
	var ac_text = new Array();
	ac_text[0] = "Favor de ingresar seleccionar un transportista disponible para entrega";

	if (!validarSeleccion("cadd_2", ac_text[0]))
		return;

	AddToCart();
}

function AddToCart()
{
	document.getElementById("iuser_waiting").style.display="";
	var formObjCart = $("#ACart");
	var formDataCart = new FormData(document.getElementById('ACart'));
	$.ajax({
		url: '../gadgets/iuser_cliente/ajax/addcart.php',
	  type: 'POST',
	  data:  formDataCart,
	  mimeType:"multipart/form-data",
	  contentType: false,
	  cache: false,
	  processData:false
	}).done(function (carro) {
	//document.getElementById("iuser_waiting").style.display="none";
		if (carro == "OK")
		{
			window.location=window.location;
		}
		else
		{
			alerta1(carro);
			//document.getElementById("iuser_2").focus();
		}
	}).fail(function () {

	});
}

//Modificación del Carrito de COMPRAS
function updateCart()
{
	document.getElementById("iuser_waiting").style.display="";
	var formObjCart = $("#MCart");
	var formDataCart = new FormData(document.getElementById('MCart'));
	$.ajax({
		url: '../gadgets/iuser_cliente/ajax/modcart.php',
	  type: 'POST',
	  data:  formDataCart,
	  mimeType:"multipart/form-data",
	  contentType: false,
	  cache: false,
	  processData:false
	}).done(function (carro) {
	//document.getElementById("iuser_waiting").style.display="none";
		if (carro == "OK")
		{
			//window.location=window.location;
		}
		else
		{
			alerta1(carro);
			//document.getElementById("iuser_2").focus();
		}
	}).fail(function () {

	});
}

function updateTransp()
{
	alerta1("entre");
	document.getElementById("iuser_waiting").style.display="";
	var formObjCart = $("#NewT");
	var formDataCart = new FormData(document.getElementById('NewT'));
	$.ajax({
		url: '../gadgets/iuser_cliente/ajax/modtransp.php',
	  type: 'POST',
	  data:  formDataCart,
	  mimeType:"multipart/form-data",
	  contentType: false,
	  cache: false,
	  processData:false
	}).done(function (transp) {
	//document.getElementById("iuser_waiting").style.display="none";
		if (transp == "OK")
		{
			//window.location=window.location;
		}
		else
		{
			alerta1(transp);
			//document.getElementById("iuser_2").focus();
		}
	}).fail(function () {

	});
}

function deleteCart()
{
	document.getElementById("iuser_waiting").style.display="";
	var formObjCart = $("#MCart");
	var formDataCart = new FormData(document.getElementById('MCart'));
	$.ajax({
		url: '../gadgets/iuser_cliente/ajax/elimcart.php',
	  type: 'POST',
	  data:  formDataCart,
	  mimeType:"multipart/form-data",
	  contentType: false,
	  cache: false,
	  processData:false
	}).done(function (carro) {
	//document.getElementById("iuser_waiting").style.display="none";
		if (carro == "OK")
		{
			//window.location=window.location;
		}
		else
		{
			alerta1(carro);
			//document.getElementById("iuser_2").focus();
		}
	}).fail(function () {

	});
}

function finCompra(){
	alerta1("Su pedido se está procesando...");
	$.ajax({
		url: '../gadgets/iuser_cliente/ajax/finalizarC.php',
	}).done(function (result) {
		if (result == "OK")
		{
			window.location="gracias";
		}
		else
		{
			alerta1(result);
			//document.getElementById("iuser_2").focus();
		}
	}).fail(function () {

	});
}

//calificar a los demás
function verificarCalif(idp){
	var calif_text = new Array();
	calif_text[1] = "Favor de escribir un comentario constructivo para Productor";
	calif_text[2] = "Favor de escribir un comentario constructivo para Transportista";

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
		url:'../gadgets/iuser_cliente/ajax/calificar.php',
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

//Cierre de Sesión del Cliente
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
	ajaxRequest.open("GET", "../gadgets/iuser_cliente/ajax/salir.php", true);
	ajaxRequest.send(null);
}

function marcarEntregado(idpe)
{
		//document.getElementById("iuser_waiting").style.display="";
		var algo = idpe;
    $.ajax({
			type:'POST',
			url:'../gadgets/iuser_cliente/ajax/entregar.php',
			data:'id='+algo,
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
