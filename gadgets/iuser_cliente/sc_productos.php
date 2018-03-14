<section class="main-content">
  <div class="row col-sm-12">
    <div class="col-sm-9">
      <ul class="thumbnails listing-products list-unstyled">
        <?php
        if($_GET['param']==1){
          $activo1='active';
          $regreso = ' ';
          $query = seleccionar("SELECT * FROM producto WHERE Oferta_Fin>'".date('Y-m-d')."' AND Cantidad>0 ORDER BY Oferta_Fin");
          while($row = mysqli_fetch_array($query)) {
            $regreso = '<li class="col-sm-4">
                <div class="product-box">
                <span class="sale_tag"></span>';
            $regreso = $regreso . '<a href="producto_detalle.php?param='.$row['ID'].'"><img alt="'.$row["Foto"].'" src="producto/'.$row["Foto"].'"></a><br/>';
            $regreso = $regreso . '<a href="producto_detalle.php?param='.$row['ID'].'" class="title">'.$row['Nombre'].' '.$row['Tipo'].'</a><br/>';
            $regreso = $regreso . '<p class="price">$'.$row['Precio'].'</p></div></li>';
            echo $regreso;
          }
        }else if($_GET['param']==2){
          $activo2='active';
          $regreso = ' ';
          $query = seleccionar("SELECT * FROM producto WHERE Oferta_Fin>'".date('Y-m-d')."' ORDER BY Disponible");
          while($row = mysqli_fetch_array($query)) {
            $regreso = '<li class="col-sm-4">
                <div class="product-box">
                <span class="sale_tag"></span>';
            $regreso = $regreso . '<a href="producto_detalle.php?param='.$row['ID'].'"><img alt="'.$row["Foto"].'" src="producto/'.$row["Foto"].'"></a><br/>';
            $regreso = $regreso . '<a href="producto_detalle.php?param='.$row['ID'].'" class="title">'.$row['Nombre'].' '.$row['Tipo'].'</a><br/>';
            $regreso = $regreso . '<p class="price">$'.$row['Precio'].'</p></div></li>';
            echo $regreso;
          }
        }else{
            $regreso = ' ';
            $query = seleccionar("SELECT * FROM producto WHERE Oferta_Fin>'".date('Y-m-d')."' ORDER BY ID");
            while($row = mysqli_fetch_array($query)) {
              $regreso = '<li class="col-sm-4">
                  <div class="product-box">
                  <span class="sale_tag"></span>';
              $regreso = $regreso . '<a href="producto_detalle.php?param='.$row['ID'].'"><img alt="'.$row["Foto"].'" src="producto/'.$row["Foto"].'"></a><br/>';
              $regreso = $regreso . '<a href="producto_detalle.php?param='.$row['ID'].'" class="title">'.$row['Nombre'].' '.$row['Tipo'].'</a><br/>';
              $regreso = $regreso . '<p class="price">$'.$row['Precio'].'</p></div></li>';
              echo $regreso;
            }
        }

        ?>
      </ul>

    </div>
    <div class="col-sm-3 col">
      <div class="block">
        <ul class="nav nav-list">
          <li class="nav-header"><strong>BÚSQUEDA POR FILTROS</strong></li>
          <li class=<?php echo $activo1; ?>><a href="productos.php?param=1">PRÓXIMOS EN IRSE</a></li>
          <li class=<?php echo $activo2; ?>><a href="productos.php?param=2">DISPONIBILIDAD INMEDIATA</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
