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
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">DATOS DEL VEHÍCULO</a>
            </div>
            <div id="collapseTwo" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?
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
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">DISPONIBILIDAD PARA ENVIOS:</a>
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
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">ENVIO ACTUAL:</a>
            </div>
            <div id="collapseFour" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?echo "Aquí se publicarán los envios pendientes que tenga el transportista.";?>
                  <?php /*
                    $query = seleccionar("SELECT * FROM producto WHERE Productor='".$_SESSION['NumProductor']."' AND Oferta_Fin >='".date('Y-m-d')."' AND Cantidad>0");
                    $inventario = "<table id=\"tablita\" class=\"table table-responsive\"><thead>
                    <tr>
                    <th>CÓDIGO</th>
                    <th>PRODUCTO</th>
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
                      $inventario = $inventario . "<td>" . $row['Caracteristicas'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Precio'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Oferta_fin'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Cantidad'] . "</td>";
                      $inventario = $inventario . "<td>" . $row['Empaque'] . "</td>";
                      $inventario = $inventario . "</tr>";
                    }
                    $inventario = $inventario . "</tbody></table>";

                    echo $inventario;*/?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">HISTORIAL DE ENVIOS REALIZADOS:</a>
            </div>
            <div id="collapseFive" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?echo "Aquí se pondrán los envios que el transportista haya completado.";?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">MI CALIFICACIÓN:</a>
            </div>
            <div id="collapseSix" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <? echo "Aquí se mostrará el promedio de las calificaciones que los clientes han dado al servicio de transporte."?>
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
