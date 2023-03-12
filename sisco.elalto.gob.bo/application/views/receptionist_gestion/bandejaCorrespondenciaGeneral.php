<div class="content-wrapper">
	<section class="content" style="padding-top: 10px;">
		<div class="col-12 col-sm-12">
			<div class="card card-secondary card-tabs">
				<div class="card-header p-0 pt-1">
					<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="TabInbox" href="#TabInboxView" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/check.svg" class="mb-1 " alt="bandeja" style="margin-right: 3px;" width="18px"> Entrada de Correspondencia</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="TabReception" href="#TabReceptionView" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/dos_folders.png" class="mb-1 " alt="recepcion" style="margin-right: 3px;" width="18px"> Recepcion de Correspondencia</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="TabRetractar" href="#TabRetractarView" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/libro_celeste.png" class="mb-1 " alt="retractar" style="margin-right: 3px;" width="18px"> Retractar</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="TabConcluidos" href="#TabConcluidosView" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/encuadernado.png" class="mb-1 " alt="concluidos" style="margin-right: 3px;" width="18px"> Concluidos</a>
						</li>
					</ul>
				</div>
				<div class="card-body p-2">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="TabInboxView" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
							<div class="col-md-12">
								<div class="card card-primary card-outline" style="margin-bottom: 6px;">
									<div class="card-body p-2">
										<div class="mailbox-controls">
											<div class="float-left">
												<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>
											</div>
											<div class="float-left">
												<div class="btn-group-sm" style="display: none; width:100%;  margin-left: 10px;" name="DivCheck" id="DivCheck">
													<button type="button" class="btn btn-outline-primary btn-lg" onclick="AceptacionMultiple()" data-target="#AceptarHojaRutaMultiple" data-toggle="modal"><i class="fas fa-check-square"></i> Aceptacion Multiple</button>
													<button type="button" style="margin-left: 10px;" class="btn btn-outline-secondary btn-lg" onclick="RechazoMultiple()" data-target="#RechazarHojaRutaMultiple" data-toggle="modal"><i class="fas fa-window-close"></i> Rechazo Multiple</button>
												</div>
											</div>
										</div>
										<div class="table-responsive mailbox-messages">
											<table id="tableInbox" class="table table-hover table-striped table-sm font-11 ">
												<thead>
													<tr>
														<th style="text-align: center;"></th>
														<th></th>
														<th>CODIGO</th>
														<th>ACCION</th>
														<th>REMITENTE</th>
														<th>FECHA DE<br>DERIVACION</th>
														<th>PLAZO<br>(horas)</th>
														<th>FECHA <br>LIMITE</th>
														<th>PROVEIDO</th>
														<th>OBSERVACION</th>
														<th>HISTORIAL</th>
														<th>MAS DETALLES</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="TabReceptionView" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
							<div class="col-md-12">
								<div class="card card-primary card-outline" style="margin-bottom: 6px;">
									<div class="card-body p-2">
										<div class="mailbox-controls">
											<div class="float-left">
												<button type="button" class="btn btn-default btn-sm checkbox-toggleReception"><i class="far fa-square"></i></button>
											</div>
											<div class="float-left">
												<div class="btn-group-sm" style="display: none; width:100%;  margin-left: 10px;" name="DivCheckReception" id="DivCheckReception">
													<button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
														Acciones
													</button>
													<div class="dropdown-menu" role="menu">
														<a class="dropdown-item" href="#" onclick="DerivarMultiple()" data-target="#derivarHojaRutaMultiple" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Derivacion Interna Multiple</a>
														<a class="dropdown-item" href="#" onclick="DerivarMultipleExternaBandeja()" data-target="#derivarHojaRutaMultipleExterna" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Derivacion Externa Multiple</a>
													</div>
												</div>
											</div>
										</div>
										<div class="table-responsive mailbox-messagesR">
											<table id="tableReception" class="table table-hover table-striped table-sm font-11">
												<thead>
													<tr>
														<th style="text-align: center;"></th>
														<th></th>
														<th>CODIGO</th>
														<th>ACCION</th>
														<th>REMITENTE</th>
														<th>FECHA DE<br>ACEPTACION</th>
														<th>PLAZO<br>(horas)</th>
														<th>FECHA <br>LIMITE</th>
														<th>PROVEIDO</th>
														<th>OBSERVACION</th>
														<th>HISTORIAL</th>
														<th>MAS DETALLES</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="TabRetractarView">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<div class="card" style="margin-bottom: 6px;">

											<div class="card-body p-2 table-responsive ">
												<table id="tableRetractar" class="table table-sm table-hover table-striped  table-bordered font-12">
													<thead>
														<tr>
															<th>ACCIONES</th>
															<th>CODIGO</th>
															<th>REACCION</th>
															<th>DESTINATARIO</th>
															<th>FECHA DE<br>DERIVACION</th>
															<th>PLAZO<br>(horas)</th>
															<th>FECHA <br>LIMITE</th>
															<th>PROVEIDO</th>
															<th>OBSERVACION</th>
															<th>HISTORIAL</th>
															<th>MAS DETALLES</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="TabConcluidosView">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<div class="card" style="margin-bottom: 6px;">

											<div class="card-body p-2 table-responsive ">
												<table id="tableConcluidos" class="table table-sm table-hover table-striped  table-bordered font-12">
													<thead>
														<tr>
															<th>ACCIONES</th>
															<th>CODIGO</th>
															<th>REFERENCIA</th>
															<th>DESCRIPCION</th>
															<th>MOTIVO</th>
															<th>CONCLUIDO POR:</th>
															<th>FECHA DE<br>CONCLUSION</th>
															<th>HISTORIAL</th>
															<th>MAS DETALLES</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>