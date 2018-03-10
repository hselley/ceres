<?php  $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$i = 1;
while(isset($_POST["loginc_".$i]))
{
	$value_lc[$i] =trim(revisarString($_POST["loginc_".$i]));
	$i++;
}

	$res3 = seleccionar("SELECT * FROM cliente WHERE Email='".$value_lc[1]."' AND Password='".$value_lc[2]."'");
	$row3 = mysqli_num_rows($res3);
	$r3 = mysqli_fetch_array($res3);
	if ($row3 == 1) {
		$_SESSION['NumCliente']=$r3["ID"];// Initializing Session
		echo("OK");
	} else {?>
		<?php echo ("ERROR: El usuario y/o contraseña no son correctos");?>
	<?php }
?>
