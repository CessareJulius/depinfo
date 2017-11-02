<!--Modal de Maquinas-->
<div id="agregar" class="modal">
	<div class="modal-content">
		<h4 class="center">Agregar detalles del equipo</h4>
		<br><br>
		<div class="row">
			<form class="col m12" method="post">
				<div class="row">
					<div class="input-field col m6">
					    <i class="material-icons prefix">content_paste</i>
					    <input disabled id="disabled" type="text" name="">
					</div>
					<div class="input-field col m6">
						<i class="material-icons prefix">laptop</i>
						<input id="campo1" type="text" name="" class="value">
						<label for="campo1">Tipo de Equipo</label>
					</div>
					<div class="input-field col m6">
						<i class="material-icons prefix">flash_on</i>
						<input id="campo2" type="text" name="" class="value">
						<label for="campo2">Marca</label>
					</div>
					<div class="input-field col m6">
						<i class="material-icons prefix">business</i>
						<input id="campo3" type="text" name="" class="value">
						<label for="campo3">Departamento</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col m12">
						<i class="material-icons prefix">report</i>
						<textarea id="textarea" class="materialize-textarea"></textarea>
						<label for="textarea">Motivo</label>
					</div>
				</div>
				<h5 class="center">Información de la Persona</h5>
				<div class="row">
					  <div class="input-field col m4">
				 		   <i class="material-icons prefix">assignment_ind</i>
				 		   <input id="nombre" type="text" class="validate">
						   <label for="nombre">Nombre</label>
					  </div>
					  <div class="input-field col m4">
						   <i class="material-icons prefix">assignment_ind</i>
						   <input id="apellido" type="text" name="" class="validate">
						   <label for="apellido">Apellido</label>
					  </div>
					  <div class="input-field col m4">
				 		   <i class="material-icons prefix">phone_android</i>
						   <input id="tel" type="tel" class="validate">
						   <label for="tel">Teléfono</label>
					  </div>
				</div>
				<button class="modal-action wave-effect right waves-green btn tooltipped" data-position="left" data-delay="50" data-tooltip="Agregar" type="submit"><i class="material-icons prefix">add</i></button>
			</form>
		</div>
	</div>
</div>
<!--Modal de agregar usuarios: Nombre,Apellido,Cedula,Turno,-->
<div id="agregar_pers" class="modal">
	<div class="modal-content">
		<h4 class="center">Agregar Personal</h4>
		<br><br>
		<div class="row">
			<form class="col m12">
				<div class="row">
				   <div class="input-field col m4">
						<i class="material-icons prefix">fiber_pin</i>
						<input id="cedula" type="number" name="" class="validate">
						<label for="cedula">Cedula</label>
					</div>
					<div class="input-field col m4">
				 		<i class="material-icons prefix">assignment_ind</i>
						<input id="nombre" type="text" class="validate">
						<label for="nombre">Nombre</label>
					</div>
					<div class="input-field col m4">
						<i class="material-icons prefix">assignment_ind</i>
						<input id="apellido" type="text" name="" class="validate">
						<label for="apellido">Apellido</label>
					</div>
					<div class="input-field col m4">
				 		<i class="material-icons prefix">phone_android</i>
						<input id="tel" type="tel" class="validate">
						<label for="tel">Telefono</label>
					</div>
					<div class="input-field col m4">
						<i class="material-icons prefix">face</i>
						<input id="user" type="text" name="" class="validate">
						<label for="user">Usuario</label>
					</div>
					<div class="input-field col m4">
						<i class="material-icons prefix">vpn_key</i>
						<input id="pass" type="text" name="" class="validate">
						<label for="pass">Clave</label>
					</div>
					<div class="input-field col m8 offset-m2">
						<i class="material-icons prefix">query_builder</i>
    					<select class="center">
    					      <option value="" selected>Seleccione el Turno</option>
    					      <option value="1">Mañana</option>
    					      <option value="2">Tarde</option>
    					</select>
    					<label>Turno</label>
					</div>
				</div>
				<button class="modal-action modal-close right wave-effect waves-green btn tooltipped" data-position="left" data-delay="50" data-tooltip="Guardar" type="submit"><i class="material-icons prefix">add</i></a>
			</form>
		</div>
	</div>
</div>
<!-- modal de la tabla -->
<div id="tabla" class="modal" style="width: 1000px">
	<div class="modal-content">
		<div class="row">
			<div class="col m12">
				<table class="highlight centered bordered">
				<caption><h5>Titulo para la tabla</h5></caption>
					<thead>
						<tr>
							<th>SERIAL</th>
							<th>MARCA</th>
							<th>DPTO</th>
							<th>FALLAS</th>
							<th>FECHA DE ENTREGA</th>
							<th>FECHA DE SALIDA</th>
							<th>STATUS</th>
							<th colspan="2">Acciones</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>A42-ZJQNH-P82AD-32</td>
							<td>VIT</td>
							<td>Rectorado</td>
							<td>BLA BALB BLABLA LJDJ RAM</td>
							<td>20-01-17</td>
							<td>20-01-17</td>
							<td>Entregada</td>
							<td>
								<button class="btn-flat waves-effect waves-teal"><i class="material-icons">edit</i></button>
							</td>
							<td>
								<button class="btn-flat waves-effect waves-red"><i class="material-icons">delete</i></button>
							</td>
						</tr>
						<tr>
							<td>A42-ZJQNH-P82AD-32</td>
							<td>VIT</td>
							<td>Rectorado</td>
							<td>BLA BALB BLABLA LJDJ RAM</td>
							<td>20-01-17</td>
							<td>20-01-17</td>
							<td>Entregada</td>
							<td>
								<button class="btn-flat waves-effect waves-teal"><i class="material-icons">edit</i></button>
							</td>
							<td>
								<button class="btn-flat waves-effect waves-red"><i class="material-icons">delete</i></button>
							</td>
						</tr>
						<tr>
							<td>A42-ZJQNH-P82AD-32</td>
							<td>VIT</td>
							<td>Rectorado</td>
							<td>BLA BALB BLABLA LJDJ RAM</td>
							<td>20-01-17</td>
							<td>20-01-17</td>
							<td>Entregada</td>
							<td>
								<button class="btn-flat waves-effect waves-teal"><i class="material-icons">edit</i></button>
							</td>
							<td>
								<button class="btn-flat waves-effect waves-red"><i class="material-icons">delete</i></button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Se terminaron los modales -->