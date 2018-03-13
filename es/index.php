<?php include("comun/htop.php");
$titulo = "Del Campo a la Ciudad"?>
<?php include("comun/header.php"); ?>
</head>
<body>
  <div id="wrapper" class="container">
    <br>
    <section class="jumbotron text-center">
      <h1 style="color: rgb(49, 68, 30);">CERES - Del Campo a la Ciudad</h1>
    </section>
    <section class="header_text">
      CERES - Del Campo a la Ciudad, busca impulsar el crecimiento agropecuario de
      los productores en México, eficientar el transporte y ofrecer precios atractivos al cliente.
    </section>

    <section class="main-content">
      <div class="row">
        <div class="col-sm-12">
          <div class="feature_box">
            <div class="col-sm-4">
              <div class="service">
                <div class="responsive">
                  <img src="feature_img_1.png" alt="" onclick="window.location='productor.php'"/>
                  <h4>INGRESA <strong>PRODUCTORES</strong></h4>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="service">
                <div class="responsive">
                  <img src="feature_img_2.png" alt="" onclick="window.location='transportista.php'"/>
                  <h4>INGRESA <strong>TRANSPORTISTAS</strong></h4>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="service">
                <div class="responsive">
                  <img src="feature_img_3.png" alt="" onclick="window.location='cliente.php'"/>
                  <h4>INGRESA <strong>CLIENTES</strong></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include("comun/footer.php"); ?>
