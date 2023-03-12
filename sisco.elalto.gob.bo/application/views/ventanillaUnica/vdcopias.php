<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content" style="padding-top: 10px;">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6 m-0">
					<a href="javascript:void(0)" class="btn btn-danger  btn-sm px-2" id="botonCancelarDerivacion"> Cancelar Derivacion</a>
				</div>
			</div>
			<section class="content">
				<div class="container-fluid p-0">
					<form id="formCrearCopias" method="post">
						<div class="row ">
							<div class="col-12">
								<fieldset class="fieldset_Content_tema">
									<legend class="legend_tema">&nbsp;RESPONSABLE</legend>
									<div class="form-group">
										<i class="fas fa-house-user"></i>SECRETARIA MUNICIPAL DE GESTION INSTITUCIONAL
									</div>
									<div class="form-group row ml-2 mr-2">
										<select id="usuInterno_id" name="usuInterno_id" class="form-control form-control-sm" aria-invalid="false" required>
										</select>
									</div>
								</fieldset>
								<div class="card p-2 mb-1">
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">&nbsp;DESTINOS</legend>
										<div class="row  ">

											<div class="form-group col-md-3">
												<input id="cor_id" name="cor_id" value="<?php echo $datos1; ?>" hidden>
												<label class="m-0  font-weight-normal" for="ingresoProveedor">
													<img src="<?= base_url() ?>assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="margin-left: 7px;" width="18px">Dependencia</label>
												<div class="form-group row ml-2 mr-2" id="div_select_nivel_1">
													<select class="form-control" id="select_nivel_1">
														<option selected="selected">Seleccionar Dependencia</option>
													</select>
												</div>
												<div class="form-group row ml-2 mr-2" id="div_select_nivel_2">
													<select class="form-control" id="select_nivel_2">
														<option selected="selected">Seleccionar Dependencia</option>
													</select>
												</div>
												<div class="form-group row ml-2 mr-2" id="div_select_nivel_3">
													<select class="form-control" id="select_nivel_3">
														<option selected="selected">Seleccionar Dependencia</option>
													</select>
												</div><br>
												<div class="form-group row ml-2 mr-2 msg_validar">
													<i class="fas fa-people-carry "></i><label class="m-0  font-weight-normal " for="nroDocumentoProveedor">Recepcionista</label>
													<select class="form-control" id="list_usuarios" name="list_usuarios" required>
													</select>
												</div>
											</div>
											<div class="form-group col-md-3 mb-1 ">
												<label for="inputPassword4"><i class="fas fa-clipboard-list"></i> Seleccione un Proveido </label>
												<select class="form-control" id="select_proveido">
													<option value="0" selected="selected" disabled>Seleccionar Proveido</option>
													<?php
													if (count($proveido) > 0) {
														foreach ($proveido as $prov) { ?>
															<option value="<?php echo $prov['prov_id'] ?>"><?php echo $prov['prov_nombre'] ?></option>
													<?php }
													}
													?>
												</select>
												<i class="fas fa-eye-dropper "></i>
												<label class="m-0  font-weight-normal" for="ingresoObservacion">Proveido:</label>
												<div class="input-group input-group-sm  ">
													<textarea class="form-control form-control-sm" id="a_proveido" name="a_proveido" placeholder="Realice una breve descripcion..." maxlength="201" rows="5" required></textarea>
												</div>
											</div>
											<div class="form-group col-md-3 mb-1 ">
												<label for="inputPassword4"><i class="fas fa-clipboard-list"></i> Plazo:</label>
												<input type="number" value="1" min="1" class="form-control form-control-sm" id="DerFecha_plazo" name="DerFecha_plazo" style="width: 50%;" required>
												<i class="fas fa-eye-dropper "></i>
												<label class="m-0  font-weight-normal" for="ingresoObservacion">Observación:</label>
												<div class="input-group input-group-sm  ">
													<textarea class="form-control" name="a_obs" id="a_obs" placeholder="Describa las observaciones del documento" rows="5"></textarea>
												</div>
											</div>
										</div>
									</fieldset>
								</div>

								<div class="card p-2 ">
									<Label>Nota: La Primera Derivacion sera el Original y las demas seran Copias</Label>
									<div class="card-header p-2 d-flex">
										<b class="mr-auto h6 pt-1 pl-3">TABLA DE DERIVACIONES</b>
										<button type="button" class="btn btn-primary m-1" id="submitAgregarFila"><i class="fas fa-plus"></i>
											Agregar Derivacion
										</button>
									</div>

									<div class="table-responsive">
										<table id="detalles" class="table table-striped table-hover table-condensed table-sm text-xs">
											<thead class=" justify-content-center">
												<th></th>
												<th>Nro.</th>
												<th>Origen</th>
												<th>Recepcionista</th>
												<th>Proveido</th>
												<th>Observacion</th>
												<th>Plazo</th>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12" id="guardar">
								<div class="form-group">
									<button class="btn col-md-3 border  bg-primary active mb-2" type="submit" id="submitCrearCopias">
										Derivar Hojas de Ruta
									</button>
								</div>
							</div>
						</div>
					</form>

				</div>
			</section>
		</div>

	</section>
</div>
<!-- /.content-wrapper -->