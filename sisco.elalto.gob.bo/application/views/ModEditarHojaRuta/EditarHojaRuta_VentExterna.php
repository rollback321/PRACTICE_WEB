<div class="modal fade" id="editarHojaRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>Editar Hoja de Ruta <b><span title="3 New Messages" class="badge bg-success cod_GAMEA"></span></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="load_register_editar" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_editarHoja" method="post">
				<input type="hidden" id="varcor_id" name="varcor_id">
				<input type="hidden" id="varrec_doc_id" name="varrec_doc_id">
				<div id="modalCuerpo" class="modal-body" style="height: auto;width: auto;">
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">DOCUMENTO</legend>
						<div class="form-row">

							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-file-invoice "></i> REFERENCIA</label>
								<textarea class="form-control form-control-sm text-uppercase" id="ref_edit" name="ref_edit" rows="2" style="border-radius: 9px;" placeholder="REF. Documento" required></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-eye-dropper "></i> DESCRIPCION</label>
								<textarea class="form-control text-uppercase" id="descrip_doc_edit" name="descrip_doc_edit" rows="2" style="border-radius: 9px;" placeholder="Descripcion del Documento"></textarea>
							</div>
						</div>
						<div class="form-row">

							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-eye-dropper "></i>OBSERVACION</label>
								<textarea class="form-control text-uppercase" id="obs_doc_edit" name="obs_doc_edit" rows="2" style="border-radius: 9px;" placeholder="Observacion del Documento"></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-file-invoice "></i> CITE</label>
								<input type="text" class="form-control text-uppercase" id="cite_edit" name="cite_edit" style="border-radius: 9px;" placeholder="CITE Documento">
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">REMITENTE DOC.</legend>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-user"></i> NOMBRE DEL REMITENTE</label>
								<input type="text" class="form-control text-uppercase" id="nombre_remitente_edit" style="border-radius: 9px;" name="nombre_remitente_edit" placeholder="Nombre del Remitente" required>
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-address-book"></i> CARGO DEL REMITENTE</label>
								<input type="text" class="form-control text-uppercase" id="cargo_remitente_edit" name="cargo_remitente_edit" style="border-radius: 9px;" placeholder="Ej: Responsable Distrital, Gerente Gral, Presidente de la Urb Bautista Saavedra">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-hotel"></i> INSTITUCION DEL REMITENTE</label>
								<input type="text" class="form-control text-uppercase" id="institucion_remitente_edit" name="institucion_remitente_edit" style="border-radius: 9px;" placeholder="EJ: empresa De La Paz, Junta 12 de Octubre, etc">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-phone-alt"></i> NRO DE CONTACTO</label>
								<input type="number" class="form-control form-control-sm" id="nro_contacto_edit" name="nro_contacto_edit" style="border-radius: 9px;" onKeyPress="if(this.value.length==8) return false;" placeholder="Nro. de Contacto">
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">RECEPCION DOC.</legend>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-form-label col-form-label-sm" style="margin-left: 0.5rem;">Fecha de Recepcion</label>
							<div class="form-group col-md-3">
								<input type="datetime-local" class="form-control form-control-sm" id="colFormLabelSmFecha_edit" name="fecha_recep_edit" placeholder="col-form-label-sm" required>
							</div>
							<label for="colFormLabelSm" class="col-form-label col-form-label-sm" style="margin-left: 2rem;">Plazo(Dias):</label>
							<div class="form-group col-md-2">
								<input type="number" value="3" class="form-control form-control-sm" id="Fecha_plazoCorrespondencia_Edit" name="Fecha_plazoCorrespondencia_Edit">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" checked name="nro_fojas_edit" id="nro_fojas_edit" value="1">
									<label class="form-check-label" for="gridCheck">
										Nro. Fojas<br>
										<input class="form-check-input" style="width:90%;" id="nro_cant_fojas_edit" name="nro_cant_fojas_edit" type="number" placeholder="CANTIDAD"><br>
									</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="nro_cd_dvd_edit" id="nro_cd_dvd_edit" value="1">
									<label class="form-check-label" for="gridCheck">
										CD/DVD<br>
										<input class="form-check-input" style="width:90%;" id="nro_cant_cd_dvd_edit" name="nro_cant_cd_dvd_edit" type="number" placeholder="CANTIDAD" disabled><br>
									</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="sobres_edit" id="sobres_edit" value="1">
									<label class="form-check-label" for="gridCheck">
										Sobres<br>
										<input class="form-check-input" style="width:90%;" id="sobres_cant_edit" name="sobres_cant_edit" type="number" placeholder="CANTIDAD" disabled><br>
									</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="carpetas_edit" id="carpetas_edit" value="1">
									<label class="form-check-label" for="gridCheck">
										Carpetas<br>
										<input class="form-check-input" style="width:90%;" id="carpetas_cant_edit" name="carpetas_cant_edit" type="number" placeholder="CANTIDAD" disabled><br>
									</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="anillados_edit" id="anillados_edit" value="1">
									<label class="form-check-label" for="gridCheck">
										Anillados<br>
										<input class="form-check-input" style="width:90%;" id="anillados_cant_edit" name="anillados_cant_edit" type="number" placeholder="CANTIDAD" disabled><br>
									</label>
								</div>
							</div>
						</div><br>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<div class="form-row" style="text-align: center;  display: flex;">
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="radio" id="rdo_urgente" name="nivel_edit" value="U">
									<label class="form-check-label">URGENTE</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="radio" id="rdo_prioritario" name="nivel_edit" value="P">
									<label class="form-check-label">PRIORITARIO</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="radio" id="rdo_rutinario" name="nivel_edit" value="R">
									<label class="form-check-label">RUTINARIO</label>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">SUBIR ARCHIVOS</legend>
						<div class="form-group">
							<label class="form-check-label">Nota: Los archivos deben estar en formato PDF y no deben pesar mas de 2.MB</label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" for="Subir" class="custom-file-input" name="NuevoArchivo" id="NuevoArchivo">
									<label class="custom-file-label" for="exampleInputFile" style="content: 'Subir Archivo';">Suba un nuevo Archivo</label>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">ARCHIVOS SUBIDOS</legend>
						<table id="TableDocEditar" class="table table-sm table-hover table-bordered font-13">
							<thead>
							</thead>
							<tbody>
							</tbody>
						</table>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
					<button type="submit" id="enviarHojaRutaEditado" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>