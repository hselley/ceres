<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$i = 1;
while(isset($_POST["loginp_".$i]))
{
	$value[$i] =trim(revisarString($_POST["loginp_".$i]));
	$i++;
}
	$res = seleccionar("SELECT * FROM productor_2 WHERE Email='".$value[1]."' AND Password='".$value[2]."'");
	$row = mysqli_num_rows($res);
	$r = mysqli_fetch_array($res);
	if ($row == 1) {
		$_SESSION['NumProductor']=$r["ID"];// Initializing Session
		echo("OK");
	} else {?>
		<?php echo ("ERROR: El usuario y/o contraseña no son correctos");?>
	<?php }
?>
