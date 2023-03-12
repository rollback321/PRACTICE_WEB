<div class="modal fade" id="CrearHojaRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Crear Hoja de Ruta</b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_register" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_crearHoja" class="mb-0" method="post">
				<div id="modalCuerpo" class="modal-body font-13" style="margin: 4px; overflow-y: auto; height: auto;">
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema  ">DOCUMENTO</legend>
						<div class="form-row">

							<div class="form-group col-md-6">
								<label for="inputPassword4"> <i class="fas fa-file-invoice "></i> Referencia</label>
								<textarea rows="2" class="border_Inputs form-control form-control-sm text-uppercase" id="ref" name="ref" placeholder="REF. Documento" maxlength="101" required></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-eye-dropper "></i> Descripcion</label>
								<textarea rows="2" class="border_Inputs form-control form-control-sm text-uppercase" id="descrip_doc" name="descrip_doc" placeholder="Describir contenido" maxlength="201" required></textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-eye-dropper "></i>Observacion</label>
								<textarea rows="2" class="border_Inputs form-control form-control-sm text-uppercase" type="text" id="obs_doc" name="obs_doc" placeholder="Existe alguna observación?" maxlength="201"></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-file-invoice "></i> CITE</label>
								<input type="text" class="border_Inputs form-control form-control-sm text-uppercase" id="cite" name="cite" placeholder="Ejemplo: SMAF/DA/US/RETY/054/2021" maxlength="81">
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema " style="width: 119px;">DATOS REMITENTE</legend>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4"><i class="fas fa-user"></i> Nombre del Remitente</label>
								<input type="text" class="border_Inputs form-control form-control-sm" id="nombre_remitente" disabled name="nombre_remitente" value="<?= $this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos') ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputPassword4"><i class="fas fa-address-book"></i> Cargo del Remitente</label>
								<input type="text" class="border_Inputs form-control form-control-sm" id="cargo_remitente" disabled name="cargo_remitente" value="<?= $this->session->userdata('rol_cargo') ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="inputEmail4"><i class="fas fa-hotel"></i> Dependencia Remitente</label>
								<input type="text" class=" border_Inputs form-control form-control-sm" id="institucion_remitente" name="institucion_remitente" value="<?= $this->session->userdata('nameUnique') ?>" disabled>
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4"><i class="fas fa-phone-alt"></i> Nro. de Contacto</label>
								<input type="text" class="border_Inputs form-control form-control-sm" id="nro_contacto" name="nro_contacto" value="<?= $this->session->userdata('usu_celular') ?>" required>
							</div>
							<div class="form-group col-md-4">
								<label>Categoria</label>
								<div class="form-check">
									<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" value="U">
									<label class="form-check-label">Urgente</label>
								</div>
								<div class="form-check">
									<input class="form-check-input custom-control-input-danger" type="radio" name="nivel" value="P">
									<label class="form-check-label">Prioritario</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="nivel" value="R" checked>
									<label class="form-check-label">Rutinario</label>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema ">SUBIR ARCHIVOS</legend>
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
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
					<button type="submit" id="CrearHojaRuta" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Aceptar</button>
				</div>
			</form>
		</div>
	</div>
</div>
