<section class="main-content">
  <span>
      <?php echo $messaddc; ?>
  </span>
  <div class="row col-sm-12">
    <?php
    $_SESSION["ProductoAdd"]=$_GET['param'];
    $id_prod = $_GET['param'];
    if($id_prod==''){
      $_SESSION["ProductoAdd"]=1;
      $id_prod=1;
    }
    $rdetail = '<div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-4">';
    $query = seleccionar("SELECT DISTINCT p.Nombre, p.Tipo, p.Caracteristicas, p.Disponible, p.Cantidad, p.Medida, p.Oferta_Fin, p.Empaque, p.Precio, p.Foto, pd.Estado, s.estado FROM producto p, productor_2 pd, sepomex s WHERE p.ID=$id_prod AND pd.ID=p.Productor AND s.idEstado=pd.Estado");
    while($row = mysqli_fetch_array($query)) {
      $name = $row['Nombre']." ".$row['Tipo'];
      $descrip = $row['Caracteristicas'];
      $disp = $row['Disponible'];
      $stock = $row['Cantidad'];
      $medida = $row['Medida'];
      $ofin = $row['Oferta_Fin'];
      $empaque = $row['Empaque'];
      $precio = $row['Precio'];
      $foto = $row['Foto'];
      $est = $row['Estado'];
      $estN = $row['estado'];
    }
    mysqli_close($connection);
    $rdetail = $rdetail . '<a href="img/platano.jpeg" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="'.$foto.'" src="img/platano.jpeg"></a>
              </div>
                <div class="col-sm-5">
                  <address>
                    </div>
                    <div class="col-sm-5">
                      <address>
                        <strong>Nombre:</strong> <span>'.$name.'</span><br>
                        <strong>Código de Producto:</strong> <span>#'.$id_prod.'</span><br>
                        <strong>Estado de Origen:</strong> <span>'.$estN.'</span><br>
                        <strong>Disponible a partir de:</strong> <span>'.$disp.'</span><br>
                      </address>
                      <h4><strong>Precio: $'.$precio.'</strong></h4>
                    </div>
                    <div class="col-sm-5">';
                    $r = seleccionar("SELECT ID, RazonSocial, Conductor FROM transportista_2 WHERE Estado='".$est."' AND DISPONIBLE='SI' AND STATUS='ACTI' ORDER BY Conductor");
                    if(mysqli_num_rows($r)>0){
                      $rdetail = $rdetail .'<form name="ACart" id="ACart" method="post" class="form-inline form-group">
                        <p>&nbsp;</p>
                        <label>Cantidad:</label>
                        <input name="cadd_1" id="cadd_1" type="number" min="1" max="'.$stock.'"class="span1" placeholder="" value="1"> '.$medida.'<br>
                        <label>Transportistas Disponibles:</label>
                        <select class="form-control" name="cadd_2" id="cadd_2">
                          <option value="-1">Seleccionar...</option>';

                     		 while ($ro = mysqli_fetch_array($r)){
                     		    $rdetail = $rdetail .'<option value="'.$ro["ID"].'">'.$ro["Conductor"]." - ".$ro["RazonSocial"].'</option>';
                     		 }
                     		$rdetail = $rdetail.'</select><br>
                        <button class="btn btn-success" onClick="validarAddCart()">Agregar al Carrito</button>
                      </form>';
                    }else{
                      $rdetail = $rdetail.'<label>Cantidad:</label> '.$stock.'<br>
                      <label>Transportistas Disponibles:</label> Actualmente no hay transportistas disponibles para enviar este producto.<br>';
                    }

                  $rdetail = $rdetail.'</div>
                  </div>
                  <div class="row">
                    <div class="col-sm-9">
                      <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="">Descripción</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="home">'.$descrip.'</div>
                      </div>
                    </div>
                  </div>
                </div>';
      echo $rdetail;
    ?>

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
