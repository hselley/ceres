<section class="main-content">
  <span>
      <?php echo $messaddc; ?>
  </span>
  <div class="row col-sm-12">
    <?php
    $id_prod = $_GET['param'];
    if($id_prod==''){
      $id_prod=1;
    }
    $rdetail = '<div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-4">';
    $query = seleccionar("SELECT * FROM producto WHERE ID=$id_prod");
    while($row = mysqli_fetch_array($query)) {
      $name = $row['Nombre']." ".$row['Tipo'];
      $descrip = $row['Caracteristicas'];
      $disp = $row['Disponible'];
      $stock = $row['Cantidad'];
      $ofin = $row['Oferta_Fin'];
      $empaque = $row['Empaque'];
      $precio = $row['Precio'];
      $foto = $row['Foto'];
    }
    mysqli_close($connection);
    $rdetail = $rdetail . '<a href="img/'.$foto.'" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="'.$foto.'" src="img/'.$foto.'"></a>
              </div>
                <div class="col-sm-5">
                  <address>
                    </div>
                    <div class="col-sm-5">
                      <address>
                        <strong>Nombre:</strong> <span>'.$name.'</span><br>
                        <strong>Código de Producto:</strong> <span>#'.$id_prod.'</span><br>
                        <strong>Disponible a partir de:</strong> <span>'.$disp.'</span><br>
                      </address>
                      <h4><strong>Precio: $'.$precio.'</strong></h4>
                    </div>
                    <div class="col-sm-5">';
      if(isset($_SESSION['login_user'])){
        $rdetail = $rdetail . '<form action="" method="post" class="form-inline">
            <p>&nbsp;</p>
            <label>Cantidad:</label>
            <input name="cadd" type="number" min="1" max="'.$stock.'"class="span1" placeholder="" value="1">
            <input tabindex="9" class="btn btn-inverse large" name="submit_addcart" type="submit" value="Agregar al Carrito">
          </form>';
      }
      $rdetail = $rdetail . '</div>
                  </div>
                  <div class="row">
                    <div class="col-sm-9">
                      <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#home">Descripción</a></li>
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
          <li class="nav-header">CATEGORIAS</li>
          <li><a href="productos?param=1">FRUTA</a></li>
          <li><a href="productos?param=2">VERDURA</a></li>
          <li><a href="productos?param=3">OTROS</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
