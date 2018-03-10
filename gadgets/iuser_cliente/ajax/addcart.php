<?php  $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$query= seleccionar("SELECT * FROM carrito WHERE ID_Cliente=".$_SESSION['NumCliente']." AND ID_Producto=".$_SESSION['ProductoAdd']);
if(mysqli_num_rows($query)==0){
	$iac = 1;
	while(isset($_POST["cadd_".$iac]))
	{
		$ac[$iac] =trim(revisarString($_POST["cadd_".$iac]));
		$iac++;
	}
	$cualac = 0;
		$camposac[$cualac] = 'ID_Cliente';
		$datosac[$cualac] = $_SESSION['NumCliente'];$cualac++;
		$camposac[$cualac] = 'ID_Producto';
		$datosac[$cualac] = $_SESSION['ProductoAdd'];$cualac++;
		$camposac[$cualac] = 'CCantidad';
		$datosac[$cualac] = ($ac[1]);$cualac++;
		$camposac[$cualac] = 'ID_Transportista';
		$datosac[$cualac] = ($ac[2]);$cualac++;

		$errorc = insertar($camposac,$datosac,"carrito");
		echo("OK");
}else{
	echo("ATENCIÓN: Este artículo ya se encuentra en el carrito.");
}
?>
