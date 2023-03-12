
<div class="modal fade" id="derivarHojaRutaExterna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Derivacion Externa  <span title="3 New Messages" class="badge bg-success cod_GAMEA"></span></b></h5>
				<div class="card-tools mr-2">
					</span>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div class="modal-body secretary">
				<div id="load_register_external" class="row align-items-center justify-content-center">
					<div class="fa-3x">
						<i class="fas fa-circle-notch fa-spin"></i> Procesando...
					</div>
				</div>
				<form id="form_derivarHojaRutaExterna" class="mb-0" method="post">
					<div class="col-md-12 font-13">
						<div class="card card-default mb-2 mt-2">
							<div class="card-body p-2">
								<div class="bs-stepper">
									<div class="bs-stepper-header" role="tablist" style="background: #ceecc6;">
										<div class="step" data-target="#dependencia-part">
											<button type="button" class="step-trigger font-10" style="padding:0;margin: 0px" role="tab" aria-controls="dependencia-part" id="dependencia-part-trigger">
												<span class="bs-stepper-circle">1</span>
												<span class="bs-stepper-label">ELEGIR<br>DEPENDENCIA</span>
											</button>
										</div>
										<div class="line"></div>
										<div class="step" data-target="#preveido-part">
											<button type="button" class="step-trigger font-10" style="padding:0;margin: 0px;" role="tab" aria-controls="preveido-part" id="preveido-part-trigger">
												<span class="bs-stepper-circle">2</span>
												<span class="bs-stepper-label">DATOS<br>PROVEIDO</span>
											</button>
										</div>
										<div class="line"></div>
										<div class="step" data-target="#resumen-part">
											<button type="button" class="step-trigger font-10" style="padding:0;margin: 0px;" role="tab" aria-controls="resumen-part" id="resumen-part-trigger">
												<span class="bs-stepper-circle">3</span>
												<span class="bs-stepper-label">ARCHIVOS</span>
											</button>
										</div>
									</div>
									<div class="bs-stepper-content pb-0">
										<div id="dependencia-part" class="content" role="tabpanel" aria-labelledby="dependencia-part-trigger">
											<div class="form-group mb-3">
												<input type="hidden" id="cor_id" name="cor_id">
												<fieldset class="fieldset_Content_tema">
													<legend class="legend_tema">DEPENDENCIA</legend>

													<div class="form-group row ml-2 mr-2" id="div_select_nivel_1">
														<select class="form-control" id="select_nivel_1">
															<option selected="selected">Seleccionar Dependencia</option>
														</select>
													</div>
													<div class="form-group row ml-2 mr-2" id="div_select_nivel_2">
														<select class="form-control" id="select_nivel_2">
															<option selected="selected">Seleccionar Dependencia</option>
														</select>
													</div>
													<div class="form-group row ml-2 mr-2" id="div_select_nivel_3">
														<select class="form-control" id="select_nivel_3">
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

											<button type="button" class="btn btn-sm btn-primary float-right validar_stepper_1">
												Siguiente <i class="fas fa-chevron-right"></i>
											</button>
										</div>

										<div id="preveido-part" class="content" role="tabpanel" aria-labelledby="preveido-part-trigger">
											<div class="form-group mb-3">
												<fieldset class="fieldset_Content_tema">
													<legend class="legend_tema" style="width: 90px;">PROVEIDO</legend>
													<div class="form-group col-lg-12">
														<div class="form-group row">
															<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">

															</div>
															<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
																<select class="form-control" id="select_proveido">
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
																<textarea class="form-control form-control-sm " id="a_obs" name="a_obs" rows="2" placeholder="Existe alguna Observacion?" maxlength="201"></textarea>
															</div>
														</div>
														<div class="form-group row">
															<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
																<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
															</div>
															<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
																<input type="number" value="1" min="1" class="form-control form-control-sm" id="prevFecha_plazo" name="prevFecha_plazo">
															</div>
														</div>
													</div>
												</fieldset>
											</div>

											<button type="button" class="btn btn-sm btn-danger" onclick="stepper.previous()"><i class="fas fa-chevron-left"></i> Atras
											</button>
											<button type="button" class="btn btn-sm btn-primary float-right validar_stepper_2">
												Siguiente <i class="fas fa-chevron-right"></i>
											</button>
										</div>

										<div id="resumen-part" class="content" role="tabpanel" aria-labelledby="resumen-part-trigger">
											<div class="form-group mb-3">
												<fieldset class="fieldset_Content_tema">
													<legend class="legend_tema">ARCHIVOS SUBIDOS</legend>
													<table id="TableDocDerivar" class="table table-sm table-hover table-bordered font-13">
														<thead>
														</thead>
														<tbody>
														</tbody>
													</table>

												</fieldset>
											</div>
											<button type="button" class="btn btn-sm btn-danger" onclick="stepper.previous()"><i class="fas fa-chevron-left"></i> Atras
											</button>
											<button id="submitDeriveExternal" type="submit" class="btn btn-sm btn-success float-right"> <i class="fas fa-check-circle"></i> Derivar Hoja de Ruta
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>