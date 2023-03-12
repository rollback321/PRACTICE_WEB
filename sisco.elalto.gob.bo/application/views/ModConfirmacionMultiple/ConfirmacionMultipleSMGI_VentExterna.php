<div class="modal fade" id="ConfirmarHojaRutaMultiple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Confirmacion Multiple de Hojas de Ruta<b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_derive_confirm_multiple" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_ConfirmarMultiple" class="mb-0" method="post">
				<div class="modal-body font-13">
					<div class="col-md-12">
						<div class="form-group">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">&nbsp;HOJAS DE RUTA</legend>
								<div class="controls" id="etiquetasConfirmar">
								</div>
							</fieldset>
							<input type="hidden" id="cor_id_ArrayConfirmar" name="cor_id_ArrayConfirmar">
							<input type="hidden" id="cor_id_ArrayCantidadConfirmar" name="cor_id_ArrayCantidadConfirmar">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submitConfirmarMultipleSMGI" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Aceptar Hojas de Ruta</button>
				</div>
			</form>
		</div>
	</div>
</div>