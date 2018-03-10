<?php  $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$query = seleccionar("SELECT Disponible FROM transportista_2 WHERE Id='".$_SESSION['NumTransportista']."'");
$r = mysqli_fetch_array($query);

if($r['Disponible']==SI){
  $cual = 0;
  $campos[$cual] = 'Disponible';
  $datos[$cual] = 'NO';$cual++;
}else{
  $cual = 0;
  $campos[$cual] = 'Disponible';
  $datos[$cual] = 'SI';$cual++;
}
$error2 = actualizar($campos, $datos, "transportista_2", $_SESSION['NumTransportista']);

	 echo("OK");
?>
