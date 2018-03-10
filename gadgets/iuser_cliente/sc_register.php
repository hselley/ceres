<div <div class="col-sm-5">
  <h4 class="title"><span class="text"><strong>LOGIN COMO CLIENTE CERES</strong></span></h4>
  <form name="LIClient" id="LIClient" method="post" style="width: 75%; position: relative; left: 12.5%; margin-bottom: 20px">
    <div class="form-group">
   	 <label for="nombre">Correo Electrónico:</label>
   	 <input type="text" class="form-control" name="loginc_1" id="loginc_1">
    </div>
    <div class="form-group">
   	 <label for="apellido">Contraseña:</label>
   	 <input type="password" class="form-control" name="loginc_2" id="loginc_2">
    </div>
    <button class="btn btn-success" onClick="validarloginc()">Login</button>
  </form>
</div>

<div class="col-sm-7">
  <h4 class="title"><span class="text"><strong>ALTA COMO CLIENTE CERES</strong></span></h4>
  <form name="RClient" id="RClient" method="post" style="width: 75%; position: relative; left: 12.5%; margin-bottom: 20px">
   <div class="form-group">
   <label class="obli">*Campos Obligatorios</label><br>
  	 <label for="nombre">Razón Social*:</label>
  	 <input type="text" class="form-control" name="iuserc_1" id="iuserc_1">
   </div>
   <div class="form-group">
  	 <label for="apellido">RFC*:</label>
  	 <input type="text" class="form-control" name="iuserc_2" id="iuserc_2">
   </div>
   <div class="form-group">
  	 <label for="apellido">Correo Electrónico*:</label>
  	 <input type="text" class="form-control" name="iuserc_3" id="iuserc_3">
   </div>
   <div class="form-group">
  	 <label for="apellido">Contraseña*:</label>
  	 <input type="password" class="form-control" name="iuserc_4" id="iuserc_4">
   </div>
   <div class="form-group">
  	 <label for="apellido">Reintroduce tu Contraseña:</label>
  	 <input type="password" class="form-control" name="iuserc_5" id="iuserc_5">
   </div>
   <div class="form-group">
  	 <label for="apellido">Teléfono*:</label>
  	 <input type="text" class="form-control" name="iuserc_6" id="iuserc_6">
   </div>
   <div class="form-group">
  	 <label for="apellido">Celular:</label>
  	 <input type="text" class="form-control" name="iuserc_7" id="iuserc_7">
   </div>
   <div class="form-group">
  	 <label for="apellido">Estado*:</label>
  	 <select class="form-control" name="iuserc_8" id="iuserc_8">
       <option value="-1">Seleccionar...</option>
  		 <?php  $res = seleccionar("SELECT DISTINCT idEstado, estado FROM sepomex ORDER BY estado");
  		 		while ($row = mysqli_fetch_array($res)){?>
  					<option value="<?php  echo $row["idEstado"]?>"><?php  echo $row["estado"]?></option>
  				<?php  } ?>
  		</select>
   </div>
   <div class="form-group">
  	 <label for="apellido">Municipio*:</label>
  	 <select class="form-control" name="iuserc_9" id="iuserc_9">
       <option value="-1">Seleccionar...</option>
  		</select>
   </div>
   <div class="form-group">
  	 <label for="apellido">Codigo Postal*:</label>
  	 <select class="form-control" name="iuserc_10" id="iuserc_10">
       <option value="-1">Seleccionar...</option>
  		</select>
   </div>
   <div class="form-group">
  	 <label for="apellido">Colonia*:</label>
  	 <select class="form-control" name="iuserc_11" id="iuserc_11">
       <option value="-1">Seleccionar...</option>
  		</select>
   </div>
   <div class="form-group">
  	 <label for="apellido">Calle*:</label>
  	 <input type="text" class="form-control" name="iuserc_12" id="iuserc_12">
   </div>
   <div class="form-group">
  	 <label for="apellido">Número Exterior*:</label>
  	 <input type="text" class="form-control" name="iuserc_13" id="iuserc_13">
   </div>
   <div class="form-group">
  	 <label for="apellido">Número Interior:</label>
  	 <input type="text" class="form-control" name="iuserc_14" id="iuserc_14">
   </div>
   <div class="form-group">
  	 <label for="apellido">Nombre del Banco*:</label>
  	 <input type="text" class="form-control" name="iuserc_15" id="iuserc_15">
   </div>
   <div class="form-group">
  	 <label for="apellido">No. Cuenta Bancaria*:</label>
  	 <input type="text" class="form-control" name="iuserc_16" id="iuserc_16">
   </div>
   <div class="form-group">
  	 <label for="apellido">No. CLABE Interbancaria*:</label>
  	 <input type="text" class="form-control" name="iuserc_17" id="iuserc_17">
   </div>
   <div class="checkbox">
  	 <label><input type="checkbox" required name="chk_1" id="chk_1">Acepto las Condiciones de Participación como Productor CERES*</label>
  	 <a href="../fotos/documentos/condiciones.pdf" target="_blank">Ver condiciones</a>
   </div>
   <button class="btn btn-success" onClick="validarRegistroC()">Registrar</button>
  </form>
</div>
