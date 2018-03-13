<?php
  $qelim = seleccionar("SELECT c.ID_Producto, p.Nombre, p.Tipo, p.Foto, c.CCantidad, p.Precio, p.Cantidad, p.Medida
            FROM producto p, carrito c WHERE c.ID_Cliente=".$_SESSION['NumCliente']." AND p.ID=c.ID_Producto AND p.Oferta_fin<'". date("Y-m-d") ."' ORDER BY c.ID_Producto");
  $numelim = mysqli_num_rows($qelim);
  if($numelim>0){
    while($relim = mysqli_fetch_array($qelim)) {
      eliminarcart("carrito", $_SESSION['NumCliente'], $relim['ID_Producto']);
    }
  }
  $query = seleccionar("SELECT c.ID_Producto, p.Nombre, p.Tipo, p.Foto, c.CCantidad, p.Precio, p.Cantidad
              FROM producto p, carrito c WHERE ID_Cliente=".$_SESSION['NumCliente']." AND p.ID=c.ID_Producto ORDER BY c.ID_Producto");
  $numrow = mysqli_num_rows($query);
  if($numrow==0){
    echo ('<script>window.location="cart.php";</script>');
  }
?>
  <div class="row col-sm-12">
    <section class="sub" align="center">
      <div class="row col-sm-12">
        <h4><span><strong>CheckOut</strong></span></h4>
      </div><br>
    </section>
    <section class="main-content">
      <div class="col-sm-12">
        <div class="col-sm-12">
          <div class="accordion" id="accordion2">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapseOne" data-parent="#accordion2">Confirma tus datos</a>
              </div>
              <div id="collapseOne" class="accordion-body in collapse">
                <div class="accordion-inner">
                  <div class="row-fluid">
                    <div id="myDIV" class="span12">
                      <?php
                      $udata = seleccionar("SELECT c.Nombre, c.Rfc, c.Email, c.Telefono, c.Celular, c.Calle, c.Numero, c.Tarjeta, c.CVV, s.estado, s.municipio, s.asentamiento, s.cp FROM cliente c, sepomex s WHERE c.ID='".$_SESSION['NumCliente']."' AND c.DirGeneral=s.id");
                      while($row = mysqli_fetch_array($udata)) {
                        $nombre = $row['Nombre'];
                        $rfc = $row['Rfc'];
                        $email = $row['Email'];
                        $tel = $row['Telefono'];
                        $cel = $row['Celular'];
                        $calle = $row['Calle'];
                        $num = $row['Numero'];
                        $est = $row['estado'];
                        $mun = $row['municipio'];
                        $col = $row['asentamiento'];
                        $cp = $row['cp'];
                        $tarjeta = "XXXX XXXX XXXX ".substr($row["Tarjeta"], 12);
                        $cvv = "XX".substr($row["CVV"],2);
                      }
                      $misdatos= '
                          <div class="control-group">
                            <label>Razón Social:</label> '.$nombre.'
                          </div>
                          <div class="control-group">
                            <label>RFC:</label> '.$rfc.'
                          </div>
                          <div class="control-group">
                            <label>Email:</label> '.$email.'
                          </div>
                          <div class="control-group">
                            <label>Direccion:</label> '.$calle.' '.$num.'. Col. '.$col.'. '.$mun.', '.$est.'. CP: '.$cp.'
                          </div>
                          <div class="control-group">
                            <label>Tarjeta Bancaría:</label> '.$tarjeta.' <label>CV:</label> '.$cvv.'
                          </div>
                          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="collapseOne" href="#collapseTwo"><button class="btn btn-success pull-right">Siguiente</button></a>';
                      echo $misdatos;
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" >Confirma productos:</a>
              </div>
              <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
                  <div class="row-fluid">
                    <div id="myDIV" class="span12">
                      <?php
                      $qelim2 = seleccionar("SELECT c.ID_Producto, p.Nombre, p.Tipo FROM producto p, carrito c WHERE c.ID_Cliente=".$_SESSION['NumCliente']." AND p.ID=c.ID_Producto AND c.CCantidad>p.Cantidad ORDER BY c.ID_Producto");
                      $numelim2 = mysqli_num_rows($qelim2);
                      if($numelim2==1){
                        $CartInfo = "El producto '";
                        while($relim2 = mysqli_fetch_array($qelim2)) {
                          $CartInfo = $CartInfo."".$relim2['Nombre']." ".$relim2['Tipo']."' NO está disponible en la cantidad que está pidiendo. ACTUALICE la cantidad o ELIMÍNELO del carrito.";
                        }
                        $log = '<div class="alert alert-danger"><strong>ATENCIÓN: </strong>'.$CartInfo.'</div><br><button OnClick=window.location="cart.php" class="btn btn-success pull-right">Carrito</button>';
                        echo $log;
                      }else if($numelim2>1){
                        $CartInfo = "Los productos '";
                        while($relim2 = mysqli_fetch_array($qelim2)) {
                          $CartInfo = $CartInfo."".$relim2['Nombre']."-".$relim2['Tipo']."', '";
                        }
                        $CartInfo = $CartInfo.""." NO están disponibles en la cantidad que está pidiendo. Actualice la cantidad o Eliminelo del carrito.";
                        $log = '<div class="alert alert-danger"><strong>ATENCIÓN: </strong>'.$CartInfo.'</div><br><button OnClick=window.location="cart.php" class="btn btn-success pull-right">Carrito</button>';
                        echo $log;
                      }else{
                        $query = seleccionar("SELECT c.ID_Producto, p.Nombre, p.Caracteristicas, p.Tipo, p.Foto, c.CCantidad, p.Precio, p.Cantidad, p.Medida
                                    FROM producto p, carrito c WHERE c.ID_Cliente=".$_SESSION['NumCliente']." AND p.ID=c.ID_Producto AND p.Oferta_fin>='". date("Y-m-d") ."' ORDER BY c.ID_Producto");

                          $rcart = '<table id="tablita" class="table table-striped">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Producto</th>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>';
                          while($row2 = mysqli_fetch_array($query)) {
                            $idp = $row2['ID_Producto'];
                            $nombre = $row2['Nombre']." ".$row2['Tipo'];
                            $descrip = $row2['Caracteristicas'];
                            $foto = $row2['Foto'];
                            $cantidad = $row2['CCantidad'];
                            $precio = $row2['Precio'];
                            $stock = $row2['Cantidad'];
                            $pfinal = $pfinal + ($precio*$cantidad);
                            $rcart = $rcart . '<td>'.$idp.'</td>
                              <td><a href="producto_detalle.php?param='.$idp.'"><img alt="'.$foto.'" src="producto/'.$foto.'" width="100"></a></td>
                              <td>'.$nombre.'</td>
                              <td>'.$descrip.'</td>
                              <td>'.$cantidad.' '.$row2["Medida"].'</td>
                              <td>$'.$precio.'</td>
                              <td>$'.number_format((float)$precio*$cantidad, 2, '.', '').'</td><tr>';
                          }
                          $rcart = $rcart . '
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><strong>$'.number_format((float)$pfinal, 2, '.', '').'</strong></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <hr>
                      						<p class="cart-total right">
                      							<strong>Sub-Total</strong>:	$'.number_format((float)$pfinal/1.16, 2, '.', '').'<br>
                      							<strong>IVA (16%)</strong>: $'.number_format((float)$pfinal-($pfinal/1.16), 2, '.', '').'<br>
                      							<strong>Total</strong>: $'.number_format((float)$pfinal, 2, '.', '').'<br>
                      						</p>
                                  <hr/>';
                        $rcart= $rcart.'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" aria-expanded="true" aria-controls="collapseTwo" href="#collapseThree"><button class="btn btn-success pull-right">Siguiente</button></a>
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" aria-expanded="false" aria-controls="collapseTwo" href="#collapseOne"><button class="btn btn-success pull-right">Atrás</button></a>';
                        echo $rcart;
                      }?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" >Confirma transportista:</a>
              </div>
              <div id="collapseThree" class="accordion-body collapse">
                <div class="accordion-inner">
                  <div class="row-fluid">
                  <div id="myDIV" class="span12">
                    <?php
                    $qelim3 = seleccionar("SELECT c.ID_Transportista, t.RazonSocial, t.Conductor FROM carrito c, transportista_2 t WHERE c.ID_Cliente=".$_SESSION['NumCliente']." AND t.ID=c.ID_Transportista AND (t.Disponible='NO' OR t.Status='INAC')");
                    $numelim3 = mysqli_num_rows($qelim3);
                    if($numelim3>0){
                      $qelim4 = seleccionar("SELECT c.ID_Transportista, c.ID_Producto, t.RazonSocial, t.Conductor, p.Refrigeracion, pd.Estado FROM carrito c, transportista_2 t, producto p, productor_2 pd WHERE c.ID_Cliente=".$_SESSION['NumCliente']." AND p.Productor=pd.ID AND t.ID=c.ID_Transportista AND p.ID=c.ID_Producto AND (t.Disponible='NO' OR t.Status='INAC')");
                      $in = 0;
                      while($relim4 = mysqli_fetch_array($qelim4)) {
                        $est=$relim4['Estado'];
                        $ref=$relim4['Refrigeracion'];
                        $iprod=$relim4['ID_Producto'];
                        $TranspInfo = "El transportista seleccionado '";
                        $TranspInfo = $TranspInfo."".$relim4['Conductor']."' que pertenece a la Razón Social '".$relim4['RazonSocial']."' actualmente NO está disponible. SELECCIONE otro transportista o ELIMINE el producto.";
                        $newt = seleccionar("SELECT t.ID, t.RazonSocial, t.Conductor FROM transportista_2 t, vehiculo_2 v WHERE t.Estado=".$est." AND t.ID=v.Transportista AND t.Disponible='SI' AND v.Refrigeracion='".$ref."' AND t.Status='ACTI' ORDER BY Conductor");
                        $rowsnt = mysqli_num_rows($newt);
                        if($rowsnt>0){
                          $rdetail = $rdetail .'<form name="NewT" id="NewT" method="post" class="form-inline form-group">
                            <input checked type="radio" id="prod" name="prod" value="'.$iprod.'"><label> Producto: </label>'.$iprod.'<br>
                            <label>Transportistas Disponibles:</label>
                            <select class="form-control" name="ntr" id="ntr">';
                         		 while ($ro = mysqli_fetch_array($newt)){
                         		    $rdetail = $rdetail .'<option value="'.$ro["ID"].'">'.$ro["Conductor"]." - ".$ro["RazonSocial"].'</option>';
                         		 }
                         		$rdetail = $rdetail.'</select><br>';
                        }else{
                          $rdetail = $rdetail.'<label>Transportistas Disponibles:</label> Actualmente no hay transportistas disponibles para enviar este producto.<br>';
                        }
                        $log2 = '<div class="alert alert-danger"><strong>ATENCIÓN: </strong>'.$TranspInfo.'</div><br>';
                        echo $log2;
                        echo $rdetail;
                        echo "<button id=\"CmbioT\" onclick=\"updateTransp()\" class=\"btn btn-success pull-right\">Cambiar Transportista</button></form>";
                        $in++;
                      }
                    }else{
                      $query2 = seleccionar("SELECT c.ID_Transportista, t.ID, t.Conductor, t.RazonSocial, t.Email, t.Telefono, t.Celular, v.Tipo, v.Marca
                                  FROM transportista_2 t, carrito c, vehiculo_2 v WHERE c.ID_Cliente=".$_SESSION['NumCliente']." AND t.ID=c.ID_Transportista AND t.ID=v.Transportista");

                        $rtransp = '<table id="tablita" class="table table-striped">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Razón Social</th>
                              <th>Conductor</th>
                              <th>Email</th>
                              <th>Teléfono</th>
                              <th>Celular</th>
                              <th>Vehículo</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>';
                        while($row3 = mysqli_fetch_array($query2)) {
                          $idt = $row3['ID_Transportista'];
                          $rs = $row3['RazonSocial'];
                          $conductor = $row3['Conductor'];
                          $temail = $row3['Email'];
                          $ttel = $row3['Telefono'];
                          $tcel = $row3['Celular'];
                          $vehiculo = $row3['Tipo']." ".$row3['Marca'];
                          $rtransp = $rtransp . '<td>'.$idt.'</td>
                            <td>'.$rs.'</td>
                            <td>'.$conductor.'</td>
                            <td>'.$temail.'</td>
                            <td>'.$ttel.'</td>
                            <td>'.$tcel.'</td>
                            <td>'.$vehiculo.'</td></tr>';
                        }
                        $rtransp = $rtransp . '
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                      <td>&nbsp;</td>
                                    </tr>
                                  </tbody>
                                </table><hr>
                                <p class="cart-total right">
                                  <strong>Costo de Envío: </strong>	$'.number_format((float)$pfinal*.08/1.16, 2, '.', '').'<br>
                                  <strong>Costo de Productos: </strong>	$'.number_format((float)$pfinal/1.16, 2, '.', '').'<br>
                                  <strong>Sub-Total</strong>:	$'.number_format((float)($pfinal+($pfinal*.08))/1.16, 2, '.', '').'<br>
                                  <strong>IVA (16%)</strong>: $'.number_format((float)($pfinal*1.08)-(($pfinal+($pfinal*.08))/1.16), 2, '.', '').'<br>
                                  <strong>Total</strong>: $'.number_format((float)($pfinal*1.08), 2, '.', '').'<br>
                                </p>
                                <hr/>';
                      $pfinal= $pfinal*1.08;
                      $rtransp = $rtransp.'<button class="btn btn-success pull-right" onClick="finCompra()">Finalizar Compra</button>
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" aria-expanded="false" aria-controls="collapseTwo" href="#collapseOne"><button class="btn btn-success pull-right">Atrás</button></a>';
                      echo $rtransp;
                    }?>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>


  </div>
