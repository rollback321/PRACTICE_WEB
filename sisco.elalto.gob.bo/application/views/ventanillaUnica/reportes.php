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
									<form action="<?= site_url("PdfControl/ReportesVentanilla") ?>" method="POST" target="_blank">
										<fieldset class="scheduler-border">
											<legend class="scheduler-border">REPORTES</legend>
											<div class="row">
												<div class="col-md-10 offset-md-1">
													<div class="row">

														<div class="form-group col-md-6">
															<div class="form-group">
																<label for="mesDesdeRMV"><i class="fa fa-calendar"></i> DE FECHA Y HORA:</label>

																<div class="form-group row">
																	<div class="col-sm-8">
																		<input type="datetime-local" class="form-control form-control-sm" id="colFormLabelSm" name="fecha_inicio" placeholder="col-form-label-sm" required>
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group col-md-6">
															<div class="form-group">
																<label for="mesDesdeRMV"><i class="fa fa-calendar"></i> HASTA FECHA Y HORA:</label>
																<div class="form-group row">
																	<div class="col-sm-8">
																		<input type="datetime-local" class="form-control form-control-sm" id="colFormLabelSm" name="fecha_final" placeholder="col-form-label-sm" required>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<br>
													<div class='float-right'>
														<button type="submit" name="pdf" id="pdf" value="pdf" class="btn btn-success ">
															<i class="far fa-file-pdf"></i> Imprimir reporte PDF
														</button>
													</div>
												</div>
											</div>
										</fieldset>
									</form>
								</div>
							</section>
						</div>
						<!-- END PRIMER CONTENT -->
					</div>
				</div>
				<!-- END MENUS SUPERIOR-->

			</div>
		</div>
	</section>
</div>