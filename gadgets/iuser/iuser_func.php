<?

//Regenerar ID
function iniciarSesion()
{
	if (!isset($_SESSION["NumUsuario"]))
	{
		session_regenerate_id();
	}
}
//Valida si el usuario existe
function existeUsuario($cual)
{
	$res = seleccionar("select * from productor where id = ".$cual." and status = 'ACTI'");
	if (mysqli_num_rows($res) > 0)
	{
		return true;
	}
	return false;
}
//Valida si el usuario esta logeado actualmente
function validarLogin()
{
	checkAutoLogin();
	if (isset($_SESSION["NumUsuario"]))
	{
		if ($_SESSION["NumUsuario"] != "")
		{
			return existeUsuario($_SESSION["NumUsuario"]);
		}
	}
	return false;
}
//Valida si usuario/password son correctos
function validarLoginUsuario($usuario, $password,$rem)
{
	$res = seleccionar("select * from registro where email = '".$usuario."' and contrasena = '".$password."' and status = 'ACTI'");
	if (mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_array($res);
		$_SESSION["NumUsuario"] =  $row["ID"];
		if ($rem == "1")
		{
			autoLogin($row["ID"]);
		}
		return true;
	}
	return false;
}
//Valida si existe el email registrado
function validarEmail($usuario)
{
	$res = seleccionar("select * from productor where Nombre = '".$usuario."'");
	if (mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_array($res);
		$r[0] = $row["ID"];
		$r[1] = $row["Nombre"];
		$r[2] = $row["Apellido"];
		return $r;
	}
	else
	{
		$r[0] = "";
		return $r;
	}

}
//Obtiene la informaciond el usuario
function getUserInfo()
{
	$res = seleccionar("select * from registro where id = ".$_SESSION["NumUsuario"]);
	if (mysqli_num_rows($res) > 0)
	{
		$row = mysqli_fetch_array($res);
		$usu[0] = true;
		$usu[1] = $row["ID"];
		$usu[2] = $row["Nombre"];
		$usu[3] = $row["Apellido"];
		$usu[4] = $row["Telefono"];
		$usu[5] = $row["Celular"];
		$usu[6] = $row["Estado"];
		$usu[7] = $row["Terreno"];
		$usu[8] = $row["Productivas"];
		$usu[9] = $row["Banco"];
		$usu[10] = $row["Cuenta"];
		$usu[11] = $row["Clave"];
		$usu[12] = $row["Codigo"];
		return $usu;
	}
	$usu[0] = false;
	return $usu;
}

function checkAutoLogin()
{
	global $cookie_name;
	 //print_r($_COOKIE);
	if(isset($cookie_name))
	{
		// Check if the cookie exists
		if(isset($_COOKIE[$cookie_name]))
		{
			parse_str($_COOKIE[$cookie_name]);
			// Make a verification
			$_SESSION["NumUsuario"] = $usrID;
			return true;
		}
	}
	return false;
}

function autoLogin($usrID )
{
	global $cookie_name;
	global $cookie_time;
	setcookie ($cookie_name, 'usrID='.$usrID, time() + $cookie_time,"/");
}

function removeCookie()
{
	global $cookie_name;
	if(isset($_COOKIE[$cookie_name]))
		{
			setcookie($cookie_name, "", time()-3600, '/');
		}
}


?>
