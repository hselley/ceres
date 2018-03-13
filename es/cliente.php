<?php include("comun/htop.php");
$cliente = "1";
$transp = "0";
$productor = "0";
//echo ($_SESSION["NumUsuario"]);
$titulo = "Clientes"?>
<?php include("comun/header.php"); ?>
<script type="text/javascript">
        $(document).ready(function(){
            $('#iuserc_8').on('change',function(){
                var ide = $(this).val();
                if(ide){
                    $.ajax({
                        type:'POST',
                        url:'../gadgets/iuser_cliente/ajax/ajaxData.php',
                        data:'id_estado='+ide,
                        success:function(html){
                            $('#iuserc_9').html(html); //estado
                            //$('#iuserc_10').html(html); //ciudad
                            //$('#iuserc_11').html(html); //colonia
                        }
                    });
                }else{
                    $('#iuserc_9').html('<option value="-1">Seleccione un Estado...</option>');
                    //$('#iuserc_11').html('<option value="">Seleccione un CP</option>');
                    // $('#iuserc_12').html('<option value="">Seleccione un CP</option>');
                }
            });
            $('#iuserc_9').on('change',function(){
                var idm = $(this).val();
                var ided = $('#iuserc_8').val();
                if(idm){
                    $.ajax({
                        type:'POST',
                        url:'../gadgets/iuser_cliente/ajax/ajaxData.php',
                        data:'id_municipio='+idm+'&id_edo='+ided,
                        success:function(html){
                            $('#iuserc_10').html(html); //ciudad
                            //$('#iuserc_11').html(html); //colonia
                        }
                    });
                }else{
                    $('#iuserc_10').html('<option value="-1">Seleccione un Municipio...</option>');
                    //$('#iuserc_11').html('<option value="">Seleccione un CP</option>');
                    // $('#iuserc_12').html('<option value="">Seleccione un CP</option>');
                }
            });
            $('#iuserc_10').on('change',function(){
                var cpnum = $(this).val();
                if(cpnum){
                    $.ajax({
                        type:'POST',
                        url:'../gadgets/iuser_cliente/ajax/ajaxData.php',
                        data:'cp_num='+cpnum,
                        success:function(html){
                            $('#iuserc_11').html(html); //ciudad
                        }
                    });
                }else{
                    $('#iuserc_11').html('<option value="-1">Seleccione un CP...</option>');
                }
            });

        });
</script>
</head>

<body onload="document.getElementById('iuser_waiting').style.display='none'">
  <?php if (isset($_SESSION['NumCliente'])) { ?>

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

        <?php include ('../gadgets/iuser_cliente/sc_perfil.php');
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
