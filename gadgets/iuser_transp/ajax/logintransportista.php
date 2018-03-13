<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$i = 1;
while(isset($_POST["logint_".$i]))
{
	$valuelog[$i] =trim(revisarString($_POST["logint_".$i]));
	$i++;
}
	$res1 = seleccionar("SELECT * FROM transportista_2 WHERE Email='".$valuelog[1]."' AND Password='".$valuelog[2]."'");
	$row1 = mysqli_num_rows($res1);
	$r1 = mysqli_fetch_array($res1);
	if ($row1 == 1) {
		$_SESSION['NumTransportista']=$r1["ID"];// Initializing Session
		$res2 = seleccionar("SELECT ID FROM vehiculo_2 WHERE Transportista='".$_SESSION['NumTransportista']."'");
		$r2 = mysqli_fetch_array($res2);
		$_SESSION['NumVehiculo']=$r2["ID"];
		echo("OK");
	} else {?>
		<?php echo ("ERROR: El usuario y/o contraseña no son correctos");?>
	<?php }
?>
