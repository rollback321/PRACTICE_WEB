
<div class="modal fade" id="derivarHojaRutaInterna" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Derivacion Interna  <span title="3 New Messages" class="badge bg-success cod_GAMEA"></span><b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_derive_internal" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
			<form id="form_derivarHojaRutainterna" class="mb-0" method="post">
				<div class="modal-body">
					

					<div class="col-md-12 font-13">
						<div class="form-group">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">&nbsp;DEPENDENCIA</legend>
								<div class="form-group">
									<?= $this->session->userdata('nameDependency') ?>
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<input type="hidden" id="cor_id_interno" name="cor_id_interno">
								<input type="hidden" id="his_id_interno" name="his_id_interno">
								<input type="hidden" id="codigo_interno" name="codigo_interno">
								<legend class="legend_tema">&nbsp;MIS TECNICOS</legend>
								<div class="form-group row ml-2 mr-2 msg_validar">
									<select id="usuInterno_id" name="usuInterno_id" class="form-control form-control-sm" required>
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
											<select class="form-control" id="select_proveidoInternoBandeja">
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
											<textarea class="form-control form-control-sm" id="a_proveidoInternoBandeja" name="a_proveidoInternoBandeja" rows="2" placeholder="Descripcion del Documento" maxlength="201" required></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_observacion" class="col-form-label">Obs.:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
											<textarea class="form-control form-control-sm" id="a_obsInternoBandeja" name="a_obsInternoBandeja" rows="2" placeholder="Observación del Documento" maxlength="201"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 msg_validar">
											<input type="number" value="1" min="1" class="form-control form-control-sm" id="prevFecha_plazoInternoBandeja" name="prevFecha_plazoInternoBandeja" maxlength="11" required>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema" style="width: 90px;">ARCHIVOS</legend>
								<div class="form-group col-lg-12">
									<table id="TableDocDerivar" class="table table-sm table-hover table-bordered mb-2 font-13">
										<thead>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submitDeriveInternal" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar Hoja de Ruta
					</button>
				</div>
			</form>
		</div>
	</div>
</div>