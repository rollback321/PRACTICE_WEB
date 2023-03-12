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
				<div class="modal-body font-13">
					<div class="col-md-12">
						<div class="form-group">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">&nbsp;DEPENDENCIA</legend>
								<div class="form-group">
									<?= $this->session->userdata('nameDependency') ?>
								</div>
								<input type="hidden" id="cor_id_interno" name="cor_id_interno">
								<input type="hidden" id="codigo_interno" name="codigo_interno">

								<div class="form-group row ml-2 mr-2 msg_validar">
									<select id="usuInterno_id" name="usuInterno_id" class="form-control form-control-sm" required>
									</select>
								</div>
							</fieldset>

							<fieldset class="fieldset_Content_temar">
								<legend class="legend_tema">DESTINO</legend>

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputEmail4"><i class="fas fa-hotel"></i> DEPENDENCIA DESTINO</label>
										<textarea class="form-control form-control-sm text-uppercase" id="dependenciaDesDerivar" name="dependenciaDesDerivar" rows="2" style="border-radius: 9px;"></textarea>
									</div>
								</div>

							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">DATOS</legend>

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputEmail4"><i class="fas fa-file-invoice "></i> PROVEIDO</label>
										<textarea class="form-control form-control-sm " id="ViewDestinoProveidoDerivar" name="ViewDestinoProveidoDerivar" rows="2" style="border-radius: 9px;"></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputPassword4"><i class="fas fa-file-invoice "></i> OBSERVACION</label>
										<textarea class="form-control form-control-sm " id="ViewDestinoObservacionDerivar" name="ViewDestinoObservacionDerivar" rows="1" style="border-radius: 9px;"></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputPassword4"><i class="fas fa-calendar"></i> PLAZO(DIAS)</label>
										<textarea class="form-control form-control-sm " id="plazoViewDestinoDerivar" name="plazoViewDestinoDerivar" rows="1" style="border-radius: 9px;"></textarea>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submitDeriveInternalSMGI" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar Hoja de Ruta
					</button>
				</div>
			</form>
		</div>
	</div>
</div>