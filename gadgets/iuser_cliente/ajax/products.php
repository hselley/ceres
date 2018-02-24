<? $tipo = 1; $path = "../"; include("../../../func/funciones.php");
$row = seleccionar("SELECT * FROM producto ORDER BY id");
while($row = mysqli_fetch_array($query)) {
  $regreso = $regreso .'<li class="col-sm-3">
      <div class="product-box">
      <span class="sale_tag"></span>';
  $regreso = $regreso . '<a href="product_detail.php?param='.$row['ID'].'"><img alt="'.$row['foto'].'" src="img/'.$row['foto'].'"></a><br/>';
  $regreso = $regreso . '<a href="product_detail.php?param='.$row['ID'].'" class="title">'.$row['Nombre'].'</a><br/>';
  $regreso = $regreso . '<p class="price">$'.$row['Precio'].'</p></div></li>';
  echo $regreso;
}
?>
