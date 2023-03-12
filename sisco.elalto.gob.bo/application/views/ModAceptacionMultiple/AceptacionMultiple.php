

<div class="modal fade" id="AceptarHojaRutaMultiple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Aceptacion Multiple de Hojas de Ruta<b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
      <div id="load_derive_acept_multiple" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
			<form id="form_aceptarmultiple" class="mb-0" method="post">
				<div class="modal-body font-13">
					<div class="col-md-12">
						<div class="form-group">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">&nbsp;HOJAS DE RUTA</legend>
								<div class="controls" id="etiquetasAceptar">
								</div>
							</fieldset>
							<input type="hidden" id="cor_id_ArrayAceptar" name="cor_id_ArrayAceptar">
							<input type="hidden" id="cor_id_ArrayCantidadAceptar" name="cor_id_ArrayCantidadAceptar">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submitAceptarMultiple" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Aceptar Hojas de Ruta</button>
				</div>
			</form>
		</div>
	</div>
</div>