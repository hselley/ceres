<section id="footer-bar">
  <div class="row">
    <div class="col-sm-3">
      <h4>Navegación</h4>
      <ul class="nav">
        <?php if($_SESSION['NumCliente']==""&&$_SESSION['NumTransportista']==""&&$_SESSION['NumProductor']==""){
          echo '<li><a onclick="window.location=\'index.php\'">Inicio</a></li>';
        }?>
        <li><a href="./about.php">Acerca de</a></li>
        <li><a href="mailto:administrador@ceresapp.com.mx">Contáctanos</a></li>
      </ul>
    </div>
    <div class="col-sm-3">
      <?php
        if(isset($_SESSION['NumCliente'])){
          echo '<h4>Mi Cuenta</h4>';
          echo '<ul class="nav">';
          echo '<li><a onclick="window.location=\'cliente.php\'">Perfil Cliente</a></li>';
          echo '<li><a onclick="ajaxLogOut()">Salir</a></li>';
          echo '</ul>';
        }else if(isset($_SESSION['NumTransportista'])){
          echo '<h4>Mi Cuenta</h4>';
          echo '<ul class="nav">';
          echo '<li><a onclick="window.location=\'transportista.php\'">Perfil Transportista</a></li>';
          echo '<li><a onclick="ajaxLogOut()">Salir</a></li>';
          echo '</ul>';
        }else if(isset($_SESSION['NumProductor'])){
          echo '<h4>Mi Cuenta</h4>';
          echo '<ul class="nav">';
          echo '<li><a onclick="window.location=\'productor.php\'">Perfil Productor</a></li>';
          echo '<li><a onclick="ajaxLogOut()">Salir</a></li>';
          echo '</ul>';
        }
      ?>
    </div>
    <div class="col-sm-6">
      <p>El proyecto “CERES: del campo a la ciudad” busca impulsar el crecimiento agropecuario de
        los productores en México, eficientar el transporte y ofrecer precios atractivos al cliente.</p>
      <br/>
    </div>
  </div>
</section>
<section id="copyright">
  <span>Copyright 2018 CERES.</span>
</section>

</div>
</body>
</html>
