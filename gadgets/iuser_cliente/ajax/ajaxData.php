<? $tipo = 1; $path = "../"; include("../../../func/funciones.php");

$i = 1;

if(isset($_POST["id_estado"]) && !empty($_POST["id_estado"])){
    //Get all state data
    $res = seleccionar("SELECT DISTINCT idMunicipio, municipio FROM sepomex WHERE idEstado = ".$_POST['id_estado']." ORDER BY municipio");

    //Display states list
    echo "<option value='-1'>Selecciona un Municipio...</option>";
    while ($row = mysqli_fetch_array($res)){
      echo "<option value='".$row['idMunicipio']."'>".$row['municipio']."</option>";
    }
}

if(isset($_POST["id_municipio"]) && !empty($_POST["id_municipio"])){
    //Get all state data
    $res = seleccionar("SELECT DISTINCT cp FROM sepomex WHERE idMunicipio = ".$_POST['id_municipio']." AND idEstado= ".$_POST['id_edo']." ORDER BY cp");

    //Display states list
    echo "<option value='-1'>Selecciona un Código Postal...</option>";
    while ($row = mysqli_fetch_array($res)){
      echo "<option value='".$row['cp']."'>".$row['cp']."</option>";
    }
}

if(isset($_POST["cp_num"]) && !empty($_POST["cp_num"])){
    //Get all state data
    $res = seleccionar("SELECT id, asentamiento, tipo FROM sepomex WHERE cp = ".$_POST['cp_num']." ORDER BY asentamiento");

    //Display states list
    echo "<option value='-1'>Selecciona una Colonia...</option>";
    while ($row = mysqli_fetch_array($res)){
      echo "<option value='".$row['id']."'>".$row['asentamiento']." - ".$row['tipo']."</option>";
    }
}

if(isset($_POST["em"]) && !empty($_POST["em"])){
    $res = seleccionar("SELECT * FROM cliente WHERE Email = '".$_POST['em']."'");
    if (mysqli_num_rows($res) > 0)
  	{
  		echo "REPEAT";
  	}
}
?>
