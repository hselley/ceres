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
                    $id= $_SESSION["NumTransportista"];
                    $res = seleccionar("SELECT * FROM transportista_2 WHERE ID='".$id."'");
                    $row = mysqli_fetch_array($res);
                    echo "<strong>RAZÓN SOCIAL:</strong> ".$row["RazonSocial"]."<BR>";
                    echo "<strong>CONDUCTOR:</strong> ".$row["Conductor"]."<BR>";
                    echo "<strong>CORREO ELECTRÓNICO:</strong> ".$row["Email"]."<BR>";
                    echo "<strong>TELEFONO:</strong> ".$row["Telefono"]."<BR>";
                    echo "<strong>CELULAR:</strong> ".$row["Celular"]."<BR>";
                    echo "<strong>ESTADO:</strong> ".$row["Estado"]."<BR>";
                    echo "<strong>BANCO:</strong> ".$row["Banco"]."<BR>";
                    echo "<strong>CUENTA BANCARIA:</strong> ".$row["Cuenta"]."<BR>";
                    echo "<strong>CLABE INTERBANCARIA:</strong> ".$row["Clabe"]."<BR>";
                    if($row["Status"]=='ACTI'){
                      $estatus='ACTIVO';
                    }else{
                      $estatus='INACTIVO';
                    }
                    echo "<strong>ESTATUS:</strong> ".$estatus."<BR>"
                  ?>
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">DATOS DEL VEHÍCULO</a>
            </div>
            <div id="collapseTwo" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $idv= $_SESSION["NumVehiculo"];
                    $res = seleccionar("SELECT * FROM vehiculo_2 WHERE ID='".$idv."'");
                    $row = mysqli_fetch_array($res);
                    echo "<strong>PROPIETARIO:</strong> ".$row["Propietario"]."<BR>";
                    echo "<strong>PLACAS:</strong> ".$row["Placas"]."<BR>";
                    echo "<strong>NÚMERO DE SERIE:</strong> ".$row["No_Serie"]."<BR>";
                    echo "<strong>AÑO:</strong> ".$row["Anio"]."<BR>";
                    echo "<strong>TIPO:</strong> ".$row["Tipo"]."<BR>";
                    echo "<strong>MARCA:</strong> ".$row["Marca"]."<BR>";
                    echo "<strong>CAPACIDAD:</strong> ".$row["Capacidad"]."<BR>";
                    echo "<strong>REFRIGERACÍON:</strong> ".$row["Refrigeración"]."<BR>";
                    if($row["Status"]=='ACTI'){
                      $estatus='ACTIVO';
                    }else{
                      $estatus='INACTIVO';
                    }
                    echo "<strong>ESTATUS:</strong> ".$estatus."<BR>"
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">DISPONIBILIDAD PARA ENVIOS:</a>
            </div>
            <div id="collapseThree" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $query = seleccionar("SELECT Disponible FROM transportista_2 WHERE Id='".$_SESSION['NumTransportista']."'");
                    $r = mysqli_fetch_array($query);
                    echo "Actualmente estoy disponible para realizar envio de productos: <STRONG>".$r['Disponible']."</STRONG><BR>";
                  ?>
                  <div align="center"><button class="btn btn-success" onClick="cambioDisp()">CAMBIAR</button></div><BR>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">ENVIO ACTUAL:</a>
            </div>
            <div id="collapseFour" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                  $query = seleccionar("SELECT * FROM pedido WHERE ID_Transportista='".$_SESSION['NumTransportista']."' AND PStatus='NO'");
                  if (mysqli_num_rows($query)>0){
                    $id = $_SESSION["NumTransportista"];

                    $r = seleccionar("SELECT p.TProd calif, p.ID idped, p.EntregadoT entrega, c.ID cid, p.FechaCreacion fechaini, p.TArticulos artp, pd.Nombre nprod, pd.Tipo tprod, pd.Medida mprod, pd.Disponible dprod, t.RazonSocial rstrans, t.Conductor ctrans, t.Email etrans, t.Telefono ttrans, v.Marca mveh, v.Tipo tveh, v.Placas pveh, pr.Nombre prnom, pr.Apellido prape, pr.Email premail, pr.Telefono pretel FROM pedido p, historial h, producto pd, transportista_2 t, vehiculo_2 v, productor_2 pr, cliente c WHERE p.ID_Transportista=".$id." AND p.ID=h.ID_Pedido AND c.ID=p.ID_Cliente AND h.ID_Producto=pd.ID AND pd.Productor=pr.ID AND p.ID_Transportista=t.ID AND v.Transportista=t.ID AND p.PStatus='NO'");

                    echo "<div class='col-sm-12'>";
                    echo "<table id=\"tablita\" class=\"table table-responsive\">";
                    while ($row = mysqli_fetch_array($r)) {
                      $r2 = seleccionar("SELECT * FROM cliente WHERE ID='".$row['cid']."'");
                      $row2 = mysqli_fetch_array($r2);
                      $r3 = seleccionar("SELECT * FROM sepomex WHERE id='".$row2["DirGeneral"]."'");
                      $row3 = mysqli_fetch_array($r3);
                      echo "<tr>
                            <th colspan=\"6\">PEDIDO NO. ".$row['idped'].": ".$row['fechaini']."</th>
                          </tr>
                          <tr>
                                <th>&nbsp;</th>
                                <th>CARGA</th>
                                <th>CLIENTE</th>
                                <th>PRODUCTOR</th>
                                <th>CALIFICAR</th>
                                <th>ENTREGADO</th>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>".$row['nprod']." ".$row['tprod']."<br>
                                  <strong>Cantidad:</strong> ".$row['artp']." ".$row['mprod']."<br><br></td>
                            <td>".$row2['Nombre']."<br>
                                  <strong>Email:</strong> ".$row2['Email']."<br>
                                  <strong>Teléfono:</strong> ".$row2['Telefono']."<br>
                                  <strong>Dirección:</strong> ".$row2['Calle']." #".$row2['Numero']." Col.".$row3['asentamiento'].". ".$row3['municipio'].", ".$row3['estado'].". CP: ".$row3['cp']."</td>
                            <td>".$row['prnom']." ".$row['prape']."<br>
                                  <strong>Email:</strong> ".$row['premail']."<br>
                                  <strong>Teléfono:</strong> ".$row['pretel']."</td>";
                        if($row['calif']==""){
                          echo "<td><button class=\"btn btn-success\" onClick=\"window.location='calificar.php?param=".$row['idped']."'\">CALIFICAR</button></td>";
                        }else{
                          echo "<td>Pedido calificado</td>";
                        }
                        if($row['entrega']==""){
                          echo "<td><button class=\"btn btn-success\" onClick=\"marcarEntregado(".$row['idped'].")\">ENTREGAR</button></td>
                              </tr>";
                        }else if($row['entrega']!=""){
                          echo "<td>Ya entregado al CLIENTE</td>
                              </tr>";
                        }
                    }
                    echo "</table></div>";
                  }else{
                    echo ("No tiene ningún envío pendiente");
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">HISTORIAL DE ENVIOS REALIZADOS:</a>
            </div>
            <div id="collapseFive" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid col-sm-12">
                  <?php
                    $query = seleccionar("SELECT p.TClien, p.TProd, p.ID, p.TFinal, p.TEnvio, p.FechaCreacion, p.FechaFin, p.TArticulos, pr.Nombre, pr.Tipo, pr.Foto FROM pedido p, historial h, producto pr WHERE ID_Transportista=".$_SESSION['NumTransportista']." AND PStatus='SI' AND p.ID=h.ID_Pedido AND h.ID_Producto=pr.ID");
                    if (mysqli_num_rows($query)>0){
                      $inventario = "<table id=\"tablita\" class=\"table table-responsive\"><thead>
                      <tr>
                      <th>NO. PEDIDO</th>
                      <th>COSTO ENVIO</th>
                      <th>FECHA DE COMPRA</th>
                      <th>FECHA DE ENTREGA</th>
                      <th>CALIF. PRODUCTOR</th>
                      <th>CALIF. CLIENTE</th>
                      </tr></thead><tbody>";
                      while($row3 = mysqli_fetch_array($query)) {
                        $inventario = $inventario . "<tr>";
                        $inventario = $inventario . "<td>" . $row3['ID'] . "</td>";
                        $inventario = $inventario . "<td>$" . $row3['TEnvio'] . "</td>";
                        $inventario = $inventario . "<td>" . substr($row3['FechaCreacion'],0,10) . "</td>";
                        $inventario = $inventario . "<td>" . substr($row3['FechaCreacion'],0,10) . "</td>";
                        if($row3['TProd']=="" && $row3['TClien']==""){
                          $inventario = $inventario . "<td colspan=\"2\"><button class=\"btn btn-success pull-right\" onClick=\"window.location='calificar.php?param=".$row3['ID']."'\">CALIFICAR</button></td>";
                        }else{
                          $inventario = $inventario . "<td>" . $row3['TProd']. "</td>";
                          $inventario = $inventario . "<td>" . $row3['TClien'] . "</td>";
                        }
                        $inventario = $inventario . "</tr>";
                      }
                    $inventario = $inventario . "</tbody></table>";
                    echo $inventario;
                  }else{
                    echo ("Actualmente no has terminado ningún envío.");
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">MI CALIFICACIÓN:</a>
            </div>
            <div id="collapseSix" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $i=0;
                    $cfinal=0;
                    $califs = seleccionar("SELECT PTransp, CTransp FROM pedido WHERE ID_Transportista=".$_SESSION["NumTransportista"]."");
                    while($rcalif = mysqli_fetch_array($califs)){
                      if($rcalif["PTransp"]!=""){
                        $cfinal=$cfinal+$rcalif["PTransp"];
                        $i++;
                      }
                      if($rcalif["CTransp"]!=""){
                        $cfinal=$cfinal+$rcalif["CTransp"];
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
                      $califs = seleccionar("SELECT ID, PTranspCom, CTranspCom FROM pedido WHERE ID_Transportista=".$_SESSION["NumTransportista"]."");
                      echo "<div class='col-sm-12'>";
                      echo "<table id=\"tablita\" class=\"table table-responsive\">";
                      while ($row = mysqli_fetch_array($califs)) {
                        if($row["PTranspCom"]!="" && $row["CTranspCom"]!=""){
                          echo "<tr>
                                <th rowspan=\"2\">PEDIDO NO. ".$row['ID']."</th>
                                <th>\"".$row["PTranspCom"]."\"</th>
                              </tr>
                              <tr>

                                    <th>\"".$row["TClienCom"]."\"</th>
                              </tr>";
                        }else if($row["PTranspCom"]!=""){
                          echo "<tr>
                                <th>PEDIDO NO. ".$row['ID']."</th>
                                <th>\"".$row["PTranspCom"]."\"</th>
                              </tr>";
                        }else if($row["CTranspCom"]!=""){
                          echo "<tr>
                                <th>PEDIDO NO. ".$row['ID']."</th>
                                <th>\"".$row["CTranspCom"]."\"</th>
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
