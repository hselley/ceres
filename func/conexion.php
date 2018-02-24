<?
/* VARIABLES
REGRESA LA CONEXION A LA BAE DE DATOS DEPENDIENDO DE LA VARIABLE $DB */

function variables_conexion()
{
	global $desarrollo;
	return $desarrollo;
}
/* REVISAR STRING
REVISA LA CADENA DE STRING PARA ELIMINAR SQL INJECTION*/
function revisarString($cual)
{
	$variables = variables_conexion();
	$con = mysqli_connect($variables["db_host"],$variables["db_user"],$variables["db_password"]);
	if (mysqli_connect_errno())
		  {
		  	$string_error = '-1: Could not connect: '.mysqli_connect_errno();
			return $string_error;
		  }
	mysqli_set_charset($con,"utf8");
			//mysqli_select_db($variables["db_name"], $con);
		$con->select_db($variables["db_name"]);
	$cual = mysqli_real_escape_string($con,$cual);

	mysqli_close($con);
	return $cual;
}
/*INSERTAR
POR MEDIO DE DOS ARREGLOS DE CAMPOS Y DATOS GENERA UN QUERY DE INSERSION, SI SE MANDA LA VARIABLE REVISAR = TRUE SE REVISA EL STRING */
function insertar($campos, $datos, $tabla, $revisar = false)
{
	$string_error[0] = "";
	try
	{
		$queryString = "Insert into ".$tabla." (";
		$queryString2 = " values(";
		foreach($campos as $key)
		{
			$queryString=$queryString.$key.",";
		}
		foreach($datos as $key)
		{
			$key = str_replace("'","\'",$key);
			if ($revisar)
				$queryString2=$queryString2."'".revisarString($key)."',";
			else
				$queryString2=$queryString2."'".$key."',";
		}
		$queryString = substr($queryString, 0, strlen($queryString)-1).") ";
		$queryString2 = substr($queryString2, 0, strlen($queryString2)-1).") ";
		$queryString = $queryString.$queryString2;
		$string_error[0] = correr_query($queryString);
		if (substr($string_error,0,2) != "-1")
		{
			$string_error[0] = get_last_id($tabla);
			if (substr($string_error[0],0,2) != "-1")
			{
				$string_error[1] = $string_error[0];
				$string_error[0] = "";
				return $string_error;
			}
			else
				return $string_error;
		}
		else
			return $string_error;
	}
	catch (Exception $e)
	{
		$string_error[0]= $e;
		return $string_error;
	}
}
/*ACTUALIZAR
POR MEDIO DE UN ARREGLO DE CAMPOS Y OTRO DE DATOS SE GENERA UN QUERY DE ACTUALIZACION, SI SE MANDA REVISAR = TRUE SE REVISAN LOS DATOS */
function actualizar($campos, $datos, $tabla, $id, $revisar = false)
{
	$string_error[0] = "";
	try
	{
		$queryString = "update ".$tabla." set ";
		$i =0;
		foreach($campos as $key)
		{
			$datos[$i] = str_replace("'","\'",$datos[$i]);

			if ($revisar)
				$queryString= $queryString.$key."='".revisarString($datos[$i])."', ";
			else
				$queryString= $queryString.$key."='".$datos[$i]."', ";
			$i = $i +1;
		}
		$queryString = substr($queryString, 0, strlen($queryString)-2)." where id = ".$id;
		//echo($queryString);
		$string_error[0] = correr_query($queryString);
		return $string_error;
	}
	catch (Exception $e)
	{
		$string_error[0] = $e;
		return $string_error;
	}
}
/* CORRER QUERY
FUNCION PARA CORRER CUALQUIER QUERY */
function correr_query($query)
{
	$string_error = "";
	try
	{
		$variables = variables_conexion();
		$con = mysqli_connect($variables["db_host"],$variables["db_user"],$variables["db_password"]);
		if (mysqli_connect_errno())
		  {
		  	$string_error = '-1: Could not connect: '.mysqli_connect_errno();
			return $string_error;
		  }
		  mysqli_set_charset($con,"utf8");
		$con->select_db($variables["db_name"]);
		$string_error =  $con->query($query);
		if ($string_error)
		{
			$string_error = "";
		}
		else
		{
			$string_error = "-1:".$con->error;
			$string_error = str_replace("'","",$string_error);
			mysqli_close($con);
			die($string_error);
		}
		mysqli_close($con);
		return $string_error;
	}
	catch (Exception $e)
	{
		$string_error = $e;
		return "-1: ".$string_error;
	}
}
/* SELECCIONAR
FUNCION PARA SELECCIONAR DATOS YREGRESARLOS EN UN RESULT SET */
function seleccionar($query)
{
	$string_error = "";
	try
	{
		$variables = variables_conexion();
		$con = mysqli_connect($variables["db_host"],$variables["db_user"],$variables["db_password"]);
		if (mysqli_connect_errno())
		  {
		  	$string_error = '-1: Could not connect: '.mysqli_connect_errno();
			return $string_error;
		  }
		 mysqli_set_charset($con,"utf8");		//mysqli_select_db($variables["db_name"], $con);
		$con->select_db($variables["db_name"]);
		$result = $con->query($query);
		mysqli_close($con);
		return $result;
	}
	catch (Exception $e)
	{
		$string_error = $e;
		return "-1: ".$string_error;
	}
}
/* TEST CONNNECTION
PRUEBA QUE LA CONEXION A LA BASE DE DATOS SEA CORRECTA */
function testConnection()
{
	$string_error = "";
	try
	{
		$variables = variables_conexion();
		$con = mysqli_connect($variables["db_host"],$variables["db_user"],$variables["db_password"]);
		if (mysqli_connect_errno())
		  {
		  	$string_error = '-1: Could not connect: '.mysqli_connect_errno();
			return $string_error;
		  }
				//mysqli_select_db($variables["db_name"], $con);
		$con->select_db($variables["db_name"]);
		 $con->query("SET CHARACTER SET utf8");
		 $con->query("SET NAMES utf8");
		$result = $con->query("select * from highlight");
		$row = mysqli_fetch_array($result);
		mysqli_close($con);
		return "Conexión exitosa".$row["Texto"];
	}
	catch (Exception $e)
	{
		$string_error = $e;
		return "-1: ".$string_error;
	}
}


/* GET LAST ID
Obtiene el ID mas reciente insertado en la BD */
function get_last_id($tabla)
{
	$res = seleccionar("select * from ".$tabla." order by ID desc");
	$row = mysqli_fetch_array($res);
	return $row["ID"];


}
function mysqli_result($res, $row, $field=0) {
    $res->data_seek($row);
    $datarow = $res->fetch_array();
    return $datarow[$field];
}

?>
