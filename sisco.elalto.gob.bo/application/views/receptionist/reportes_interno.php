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
									<!-- <form id="Form_ReportesSecretary" method="POST" > -->
									<form id="Form_ReportesSecretary" action="<?= site_url("PdfControl/Reportes_Iframe_Secretary") ?>" method="POST" target="iframeReport">
										<div class="row ">
											<div class="col-12">
												<div class="card p-2 mb-1">
													<div class="row  ">

														<div class="form-group col-md-2">
															<fieldset class="fieldset_Content_tema">
																<legend class="legend_tema">Hojas de Ruta:</legend>
																<label for="inputEmail4"></label>
																<div class="form-check">
																	<input class="form-check-input" type="radio" name="criterioCheck" value="1" checked>
																	<label class="form-check-label" for="flexRadioDefault2">
																		Recibidos
																	</label>
																</div>
																<div class="form-check">
																	<input class="form-check-input" type="radio" name="criterioCheck" value="0">
																	<label class="form-check-label" for="flexRadioDefault1">
																		Derivados
																	</label>
																</div>
														</div>
														</fieldset>

														<div class="form-group col-md-3">
															<fieldset class="fieldset_Content_tema">
																<legend class="legend_tema">Seleccione:</legend>
																<label class="m-0  font-weight-normal" for="ingresoProveedor">
																    <div class="form-group row ml-2 mr-2 msg_validar">
																	<i class="fas fa-people-carry "></i><label class="m-0  font-weight-normal " for="nroDocumentoProveedor"> Funcionario</label>
																	<select class="form-control" id="list_usuariosDIRECTA" name="list_usuariosDIRECTA" onclick="validarInput()" required>
																	</select>
																</div><br>
														</div>
														</fieldset>
														<div class="form-group col-md-3 mb-1 ">
															<fieldset class="fieldset_Content_tema">
																<legend class="legend_tema">Determine:</legend>
																<label for="mesDesdeRMV"><i class="fa fa-calendar"></i> DE FECHA Y HORA:</label>
																<div class="form-group row">
																	<div class="col-sm-10">
																		<input type="datetime-local" class="form-control form-control-sm" id="fecha_inicio" name="fecha_inicio" placeholder="col-form-label-sm"  required>
																	</div>
																</div>
																<label for="mesDesdeRMV"><i class="fa fa-calendar"></i> HASTA FECHA Y HORA:</label>
																<div class="form-group row">
																	<div class="col-sm-10">
																		<input type="datetime-local" class="form-control form-control-sm" id="fecha_final" name="fecha_final" placeholder="col-form-label-sm"  required>
																	</div>
																</div><br>
														</div>
														</fieldset>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group"><br>
													<button type="submit" class="btn btn-sm btn-info" id="pdfReport" name="pdfReport" onclick="VerPDF()"><i class="fa fa-print" ></i> Imprimir Reporte</button>
													<button type="Button" class="btn btn-sm btn-danger"  onclick="limpiarInputsConsulta()"><i class="fas fa-eraser"></i> Limpiar</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</section>

							<section class="content">
								<div class="container-fluid">
									<div class="row ">
										<div class="col-12">
											<iframe src="" id="iframeReport" name="iframeReport" width="100%" height="1200px"></iframe>
											<!-- <div id='resultados'></div> -->
										</div>
									</div>
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