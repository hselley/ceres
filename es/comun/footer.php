<section id="footer-bar">
  <div class="row">
    <div class="col-sm-3">
      <h4>Navegación</h4>
      <ul class="nav">
        <? if($_SESSION['NumCliente']==""&&$_SESSION['NumTransportista']==""&&$_SESSION['NumProductor']==""){
          echo '<li><a onclick="window.location=\'index\'">Inicio</a></li>';
        }?>
        <li><a href="./about.php">Acerca de</a></li>
        <li><a href="./contact.php">Contáctanos</a></li>
      </ul>
    </div>
    <div class="col-sm-3">
      <?
        if(isset($_SESSION['NumCliente'])){
          echo '<h4>Mi Cuenta</h4>';
          echo '<ul class="nav">';
          echo '<li><a onclick="window.location=\'cliente\'">Perfil Cliente</a></li>';
          echo '</ul>';
        }else if(isset($_SESSION['NumTransportista'])){
          echo '<h4>Mi Cuenta</h4>';
          echo '<ul class="nav">';
          echo '<li><a onclick="window.location=\'transportista\'">Perfil Transportista</a></li>';
          echo '</ul>';
        }else if(isset($_SESSION['NumProductor'])){
          echo '<h4>Mi Cuenta</h4>';
          echo '<ul class="nav">';
          echo '<li><a onclick="window.location=\'productor\'">Perfil Productor</a></li>';
          echo '</ul>';
        }
      ?>
    </div>
    <div class="col-sm-6">
      <p>CERES Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
