<?php include("comun/htop.php");
$cliente = "1";
$transp = "0";
$productor = "0";
//echo ($_SESSION["NumUsuario"]);
$titulo = "Carrito de Compras"?>
<?php include("comun/header.php"); ?>
</head>
<body onload="document.getElementById('iuser_waiting').style.display='none'">
  <?php
  if (isset($_SESSION['NumCliente'])) { ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CERES</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="cliente">Mi Perfil de Cliente</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="productos">TODOS</a></li>
                <li><a href="productos?param=1">PRÓXIMOS EN IRSE</a></li>
                <li><a href="productos?param=2">DISPONIBILIDAD INMEDIATA</a></li>
              </ul>
            </li>
            <li><a href="cart">Carrito</a></li>
            <li><a href="checkout">Checkout</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a onClick="ajaxLogOut()"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div id="wrapper" class="container">
      <br>
      <section class="jumbotron text-center">
        <h1 style="color: rgb(49, 68, 30);">CERES - Del Campo a la Ciudad</h1>
      </section>
      <section class="row">
        <?php include ('../gadgets/iuser_cliente/sc_cart.php');
        ?>
      </section>

<?php  }else{ ?>
      <div id="wrapper" class="container">
        <br>
        <div class="jumbotron text-center">
          <h3>ACCEDE A CERES PARA CLIENTES</h3>
        </div>
        <div class="container">
          <div class="row">
            <?php include ('../gadgets/iuser_cliente/sc_register.php');?>
          </div>
        </div>
    <?php } ?>
<?php include("comun/footer.php"); ?>
