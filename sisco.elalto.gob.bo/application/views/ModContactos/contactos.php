<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content">

		<!-- MENUS SUPERIOR-->
		<div class="col-12 col-sm-12">
			<div class="card card-primary card-tabs">
				<div class="card-header p-0 pt-1" style="background:#6c757d;">
					<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="contactos_gamea" href="#gamea" data-toggle="pill" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><img src="<?= base_url() ?>assets/dist/img/svg/contactos.svg" class="mb-1 " alt="bandeja" style="margin-right: 3px;" width="18px"> CONTACTO FUNCIONARIOS</a>
						</li>
						<li class="nav-item">
							<a class="nav-link " id="contactos_admin" href="#admin" data-toggle="pill" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><img src="<?= base_url() ?>assets/dist/img/svg/usuario.svg" class="mb-1 " alt="bandeja" style="margin-right: 3px;" width="18px"> CONTACTO ADMINISTRADOR</a>
						</li>
					</ul>
				</div>
				<!-- PRIMER CONTENT -->
				<div class="card-body">
					<div class="tab-content">
						<!-- <center> -->
						<div class="active tab-pane" id="gamea">
							<section class="content ">
								<div class="container-fluid">
									<form id="Form_Contactos">
										<div class="row ">
											<div class="col-12">
												<div class="card p-2 mb-1">
													<!-- <div class="row  "> -->
													<div class="form-group col-md-6">
														<fieldset class="fieldset_Content_tema">
															<legend class="legend_tema">Seleccione:</legend>
															<label class="m-0  font-weight-normal" for="ingresoProveedor">
																<img src="<?= base_url() ?>assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="margin-left: 7px;" width="18px">Dependencia</label>
															<div class="form-group row ml-2 mr-2" id="div_select_nivel_1DIRECTA">
																<select class="form-control" id="select_nivel_1DIRECTA">
																	<option selected="selected">Seleccionar Dependencia</option>
																</select>
															</div>
															<div class="form-group row ml-2 mr-2" id="div_select_nivel_2DIRECTA">
																<select class="form-control" id="select_nivel_2DIRECTA">
																	<option selected="selected">Seleccionar Dependencia</option>
																</select>
															</div>
															<div class="form-group row ml-2 mr-2" id="div_select_nivel_3DIRECTA">
																<select class="form-control" id="select_nivel_3DIRECTA">
																	<option selected="selected">Seleccionar Dependencia</option>
																</select>
															</div><br>
														</fieldset>

													</div>
													<!-- </div> -->
												</div>
											</div>

										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group"><br>
													<button type="submit" class="btn btn-sm btn-info" id="BtnBuscarContacto" name="BtnBuscarContacto"><i class="fas fa-search"></i> Mostrar Contactos</button>
													<button type="Button" class="btn btn-sm btn-danger" onclick="limpiarInputsSelect()"><i class="fas fa-eraser"></i> Limpiar</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</section>
							<section class="content">
								<div id="load_contactos" class="row align-items-center justify-content-center ">
									<div class="fa-3x">
										<i class="fas fa-circle-notch fa-spin"></i> Procesando...
									</div>
								</div>
								<div class="card card-solid">
									<div class="card-body pb-0">
										<div class="row " id="DivContactos">
										</div>
									</div>
								</div>
							</section>
						</div>
						<!-- </center> -->
						<!-- END PRIMER CONTENT -->
						<div class="tab-pane fade show" id="admin"role="tabpanel">
							<section class="content ">
								<div class="container-fluid">
						
										<div class="row ">
											<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
												<div class="card  d-flex flex-fill">
													<div class="card-header text-muted border-bottom-0">
														Datos del Administrador
													</div>
													<div class="card-body pt-0">
														<div class="row">
															<div class="col-7">
																<h2 class="lead"><b>Diego Goitia</b></h2>
																<p class="text-muted text-sm"><b>Dependencia: </b> UNIDAD DE SISTEMAS </p>
																<ul class="ml-4 mb-0 fa-ul text-muted">
																	<li class='text-sm'><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <b>Direccion Dependencia:</b> Jacha Uta,Piso 4, a lado de Recepcion de Despacho</li>
																	<li class='text-sm'><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><b> Celular:</b>79588828</li>
																</ul>
															</div>
															<div class="col-5 text-center">
																<img src="<?= base_url() ?>assets/dist/img/varon.png" width="100px" alt="Diego Goitia" class="img-circle img-fluid">
															</div>
														</div>
													</div>
													<div class="card-footer">
														<!-- <div class="text-right">
															<a href="#" class="btn btn-sm bg-teal">
																<i class="fas fa-comments"></i>
															</a>
															<a href="#" class="btn btn-sm btn-primary">
																<i class="fas fa-user"></i> View Profile
															</a>
														</div> -->
													</div>
												</div>
											</div>
										</div>
								</div>
							</section>
						
						</div>

						<!-- END PRIMER CONTENT -->

						
					</div>
				</div>
				<!-- END MENUS SUPERIOR-->
			</div>
		</div>
	</section>
</div>