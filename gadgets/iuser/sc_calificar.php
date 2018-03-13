<?php
if(!isset($_GET["param"])){ ?>
  <script type="text/javascript">
    window.location="productor.php"
  </script>
<?php }
if(!isset($_SESSION["NumProductor"])){ ?>
  <script type="text/javascript">
    window.location="productor.php"
  </script>
<?php }
$yac = seleccionar("SELECT p.PClien, pd.ID from pedido p, producto pr, historial h, productor_2 pd WHERE p.ID=".$_GET['param']." AND p.ID=h.ID_Pedido AND h.ID_Producto=pr.ID AND pr.Productor=pd.ID");
$yacr = mysqli_fetch_array($yac);
if($yacr['PClien']!=""){ ?>
  <script type="text/javascript">
    window.location="productor.php"
  </script>
<?php }
if($yacr['ID']!=$_SESSION["NumProductor"]){ ?>
  <script type="text/javascript">
    window.location="productor.php"
  </script>
<?php }
?>
<div id="wrapper" class="container">
  <br>
  <section class="jumbotron text-center">
    <h1 style="color: rgb(49, 68, 30);">CERES - Del Campo a la Ciudad</h1>
  </section>
  <section class="row">
<section class="main-content">
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-1" align="center">

      </div>
      <div class="col-sm-10">
        <div class="accordion" id="accordion2">
          <?php $pedido = $_GET['param']; ?>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">CALIFICA PEDIDO: <span id="pedido"> <?php echo $pedido; ?> </span> </a>
            </div>
            <div id="collapseOne" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $pedido = $_GET['param'];
                    $id = $_SESSION["NumCliente"];
                    $r = seleccionar("SELECT p.ID idped, p.TArticulos artp, pd.Nombre nprod, pd.Tipo tprod, pd.Medida mprod, pd.Foto, pd.Disponible dprod, t.RazonSocial rstrans, t.Conductor ctrans, t.Email etrans, t.Telefono ttrans, v.Marca mveh, v.Tipo tveh, v.Placas pveh, cl.Nombre prnom, cl.Email premail, cl.Telefono pretel FROM pedido p, historial h, producto pd, transportista_2 t, vehiculo_2 v, productor_2 pr, cliente cl WHERE p.ID=".$pedido." AND FechaFin='NO' AND p.ID=h.ID_Pedido AND h.ID_Producto=pd.ID AND pd.Productor=pr.ID AND cl.ID=p.ID_Cliente AND p.ID_Transportista=t.ID AND v.Transportista=t.ID");
                    $r3 = seleccionar("SELECT * FROM sepomex WHERE id='".$row2["DirGeneral"]."'");
                    $row3 = mysqli_fetch_array($r3);
                    echo "<div class=\"col-sm-7\" align='center'><table id=\"tablita\" class=\"table table-responsive\">";
                    while ($row = mysqli_fetch_array($r)) {
                      echo "<tr>
                            <th colspan=\"4\">PEDIDO NO. ".$row['idped']."</th>
                          </tr>
                          <tr>
                                <th></th>
                                <th>PRODUCTO</th>
                                <th>CLIENTE</th>
                                <th>TRANSPORTISTA</th>
                          </tr>
                          <tr>
                            <td><img src=\"producto/".$row['Foto']."\" height='50%'></td>
                            <td>".$row['nprod']." ".$row['tprod']."<br>
                                  <strong>Cantidad:</strong> ".$row['artp']." ".$row['mprod']."<br><br></td>
                            <td>".$row['prnom']." ".$row['prape']."<br>
                                  <strong>Email:</strong> ".$row['premail']."<br>
                                  <strong>Teléfono:</strong> ".$row['pretel']."</td>
                            <td>".$row['ctrans']."<br>".$row['rstrans']."<br>
                                  <strong>Email:</strong> ".$row['etrans']."<br>
                                  <strong>Teléfono:</strong> ".$row['ttrans']." <br>
                                  <strong>Vehículo:</strong> ".$row['mveh']." ".$row['tveh']."<br>
                                  <strong>Placas:</strong> ".$row['pveh']."</td>
                        </tr>";
                    }
                    echo "</table></div>";
                  ?>
                  <div class='col-sm-5'>

                    <form name="Calif" id="Calif" method="post" style="width: 75%; position: relative; left: 12.5%; margin-bottom: 20px">
                    <strong>Del 1 al 5 como califica al Cliente:</strong><br>
                      <input type="radio" name="calif1" value="1"> 1
                      <input type="radio" name="calif1" value="2"> 2
                      <input type="radio" name="calif1" value="3"> 3
                      <input type="radio" name="calif1" value="4"> 4
                      <input checked type="radio" name="calif1" value="5"> 5<br>
                      <strong>Comentarios:</strong><br>
                      <textarea class="form-control" rows="5" name="c1_6" id="c1_6"></textarea>
                      <br>
                    <strong>Del 1 al 5 como califica al Transportista:</strong><br>
                      <input type="radio" name="calif2" value="1"> 1
                      <input type="radio" name="calif2" value="2"> 2
                      <input type="radio" name="calif2" value="3"> 3
                      <input type="radio" name="calif2" value="4"> 4
                      <input checked type="radio" name="calif2" value="5"> 5<br>
                      <strong>Comentarios:</strong><br>
                      <textarea class="form-control" rows="5" name="c2_6" id="c2_6"></textarea>
                      <br>
                      <button class="btn btn-success pull-right" onClick="verificarCalif('<?php echo $pedido; ?>')">CALIFICAR</button><br>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-sm-12" align="center">
      <button class="btn btn-success" onClick="window.location='productor.php'">PERFIL DE USUARIO</button>
    </div>
  </div>
</section>
</section>
