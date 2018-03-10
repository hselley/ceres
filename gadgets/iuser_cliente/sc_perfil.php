<section class="main-content">
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-1" align="center">

      </div>
      <div class="col-sm-10">
        <div class="accordion" id="accordion2">

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">MIS DATOS</a>
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
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">HISTORIAL DE COMPRAS:</a>
            </div>
            <div id="collapseTwo" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $query = seleccionar("SELECT * FROM compras WHERE Cliente='".$_SESSION['NumProductor']."' AND Status='INAC'");
                    if (mysqli_num_rows($query)>0){
                      $inventario = "<table id=\"tablita\" class=\"table table-responsive\"><thead>
                      <tr>
                      <th>CÓDIGO</th>
                      <th>PRODUCTO</th>
                      <th>CARACTERÍSTICAS</th>
                      <th>TOTAL</th>
                      <th>FECHA DE COMPRA</th>
                      <th>FECHA DE ENTREGA</th>
                      <th>CALIFICACIÓN</th>
                      </tr></thead><tbody>";
                      while($row3 = mysqli_fetch_array($query)) {
                        $inventario = $inventario . "<tr>";
                        $inventario = $inventario . "<td>" . $row3['ID'] . "</td>";
                        $inventario = $inventario . "<td>" . $row3['Nombre'] . "</td>";
                        $inventario = $inventario . "<td>" . $row3['Caracteristicas'] . "</td>";
                        $inventario = $inventario . "<td>" . $row3['Precio'] . "</td>";
                        $inventario = $inventario . "<td>" . $row3['Oferta_fin'] . "</td>";
                        $inventario = $inventario . "<td>" . $row3['Cantidad'] . "</td>";
                        $inventario = $inventario . "<td>" . $row3['Empaque'] . "</td>";
                        $inventario = $inventario . "</tr>";
                      }
                    $inventario = $inventario . "</tbody></table>";
                    echo $inventario;
                  }else{
                    echo ("Realiza tu primera compra <a href='productos'>AQUÍ</a>");
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="accordion-group">
            <div class="accordion-heading">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">ÓRDENES PENDIENTES:</a>
            </div>
            <div id="collapseFour" class="accordion-body in collapse">
              <div class="accordion-inner">
                <div class="row-fluid">
                  <?php
                    $query = seleccionar("SELECT * FROM compras WHERE Cliente='".$_SESSION['NumProductor']."' AND Status='ACTI'");
                    $inventario = "<table id=\"tablita\" class=\"table table-responsive\"><thead>
                    <tr>
                    <th>CÓDIGO</th>
                    <th>PRODUCTO</th>
                    <th>CARACTERÍSTICAS</th>
                    <th>TOTAL</th>
                    <th>FECHA DE COMPRA</th>
                    <th>FECHA DE ENTREGA</th>
                    <th>CALIFICAR</th>
                    </tr></thead><tbody>";
                    while($row3 = mysqli_fetch_array($query)) {
                      $inventario = $inventario . "<tr>";
                      $inventario = $inventario . "<td>" . $row3['ID'] . "</td>";
                      $inventario = $inventario . "<td>" . $row3['Nombre'] . "</td>";
                      $inventario = $inventario . "<td>" . $row3['Caracteristicas'] . "</td>";
                      $inventario = $inventario . "<td>" . $row3['Precio'] . "</td>";
                      $inventario = $inventario . "<td>" . $row3['Oferta_fin'] . "</td>";
                      $inventario = $inventario . "<td>" . $row3['Cantidad'] . "</td>";
                      $inventario = $inventario . "<td>" . $row3['Empaque'] . "</td>";
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
