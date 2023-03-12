
<script>
	$(function() {
		CargarTema();
	});
	// $(document).ready(function() {

	// 	$('#load_register').hide();
	// 	$('#load_Update').hide();
	// 	$('#load_registerSecretaria').hide();
	// 	$('#load_UpdateSecretaria').hide();
	// 	$('#load_cambiarpass').hide();

	// });
	$("#load_register").hide();
	$("#load_registerSecretaria").hide();

	/*=============================================
	  Section DATA TABLE USUARIOS
	=============================================*/
	listofUserTecnicos = $('#tableUserTecnicos').DataTable({
		"ajax": "<?= site_url('JefeControl/fetch_UserListTecnico'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});
	/*=============================================
	  Section DATA TABLE USUARIOS
	=============================================*/
	listofUserSecretary = $('#tableUserSecretaria').DataTable({
		"ajax": "<?= site_url('JefeControl/fetch_UserListSecretaria'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});
	/*=============================================
	VALIDACION DEL FORMULARIO DE NUEVO USUARIO
	=============================================*/
	$(document).ready(function() {
		//variables
		var pass1 = $('[name=password]');
		var pass2 = $('[name=password2]');
		var confirmacion = "Contraseñas correctas";
		//var longitud = "La contraseña debe tener minimo 6 carácteres";
		var negacion = "Contraseñas Diferentes";
		var vacio = "Inserte la contraseña";
		//oculto por defecto el elemento span
		var span = $('<span style="font-size: 10px;color: darkred;"></span>').insertAfter(pass2);
		span.hide();
		//función que comprueba las dos contraseñas
		function coincidePasswordTecnico() {
			var valor1 = pass1.val();
			var valor2 = pass2.val();
			//muestro el span
			span.show().removeClass();
			//condiciones dentro de la función
			if (valor1 != valor2) {
				span.text(negacion).addClass('negacion');
				$('#enviarUser').prop('disabled', true);
			}
			if (valor1.length == 0 || valor1 == "") {
				span.text(vacio).addClass('negacion');
				$('#enviarUser').prop('disabled', true);
			}
			// if(valor1.length<6 || valor1.length>10){
			// span.text(longitud).addClass('negacion');
			// }
			if (valor1.length != 0 && valor1 == valor2) {
				span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
				$('#enviarUser').prop('disabled', false);
			}
		}
		//ejecuto la función al soltar la tecla
		pass2.keyup(function() {
			coincidePasswordTecnico();
		});


		////////////////////////////////////////////////////
		//variables
		var pass1Secretaria = $('[name=passwordSecretaria]');
		var pass2Secretaria = $('[name=password2Secretaria]');
		var confirmacion = "Contraseñas correctas";
		//var longitud = "La contraseña debe tener minimo 6 carácteres";
		var negacion = "Contraseñas Diferentes";
		var vacio = "Inserte la contraseña";
		//oculto por defecto el elemento span
		var span = $('<span style="font-size: 10px;color: darkred;"></span>').insertAfter(pass2Secretaria);
		span.hide();
		//función que comprueba las dos contraseñas
		function coincidePasswordSecretaria() {
			var valor1Secretaria = pass1Secretaria.val();
			var valor2Secretaria = pass2Secretaria.val();
			//muestro el span
			span.show().removeClass();
			//condiciones dentro de la función
			if (valor1Secretaria != valor2Secretaria) {
				span.text(negacion).addClass('negacion');
				$('#enviarUser').prop('disabled', true);
			}
			if (valor1Secretaria.length == 0 || valor1Secretaria == "") {
				span.text(vacio).addClass('negacion');
				$('#enviarUser').prop('disabled', true);
			}
			// if(valor1.length<6 || valor1.length>10){
			// span.text(longitud).addClass('negacion');
			// }
			if (valor1Secretaria.length != 0 && valor1Secretaria == valor2Secretaria) {
				span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
				$('#enviarUser').prop('disabled', false);
			}
		}
		//ejecuto la función al soltar la tecla
		pass2Secretaria.keyup(function() {
			coincidePasswordSecretaria();
		});
		////////////////////////////////////////////////////

	});


	/*=============================================
	  Section CREAR NUEVOS TECNICOS
	=============================================*/
	$("#form_crearUser").submit(function(e) {
		e.preventDefault();
		if ($("#form_crearUser").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("JefeControl/registrarUserTecnicos") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#enviarUser').prop('disabled', true);
					$('#form_crearUser').hide();
					$('#load_register').show();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					listofUserTecnicos.ajax.reload(null, false);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
					$('#enviarUser').prop('disabled', false);
					$('#form_crearUser')[0].reset();
					$('#load_register').hide();
					$('#form_crearUser').show();
				},
				complete: function() {
					$('#form_crearUser')[0].reset();
					$('#enviarUser').prop('disabled', false);
					$('#form_crearUser').show();
					$('#load_register').hide();
					$('#CrearTecnico').modal('hide');
				},
				dataType: 'html'
			});
		}
	});

	/*=============================================
		  Section EDITAR NUEVOS TECNICOS
	=============================================*/
	function ListModificarUser(id) {
		limpiarCamposCT();
		$.ajax({
			url: "<?php echo site_url('JefeControl/ListUserTecnicos') ?>/" + id,
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {
				$('#ButtonEditar').prop('disabled', true);
				$('#load_Update').show();
			},
			success: function(obj) {
				var data = JSON.parse(obj)
				if (parseInt(data.usu_count) > 0) {
					$('#load_Update').hide();
					$('[name="idUpdateUser"]').val(data.usu_id);
					$('[name="nombresUpdate"]').val(data.usu_nombres);
					$('[name="apellidosUpdate"]').val(data.usu_apellidos);
					$('[name="cargoUpdate"]').val(data.usu_rol_cargo);
					$('[name="ciUpdate"]').val(data.usu_ci);
					$('[name="expedidoUpdate"]').val(data.usu_ci_expedido);
					$('[name="celularUpdate"]').val(data.usu_celular);
					$("[name=generoUpdate]").val([data.usu_genero]);
					$('[name="nameUserUpdate"]').val(data.usu_rol_usuario);
					$('[name="passwordUpdate"]').val(data.usu_rol_password);
					$('[name="password2Update"]').val(data.usu_rol_password);
					$('[name="UpdateCountUser"]').val(data.usu_count);
					$('#ModificarTecnico').modal('show');
					Swal.fire({
						type: 'success',
						title: 'Tiene ' + data.usu_count + ' Oportunidades Para Modificar este Usuario',
						confirmButtonText: 'Ok'
					});
				} else {
					Swal.fire({
						type: 'error',
						title: 'No se puede realizar Mas Modificaciones a este Usuario, Por favor Contactese con el Administrador del Sistema',
						confirmButtonText: 'Ok'
					});
				}
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {

			},
			dataType: 'html'
		});
	}
	$("#form_UpdateUser").submit(function(e) {
		e.preventDefault();
		if ($("#form_UpdateUser").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("SecretaryControl/updateUser") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#enviarUpdateUser').prop('disabled', true);
					$('#form_UpdateUser').hide();
					$('#load_Update').show();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					listofUserTecnicos.ajax.reload(null, false);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
					$('#enviarUpdateUser').prop('disabled', false);
					$('#form_UpdateUser')[0].reset();
					$('#load_Update').hide();
					$('#form_UpdateUser').show();
				},
				complete: function() {
					$('#form_crearUser')[0].reset();
					$('#enviarUpdateUser').prop('disabled', false);
					$('#form_UpdateUser').show();
					$('#load_Update').hide();
					$('#ModificarTecnico').modal('hide');
					listofUserTecnicos.ajax.reload(null, false);
				},
				dataType: 'html'
			});
		}
	});

	////////////////////////// END  USER TECNICO////////////////////////

	/*=============================================
	  Section CREAR NUEVOS SECRETARIAS
	=============================================*/
	$("#form_crearUserSecretaria").submit(function(e) {
		e.preventDefault();
		if ($("#form_crearUserSecretaria").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("JefeControl/registrarUserSecretaria") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#enviarUserSecretaria').prop('disabled', true);
					$('#form_crearUserSecretaria').hide();
					$('#load_registerSecretaria').show();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					listofUserSecretary.ajax.reload(null, false);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
					$('#enviarUserSecretaria').prop('disabled', false);
					$('#form_crearUserSecretaria')[0].reset();
					$('#load_registerSecretaria').hide();
					$('#form_crearUserSecretaria').show();
				},
				complete: function() {
					$('#form_crearUserSecretaria')[0].reset();
					$('#enviarUserSecretaria').prop('disabled', false);
					$('#form_crearUserSecretaria').show();
					$('#load_registerSecretaria').hide();
					$('#CrearSecretaria').modal('hide');
				},
				dataType: 'html'
			});
		}

	});

	/*=============================================
		  Section EDITAR NUEVOS SECRETARIAS
	=============================================*/
	function ListModificarUserSecretaria(id) {
		limpiarCampoSecre();
		$('#load_UpdateSecretaria').hide();
		$.ajax({
			url: "<?php echo site_url('JefeControl/ListUserSecretaria') ?>/" + id,
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {
				$('#ButtonEditarSecretaria').prop('disabled', true);
				$('#load_UpdateSecretaria').show();
			},
			success: function(obj) {
				var data = JSON.parse(obj)
				if (parseInt(data.usu_count) > 0) {
					$('#load_Update').hide();
					$('[name="idUpdateUserSecretaria"]').val(data.usu_id);
					$('[name="nombresUpdateSecretaria"]').val(data.usu_nombres);
					$('[name="apellidosUpdateSecretaria"]').val(data.usu_apellidos);
					$('[name="cargoUpdateSecretaria"]').val(data.usu_rol_cargo);
					$('[name="ciUpdateSecretaria"]').val(data.usu_ci);
					$('[name="expedidoUpdateSecretaria"]').val(data.usu_ci_expedido);
					$('[name="celularUpdateSecretaria"]').val(data.usu_celular);
					$("[name=generoUpdateSecretaria]").val([data.usu_genero]);
					$('[name="nameUserUpdateSecretaria"]').val(data.usu_rol_usuario);
					$('[name="passwordUpdateSecretaria"]').val(data.usu_rol_password);
					$('[name="password2UpdateSecretaria"]').val(data.usu_rol_password);
					$('[name="UpdateCountUserSecretaria"]').val(data.usu_count);
					$('#ModificarSecretaria').modal('show');
					Swal.fire({
						type: 'success',
						title: 'Tiene ' + data.usu_count + ' Oportunidades Para Modificar este Usuario',
						confirmButtonText: 'Ok'
					});
				} else {
					Swal.fire({
						type: 'error',
						title: 'No se puede realizar Mas Modificaciones a este Usuario, Por favor Contactese con el Administrador del Sistema',
						confirmButtonText: 'Ok'
					});
				}
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#load_UpdateSecretaria').hide();
			},
			complete: function() {
				$('#load_UpdateSecretaria').hide();
			},
			dataType: 'html'
		});
	}

	$("#form_UpdateUserSecretaria").submit(function(e) {
		e.preventDefault();
		if ($("#form_UpdateUserSecretaria").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("JefeControl/UpdateUserSecretaria") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#ButtonEditarSecretaria').prop('disabled', true);
					$('#form_UpdateUserSecretaria').hide();
					$('#load_UpdateSecretaria').show();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					listofUserSecretary.ajax.reload(null, false);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
					$('#ButtonEditarSecretaria').prop('disabled', false);
					$('#form_UpdateUserSecretaria')[0].reset();
					$('#load_UpdateSecretaria').hide();
					$('#form_UpdateUserSecretaria').show();
				},
				complete: function() {
					$('#form_crearUser')[0].reset();
					$('#ButtonEditarSecretaria').prop('disabled', false);
					$('#form_UpdateUserSecretaria').show();
					$('#load_UpdateSecretaria').hide();
					$('#ModificarSecretaria').modal('hide');
					listofUserSecretary.ajax.reload(null, false);
				},
				dataType: 'html'
			});
		}

	});

	////////////////////////// END  USER SECRETARIA ////////////////////////

	/*=============================================
		  CAMBIAR ESTADO DE USUARIO
	=============================================*/
	function check(id) {
		var idUser = id;
		var estado = 0;
		var yes = document.getElementById(idUser);
		if (yes.checked == true) {
			estado = 1;
		} else {
			estado = 0;
		}
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/UpdateStateUser") ?>",
			data: {
				idd: idUser,
				statee: estado
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {
				listofUserTecnicos.ajax.reload(null, false);
				listofUserSecretary.ajax.reload(null, false);
			},
			dataType: 'html'
		});
	}
	/*=============================================
		  VER PASSWORD
	=============================================*/
	function verPassword(password) {
		Swal.fire({
			type: 'info',
			title: '<b>Contraseña: </b>' +" " +password,
			confirmButtonText: 'Ok'
		});
	}

	$('#btnCrearnuevotecnico').on('click', function() {
		limpiarCamposCT();
	});
	$('#btnCrearnuevasecretaria').on('click', function() {
		limpiarCampoSecre();
	});
</script>
</body>

</html>