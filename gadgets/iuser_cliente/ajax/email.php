<?php $tipo = "1";  include("../../../func/funciones.php");

  $usr = revisarString($_POST["iuserc_3"]);
  $t = validarEmailC($usr);
  if ($t[0]  == "")
  {
  echo("OK");
  }
  else
  {
  echo("ERROR: Este correo ya está registrado");
  }


?>
