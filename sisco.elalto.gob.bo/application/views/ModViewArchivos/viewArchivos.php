<div class="modal fade" id="VerArchivos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<h5 class="modal-title ml-2"><b>Ver Archivos</b></h5>
					<div class="card-tools mr-2">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
				<div class="modal-body">
					<div id="load_archivos" class="row align-items-center justify-content-center">
						<div class="fa-3x">
							<i class="fas fa-circle-notch fa-spin"></i> Procesando...
						</div>
					</div>
					<div id="modalCuerpo" class="modal-body" style="overflow-y: auto;height: auto;">
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
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"> <i class="far fa-times-circle"></i> Cerrar</button>
				</div>
			</div>
		</div>
	</div>