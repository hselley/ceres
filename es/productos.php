<?php  include("comun/htop.php");
$cliente = "1";
$transp = "0";
$productor = "0";
//echo ($_SESSION["NumUsuario"]);
$titulo = "Catálogo de Productos"?>
<?php  include("comun/header.php"); ?>
</head>
<body onload="document.getElementById('iuser_waiting').style.display='none'">
  <?php 
  if (isset($_SESSION['NumCliente'])) { ?>
    <div id="wrapper" class="container">
      <br>
      <section class="jumbotron text-center">
        <h1 style="color: rgb(49, 68, 30);">CERES - Del Campo a la Ciudad</h1>
      </section>
      <section class="row">
        <?php  include ('../gadgets/iuser_cliente/sc_productos.php');
        ?>
      </section>

<?php   }else{ ?>
      <div id="wrapper" class="container">
        <br>
        <div class="jumbotron text-center">
          <h3>ACCEDE A CERES PARA CLIENTES</h3>
        </div>
        <div class="container">
          <div class="row">
            <?php  include ('../gadgets/iuser_cliente/sc_register.php');?>
          </div>
        </div>
    <?php } ?>
<?php  include("comun/footer.php"); ?>
