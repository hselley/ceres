<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

	$ic = 1;
	while(isset($_POST["cart_".$ic]))
	{
		$c[$ic] =trim(revisarString($_POST["cart_".$ic]));
		$ic++;
	}
	$cualc = 0;
		$camposc[$cualc] = 'CCantidad';
		$datosc[$cualc] = ($_POST[$c[1]]);$cualc++;
		$tabla="carrito";

		if($_POST["cart_1"]!=""){
			$errorc = actualizarcart($camposc, $datosc, "carrito", $_SESSION['NumCliente'], $_POST["cart_1"]);
			echo("OK");
		}else{
			echo("Selecciona un producto para ser modificado.");
		}
?>
