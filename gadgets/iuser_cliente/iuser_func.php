<?php 

//Valida si existe el email registrado
function validarEmailC($usuario)
{
	$res = seleccionar("select * from cliente where Email = '".$usuario."'");
	if (mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_array($res);
		$r[0] = $row["ID"];
		return $r;
	}
	else
	{
		$r[0] = "";
		return $r;
	}

}



?>
