<div <div class="col-sm-5">
  <h4 class="title"><span class="text"><strong>LOGIN COMO TRANSPORTISTA CERES</strong></span></h4>
  <form name="form_ltransp" id="form_ltransp" method="post" style="width: 75%; position: relative; left: 12.5%; margin-bottom: 20px">
    <div class="form-group">
   	 <label for="nombre">Correo Electrónico:</label>
   	 <input type="text" class="form-control" name="logint_1" id="logint_1">
    </div>
    <div class="form-group">
   	 <label for="apellido">Contraseña:</label>
   	 <input type="password" class="form-control" name="logint_2" id="logint_2">
    </div>
    <button class="btn btn-success" onClick="validarlogint()">Login</button>
  </form>
</div>

<div <div class="col-sm-7">
  <form name="form_registert" id="form_registert" method="post" style="width: 75%; position: relative; left: 12.5%; margin-bottom: 20px">
   <h4 class="title"><span class="text"><strong>ALTA DEL TRANSPORTISTA</strong></span></h4>
   <div class="form-group">
   <label class="obli">*Campos Obligatorios</label><br>
  	 <label for="nombre">Razón Social*:</label>
  	 <input type="text" class="form-control" name="iuser_1" id="iuser_1">
   </div>
   <div class="form-group">
  	 <label for="apellido">Nombre del Conductor*:</label>
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
  	 <label for="apellido">Nombre del Banco*:</label>
  	 <input type="text" class="form-control" name="iuser_9" id="iuser_9">
   </div>
   <div class="form-group">
  	 <label for="apellido">No. Cuenta Bancaria*:</label>
  	 <input type="text" class="form-control" name="iuser_10" id="iuser_10">
   </div>
   <div class="form-group">
  	 <label for="apellido">No. CLABE Interbancaria*:</label>
  	 <input type="text" class="form-control" name="iuser_11" id="iuser_11">
   </div>
   <h4 class="title"><span class="text"><strong>ALTA DEL VEHÍCULO</strong></span></h4>
   <div class="form-group">
     <label for="apellido">Propietario*:</label>
     <input type="text" class="form-control" name="iuser_12" id="iuser_12">
   </div>
   <div class="form-group">
     <label for="apellido">Placas*:</label>
     <input type="text" class="form-control" name="iuser_13" id="iuser_13">
   </div>
   <div class="form-group">
     <label for="apellido">Número de Serie*:</label>
     <input type="text" class="form-control" name="iuser_14" id="iuser_14">
   </div>
   <div class="form-group">
     <label for="apellido">Tipo*:</label>
     <input type="text" class="form-control" name="iuser_15" id="iuser_15">
   </div>
   <div class="form-group">
     <label for="apellido">Marca*:</label>
     <select class="form-control" name="iuser_16" id="iuser_16">
       <option value="-1">Seleccionar...</option>
  		 <? $res2 = seleccionar("SELECT * FROM marcas_vehiculo ORDER BY Marca");
  		 		while ($row2 = mysqli_fetch_array($res2)){?>
  					<option value="<? echo $row2["Marca"]?>"><? echo $row2["Marca"]?></option>
  				<? } ?>
  	 </select>
   </div>
   <div class="form-group">
     <label for="apellido">Año*:</label>
     <input type="text" class="form-control" name="iuser_17" id="iuser_17">
   </div>
   <div class="form-group">
     <label for="apellido">Capacidad de Carga*:</label>
     <select class="form-control" name="iuser_18" id="iuser_18">
       <option value="-1">Seleccionar...</option>
       <option value="1 a 5 tons">1 a 5 tons</option>
       <option value="5 a 10 tons">5 a 10 tons</option>
       <option value="10 a 15 tons">10 a 15 tons</option>
       <option value="15 a 20 tons">15 a 20 tons</option>
       <option value="20 a 25 tons">20 a 25 tons</option>
       <option value="Mayor a 25 tons">Mayor a 25 tons</option>
  		</select>
   </div>
   <div class="form-group">
  	 <label for="apellido">Refrigeración*:</label>
  	 <select class="form-control" name="iuser_19" id="iuser_19">
       <option value="-1">Seleccionar...</option>
       <option value="SI">Si</option>
       <option value="NO">No</option>
  		</select>
   </div>
   <div class="form-group">
  	 <label for="apellido">Disponible para empezar a entregar*:</label>
  	 <select class="form-control" name="iuser_20" id="iuser_20">
       <option value="-1">Seleccionar...</option>
       <option value="SI">Si</option>
       <option value="NO">No</option>
  		</select>
   </div>
   <h4 class="title"><span class="text"><strong>ACEPTACIÓN DE TÉRMINOS Y CONDICIONES</strong></span></h4>
   <div class="checkbox">
  	 <label><input type="checkbox" required name="chk_1" id="chk_1">Acepto las Condiciones de Participación como Transportista CERES*</label>
  	 <a href="../fotos/documentos/condiciones.pdf" target="_blank">Ver condiciones</a>
   </div>
   <button class="btn btn-success" onClick="validarRegistro()">Registrar</button>
  </form>
</div>
