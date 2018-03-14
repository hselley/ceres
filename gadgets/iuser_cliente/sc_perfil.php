<section class="main-content">
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-1" align="center">

      </div>
      <div class="col-sm-10">
        <div class="accordion" id="accordion2">

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">MIS DATOS</a>
            </div>
            <div id="collapseOne" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $id= $_SESSION["NumCliente"];
                    $res = seleccionar("SELECT * FROM cliente WHERE ID='".$id."'");
                    $row = mysqli_fetch_array($res);
                    $res2 = seleccionar("SELECT * FROM sepomex WHERE id='".$row["DirGeneral"]."'");
                    $row2 = mysqli_fetch_array($res2);
                    echo "<strong>RAZÓN SOCIAL:</strong> ".$row["Nombre"]."<BR>";
                    echo "<strong>RFC:</strong> ".$row["Rfc"]."<BR>";
                    echo "<strong>CORREO ELECTRÓNICO:</strong> ".$row["Email"]."<BR>";
                    echo "<strong>TELEFONO:</strong> ".$row["Telefono"]."<BR>";
                    echo "<strong>CELULAR:</strong> ".$row["Celular"]."<BR>";
                    echo "<strong>DIRECCIÓN:</strong> ".$row["Calle"]." #".$row["Numero"].". Col. ".$row2["asentamiento"].". CP. ".$row2["cp"]." ".$row2["ciudad"].", ".$row2["estado"].".<BR>";
                    echo "<strong>TARJETA:</strong> XXXX XXXX XXXX ".substr($row["Tarjeta"], 12)."<BR>";
                    echo "<strong>CVV:</strong> XX".substr($row["CVV"],2)."<BR>";
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" >COMPRAS FINALIZADAS:</a>
            </div>
            <div id="collapseTwo" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $query = seleccionar("SELECT p.ID, p.TFinal, p.TEnvio, p.FechaCreacion, p.FechaFin, p.TArticulos, pr.Nombre, pr.Tipo, pr.Foto, p.CProd, p.CTransp FROM pedido p, historial h, producto pr WHERE ID_Cliente=".$_SESSION['NumCliente']." AND PStatus='SI' AND p.ID=h.ID_Pedido AND h.ID_Producto=pr.ID");
                    if (mysqli_num_rows($query)>0){
                      $inventario = "<table id=\"tablita\" class=\"table table-responsive\"><thead>
                      <tr>
                      <th>NO. PEDIDO</th>
                      <th></th>
                      <th>PRODUCTO</th>
                      <th>COSTO PRODUCTO</th>
                      <th>COSTO ENVIO</th>
                      <th>TOTAL</th>
                      <th>FECHA DE COMPRA</th>
                      <th>FECHA DE ENTREGA</th>
                      <th>CALIF. PRODUCTOR</th>
                      <th>CALIF. TRANSPORTISTA</th>
                      </tr></thead><tbody>";
                      while($row3 = mysqli_fetch_array($query)) {
                        $inventario = $inventario . "<tr>";
                        $inventario = $inventario . "<td>" . $row3['ID'] . "</td>";
                        $inventario = $inventario . "<td><img src=\"producto/".$row3['Foto']."\" alt=\"Smiley face\" height=\"10%\"></td>";
                        $inventario = $inventario . "<td>" . $row3['Nombre'] . " ". $row3['Tipo'] . "</td>";
                        $inventario = $inventario . "<td>$" . $row3['TFinal'] . "</td>";
                        $inventario = $inventario . "<td>$" . $row3['TEnvio'] . "</td>";
                        $inventario = $inventario . "<td>$" . ($row3['TFinal']+$row3['TEnvio']) . "</td>";
                        $inventario = $inventario . "<td>" . substr($row3['FechaCreacion'],0,10) . "</td>";
                        $inventario = $inventario . "<td>" . substr($row3['FechaCreacion'],0,10) . "</td>";
                        if($row3['CProd']=="" && $row3['CTransp']==""){
                          $inventario = $inventario . "<td colspan=\"2\"><button class=\"btn btn-success pull-right\" onClick=\"window.location='calificar.php?param=".$row3['ID']."'\">CALIFICAR</button></td>";
                        }else{
                          $inventario = $inventario . "<td>" . $row3['CProd']. "</td>";
                          $inventario = $inventario . "<td>" . $row3['CTransp'] . "</td>";
                        }
                        $inventario = $inventario . "</tr>";
                      }
                    $inventario = $inventario . "</tbody></table>";
                    echo $inventario;
                  }else{
                    echo ("Realiza una compra <a href='productos.php'>AQUÍ</a>");
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">ÓRDENES PENDIENTES:</a>
            </div>
            <div id="collapseFour" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $query = seleccionar("SELECT * FROM pedido WHERE ID_Cliente='".$_SESSION['NumCliente']."' AND PStatus='NO'");
                    if (mysqli_num_rows($query)>0){
                      $id = $_SESSION["NumCliente"];

                      $r = seleccionar("SELECT p.CProd calif, p.ID idped, p.EntregadoP entregaP, p.EntregadoT entregaT, p.FechaCreacion fechaini, p.TArticulos artp, pd.Nombre nprod, pd.Tipo tprod, pd.Medida mprod, pd.Disponible dprod, pd.Foto, t.RazonSocial rstrans, t.Conductor ctrans, t.Email etrans, t.Telefono ttrans, v.Marca mveh, v.Tipo tveh, v.Placas pveh, pr.Nombre prnom, pr.Apellido prape, pr.Email premail, pr.Telefono pretel FROM pedido p, historial h, producto pd, transportista_2 t, vehiculo_2 v, productor_2 pr WHERE p.ID_Cliente=".$id." AND p.ID=h.ID_Pedido AND h.ID_Producto=pd.ID AND pd.Productor=pr.ID AND p.ID_Transportista=t.ID AND v.Transportista=t.ID AND p.PStatus='NO'");

                      $r2 = seleccionar("SELECT * FROM cliente WHERE ID='".$id."'");
                      $row2 = mysqli_fetch_array($r2);
                      $r3 = seleccionar("SELECT * FROM sepomex WHERE id='".$row2["DirGeneral"]."'");
                      $row3 = mysqli_fetch_array($r3);
                      echo "<div class='col-sm-12'>";
                      echo "<table id=\"tablita\" class=\"table table-responsive\">";
                      while ($row = mysqli_fetch_array($r)) {
                        echo "<tr>
                              <th colspan=\"6\">PEDIDO NO. ".$row['idped'].": ".$row['fechaini']."</th>
                            </tr>
                            <tr>
                                  <th></th>
                                  <th>PRODUCTOS</th>
                                  <th>PRODUCTOR</th>
                                  <th>TRANSPORTISTA</th>
                                  <th>CALIFICAR</th>
                                  <th>ENTREGADO</th>
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
                                    <strong>Placas:</strong> ".$row['pveh']."</td>";
                              if($row['calif']==""){
                                echo  "<td><button class=\"btn btn-success\" onClick=\"window.location='calificar.php?param=".$row['idped']."'\">CALIFICAR</button></td>";
                              }else{
                                echo "<td>Pedido calificado</td>";
                              }
                              if($row['entregaT']=="SI" && $row['entregaP']=="SI"){
                                echo "<td><button class=\"btn btn-success\" onClick=\"marcarEntregado(".$row['idped'].")\">ENTREGAR</button></td>
                                    </tr>";
                              }else{
                                echo "<td>El transportista y el productor tienen que finalizar la entrega para finalizar el pedido.</td>
                                    </tr>";
                              }
                      }
                      echo "</table></div>";
                    }else{
                      echo ("No hay órdenes pendientes. Realiza una compra <a href='productos.php'>AQUÍ</a>");
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">MI CALIFICACIÓN: </a>
            </div>
            <div id="collapseFive" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $i=0;
                    $cfinal=0;
                    $califs = seleccionar("SELECT PClien, TClien FROM pedido WHERE ID_Cliente=".$_SESSION["NumCliente"]."");
                    while($rcalif = mysqli_fetch_array($califs)){
                      if($rcalif["PClien"]!=""){
                        $cfinal=$cfinal+$rcalif["PClien"];
                        $i++;
                      }
                      if($rcalif["TClien"]!=""){
                        $cfinal=$cfinal+$rcalif["TClien"];
                        $i++;
                      }
                    }
                    if($i==0){
                      echo "Actualmente no tienes calificaciones.";
                    }else{
                      $stars=round($cfinal/$i);
                      if($stars==5){
                        echo '<span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>';
                      }else if($stars==4){
                        echo '<span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>';
                      }else if($stars==3){
                        echo '<span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>';
                      }else if($stars==2){
                        echo '<span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>';
                      }else if($stars==1){
                        echo '<span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>';
                      }
                      echo "<br><br>Calificación basada en ".$i." reseñas:<br><br>";
                      $califs = seleccionar("SELECT ID, PClienCom, TClienCom FROM pedido WHERE ID_Cliente=".$_SESSION["NumCliente"]."");
                      echo "<div class='col-sm-12'>";
                      echo "<table id=\"tablita2\" class=\"table table-responsive\">";
                      while ($row = mysqli_fetch_array($califs)) {
                        if($row["PClienCom"]!="" && $row["TClienCom"]!=""){
                          echo "<tr>
                                <th rowspan=\"2\">PEDIDO NO. ".$row['ID']."</th>
                                <th>\"".$row["PClienCom"]."\"</th>
                              </tr>
                              <tr>

                                    <th>\"".$row["TClienCom"]."\"</th>
                              </tr>";
                        }else if($row["PClienCom"]!=""){
                          echo "<tr>
                                <th>PEDIDO NO. ".$row['ID']."</th>
                                <th>\"".$row["PClienCom"]."\"</th>
                              </tr>";
                        }else if($row["TClienCom"]!=""){
                          echo "<tr>
                                <th>PEDIDO NO. ".$row['ID']."</th>
                                <th>\"".$row["TClienCom"]."\"</th>
                              </tr>";
                        }
                      }
                      echo "</table></div>";
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
    <div class="col-sm-12" align="center">
      <button class="btn btn-danger" onClick="ajaxLogOut()">SALIR</button>
    </div>
  </div>
</section>
