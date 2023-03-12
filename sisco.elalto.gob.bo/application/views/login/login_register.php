<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SISCO</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/stylelogin.css">
	<!-- Alertify -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/alertify/css/alertify.min.css">

</head>

<body class="hold-transition login-page">
	<div class="img-left d-none d-md-flex"></div>
	<div class="login-box">  
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="text-center display-4 logous pt-5">
				<i class="fas fa-user-lock"></i>
			</div> 
			<div class="card-header text-center">
				<h2 class="text-center"><b>SISCO</b></h2>
			</div>
			<div class="text-center display-4" id="load_register" >
				<i class="fas fa-spinner fa-spin"></i> <br> Iniciando Sesion...                 
			</div>
			<div class="card-body">
				<p class="login-box-msg">Inicio de Sesion</p>

				<form class="form-box px-3" id="formLogin">
					<div class="form-input">
						<span><i class="fas fa-user"></i></span>
						<input type="text" name="name" id="usuario" placeholder="Usuario" tabindex="10" required>
					</div> 
					<div class="form-input">
						<span><i class="fa fa-key"></i></span>
						<input type="password" name="pass" id="password" placeholder="Contraseña" required>
					</div>
					<div class="row">          
						<!-- /.col -->
						<div class="col-12 mb-4">
							<button type="submit" class="btn btn-block ">
								Iniciar Sesion
							</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<!-- /.social-auth-links --> 
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>               

	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
	<!-- Alertify -->
	<script src="<?php echo base_url();?>assets/plugins/alertify/alertify.min.js"></script>
	<script>
		$('#load_register').hide();
		$("#formLogin").submit(function(event) {
			event.preventDefault();
			var nombreusuario = $('#usuario').val();
			var password = $('#password').val();
			$.ajax({
				type: 'POST',
				url: "<?=site_url('Welcome/go ApplicationUser');?>",
				data: {
					name: nombreusuario,
					pass: password
				},
				beforeSend: function() {
					$('#btn').prop('disabled', true);
					$('#formLogin').hide();
					$('#load_register').show();
				},
				success: function(json) {
					if (json == 'Login Correcto') {
						window.location.replace("<?=site_url('Menu_control');?>");
					} else {
						alertify.alert('SISCO', json, function() {
							alertify.success('Vuelve a intentarlo');
						});
						$('#load_register').hide();
						$('#formLogin').show();
					}

					return false;
				},
				error: function(xhr) {
					alertify.alert('SeguiPRO', 'Existe un Error, vuelta Intentarlo de Nuevo', function() {
						alertify.success('Ok');
					});
					$('#btn').prop('disabled', false);

					$('#load_register').hide();
					$('#formLogin').show();
				},
				complete: function() { 
					$('#formLogin')[0].reset();
					$('#startLogin').prop('disabled', false);
				},
				dataType: 'html'
			});
		});
	</script>
</body>

</html>
