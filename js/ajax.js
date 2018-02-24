function ajaxFunction(){
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	return ajaxRequest;
}

function funcionBlanco()
{
	// Create a function that will receive data sent from the server
	var ajaxRequest = ajaxFunction();
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var res = ajaxRequest.responseText;
		}
	}
	ajaxRequest.open("GET", "", true);
	ajaxRequest.send(null); 
}
var intervalCorreos;
function comenzarEnvio()
{
	document.getElementById("cancelarEnvio").style.display ="";
	document.getElementById("comenzarEnvio").style.display ="none";
	intervalCorreos = window.setInterval("enviarCorreo()",5000);
	
}
function cancelarEnvio()
{
	document.getElementById("cancelarEnvio").style.display ="none";
	document.getElementById("comenzarEnvio").style.display ="";
	window.clearInterval(intervalCorreos);
	refrescarDatos();
}
function enviarCorreo()
{
	// Create a function that will receive data sent from the server
	var ajaxRequest = ajaxFunction();
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var res = ajaxRequest.responseText;
			if (res != "FIN")
				refrescarDatos();
			else
			{
				window.clearInterval(intervalCorreos);
				refrescarDatos();
				alert('Ha finalizado el envio');
			}
		}
	}
	ajaxRequest.open("GET", "ajax/enviar.php", true);
	ajaxRequest.send(null); 
}
function refrescarDatos()
{
	// Create a function that will receive data sent from the server
	var ajaxRequest = ajaxFunction();
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var res = ajaxRequest.responseText;
			document.getElementById("datosC").innerHTML = res;
		}
	}
	ajaxRequest.open("GET", "ajax/refrescar.php", true);
	ajaxRequest.send(null); 
}

/* ISHOP */
function eliminarC(cual)
{
	if(confirm('Esta seguro que desea eliminar este dato?')) {
	// Create a function that will receive data sent from the server
	var ajaxRequest = ajaxFunction();
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var res = ajaxRequest.responseText;
			window.location=window.location;
		}
	}
	ajaxRequest.open("GET", "ajax/eliminarColor.php?id=" + cual, true);
	ajaxRequest.send(null); 
	}
}
function eliminarT(cual)
{
	if(confirm('Esta seguro que desea eliminar este dato?')) {
	// Create a function that will receive data sent from the server
	var ajaxRequest = ajaxFunction();
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			var res = ajaxRequest.responseText;
			window.location=window.location;
		}
	}
	ajaxRequest.open("GET", "ajax/eliminarTalla.php?id=" + cual, true);
	ajaxRequest.send(null); 
	}
}