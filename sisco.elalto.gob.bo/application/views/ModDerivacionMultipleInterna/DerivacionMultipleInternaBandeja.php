
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
			<div id="load_derive_multiple" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
			<form id="form_derivarHojaRutaMultipleInterna" class="mb-0" method="post">
				<div class="modal-body font-13">
					<div class="col-md-12">
						<div class="form-group">
							<fieldset class="fieldset_Content_tema">
								<!-- <input type="hidden" id="cor_id_ForDerivar" name="cor_id_ForDerivar"> -->
								<legend class="legend_tema">&nbsp;HOJAS DE RUTA</legend>
								<div class="controls" id="etiquetasDerIntena">
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<input type="hidden" id="cor_id_Array" name="cor_id_Array">
								<input type="hidden" id="cor_id_ArrayCantidad" name="cor_id_ArrayCantidad">
								<input type="hidden" id="his_idArray" name="his_idArray">
								<legend class="legend_tema">&nbsp;RESPONSABLE</legend>
								<div class="form-group row ml-2 mr-2 msg_validar">
									<select id="usuInterno_idResponsable" name="usuInterno_idResponsable" class="form-control form-control-sm" required>
									</select>
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema" style="width: 90px;">PROVEIDO</legend>
								<div class="form-group col-lg-12">
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
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
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
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