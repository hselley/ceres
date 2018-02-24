<section class="main-content">
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-3" align="center">
        <img id='barcode'
              src="https://api.qrserver.com/v1/create-qr-code/?data=localhost/~osos04/es/productor&amp;size=100x100"
              alt=""
              title="QR CODE"
              width="150"
              height="150"/>
        <br>
      </div>
      <div class="col-sm-9">
        <div class="accordion" id="accordion2">

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">MIS DATOS</a>
            </div>
            <div id="collapseOne" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?
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
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">MIS PRODUCTOS:</a>
            </div>
            <div id="collapseTwo" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $query = seleccionar("SELECT * FROM producto WHERE Productor='".$_SESSION['NumProductor']."' AND Oferta_Fin >='".date('Y-m-d')."' AND Cantidad>0");
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
                    </tr></thead><tbody>";
                    while($row = mysqli_fetch_array($query)) {
                      $inventario = $inventario . "<tr>";
                      $inventario = $inventario . "<td>" . $row['ID'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Nombre'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Tipo'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Caracteristicas'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Precio'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Oferta_fin'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Cantidad'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Empaque'] . "</td>";
                      $inventario = $inventario . "</tr>";
                    }
                    $inventario = $inventario . "</tbody></table>";

                    echo $inventario;?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">AGREGAR NUEVO PRODUCTO:</a>
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
                          <label class="control-label">FOTO: </label>
                          <div class="controls">
                            <input type="file" name="prod_10" id="prod_10" class="form-control">
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
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">ÓRDENES LEVANTADAS:</a>
            </div>
            <div id="collapseFour" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <? echo "Aquí se mostrarán las órdenes levantadas por los clientes"?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">MI CALIFICACIÓN:</a>
            </div>
            <div id="collapseFive" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">

                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>

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
