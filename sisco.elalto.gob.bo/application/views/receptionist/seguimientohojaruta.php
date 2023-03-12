<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
	<div class="content">
		<div class="container-fluid">
			


			<div class="card card-default">
				<div class="card-header">
				<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				<h4 class="text-center display-8 "><b><span class="TituloAdmin"></span></b></h4>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="col-12 col-sm-12" id="DivUnidad">
						<button type="button" id="btnRegresarPe" class="btn btn-info" onclick="regresar();"><i class="fas fa-undo-alt"> </i> Regresar</button>
						<!-- <h4 class="text-center display-8 "><b><span class="TituloAdmin"></span></b></h4> -->
						<div class="row" id="DivTotalUnidad">
							<div class="col-lg-3 col-6">
								<div class="small-box bg-info">
									<div class="inner" style="padding-left: 10px; padding-right: 10px;padding-top: 10px;padding-top: 10px;padding-bottom: 0px;">
										<b>
											<p style="margin-bottom: 0px;font-size: 0.8rem;">TOTAL DE HOJAS DE RUTA EN <br>BANDEJA </p>
										</b>
										<h3 class="numBand" style="padding-left: 20px;font-size: 1.6rem; "></h3>
									</div>
									<div class="icon">
										<i class="fas fa-archive" style="top: 40px;margin-bottom: 0px;font-size: 40px;"></i>
									</div>
									<a href="#" onclick="VerBandeja()" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-success">
									<div class="inner" style="padding-left: 10px; padding-right: 10px;padding-top: 10px;padding-top: 10px;padding-bottom: 0px;">
										<b>
											<p style="margin-bottom: 0px;font-size: 0.8rem;">TOTAL DE HOJAS DE RUTA <br>ACEPTADAS</p>
										</b>
										<h3 class="numAcep" style="padding-left: 20px; font-size: 1.6rem; "></h3>
									</div>
									<div class="icon">
										<i class="fas fa-vote-yea" style="top: 40px;margin-bottom: 0px;font-size: 40px;"></i>
									</div>
									<a href="#" onclick="VerAceptadas()" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-warning">
									<div class="inner" style="padding-left: 10px; padding-right: 10px;padding-top: 10px;padding-top: 10px;padding-bottom: 0px;">
										<b>
											<p style="margin-bottom: 0px;font-size: 0.8rem;">TOTAL DE HOJAS DE RUTA <br>DESPACHADAS</p>
										</b>
										<h3 class="numDeri" style="padding-left: 20px;font-size: 1.6rem;  "></h3>
									</div>
									<div class="icon">
										<i class="fas fa-share-square" style="top: 40px;margin-bottom:0px;font-size: 40px;"></i>
									</div>
									<a href="#" onclick="VerDerivadas()" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-danger">
									<div class="inner" style="padding-left: 10px; padding-right: 10px;padding-top: 10px;padding-top: 10px;padding-bottom: 0px;">
										<b>
											<p style="margin-bottom: 0px;font-size: 0.8rem;">TOTAL DE HOJAS DE RUTA <br>RECHAZADAS</p>
										</b>
										<h3 class="numRech" style="padding-left: 20px;font-size: 1.6rem;  "></h3>
									</div>
									<div class="icon">
										<i class="fas fa-ban" style="top: 40px;margin-bottom: 0px;font-size: 40px;"></i>
									</div>
									<a href="#" onclick="VerRechazadas()" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>

						<div class="row" id="DivTotalUnidadFila2">

							<div class="col-lg-3 col-6">
								<div class="small-box bg-dark">
									<div class="inner" style="padding-left: 10px; padding-right: 10px;padding-top: 10px;padding-top: 10px;padding-bottom: 0px;">
										<b>
											<p style="margin-bottom: 0px;font-size: 0.8rem;">TOTAL HOJAS DE RUTA <br>PARA CONCLUIR</p>
										</b>
										<h3 class="numAcepForConcluir" style="padding-left: 20px;font-size: 1.6rem;  "></h3>
									</div>
									<div class="icon">
										<i class="fas fa-vote-yea" style="top: 40px;margin-bottom: 0px;font-size: 40px;"></i>
									</div>
									<a href="#" onclick="VerAceptadasForConcluir()" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
								</div>
							</div>


						</div>


						<div class="card" id="DivBandeja">
							<br><button type="button" id="btnRegresarTotales" class="btn btn-info" style="margin-bottom: 0.7em;margin-left: 0.5em;" onclick="regresarTotales();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-body table-responsive p-0">
								<!-- <div style=" float: right;margin-right: 10px;margin-left: 5px;">
						                 <button type="button" class="btn btn-sm btn-info" id="ImpReporte"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Reporte</button>
					                           </div> -->

								<table id="example1" class="table table-striped table-valign-middle" style="font-size: 14px;">
									<thead>
										<tr>
											<th style="width:5%;text-align:center;">#</th>
											<th style="width:20%; text-align:center;">SERVIDOR PUBLICO</th>
											<th style="width:20%; text-align:center;">CARGO</th>
											<th style="width:15%; text-align:center;">ESTADO DEL <br>USUARIO</th>
											<th style="width:15%;text-align:center;">Total Hojas de <br> Ruta en Bandejas</th>
											<th style="text-align:center;">MAS DETALLES</th>

										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>
						<div class="card" id="DivAceptadas">
							<button type="button" id="btnRegresarTotales" class="btn btn-info" style="margin-bottom: 0.5em;" onclick="regresarTotales();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-header border-0">
								<div class="card-tools">
								</div>
							</div>
							<div class="card-body table-responsive p-0">
								<table id="example2" class="table table-striped table-valign-middle" style="font-size: 14px;">
									<thead>
										<tr>
											<th style="width:5%;text-align:center;">#</th>
											<th style="width:20%; text-align:center;">SERVIDOR PUBLICO</th>
											<th style="width:20%; text-align:center;">CARGO</th>
											<th style="width:15%; text-align:center;">ESTADO DEL <br>USUARIO</th>
											<th style="width:15%;text-align:center;">TOTAL DE HOJAS<br> RUTA ACEPTADAS</th>
											<th style="text-align:center;">MAS DETALLES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card" id="DivDerivadas">
							<br><button type="button" id="btnRegresarTotales" class="btn btn-info" style="margin-bottom: 0.7em;margin-left: 0.5em;" onclick="regresarTotales();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-body table-responsive p-0">
								<table id="example3" class="table table-striped table-valign-middle" style="font-size: 14px;">
									<thead>
										<tr>
											<th style="width:5%;text-align:center;">#</th>
											<th style="width:30%; text-align:center;">SERVIDOR PUBLICO</th>
											<th style="width:30%; text-align:center;">CARGO</th>
											<th style="width:15%;text-align:center;">HOJAS DE RUTA RESPONDIDAS</th>
											<th>MAS DETALLES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card" id="DivRechazadas">
							<br><button type="button" id="btnRegresarTotales" class="btn btn-info" style="margin-bottom: 0.7em;margin-left: 0.5em;" onclick="regresarTotales();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-body table-responsive p-0">
								<table id="example4" class="table table-striped table-valign-middle" style="font-size: 14px;">
									<thead>
										<tr>
											<th style="width:5%;text-align:center;">#</th>
											<th style="width:30%; text-align:center;">SERVIDOR PUBLICO</th>
											<th style="width:30%; text-align:center;">CARGO</th>
											<th style="width:15%;text-align:center;">HOJAS DE RUTA RECHAZADAS</th>
											<th>MAS DETALLES</th>
										</tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						</div>


						<div class="card" id="DivAceptadasForConcluir">
							<button type="button" id="btnRegresarTotales" class="btn btn-info" style="margin-bottom: 0.5em;" onclick="regresarTotales();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-header border-0">
								<div class="card-tools">
								</div>
							</div>
							<div class="card-body table-responsive p-0">
								<table id="example9" class="table table-striped table-valign-middle" style="font-size: 14px;">
									<thead>
										<tr>
											<th style="width:5%;text-align:center;">#</th>
											<th style="width:26%; text-align:center;">SERVIDOR PUBLICO</th>
											<th style="width:20%; text-align:center;">CARGO</th>
											<th style="width:15%; text-align:center;">ESTADO DEL <br>USUARIO</th>
											<th style="width:15%;text-align:center;">TOTAL DE HOJAS <br> RUTA ACEPTADAS</th>
											<th style="text-align:center;">MAS DETALLES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>





						<div class="card" id="DivBandejaDetalles">
							<br><button type="button" id="btnRegresarBandejaUser" class="btn btn-info" style="margin-bottom: 0.7em;margin-left: 0.5em;" onclick="regresarBandejaUsers();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-header border-0">
								<h5><b> DETALLES DE LAS HOJAS DE RUTA DE: <span title="3 New Messages" class="badge bg-success nombreCompleto"></span><b></h5>
								<div class="card-tools">
								</div>
							</div>
							<div class="card-body table-responsive p-0">
								<table id="example5" class="table table-striped table-valign-middle tableCenterData" style="font-size: 12px;">
									<thead>
										<tr>
											<th style="width:10%;">CODIGO</th>
											<th style="width:20%;">REFERENCIA</th>
											<th style="width:20%;">DERIVADO POR:</th>
											<th style="width:20%;">PARA:</th>
											<th style="width:15%;">FECHA DERIVACION</th>
											<th style="width:10%;">HISTORIAL</th>
											<th style="width:10%;">MAS DETALLES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>


						<div class="card" id="DivAceptadasDetalles">
							<br><button type="button" id="btnRegresarAceptadaUser" class="btn btn-info" style="margin-bottom: 0.7em;margin-left: 0.5em;" onclick="regresarAceptadaUsers();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-header border-0">
								<h5><b> DETALLES DE LAS HOJAS DE RUTA DE: <span title="3 New Messages" class="badge bg-success nombreCompleto"></span><b></h5>
								<div class="card-tools">
								</div>
							</div>
							<div class="card-body table-responsive p-0">
								<table id="example6" class="table table-striped table-valign-middle tableCenterData" style="font-size: 12px;">
									<thead>
										<tr>
											<th style="width:10%;">CODIGO</th>
											<th style="width:20%;">REFERENCIA</th>
											<th style="width:20%;">DERIVADO DE:</th>
											<th style="width:20%;">ACEPTADO POR:</th>
											<th style="width:15%;">FECHA DE ACEPTACION</th>
											<th style="width:10%;">HISTORIAL</th>
											<th style="width:10%;">MAS DETALLES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>


						<div class="card" id="DivDerivadasDetalles">
							<br><button type="button" id="btnRegresarDerivadaUser" class="btn btn-info" style="margin-bottom: 0.7em;margin-left: 0.5em;" onclick="regresarDerivadaUsers();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-header border-0">
								<h5><b> DETALLES DE LAS HOJAS DE RUTA DE: <span title="3 New Messages" class="badge bg-success nombreCompleto"></span><b></h5>
								<div class="card-tools">
								</div>
							</div>
							<div class="card-body table-responsive p-0">
								<table id="example7" class="table table-striped table-valign-middle tableCenterData" style="font-size: 12px;">
									<thead>
										<tr>
											<th style="width:15%;">CODIGO</th>
											<th style="width:20%;">REFERENCIA</th>
											<th style="width:20%;">DERIVADO DE:</th>
											<th style="width:20%;">PARA:</th>
											<th style="width:10%;">HISTORIAL</th>
											<th style="width:10%;">MAS DETALLES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>

						<div class="card" id="DivRechazadasDetalles">
							<br><button type="button" id="btnRegresarRechazadaUser" class="btn btn-info" style="margin-bottom: 0.7em;margin-left: 0.5em;" onclick="regresarRechazadaUsers();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-header border-0">
								<h5><b> DETALLES DE LAS HOJAS DE RUTA DE: <span title="3 New Messages" class="badge bg-success nombreCompleto"></span><b></h5>
								<div class="card-tools">
								</div>
							</div>
							<div class="card-body table-responsive p-0">
								<table id="example8" class="table table-striped table-valign-middle tableCenterData" style="font-size: 12px;">
									<thead>
										<tr>
											<th style="width:15%;">CODIGO</th>
											<th style="width:20%;">REFERENCIA</th>
											<th style="width:20%;">DERIVADO DE:</th>
											<th style="width:20%;">RECHAZADO POR:</th>
											<th style="width:20%;">MOTIVO RECHAZO:</th>
											<th style="width:10%;">FECHA DE RECHAZO</th>
											<th style="width:10%;">HISTORIAL</th>
											<th style="width:10%;">MAS DETALLES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>

						<div class="card" id="DivAceptadasForConcluirDetalles">
							<br><button type="button" id="btnRegresarAceptdasConcluirUser" class="btn btn-info" style="margin-bottom: 0.7em;margin-left: 0.5em;" onclick="regresarAceptadaConcluirUsers();"><i class="fas fa-undo-alt"> </i> Regresar</button>
							<div class="card-header border-0">
								<h5><b> DETALLES DE LAS HOJAS DE RUTA DE: <span title="3 New Messages" class="badge bg-success nombreCompleto"></span><b></h5>
								<div class="card-tools">
								</div>
							</div>
							<div class="card-body table-responsive p-0">
								<table id="example10" class="table table-striped table-valign-middle tableCenterData" style="font-size: 12px;">
									<thead>
										<tr>
											<th style="width:10%;">CODIGO</th>
											<th style="width:20%;">REFERENCIA</th>
											<th style="width:20%;">DERIVADO DE:</th>
											<th style="width:20%;">ACEPTADO POR:</th>
											<th style="width:15%;">FECHA DE ACEPTACION</th>
											<th style="width:15%;">CONCLUIR <BR> HOJA DE RUTA</th>
											<th style="width:10%;">HISTORIAL</th>
											<th style="width:10%;">MAS DETALLES</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					Desarrollado por: <a href="#">DAGA/2022</a> CONTACTO: 79588828
				</div>
			</div>














			<!-- </div> -->
		</div>




		<!-- /.---------MODALES--------- -->
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
					<form id="form_concluir_hoja" class="mb-0" method="post">
						<div class="modal-body">
							<div id="load_concluir_hoja" class="row align-items-center justify-content-center">
								<div class="fa-3x">
									<i class="fas fa-circle-notch fa-spin"></i> Procesando...
								</div>
							</div>
							<input type="hidden" id="cor_id" name="cor_id" value="">
							<input type="hidden" id="his_id" name="his_id" value="">
							<input type="hidden" id="origen" name="origen" value="">
							<input type="hidden" id="nro_copia" name="nro_copia" value="">
							<input type="hidden" id="codigo" name="codigo" value="">
							<input type="hidden" id="cor_estado" name="cor_estado" value="">
							<div class="col-md-12 font-13">
								<div class="form-group">
									<fieldset class="fieldset_Content_tema">
										<legend class="legend_tema">DATOS</legend>
										<div class="form-row">
											<div class="form-group col-md-12">
												<label for="inputPassword4"> <i class="fas fa-key"></i> Motivo para la Conclusion de la Hoja de Ruta</label>
												<textarea type="text" class="form-control form-control-sm" id="TextMotivoConclusion" name="TextMotivoConclusion" placeholder="Motivo de la Conclusion de las hojas de Ruta" style="border-radius: 9px;"></textarea>
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


		<div class="modal fade" id="Modal_viewDatosDetallesBandeja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title ml-2"><b>Detalles de la Hoja de Ruta <span id="viewEyeRouteTitle" title="3 New Messages" class="badge bg-success cod_GAMEA"></span></b></h5>
						<div class="card-tools mr-2">

							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div id="load_viewEyeRoute" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
					<div class="modal-body">
						<div class="col-md-12">
							<div class="form-group">
								<fieldset class="fieldset_Content_tema font-13">
									<div class="form-group col-lg-12">
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">CITE.:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<textarea class="form-control form-control-sm" id="cite" rows="2" disabled></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">REF.:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<textarea class="form-control form-control-sm" id="reference" rows="2" disabled></textarea>
											</div>
										</div>
										<div class="form-group row">

											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_descripcion" class="col-form-label">Descripcion:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<textarea class="form-control form-control-sm" id="description" rows="2" disabled></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_observacion" class="col-form-label">Obs.:</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<textarea class="form-control form-control-sm" id="observation" rows="2" disabled></textarea>
											</div>
										</div>
										<div class="form-group row">
											<div class="text-right-left col-sm-12 col-md-2 col-lg-2 col-xl-2">
												<label for="prev_observacion" class="col-form-label">Documentos</label>
											</div>
											<div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
												<div class="card-body p-2">
													<table id="TableDocDerivar" class="table table-sm table-hover table-bordered font-13">
														<thead>
														</thead>
														<tbody>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="far fa-times-circle"></i> Cerrar</button>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
