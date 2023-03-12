<div class="modal fade" id="derivarHojaRutaMultiple" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Derivacion Multiple<b></h5>
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
			<form id="form_derivarHojaRutaMultiple" class="mb-0" method="post">
				<div class="modal-body font-13">
					<div class="col-md-12">
						<div class="form-group">
							<fieldset class="fieldset_Content_tema">
								<!-- <input type="hidden" id="cor_id_ForDerivar" name="cor_id_ForDerivar"> -->
								<legend class="legend_tema">&nbsp;HOJAS DE RUTA</legend>
								<div class="controls" id="etiquetas">
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<input type="hidden" id="cor_id_Array" name="cor_id_Array">
								<input type="hidden" id="cor_id_ArrayCantidad" name="cor_id_ArrayCantidad">
								<legend class="legend_tema">&nbsp;RESPONSABLE</legend>
								<div class="form-group row ml-2 mr-2 msg_validar">
									<select id="usuInterno_idGestion" name="usuInterno_idGestion" class="form-control form-control-sm" required>
									</select>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submitDeriveMultiple" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Derivar Hojas de Ruta
					</button>
				</div>
			</form>
		</div>
	</div>
</div>