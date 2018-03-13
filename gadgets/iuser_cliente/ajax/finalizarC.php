<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$query= seleccionar("SELECT * FROM carrito WHERE ID_Cliente=".$_SESSION['NumCliente']);
$cualac = 0;
$campos1[$cualac] = 'ID_Cliente'; $cualac++;
$campos1[$cualac] = 'ID_Transportista'; $cualac++;
$campos1[$cualac] = 'TArticulos'; $cualac++;
$campos1[$cualac] = 'TFinal'; $cualac++;
$campos1[$cualac] = 'TEnvio'; $cualac++;
$campos1[$cualac] = 'FechaCreacion'; $cualac++;
$campos1[$cualac] = 'FechaFin'; $cualac++;
$campos1[$cualac] = 'PStatus'; $cualac++;

$cualac = 0;
$campos2[$cualac] = 'ID_Pedido'; $cualac++;
$campos2[$cualac] = 'ID_Producto'; $cualac++;
$campos2[$cualac] = 'HCantidad'; $cualac++;

$cualac = 0;
$campos3[$cualac] = 'Cantidad'; $cualac++;

$cualac = 0;
$campos4[$cualac] = 'Status'; $cualac++;

while($row=mysqli_fetch_array($query))
	{
		$qprecio= seleccionar("SELECT Precio FROM producto WHERE ID=".$row['ID_Producto']);
		while($rp=mysqli_fetch_array($qprecio)){
			$preciop=$rp['Precio'];
		}
		$cualac = 0;
		$datos1[$cualac] = $row['ID_Cliente'];$cualac++;
		$datos1[$cualac] = $row['ID_Transportista'];$cualac++;
		$datos1[$cualac] = $row['CCantidad'];$cualac++;
		$datos1[$cualac] = (($row['CCantidad'])*$preciop);$cualac++;
		$datos1[$cualac] = (($row['CCantidad'])*$preciop*0.08);$cualac++;
		$datos1[$cualac] = (date("Y-m-d h:i:sa"));$cualac++;
		$datos1[$cualac] = "NO";$cualac++;
		$datos1[$cualac] = "NO";$cualac++;

		$error1 = insertar($campos1,$datos1,"pedido");
		$qp= seleccionar("SELECT FechaCreacion FROM pedido WHERE ID=".$error1[1]);
		$time=mysqli_fetch_array($qp);
		$_SESSION['TimeCompra']=$time['FechaCreacion'];

		$cualac = 0;
		$datos2[$cualac] = $error1[1];$cualac++;
		$datos2[$cualac] = $row['ID_Producto'];$cualac++;
		$datos2[$cualac] = $row['CCantidad'];$cualac++;

		insertar($campos2,$datos2,"historial");

		$qmenos= seleccionar("SELECT Cantidad FROM producto WHERE ID=".$row['ID_Producto']);
		$menos=mysqli_fetch_array($qmenos);

		$cualac = 0;
		$datos3[$cualac] = ($menos['Cantidad']-$row['CCantidad']);$cualac++;
		actualizar($campos3, $datos3, "producto", $row['ID_Producto']);

		$cualac = 0;
		$datos4[$cualac] = "INAC";$cualac++;
		actualizar($campos4, $datos4, "transportista_2", $row['ID_Transportista']);

		eliminarcart("carrito",$row['ID_Cliente'],$row['ID_Producto']);
	}
		echo("OK");

?>
