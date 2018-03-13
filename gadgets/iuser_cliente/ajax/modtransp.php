<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

	$ic = 1;
	$cualc = 0;
		$camposc[$cualc] = 'ID_Transportista';
		$datosc[$cualc] = ($_POST["ntr"]);$cualc++;
		$tabla="carrito";


		$errorc = actualizarcart($camposc, $datosc, "carrito", $_SESSION['NumCliente'], $_POST["prod"]);
		echo("OK");

?>
