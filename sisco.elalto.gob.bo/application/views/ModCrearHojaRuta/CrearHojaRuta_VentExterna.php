<div class="modal fade" id="CrearHojaRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>Registrar Hoja de Ruta</b></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="load_register" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_crearHoja" method="post">
				<div id="modalCuerpo" class="modal-body" style="height: auto;width: auto; ">
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">DOCUMENTO</legend>
						<div class="form-row">

							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-file-invoice "></i> REFERENCIA</label>
								<textarea class="form-control form-control-sm text-uppercase" style="border-radius: 9px;" id="ref" name="ref" rows="2" placeholder="REF. Documento" required></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-eye-dropper "></i> DESCRIPCION</label>
								<textarea class="form-control form-control-sm text-uppercase" style="border-radius: 9px;" id="descrip_doc" name="descrip_doc" rows="2" placeholder="Descripcion del Documento"></textarea>
							</div>
						</div>
						<div class="form-row">

							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-eye-dropper "> </i> OBSERVACION</label>
								<textarea class="form-control form-control-sm text-uppercase" style="border-radius: 9px;" id="obs_doc" name="obs_doc" rows="2" placeholder="Observacion del Documento"></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-file-invoice "></i> CITE</label>
								<input type="text" class="form-control form-control-sm text-uppercase" id="cite" name="cite" style="border-radius: 9px;" placeholder="CITE Documento">
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">REMITENTE DOC.</legend>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-user"></i> NOMBRE DEL REMITENTE</label>
								<input type="text" class="form-control form-control-sm text-uppercase" id="nombre_remitente" style="border-radius: 9px;" name="nombre_remitente" placeholder="Nombre del Remitente" required>
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-address-book"></i> CARGO DEL REMITENTE</label>
								<input type="text" class="form-control form-control-sm text-uppercase" id="cargo_remitente" style="border-radius: 9px;" name="cargo_remitente" placeholder="Ej: Responsable Distrital, Gerente Gral, Presidente de la Urb Bautista Saavedra">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-hotel"></i> INSTITUCION DEL REMITENTE</label>
								<input type="text" class="form-control form-control-sm text-uppercase" id="institucion_remitente" style="border-radius: 9px;" name="institucion_remitente" placeholder="EJ: empresa De La Paz, Junta 12 de Octubre, etc">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-phone-alt"></i>NRO DE CONTACTO</label>
								<input type="number" class="form-control form-control-sm" id="nro_contacto" name="nro_contacto" style="border-radius: 9px;" onKeyPress="if(this.value.length==8) return false;" placeholder="Nro. de Contacto">
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">RECEPCION DOC.</legend>
						<div class="form-group row">
							<label for="colFormLabelSm" class="col-form-label col-form-label-sm" style="margin-left: 0.5rem;">Fecha de Recepcion</label>
							<div class="form-group col-md-3">
								<input type="datetime-local" class="form-control form-control-sm" id="colFormLabelSmRegister" name="fecha_recep" placeholder="col-form-label-sm" required>
							</div>
							<label for="colFormLabelSm" class="col-form-label col-form-label-sm" style="margin-left: 2rem;">Plazo(Dias):</label>
							<div class="form-group col-md-2">
								<input type="number" value="1" class="form-control form-control-sm" id="Fecha_plazoCorrespondencia" name="Fecha_plazoCorrespondencia">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" checked name="nro_fojas" value="1">
									<label class="form-check-label" for="gridCheck">
										Nro. Fojas<br>
										<input class="form-check-input" id="nro_cant_fojas" name="nro_cant_fojas" type="number" style="width:90%;" placeholder="CANTIDAD"><br>
									</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="nro_cd_dvd" id="nro_cd_dvd" value="1">
									<label class="form-check-label" for="gridCheck">
										CD/DVD<br>
										<input class="form-check-input" name="nro_cant_cd_dvd" id="nro_cant_cd_dvd" style="width:90%;" type="number" placeholder="CANTIDAD" disabled><br>
									</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="sobres" id="sobres" value="1">
									<label class="form-check-label" for="gridCheck">
										Sobres<br>
										<input class="form-check-input" name="sobres_cant" id="sobres_cant" type="number" style="width:90%;" placeholder="CANTIDAD" disabled><br>
									</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="carpetas" id="carpetas" value="1">
									<label class="form-check-label" for="gridCheck">
										Carpetas<br>
										<input class="form-check-input" name="carpetas_cant" id="carpetas_cant" type="number" style="width:90%;" placeholder="CANTIDAD" disabled><br>
									</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="anillados" id="anillados" value="1">
									<label class="form-check-label" for="gridCheck">
										Anillados<br>
										<input class="form-check-input" name="anillados_cant" id="anillados_cant" type="number" style="width:90%;" placeholder="CANTIDAD" disabled><br>
									</label>
								</div>
							</div>
						</div>
						<br>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">CATEGORIA</legend>
						<div class="form-row" style="text-align: center;  display: flex;">
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" checked value="U">
									<label class="form-check-label">URGENTE</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" value="P">
									<label class="form-check-label">PRIORITARIO</label>
								</div>
							</div>
							<div class="form-group col-md-2">
								<div class="form-check">
									<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" value="R">
									<label class="form-check-label">RUTINARIO</label>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">SUBIR ARCHIVOS</legend>
						<label class="form-check-label">Nota: Los archivos deben estar en formato PDF y no deben pesar mas de 2.MB</label>
						<div class="card-body p-2">
							<div id="actions" class="row">
								<div class="col-lg-6">
									<div class="btn-group w-100" style="width: 30%!important">
										<span class="btn btn-success col fileinput-button">
											<i class="fas fa-plus"></i>
											<span style="font-size: 0.7rem">Subir Archivo</span>
										</span>
										<button type="submit" class="btn btn-primary col start" style="display: none;" style="width:30%">
											<i class="fas fa-upload"></i>
											<span>Start upload</span>
										</button>
										<button type="reset" class="btn btn-warning col cancel" hidden>
											<i class="fas fa-times-circle"></i>
											<span style="font-size: 0.7rem">Eliminar Archivos</span>
										</button>
									</div>
								</div>
								<div class="col-lg-6 d-flex align-items-center">
									<div class="fileupload-process w-100">
										<div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
											<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
										</div>
									</div>
								</div>
							</div>
							<div class="table table-striped files" id="previews">
								<div id="template" class="row mt-2">
									<div class="col-auto">
										<span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
									</div>
									<div class="col d-flex align-items-center">
										<p class="mb-0">
											<span class="lead" data-dz-name></span>
											(<span data-dz-size></span>)
										</p>
										<strong class="error text-danger" data-dz-errormessage></strong>
									</div>
									<div class="col-4 d-flex align-items-center">
										<div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
											<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
										</div>
									</div>
									<div class="col-auto d-flex align-items-center">
										<div class="btn-group">
											<button class="btn btn-primary start" style="display: none;">
												<i class="fas fa-upload"></i>
												<span>Start</span>
											</button>
											<button data-dz-remove class="btn btn-warning cancel">
												<i class="fas fa-times-circle"></i>
												<span style="font-size: 0.7rem">Cancelar</span>
											</button>
											<button data-dz-remove class="btn btn-danger delete" style="display: none;">
												<i class="fas fa-trash"></i>
												<span>Eliminar</span>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Cancelar</button>
					<button type="submit" id="enviarHojaRuta" class="btn btn-primary"> <i class="fas fa-check"></i> Aceptar</button>
				</div>
			</form>
		</div>
	</div>
</div>


