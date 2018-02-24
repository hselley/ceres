<? include("comun/htop.php");
$cliente = "1";
$transp = "0";
$productor = "0";
//echo ($_SESSION["NumUsuario"]);
$titulo = "Catálogo de Productos"?>
<? include("comun/header.php"); ?>
</head>
<body onload="document.getElementById('iuser_waiting').style.display='none'">
  <?
  if (isset($_SESSION['NumCliente'])) { ?>
    <div id="wrapper" class="container">
      <br>
      <section class="jumbotron text-center">
        <h1 style="color: rgb(49, 68, 30);">CERES - Del Campo a la Ciudad</h1>
      </section>
      <section class="row">
        <? include ('../gadgets/iuser_cliente/sc_productos.php');
        ?>
      </section>

<?  }else{ ?>
      <div id="wrapper" class="container">
        <br>
        <div class="jumbotron text-center">
          <h3>ACCEDE A CERES PARA CLIENTES</h3>
        </div>
        <div class="container">
          <div class="row">
            <? include ('../gadgets/iuser_cliente/sc_register.php');?>
          </div>
        </div>
    <?}?>
<? include("comun/footer.php"); ?>
