
<div class="modal fade" id="editarHojaRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content secretary_edit">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Editar Hoja de Ruta <span title="3 New Messages" class="badge bg-success cod_GAMEA"></span></b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_register_edit" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_editarHoja" class="mb-0" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id_cor" id="id_cor">
				<div id="modalCuerpo" class="modal-body font-13" style="margin: 4px; overflow-y: auto;height: auto;">
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema">DOCUMENTO</legend>
						<div class="form-row">

							<div class="form-group col-md-6">
								<label for="ref_edit"><i class="fas fa-file-invoice "></i> REFERENCIA</label>
								<textarea rows="2" class=" border_Inputs form-control form-control-sm text-uppercase " id="ref_edit" name="ref_edit" placeholder="REF. Documento" maxlength="101" required></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="descrip_doc_edit"><i class="fas fa-eye-dropper "></i> Descripcion</label>
								<textarea rows="2" class="border_Inputs form-control form-control-sm text-uppercase " id="descrip_doc_edit" name="descrip_doc_edit" placeholder="Describir contenido" maxlength="201" required></textarea>
							</div>
						</div>
						<div class="form-row">

							<div class="form-group col-md-6">
								<label for="obs_doc_edit"><i class="fas fa-eye-dropper "></i> Observacion</label>
								<textarea rows="2" class="form-control form-control-sm text-uppercase" type="text" id="obs_doc_edit" name="obs_doc_edit" placeholder="Existe alguna observación?" maxlength="201"></textarea>
							</div>
							<div class="form-group col-md-6">
								<label for="cite_edit"><i class="fas fa-file-invoice "></i> CITE</label>
								<input type="text" class="form-control form-control-sm text-uppercase" id="cite_edit" name="cite_edit" placeholder="SMAF/DA/US/RETY/054/2021" maxlength="81">
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema" style="width: 119px;">DATOS REMITENTE</legend>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="nombre_remitente_edit"><i class="fas fa-user"></i> Nombre del Remitente</label>
								<input type="text" class="form-control form-control-sm" id="nombre_remitente_edit" disabled name="nombre_remitente_edit" value="<?= $this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos') ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="cargo_remitente_edit"><i class="fas fa-user"></i> Cargo del Remitente</label>
								<input type="text" class="form-control form-control-sm" id="cargo_remitente_edit" disabled name="cargo_remitente_edit" value="<?= $this->session->userdata('rol_cargo') ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label for="institucion_remitente_edit"><i class="fas fa-hotel"></i> Dependencia Remitente</label>
								<input type="text" class="form-control form-control-sm" id="institucion_remitente_edit" name="institucion_remitente_edit" value="<?= $this->session->userdata('nameUnique') ?>" disabled>
							</div>
							<div class="form-group col-md-4">
								<label for="nro_contacto_edit"><i class="fas fa-phone-alt"></i> Nro. de Contacto</label>
								<input type="text" class="form-control form-control-sm" id="nro_contacto_edit" name="nro_contacto_edit" placeholder="Número de Celular" value="<?= $this->session->userdata('usu_celular') ?>" maxlength="21" required>
							</div>
							<div class="form-group col-md-4">
								<label>Categoria</label>

								<div class="form-check">
									<input class="form-check-input" type="radio" id="rdo_urgente" name="nivel_edit" value="U">
									<label class="form-check-label">Urgente</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" id="rdo_prioritario" name="nivel_edit" value="P">
									<label class="form-check-label">Prioritario</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" id="rdo_rutinario" name="nivel_edit" value="R">
									<label class="form-check-label">Rutinario</label>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema" style="width: 119px;">SUBIR ARCHIVO</legend>
						<div class="form-group">
							<!-- <label for="exampleInputFile">Subir Archivo PDf</label><br> -->
							<label class="form-check-label">Nota: Los archivos deben estar en formato PDF y no deben pesar mas de 2.MB</label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" for="Subir" accept="application/pdf" class="custom-file-input" name="NuevoArchivo" id="NuevoArchivo">
									<label class="custom-file-label" for="exampleInputFile" style="content: 'Subir Archivo';">Suba un nuevo Archivo</label>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="fieldset_Content_tema">
						<legend class="legend_tema" style="width: 119px;">ARCHIVOS SUBIDOS</legend>
						<table id="TableDocEditar" class="table table-sm table-hover table-bordered font-13">
							<thead>
							</thead>
							<tbody>
							</tbody>
						</table>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
					<button type="submit" id="enviarHojaRuta_edit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Editar</button>
				</div>
			</form>
		</div>
	</div>
</div>

