<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content" style="padding-top: 10px;">
		<div class="container-fluid">
			<div class="row">
				<!-- /.col -->
				<div class="col-md-12">
					<div class="card card-secondary card-tabs">
						<div class="card-header p-0 pt-1">
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link active" href="#activity" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/noticias.svg" class="mb-1 " alt="proceso" style="margin-right: 3px;" width="15px"> Nuevas Hojas de Ruta</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#timeline" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/ajustes.svg" class="mb-1 " alt="proceso" style="margin-right: 3px;" width="18px"> Hojas de Ruta En Proceso</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#settings" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/carpeta.svg" class="mb-1 " alt="concluido" style="margin-right: 3px;" width="18px">Hojas de Ruta Concluidas</a>
								</li>
							</ul>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-2">
							<div class="tab-content">
								<div class="active tab-pane" id="activity">
									<div class="container-fluid">
										<div class="row">
											<div class="col-12">
												<div class="card" style="margin-bottom: 6px;">
													<button type="button" id="btnCrearhojaderuta" class="btn btn-block btn-sm btn-primary col-sm-12 col-md-4 col-lg-3 m-2" onclick="resetDropZone()" data-toggle="modal" data-target="#CrearHojaRuta">
														<i class=" nav-icon  fas fa-plus"></i>
														Crear Hoja de Ruta
													</button>
													<div class="mailbox-controls">
														<div class="float-left">
															<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>
														</div>
														<div class="float-left">
															<div class="btn-group-sm" style="display: none; width:80%;  margin-left: 10px;" name="DivCheck" id="DivCheck">
																<button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
																	Acciones
																</button>
																<div class="dropdown-menu" role="menu">
																	<a class="dropdown-item" href="#" onclick="DerivarMultipleInterna()" data-target="#derivarHojaRutaMultiple" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Derivacion Interna Multiple</a>
																	<a class="dropdown-item" href="#" onclick="DerivarMultipleExterna()" data-target="#derivarHojaRutaMultipleExterna" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Derivacion Externa Multiple</a>
																</div>
															</div>
														</div>
													</div>
													<div class="card-body p-2 table-responsive mailbox-messages" style="width: auto;overflow-x: auto;">
														<table id="example1" class="table table-striped table-bordered table-hover table-sm tableCenterData">
															<thead>
																<tr>
																	<th></th>
																	<th>Acciones</th>
																	<th>Codigo</th>
																	<th>Estado&nbsp;&nbsp;&nbsp;</th>
																	<th>Tipo<br>Correp.</th>
																	<th>Archivos</th>
																	<th>Referencia</th>
																	<th>Categoria</th>
																	<th>Mas Detalles</th>
																</tr>
															</thead>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane" id="timeline">
									<div class="card-body p-2" style="width: auto;overflow-x: auto;">
										<table id="example2" class="table table-sm table-hover table-bordered font-13 tableCenterData">
											<thead>
												<tr>
												<th>Acciones</th>
													<th>Codigo</th>
													<th>Estado&nbsp;&nbsp;&nbsp;</th>
													<th>Tipo<br>Correp.</th>
													<th>Archivos</th>
													<th>Referencia</th>
													<th>Categoria</th>
													<th>Mas Detalles</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane" id="settings">
									<div class="card-body p-2" style="width: auto;overflow-x: auto;">
										<table id="example3" class="table table-sm table-hover table-bordered font-13 tableCenterData">
											<thead>
												<tr>
												<th>Acciones</th>
													<th>Codigo</th>
													<th>Estado&nbsp;&nbsp;&nbsp;</th>
													<th>Tipo<br>Correp.</th>
													<th>Archivos</th>
													<th>Referencia</th>
													<th>Categoria</th>
													<th>Mas Detalles</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						</div>
						<!-- /.card-body p-2 -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- /.---------MODALES--------- -->
	

	<div class="modal fade" id="derivarHojaRutaMultipleExterna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content secretary">
				<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Derivacion de Hoja de Ruta Multiple Externa<b></h5>
					<div class="card-tools mr-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<form id="form_derivarHojaRutaMultipleExterna" class="mb-0" method="post">
					<div class="modal-body font-13">
						<div id="load_register_external_multiple" class="row align-items-center justify-content-center">
							<div class="fa-3x">
								<i class="fas fa-circle-notch fa-spin"></i> Procesando...
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">

								<!-- Horizontal Form -->
								<div class="form-group col-lg-12">
									<div class="form-group mb-3">
										<input type="hidden" id="cor_id_ArrayExterna" name="cor_id_ArrayExterna">
										<input type="hidden" id="cor_id_ArrayCantidadExterna" name="cor_id_ArrayCantidadExterna">
										<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
											<legend class="scheduler-border">&nbsp;HOJAS DE RUTA</legend>
											<div class="controls" id="etiquetasExterna">
											</div>
										</fieldset>

										<fieldset class="scheduler-border" style="background:#eaeaea;">
											<legend class="scheduler-border">DEPENDENCIA</legend>

											<div class="form-group row ml-2 mr-2" id="div_select_nivel_1ME">
												<select class="form-control" id="select_nivel_1ME">
													<option selected="selected">Seleccionar Dependencia</option>
												</select>
											</div>
											<div class="form-group row ml-2 mr-2" id="div_select_nivel_2ME">
												<select class="form-control" id="select_nivel_2ME">
													<option selected="selected">Seleccionar Dependencia</option>
												</select>
											</div>
											<div class="form-group row ml-2 mr-2" id="div_select_nivel_3ME">
												<select class="form-control" id="select_nivel_3ME">
													<option selected="selected">Seleccionar Dependencia</option>
												</select>
											</div>
										</fieldset>
										<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
											<legend class="scheduler-border">&nbsp;RECEPCION</legend>
											<div class="form-group row ml-2 mr-2 msg_validar">
												<select class="form-control" id="list_usuariosME" name="list_usuariosME">
												</select>
											</div>
										</fieldset>
									</div>
									<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
										<legend class="scheduler-border" style="width: 90px;">PROVEIDO</legend>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">

											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<!--vistas: crear hoja_de_ruta-->
												<select class="form-control font-14" id="select_proveidoMultipleExterno" name="select_proveidoMultipleExterno">
													<option value="0" selected="selected" disabled>Seleccionar Proveido</option>
													<?php
													if (count($proveido) > 0) {
														foreach ($proveido as $prov) { ?>
															<option value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_nombre'] ?></option>
													<?php }
													}
													?>
												</select>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">proveido:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
												<textarea class="form-control form-control-sm" id="a_provMultipleExterno" name="a_provMultipleExterno" rows="2" placeholder="Ej: Para su Atencion" maxlength="201" required></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_observacion" class="col-form-label">Obs.:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
												<textarea class="form-control form-control-sm" id="a_obsMultipleExterno" name="a_obsMultipleExterno" rows="2" placeholder="Existe alguna Observacion?" maxlength="201"></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
											</div>
											<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
												<input type="number" value="1" class="form-control form-control-sm" id="Fecha_plazoMultipleExterno" name="Fecha_plazoMultipleExterno">
											</div>
										</div>
								</div>
								<!-- /.card -->
								</fieldset>

							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="submitDeriveExternalMultiple" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar Hojas de Ruta
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div class="modal fade" id="derivarHojaRutaMultiple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content secretary">
				<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Derivacion Interna Multiple<b></h5>
					<div class="card-tools mr-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<form id="form_derivarHojaRutaMultipleInterna" class="mb-0" method="post">
					<div class="modal-body font-13">
						<div id="load_derive_multiple" class="row align-items-center justify-content-center">
							<div class="fa-3x">
								<i class="fas fa-circle-notch fa-spin"></i> Procesando...
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
									<!-- <input type="hidden" id="cor_id_ForDerivar" name="cor_id_ForDerivar"> -->
									<legend class="scheduler-border">&nbsp;HOJAS DE RUTA</legend>
									<div class="controls" id="etiquetas">
									</div>
								</fieldset>
								<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
									<input type="hidden" id="cor_id_Array" name="cor_id_Array">
									<input type="hidden" id="cor_id_ArrayCantidad" name="cor_id_ArrayCantidad">
									<legend class="scheduler-border">&nbsp;RESPONSABLE</legend>
									<div class="form-group row ml-2 mr-2 msg_validar">
										<select id="usuInterno_idResponsable" name="usuInterno_idResponsable" class="form-control form-control-sm" required>
										</select>
									</div>
								</fieldset>
								<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
									<legend class="scheduler-border" style="width: 90px;">PROVEIDO</legend>
									<!-- Horizontal Form -->
									<div class="form-group col-lg-12">
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">

											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<!--vistas: crear hoja_de_ruta-->
												<select class="form-control font-14" id="select_proveidoMultiple" name="select_proveidoMultiple">
													<option value="0" selected="selected" disabled>Seleccionar Proveido</option>
													<?php
													if (count($proveido) > 0) {
														foreach ($proveido as $prov) { ?>
															<option value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_nombre'] ?></option>
													<?php }
													}
													?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">Proveido:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<textarea class="form-control form-control-sm" id="a_provMultiple" name="a_provMultiple" rows="2" placeholder="Descripcion del Documento" maxlength="201" required></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_observacion" class="col-form-label">Obs.:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
												<textarea class="form-control form-control-sm" id="a_obsMultiple" name="a_obsMultiple" rows="2" placeholder="Observación del Documento" maxlength="201"></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
											</div>
											<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 msg_validar">
												<input type="number" value="1" min="1" class="form-control form-control-sm" id="prevFecha_plazoMultiple" name="prevFecha_plazoMultiple" required>
											</div>
										</div>
									</div>
									<!-- /.card -->
								</fieldset>

							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="submitDeriveInternalMultiple" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar Hojas de Ruta
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>








	<div class="modal fade" id="DerivacionDirecta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content secretary">
				<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Derivacion Directa <span title="3 New Messages" class="badge bg-success cod_GAMEA"></span><b></h5>
					<div class="card-tools mr-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<form id="form_derivar_Directa" class="mb-0" method="post">
					<div class="modal-body font-13">
						<div id="load_derivar_Directa" class="row align-items-center justify-content-center">
							<div class="fa-3x">
								<i class="fas fa-circle-notch fa-spin"></i> Procesando...
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<div id="dependencia-part" class="content" role="tabpanel" aria-labelledby="dependencia-part-trigger">
									<div class="form-group mb-3">
										<input type="hidden" id="cor_id_Hoja" name="cor_id_Hoja">
										<input type="hidden" id="codigo_Hoja" name="codigo_Hoja">
										<fieldset class="scheduler-border" style="background:#eaeaea;">
											<legend class="scheduler-border">DEPENDENCIA DESTINO</legend>
											<div class="form-group row ml-2 mr-2" id="div_select_nivel_11">
												<select class="form-control" id="select_nivel_11">
													<option selected="selected">Seleccionar Dependencia</option>
												</select>
											</div>
											<div class="form-group row ml-2 mr-2" id="div_select_nivel_22">
												<select class="form-control" id="select_nivel_22">
													<option selected="selected">Seleccionar Dependencia</option>
												</select>
											</div>
											<div class="form-group row ml-2 mr-2" id="div_select_nivel_33">
												<select class="form-control" id="select_nivel_33">
													<option selected="selected">Seleccionar Dependencia</option>
												</select>
											</div>
										</fieldset>
										<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
											<legend class="scheduler-border">&nbsp;RECEPCION</legend>
											<div class="form-group row ml-2 mr-2 msg_validar">
												<select class="form-control" id="list_usuarioss" name="list_usuarioss">

												</select>
											</div>
										</fieldset>
									</div>
								</div>
								<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
									<legend class="scheduler-border" style="width: 90px;">PROVEIDO</legend>
									<!-- Horizontal Form -->
									<div class="form-group col-lg-12">
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">

											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<select class="form-control" id="select_proveidoDerivarDirecta">
													<option value="0" selected="selected" disabled>Seleccionar Proveido</option>
													<?php
													if (count($proveido) > 0) {
														foreach ($proveido as $prov) { ?>
															<option value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_nombre'] ?></option>
													<?php }
													}
													?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">Proveido:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
												<textarea class="form-control form-control-sm text-uppercase" id="prov_DerivarDirecta" name="prov_DerivarDirecta" rows="2" placeholder="Descripcion del Documento" maxlength="201" required></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_observacion" class="col-form-label ">Obs.:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
												<textarea class="form-control form-control-sm text-uppercase" id="obs_DerivarDirecta" name="obs_DerivarDirecta" rows="2" placeholder="Observación del Documento" maxlength="201"></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
											</div>
											<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 msg_validar">
												<input type="number" value="1" min="1" class="form-control form-control-sm" id="Fecha_plazoDerivarDirecta" name="Fecha_plazoDerivarDirecta" required>
											</div>
										</div>
									</div>
									<!-- /.card -->
								</fieldset>

							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" id="submitDerivarDirecta" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar</button>
					</div>
				</form>
			</div>
		</div>
	</div>











	<div class="modal fade" id="CrearHojaRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content secretary">
				<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Crear Hoja de Ruta</b></h5>
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
				<form id="form_crearHoja" class="mb-0" method="post">
					<div id="modalCuerpo" class="modal-body font-13" style="margin: 4px; overflow-y: auto; height: 35em;">
						<fieldset class="scheduler-border" style="background:#f5f2f5">
							<legend class="scheduler-border">DOCUMENTO</legend>
							<div class="form-row">

								<div class="form-group col-md-6">
									<label for="inputPassword4"> <i class="fas fa-file-invoice "></i> Referencia</label>
									<textarea rows="2" class="form-control form-control-sm" id="ref" name="ref" placeholder="REF. Documento" maxlength="101" required></textarea>
								</div>
								<div class="form-group col-md-6">
									<label for="inputEmail4"><i class="fas fa-eye-dropper "></i> Descripcion</label>
									<textarea rows="2" class="form-control form-control-sm" id="descrip_doc" name="descrip_doc" placeholder="Describir contenido" maxlength="201" required></textarea>
								</div>
							</div>
							<div class="form-row">

								<div class="form-group col-md-6">
									<label for="inputPassword4"><i class="fas fa-eye-dropper "></i>Observacion</label>
									<textarea rows="2" class="form-control form-control-sm" type="text" id="obs_doc" name="obs_doc" placeholder="Existe alguna observación?" maxlength="201"></textarea>
								</div>
								<div class="form-group col-md-6">
									<label for="inputEmail4"><i class="fas fa-file-invoice "></i> CITE</label>
									<input type="text" class="form-control form-control-sm text-uppercase" id="cite" name="cite" placeholder="Ejemplo: SMAF/DA/US/RETY/054/2021" maxlength="81">
								</div>
							</div>
						</fieldset>
						<fieldset class="scheduler-border" style="background:#f5f2f5">
							<legend class="scheduler-border" style="width: 119px;">DATOS REMITENTE</legend>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4"><i class="fas fa-user"></i> Nombre del Remitente</label>
									<input type="text" class="form-control form-control-sm" id="nombre_remitente" disabled name="nombre_remitente" value="<?= $this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos') ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4"><i class="fas fa-address-book"></i> Cargo del Remitente</label>
									<input type="text" class="form-control form-control-sm" id="cargo_remitente" disabled name="cargo_remitente" value="<?= $this->session->userdata('rol_cargo') ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="inputEmail4"><i class="fas fa-hotel"></i> Dependencia Remitente</label>
									<input type="text" class="form-control form-control-sm" id="institucion_remitente" name="institucion_remitente" value="<?= $this->session->userdata('nameUnique') ?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label for="inputPassword4"><i class="fas fa-phone-alt"></i> Nro. de Contacto</label>
									<input type="text" class="form-control form-control-sm" id="nro_contacto" name="nro_contacto" value="<?= $this->session->userdata('usu_celular') ?>" required>
								</div>
								<div class="form-group col-md-4">
									<label>Categoria</label>
									<div class="form-check">
										<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" value="U">
										<label class="form-check-label">Urgente</label>
									</div>
									<div class="form-check">
										<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" value="P">
										<label class="form-check-label">Prioritario</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="nivel" value="R" checked>
										<label class="form-check-label">Rutinario</label>
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset class="scheduler-border" style="background:#f5f2f5">
							<legend class="scheduler-border">Subir Archivos.</legend>
							<label class="form-check-label">Nota: Los archivos deben estar en formato PDF y no deben pesar mas de 2.MB</label>
							<div class="card-body p-2">
								<div id="actions" class="row">
									<div class="col-lg-6">
										<div class="btn-group w-100" style="width: 30%!important">
											<span class="btn btn-success col fileinput-button">
												<i class="fas fa-plus"></i>
												<span style="font-size: 0.7rem">Subir Archivo</span>
											</span>
											<button type="submit" class="btn btn-primary col start" style="display: none;" style="width:30%">
												<i class="fas fa-upload"></i>
												<span>Start upload</span>
											</button>
											<button type="reset" class="btn btn-warning col cancel" hidden>
												<i class="fas fa-times-circle"></i>
												<span style="font-size: 0.7rem">Eliminar Archivos</span>
											</button>
										</div>
									</div>
									<div class="col-lg-6 d-flex align-items-center">
										<div class="fileupload-process w-100">
											<div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
												<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
											</div>
										</div>
									</div>
								</div>
								<div class="table table-striped files" id="previews">
									<div id="template" class="row mt-2">
										<div class="col-auto">
											<span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
										</div>
										<div class="col d-flex align-items-center">
											<p class="mb-0">
												<span class="lead" data-dz-name></span>
												(<span data-dz-size></span>)
											</p>
											<strong class="error text-danger" data-dz-errormessage></strong>
										</div>
										<div class="col-4 d-flex align-items-center">
											<div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
												<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
											</div>
										</div>
										<div class="col-auto d-flex align-items-center">
											<div class="btn-group">
												<button class="btn btn-primary start" style="display: none;">
													<i class="fas fa-upload"></i>
													<span>Start</span>
												</button>
												<button data-dz-remove class="btn btn-warning cancel">
													<i class="fas fa-times-circle"></i>
													<span style="font-size: 0.7rem">Cancelar</span>
												</button>
												<button data-dz-remove class="btn btn-danger delete" style="display: none;">
													<i class="fas fa-trash"></i>
													<span>Eliminar</span>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" id="CrearHojaRuta" class="btn btn-sm btn-primary">Aceptar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="editarHojaRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content secretary_edit">
				<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Editar Hoja de Ruta <span title="3 New Messages" class="badge bg-success cod_GAMEA"></span></b></h5>
					<div class="card-tools mr-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div id="load_register_edit" class="row align-items-center justify-content-center">
					<div class="fa-3x">
						<i class="fas fa-circle-notch fa-spin"></i> Procesando...
					</div>
				</div>
				<form id="form_editarHoja" class="mb-0" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_cor" id="id_cor">
					<div id="modalCuerpo" class="modal-body font-13" style="margin: 4px; overflow-y: auto;height: auto;">
						<fieldset class="scheduler-border" style="background:#f5f2f5">
							<legend class="scheduler-border">DOCUMENTO</legend>
							<div class="form-row">

								<div class="form-group col-md-6">
									<label for="ref_edit"><i class="fas fa-file-invoice "></i> REFERENCIA</label>
									<textarea rows="2" class="form-control form-control-sm" id="ref_edit" name="ref_edit" placeholder="REF. Documento" maxlength="101" required></textarea>
								</div>
								<div class="form-group col-md-6">
									<label for="descrip_doc_edit"><i class="fas fa-eye-dropper "></i> Descripcion</label>
									<textarea rows="2" class="form-control form-control-sm" id="descrip_doc_edit" name="descrip_doc_edit" placeholder="Describir contenido" maxlength="201" required></textarea>
								</div>
							</div>
							<div class="form-row">

								<div class="form-group col-md-6">
									<label for="obs_doc_edit"><i class="fas fa-eye-dropper "></i> Observacion</label>
									<textarea rows="2" class="form-control form-control-sm" type="text" id="obs_doc_edit" name="obs_doc_edit" placeholder="Existe alguna observación?" maxlength="201"></textarea>
								</div>
								<div class="form-group col-md-6">
									<label for="cite_edit"><i class="fas fa-file-invoice "></i> CITE</label>
									<input type="text" class="form-control form-control-sm text-uppercase" id="cite_edit" name="cite_edit" placeholder="SMAF/DA/US/RETY/054/2021" maxlength="81">
								</div>
							</div>
						</fieldset>
						<fieldset class="scheduler-border" style="background:#f5f2f5">
							<legend class="scheduler-border" style="width: 119px;">DATOS REMITENTE</legend>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="nombre_remitente_edit"><i class="fas fa-user"></i> Nombre del Remitente</label>
									<input type="text" class="form-control form-control-sm" id="nombre_remitente_edit" disabled name="nombre_remitente_edit" value="<?= $this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos') ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="cargo_remitente_edit"><i class="fas fa-user"></i> Cargo del Remitente</label>
									<input type="text" class="form-control form-control-sm" id="cargo_remitente_edit" disabled name="cargo_remitente_edit" value="<?= $this->session->userdata('rol_cargo') ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="institucion_remitente_edit"><i class="fas fa-hotel"></i> Dependencia Remitente</label>
									<input type="text" class="form-control form-control-sm" id="institucion_remitente_edit" name="institucion_remitente_edit" value="<?= $this->session->userdata('nameUnique') ?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label for="nro_contacto_edit"><i class="fas fa-phone-alt"></i> Nro. de Contacto</label>
									<input type="text" class="form-control form-control-sm" id="nro_contacto_edit" name="nro_contacto_edit" placeholder="Número de Celular" value="<?= $this->session->userdata('usu_celular') ?>" maxlength="21" required>
								</div>
								<div class="form-group col-md-4">
									<label>Categoria</label>

									<div class="form-check">
										<input class="form-check-input" type="radio" id="rdo_urgente" name="nivel_edit" value="U">
										<label class="form-check-label">Urgente</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" id="rdo_prioritario" name="nivel_edit" value="P">
										<label class="form-check-label">Prioritario</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" id="rdo_rutinario" name="nivel_edit" value="R">
										<label class="form-check-label">Rutinario</label>
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset class="scheduler-border" style="background:#f5f2f5">
							<div class="form-group">
								<label for="exampleInputFile">Subir Archivo PDf</label><br>
								<label class="form-check-label">Nota: Los archivos deben estar en formato PDF y no deben pesar mas de 2.MB</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" for="Subir" class="custom-file-input" name="NuevoArchivo" id="NuevoArchivo">
										<label class="custom-file-label" for="exampleInputFile" style="content: 'Subir Archivo';">Suba un nuevo Archivo</label>
									</div>
								</div>
							</div>
						</fieldset>
						<fieldset class="scheduler-border" style="background:#f5f2f5">
							<legend class="scheduler-border">Archivos Subidos</legend>

							<table id="TableDocEditar" class="table table-sm table-hover table-bordered font-13">
								<thead>
								</thead>
								<tbody>
								</tbody>
							</table>

						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
						<button type="submit" id="enviarHojaRuta_edit" class="btn btn-sm btn-primary">Confirmar</button>
					</div>
				</form>
			</div>
		</div>
	</div>



	<div class="modal fade" id="derivarHojaRutaInterna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content secretary">
				<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Derivacion Interna Hoja de Ruta <span title="3 New Messages" class="badge bg-success cod_GAMEA"></span><b></h5>
					<div class="card-tools mr-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<form id="form_derivarHojaRutainterna" class="mb-0" method="post">
					<div class="modal-body font-13">
						<div id="load_derive_internal" class="row align-items-center justify-content-center">
							<div class="fa-3x">
								<i class="fas fa-circle-notch fa-spin"></i> Procesando...
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
									<legend class="scheduler-border">&nbsp;DEPENDENCIA</legend>
									<div class="form-group">
										<?= $this->session->userdata('nameDependency') ?>
									</div>
								</fieldset>
								<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
									<input type="hidden" id="cor_id_interno" name="cor_id_interno">
									<input type="hidden" id="codigo_interno" name="codigo_interno">
									<legend class="scheduler-border">&nbsp;MIS TECNICOS</legend>
									<div class="form-group row ml-2 mr-2 msg_validar">
										<select id="usuInterno_id" name="usuInterno_id" class="form-control form-control-sm" required>
										</select>
									</div>
								</fieldset>
								<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
									<legend class="scheduler-border" style="width: 90px;">PROVEIDO</legend>
									<div class="form-group col-lg-12">
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<select class="form-control font-14" id="select_proveidoInterno">
													<option value="0" selected="selected" disabled>Seleccionar Proveido</option>
													<?php
													if (count($proveido) > 0) {
														foreach ($proveido as $prov) { ?>
															<option value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_nombre'] ?></option>
													<?php }
													}
													?>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">Proveido:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
												<textarea class="form-control form-control-sm" id="a_provInterno" name="a_provInterno" rows="2" placeholder="Descripcion del Documento" maxlength="201" required></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_observacion" class="col-form-label">Obs.:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
												<textarea class="form-control form-control-sm" id="a_obsInterno" name="a_obsInterno" rows="2" placeholder="Observación del Documento" maxlength="201"></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
											</div>
											<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 msg_validar">
												<input type="number" value="1" min="1" class="form-control form-control-sm" id="Fecha_plazoInterno" name="Fecha_plazoInterno" required>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset class="scheduler-border" style="background:#EAEAEAFF;">
									<legend class="scheduler-border" style="width: 90px;">ARCHIVOS</legend>
									<div class="form-group col-lg-12">
										<table id="TableDocderivar" class="table table-sm table-hover table-bordered font-13 mb-2">
											<thead>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" id="submitDeriveInternal" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar Hoja de Ruta
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="VerArchivos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Ver Archivos</b></h5>
					<div class="card-tools mr-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div class="modal-body">
					<div id="load_archivos" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
					<div id="modalCuerpo" class="modal-body" style="overflow-y: auto;height: auto;">
						<div class="card-body p-2">
							<table id="TableDocDerivar" class="table table-sm table-hover table-bordered font-13">
								<thead>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>






	<div class="modal fade" id="viewEyeRoute" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Detalles de la Hoja de Ruta <span id="viewEyeRouteTitle" title="3 New Messages" class="badge bg-success cod_GAMEA"></span></b></h5>
					<div class="card-tools mr-2">

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div id="load_viewEyeRoute" class="row align-items-center justify-content-center">
					<div class="fa-3x">
						<i class="fas fa-circle-notch fa-spin"></i> Procesando...
					</div>
				</div>
				<div class="modal-body">
					<div class="col-md-12">
						<div class="form-group">
							<fieldset class="scheduler-border font-13" style="background:#eaeaea;">

								<div class="form-group col-lg-12">
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_descripcion" class="col-form-label">CITE.:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<textarea class="form-control form-control-sm" id="cite" rows="1" disabled></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_descripcion" class="col-form-label">REF.:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<textarea class="form-control form-control-sm" id="reference" rows="2" disabled></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_descripcion" class="col-form-label">Descripcion:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<textarea class="form-control form-control-sm" id="description" rows="2" disabled></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_observacion" class="col-form-label">Obs.:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<textarea class="form-control form-control-sm" id="observation" rows="2" disabled></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_observacion" class="col-form-label">Remitente:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<textarea class="form-control form-control-sm" id="remitente" rows="1" disabled></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_observacion" class="col-form-label">Cargo Remitente:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<textarea class="form-control form-control-sm" id="cargo_remitenteV" rows="2" disabled></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_observacion" class="col-form-label">Institucion Remitente:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<textarea class="form-control form-control-sm" id="inst_remitente" rows="2" disabled></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_observacion" class="col-form-label">Nro.Contacto:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<textarea class="form-control form-control-sm" id="tel_remitente" rows="1" disabled></textarea>
										</div>
									</div>
									<!-- <div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_observacion" class="col-form-label">Documentos</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<div class="card-body p-2" style="background:#E8EBEE;border: 1px solid #dddee0;">
													<table id="TableDocDerivar" class="table table-sm table-hover table-bordered font-13">
														<thead>
														</thead>
														<tbody>
														</tbody>
													</table>
												</div>
											</div>
										</div> -->

								</div>
								<!-- /.card -->
							</fieldset>
						</div>
						<!-- /.card -->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modal_cambiarpass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><b><i class="fas fa-user"></i> Modificar Password <b></h5>
					<div class="card-tools">
						</span>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<form id="form_cambiarpass" method="post">
					<div class="modal-body">
						<div id="load_cambiarpass" class="row align-items-center justify-content-center">
							<div class="fa-3x">
								<i class="fas fa-circle-notch fa-spin"></i> Procesando...
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<fieldset class="scheduler-border" style="background:#EAEAEAFF;font-size: 12px;">
									<legend class="scheduler-border">&nbsp;</legend>
									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="inputPassword4"> <i class="fas fa-key"></i><i class="fas fa-lock"></i> Nueva Contraseña</label>
											<input type="password" class="form-control form-control-sm" id="Newpassword" name="Newpassword" placeholder="Nueva Contraseña" required>
										</div>
										<div class="form-group col-md-4">
											<label for="inputPassword4"> <i class="fas fa-key"></i><i class="fas fa-lock"></i> Repetir Constraseña</label>
											<input type="password" class="form-control form-control-sm" id="Newpassword2" name="Newpassword2" placeholder="Repetir Nueva Contraseña" required>
										</div>
									</div>
								</fieldset>
								<div class="modal-footer">
									<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Cancelar</button>
									<button type="submit" class="btn btn-sm btn-primary float-right" id="ButtonModificarPass"><i class="fas fa-check"></i> Modificar </button>
								</div>
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>


</div>
<!-- /.content-wrapper -->