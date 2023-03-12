<div class="content-wrapper">
	<section class="content" style="padding-top: 10px;">
		<div class="col-12 col-sm-12">
			<div class="card card-secondary card-tabs">
				<div class="card-header p-0 pt-1">
					<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#SearchSimple" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Busqueda Rápida</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#timeline" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Busqueda Avanzada</a>
						</li>
					</ul>
				</div>
				<div class="card-body p-2">
					<div class="tab-content" id="custom-tabs-one-tabContent">
						<!-- PRIMER CONTENT -->
						<div class="tab-pane fade show active" id="SearchSimple" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
							<section class="content">
								<div class="container-fluid">
									<h2 class="text-center display-8" id="tituloprincipal"><b>BUSQUEDA DE HOJA DE RUTA</b></h2><br>
									<!-- <h3 class="text-center display-8" id="titulosegundario"><b>(SI.S.CO.)</b></h3> -->
									<div class="row" id="primercontenedor">
										<div class="col-md-12 offset-md-2" style="max-width: 100%;">
											<form id="form_Buscar" method="post">
												<div class="input-group input-group-sm">
													<div class="input-group-prepend">
														<span class="input-group-text">GAMEA</span>
													</div>
													<input type="number" class="form-control" style="max-width: 30%;" minlength="1" maxlength="10" placeholder="Ej:15" title="Ingrese Primero #hoja de Ruta(237)" id="codCorres" name="codCorres" autofocus="autofocus" required>
													<select class="custom-select form-control-sm fuente" id="gestion" name="gestion" style="max-width: 15%; height: auto;   margin-left: 1px; padding: 1px;  text-align: center;" aria-invalid="false">
														<option value="2021">2021</option>
														<option value="2022" selected="selected">2022</option>
														<option value="2023">2023</option>
														<option value="2024">2024</option>
														<option value="2024">2025</option>
													</select>
													<span class="input-group-append">
														<button type="submit" class="btn btn-info btn-flat" id="search"> <i class="fas fa-search"></i> Buscar</button>
													</span>
												</div>
											</form>
										</div>
									</div>
									<div class="col-md-8 container-fluid font-13" id="titulo">
										<h4 class="text-center display-8">DATOS ENCONTRADOS</h4>
									</div>
									<div class="row" id="divSearch"></div>


									<div class="row" id="segundocontenedor">
										<div class="container-fluid">
											<div id="append"></div>
										</div>
									</div>



								</div>
							</section>

						</div>
						<!-- END PRIMER CONTENT -->
						<!-- SEGUNDO CONTENT -->
						<div class="tab-pane fade show" id="timeline" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
							<section class="content">
								<div class="container-fluid">
									<h2 class="text-center"><b>BUSQUEDA AVANZADA</b></h2>

									<form id="form_SearchAvanzada" class="mb-0 font-13" method="post">

										<!-- <fieldset class="scheduler-border" style="background:#bbcdd2 ">
											<legend class="scheduler-border">POR DOCUMENTO</legend> -->
										<div class="form-row">
											<div class="form-group col-md-3">
												<label for="inputEmail4"><i class="fas fa-file-invoice "></i> CODIGO DE HOJA DE RUTA</label>

												<div class="input-group input-group-sm">
													<div class="input-group-prepend">
														<span class="input-group-text" style="line-height: 1.7;">GAMEA</span>
													</div>
													<input type="number" class="form-control" minlength="1" maxlength="10" placeholder="Ej:15" title="Ingrese Primero #hoja de Ruta(237)" id="SearchCodigo" name="SearchCodigo" style="    height: calc(2.125rem + 2px);" autofocus="autofocus">
													<select class="custom-select form-control-sm fuente" id="gestionAvanzada" name="gestionAvanzada" style=" height: auto;   margin-left: 1px; padding: 1px;  text-align: center;    height: calc(2.125rem + 2px);" aria-invalid="false">
														<option value="2021">2021</option>
														<option value="2022"selected="selected">2022</option>
														<option value="2023">2023</option>
														<option value="2024">2024</option>
														<option value="2024">2025</option>
													</select>

												</div>
											</div>
											<div class="form-group col-md-3">
												<label><i class="fa fa-calendar-alt"></i> FECHA INICIAL:</label>
												<div class="input-group date" id="reservationdate" data-target-input="nearest">
													<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="finicial" name="finicial" />
													<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
														<div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
													</div>
												</div>
											</div>
											<div class="form-group col-md-3">
												<label><i class="fa fa-calendar-alt"></i> FECHA FINAL:</label>
												<div class="input-group date" id="reservationdate2" data-target-input="nearest">
													<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" id="ffinal" name="ffinal" />
													<div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
														<div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
													</div>
												</div>
											</div>
											<div class="form-group col-md-3">
												<label for="inputPassword4"><i class="fas fa-file-invoice "></i> REFERENCIA</label>
												<input type="text" class="form-control" id="SearchRef" name="SearchRef" placeholder="EJ: Socititud De Equipos de Computacion">
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-3">
												<label for="inputEmail4"><i class="fas fa-user"></i> NOMBRE REMITENTE</label>
												<input type="text" class="form-control" id="SearchNomRem" name="SearchNomRem" placeholder="Ej: Juan Quispe">
											</div>
											<div class="form-group col-md-3">
												<label for="inputPassword4"><i class="fas fa-address-book"></i> CARGO DEL REMITENTE</label>
												<input type="text" class="form-control" id="SearchCargoRem" name="SearchCargoRem" placeholder="Ej: Responsable Distrital, Gerente Gral, Presidente de la Urb Bautista Saavedra">
											</div>
											<div class="form-group col-md-3">
												<label for="inputEmail4"><i class="fas fa-hotel"></i> INSTITUCION REMITENTE</label>
												<input type="text" class="form-control" id="SearchInsRem" name="SearchInsRem" placeholder="EJ: empresa De La Paz, Junta 12 de Octubre, etc">
											</div>
											<div class="form-group col-md-3">
												<label for="inputPassword4"><i class="fas fa-phone-alt"></i> CELULAR REMITENTE</label>
												<input type="text" class="form-control" id="SearchCelRem" name="SearchCelRem" placeholder="Ej. 78394344">
											</div>
										</div>

										<!-- </fieldset>
								 -->

										<div class="modal-footer mt-2">
											<button type="button" class="btn btn-sm btn-info" id="ImpReporte"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Reporte</button>
											<button type="button" class="btn btn-sm btn-danger" id="LimpiarSearchAvanzada" onclick="limpiarInputsAll()"><i class="fas fa-eraser"></i> Limpiar</button>
											<button type="submit" id="enviarSearchAvanzada" class="btn btn-sm btn-primary" onclick="limpiarTable()"><i class="fas fa-search"></i> Buscar</button>
										</div>
									</form>


								</div>
							</section>
							<div id="divSearchTable" style="display:none;">
								<table id="example5" class="table table-sm table-hover table-bordered font-13">
									<thead class="table-dark">

									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
						<!-- END SEGUNDO CONTENT -->
					</div>
				</div>
			</div>
			<!-- /.card -->
		</div>

		<!-- /.---------MODALES--------- -->




		<div class="modal fade" id="viewDatos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title ml-2"><b>Detalles <span id="viewEyeRouteTitle" title="3 New Messages" class="badge bg-success cod_GAMEA"></span></b></h5>
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
								<fieldset class="fieldset_Content_tema font-13">

									<!-- Horizontal Form -->
									<div class="form-group col-lg-12">
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">CITE.:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<textarea class="form-control form-control-sm" id="cite" rows="2" disabled></textarea>
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
												<label for="prev_observacion" class="col-form-label">Documentos</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
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



		<div class="modal fade" id="Modal_ViewHistorial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="max-width: 1000px;height: auto;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title ml-2"><b>Historial de la Hoja de Ruta <span title="3 New Messages" class="badge bg-success Codigo"></span><b></h5>
						<div class="card-tools mr-2">
							</span>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<div class="modal-body" style="overflow-x:auto;">
						<div id="load_ViewHistorial" class="row align-items-center justify-content-center">
							<div class="fa-3x">
								<i class="fas fa-circle-notch fa-spin"></i> Procesando...
							</div>
						</div>
						<div class="card-body table-responsive p-0">
							<div class="form-group" id="DivButtonReportHistory"><br>
							</div>
							<table id="TableHistorial" class="table table-striped table-valign-middle" style="font-size:12px;">
								<thead>
									<tr>
										<th style="width:2%; text-align:center;">NRO</th>
										<th style="width:25%; text-align:center;">REMITENTE</th>
										<th style="width:10%; text-align:center;">FECHA<BR>DERIVACION</th>
										<th style="width:25%;text-align:center;">DESTINATARIO </th>
										<th style="width:10%;text-align:center;">FECHA<BR>RECEPCION</th>
										<th style="width:15%;text-align:center;">PROVEIDO<BR>REMITENTE</th>
										<th style="width:15%;text-align:center;">OBSERVACION<BR>REMITENTE</th>
										<th style="width:15%;text-align:center;">RECHAZO<BR>REMITENTE</th>

									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
		</div>


		<div class="modal fade" id="Modal_ViewDataConcluido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="width:auto;height: auto;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title ml-2"><b>Datos sobre la Conclusion de Hoja de Ruta <span title="3 New Messages" class="badge bg-success CodigoConclusion"></span><b></h5>
						<div class="card-tools mr-2">
							</span>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>

					<div class="modal-body" style="overflow-x:auto;">
						<div id="load_ViewDataConclusion" class="row align-items-center justify-content-center">
							<div class="fa-3x">
								<i class="fas fa-circle-notch fa-spin"></i> Procesando...
							</div>
						</div>
						<div class="card-body table-responsive p-0">
							<div class="form-group">
								<fieldset class="fieldset_Content_tema font-13">
									<div class="form-group col-lg-12">
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">Motivo de Conlusion</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10" style="border:1px solid black;border-radius: 5px;">
												<span name="ConclusionMotivo" id="ConclusionMotivo"></span>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">Conluido por:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10" style="border:1px solid black;border-radius: 5px;">
												<span name="ConclusionServidor" id="ConclusionServidor"></span>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">Dependencia:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10" style="border:1px solid black;border-radius: 5px;">
												<span name="ConclusionDependencia" id="ConclusionDependencia"></span>
											</div>
										</div>

										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_observacion" class="col-form-label">Fecha de Conclusion:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10" style="border:1px solid black;border-radius: 5px;">
												<span name="ConclusionFecha" id="ConclusionFecha"></span>
											</div>
										</div>
									</div>
								</fieldset>
							</div>






						</div>
					</div>

				</div>
			</div>
		</div>


</div>