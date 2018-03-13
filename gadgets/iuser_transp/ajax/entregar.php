<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

	$cual = 0;
		$campos[$cual] = 'EntregadoT';
		$datos[$cual] = ("SI");$cual++;
		$idaelim=$_POST['id'];
		$errorc = actualizar($campos,$datos,"pedido", $idaelim);
		echo("OK");

?>
