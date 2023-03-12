
		<div class="modal fade" id="modal_ConcluirHoja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Concluir Hoja de Ruta <span title="3 New Messages" class="badge bg-success cod_GAMEAConcluir"></span></b></h5>
						<div class="card-tools mr-2">
							</span>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div id="load_concluir_hoja" class="row align-items-center justify-content-center">
								<div class="fa-3x">
									<i class="fas fa-circle-notch fa-spin"></i> Procesando...
								</div>
							</div>
					<form id="form_concluir_hoja" class="mb-0" method="post">
						<div class="modal-body">
							
							<input type="hidden" id="cor_id" name="cor_id" value="" >
							<input type="hidden" id="his_id" name="his_id" value="" >
							<input type="hidden" id="pend_id" name="pend_id" value="" >
							<input type="hidden" id="origen" name="origen" value="" >
							<input type="hidden" id="nro_copia" name="nro_copia" value="" >
							<input type="hidden" id="codigo" name="codigo" value="" >
							<input type="hidden" id="cor_estado" name="cor_estado" value="" >
							<div class="col-md-12 font-13">
								<div class="form-group">
									<fieldset class="fieldset_Content_tema" >
										<legend class="legend_tema">Datos&nbsp;</legend>
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="inputPassword4"> <i class="fas fa-key"></i>  Motivo para la Conclusion de la Hoja de Ruta</label>
												<textarea type="text" class="form-control form-control-sm text-uppercase" id="TextMotivoConclusion" name="TextMotivoConclusion" placeholder="Motivo de la Conclusion de las hojas de Ruta" style="border-radius: 9px;" required ></textarea>
											</div>
						
										</div>
									</fieldset>
									<div class="modal-footer">
										<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
										<button type="submit" class="btn btn-sm btn-primary float-right" id="ButtonConcluirHoja"><i class="fas fa-check"></i> Concluir </button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
