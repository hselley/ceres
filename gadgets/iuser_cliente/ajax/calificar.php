<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$idaelim=$_POST['id'];
$calif1=$_POST['calif1'];
$comment1=$_POST['c1_6'];
$calif2=$_POST['calif2'];
$comment2=$_POST['c2_6'];

$cualc = 0;
	$camposc[$cualc] = 'CProd';
	$datosc[$cualc] = ($calif1);$cualc++;
	$camposc[$cualc] = 'CProdCom';
	$datosc[$cualc] = ($comment1);$cualc++;
	$camposc[$cualc] = 'CTransp';
	$datosc[$cualc] = ($calif2);$cualc++;
	$camposc[$cualc] = 'CTranspCom';
	$datosc[$cualc] = ($comment2);$cualc++;


		$errorc = actualizar($camposc,$datosc,"pedido", $idaelim);
		echo("OK");
?>
