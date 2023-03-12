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
									<a class="nav-link active" href="#activity"  id="TabHojaInicio" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/noticias.svg" class="mb-1 " alt="proceso" style="margin-right: 3px;" width="15px"> Nuevas Hojas de Ruta</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#timeline" id="TabHojaProceso"  data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/ajustes.svg" class="mb-1 " alt="proceso" style="margin-right: 3px;" width="18px">Mis Hojas de Ruta En Proceso</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#settings" id="TabHojaSalida" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/carpeta.svg" class="mb-1 " alt="concluido" style="margin-right: 3px;" width="18px">Mis Hojas de Ruta Concluidas</a>
								</li>
							</ul>
						</div>

						<div class="card-body p-2">
							<div class="tab-content">
								<div class="active tab-pane" id="activity">
									<div class="container-fluid">
										<div class="row">
											<div class="col-md-12">
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
																</div>
															</div>
														</div>
													</div>
													<div class="card-body p-2 table-responsive mailbox-messages" style="width: auto;overflow-x: auto;">
														<table id="example1" class="table table-sm table-hover table-bordered font-12">
															<thead>
																<tr>
																	<th></th>
																	<th>ACCIONES</th>
																	<th>CODIGO</th>
																	<th>ESTADO<br>HOJA RUTA</th>
																	<th>TIPO<br>CORRESPONDENCIA</th>
																	<th>ARCHIVOS</th>
																	<th>REFERENCIA</th>
																	<th>DESCRIPCION</th>
																	<th>CATEGORIA</th>
																	<th>MAS DETALLES</th>
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
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane" id="timeline">
									<div class="container-fluid">
										<div class="row">
											<div class="col-12">
												<div class="card" style="margin-bottom: 6px;">
													<div class="card-body p-2 table-responsive" style="width: auto;overflow-x: auto;">
														<table id="example2" class="table  table-sm table-hover table-striped  table-bordered font-12 ">
															<thead>
																<tr>
																	<th>ACCIONES</th>
																	<th>CODIGO</th>
																	<th>ESTADO<br>HOJA RUTA</th>
																	<th>TIPO<br>CORRESP.</th>
																	<th>REFERENCIA</th>
																	<th>DESCRIPCION</th>
																	<th>CATEGORIA</th>
																	<th>HISTORIAL</th>
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
								<!-- /.tab-pane -->
								<div class="tab-pane" id="settings">
									<div class="container-fluid">
										<div class="row">
											<div class="col-12">
												<div class="card" style="margin-bottom: 6px;">
													<div class="card-body p-2 table-responsive" style="width: auto;overflow-x: auto;">
														<table id="example3" class="table table-sm table-hover table-bordered font-12 ">
															<thead>
																<tr>
																	<th>ACCIONES</th>
																	<th>CODIGO</th>
																	<th>ESTADO<br>HOJA RUTA</th>
																	<th>TIPO<br>CORRESP.</th>
																	<th>REFERENCIA</th>
																	<th>DESCRIPCION</th>
																	<th>CATEGORIA</th>
																	<th>HISTORIAL</th>
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
								<!-- /.tab-pane -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- /.---------MODALES--------- -->


<!-- /.content-wrapper -->