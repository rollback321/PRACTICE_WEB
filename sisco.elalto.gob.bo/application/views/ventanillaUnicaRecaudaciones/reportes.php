<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">

		<!-- MENUS SUPERIOR-->
		<div class="col-12 col-sm-12">
			<div class="card card-primary card-tabs">
				<div class="card-header p-0 pt-1" style="background:#6c757d;">
					<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#ReporteHoras" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">REPORTES POR FECHAS</a>
						</li>
					</ul>
				</div>
				<!-- PRIMER CONTENT -->
				<div class="card-body">
					<div class="tab-content" id="custom-tabs-one-tabContent">
						<div class="active tab-pane" id="ReporteHoras">
							<section class="content">
								<div class="container-fluid">
									<form action="<?= site_url("PdfControl/ReportesVentanillaUnicaRecaudaciones") ?>" method="POST" target="_blank">
										<div class="row ">
											<div class="col-12">
												<div class="card p-2 mb-1">
													<div class="row  ">
														<div class="form-group col-md-3">
															<label class="m-0  font-weight-normal" for="ingresoProveedor">
																<img src="<?= base_url() ?>assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="margin-left: 7px;" width="18px">Dependencia</label>
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
															</div><br>
															<div class="form-group row ml-2 mr-2 msg_validar">
																<i class="fas fa-people-carry "></i><label class="m-0  font-weight-normal " for="nroDocumentoProveedor">Recepcionista</label>
																<select class="form-control" id="list_usuarios" name="list_usuarios">
																</select>
															</div>
														</div>
														<div class="form-group col-md-3 mb-1 ">
															<label for="mesDesdeRMV"><i class="fa fa-calendar"></i> DE FECHA Y HORA:</label>
															<div class="form-group row">
																<div class="col-sm-8">
																	<input type="datetime-local" class="form-control form-control-sm" id="colFormLabelSm" name="fecha_inicio" placeholder="col-form-label-sm" required>
																</div>
															</div>
															<label for="mesDesdeRMV"><i class="fa fa-calendar"></i> HASTA FECHA Y HORA:</label>
															<div class="form-group row">
																<div class="col-sm-8">
																	<input type="datetime-local" class="form-control form-control-sm" id="colFormLabelSm" name="fecha_final" placeholder="col-form-label-sm" required>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12">
												<div class="form-group"><br>
													<button type="submit" name="pdf" id="pdf" value="pdf" class="btn btn-success ">
														<i class="far fa-file-pdf"></i> Imprimir reporte PDF
													</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</section>
						</div>
						<!-- END PRIMER CONTENT -->
					</div>
				</div>
				<!-- END MENUS SUPERIOR-->



	</section>
</div>