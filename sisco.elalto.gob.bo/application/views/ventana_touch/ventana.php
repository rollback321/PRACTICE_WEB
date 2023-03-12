<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SISCO</title>

	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- MIS ESTILOS  -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/estilosForm.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/stylevalidation.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">

	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">
	<!-- Alertify -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/alertify/css/alertify.min.css">
	<!-- Alertify - Bootstrap theme -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/alertify/css/themes/default.min.css" />
	<!-- BS Stepper -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
	<!-- Select2 -->

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/sweetalert2.min.css">

	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- jsGrid -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jsgrid/jsgrid.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jsgrid/jsgrid-theme.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- dropzonejs -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/dropzone/min/dropzone.min.css">

	<style type="text/css">
		body {
			background: #E1E1E1;
			min-width: 200px;
		}

		#Principal {
			width: 100%;
			height: auto;
			display: flex;
			justify-content: center;
			/* align-items: center; */
			/* padding-top:5%; */
		}

		#Calculadora {
			/* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5); */
			/* -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5); 
  -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5); 
*/
		}

		#Pantalla {
			background: white;
			background: linear-gradient(141deg, #0fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
			font-size: 20px;
			height: 100px;
			width: 100%;
			border: 0;
			margin: 0;
			text-align: right;
			padding: 10px;
			color: white;
			font-family: 'Roboto Condensed', sans-serif;
		}

		#Teclado {
			background: #3A434F;
		}

		.button {
			background: #3A434F;
			font-family: 'Roboto Condensed', sans-serif;
			font-size: 30px;
			margin: 0;
			padding: 5px;
			border: 2;
			color: #FCFCFD;
			width: 130px;
			height: 90px;
			min-width: 15px;
			min-height: 10px;
			transition: all .2s ease-in-out;
			-webkit-transition: all .2s ease-in-out;
			-moz-transition: all .2s ease-in-out;
		}

		.button:hover {
			transform: scale(1.1);
			-webkit-transform: scale(1.1);
			background: #5A656F;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.2);
		}

		.button:active {
			transform: scale(1);
		}

		header {
			background: url('http://www.autodatz.com/wp-content/uploads/2017/05/Old-Car-Wallpapers-Hd-36-with-Old-Car-Wallpapers-Hd.jpg');
			text-align: center;
			width: 100%;
			height: auto;
			background-size: cover;
			background-attachment: fixed;
			position: relative;
			overflow: hidden;
			border-radius: 0 0 85% 85% / 30%;
		}

		header .overlay {
			width: 100%;
			height: 20%;
			padding: 50px;
			color: #FFF;
			text-shadow: 1px 1px 1px #333;
			background-image: linear-gradient(135deg, #9f05ff69 10%, #fd5e086b 100%);
		}

		.clockdate-wrapper {
			background-color: #333;
			padding: 5px;
			max-width: 450px;
			width: 100%;
			text-align: center;
			border-radius: 5px;
			margin: 0 auto;
			margin-top: 1%;
		}

		#clock {
			background-color: #fff;
			font-family: sans-serif;
			font-size: 25px;
			text-shadow: 0px 0px 1px #fff;
			color: #000;
		}

		#clock span {
			color: #000;
			text-shadow: 0px 0px 1px #333;
			font-size: 10px;
			position: relative;
			top: -27px;
			left: -10px;
		}

		#date {

			font-size: 16px;
			font-family: arial, sans-serif, italic;
			color: #000;
		}

		.BotonBuscar {
			font-size: 1.7rem;
		}

		.cajabuscador {

  width: 410px;
  /* height: 40px; */
  margin: 0 auto;
  position: relative;
  padding: 2px;
  text-align: center;


		}

		.h1Titulo {
			font-size: 2.5rem;
		}

		.h5Titulo {
			font-size: 1.35rem;
		}

		.etiquetaTitulo {
			font-size: 1.2em;
			padding-left: 8px;
		}

		.etiquetaDatos {
			font-size: 1.8rem;
		}

		.ContentDatos {
			border-radius: 20px;
			border: 1px solid #17A2B8;
			width: 90%;
			margin: 0 auto;
		}

		.ContentDatos2 {
			border-radius: 20px;
			border: 1px  #17A2B8;
			width: 60%;
			margin: 0 auto;
		}

		.BotonCerrar {
			width: 15%;
		}

		/*Portada*/
		.container-portada {
			width: 100%;
			height: 230px;
			position: relative;
			background-image: url('<?php echo base_url() ?>assets/dist/img/plantilla/alcaldia.png');
			background-size: 100%;
			animation: movimiento 20s infinite linear alternate;
		}

		@keyframes movimiento {
			from {
				background-position: bottom left;
			}

			to {
				background-position: top right;
			}
		}

		.capa-gradient {
			width: 100%;
			height: 100%;
			position: absolute;
			background: -webkit-linear-gradient(left, black, #0672d0);
			opacity: 0.5;
		}

		.container-details {
			width: 100%;
			max-width: 1200px;
			position: relative;
			margin: auto;
		}

		.details {
			width: 100%;
			max-width: 1100px;
			position: relative;
			top: 10px;
			color: white;
		}

		.details h1 {
			font-size: 40px;
			font-weight: 100;
			margin-left: 10px;
		}

		.details p {
			margin-top: 10px;
			font-size: 20px;
			font-weight: 100;
			margin-left: 10px;
		}

		.details button:hover {
			background: white;
			color: black;
		}

		.titulo {
			color: white;
			font-size: 280%;
			text-align: center;
			text-shadow: 0 0 0.2em #87F, 0 0 0.2em #87F, 0 0 0.2em #87F
		}

		.fuente {
			font-size: 1.975rem !important;
		}

		.imageniz {
			width: 20%;
		}

		.imagende {
			width: 26%
		}

		.divimageniz {
			width: 25%;
			margin-top: 60px;
		}

		.divcentro {
			width: 50%;
			margin-top: 25px;
		}

		.divimagende {
			width: 25%;
			margin-top: 60px;
		}

		@media screen and (max-width: 768px) {
			.container-portada {
				width: 100%;
				height: 100px;
				position: relative;
				background-image: url('<?php echo base_url() ?>assets/dist/img/plantilla/alcaldia.png');
				background-size: 100%;
				animation: movimiento 20s infinite linear alternate;
			}

			.titulo {
				color: white;
				font-size: 100%;
				text-align: center;
				text-shadow: 0 0 0.2em #87F, 0 0 0.2em #87F, 0 0 0.2em #87F
			}

			.BotonCerrar {
				width: 70%;
			}

			.button {
				background: #3A434F;
				font-family: 'Roboto Condensed', sans-serif;
				font-size: 25px;
				margin: 0;
				padding: 5px;
				border: 2;
				color: #FCFCFD;
				width: 90px;
				height: 60px;
				min-width: 15px;
				min-height: 10px;
				transition: all .2s ease-in-out;
				-webkit-transition: all .2s ease-in-out;
				-moz-transition: all .2s ease-in-out;
			}

			.fuente {
				font-size: 1.075rem !important;
			}

			.cajabuscador {
				/* width: 80%;
				margin: 0 auto; */
				width: 280px;
  /* height: 40px; */
  margin: 0 auto;
  position: relative;
  padding: 2px;
  text-align: center;

			}

			.h1Titulo {
				font-size: 1.1rem;
			}


			.BotonBuscar {
				font-size: 1rem;
			}

			.h1Titulo2 {
				font-size: 1.7rem;
			}

			.h5Titulo {
				font-size: 1.15rem;
			}

			.etiquetaTitulo {
				font-size: 1.2rem;
				padding-left: 8px;
			}

			.etiquetaDatos {
				font-size: 0.9rem;
			}

			.ContentDatos {
				border-radius: 20px;
				border: 1px solid #17A2B8;
				width: 90%;
				margin: 0 auto;
			}

			.imageniz {
				width: 30%;
			}

			.imagende {
				width: 36%
			}

			.divimageniz {
				width: 25%;
				margin-top: 30px;
			}

			.divcentro {
				width: 50%;
				margin-top: 30px;
			}

			.divimagende {
				width: 25%;
				margin-top: 30px;
			}

			.ContentDatos2 {
				border-radius: 20px;
				border: 1px  #17A2B8;
				width: 90%;
				margin: 0 auto;
			}

		}
	</style>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/stylegeneral.css">

</head>

<header>
	<div class="container-portada">
		<div class="row">
			<div class="divimageniz">
				<img src="<?php echo base_url() ?>assets/dist/img/plantilla/escudo_elalto.png" class="imageniz">
			</div>
			<div class="divcentro">
				<h1 class="titulo">Gobierno Autonomo Municipal de El Alto</h1>
			</div>
			<div class="divimagende">
				<img src="<?php echo base_url() ?>assets/dist/img/plantilla/logo.png" class="imagende">
			</div>

		</div>

	</div>
	</div>
</header>

<body onload="startTime()" style="background-image: url('<?php echo base_url() ?>assets/dist/img/plantilla/fondo2.jpg');background-position: center center;background-repeat: no-repeat;background-size: cover;">

	<!-- Content Wrapper. Contains page content -->
	<section class="content">
		<h2 class="text-center display-8 h1Titulo2" style=" font-weight: bold;"><b>SISTEMA DE SEGUIMIENTO DE CORRESPONDENCIA<b></h2>
		<h3 class="text-center display-8 h1Titulo" style=" font-weight: bold;"><b>(SI.S.CO.)<b></h3></br>

		<div class="row">
			<div class="col-sm">
				<div id="buscador">
					<h5 class="text-center display-8 h5Titulo">Introduzca el codigo de la Hoja de Ruta</h5>

					<!-- <div class="col-md-8 offset-md-2"> -->
					<!-- <div class=""> -->
						<form id="form_Buscar" name="form_Buscar" method="post">
							<div class="input-group input-group-sm cajabuscador">
								<div class="input-group-prepend">
									<span class="input-group-text fuente" style="background:#6c757d;color:#fff;radius:10px;">GAMEA</span>
								</div>
								<input type="text" class="fuente form-control " placeholder="Ej. 252" id="codCorres" name="codCorres" style="height:auto;border-color:#007bff;" autofocus>
								<select class="custom-select form-control-sm fuente" id="gestion" name="gestion" style="height: auto;   margin-left:10px; padding:3;" aria-invalid="false">
									<option value="2021">2021</option>
									<option value="2022"selected="selected">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
								</select>
								<!-- <button type="submit" class="btn btn-primary btn-lg btn-block" id="search" style="margin-top: 1.666667%;"> <i class="fas fa-search"></i> BUSCAR</button> -->
							</div>

						</form>
						<!-- </form> -->
					<!-- </div> -->


					<div id="Principal">
						<!-- <button type="submit" class=" BotonBuscar btn btn-primary btn-lg btn-block p-3" id="search" name="search" style="margin-top: 1.666667%;"> <i class="fas fa-search"></i> <span class="h2">BUSCAR</span></button> -->
						<div id="Calculadora">
							<div id="Teclado" class="buttons">
								<button class="button" value="7">7</button>
								<button class="button" value="8">8</button>
								<button class="button" value="9">9</button><br>
								<button class="button" value="4">4</button>
								<button class="button" value="5">5</button>
								<button class="button" value="6">6</button><br>
								<button class="button" value="1">1</button>
								<button class="button" value="2">2</button>
								<button class="button" value="3">3</button><br>
								<button class="button" value="0">0</button>
								<button class="button" value="CE">Borrar</button>
							</div>
							<button type="submit" class=" BotonBuscar btn btn-primary btn-lg btn-block p-3" id="search" name="search" style="margin-top: 1.666667%;"> <i class="fas fa-search"></i> <span class="BotonBuscar">BUSCAR</span></button>
						</div>

					</div>
					<center>
						<br>
						<span id="clock"></span>
						<span id="date"></span>
					</center>

				</div>

				<div class="container-fluid font-13" style="text-align: center;" id="titulo">
					<h2 class="h1Titulo2"><b>DATOS ENCONTRADOS <b></h2>
				</div>

				<div class="row ContentDatos" id="divSearch">
				</div>



				<div id="UnDato">
					<div class="col-md-12">
						<div class="form-group ContentDatos2">
							<!-- <h1 class="h1Titulo" style="text-align: center;"><b>DATOS DE LA HOJA DE RUTA <b></h1> -->

							<h3 style="text-align: center;"> <b>DATOS ENCONTRADOS<b> </h3>
							<h4 style="text-align: center;"><span title="3 New Messages" class="badge bg-success cod_GAMEA"></b></span> <br> <span title="3 New Messages" class="badge bg-success cod_sup"></b></span> </h4>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label class="etiquetaTitulo" style="color: #007bff;"><img src="<?= base_url() ?>assets/dist/img/dependencia.svg" class="img-circle elevation-2"  alt="dependencia" height="40" >   UBICACION ACTUAL:</label>
									<!-- <textarea class="form-control etiquetaDatos" id="Search_dependenciaactual" name="Search_dependenciaactual"></textarea> -->
								<br><span class="ubi" style="padding-left: 25px;text-align: center;align-items: center;" id="Search_dependenciaactual" name="Search_dependenciaactual"for=""></span>
								</div>
								<div class="form-group col-md-6">
									<label class="etiquetaTitulo"style="color: #007bff;"><img src="<?= base_url() ?>assets/dist/img/plantilla/hombre-de-negocios.svg" height="40" class="img-circle elevation-2"  alt="User Image">  CON EL SERVIDOR PUBLICO:</label>
									<!-- <textarea type="text" class="form-control etiquetaDatos" id="Search_funcionario" name="Search_funcionario"></textarea> -->
									<br><span class="fun" style="padding-left: 25px;text-align: center;align-items: center;" for=""id="Search_funcionario" name="Search_funcionario"></span>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label class="etiquetaTitulo"style="color: #007bff;"><img src="<?= base_url() ?>assets/dist/img/plantilla/referencia.jpeg" height="40"  class="img-circle elevation-2"  alt="User Image">  REFERENCIA: </label>
								
									<!-- <textarea type="text" class="form-control etiquetaDatos" id="Search_referencia" name="Search_referencia"></textarea> -->
									<br><span class="ref"style="padding-left: 25px;text-align: center;align-items: center;"  for=""id="Search_referencia" name="Search_referencia"></span>
								</div>
								<div class="form-group col-md-6">
									<label class="etiquetaTitulo"style="color: #007bff;"><img src="<?= base_url() ?>assets/dist/img/plantilla/estado.jpeg" height="40" class="img-circle elevation-2"  alt="User Image">  ESTADO:</label>
									<!-- <textarea type="text" class="form-control etiquetaDatos" id="Search_estado" name="Search_estado"></textarea> -->
									<br><span class="estado" style="padding-left: 25px;text-align: center;align-items: center;" for=""id="Search_estado" name="Search_estado"></span>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
								<img src="<?= base_url() ?>assets/dist/img/plantilla/calendario.jpeg" height="40"  class="img-circle elevation-2"  ><span  class="Fechasss" style="color: #007bff;font-size: 1.2em;padding-left: 8px;"></span>
									<!-- <textarea type="text" class="form-control etiquetaDatos" id="Search_fecha" name="Search_fecha"></textarea> -->
									<br><span class="fecha" style="padding-left: 25px;text-align: center;align-items: center;" for=""id="Search_fecha" name="Search_fecha"></span>
								</div>
							</div>


							<!-- <center><button type="button" style="width:40%;text-align: center;" class="btn btn-block bg-gradient-primary btn-lg" onclick="mostrarOcultarBuscador()">Cerrar</button><center><br> -->

						</div>
					</div>
				</div>

				<div class="row ContentDatos" id="SegundoContenedor">

				</div>

				<div class="container-fluid font-13 " style="text-align: center;align-items: center;" id="ButtonCerrar">
					<center> <br><button type="button" style="text-align: center;" class=" BotonCerrar btn btn-block bg-gradient-primary btn-lg" onclick="mostrarOcultarBuscador()">CERRAR</button><br></center>
				</div>





				<center>
					<div id="datosVacios">
						<div class="col-md-12">
							<div class="form-group ContentDatos">
								<br>
								<h2 class="h1Titulo"><b>NO SE ENCONTRO LA HOJA DE RUTA <b></h2>
								<img src="<?php echo base_url() ?>assets/dist/img/plantilla/documento.png" style="width:20%">
								<br>
								<button type="button" style="width:45%;text-align: center;" class="BotonCerrar btn btn-block bg-gradient-primary btn-lg" onclick="mostrarOcultarBuscador()">Cerrar</button><br>
							</div>
						</div>
					</div>
				</center>


			</div>
		</div>
	</section>