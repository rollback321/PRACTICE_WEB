<div class="content-wrapper">
	<section class="content" style="padding-top: 10px;">
		<div class="col-12 col-sm-12">
			<div class="card card-secondary card-tabs">
				<div class="card-header p-0 pt-1">
					<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="TabInbox" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="nav-icon fas fa-arrow-alt-circle-down"></i> Entrada de Correspondencia</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="TabReception" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><i class="nav-icon fas fa-mail-bulk"></i> Hojas Internas Derivadas</a>
						</li>
					</ul>
				</div>
				<div class="card-body p-2">
					<div class="tab-content" id="custom-tabs-one-tabContent">
						<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
							<div class="col-md-12">
								<div class="card card-primary card-outline" style="margin-bottom: 6px;">
									<div class="card-body p-2">
										<div class="mailbox-controls">
											<div class="float-left">
												<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i></button>
											</div>
											<div class="float-left">
												<div class="btn-group-sm" style="display: none; width:100%;  margin-left: 10px;" name="DivCheck" id="DivCheck">
													<button type="button" class="btn btn-outline-primary btn-lg" onclick="ConfirmacionMultiple()" data-target="#ConfirmarHojaRutaMultiple" data-toggle="modal"><i class="fas fa-check-square"></i> Confirmacion Multiple</button>
												</div>
											</div>
										</div>
										<div class="table-responsive mailbox-messages">
											<table id="tableInbox" class="table table-hover table-striped table-sm font-11">
												<thead style="text-align: center;">
													<th></th>
													<th>ACCIONES</th>
													<th>CONFIRMACION</th>
													<th>CODIGO</th>
													<th>ESTADO</th>
													<th>DESTINO</th>
													<th>REMITENTE</th>
													<th>REFERENCIA</th>
													<th>PLAZO<br>(Dias)</th>
													<th> MAS DETALLES</th>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
							<div class="col-md-12">
								<div class="card card-success card-outline" style="margin-bottom: 6px;">
									<div class="card-body p-2">
										<div class="table-responsive mailbox-messages">
											<table id="tableReception" class="table table-hover table-striped table-sm font-11">
												<thead>
													<th>ACCIONES</th>
													<th>CODIGO</th>
													<th>ACCION</th>
													<th>DESTINO</th>
													<th>REMITENTE</th>
													<th>FECHA DE<br>DERIVACION</th>
													<th>PLAZO<br>(horas)</th>
													<th>FECHA <br>LIMITE</th>
													<th>PROVEIDO</th>
													<th>OBSERVACION</th>
													<th>HISTORIAL</th>
													<th>MAS DETALLES</th>
												</thead>
												<tbody>
												</tbody>
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
	</section>
</div>