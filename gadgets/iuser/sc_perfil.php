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
                    $id= $_SESSION["NumProductor"];
                    $res = seleccionar("SELECT * FROM productor_2 WHERE ID='".$id."'");
                    $row = mysqli_fetch_array($res);
                    echo "<strong>NOMBRE COMPLETO:</strong> ".$row["Nombre"]." ".$row["Apellido"]."<BR>";
                    echo "<strong>CORREO ELECTRÓNICO:</strong> ".$row["Email"]."<BR>";
                    echo "<strong>TELEFONO:</strong> ".$row["Telefono"]."<BR>";
                    echo "<strong>CELULAR:</strong> ".$row["Celular"]."<BR>";
                    echo "<strong>ESTADO:</strong> ".$row["Estado"]."<BR>";
                    echo "<strong>TERRENO AGRÍCOLA:</strong> ".$row["Terreno"]."<BR>";
                    echo "<strong>CARACTERÍSTICAS TÉCNICO-PRODUCTIVAS:</strong> ".$row["Productivas"]."<BR>";
                    echo "<strong>BANCO:</strong> ".$row["Banco"]."<BR>";
                    echo "<strong>CUENTA BANCARIA:</strong> ".$row["Cuenta"]."<BR>";
                    echo "<strong>CLABE INTERBANCARIA:</strong> ".$row["Clabe"]."<BR>";
                    if($row["Status"]=='ACTI'){
                      $estatus='ACTIVO';
                    }else{
                      $estatus='INACTIVO';
                    }
                    echo "<strong>ESTATUS:</strong> ".$estatus."<BR>";
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">MIS PRODUCTOS:</a>
            </div>
            <div id="collapseTwo" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $query = seleccionar("SELECT * FROM producto WHERE Productor='".$_SESSION['NumProductor']."' AND Oferta_Fin >='".date('Y-m-d')."' AND Cantidad>0");
                    if (mysqli_num_rows($query)>0){
                      $inventario = "<table id=\"tablita\" class=\"table table-responsive\"><thead>
                      <tr>
                      <th>CÓDIGO</th>
                      <th>PRODUCTO</th>
                      <th></th>
                      <th>CARACTERÍSTICAS</th>
                      <th>PRECIO</th>
                      <th>FIN DE OFERTA</th>
                      <th>CANTIDAD DISPONIBLE</th>
                      <th>EMPAQUE</th>
                      <th>ELIMINAR</th>
                      </tr></thead><tbody>";
                      while($row = mysqli_fetch_array($query)) {
                        $inventario = $inventario . "<tr>";
                        $inventario = $inventario . "<td>" . $row['ID'] . "</td>";
                        $idproductoe = $row['ID'];
                        $inventario = $inventario . "<td>" . $row['Nombre'] . "</td>";
                        $inventario = $inventario . "<td>" . $row['Tipo'] . "</td>";
                        $inventario = $inventario . "<td>" . $row['Caracteristicas'] . "</td>";
                        $inventario = $inventario . "<td>" . $row['Precio'] . "</td>";
                        $inventario = $inventario . "<td>" . $row['Oferta_fin'] . "</td>";
                        $inventario = $inventario . "<td>" . $row['Cantidad'] ." ". $row['Medida'] ."</td>";
                        $inventario = $inventario . "<td>" . $row['Empaque'] . "</td>";
                        $inventario = $inventario . "<td><button class=\"btn btn-danger\" onClick=\"borrarP('".$idproductoe."')\">ELIMINAR</button></td>";
                        $inventario = $inventario . "</tr>";
                      }
                      $inventario = $inventario . "</tbody></table>";

                      echo $inventario;
                    }else{
                      echo ("No hay artículos ofertados en este momento.");
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">AGREGAR NUEVO PRODUCTO:</a>
            </div>
            <div id="collapseThree" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <div class="span7">
                    <form name="form_PROD" id="form_PROD" method="post" style="width: 50%; position: relative; left: 25%; margin-bottom: 20px">
                      <fieldset>
                        <div class="control-group">
                          <label class="control-label">NOMBRE: </label>
                          <div class="controls">
                            <input name="prod_1" id="prod_1" maxlength="60" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">TIPO: </label>
                          <div class="controls">
                            <input name="prod_2" id="prod_2" maxlength="60" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">CARACTERÍSTICAS/DESCRIPCIÓN: </label>
                          <div class="controls">
                            <textarea class="form-control" rows="5" name="prod_3" id="prod_3"></textarea>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">PRECIO UNITARIO: </label>
                          <div class="controls">
                            <input name="prod_4" id="prod_4" min="0" max="99999" step="0.01" type="number"  class="form-control">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">EMPAQUE: </label>
                          <div class="controls">
                            <input name="prod_5" id="prod_5" type="text" class="form-control">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">VOLÚMENES DISPONIBLES: </label>
                          <div class="controls">
                            <input name="prod_6" id="prod_6" min="0" max="99999" step=".1" type="number"  class="form-control">
                            <select class="form-control" name="prod_7" id="prod_7">
                              <optgroup label="PESO">
                                <option value="kg">kg  - Kilogramos</option>
                                <option value="ton">ton - Toneladas</option>
                              </optgroup>
                              <optgroup label="UNIDADES">
                                <option value="piezas">Piezas</option>
                              </optgroup>
                         		</select>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">DISPONIBILIDAD: </label>
                          <div class="controls">
                            <input name="prod_8" id="prod_8" type="date" min="<?php echo date('Y-m-d'); ?>" class="form-control">
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label">FIN DE LA OFERTA: </label>
                          <div class="controls">
                            <input name="prod_9" id="prod_9" min="<?php echo date('Y-m-d'); ?>" type="date" class="form-control">
                          </div>
                        </div>
                        <div class="control-group">
                          <label for="apellido">Necesita Refrigeración*:</label>
                       	 <select class="form-control" name="prod_10" id="prod_10">
                            <option value="-1">Seleccionar...</option>
                            <option value="SI">Si</option>
                            <option value="NO">No</option>
                       		</select>
                        </div>
                        <div class="control-group">
                          <label class="control-label">FOTO: </label>
                          <div class="controls">
                            <input type="file" name="prod_11" id="prod_11" class="form-control" accept=".jpg, .jpeg, .png">
                          </div>
                        </div>
                        <div class="actions">
                          <button class="btn btn-success" onClick="validarRegistroP()">Agregar Producto</button><br><br>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2">ÓRDENES LEVANTADAS:</a>
            </div>
            <div id="collapseFour" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                  $id = $_SESSION["NumProductor"];
                  $query = seleccionar("SELECT p.ID FROM pedido p, historial h, producto pr, productor_2 pd WHERE p.ID=h.ID_Pedido AND h.ID_Producto=pr.ID AND pr.Productor=pd.ID AND p.PStatus='NO' AND pd.ID=".$_SESSION['NumProductor']." ORDER BY p.ID");
                  if (mysqli_num_rows($query)>0){
                    while ($rtop = mysqli_fetch_array($query)) {
                      $pedido=$rtop["ID"];
                      $r = seleccionar("SELECT pd.FOTO foto, p.PClien calif, p.ID idped, p.EntregadoP entrega, p.FechaCreacion fechaini, p.TArticulos artp, pd.Nombre nprod, pd.Tipo tprod, pd.Medida mprod, pd.Disponible dprod, t.RazonSocial rstrans, t.Conductor ctrans, t.Email etrans, t.Telefono ttrans, v.Marca mveh, v.Tipo tveh, v.Placas pveh, c.Nombre clnom, c.Email clemail, c.Telefono cletel FROM pedido p, historial h, producto pd, transportista_2 t, vehiculo_2 v, cliente c WHERE p.ID=h.ID_Pedido AND p.ID_Cliente=c.ID AND h.ID_Producto=pd.ID AND p.ID_Transportista=t.ID AND t.ID=v.Transportista ANDp.ID=".$pedido."");
                      while ($row = mysqli_fetch_array($r)) {


                      echo "<table id=\"tablita\" class=\"table table-responsive\">";
                      echo "<tr>
                          <th colspan=\"6\">PEDIDO NO. ".$row['idped'].": ".$row['fechaini']."</th>
                          </tr>
                          <tr>
                                <th></th>
                                <th>PRODUCTOS</th>
                                <th>CLIENTE</th>
                                <th>TRANSPORTISTA</th>
                                <th>CALIFICAR</th>
                                <th>ENTREGAR</th>
                          </tr>
                          <tr>
                            <td><img src=\"producto/".$row['foto']."\" height='50%'></td>
                            <td>".$row['nprod']." ".$row['tprod']."<br>
                                    <strong>Cantidad:</strong> ".$row['artp']." ".$row['mprod']."<br><br></td>
                            <td>".$row['clnom']."<br>
                                  <strong>Email:</strong> ".$row['clemail']."<br>
                                  <strong>Teléfono:</strong> ".$row['cletel']."</td>
                            <td>".$row['ctrans']."<br>".$row['rstrans']."<br>
                                  <strong>Email:</strong> ".$row['etrans']."<br>
                                  <strong>Teléfono:</strong> ".$row['ttrans']." <br>
                                  <strong>Vehículo:</strong> ".$row['mveh']." ".$row['tveh']."<br>
                                  <strong>Placas:</strong> ".$row['pveh']."</td>";
                        if($row['calif']==""){
                          echo "<td><button class=\"btn btn-success\" onClick=\"window.location='calificar.php?param=".$row['idped']."'\">CALIFICAR</button></td>";
                        }else{
                          echo "<td>Pedido calificado</td>";
                        }
                        if($row['entrega']==""){
                          echo "<td><button class=\"btn btn-success\" onClick=\"marcarEntregado(".$row['idped'].")\">ENTREGAR</button></td>
                              </tr>";
                        }else if($row['entrega']!=""){
                          echo "<td>Ya entregado al TRANSPORTISTA</td>
                              </tr>";
                        }
                      }
                    }
                    echo "</table>";
                  }else{
                    echo ("Actualmente no has vendido ningún producto.");
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
                <div class="row-fluid">
                  <?php
                    $query = seleccionar("SELECT p.PClien, p.PTransp, p.ID, p.TFinal, p.TEnvio, p.FechaCreacion, p.FechaFin, p.TArticulos, pr.Nombre, pr.Tipo, pr.Foto FROM pedido p, historial h, producto pr, productor_2 pd WHERE PStatus='SI' AND p.ID=h.ID_Pedido AND h.ID_Producto=pr.ID AND pd.ID=pr.Productor AND pd.ID=".$_SESSION["NumProductor"]);
                    if (mysqli_num_rows($query)>0){
                      $inventario = "<table id=\"tablita\" class=\"table table-responsive\"><thead>
                      <tr>
                      <th>NO. PEDIDO</th>
                      <th></th>
                      <th>PRODUCTO</th>
                      <th>COSTO PRODUCTO</th>
                      <th>FECHA DE COMPRA</th>
                      <th>FECHA DE ENTREGA</th>
                      <th>CALIF. CLIENTE</th>
                      <th>CALIF. TRANSPORTISTA</th>
                      </tr></thead><tbody>";
                      while($row3 = mysqli_fetch_array($query)) {
                        $inventario = $inventario . "<tr>";
                        $inventario = $inventario . "<td>" . $row3['ID'] . "</td>";
                        $inventario = $inventario . "<td><img src=\"producto/".$row3['Foto']."\" alt=\"Smiley face\" height=\"10%\"></td>";
                        $inventario = $inventario . "<td>" . $row3['Nombre'] . " ". $row3['Tipo'] . "</td>";
                        $inventario = $inventario . "<td>$" . $row3['TFinal'] . "</td>";
                        $inventario = $inventario . "<td>" . substr($row3['FechaCreacion'],0,10) . "</td>";
                        $inventario = $inventario . "<td>" . substr($row3['FechaCreacion'],0,10) . "</td>";
                        if($row3['PClien']=="" && $row3['PTransp']==""){
                          $inventario = $inventario . "<td colspan=\"2\"><button class=\"btn btn-success pull-right\" onClick=\"window.location='calificar.php?param=".$row3['ID']."'\">CALIFICAR</button></td>";
                        }else{
                          $inventario = $inventario . "<td>" . $row3['PClien']. "</td>";
                          $inventario = $inventario . "<td>" . $row3['PTransp'] . "</td>";
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
                    $califs = seleccionar("SELECT p.CProd, p.TProd FROM pedido p, historial h, producto pr, productor_2 pd WHERE p.ID=h.ID_Pedido AND h.ID_Producto=pr.ID AND pr.Productor=pd.ID AND pd.ID=".$_SESSION['NumProductor']."");
                    while($rcalif = mysqli_fetch_array($califs)){
                      if($rcalif["CProd"]!=""){
                        $cfinal=$cfinal+$rcalif["CProd"];
                        $i++;
                      }
                      if($rcalif["TProd"]!=""){
                        $cfinal=$cfinal+$rcalif["TProd"];
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
                      echo "<br><br>Calificación basada en ".$i." reseñas: <br><br>";
                      $califs = seleccionar("SELECT p.ID, p.CProdCom, p.TProdCom FROM pedido p, historial h, producto pr, productor_2 pd WHERE p.ID=h.ID_Pedido AND h.ID_Producto=pr.ID AND pr.Productor=pd.ID AND pd.ID=".$_SESSION['NumProductor']."");
                      echo "<div class='col-sm-12'>";
                      echo "<table id=\"tablita2\" class=\"table table-responsive\">";
                      while ($row = mysqli_fetch_array($califs)) {
                        if($row["CProdCom"]!="" && $row["TProdCom"]!=""){
                          echo "<tr>
                                <th rowspan=\"2\">PEDIDO NO. ".$row['ID']."</th>
                                <th>\"".$row["CProdCom"]."\"</th>
                              </tr>
                              <tr>

                                    <th>\"".$row["TProdCom"]."\"</th>
                              </tr>";
                        }else if($row["CProdCom"]!=""){
                          echo "<tr>
                                <th>PEDIDO NO. ".$row['ID']."</th>
                                <th>\"".$row["CProdCom"]."\"</th>
                              </tr>";
                        }else if($row["TProdCom"]!=""){
                          echo "<tr>
                                <th>PEDIDO NO. ".$row['ID']."</th>
                                <th>\"".$row["TProdCom"]."\"</th>
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
