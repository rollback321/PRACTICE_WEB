<div class="modal fade" id="asignar_Procedencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>ASIGNAR PROCEDENCIA <span title="3 New Messages" class="badge bg-success cod_Procedencia"></span><b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_asignar_Procedencia" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_asignar_Procedencia" class="mb-0" method="post">
				<div class="modal-body font-13">
					<div class="col-md-12">
						<div class="form-group">
							<div id="dependencia-part" class="content" role="tabpanel" aria-labelledby="dependencia-part-trigger">
								<div class="form-group mb-3">
									<input type="hidden" id="cor_id_HojaProcedencia" name="cor_id_HojaProcedencia">
									<input type="hidden" id="codigo_HojaProcedencia" name="codigo_HojaProcedencia">
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">PROCEDENCIA</legend>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_1Procedencia">
											<select class="form-control" id="select_nivel_1Procedencia">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_2Procedencia">
											<select class="form-control" id="select_nivel_2Procedencia">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_3Procedencia">
											<select class="form-control" id="select_nivel_3Procedencia">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
									</fieldset>
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">&nbsp;RECEPCION</legend>
										<div class="form-group row ml-2 mr-2 msg_validar">
											<select class="form-control" id="list_usuariosProcedencia" name="list_usuariosProcedencia">
											</select>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Cancelar</button>
					<button type="submit" id="submitAsignarProcedencia" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Asignar Procedencia</button>
				</div>
			</form>
		</div>
	</div>
</div>



<div class="modal fade" id="editar_Procedencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>EDITAR PROCEDENCIA <span title="3 New Messages" class="badge bg-success cod_ProcedenciaEditar"></span><b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_editar_Procedencia" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_editar_Procedencia" class="mb-0" method="post">
				<div class="modal-body font-13">

					<div class="col-md-12">
						<div class="form-group">
							<div id="dependencia-part" class="content" role="tabpanel" aria-labelledby="dependencia-part-trigger">
								<div class="form-group mb-3">
									<input type="hidden" id="cor_idProcedenciaEditar" name="cor_idProcedenciaEditar">
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">PROCEDENCIA</legend>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_1ProcedenciaEditar">
											<select class="form-control" id="select_nivel_1ProcedenciaEditar">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_2ProcedenciaEditar">
											<select class="form-control" id="select_nivel_2ProcedenciaEditar">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_3ProcedenciaEditar">
											<select class="form-control" id="select_nivel_3ProcedenciaEditar">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
									</fieldset>
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">&nbsp;RECEPCION</legend>
										<div class="form-group row ml-2 mr-2 msg_validar">
											<select class="form-control" id="list_usuariosProcedenciaEditar" name="list_usuariosProcedenciaEditar">

											</select>
										</div>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="submit" id="submitEditarProcedencia" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Editar Procedencia</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="viewProcedencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 650px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>PROCEDENCIA DE LA HOJA DE RUTA <span id="viewEyeRouteTitle" title="3 New Messages" class="badge bg-success cod_ViewProcedencia"></span></h5></b>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_viewProcedencia" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="form-group">
						<div class="form-group col-lg-12">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">PROCEDENCIA</legend>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputEmail4"><i class="fas fa-hotel"></i> DEPENDENCIA PROCEDENCIA</label>
										<textarea class="form-control form-control-sm text-uppercase" id="dependenciaProcedencia" name="dependenciaProcedencia" rows="2" style="border-radius: 9px;"></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputPassword4"><i class="fas fa-user"></i> SERVIDOR PUBLICO</label>
										<textarea class="form-control form-control-sm text-uppercase" id="ServidorProcedencia" name="ServidorProcedencia" rows="1" style="border-radius: 9px;"></textarea>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn bg-gradient-success btn-sm" id="ButtonEditarProcedencia"> <i class="fas fa-edit"></i> Editar procedencia</button>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
			</div>
		</div>
	</div>
</div>