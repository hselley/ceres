<section class="main-content">
  <div class="row col-sm-12">
    <div class="col-sm-9">
      <ul class="thumbnails listing-products">
        <?
        $regreso = ' ';
        $query = seleccionar("SELECT * FROM producto WHERE Oferta_Fin>'".date('Y-m-d')."' ORDER BY id");
        while($row = mysqli_fetch_array($query)) {
          $regreso = '<li class="col-sm-3">
              <div class="product-box">
              <span class="sale_tag"></span>';
          $regreso = $regreso . '<a href="producto_detalle?param='.$row['ID'].'"><img alt="'.$row['foto'].'" src="img/'.$row['foto'].'"></a><br/>';
          $regreso = $regreso . '<a href="product_detalle?param='.$row['ID'].'" class="title">'.$row['Nombre'].'</a><br/>';
          $regreso = $regreso . '<p class="price">$'.$row['Precio'].'</p></div></li>';
          echo $regreso;
        }
        ?>
      </ul>

    </div>
    <div class="col-sm-3 col">
      <div class="block">
        <ul class="nav nav-list">
          <li class="nav-header">CATEGORIAS</li>
          <li <?php echo $activo1; ?>><a href="productos?param=1">FRUTA</a></li>
          <li <?php echo $activo2; ?>><a href="productos?param=2">VERDURA</a></li>
          <li <?php echo $activo3; ?>><a href="productos?param=3">OTROS</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
