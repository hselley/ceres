<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

	$cual = 0;
		$campos[$cual] = 'PStatus';
		$datos[$cual] = ("SI");$cual++;
		$idaelim=$_POST['id'];
		$errorc = actualizar($campos,$datos,"pedido", $idaelim);

	$query2=seleccionar("SELECT ID_Transportista FROM pedido WHERE ID=".$idaelim);
	$row2=mysqli_fetch_array($query2);
	$cual2 = 0;
		$campos2[$cual2] = 'Status';
		$datos2[$cual2] = ("ACTI");$cual++;
		$idt=$row2['ID_Transportista'];
		$errorc2 = actualizar($campos2,$datos2,"transportista_2", $idt);
		echo("OK");

?>
