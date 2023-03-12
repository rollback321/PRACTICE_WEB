<div class="modal fade" id="derivarHojaRutaExternaDirecta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			<div id="load_register_external_directa" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_derivarHojaRutaExternaDirecta" class="mb-0" method="post">
				<div class="modal-body font-13">
					<div class="col-md-12">
						<div class="form-group">
							<div class="form-group col-lg-12">
								<div class="form-group mb-3">
									<input type="hidden" id="cor_id_ExternaDirecta" name="cor_id_ExternaDirecta">
									<input type="hidden" id="his_id_ExternaDirecta" name="his_id_ExternaDirecta">
									<input type="hidden" id="codigo_ExternaDirecta" name="codigo_ExternaDirecta">
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">DEPENDENCIA</legend>

										<div class="form-group row ml-2 mr-2" id="div_select_nivel_1DIRECTA">
											<select class="form-control" id="select_nivel_1DIRECTA">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_2DIRECTA">
											<select class="form-control" id="select_nivel_2DIRECTA">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_3DIRECTA">
											<select class="form-control" id="select_nivel_3DIRECTA">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
									</fieldset>
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">&nbsp;RECEPCION</legend>
										<div class="form-group row ml-2 mr-2 msg_validar">
											<select class="form-control" id="list_usuariosDIRECTA" name="list_usuariosDIRECTA">
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
											<select class="form-control font-14" id="select_proveidoExternoDIRECTA" name="select_proveidoExternoDIRECTA">
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
											<textarea class="form-control form-control-sm " id="a_provExternoDIRECTA" name="a_provExternoDIRECTA" rows="2" placeholder="Ej: Para su Atencion" maxlength="201" required></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_observacion" class="col-form-label">Motivo:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
											<textarea class="form-control form-control-sm " id="a_obsExternoDIRECTA" name="a_obsExternoDIRECTA" rows="2" placeholder="Explique el motivo de la Derivacion Directa" maxlength="201"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
											<input type="number" value="1" min="1" class="form-control form-control-sm" id="Fecha_plazoExternoDIRECTA" name="Fecha_plazoExternoDIRECTA">
										</div>
									</div>
							</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submitDeriveExternalDirecta" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar Hojas de Ruta
					</button>
				</div>
			</form>
		</div>
	</div>
</div>