<div class="modal fade" id="RechazarHojaRutaMultiple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Rechazo Multiple de Hojas de Ruta<b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_derive_rechazo_multiple" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_rechazarmultiple" class="mb-0" method="post">
				<div class="modal-body font-13">
					<div class="col-md-12">
						<div class="form-group">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">&nbsp;HOJAS DE RUTA</legend>
								<div class="controls" id="etiquetasRechazar">
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">&nbsp;MOTIVO</legend>
								<textarea class="form-control  text-uppercase" style=" border: 1px solid #8bc34a;box-shadow: 0 0 0 0.2rem rgba(139, 195, 74, .25);" id="TextRechazo" name="TextRechazo" rows="2" autofocus required></textarea>
							</fieldset>
							<input type="hidden" id="cor_id_ArrayRechazar" name="cor_id_ArrayRechazar">
							<input type="hidden" id="cor_id_ArrayCantidadRechazar" name="cor_id_ArrayCantidadRechazar">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submitRechazarMultiple" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Rechazar Hojas de Ruta</button>
				</div>
			</form>
		</div>
	</div>
</div>