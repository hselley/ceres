<? $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$i = 1;
while(isset($_POST["iuser_".$i]))
{
	$values[$i] =trim(revisarString($_POST["iuser_".$i]));
	$i++;
}
$cual = 0;
	$campos[$cual] = 'RazonSocial';
	$datos[$cual] = ($values[1]);$cual++;
	$campos[$cual] = 'Conductor';
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
	$campos[$cual] = 'Banco';
	$datos[$cual] = ($values[9]);$cual++;
	$campos[$cual] = 'Cuenta';
	$datos[$cual] = ($values[10]);$cual++;
	$campos[$cual] = 'Clabe';
	$datos[$cual] = ($values[11]);$cual++;
	$campos[$cual] = 'Disponible';
	$datos[$cual] = ($values[20]);$cual++;
	$campos[$cual] = 'Status';
	$datos[$cual] = 'ACTI';$cual++;
	$campos[$cual] = 'Codigo';
	$datos[$cual] = 'Falta';$cual++;
	$error = insertar($campos,$datos,"transportista_2");
	$_SESSION["NumTransportista"]  = $error[1];


$cual = 0;
		$campo[$cual] = 'Transportista';
		$dato[$cual] = ($error[1]);$cual++;
		$campo[$cual] = 'Propietario';
		$dato[$cual] = ($values[12]);$cual++;
		$campo[$cual] = 'Placas';
		$dato[$cual] = ($values[13]);$cual++;
		$campo[$cual] = 'No_Serie';
		$dato[$cual] = ($values[14]);$cual++;
		$campo[$cual] = 'Anio';
		$dato[$cual] = ($values[17]);$cual++;
		$campo[$cual] = 'Tipo';
		$dato[$cual] = ($values[15]);$cual++;
		$campo[$cual] = 'Marca';
		$dato[$cual] = ($values[16]);$cual++;
		$campo[$cual] = 'Capacidad';
		$dato[$cual] = ($values[18]);$cual++;
		$campo[$cual] = 'Refrigeracion';
		$dato[$cual] = ($values[19]);$cual++;

		$error = insertar($campo,$dato,"vehiculo_2");
		$_SESSION["NumVehiculo"]  = $error[1];

	 echo("OK");
?>
