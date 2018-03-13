<?php include("../es/comun/htop.php");
$titulo = "Calificar Pedidos"?>
<?php
if (isset($_SESSION['NumCliente'])){
  $cliente = "1";
  $transp = "0";
  $productor = "0";
}else if (isset($_SESSION['NumTransportista'])){
  $cliente = "0";
  $transp = "1";
  $productor = "0";
}else if (isset($_SESSION['NumProductor'])){
  $cliente = "0";
  $transp = "0";
  $productor = "1";
}
include("../es/comun/header.php");
?>
</head>
<body onload="document.getElementById('iuser_waiting').style.display='none'">
  <?php
if (isset($_SESSION['NumCliente']) OR isset($_SESSION['NumProductor']) OR isset($_SESSION['NumTransportista'])) { ?>
        <?php
        if (isset($_SESSION['NumCliente'])){
          include("../gadgets/iuser_cliente/sc_calificar.php");
        }else if (isset($_SESSION['NumTransportista'])){
          include("../gadgets/iuser_transp/sc_calificar.php");
        }else if (isset($_SESSION['NumProductor'])){
          include("../gadgets/iuser/sc_calificar.php");
        }
        ?>


<?php }else{?>
      <div id="wrapper" class="container">
        <br>
        <div class="jumbotron text-center">
          <h3>ACCEDE A CERES</h3>
        </div>
        <div class="container">
          <div class="row">
            <?php
            if ($cliente == "1"){
          		include("../gadgets/iuser_cliente/sc_register.php");
          	}else if ($transp == "1"){
          		include("../gadgets/iuser_transp/sc_register.php");
          	}else if ($productor == "1"){
          		include("../gadgets/iuser/sc_register.php");
          	} ?>
          </div>
        </div>
    <?php } ?>
<?php include("comun/footer.php"); ?>
</html>
