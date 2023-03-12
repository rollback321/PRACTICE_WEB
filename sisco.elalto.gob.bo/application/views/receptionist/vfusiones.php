<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Main content -->
	<section class="content" style="padding-top: 10px;">
		<div class="container-fluid">

			<div class="row mb-2">
				<div class="col-sm-6 m-0">
					<a href="javascript:void(0)" class="btn btn-danger  btn-sm px-2" id="botonCancelarDerivacion"> Cancelar Fusion</a>

				</div>
			</div>
			<section class="content">

				<div class="container-fluid p-0">
					<form id="formFusionar" method="post">
						<!-- action="< ?= site_url('Controller_encargado/crearNotaIngreso');?>" -->
						<div class="row ">
							<div class="col-12">
								<div class="card p-2 mb-1">
									<div class="row  ">



										<div class="form-group col-md-3 mb-1 ">
											<div class="input-group-sm  ">
												<input type="text" id="cor_id" name="cor_id"value="<?php echo $datos1?>"hidden>
												<select class="form-control" id="SelectCod_id" name="SelectCod_id" onchange='cambioOpciones();'>
												<option  selected="selected" disabled>Seleccionar Hoja de Ruta</option>
													<?php
												if (count($SelectCodigo) > 0) {
													foreach ($SelectCodigo as $cod) { 
														
														$codigo = 'GAMEA-' . $cod['cor_codigo'] . '-' . date("Y");
														?>
													
														<option value="<?php echo $cod['cor_id'] ?>"><?php echo $codigo ?></option>
												<?php }
												}
												?>
												</select>
											</div>
										</div>


										<div class="form-group col-md-3 mb-1 ">
											<i class="fas fa-eye-dropper "></i>
											<label class="m-0  font-weight-normal" for="a_ref">Referencia:</label>
											<div class="input-group input-group-sm  ">
												<textarea class="form-control" name="a_ref" id="a_ref" rows="2" ></textarea>
											</div>

											<i class="fas fa-eye-dropper "></i>
											<label class="m-0  font-weight-normal" for="ingresoObservacion">Descripcion:</label>
											<div class="input-group input-group-sm  ">
												<textarea class="form-control" name="a_des" id="a_des" rows="3" ></textarea>
											</div>
										</div>
										<div class="form-group col-md-3 mb-1 ">
											<i class="fas fa-eye-dropper "></i>
											<label class="m-0  font-weight-normal" for="ingresoObservacion">Motivo de Fusion:</label>
											<div class="input-group input-group-sm  ">
												<textarea class="form-control" name="a_motivo" id="a_motivo" placeholder="Describa los motivos por la fusion de Hojas de Ruta" rows="5"></textarea>
											</div>
										</div>
									</div>


								</div>

								<div class="card p-2 ">
									<div class="card-header p-2 d-flex">
									


										<button type="button" class="btn btn-primary m-1" onclick="fusion()"id="submitFusionar">
											Fusionar
										</button>
									</div>

									

								</div>

							</div>
						</div>

						<!-- <div class="row">
							<div class="col-md-12" id="submitFusionar">
								<div class="form-group">
									<button class="btn col-md-3 border  bg-primary active mb-2" type="submit" id="submitCrearCopias">
										Derivar Hojas de Ruta
									</button>
								</div>
							</div>
						</div> -->
					</form>

				</div>
			</section>
		</div>



</div>
</section>
</div>
<!-- /.content-wrapper -->