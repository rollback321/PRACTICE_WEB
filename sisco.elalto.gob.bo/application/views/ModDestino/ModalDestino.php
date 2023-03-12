<div class="modal fade" id="asignar_Destino" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Sugerir Destino <span title="3 New Messages" class="badge bg-success cod_GAMEA"></span><b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_asignar_Destino" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_asignar_Destino" class="mb-0" method="post">
				<div class="modal-body font-13">
					<div class="col-md-12">
						<div class="form-group">
							<div id="dependencia-part" class="content" role="tabpanel" aria-labelledby="dependencia-part-trigger">
								<div class="form-group mb-3">
									<input type="hidden" id="cor_id_Hoja" name="cor_id_Hoja">
									<input type="hidden" id="pend_id_Hoja" name="pend_id_Hoja">
									<input type="hidden" id="codigo_Hoja" name="codigo_Hoja">
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">DEPENDENCIA DESTINO</legend>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_11">
											<select class="form-control" id="select_nivel_11">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_22">
											<select class="form-control" id="select_nivel_22">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_33">
											<select class="form-control" id="select_nivel_33">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
									</fieldset>
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">&nbsp;RECEPCION</legend>
										<div class="form-group row ml-2 mr-2 msg_validar">
											<select class="form-control" id="list_usuarioss" name="list_usuarioss">
											</select>
										</div>
									</fieldset>
								</div>
							</div>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema" style="width: 90px;">PROVEIDO</legend>
								<div class="form-group col-lg-12">
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<select class="form-control" id="select_proveidoAsignarDestino">
												<option value="0" selected="selected" disabled>Seleccionar Proveido</option>
												<?php
												if (count($proveido) > 0) {
													foreach ($proveido as $prov) { ?>
														<option value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_nombre'] ?></option>
												<?php }
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_descripcion" class="col-form-label">Proveido:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
											<textarea class="form-control form-control-sm" id="prov_asigDestino" name="prov_asigDestino" rows="2" placeholder="Descripcion del Documento" maxlength="201" required></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_observacion" class="col-form-label ">Obs.:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
											<textarea class="form-control form-control-sm" id="obs_asigDestino" name="obs_asigDestino" rows="2" placeholder="Observación del Documento" maxlength="201"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 msg_validar">
											<input type="number" value="1" min="1" class="form-control form-control-sm" id="Fecha_plazoDestino" name="Fecha_plazoDestino" required>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Cancelar</button>
					<button type="submit" id="submitAsignarDestino" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Sugerir Destino</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="editar_Destino" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content secretary">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Editar Destino  <span title="3 New Messages" class="badge bg-success cod_GAMEA"></span><b></h5>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_editar_Destino" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<form id="form_editar_Destino" class="mb-0" method="post">
				<div class="modal-body font-13">

					<div class="col-md-12">
						<div class="form-group">
							<div id="dependencia-part" class="content" role="tabpanel" aria-labelledby="dependencia-part-trigger">
								<div class="form-group mb-3">
									<input type="hidden" id="pend_id_HojaEditar" name="pend_id_HojaEditar">
									<!-- <input type="hidden" id="codigo_HojaEditar" name="codigo_HojaEditar"> -->
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">DEPENDENCIA DESTINO</legend>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_111">
											<select class="form-control" id="select_nivel_111">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_222">
											<select class="form-control" id="select_nivel_222">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
										<div class="form-group row ml-2 mr-2" id="div_select_nivel_333">
											<select class="form-control" id="select_nivel_333">
												<option selected="selected">Seleccionar Dependencia</option>
											</select>
										</div>
									</fieldset>
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">&nbsp;RECEPCION</legend>
										<div class="form-group row ml-2 mr-2 msg_validar">
											<select class="form-control" id="list_usuariosss" name="list_usuariosss">

											</select>
										</div>
									</fieldset>
								</div>
							</div>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema" style="width: 90px;">PROVEIDO</legend>
								<div class="form-group col-lg-12">
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">

										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
											<select class="form-control" id="select_proveidoEditarDestino">
												<option value="0" selected="selected" disabled>Seleccionar Proveido</option>
												<?php
												if (count($proveido) > 0) {
													foreach ($proveido as $prov) { ?>
														<option value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_nombre'] ?></option>
												<?php }
												}
												?>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_descripcion" class="col-form-label">Proveido:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
											<textarea class="form-control form-control-sm " id="prov_EditDestino" name="prov_EditDestino" rows="2" placeholder="Descripcion del Documento" maxlength="201" required></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_observacion" class="col-form-label ">Obs.:</label>
										</div>
										<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 msg_validar">
											<textarea class="form-control form-control-sm " id="obs_EditDestino" name="obs_EditDestino" rows="2" placeholder="Observación del Documento" maxlength="201"></textarea>
										</div>
									</div>
									<div class="form-group row">
										<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
											<label for="prev_plazo" class="col-form-label">Plazo(Dias):</label>
										</div>
										<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 msg_validar">
											<input type="number" value="1" min="1" class="form-control form-control-sm" id="Fecha_plazoEditDestino" name="Fecha_plazoEditDestino" required>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submitEditarDestino" class="btn btn-sm btn-primary float-right"><i class="fas fa-check"></i> Editar Destino</button>
					<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="viewDestino" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 650px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title ml-2"><b>Destino de la Hoja de Ruta <span id="viewEyeRouteTitle" title="3 New Messages" class="badge bg-success cod_GAMEA"></span></h5></b>
				<div class="card-tools mr-2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<div id="load_viewDestino" class="row align-items-center justify-content-center">
				<div class="fa-3x">
					<i class="fas fa-circle-notch fa-spin"></i> Procesando...
				</div>
			</div>
			<div class="modal-body">
				<div class="col-md-12">
					<div class="form-group">
						<div class="form-group col-lg-12">
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">DESTINO</legend>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputEmail4"><i class="fas fa-hotel"></i> DEPENDENCIA DESTINO</label>
										<textarea class="form-control form-control-sm text-uppercase" id="dependenciaDes" name="dependenciaDes" rows="2" style="border-radius: 9px;"></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputPassword4"><i class="fas fa-user"></i> SERVIDORA PUBLICO</label>
										<textarea class="form-control form-control-sm text-uppercase" id="ServidorDes" name="ServidorDes" rows="1" style="border-radius: 9px;"></textarea>
									</div>
								</div>
							</fieldset>
							<fieldset class="fieldset_Content_tema">
								<legend class="legend_tema">DATOS</legend>

								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputEmail4"><i class="fas fa-file-invoice "></i> PROVEIDO</label>
										<textarea class="form-control form-control-sm " id="ViewDestinoProveido" name="ViewDestinoProveido" rows="2" style="border-radius: 9px;"></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputPassword4"><i class="fas fa-file-invoice "></i> OBSERVACION</label>
										<textarea class="form-control form-control-sm " id="ViewDestinoObservacion" name="ViewDestinoObservacion" rows="1" style="border-radius: 9px;"></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label for="inputPassword4"><i class="fas fa-calendar"></i> PLAZO(DIAS)</label>
										<textarea class="form-control form-control-sm " id="plazoViewDestino" name="plazoViewDestino" rows="1" style="border-radius: 9px;"></textarea>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-info" id="ImpReporte"><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
				<button type="button" class="btn bg-gradient-success btn-sm" id="ButtonEditarDestino"> <i class="fas fa-edit"></i> Editar Destino</button>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
			</div>
		</div>
	</div>
</div>