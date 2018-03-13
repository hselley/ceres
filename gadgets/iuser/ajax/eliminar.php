<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

	$cual = 0;
		$campos[$cual] = 'Oferta_fin';
		$datos[$cual] = ("2000-01-01");$cual++;
		$idaelim=$_POST['id'];
		$errorc = actualizar($campos,$datos,"producto", $idaelim);
		echo("OK");

?>
