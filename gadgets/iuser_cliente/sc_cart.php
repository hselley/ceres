<section class="main-content">
  <div class="row col-sm-12">
    <div id="myDIV" class="col-sm-9">
      <h4 class="title"><span class="text"><strong>Mi</strong> Carrito</span></h4>
      <span>
          <?php echo $messlog; ?>
      </span>
      <?php
      $qelim = seleccionar("SELECT c.ID_Producto, p.Nombre, p.Tipo, p.Foto, c.CCantidad, p.Precio, p.Cantidad, p.Medida
                  FROM producto p, carrito c WHERE c.ID_Cliente=".$_SESSION['NumCliente']." AND p.ID=c.ID_Producto AND p.Oferta_fin<'". date("Y-m-d") ."' ORDER BY c.ID_Producto");
      $numelim = mysqli_num_rows($qelim);
      if($numelim>0){
        while($relim = mysqli_fetch_array($qelim)) {
          eliminarcart("carrito", $_SESSION['NumCliente'], $relim['ID_Producto']);
        }
      }
      $query = seleccionar("SELECT c.ID_Producto, p.Nombre, p.Caracteristicas, p.Tipo, p.Foto, c.CCantidad, p.Precio, p.Cantidad, p.Medida
                  FROM producto p, carrito c WHERE c.ID_Cliente=".$_SESSION['NumCliente']." AND p.ID=c.ID_Producto AND p.Oferta_fin>='". date("Y-m-d") ."' ORDER BY c.ID_Producto");
      $numrows = mysqli_num_rows($query);
      if($numrows>0){

        $rcart = '<table id="tablita" class="table table-striped">
          <thead>
            <tr>
              <th>Seleccionar</th>
              <th>Imagen</th>
              <th>Producto</th>
              <th>Descripcion</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
          <form name="MCart" id="MCart" action="" method="post">
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
          $rcart = $rcart . '<td><input type="radio" name="cart_1" id="cart_1" value="'.$idp.'" class="input-xlarge"></td>
            <td><a href="producto_detalle.php?param='.$idp.'"><img alt="'.$foto.'" src="producto/'.$foto.'" width="100"></a></td>
            <td>'.$nombre.'</td>
            <td>'.$descrip.'</td>
            <td><input name="'.$idp.'" id="'.$idp.'" type="number" min="1" max="'.$stock.'"class="span1" placeholder="" value="'.$cantidad.'">'.$row2["Medida"].'</td>
            <td>$'.$precio.'</td>
            <td>$'.number_format((float)$precio*$cantidad, 2, '.', '').'</td><tr>';
        }
        mysqli_close($connection);
        $rcart = $rcart . '
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><strong>$'.number_format((float)$pfinal, 2, '.', '').'</strong></td>
                    </tr>
                    </form>
                  </tbody>
                </table>
                <hr>
    						<p class="cart-total right">
    							<strong>Sub-Total</strong>:	$'.number_format((float)$pfinal/1.16, 2, '.', '').'<br>
    							<strong>IVA (16%)</strong>: $'.number_format((float)$pfinal-($pfinal/1.16), 2, '.', '').'<br>
    							<strong>Total</strong>: $'.number_format((float)$pfinal, 2, '.', '').'<br>
    						</p>
                <hr/>
                <p class="buttons center">
                  <button class="btn btn-success" form="MCart" OnClick=updateCart()>Actualizar</button>
    							<button class="btn btn-success" form="MCart" OnClick=deleteCart()>Eliminar</button>

    							<button class="btn btn-success" OnClick=window.location="checkout.php">Ir a Checkout</button>
    						</p>';
        echo $rcart;
      }else{
        $rcart = '<div class="alert alert-info"><strong>TIP:</strong> Agrega productos al carrito para poder comprar.</div>';
        echo $rcart;
      }
      ?>
    </div>
    <div class="col-sm-3 col">
      <div class="block">
        <ul class="nav nav-list">
          <li class="nav-header"><strong>BÚSQUEDA POR FILTROS</strong></li>
          <li><a href="productos?param=1">PRÓXIMOS EN IRSE</a></li>
          <li><a href="productos?param=2">DISPONIBILIDAD INMEDIATA</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
