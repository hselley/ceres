<div <div class="col-sm-5">
  <h4 class="title"><span class="text"><strong>LOGIN COMO PRODUCTOR CERES</strong></span></h4>
  <form name="form4" id="form4" method="post" style="width: 75%; position: relative; left: 12.5%; margin-bottom: 20px">
    <div class="form-group">
   	 <label for="nombre">Correo Electrónico:</label>
   	 <input type="text" class="form-control" name="login_1" id="login_1">
    </div>
    <div class="form-group">
   	 <label for="apellido">Contraseña:</label>
   	 <input type="password" class="form-control" name="login_2" id="login_2">
    </div>
    <button class="btn btn-success" onClick="validarlogin()">Login</button>
  </form>
</div>

<div class="col-sm-7">
  <h4 class="title"><span class="text"><strong>ALTA COMO PRODUCTOR CERES</strong></span></h4>
  <form name="form3" id="form3" method="post" style="width: 75%; position: relative; left: 12.5%; margin-bottom: 20px">
   <div class="form-group">
   <label class="obli">*Campos Obligatorios</label><br>
  	 <label for="nombre">Nombre*:</label>
  	 <input type="text" class="form-control" name="iuser_1" id="iuser_1">
   </div>
   <div class="form-group">
  	 <label for="apellido">Apellido*:</label>
  	 <input type="text" class="form-control" name="iuser_2" id="iuser_2">
   </div>
   <div class="form-group">
  	 <label for="apellido">Correo Electrónico*:</label>
  	 <input type="text" class="form-control" name="iuser_3" id="iuser_3">
   </div>
   <div class="form-group">
  	 <label for="apellido">Contraseña*:</label>
  	 <input type="password" class="form-control" name="iuser_4" id="iuser_4">
   </div>
   <div class="form-group">
  	 <label for="apellido">Reintroduce tu Contraseña:</label>
  	 <input type="password" class="form-control" name="iuser_5" id="iuser_5">
   </div>
   <div class="form-group">
  	 <label for="apellido">Teléfono*:</label>
  	 <input type="text" class="form-control" name="iuser_6" id="iuser_6">
   </div>
   <div class="form-group">
  	 <label for="apellido">Celular:</label>
  	 <input type="text" class="form-control" name="iuser_7" id="iuser_7">
   </div>
   <div class="form-group">
  	 <label for="apellido">Estado*:</label>
  	 <select class="form-control" name="iuser_8" id="iuser_8">
       <option value="-1">Seleccionar...</option>
  		 <? $res = seleccionar("SELECT * FROM estado ORDER BY Estado");
  		 		while ($row = mysqli_fetch_array($res)){?>
  					<option value="<? echo $row["Estado"]?>"><? echo $row["Estado"]?></option>
  				<? } ?>
  		</select>
   </div>
   <div class="form-group">
  	 <label for="apellido">Terreno Agrícola*:</label>
  	 <textarea class="form-control" rows="5" name="iuser_9" id="iuser_9"></textarea>
   </div>
   <div class="form-group">
  	 <label for="apellido">Características Técnico-Productivas*:</label>
  	 <textarea class="form-control" rows="5" name="iuser_10" id="iuser_10"></textarea>
   </div>
   <div class="form-group">
  	 <label for="apellido">Nombre del Banco*:</label>
  	 <input type="text" class="form-control" name="iuser_11" id="iuser_11">
   </div>
   <div class="form-group">
  	 <label for="apellido">No. Cuenta Bancaria*:</label>
  	 <input type="text" class="form-control" name="iuser_12" id="iuser_12">
   </div>
   <div class="form-group">
  	 <label for="apellido">No. CLABE Interbancaria*:</label>
  	 <input type="text" class="form-control" name="iuser_13" id="iuser_13">
   </div>
   <div class="checkbox">
  	 <label><input type="checkbox" required name="chk_1" id="chk_1">Acepto las Condiciones de Participación como Productor CERES*</label>
  	 <a href="../fotos/documentos/condiciones.pdf" target="_blank">Ver condiciones</a>
   </div>
   <button class="btn btn-success" onClick="validarRegistro()">Registrar</button>
  </form>
</div>
