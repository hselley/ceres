<?php  $tipo = 1; $path = "../"; include("../../../func/funciones.php");

	$ic = 1;
	while(isset($_POST["cart_".$ic]))
	{
		$c[$ic] =trim(revisarString($_POST["cart_".$ic]));
		$ic++;
	}
	$cualc = 0;
		$camposc[$cualc] = 'CCantidad';
		$datosc[$cualc] = ($c[2]);$cualc++;
		$tabla="carrito";

		$errorc = actualizarcart($camposc, $datosc, $tabla, $_SESSION['NumCliente'], $c[1]);;
		echo("OK");
?>
