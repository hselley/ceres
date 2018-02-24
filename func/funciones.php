<?
session_start();
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
date_default_timezone_set ('America/Mexico_City');
$pages = explode("/",$_SERVER['PHP_SELF']);
$folder = $pages[count($pages)-2];
$page = $pages[count($pages)-1];
include("variables.php");

require($ruta_home."/func/conexion.php");
require($ruta_home."/func/formas.php");
$usuariosHabilitar = true;

if ($usuariosHabilitar == true)
{
	include($ruta_home."/gadgets/iuser/iuser_func.php");
}
if(file_exists("code_behind/$page"))
{
	require("code_behind/$page");
}


function alerta($mensaje)
{
	echo("<script>alert('".reemplazarAcentos(utf8_encode($mensaje))."');</script>");
}
function reemplazarAcentos($cual)
{
	 $cual = str_replace('á','\u00e1',$cual);
     $cual = str_replace('é','\u00e9',$cual);
     $cual = str_replace('í','\u00ed',$cual);
     $cual = str_replace('ó','\u00f3',$cual);
     $cual = str_replace('ú','\u00fa',$cual);
     $cual = str_replace('Á','\u00c1',$cual);
     $cual = str_replace('É','\u00c9',$cual);
     $cual = str_replace('Í','\u00cd',$cual);
     $cual = str_replace('Ó','\u00d3',$cual);
     $cual = str_replace('Ú','\u00da',$cual);
     $cual = str_replace('ñ','\u00f1',$cual);
     $cual = str_replace('Ñ','\u00d1',$cual);
	 return $cual;
}
?>
