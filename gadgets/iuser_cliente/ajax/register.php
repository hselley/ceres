<? $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$icr = 1;
while(isset($_POST["iuserc_".$icr]))
{
	$valuesc[$icr] =trim(revisarString($_POST["iuserc_".$icr]));
	$icr++;
}
$cualc = 0;
	$camposc[$cualc] = 'Nombre';
	$datosc[$cualc] = ($valuesc[1]);$cualc++;
	$camposc[$cualc] = 'Rfc';
	$datosc[$cualc] = ($valuesc[2]);$cualc++;
	$camposc[$cualc] = 'Email';
	$datosc[$cualc] = ($valuesc[3]);$cualc++;
	$camposc[$cualc] = 'Password';
	$datosc[$cualc] = ($valuesc[4]);$cualc++;
	$camposc[$cualc] = 'Telefono';
	$datosc[$cualc] = ($valuesc[6]);$cualc++;
	$camposc[$cualc] = 'Celular';
	$datosc[$cualc] = ($valuesc[7]);$cualc++;
	$camposc[$cualc] = 'DirGeneral';
	$datosc[$cualc] = ($valuesc[11]);$cualc++;
	$camposc[$cualc] = 'Calle';
	$datosc[$cualc] = ($valuesc[12]);$cualc++;
	$camposc[$cualc] = 'Numero';
	if($valuesc[14]==" "){
		$datosc[$cualc] = ($valuesc[13]);$cualc++;
	}else{
		$datosc[$cualc] = ($valuesc[13]."-".$valuesc[14]);$cualc++;
	}
	$camposc[$cualc] = 'Banco';
	$datosc[$cualc] = ($valuesc[15]);$cualc++;
	$camposc[$cualc] = 'Cuenta';
	$datosc[$cualc] = ($valuesc[16]);$cualc++;
	$camposc[$cualc] = 'Clabe';
	$datosc[$cualc] = ($valuesc[17]);$cualc++;

	$errorc = insertar($camposc,$datosc,"cliente");
	$_SESSION["NumCliente"]  = $errorc[1];
	echo("OK");
?>
