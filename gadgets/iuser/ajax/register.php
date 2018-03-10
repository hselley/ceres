<?php  $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$i = 1;
while(isset($_POST["iuser_".$i]))
{
	$values[$i] =trim(revisarString($_POST["iuser_".$i]));
	$i++;
}
$cual = 0;
	$campos[$cual] = 'Nombre';
	$datos[$cual] = ($values[1]);$cual++;
	$campos[$cual] = 'Apellido';
	$datos[$cual] = ($values[2]);$cual++;
	$campos[$cual] = 'Email';
	$datos[$cual] = ($values[3]);$cual++;
	$campos[$cual] = 'Password';
	$datos[$cual] = ($values[4]);$cual++;
	$campos[$cual] = 'Telefono';
	$datos[$cual] = ($values[6]);$cual++;
	$campos[$cual] = 'Celular';
	$datos[$cual] = ($values[7]);$cual++;
	$campos[$cual] = 'Estado';
	$datos[$cual] = ($values[8]);$cual++;
	$campos[$cual] = 'Terreno';
	$datos[$cual] = ($values[9]);$cual++;
	$campos[$cual] = 'Productivas';
	$datos[$cual] = ($values[10]);$cual++;
	$campos[$cual] = 'Banco';
	$datos[$cual] = ($values[11]);$cual++;
	$campos[$cual] = 'Cuenta';
	$datos[$cual] = ($values[12]);$cual++;
	$campos[$cual] = 'Clabe';
	$datos[$cual] = ($values[13]);$cual++;
	$campos[$cual] = 'Status';
	$datos[$cual] = 'ACTI';$cual++;

	$error = insertar($campos,$datos,"productor_2");
	$_SESSION["NumProductor"]  = $error[1];
	echo("OK");
?>
