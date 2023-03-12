			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Main content -->
				<section class="content">
					<div class="container-fluid">
						<div class="row">
							<!-- /.col -->
							<div class="col-md-12">
								<div class="card card-secondary card-tabs">

									<div class="card-header p-0 pt-1">
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a class="nav-link active" href="#activity" data-toggle="tab">Registrar Correspondencia</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#timeline" data-toggle="tab">Hojas de Ruta En Proceso</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#settings" data-toggle="tab">Hojas de Ruta Concluidas</a>
											</li>
										</ul>
									</div>
									<div class="card-body">
										<div class="tab-content">
											<div class="active tab-pane" id="activity">
												<div class="container-fluid">
													<div class="row">
														<div class="col-12">
															<div class="card card card-primary">
																<button type="button" class="btn btn-block btn-sm btn-primary col-sm-12 col-md-4 col-lg-3" data-toggle="modal" onclick="resetDropZone()" data-target="#CrearHojaRuta">
																	<i class="fas fa-plus"></i> Registrar Correspondencia
																</button>
																<!-- <div class="mailbox-controls">
																	<div class="float-left">
																		<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>

																	</div>
																	<div class="float-left">
																		<div class="btn-group-sm" style="display: none; width:80%;  margin-left: 10px;" name="DivCheck" id="DivCheck">
																			<button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
																				Acciones
																			</button>
																			<div class="dropdown-menu" role="menu">
																				<a class="dropdown-item" href="#" onclick="DerivarMultiple()" data-target="#derivarHojaRutaMultiple" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Derivacion a S.M.G.I.</a>
																			</div>
																		</div>
																	</div>
																</div> -->
																<div class="card-body table-responsive mailbox-messages" style="width: auto;overflow-x: auto;">
																	<table id="example1" class="table table-hover table-striped tableCenterData" style="font-size: 11px;">
																		<thead>
																			<tr>

																				<th>ACCIONES</th>
																				<th>CODIGO</th>
																				<th>REFERENCIA</th>
																				<th>NIVEL</th>
																				<th>NOMBRE REMITENTE</th>
																				<th>INSTITUCION</th>
																				<th>FECHA DE RECEPCION</th>
																				<th>ARCHIVO</th>
																				<th>MAS DETALLES</th>
																			</tr>
																		</thead>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane" id="timeline">
												<div class="container-fluid">
													<div class="row">
														<div class="col-12">
															<div class="card">
																<div class="card-body" style="width: auto;overflow-x: auto;">
																	<table id="example2" class="table table-sm table-hover table-striped table-bordered tableCenterData" style="font-size: 11px;">
																		<thead>
																			<tr>
																				<th>ACCIONES</th>
																				<th>CODIGO</th>
																				<th>REFERENCIA</th>
																				<th>NIVEL</th>
																				<th>NOMBRE REMITENTE</th>
																				<th>INSTITUCION</th>
																				<th>FECHA DE RECEPCION</th>
																				<th>ARCHIVO</th>
																				<th>MAS DETALLES</th>
																			</tr>
																		</thead>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane" id="settings">
												<div class="container-fluid">
													<div class="row">
														<div class="col-12">
															<div class="card">
																<div class="card-body" style="width: auto;overflow-x: auto;">
																	<table id="example3" class="table table-sm table-hover table-striped table-bordered tableCenterData" style="font-size: 11px;">
																		<thead>
																			<tr>
																				<th>ACCIONES</th>
																				<th>CODIGO</th>
																				<th>REFERENCIA</th>
																				<th>NIVEL</th>
																				<th>NOMBRE REMITENTE</th>
																				<th>INSTITUCION</th>
																				<th>FECHA DE RECEPCION</th>
																				<th>ARCHIVO</th>
																				<th>MAS DETALLES</th>
																			</tr>
																		</thead>
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
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->

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
						<div class="modal-dialog" style="max-width: 650px;">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title ml-2"><b>DETALLES DE LA HOJA DE RUTA <span id="viewEyeRouteTitle" title="3 New Messages" class="badge bg-success cod_GAMEA"></span></h5></b>
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
											<div class="form-group col-lg-12">
												<fieldset class="fieldset_Content_tema">
													<legend class="legend_tema">Datos Generales</legend>
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="inputEmail4"><i class="fas fa-file-invoice "></i> REFERENCIA</label>
															<textarea class="form-control form-control-sm text-uppercase" id="reference" name="reference" rows="2" style="border-radius: 9px;"></textarea>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="inputPassword4"><i class="fas fa-eye-dropper "></i> DESCRIPCION</label>
															<textarea class="form-control form-control-sm text-uppercase" id="description" name="description" rows="2" style="border-radius: 9px;"></textarea>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="inputPassword4"><i class="fas fa-eye-dropper "></i> OBSERVACION</label>
															<textarea class="form-control form-control-sm text-uppercase" id="observation" name="observation" rows="2" style="border-radius: 9px;"></textarea>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-md-12">
															<label for="inputPassword4"><i class="fas fa-file-invoice "></i> CITE</label>
															<input type="text" class="form-control text-uppercase " style="border-radius: 9px;" id="citeView" name="citeView">
														</div>
													</div>
												</fieldset>
												<fieldset class="fieldset_Content_tema">
													<legend class="legend_tema">Datos Remitente</legend>
													<div class="form-row">
														<div class="form-group col-md-6">
															<label for="inputEmail4"><i class="fas fa-user"></i> NOMBRE REMITENTE</label>
															<input type="text" class="form-control text-uppercase " style="border-radius: 9px;" id="remitente_nombre" name="remitente_nombre">
														</div>
														<div class="form-group col-md-6">
															<label for="inputPassword4"><i class="fas fa-address-book"></i> CARGO DEL REMITENTE</label>
															<input type="text" class="form-control text-uppercase " style="border-radius: 9px;" id="remitente_cargo" name="remitente_cargo">
														</div>
													</div>

													<div class="form-row">
														<div class="form-group col-md-6">
															<label for="inputEmail4"><i class="fas fa-hotel"></i> INSTITUCION REMITENTE</label>
															<input type="text" class="form-control text-uppercase " style="border-radius: 9px;" id="remitente_institucion" name="remitente_institucion">
														</div>
														<div class="form-group col-md-6">
															<label for="inputPassword4"><i class="fas fa-phone-alt"></i> CELULAR REMITENTE</label>
															<input type="text" class="form-control text-uppercase " style="border-radius: 9px;" id="remitente_telefono" name="remitente_telefono">
														</div>
													</div>
												</fieldset>
												<fieldset class="fieldset_Content_tema">
													<legend class="legend_tema">Documentacion</legend>
													<div class="form-row">
														<div class="form-group col-md-2">
															<label for="inputEmail4"><i class="fas fa-file-invoice "></i> NRO FOJAS</label>
															<input type="text" class="form-control " style="border-radius: 9px;text-align: center;" id="d_fojas" name="d_fojas">
														</div>
														<div class="form-group col-md-2">
															<label for="inputPassword4"><i class="fas fa-compact-disc"></i> CD/DVD</label>
															<input type="text" class="form-control " style="border-radius: 9px;text-align: center;" id="d_cd" name="d_cd">
														</div>
														<div class="form-group col-md-2">
															<label for="inputEmail4"><i class="fas fa-copy"></i> SOBRES</label>
															<input type="text" class="form-control " style="border-radius: 9px;text-align: center;" id="d_sobres" name="d_sobres">
														</div>
														<div class="form-group col-md-2">
															<label for="inputEmail4"><i class="fas fa-folder-open"></i> CARPETAS</label>
															<input type="text" class="form-control" style="border-radius: 9px;text-align: center;" id="d_carpeta" name="d_carpeta">
														</div>
														<div class="form-group col-md-2">
															<label for="inputPassword4"><i class="far fa-clone"></i> ANILLADOS</label>
															<input type="text" class="form-control" style="border-radius: 9px;text-align: center;" id="d_anillado" name="d_anillado">
														</div>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"> <i class="far fa-times-circle"></i> Cerrar</button>
								</div>
							</div>
						</div>
					</div>







					<div class="modal fade" id="CrearHojaRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title"><b>Registrar Hoja de Ruta</b></h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div id="load_register" class="row align-items-center justify-content-center">
									<div class="fa-3x">
										<i class="fas fa-circle-notch fa-spin"></i> Procesando...
									</div>
								</div>
								<form id="form_crearHoja" method="post">
									<div id="modalCuerpo" class="modal-body" style="height: auto;width: auto;">
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">DATOS</legend>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-file-invoice "></i> RUBRO</label>
													<select class="form-control" id="select_rubro">
														<option value="0" selected="selected" disabled>Seleccionar Rubro</option>
														<option value="INMUEBLE">INMUEBLE</option>
														<option value="PATENTE">PATENTE</option>
														<option value="VEHICULO-PTA">VEHICULO-PTA</option>
														<option value="VEHICULO-COPO">VEHICULO-COPO</option>
														<option value="VEHICULO-POLIZA">VEHICULO-POLIZA</option>
													</select>
												</div>
												<div class="form-group  col-md-6">
													<label for="inputEmail4"><i class="fas fa-eye-dropper "></i> NRO REGISTRO TRIBUTARIO</label>
													<div class="input-group mb-3">
														<input class="form-control form-control-sm text-uppercase " type="number" style="border-top-left-radius:9px;border-bottom-left-radius:9px;" id="reg_tributario" name="reg_tributario" placeholder="Registro Tributario"></input>
														<span class="input-group-append">
															<button type="button" class="btn btn-info btn-flat" style="border-top-right-radius:9px;border-bottom-right-radius:9px;" onclick="EnviarInputDes_nroTributario()"><i class="fas fa-sign-in-alt"></i></button>
														</span>
													</div>
												</div>

											</div>
										</fieldset>

										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">DOCUMENTO</legend>
											<div class="form-row">

												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-file-invoice "></i> REFERENCIA</label>
													<textarea class="form-control form-control-sm text-uppercase" style="border-radius: 9px;" id="ref" name="ref" rows="2" placeholder="REF. Documento" required></textarea>
												</div>
												<div class="form-group col-md-6">
													<label for="inputEmail4"><i class="fas fa-eye-dropper "></i> DESCRIPCION</label>
													<textarea class="form-control form-control-sm text-uppercase" style="border-radius: 9px;" id="descrip_doc" name="descrip_doc" rows="2" placeholder="Descripcion del Documento" required></textarea>
												</div>
											</div>
											<div class="form-row">

												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-eye-dropper "> </i> OBSERVACION</label>
													<textarea class="form-control form-control-sm text-uppercase" style="border-radius: 9px;" id="obs_doc" name="obs_doc" rows="2" placeholder="Observacion del Documento"></textarea>
												</div>
												<div class="form-group col-md-6">
													<label for="inputEmail4"><i class="fas fa-file-invoice "></i> CITE</label>
													<input type="text" class="form-control form-control-sm text-uppercase" id="cite" name="cite" style="border-radius: 9px;" placeholder="CITE Documento">
												</div>
											</div>
										</fieldset>
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">REMITENTE DOC.</legend>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputEmail4"><i class="fas fa-user"></i> NOMBRE DEL REMITENTE</label>
													<input type="text" class="form-control form-control-sm text-uppercase" id="nombre_remitente" style="border-radius: 9px;" name="nombre_remitente" placeholder="Nombre del Remitente" required>
												</div>
												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-address-book"></i> CARGO DEL REMITENTE</label>
													<input type="text" class="form-control form-control-sm text-uppercase" id="cargo_remitente" style="border-radius: 9px;" name="cargo_remitente" placeholder="Ej: Responsable Distrital, Gerente Gral, Presidente de la Urb Bautista Saavedra">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputEmail4"><i class="fas fa-hotel"></i> INSTITUCION DEL REMITENTE</label>
													<input type="text" class="form-control form-control-sm text-uppercase" id="institucion_remitente" style="border-radius: 9px;" name="institucion_remitente" placeholder="EJ: empresa De La Paz, Junta 12 de Octubre, etc">
												</div>
												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-phone-alt"></i>NRO DE CONTACTO</label>
													<input type="number" class="form-control form-control-sm" id="nro_contacto" name="nro_contacto" style="border-radius: 9px;" onKeyPress="if(this.value.length==8) return false;" placeholder="Nro. de Contacto">
												</div>
											</div>
										</fieldset>
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">RECEPCION DOC.</legend>
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-form-label col-form-label-sm" style="margin-left: 0.5rem;">Fecha de Recepcion</label>
												<div class="form-group col-md-3">
													<input type="datetime-local" class="form-control form-control-sm" id="colFormLabelSmRegister" name="fecha_recep"  placeholder="col-form-label-sm" required>
												</div>
												<label for="colFormLabelSm" class="col-form-label col-form-label-sm" style="margin-left: 2rem;">Plazo(Dias):</label>
												<div class="form-group col-md-2">
													<input type="number" value="1" class="form-control form-control-sm" id="Fecha_plazoCorrespondencia" name="Fecha_plazoCorrespondencia">
												</div>
											</div>

											<div class="form-row">
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" checked name="nro_fojas" value="1">
														<label class="form-check-label" for="gridCheck">
															Nro. Fojas<br>
															<input class="form-check-input" id="nro_cant_fojas" name="nro_cant_fojas" type="number" style="width:90%;"  value="1" placeholder="CANTIDAD"required><br>
														</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" name="nro_cd_dvd" id="nro_cd_dvd" value="1">
														<label class="form-check-label" for="gridCheck">
															CD/DVD<br>
															<input class="form-check-input" name="nro_cant_cd_dvd" id="nro_cant_cd_dvd" style="width:90%;" type="number" placeholder="CANTIDAD" disabled><br>
														</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" name="sobres" id="sobres" value="1">
														<label class="form-check-label" for="gridCheck">
															Sobres<br>
															<input class="form-check-input" name="sobres_cant" id="sobres_cant" type="number" style="width:90%;" placeholder="CANTIDAD" disabled><br>
														</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" name="carpetas" id="carpetas" value="1">
														<label class="form-check-label" for="gridCheck">
															Carpetas<br>
															<input class="form-check-input" name="carpetas_cant" id="carpetas_cant" type="number" style="width:90%;" placeholder="CANTIDAD" disabled><br>
														</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" name="anillados" id="anillados" value="1">
														<label class="form-check-label" for="gridCheck">
															Anillados<br>
															<input class="form-check-input" name="anillados_cant" id="anillados_cant" type="number" style="width:90%;" placeholder="CANTIDAD" disabled><br>
														</label>
													</div>
												</div>
											</div>
											<br>
										</fieldset>
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">CATEGORIA</legend>
											<div class="form-row" style="text-align: center;  display: flex;">
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" checked value="U">
														<label class="form-check-label">URGENTE</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" value="P">
														<label class="form-check-label">PRIORITARIO</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" value="R">
														<label class="form-check-label">RUTINARIO</label>
													</div>
												</div>
											</div>
										</fieldset>
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">Subir Archivos.</legend>
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
										<button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Cancelar</button>
										<button type="submit" id="enviarHojaRuta" class="btn btn-primary"> <i class="fas fa-check"></i> Aceptar</button>
									</div>
								</form>
							</div>
						</div>
					</div>


					<div class="modal fade" id="editarHojaRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title"><b>Editar Hoja de Ruta <b><span title="3 New Messages" class="badge bg-success cod_GAMEA"></span></h4>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div id="load_register_editar" class="row align-items-center justify-content-center">
									<div class="fa-3x">
										<i class="fas fa-circle-notch fa-spin"></i> Procesando...
									</div>
								</div>
								<form id="form_editarHoja" method="post">
									<input type="hidden" id="varcor_id" name="varcor_id">
									<input type="hidden" id="varrec_doc_id" name="varrec_doc_id">
									<div id="modalCuerpo" class="modal-body" style="height: auto;width: auto;">
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">DATOS</legend>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-file-invoice "></i> RUBRO</label>
													<select class="form-control" id="select_rubro_edit">
														<option value="0" selected="selected" disabled>Seleccionar Rubro</option>
														<option value="INMUEBLE">INMUEBLE</option>
														<option value="PATENTE">PATENTE</option>
														<option value="VEHICULO-PTA">VEHICULO-PTA</option>
														<option value="VEHICULO-COPO">VEHICULO-COPO</option>
														<option value="VEHICULO-POLIZA">VEHICULO-POLIZA</option>
													</select>
												</div>
												<div class="form-group  col-md-6">
													<label for="inputEmail4"><i class="fas fa-eye-dropper "></i> NRO REGISTRO TRIBUTARIO</label>
													<div class="input-group mb-3">
														<input class="form-control form-control-sm text-uppercase " type="number" style="border-top-left-radius:9px;border-bottom-left-radius:9px;" id="reg_tributario_edit" name="reg_tributario_edit" placeholder="Registro Tributario"></input>
														<span class="input-group-append">
															<button type="button" class="btn btn-info btn-flat" style="border-top-right-radius:9px;border-bottom-right-radius:9px;" onclick="EnviarInputDes_nroTributario_edit()"><i class="fas fa-sign-in-alt"></i></button>
														</span>
													</div>
												</div>
											</div>
										</fieldset>

										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">DOCUMENTO</legend>
											<div class="form-row">

												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-file-invoice "></i> REFERENCIA</label>
													<textarea class="form-control form-control-sm text-uppercase" id="ref_edit" name="ref_edit" rows="2" style="border-radius: 9px;" placeholder="REF. Documento" required></textarea>
												</div>
												<div class="form-group col-md-6">
													<label for="inputEmail4"><i class="fas fa-eye-dropper "></i> DESCRIPCION</label>
													<textarea class="form-control text-uppercase" id="descrip_doc_edit" name="descrip_doc_edit" rows="2" style="border-radius: 9px;" placeholder="Descripcion del Documento" required></textarea>
												</div>
											</div>
											<div class="form-row">

												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-eye-dropper "></i>OBSERVACION</label>
													<textarea class="form-control text-uppercase" id="obs_doc_edit" name="obs_doc_edit" rows="2" style="border-radius: 9px;" placeholder="Observacion del Documento"></textarea>
												</div>
												<div class="form-group col-md-6">
													<label for="inputEmail4"><i class="fas fa-file-invoice "></i> CITE</label>
													<input type="text" class="form-control text-uppercase" id="cite_edit" name="cite_edit" style="border-radius: 9px;" placeholder="CITE Documento">
												</div>
											</div>
										</fieldset>
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">REMITENTE DOC.</legend>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputEmail4"><i class="fas fa-user"></i> NOMBRE DEL REMITENTE</label>
													<input type="text" class="form-control text-uppercase" id="nombre_remitente_edit" style="border-radius: 9px;" name="nombre_remitente_edit" placeholder="Nombre del Remitente" required>
												</div>
												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-address-book"></i> CARGO DEL REMITENTE</label>
													<input type="text" class="form-control text-uppercase" id="cargo_remitente_edit" name="cargo_remitente_edit" style="border-radius: 9px;" placeholder="Ej: Responsable Distrital, Gerente Gral, Presidente de la Urb Bautista Saavedra">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="inputEmail4"><i class="fas fa-hotel"></i> INSTITUCION DEL REMITENTE</label>
													<input type="text" class="form-control text-uppercase" id="institucion_remitente_edit" name="institucion_remitente_edit" style="border-radius: 9px;" placeholder="EJ: empresa De La Paz, Junta 12 de Octubre, etc">
												</div>
												<div class="form-group col-md-6">
													<label for="inputPassword4"><i class="fas fa-phone-alt"></i> NRO DE CONTACTO</label>
													<input type="number" class="form-control form-control-sm" id="nro_contacto_edit" name="nro_contacto_edit" style="border-radius: 9px;" onKeyPress="if(this.value.length==8) return false;" placeholder="Nro. de Contacto">
												</div>
											</div>
										</fieldset>
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">RECEPCION DOC.</legend>
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-form-label col-form-label-sm" style="margin-left: 0.5rem;">Fecha de Recepcion</label>
												<div class="form-group col-md-3">
													<input type="datetime-local" class="form-control form-control-sm" id="colFormLabelSmFecha_edit" name="fecha_recep_edit" placeholder="col-form-label-sm" required>
												</div>
												<label for="colFormLabelSm" class="col-form-label col-form-label-sm" style="margin-left: 2rem;">Plazo(Dias):</label>
												<div class="form-group col-md-2">
													<input type="number" value="3" class="form-control form-control-sm" id="Fecha_plazoCorrespondencia_Edit" name="Fecha_plazoCorrespondencia_Edit">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" checked name="nro_fojas_edit" id="nro_fojas_edit" value="1">
														<label class="form-check-label" for="gridCheck">
															Nro. Fojas<br>
															<input class="form-check-input" style="width:90%;" id="nro_cant_fojas_edit" name="nro_cant_fojas_edit" type="number" placeholder="CANTIDAD"><br>
														</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" name="nro_cd_dvd_edit" id="nro_cd_dvd_edit" value="1">
														<label class="form-check-label" for="gridCheck">
															CD/DVD<br>
															<input class="form-check-input" style="width:90%;" id="nro_cant_cd_dvd_edit" name="nro_cant_cd_dvd_edit" type="number" placeholder="CANTIDAD" disabled><br>
														</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" name="sobres_edit" id="sobres_edit" value="1">
														<label class="form-check-label" for="gridCheck">
															Sobres<br>
															<input class="form-check-input" style="width:90%;" id="sobres_cant_edit" name="sobres_cant_edit" type="number" placeholder="CANTIDAD" disabled><br>
														</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" name="carpetas_edit" id="carpetas_edit" value="1">
														<label class="form-check-label" for="gridCheck">
															Carpetas<br>
															<input class="form-check-input" style="width:90%;" id="carpetas_cant_edit" name="carpetas_cant_edit" type="number" placeholder="CANTIDAD" disabled><br>
														</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" name="anillados_edit" id="anillados_edit" value="1">
														<label class="form-check-label" for="gridCheck">
															Anillados<br>
															<input class="form-check-input" style="width:90%;" id="anillados_cant_edit" name="anillados_cant_edit" type="number" placeholder="CANTIDAD" disabled><br>
														</label>
													</div>
												</div>
											</div><br>
										</fieldset>

										<fieldset class="fieldset_Content_tema">
											<div class="form-row" style="text-align: center;  display: flex;">
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="radio" id="rdo_urgente" name="nivel_edit" value="U">
														<label class="form-check-label">URGENTE</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="radio" id="rdo_prioritario" name="nivel_edit" value="P">
														<label class="form-check-label">PRIORITARIO</label>
													</div>
												</div>
												<div class="form-group col-md-2">
													<div class="form-check">
														<input class="form-check-input" type="radio" id="rdo_rutinario" name="nivel_edit" value="R">
														<label class="form-check-label">RUTINARIO</label>
													</div>
												</div>
											</div>
										</fieldset>
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">Subir Archivos</legend>
											<div class="form-group">
												<label class="form-check-label">Nota: Los archivos deben estar en formato PDF y no deben pesar mas de 2.MB</label>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" for="Subir" class="custom-file-input" name="NuevoArchivo" id="NuevoArchivo">
														<label class="custom-file-label" for="exampleInputFile" style="content: 'Subir Archivo';">Suba un nuevo Archivo</label>
													</div>
												</div>
											</div>
										</fieldset>
										<fieldset class="fieldset_Content_tema">
											<legend class="legend_tema">Achivos Subidos</legend>
											<table id="TableDocEditar" class="table table-sm table-hover table-bordered font-13">
												<thead>
												</thead>
												<tbody>
												</tbody>
											</table>
										</fieldset>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
										<button type="submit" id="enviarHojaRutaEditado" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</button>
									</div>
								</form>
							</div>
						</div>
					</div>


					<div class="modal fade" id="derivarHojaRutaExterna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content secretary">
								<div class="modal-header">
									<h5 class="modal-title ml-2"><b>Derivacion Externa <span title="3 New Messages" class="badge bg-success cod_GAMEAExterna"></span><b></h5>
									<div class="card-tools mr-2">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
								<form id="form_derivarHojaRutaExterna" class="mb-0" method="post">
									<div class="modal-body font-13">
										<div id="load_register_external" class="row align-items-center justify-content-center">
											<div class="fa-3x">
												<i class="fas fa-circle-notch fa-spin"></i> Procesando...
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<div class="form-group col-lg-12">
													<div class="form-group mb-3">
														<input type="hidden" id="cor_id" name="cor_id">
														<input type="hidden" id="codigo_Externa" name="codigo_Externa">
														<fieldset class="fieldset_Content_tema">
															<legend class="legend_tema">DEPENDENCIA</legend>

															<div class="form-group row ml-2 mr-2" id="div_select_nivel_1Externa">
																<select class="form-control" id="select_nivel_1Externa">
																	<option selected="selected">Seleccionar Dependencia</option>
																</select>
															</div>
															<div class="form-group row ml-2 mr-2" id="div_select_nivel_2Externa">
																<select class="form-control" id="select_nivel_2Externa">
																	<option selected="selected">Seleccionar Dependencia</option>
																</select>
															</div>
															<div class="form-group row ml-2 mr-2" id="div_select_nivel_3Externa">
																<select class="form-control" id="select_nivel_3Externa">
																	<option selected="selected">Seleccionar Dependencia</option>
																</select>
															</div>
														</fieldset>
														<fieldset class="fieldset_Content_tema">
															<legend class="legend_tema">&nbsp;RECEPCION</legend>
															<div class="form-group row ml-2 mr-2 msg_validar">
																<select class="form-control" id="list_usuarios" name="list_usuarios">
																</select>
															</div>
														</fieldset>
													</div>
													<fieldset class="fieldset_Content_tema">
														<legend class="legend_tema" style="width: 90px;">PROVEIDO</legend>
														<div class="form-group row">
															<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
															</div>
															<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
																<select class="form-control font-14" id="select_proveido" name="select_proveido">
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
																<textarea class="form-control form-control-sm " id="a_proveido" name="a_proveido" rows="2" placeholder="Ej: Para su Atencion" maxlength="201" required></textarea>
															</div>
														</div>
														<div class="form-group row">
															<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
																<label for="prev_observacion" class="col-form-label">Obs.:</label>
															</div>
															<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
																<textarea class="form-control form-control-sm " id="a_obs" name="a_obs" rows="2" placeholder="Describa alguna Observacion" maxlength="201"></textarea>
															</div>
														</div>
														<div class="form-group row">
															<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
																<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
															</div>
															<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
																<input type="number" value="1" class="form-control form-control-sm" id="Fecha_plazoExternoDIRECTA" name="Fecha_plazoExternoDIRECTA">
															</div>
														</div>
												</div>
												</fieldset>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" id="submitDeriveExternal" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar Hoja de Ruta
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
									<h5 class="modal-title ml-2"><b>Derivacion Multiple<b></h5>
									<div class="card-tools mr-2">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
								<form id="form_derivarHojaRutaMultiple" class="mb-0" method="post">
									<div class="modal-body font-13">
										<div id="load_derive_multiple" class="row align-items-center justify-content-center">
											<div class="fa-3x">
												<i class="fas fa-circle-notch fa-spin"></i> Procesando...
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<fieldset class="fieldset_Content_tema">
													<!-- <input type="hidden" id="cor_id_ForDerivar" name="cor_id_ForDerivar"> -->
													<legend class="legend_tema">&nbsp;HOJAS DE RUTA</legend>
													<div class="controls" id="etiquetas">
													</div>
												</fieldset>
												<fieldset class="fieldset_Content_tema">
													<input type="hidden" id="cor_id_Array" name="cor_id_Array">
													<input type="hidden" id="cor_id_ArrayCantidad" name="cor_id_ArrayCantidad">
													<legend class="legend_tema">&nbsp;RESPONSABLE</legend>
													<div class="form-group row ml-2 mr-2 msg_validar">
														<select id="usuInterno_idGestion" name="usuInterno_idGestion" class="form-control form-control-sm" required>
														</select>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" id="submitDeriveInternal" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar Hojas de Ruta
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- /.content-wrapper -->