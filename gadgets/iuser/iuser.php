<?php  if (!isset($path)) { $path = "../"; }  ?>
<script src="<?php  echo($path) ?>gadgets/iuser/js/iuser.js" type="text/javascript"></script>
<?php   iniciarSesion();

$isLogged = false;

if (validarLogin()) {
	$usu = getUserInfo();
	$isLogged = true;
}

if ($isLogged){
	$funcionLogout = "ajaxLogOut()";
}
?>

<?php   ?>
<div style="width:100%; height:100%;position:fixed; display:; z-index: 999999" id="iuser_waiting">
<img src="../gadgets/iuser_cliente/waiting.gif" width="50px" style="position:absolute; left:50%; top:50%" />
<div style="width:100%; height:100%; background-color:#999; position:absolute; filter:'alpha(opacity=.5)';
  MozOpacity:.5;
  opacity:.5;">
</div>
</div>
