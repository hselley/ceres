<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css">

<link rel="stylesheet" type="text/css" href="../css/estilos_web.css?ver=<?php  echo($version) ?>">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../js/alertas.js?ver=<?php  echo($version) ?>" type="text/javascript"></script>
<script src="../js/ajax.js?ver=<?php  echo($version) ?>" type="text/javascript"></script>
<link rel="shortcut icon" href="../favicon.png?ver=<?php  echo($version) ?>" />
<title>CERES - <?php  echo($titulo) ?></title>
<meta name="Description" content="<?php  echo($desc) ?>" />
<meta name="Keywords" content="<?php  echo($keywords) ?>" />

<?php 
	if ($cliente == "1"){
		include("../gadgets/iuser_cliente/iuser.php");
	}else if ($transp == "1"){
		include("../gadgets/iuser_transp/iuser.php");
	}else if ($productor == "1"){
		include("../gadgets/iuser/iuser.php");
	}
?>
