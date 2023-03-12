<div class="content-wrapper">
	<section class="content" style="padding-top: 10px;">
		<div class="col-md-12">
			<div class="card" style="margin-bottom: 6px;">
				<div class="card-header p-2">
					<div class="float-left">
						<button type="button" id="btnCrearnuevotecnico" class="btn btn-success btn-sm" data-toggle="modal" data-target="#CrearTecnico">
							registrar Nuevo Tecnico
						</button>
					</div>
				</div>
				<div class="card-body p-2">
					<div class="table-responsive mailbox-messages">
						<table id="tableUser" class="table table-sm table-hover font-13">
							<thead style="background:#efeaea;">
								<tr>
									<th></th>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>N° C.I.</th>
									<th>N° Contacto</th>
									<th>Sexo</th>
									<th>Cargo</th>
									<th>Estado</th>
									<th>Usuario</th>
									<th>password</th>
									<th>Fecha de<br>Habilitacion</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


		<!-- /.---------MODALES--------- -->
				<div class="modal fade" id="CrearTecnico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content secretary">
					<div class="modal-header">
						<h5 class="modal-title ml-2"><b>Crear Nuevo Técnico</b></h5>
						<div class="card-tools mr-2">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div id="load_register" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
					<form id="form_crearUser" class="mb-0" method="post">
						<div id="modalCuerpo" class="modal-body font-13" style="margin: 4px;">
							<fieldset class="fieldset_Content_tema" >
								<legend class="legend_tema">Datos Personales</legend>
								<div class="form-row">
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i> Nombres</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="nombres" name="nombres" placeholder="Ej: Juan Jose" required>
									</div>
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i> Apellidos</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="apellidos" name="apellidos" placeholder="Ej: Perez Rodriguez" required>
									</div>
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-address-book"></i> Cargo del Funcionario</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="cargo" name="cargo" placeholder="Ej: Asistente Legal" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group input-group-sm col-md-2">
										<label><i class="fas fa-address-card"></i> N° C.I.</label>
										<input type="number" class="form-control form-control-sm" id="ci" name="ci" placeholder="Ej: 12345678" required>
									</div>
									<div class="form-group col-md-2">
										<label>Expedido</label>
										<select class="custom-select form-control-sm" id="expedido" name="expedido" style="height: calc(1.8125rem + 2px); padding:3">
											<option value="LP">LP</option>
											<option value="CB">CB</option>
											<option value="OR">OR</option>
											<option value="CH">CH</option>
											<option value="PT">PT</option>
											<option value="TJ">TJ</option>
											<option value="SC">SC</option>
											<option value="BE">BE</option>
											<option value="PD">PD</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="inputPassword4"><i class="fas fa-phone-alt"></i> N° Contacto</label>
										<input type="number" class="form-control form-control-sm" id="celular" name="celular" placeholder="Ej: 78578457" required>
									</div>
									<div class="form-group col-md-4">
										<label for="inputEmail4">Genero</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="genero" value="1" checked>
											<label class="form-check-label" for="flexRadioDefault2">
												Masculino
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="genero" value="0">
											<label class="form-check-label" for="flexRadioDefault1">
												Femenimo
											</label>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<legend class="scheduler-border">Sesion de Usuario</legend>
								<div class="form-row">
									<div class="form-group col-md-3">
										<label for="inputEmail4"><i class="fas fa-user-tag"></i>  Usuario</label>
										<input type="text" class="form-control form-control-sm" id="nameUser" name="nameUser" placeholder="Ej: Juan.perez" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i>  Contraseña</label>
										<input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i>  Repetir Constraseña</label>
										<input type="password" class="form-control form-control-sm" id="password2" name="password2" placeholder="Repetir Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-address-book"></i> ROL TECNICO</label>
										<input type="password" class="form-control form-control-sm" id="tecncico" name="rol_tecnico" placeholder="TECNICO" disabled>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
							<button type="submit" id="enviarUser" class="btn btn-sm btn-primary">Aceptar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="ModificarTecnico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content secretary">
					<div class="modal-header">
						<h5 class="modal-title ml-2"><b>Modificar Datos del Tecnico</b></h5>
						<div class="card-tools mr-2">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div id="load_Update" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
					<form id="form_UpdateUser" class="mb-0" method="post">
						<div id="modalCuerpo" class="modal-body font-13" style="margin: 4px;">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">Datos Personales</legend>
								<input id="idUpdateUser" name="idUpdateUser" type="hidden">
								<input id="UpdateCountUser" name="UpdateCountUser" type="hidden">
								<div class="form-row">
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i>Nombres</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="nombresUpdate" name="nombresUpdate" placeholder="Ej: Juan Jose" required>
									</div>
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i>Apellidos</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="apellidosUpdate" name="apellidosUpdate" placeholder="Ej: Perez Rodriguez" required>
									</div>
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-address-book"></i> Cargo del Funcionario</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="cargoUpdate" name="cargoUpdate" placeholder="Ej: Asistente Legal" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group input-group-sm col-md-2">
										<label><i class="fas fa-address-card"></i> N° C.I.</label>
										<input type="text" class="form-control form-control-sm" id="ciUpdate" name="ciUpdate" placeholder="Nro. Carnet Identidad" required>
									</div>
									<div class="form-group col-md-2">
										<label>Expedido</label>
										<select class="custom-select" id="expedidoUpdate" name="expedidoUpdate" style="height: calc(1.8125rem + 2px); padding:3">
											<option value="LP">LP</option>
											<option value="CB">CB</option>
											<option value="OR">OR</option>
											<option value="CH">CH</option>
											<option value="PT">PT</option>
											<option value="TJ">TJ</option>
											<option value="SC">SC</option>
											<option value="BE">BE</option>
											<option value="PD">PD</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="inputPassword4"><i class="fas fa-phone-alt"></i>N° Contacto</label>
										<input type="text" class="form-control form-control-sm" id="celularUpdate" name="celularUpdate" placeholder="Ej: 78578457" required>
									</div>
									<div class="form-group col-md-4">
										<label for="inputEmail4">Genero</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="generoUpdate" value="1">
											<label class="form-check-label" for="flexRadioDefault2">
												Masculino
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="generoUpdate" value="0">
											<label class="form-check-label" for="flexRadioDefault1">
												Femenimo
											</label>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">Sesion de Usuario</legend>
								<div class="form-row">
									<div class="form-group col-md-3">
										<label for="inputEmail4"><i class="fas fa-user-tag"></i>  Usuario</label>
										<input type="text" class="form-control form-control-sm" id="nameUserUpdate" name="nameUserUpdate" placeholder="Ej: Juan.perez" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i> Contraseña</label>
										<input type="password" class="form-control form-control-sm" id="passwordUpdate" name="passwordUpdate" placeholder="Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i> Repetir Constraseña</label>
										<input type="password" class="form-control form-control-sm" id="password2Update" name="password2Update" placeholder="Repetir Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"> <i class="fas fa-address-book"></i> ROL TECNICO</label>
										<input type="password" class="form-control form-control-sm" name="rol_tecnico" placeholder="TECNICO" disabled>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
							<button type="submit" id="enviarUpdateUser" class="btn btn-sm btn-primary">Modificar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</section>
</div>