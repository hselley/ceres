<?php  include("../es/comun/htop.php");
$titulo = "Acerca de"?>
<?php  include("../es/comun/header.php");
?>
</head>
<body>
  <div id="wrapper" class="container"><br>
    <div class="jumbotron text-center">
      <h1 style="color: rgb(49, 68, 30);">CERES - Del Campo a la Ciudad</h1>
    </div>
    <section class="main-content">
      <div class="row">
        <div class="col-sm-5">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="img/cliente.jpg" alt="Clientes">
                <div class="carousel-caption">
                  <h3>Se un Cliente CERES</h3>
                  <p>Busca, Elige y Recibe productos agropecuarios desde tu móvil.</p>
                </div>
              </div>

              <div class="item">
                <img src="img/productor.jpg" alt="Productores">
                <div class="carousel-caption">
                  <h3>Se un Productor CERES</h3>
                  <p>Como productor, ofrece tus productos a través de Internet.</p>
                </div>
              </div>

              <div class="item">
                <img src="img/transportista.jpg" alt="Transportistas">
                <div class="carousel-caption">
                  <h3>Se un Transportista CERES</h3>
                  <p>Únete a nuestro equipo de transportistas y empieza a laborar el mismo día que te registres.</p>
                </div>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-sm-7" align="center">
          <span><strong>CERES - Del Campo a la Ciudad</strong>  es una iniciativa de CONACYD orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</span>
        </div>
      </div>
    </section>
    <?php  include("../es/comun/footer.php");
    ?>
  </div>
</body>
</html>
