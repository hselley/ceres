<?php $tipo = "1";  include("../../../func/funciones.php");

  $usr = revisarString($_POST["iuser_3"]);
  $t = validarEmail($usr);
  if ($t[0]  == "")
  {
  echo("OK");
  }
  else
  {
  echo("ERROR: Este correo ya está registrado");
  }


?>
