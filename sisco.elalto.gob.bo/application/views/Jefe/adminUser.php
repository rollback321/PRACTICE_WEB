<div class="content-wrapper">
	<section class="content" style="padding-top: 10px;">
		<div class="col-12 col-sm-12">
			<div class="card card-secondary card-tabs">
				<div class="card-header p-0 pt-1">
					<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-secretaria" role="tab" aria-controls="custom-tabs-secretaria" aria-selected="true"><i class="fas fa-user"></i> Mis Secretarias</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-tecnico" role="tab" aria-controls="custom-tabs-tecnico" aria-selected="false"><i class="nav-icon fas fa-user-friends"></i> Mis Tecnicos</a>
						</li>
					</ul>
				</div>
				<div class="card-body p-2">
					<div class="tab-content" id="custom-tabs-one-tabContent">
						<div class="tab-pane fade show active" id="custom-tabs-secretaria" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
							<div class="col-md-12">
								<div class="card" style="margin-bottom: 6px;">
									<div class="card-header p-2">
										<div class="float-left">
											<button type="button" id="btnCrearnuevasecretaria" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#CrearSecretaria">
												<i class=" nav-icon  fas fa-plus"></i>
												Registrar Nueva Secretaria
											</button>
										</div>
									</div>
									<div class="card-body p-2">
										<div class="table-responsive mailbox-messages">
											<table id="tableUserSecretaria" class="table table-sm table-hover font-13">
												<thead>
													<tr>
														<th></th>
														<th>NOMBRES</th>
														<th>APELLIDOS</th>
														<th>N° C.I.</th>
														<th>N° CONTACTO</th>
														<th>GENERO</th>
														<th>CARGO</th>
														<th>ESTADO</th>
														<th>USUARIO</th>
														<th>PASSWORD</th>
														<th>FECHA DE<br>HABILITACION</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="custom-tabs-tecnico" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
							<div class="col-md-12">
								<div class="card" style="margin-bottom: 6px;">
									<div class="card-header p-2">
										<div class="float-left">
											<button type="button" id="btnCrearnuevotecnico" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#CrearTecnico">
												<i class=" nav-icon  fas fa-plus"></i>
												Registrar Nuevo Tecnico
											</button>
										</div>
									</div>
									<!-- /.card-header p-2 -->
									<div class="card-body p-2">

										<div class="table-responsive mailbox-messages">
											<table id="tableUserTecnicos" class="table table-sm table-hover font-13">
												<thead>
													<tr>
														<th></th>
														<th>NOMBRES</th>
														<th>APELLIDOS</th>
														<th>N° C.I.</th>
														<th>N° CONTACTO</th>
														<th>GENERO</th>
														<th>CARGO</th>
														<th>ESTADO</th>
														<th>USUARIO</th>
														<th>PASSWORD</th>
														<th>FECHA DE<br>HABILITACION</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.card -->


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
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">DATOS PERSONALES</legend>
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
								<legend class="legend_tema">SESION DE USUARIO</legend>
								<div class="form-row">
									<div class="form-group col-md-3">
										<label for="inputEmail4"><i class="fas fa-user-tag"></i> Usuario</label>
										<input type="text" class="form-control form-control-sm" id="nameUser" name="nameUser" placeholder="Ej: Juan.perez" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i> Contraseña</label>
										<input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i> Repetir Constraseña</label>
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
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
							<button type="submit" id="enviarUser" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Registrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="ModificarTecnico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content secretary">
					<div class="modal-header">
						<h5 class="modal-title ml-2"><b>Editar Datos del Tecnico</b></h5>
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
								<legend class="legend_tema">DATOS PERSONALES</legend>
								<input id="idUpdateUser" name="idUpdateUser" type="hidden">
								<input id="UpdateCountUser" name="UpdateCountUser" type="hidden">
								<div class="form-row">
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i> Nombres</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="nombresUpdate" name="nombresUpdate" placeholder="Ej: Juan Jose" required>
									</div>
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i> Apellidos</label>
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
										<label for="inputPassword4"><i class="fas fa-phone-alt"></i> N° Contacto</label>
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
								<legend class="legend_tema">SESION DE USUARIO</legend>
								<div class="form-row">
									<div class="form-group col-md-3">
										<label for="inputEmail4"><i class="fas fa-user-tag"></i> Usuario</label>
										<input type="text" class="form-control form-control-sm" id="nameUserUpdate" name="nameUserUpdate" placeholder="Ej: Juan.perez" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i> Contraseña</label>
										<input type="password" class="form-control form-control-sm" id="passwordUpdate" name="passwordUpdate" placeholder="Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i> Repetir Constraseña</label>
										<input type="password" class="form-control form-control-sm" id="password2Update" name="password2Update" placeholder="Repetir Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-address-book"></i>ROL TECNICO</label>
										<input type="password" class="form-control form-control-sm" name="rol_tecnico" placeholder="TECNICO" disabled>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
							<button type="submit" id="enviarUpdateUser" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i> Editar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.--------- END MODALES TECNICO--------- -->


		<!-- /.---------MODALES SECRETARIA--------- -->
		<div class="modal fade" id="CrearSecretaria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content secretary">
					<div class="modal-header">
						<h5 class="modal-title ml-2"><b>Crear Nueva Secretaria</b></h5>
						<div class="card-tools mr-2">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div id="load_registerSecretaria" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
					<form id="form_crearUserSecretaria" class="mb-0" method="post">
						<div id="modalCuerpo" class="modal-body font-13" style="margin: 4px;">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">DATOS PERSONALES</legend>
								<div class="form-row">
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i> Nombres</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="nombresSecretaria" name="nombresSecretaria" placeholder="Ej: Juan Jose" required>
									</div>
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i> Apellidos</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="apellidosSecretaria" name="apellidosSecretaria" placeholder="Ej: Perez Rodriguez" required>
									</div>
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-address-book"></i> Cargo del Funcionario</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="cargoSecretaria" name="cargoSecretaria" placeholder="Ej: Asistente Legal" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group input-group-sm col-md-2">
										<label><i class="fas fa-address-card"></i> N° C.I.</label>
										<input type="number" class="form-control form-control-sm" id="ciSecretaria" name="ciSecretaria" placeholder="Ej: 12345678" required>
									</div>
									<div class="form-group col-md-2">
										<label>Expedido</label>
										<select class="custom-select form-control-sm" id="expedidoSecretaria" name="expedidoSecretaria" style="height: calc(1.8125rem + 2px); padding:3">
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
										<input type="number" class="form-control form-control-sm" id="celularSecretaria" name="celularSecretaria" placeholder="Ej: 78578457" required>
									</div>
									<div class="form-group col-md-4">
										<label for="inputEmail4">Genero</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="generoSecretaria" value="1" checked>
											<label class="form-check-label" for="flexRadioDefault2">
												Masculino
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="generoSecretaria" value="0">
											<label class="form-check-label" for="flexRadioDefault1">
												Femenimo
											</label>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">SESION DE USUARIO</legend>
								<div class="form-row">
									<div class="form-group col-md-3">
										<label for="inputEmail4"><i class="fas fa-user-tag"></i> Usuario</label>
										<input type="text" class="form-control form-control-sm" id="nameUserSecretaria" name="nameUserSecretaria" placeholder="Ej: Juan.perez" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i> Contraseña</label>
										<input type="password" class="form-control form-control-sm" id="passwordSecretaria" name="passwordSecretaria" placeholder="Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i> Repetir Constraseña</label>
										<input type="password" class="form-control form-control-sm" id="password2Secretaria" name="password2Secretaria" placeholder="Repetir Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-address-book"></i> ROL TECNICO</label>
										<input type="password" class="form-control form-control-sm" id="secretaria" name="rol_secretaria" placeholder="SECRETARIA" disabled>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
							<button type="submit" id="enviarUserSecretaria" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Registrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="ModificarSecretaria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content secretary">
					<div class="modal-header">
						<h5 class="modal-title ml-2"><b>Editar Datos del Tecnico</b></h5>
						<div class="card-tools mr-2">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div id="load_UpdateSecretaria" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
					<form id="form_UpdateUserSecretaria" class="mb-0" method="post">
						<div id="modalCuerpo" class="modal-body font-13" style="margin: 4px;">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">DATOS PERSONALES</legend>
								<input id="idUpdateUserSecretaria" name="idUpdateUserSecretaria" type="hidden">
								<input id="UpdateCountUserSecretaria" name="UpdateCountUserSecretaria" type="hidden">
								<div class="form-row">
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i> Nombres</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="nombresUpdateSecretaria" name="nombresUpdateSecretaria" placeholder="Ej: Juan Jose" required>
									</div>
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-user"></i> Apellidos</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="apellidosUpdateSecretaria" name="apellidosUpdateSecretaria" placeholder="Ej: Perez Rodriguez" required>
									</div>
									<div class="form-group input-group-sm col-md-4">
										<label><i class="fas fa-address-book"></i> Cargo del Funcionario</label>
										<input type="text" class="form-control form-control-sm text-uppercase" id="cargoUpdateSecretaria" name="cargoUpdateSecretaria" placeholder="Ej: Asistente Legal" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group input-group-sm col-md-2">
										<label><i class="fas fa-address-card"></i> N° C.I.</label>
										<input type="text" class="form-control form-control-sm" id="ciUpdateSecretaria" name="ciUpdateSecretaria" placeholder="Nro. Carnet Identidad" required>
									</div>
									<div class="form-group col-md-2">
										<label>Expedido</label>
										<select class="custom-select" id="expedidoUpdateSecretaria" name="expedidoUpdateSecretaria" style="height: calc(1.8125rem + 2px); padding:3">
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
										<input type="text" class="form-control form-control-sm" id="celularUpdateSecretaria" name="celularUpdateSecretaria" placeholder="Ej: 78578457" required>
									</div>
									<div class="form-group col-md-4">
										<label for="inputEmail4">Genero</label>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="generoUpdateSecretaria" value="1">
											<label class="form-check-label" for="flexRadioDefault2">
												Masculino
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="generoUpdateSecretaria" value="0">
											<label class="form-check-label" for="flexRadioDefault1">
												Femenimo
											</label>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">SESION DE USUARIO</legend>
								<div class="form-row">
									<div class="form-group col-md-3">
										<label for="inputEmail4"><i class="fas fa-user-tag"></i> Usuario</label>
										<input type="text" class="form-control form-control-sm" id="nameUserUpdateSecretaria" name="nameUserUpdateSecretaria" placeholder="Ej: Juan.perez" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i> Contraseña</label>
										<input type="password" class="form-control form-control-sm" id="passwordUpdateSecretaria" name="passwordUpdateSecretaria" placeholder="Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-key"></i><i class="fas fa-lock"></i> Repetir Constraseña</label>
										<input type="password" class="form-control form-control-sm" id="password2UpdateSecretaria" name="password2UpdateSecretaria" placeholder="Repetir Contraseña" required>
									</div>
									<div class="form-group col-md-3">
										<label for="inputPassword4"><i class="fas fa-address-book"></i> ROL TECNICO</label>
										<input type="password" class="form-control form-control-sm" name="rol_Secretaria" placeholder="SECRETARIA" disabled>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
							<button type="submit" name="ButtonEditarSecretaria" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i> Editar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.--------- END MODALES SECRETARIA--------- -->



	</section>
</div>