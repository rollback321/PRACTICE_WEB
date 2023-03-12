<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SI.S.CO.</title>

	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>



	<!-- js propio-->
	<!-- <script type="text/javascript" src="<?php //echo base_url(); ?>assets/jsPropio/configuracionPersonalizada.js"></script> -->
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- STYLOS PROPIOS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/style_propios.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">
	<!-- Alertify -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/alertify/css/alertify.min.css">
	<!-- Alertify - Bootstrap theme -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/alertify/css/themes/default.min.css" />
	<!-- BS Stepper -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
	<!-- dropzonejs -->
	<link href="<?= base_url() ?>assets/plugins/dropzone/min/dropzone.min.css" rel="stylesheet">
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/sweetalert2.min.css">
	<!-- MIS ESTILOS  -->
	<!-- <link rel="stylesheet" href="<?php // base_url() ?>assets/dist/css/estilosForm.css">
	<link rel="stylesheet" href="<?php // base_url() ?>assets/dist/css/stylevalidation.css"> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/stylegeneral.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/dist/img/plantilla/favicon.ico">


	<style type="text/css">
		@media screen and (min-width: 768px) {
			.tableCenterData {
				text-align: center;
			}
		}


		.select2-container .select2-selection--single {
			height: calc(2.25rem + 2px);
		}

		.select2-container--default .select2-selection--single .select2-selection__arrow {
			height: calc(2.25rem + 2px);
		}

		label {
			margin: 1px;
		}

		.form-row,
		.form-group {
			margin-bottom: 1px;
		}

		.modal-footer,
		.modal-body,
		.modal-header {
			padding: 2px;
		}

		legend {
			margin-bottom: 1px;

		}

		.dataTables_empty {
			font-size: 3em;
		}

		/* table,
		th,
		td {
			background: #e7e7e7;
		} */

		.custom-file-input:lang(en)~.custom-file-label::after {
			content: "+ Subir Archivo";
			background: #28a745;
			font-size: 0.7rem;
			color: #fff;
		}
		



.highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}


	</style>

</head>
<script>
	$('.start').addClass('btn-sm')
</script>

<body class="hold-transition sidebar-mini layout-fixed text-sm ">
	<div class="wrapper">
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="<?php echo base_url(); ?>assets/dist/img/plantilla/loho1.gif" alt="AdminLTELogo" width="300">
		</div>