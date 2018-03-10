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
  	 <input type="text" class="form-control" name="iusert_1" id="iusert_1">
   </div>
   <div class="form-group">
  	 <label for="apellido">Nombre del Conductor*:</label>
  	 <input type="text" class="form-control" name="iusert_2" id="iusert_2">
   </div>
   <div class="form-group">
  	 <label for="apellido">Correo Electrónico*:</label>
  	 <input type="text" class="form-control" name="iusert_3" id="iusert_3">
   </div>
   <div class="form-group">
  	 <label for="apellido">Contraseña*:</label>
  	 <input type="password" class="form-control" name="iusert_4" id="iusert_4">
   </div>
   <div class="form-group">
  	 <label for="apellido">Reintroduce tu Contraseña:</label>
  	 <input type="password" class="form-control" name="iusert_5" id="iusert_5">
   </div>
   <div class="form-group">
  	 <label for="apellido">Teléfono*:</label>
  	 <input type="text" class="form-control" name="iusert_6" id="iusert_6">
   </div>
   <div class="form-group">
  	 <label for="apellido">Celular:</label>
  	 <input type="text" class="form-control" name="iusert_7" id="iusert_7">
   </div>
   <div class="form-group">
  	 <label for="apellido">Estado*:</label>
  	 <select class="form-control" name="iusert_8" id="iusert_8">
       <option value="-1">Seleccionar...</option>
  		 <?php  $res = seleccionar("SELECT DISTINCT idEstado, estado FROM sepomex ORDER BY estado");
  		 		while ($row = mysqli_fetch_array($res)){?>
  					<option value="<?php  echo $row["idEstado"]?>"><?php  echo $row["estado"]?></option>
  				<?php  } ?>
  		</select>
   </div>
   <div class="form-group">
  	 <label for="apellido">Nombre del Banco*:</label>
  	 <input type="text" class="form-control" name="iusert_9" id="iusert_9">
   </div>
   <div class="form-group">
  	 <label for="apellido">No. Cuenta Bancaria*:</label>
  	 <input type="text" class="form-control" name="iusert_10" id="iusert_10">
   </div>
   <div class="form-group">
  	 <label for="apellido">No. CLABE Interbancaria*:</label>
  	 <input type="text" class="form-control" name="iusert_11" id="iusert_11">
   </div>
   <h4 class="title"><span class="text"><strong>ALTA DEL VEHÍCULO</strong></span></h4>
   <div class="form-group">
     <label for="apellido">Propietario*:</label>
     <input type="text" class="form-control" name="iusert_12" id="iusert_12">
   </div>
   <div class="form-group">
     <label for="apellido">Placas*:</label>
     <input type="text" class="form-control" name="iusert_13" id="iusert_13">
   </div>
   <div class="form-group">
     <label for="apellido">Número de Serie*:</label>
     <input type="text" class="form-control" name="iusert_14" id="iusert_14">
   </div>
   <div class="form-group">
     <label for="apellido">Tipo*:</label>
     <input type="text" class="form-control" name="iusert_15" id="iusert_15">
   </div>
   <div class="form-group">
     <label for="apellido">Marca*:</label>
     <select class="form-control" name="iusert_16" id="iusert_16">
       <option value="-1">Seleccionar...</option>
  		 <?php  $res2 = seleccionar("SELECT * FROM marcas_vehiculo ORDER BY Marca");
  		 		while ($row2 = mysqli_fetch_array($res2)){?>
  					<option value="<?php  echo $row2["Marca"]?>"><?php  echo $row2["Marca"]?></option>
  				<?php  } ?>
  	 </select>
   </div>
   <div class="form-group">
     <label for="apellido">Año*:</label>
     <input type="text" class="form-control" name="iusert_17" id="iusert_17">
   </div>
   <div class="form-group">
     <label for="apellido">Capacidad de Carga*:</label>
     <select class="form-control" name="iusert_18" id="iusert_18">
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
  	 <select class="form-control" name="iusert_19" id="iusert_19">
       <option value="-1">Seleccionar...</option>
       <option value="SI">Si</option>
       <option value="NO">No</option>
  		</select>
   </div>
   <div class="form-group">
  	 <label for="apellido">Disponible para empezar a entregar*:</label>
  	 <select class="form-control" name="iusert_20" id="iusert_20">
       <option value="-1">Seleccionar...</option>
       <option value="SI">Si</option>
       <option value="NO">No</option>
  		</select>
   </div>
   <h4 class="title"><span class="text"><strong>ACEPTACIÓN DE TÉRMINOS Y CONDICIONES</strong></span></h4>
   <div class="checkbox">
  	 <label><input type="checkbox" required name="chkt_1" id="chkt_1">Acepto las Condiciones de Participación como Transportista CERES*</label>
  	 <a href="../fotos/documentos/condiciones.pdf" target="_blank">Ver condiciones</a>
   </div>
   <button class="btn btn-success" onClick="validarRegistro()">Registrar</button>
  </form>
</div>
