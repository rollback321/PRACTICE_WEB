
<script>
	$(function() {
		CountBandeja();
		CargarTema();
	});

	/*=============================================
	  Section DATA TABLE USUARIOS
	=============================================*/
	listofUser = $('#tableUser').DataTable({
		"ajax": "<?= site_url('SecretaryControl/fetch_UserList'); ?>",
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
		"order": [
			[0, "asc"]
		],
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

	$(document).ready(function() {


		/*=============================================
		VALIDACION NEW PASSWORD 
		=============================================*/
		//variables
		var Newpass1 = $('[name=Newpassword]');
		var Newpass2 = $('[name=Newpassword2]');
		var confirmacion = "Contraseñas correctas";
		//var longitud = "La contraseña debe tener minimo 6 carácteres";
		var negacion = "Contraseñas Diferentes";
		var vacio = "Inserte la contraseña";
		//oculto por defecto el elemento span
		var span = $('<span id="spanPass" style="font-size: 10px;color: darkred;"></span>').insertAfter(Newpass2);
		span.hide();
		//función que comprueba las dos contraseñas
		function coincidePassword() {
			var Newvalor1 = Newpass1.val();
			var Newvalor2 = Newpass2.val();
			//muestro el span
			span.show().removeClass();
			//condiciones dentro de la función
			if (Newvalor1 != Newvalor2) {
				span.text(negacion).addClass('negacion');
				$('#ButtonModificarPass').prop('disabled', true);
			}
			if (Newvalor1.length == 0 || Newvalor1 == "") {
				span.text(vacio).addClass('negacion');
				$('#ButtonModificarPass').prop('disabled', true);
			}
			// if(valor1.length<6 || valor1.length>10){
			// span.text(longitud).addClass('negacion');
			// }
			if (Newvalor1.length != 0 && Newvalor1 == Newvalor2) {
				span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
				$('#ButtonModificarPass').prop('disabled', false);

			}
		}
		//ejecuto la función al soltar la tecla
		Newpass2.keyup(function() {
			coincidePassword();
		});
	});


	/////////////////////////////////////////////////////////
	/*=============================================
	  Section CREAR NUEVOS USUARIOS
	=============================================*/
	$("#load_register").hide();
	$("#form_crearUser").submit(function(e) {
		e.preventDefault();

		if ($("#form_crearUser").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("SecretaryControl/registrarUser") ?>",
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
					listofUser.ajax.reload(null, false);
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
		  Section EDITAR NUEVOS USUARIOS
	=============================================*/
	function ListModificarUser(id) {
		limpiarCamposCT();
		$.ajax({
			url: "<?php echo site_url('SecretaryControl/ListUserTechnical') ?>/" + id,
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
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
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
					listofUser.ajax.reload(null, false);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
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
					listofUser.ajax.reload(null, false);
				},
				dataType: 'html'
			});
		}
	});

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
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {
				listofUser.ajax.reload(null, false);
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
</script>
</body>

</html>