<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

	$ic = 1;
	while(isset($_POST["cart_".$ic]))
	{
		$c[$ic] =trim(revisarString($_POST["cart_".$ic]));
		$ic++;
	}
	if($_POST["cart_1"]!=""){
		$errorc = eliminarcart("carrito", $_SESSION['NumCliente'], $_POST["cart_1"]);
		echo("OK");
	}else{
		echo("Seleccione un artículo para ser eliminado.");
	}
?>
