
<section class="main-content">
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-1" align="center">

      </div>
      <div class="col-sm-10">
        <div class="accordion" id="accordion2">

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">PEDIDO LEVANTADO: ¡GRACIAS POR SU COMPRA!</a>
            </div>
            <div id="collapseOne" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $id = $_SESSION["NumCliente"];
                    $timestamp = $_SESSION["TimeCompra"];
                    //$timestamp = '2018-03-11 12:03:00pm';
                    $r = seleccionar("SELECT p.ID idped, p.TArticulos artp, pd.Nombre nprod, pd.Tipo tprod, pd.Foto, pd.Medida mprod, pd.Disponible dprod, t.RazonSocial rstrans, t.Conductor ctrans, t.Email etrans, t.Telefono ttrans, v.Marca mveh, v.Tipo tveh, v.Placas pveh, pr.Nombre prnom, pr.Apellido prape, pr.Email premail, pr.Telefono pretel FROM pedido p, historial h, producto pd, transportista_2 t, vehiculo_2 v, productor_2 pr WHERE p.ID_Cliente=".$id." AND FechaCreacion='".$timestamp."' AND p.ID=h.ID_Pedido AND h.ID_Producto=pd.ID AND pd.Productor=pr.ID AND p.ID_Transportista=t.ID AND v.Transportista=t.ID");

                    $r2 = seleccionar("SELECT * FROM cliente WHERE ID='".$id."'");
                    $row2 = mysqli_fetch_array($r2);
                    $r3 = seleccionar("SELECT * FROM sepomex WHERE id='".$row2["DirGeneral"]."'");
                    $row3 = mysqli_fetch_array($r3);
                    echo "<div class='col-sm-3'>";
                    echo "<h4>DATOS DE ENVÍO:</h4>";
                    echo "<strong>RAZÓN SOCIAL:</strong> ".$row2["Nombre"]."<BR>";
                    echo "<strong>RFC:</strong> ".$row2["Rfc"]."<BR>";
                    echo "<strong>CORREO ELECTRÓNICO:</strong> ".$row2["Email"]."<BR>";
                    echo "<strong>TELEFONO:</strong> ".$row2["Telefono"]."<BR>";
                    echo "<strong>CELULAR:</strong> ".$row2["Celular"]."<BR>";
                    echo "<strong>DIRECCIÓN:</strong> ".$row2["Calle"]." #".$row2["Numero"].". Col. ".$row3["asentamiento"].". CP. ".$row3["cp"]." ".$row3["municipio"].", ".$row3["estado"].".<BR>";
                    echo "<strong>BANCO:</strong> XXXX XXXX XXXX ".substr($row2["Tarjeta"], 12)."<BR>";
                    echo "<strong>CUENTA BANCARIA:</strong> XX".substr($row2["CVV"],2)."<BR>";
                    echo "</div>";
                    echo "<div class='col-sm-9'>";
                    echo "<h4>RESUMEN DE LA COMPRA: ".$timestamp."</h4>";
                    echo "<table id=\"tablita\" class=\"table table-responsive\">";
                    while ($row = mysqli_fetch_array($r)) {
                      echo "<tr>
                            <th colspan=\"4\">PEDIDO NO. ".$row['idped']."</th>
                          </tr>
                          <tr>
                                <th></th>
                                <th>PRODUCTOS</th>
                                <th>PRODUCTOR</th>
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
                    unset($_SESSION['TimeCompra']);
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="col-sm-12" align="center">
      <button class="btn btn-success" onClick="window.location='cliente.php'">PERFIL DE USUARIO</button>
    </div>
  </div>
</section>
