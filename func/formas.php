<?

/* Upload File
sube el archivo enviado al servidor */
function uploadFile($FileName, $TmpName, $Target)
{
	$temp = 0;
	if (!file_exists($Target))
	{
	mkdir($Target);
	}
	$nombreArchivo = $temp.$FileName;
	while(file_exists($Target.$nombreArchivo))
	{
		$temp++;
		$nombreArchivo = $temp.$FileName;
	}
	$archivo = $Target.$nombreArchivo;
	if(move_uploaded_file($TmpName,$archivo))
	{
		$error[0] = 0;
		$error[1] = $nombreArchivo;
	}
	else
	{
		$error[0] = -1;
		$error[1] = "Error al subir la imagen";
	}
	return $error;
}


/* Eliminar Archivo
Elimina el archivo del servidor */
function eliminarArchivo($ruta,$nombre)
{
	if ($nombre != "") {
		$myFile = $ruta.$nombre;
		if (file_exists($myFile)){unlink($myFile);} }
}

function validateFileUpload($files, $txt)
{
	if($files[$txt]['type'] != "image/gif" &&
	$files[$txt]['type'] != "image/jpg" &&
	$files[$txt]['type'] != "image/jpeg" &&
	$files[$txt]['type'] != "image/png"
	) {
					echo "Archivo de tipo inválido ".$files[$txt]['type'] ;
				   return false;
				}

	$blacklist = array(".php", ".phtml", ".php3", ".php4");
foreach ($blacklist as $item) {
   	if(preg_match("/$item\$/i", $files[$txt]['name'])) {
     echo "Extensión inválida";
     return false;
   }
}
   return true;

}

function subirArchivov2($num, $w, $h, $rutaArchivo, $archOriginal)
{
	$txt = "txt_".$num; $Target = $rutaArchivo;
	$nombreFinal = "";
	if ($_POST["chk".$num])
	{
		eliminarArchivo($rutaArchivo,$archOriginal);
		$nombreFinal = "";
	}
	else if ($_FILES[$txt]["name"] != "")
			{
				eliminarArchivo($rutaArchivo,$archOriginal);
				$Nombre = $_FILES[$txt]["name"];
				$tmp_name = $_FILES[$txt]["tmp_name"];
				if (validateFileUpload($_FILES,$txt)) {
					$error = uploadFile($Nombre,$tmp_name, $Target);
					$nombreFinal = $error[1];
				}
				else
				{
					exit;
				}
			}
			else
			{
				$nombreFinal = $archOriginal;
			}
			return $nombreFinal;
}


function generateURL($nombre)
{
	$url = str_replace("-","",$nombre);
	$url = strtolower(str_replace("/","",str_replace(" ","-",$url)));
	$url = str_replace("á","a",$url);
	$url = str_replace("é","e",$url);
	$url = str_replace("í","i",$url);
	$url = str_replace("ó","o",$url);
	$url = str_replace("ú","u",$url);
	$url = str_replace("ñ","n",$url);
	$url = str_replace("+","",$url);
	return $url;
}

?>
