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
												<a class="nav-link active" href="#activity" id="TabHojaInicio" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/noticias.svg" class="mb-1 " alt="proceso" style="margin-right: 3px;" width="15px"> Registrar Correspondencia</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#timeline" id="TabHojaProceso" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/ajustes.svg" class="mb-1 " alt="proceso" style="margin-right: 3px;" width="18px">Hojas de Ruta En Proceso</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#settings" id="TabHojaSalida" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/carpeta.svg" class="mb-1 " alt="concluido" style="margin-right: 3px;" width="18px">Hojas de Ruta Concluidas</a>
											</li>
										</ul>
									</div>
									<!-- /.card-header -->
									<div class="card-body">
										<div class="tab-content">
											<div class="active tab-pane" id="activity">
												<div class="container-fluid">
													<div class="row">
														<div class="col-12">
															<div class="card card card-primary">
																<!-- /.card-header -->

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
																	<table id="example1" class="table table-hover table-striped" style="font-size: 12px;">
																		<thead >
																			<tr>
																				<!-- <th></th> -->
																				<th>ACCIONES</th>
																				<th>CODIGO</th>
																				<th>PROCEDENCIA</th>
																				<th>DESTINO</th>
																				<th>REFERENCIA</th>
																				<th>DESCRIPCION</th>
																				<th>NOMBRE <br>REMITENTE</th>
																				<th>FECHA DE <br>RECEPCION</th>
																				<th>MAS DETALLES</th>
																			</tr>
																		</thead>
																		<tbody >
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /.tab-pane -->
											<div class="tab-pane" id="timeline">
												<div class="container-fluid">
													<div class="row">
														<div class="col-12">
															<div class="card">
																<div class="card-body" style="width: auto;overflow-x: auto;">
																	<table id="example2" class="table table-sm table-hover table-bordered" style="font-size: 11px;">
																		<thead >
																			<tr>
																				<th>ACCIONES</th>
																				<th>CODIGO</th>
																				<th>DESTINO</th>
																				<th>REFERENCIA</th>
																				<th>DESCRIPCION</th>
																				<th>NOMBRE REMITENTE</th>
																				<th>INSTITUCION <br> REMITENTE</th>
																				<th>FECHA DE RECEPCION</th>
																				<th>MAS DETALLES</th>
																			</tr>
																		</thead>
																		<tbody >
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /.tab-pane -->

											<div class="tab-pane" id="settings">
												<div class="container-fluid">
													<div class="row">
														<div class="col-12">
															<div class="card">
																<div class="card-body" style="width: auto;overflow-x: auto;">
																	<table id="example3" class="table table-sm table-hover table-bordered" style="font-size: 11px;">
																		<thead >
																			<tr>
																				<th>ACCIONES</th>
																				<th>CODIGO</th>
																				<th>REFERENCIA</th>
																				<th>DESCRIPCION</th>
																				<th>NOMBRE REMITENTE</th>
																				<th>INSTITUCION</th>
																				<th>FECHA DE RECEPCION</th>
																				<th>MAS DETALLES</th>
																			</tr>
																		</thead>
																		<tbody >
																		</tbody>
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
				</section>
			</div>
			<!-- /.content-wrapper -->