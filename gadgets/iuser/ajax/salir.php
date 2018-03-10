<?php
 $tipo = "1";  include("../../../func/funciones.php");
	removeCookie();
	session_start();
	session_unset();
	session_destroy();
  session_start();
  echo("OK");
?>
