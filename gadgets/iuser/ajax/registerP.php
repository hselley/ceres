<?php $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$i = 1;
while(isset($_POST["prod_".$i]))
{
	$values_prod[$i] =trim(revisarString($_POST["prod_".$i]));
	$i++;
}

$c_prod = 0;
	$campos_prod[$c_prod] = 'Productor';
	$datos_prod[$c_prod] = ($_SESSION["NumProductor"]);$c_prod++;
	$campos_prod[$c_prod] = 'Nombre';
	$datos_prod[$c_prod] = ($values_prod[1]);$c_prod++;
	$campos_prod[$c_prod] = 'Tipo';
	$datos_prod[$c_prod] = ($values_prod[2]);$c_prod++;
	$campos_prod[$c_prod] = 'Caracteristicas';
	$datos_prod[$c_prod] = ($values_prod[3]);$c_prod++;
	$campos_prod[$c_prod] = 'Precio';
	$datos_prod[$c_prod] = ($values_prod[4]);$c_prod++;
	$campos_prod[$c_prod] = 'Disponible';
	$datos_prod[$c_prod] = ($values_prod[8]);$c_prod++;
	$campos_prod[$c_prod] = 'Oferta_fin';
	$datos_prod[$c_prod] = ($values_prod[9]);$c_prod++;
	$campos_prod[$c_prod] = 'Empaque';
	$datos_prod[$c_prod] = ($values_prod[5]);$c_prod++;
	$campos_prod[$c_prod] = 'Cantidad';
	$datos_prod[$c_prod] = ($values_prod[6]);$c_prod++;
	$campos_prod[$c_prod] = 'Medida';
	$datos_prod[$c_prod] = ($values_prod[7]);$c_prod++;
	$campos_prod[$c_prod] = 'Refrigeracion';
	$datos_prod[$c_prod] = ($values_prod[10]);$c_prod++;
	$campos_prod[$c_prod] = 'Foto';
	$datos_prod[$c_prod] = ('Falta');$c_prod++;

	$error_prod = insertar($campos_prod,$datos_prod,"producto");

	$target_dir = "../../../es/producto/";
	$target_file = $target_dir . basename($error_prod[1]."_".$_FILES["prod_11"]["name"]);
	$dato_prod= $error_prod[1]."_".$_FILES["prod_11"]["name"];
	$updt = actualizarfoto($dato_prod, $error_prod[1]);

	if (move_uploaded_file($_FILES["prod_11"]["tmp_name"], $target_file)) {
			echo "OK";
	} else {
			echo "Sorry, there was an error uploading your file.";
	}

?>
