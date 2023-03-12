
<script>
	$("#load_register_jefe").hide();
	$("#load_Update_jefe").hide();
	$("#load_register_tecnico").hide();
	$("#load_Update_tecnico").hide();
	$("#load_register_secretaria").hide();
	$("#load_Update_secretaria").hide();
	function displayLevel_1(niv_id, niv_name, niv_initials) {
		$('.titleLevel_1').text(niv_name);
		$('.titleInitialsLevel_1').text(niv_initials);
		$('.titleInitialsLevel_1').attr('title', niv_name);
		$('.titleInitialsLevel_1').attr('onClick', 'detail_level1_1("' + niv_id + '");');
		$.ajax({
			type: 'POST',
			url: "<?= site_url('AdministratorControl/list_Of_Direction'); ?>",
			data: {
				niv_id_1: niv_id
			},
			success: function(json) {
				var obj = JSON.parse(json);
				var html = '';
				//	LimpiarTablas();
				for (var i = 0; i < obj.length; i++) {
					html += '<li id="D' + obj[i].niv2_id + '"><a href="#" onclick="detail_level2_2(' + niv_id + ',' + obj[i].niv2_id + ')" title="' + obj[i].niv2_nombre + '">' + obj[i].niv2_sigla + '</a>';
					//alert(list_Of_Units(obj[i].niv2_id));
					html += list_Of_Units(niv_id, obj[i].niv2_id);
					html += '</li>';
				}
				$('#address_structure').html(html);
			},
			error: function(xhr) {
				alertify.alert('SeguiPRO', 'Existe un Error, vuelta Intentarlo de Nuevo', function() {
					alertify.success('Ok');
				});
			},
			dataType: 'html'
		});
	}

	function inputniv1(niv1_id) {
		$('#niv1').val(niv1_id);
		$('#niv1S').val(niv1_id);
		$('#niv1T').val(niv1_id);
	}
	function inputniv2(niv1_id,niv2_id) {
		$('#niv1').val(niv1_id);
		$('#niv1S').val(niv1_id);
		$('#niv1T').val(niv1_id);
		$('#niv2').val(niv2_id);
		$('#niv2S').val(niv2_id);
		$('#niv2T').val(niv2_id);
	}
	function inputniv3(niv1_id,niv2_id,niv3_id) {
		$('#niv1').val(niv1_id);
		$('#niv1S').val(niv1_id);
		$('#niv1T').val(niv1_id);
		$('#niv2').val(niv2_id);
		$('#niv2S').val(niv2_id);
		$('#niv2T').val(niv2_id);
		$('#niv3').val(niv3_id);
		$('#niv3S').val(niv3_id);
		$('#niv3T').val(niv3_id);
	}
	function list_Of_Units(niv1_id, niv2_id) {
		//	LimpiarTablas();
		var list_html;
		$.ajax({
			type: 'POST',
			url: "<?= site_url('AdministratorControl/list_Of_Units'); ?>",
			data: {
				niv_id_2: niv2_id
			},
			async: false,
			success: function(json) {
				var data = JSON.parse(json);
				var htm = '';
				htm += '<ul>';
				for (var j = 0; j < data.length; j++) {
					htm += '<li onclick="detail_level3_3(' + niv1_id + ',' + niv2_id + ',' + data[j].niv3_id + ')" title="' + data[j].niv3_nombre + '"><a href="#">' + data[j].niv3_sigla + '</a></li>';
				}
				htm += '</ul>';
				list_html = htm;
			}
		});
		return list_html;
	}

	function detail_level1_1(niv_id_1) {
		LimpiarTablas();
		inputniv1(niv_id_1);
		var listofUserJefe = $('#tableUserJefe').DataTable({
			"ajax": "<?= site_url('AdministratorControl/fetch_UserListJefeniv_1') ?>/" + niv_id_1,
			"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
		var listofUserSecretaria = $('#tableUserSecretaria').DataTable({
			"ajax": "<?= site_url('AdministratorControl/fetch_UserListSecretarianiv_1') ?>/" + niv_id_1,
			"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
		var listofUserTecnico = $('#tableUserTecnico').DataTable({
			"ajax": "<?= site_url('AdministratorControl/fetch_UserListTecniconiv_1') ?>/" + niv_id_1,
			"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
	}

	function LimpiarTablas() {
		$('#tableUserJefe').dataTable().fnDestroy();
		$('#tableUserSecretaria').dataTable().fnDestroy();
		$('#tableUserTecnico').dataTable().fnDestroy();
		$('#niv1').val('');
		$('#niv1S').val('');
		$('#niv2').val('');
		$('#niv2S').val('');
		$('#niv3').val('');
		$('#niv3S').val('');
		$('#niv3T').val('');
	}
	// function detail_level2_2(niv_id_1,niv_id_2){
	// 	alert(niv_id_1+'------'+niv_id_2);
	// }
	// function detail_level3_3(niv_id_1,niv_id_2,niv_id_3){
	// 	alert(niv_id_1+'------'+niv_id_2+'------'+niv_id_3);
	// }
	function detail_level2_2(niv_id_1, niv_id_2) {
		LimpiarTablas();
		inputniv2(niv_id_1, niv_id_2);
		var listofUserJefe = $('#tableUserJefe').DataTable({
			"ajax": "<?= site_url('AdministratorControl/fetch_UserListJefeniv_2') ?>/" + niv_id_1 + "/" + niv_id_2,
			"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
		var listofUserSecretaria = $('#tableUserSecretaria').DataTable({
			"ajax": "<?= site_url('AdministratorControl/fetch_UserListSecretarianiv_2') ?>/" + niv_id_1 + "/" + niv_id_2,
			"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
		var listofUserTecnico = $('#tableUserTecnico').DataTable({
			"ajax": "<?= site_url('AdministratorControl/fetch_UserListTecniconiv_2') ?>/" + niv_id_1 + "/" + niv_id_2,
			"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
	}

	function detail_level3_3(niv_id_1, niv_id_2, niv_id_3) {
		LimpiarTablas();
		inputniv3(niv_id_1, niv_id_2, niv_id_3);
		var listofUserJefe = $('#tableUserJefe').DataTable({
			"ajax": "<?= site_url('AdministratorControl/fetch_UserListJefeniv_3') ?>/" + niv_id_1 + "/" + niv_id_2 + "/" + niv_id_3,
			"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
		var listofUserSecretaria = $('#tableUserSecretaria').DataTable({
			"ajax": "<?= site_url('AdministratorControl/fetch_UserListSecretarianiv_3') ?>/" + niv_id_1 + "/" + niv_id_2 + "/" + niv_id_3,
			"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
		var listofUserTecnico = $('#tableUserTecnico').DataTable({
			"ajax": "<?= site_url('AdministratorControl/fetch_UserListTecniconiv_3') ?>/" + niv_id_1 + "/" + niv_id_2 + "/" + niv_id_3,
			"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
	}

	/*=============================================
	  VALIDACION NEW PASSWORD 
	=============================================*/
	$(document).ready(function() {
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


/*=============================================
	  Section CREAR NUEVOS JEFES
	=============================================*/
	$("#form_crearUserJefe").submit(function(e) {
		e.preventDefault();
		$n1=document.getElementById('niv1').value;
		$n2=document.getElementById('niv2').value;
		$n3=document.getElementById('niv3').value;
		$.ajax({
			type: 'POST',
			url: "<?=site_url("AdministratorControl/registrarUserJefe")?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#enviarUserJefe').prop('disabled', true);
				$('#form_crearUserJefe').hide();
				$('#load_register_jefe').show();
			},
			success: function(data) {
				//alertify.alert('SISCO', data, function(){ alertify.success('Ok'); });	
				Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Jefe Creado Correctamente',
				showConfirmButton: false,
				timer: 1500
				});
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function(){ alertify.error('Cancel'); });
				$('#enviarUserJefe').prop('disabled', false);
				$('#form_crearUserJefe')[0].reset();
				$('#load_register_jefe').hide();
				$('#form_crearUserJefe').show();
			},
			complete: function() {
				$('#form_crearUserJefe')[0].reset();
				$('#enviarUserJefe').prop('disabled', false);
				$('#form_crearUserJefe').show();
				$('#load_register_jefe').hide();
				$('#CrearJefe').modal('hide');
				if($n1>0 &&  $n2==0 && $n3==0)
				{ var a=  new detail_level1_1($n1); a.listofUserJefe;
				} 
				if($n1>0 &&  $n2>0  && $n3==0)
				{ var b=  new detail_level2_2($n1, $n2); b.listofUserJefe;
				}
				if($n1>0 &&  $n2>0  && $n3>0 )
				{ var c=  new detail_level3_3($n1, $n2, $n3); c.listofUserJefe;
				} 
			},
			dataType: 'html'
		});

	});

	/*=============================================
		  Section EDITAR NUEVOS JEFES
	=============================================*/
	function ListModificarUserJefe(id) {

		$.ajax({
			url: "<?php echo site_url('AdministratorControl/ListUserUpdate')?>/" + id,
			type: "GET",
			dataType: "JSON",
			beforeSend: function () {
				$('#enviarUpdateUserJefe').prop('disabled', true);
				$('#load_Update_jefe').show();
			},
			success: function(obj) {
				var data=JSON.parse(obj)
				if (parseInt(data.usu_count) > 0) {
					$('#load_Update_jefe').hide();
					$('[name="idUpdateUserJefe"]').val(data.usu_id);
					$('[name="nombresUpdateJefe"]').val(data.usu_nombres);
					$('[name="apellidosUpdateJefe"]').val(data.usu_apellidos);
					$('[name="cargoUpdateJefe"]').val(data.usu_rol_cargo);
					$('[name="ciUpdateJefe"]').val(data.usu_ci);
					$('[name="expedidoUpdateJefe"]').val(data.usu_ci_expedido);
					$('[name="celularUpdateJefe"]').val(data.usu_celular);
					$("[name=generoUpdateJefe]").val([data.usu_genero]);
					$('[name="nameUserUpdateJefe"]').val(data.usu_rol_usuario);
					$('[name="passwordUpdateJefe"]').val(data.usu_rol_password);
					$('[name="password2UpdateJefe"]').val(data.usu_rol_password);
					$('[name="UpdateCountUserJefe"]').val(data.usu_count);
					$('#ModificarJefe').modal('show');
					alertify.alert('SISCO','Tiene <span style="color:red;">'+data.usu_count+'</span> Oportunidades Para Modificar este Usuario', function(){ alertify.success('Ok'); });
					} else {
					alertify.alert('SISCO','No se puede realizar Mas Modificaciones a este Usuario, Por favor Contactese con el Administrador del Sistema', function(){ alertify.success('Ok'); });
				}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function(){ alertify.error('Cancel'); });
			},
			complete: function() {
				$('#load_Update_jefe').hide();
				$('#enviarUpdateUserJefe').prop('disabled', false);
			},
			dataType: 'html'
		});
	}

	$("#form_UpdateUserJefe").submit(function(e) {
		e.preventDefault();
		$n1=document.getElementById('niv1').value;
		$n2=document.getElementById('niv2').value;
		$n3=document.getElementById('niv3').value;
		$.ajax({
			type: 'POST',
			url: "<?=site_url("AdministratorControl/updateUserJefe")?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#enviarUpdateUserJefe').prop('disabled', true);
				$('#form_UpdateUserJefe').hide();
				$('#load_Update_jefe').show();
			},
			success: function(data) {
				//alertify.alert('SISCO', data, function(){ alertify.success('Ok'); });
				Swal.fire({
				type: 'success',
				title: data,
				showConfirmButton: false,
				timer: 2500
				});
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function(){ alertify.error('Cancel'); });
				$('#enviarUpdateUserJefe').prop('disabled', false);
				$('#form_UpdateUserJefe')[0].reset();
				$('#load_Update_jefe').hide();
				$('#form_UpdateUserJefe').show();
			},
			complete: function() {
				$('#form_UpdateUserJefe')[0].reset();
				$('#enviarUpdateUserJefe').prop('disabled', false);
				$('#form_UpdateUserJefe').show();
				$('#load_Update_jefe').hide();
				$('#ModificarJefe').modal('hide');
				if($n1>0 &&  $n2==0 && $n3==0)
				{ var a=  new detail_level1_1($n1); a.listofUserJefe;
				} 
				if($n1>0 &&  $n2>0  && $n3==0)
				{ var b=  new detail_level2_2($n1, $n2); b.listofUserJefe;
				}
				if($n1>0 &&  $n2>0  && $n3>0 )
				{ var c=  new detail_level3_3($n1, $n2, $n3); c.listofUserJefe;
				} 
			},
			dataType: 'html'
		});
	});

	////////////////////////// END  USER TECNICO////////////////////////

	/*=============================================
	  Section CREAR NUEVOS TECNICOS
	=============================================*/
	$("#form_crearUserTecnico").submit(function(e) {
		e.preventDefault();
		$n1=document.getElementById('niv1T').value;
		$n2=document.getElementById('niv2T').value;
		$n3=document.getElementById('niv3T').value;
		$.ajax({
			type: 'POST',
			url: "<?=site_url("AdministratorControl/registrarUserTecnico")?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#enviarUserTecnico').prop('disabled', true);
				$('#form_crearUserTecnico').hide();
				$('#load_register_tecnico').show();
			},
			success: function(data) {
				//alertify.alert('SISCO', data, function(){ alertify.success('Ok'); });
				Swal.fire({
				type: 'success',
				title: data,
				showConfirmButton: false,
				timer: 2500
				});
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function(){ alertify.error('Cancel'); });
				$('#enviarUserTecnico').prop('disabled', false);
				$('#form_crearUserTecnico')[0].reset();
				$('#load_register_tecnico').hide();
				$('#form_crearUserTecnico').show();
			},
			complete: function() {
				$('#form_crearUserTecnico')[0].reset();
				$('#enviarUserTecnico').prop('disabled', false);
				$('#form_crearUserTecnico').show();
				$('#load_register_tecnico').hide();
				$('#CrearTecnico').modal('hide');
				if($n1>0 &&  $n2==0 && $n3==0)
				{ var a=  new detail_level1_1($n1); a.listofUserTecnico;
				} 
				if($n1>0 &&  $n2>0  && $n3==0)
				{ var b=  new detail_level2_2($n1, $n2); b.listofUserTecnico;
				}
				if($n1>0 &&  $n2>0  && $n3>0 )
				{ var c=  new detail_level3_3($n1, $n2, $n3); c.listofUserTecnico;
				} 
			},
			dataType: 'html'
		});

	});

	/*=============================================
		  Section EDITAR NUEVOS TECNICOS
	=============================================*/
	function ListModificarUserTecnico(id) {
		$.ajax({
			url: "<?php echo site_url('AdministratorControl/ListUserUpdate')?>/" + id,
			type: "GET",
			dataType: "JSON",
			beforeSend: function () {
				$('#enviarUpdateUsertecnico').prop('disabled', true);
				$('#load_Update_tecnico').show();
			},
			success: function(obj) {
				var data=JSON.parse(obj)
				if (parseInt(data.usu_count) > 0) {
					$('#load_Update_tecnico').hide();
					$('[name="idUpdateUserTecnico"]').val(data.usu_id);
					$('[name="nombresUpdateTecnico"]').val(data.usu_nombres);
					$('[name="apellidosUpdateTecnico"]').val(data.usu_apellidos);
					$('[name="cargoUpdateTecnico"]').val(data.usu_rol_cargo);
					$('[name="ciUpdateTecnico"]').val(data.usu_ci);
					$('[name="expedidoUpdateTecnico"]').val(data.usu_ci_expedido);
					$('[name="celularUpdateTecnico"]').val(data.usu_celular);
					$("[name=generoUpdateTecnico]").val([data.usu_genero]);
					$('[name="nameUserUpdateTecnico"]').val(data.usu_rol_usuario);
					$('[name="passwordUpdateTecnico"]').val(data.usu_rol_password);
					$('[name="password2UpdateTecnico"]').val(data.usu_rol_password);
					$('[name="UpdateCountUserTecnico"]').val(data.usu_count);
					$('#ModificarTecnico').modal('show');
					alertify.alert('SISCO','Tiene <span style="color:red;">'+data.usu_count+'</span> Oportunidades Para Modificar este Usuario', function(){ alertify.success('Ok'); });
					} else {
					alertify.alert('SISCO','No se puede realizar Mas Modificaciones a este Usuario, Por favor Contactese con el Administrador del Sistema', function(){ alertify.success('Ok'); });
				}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function(){ alertify.error('Cancel'); });
			},
			complete: function() {
				$('#load_Update_tecnico').hide();
				$('#enviarUpdateUsertecnico').prop('disabled', false);
			},
			dataType: 'html'
		});
	}

	
	$("#form_UpdateUserTecnico").submit(function(e) {
		e.preventDefault();
		$n1=document.getElementById('niv1').value;
		$n2=document.getElementById('niv2').value;
		$n3=document.getElementById('niv3').value;
		$.ajax({
			type: 'POST',
			url: "<?=site_url("AdministratorControl/updateUserTecnico")?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#enviarUpdateUsertecnico').prop('disabled', true);
				$('#form_UpdateUserTecnico').hide();
				$('#load_Update_tecnico').show();
			},
			success: function(data) {
				//alertify.alert('SISCO', data, function(){ alertify.success('Ok'); });
				Swal.fire({
				type: 'success',
				title: data,
				showConfirmButton: false,
				timer: 2500
				});
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function(){ alertify.error('Cancel'); });
				$('#enviarUpdateUsertecnico').prop('disabled', false);
				$('#form_UpdateUserTecnico')[0].reset();
				$('#load_Update_tecnico').hide();
				$('#form_UpdateUserTecnico').show();
			},
			complete: function() {
				$('#form_UpdateUserTecnico')[0].reset();
				$('#enviarUpdateUsertecnico').prop('disabled', false);
				$('#form_UpdateUserTecnico').show();
				$('#load_Update_tecnico').hide();
				$('#ModificarTecnico').modal('hide');
				if($n1>0 &&  $n2==0 && $n3==0)
				{ var a=  new detail_level1_1($n1); a.listofUserTecnico;
				} 
				if($n1>0 &&  $n2>0  && $n3==0)
				{ var b=  new detail_level2_2($n1, $n2); b.listofUserTecnico;
				}
				if($n1>0 &&  $n2>0  && $n3>0 )
				{ var c=  new detail_level3_3($n1, $n2, $n3); c.listofUserTecnico;
				} 
			},
			dataType: 'html'
		});
	});
	////////////////////////// END  USER TECNICO////////////////////////

	/*=============================================
	  Section CREAR NUEVOS SECRETARIAS
	=============================================*/
		$("#form_crearUserSecretaria").submit(function(e) {
		e.preventDefault();
		        $n1=document.getElementById('niv1S').value;
		        $n2=document.getElementById('niv2S').value;
		        $n3=document.getElementById('niv3S').value;
		$.ajax({
			type: 'POST',
			url: "<?=site_url("AdministratorControl/registrarUserSecretaria")?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#enviarUserSecretaria').prop('disabled', true);
				$('#form_crearUserSecretaria').hide();
				$('#load_registerSecretaria').show();
				console.log($n1, $n2, $n3);
			},
			success: function(data) {
			//	alertify.alert('SISCO', data, function(){ alertify.success('Ok'); });
			Swal.fire({
				type: 'success',
				title: data,
				showConfirmButton: false,
				timer: 2500
				});
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function(){ alertify.error('Cancel'); });
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
				if($n1>0 &&  $n2==0 && $n3==0)
				{ var a=  new detail_level1_1($n1); 
					a.listofUserSecretaria;
				} 
				if($n1>0 &&  $n2>0  && $n3==0)
				{ var b=  new detail_level2_2($n1, $n2); 
					b.listofUserSecretaria;
				}
				if($n1>0 &&  $n2>0  && $n3>0 )
				{ var c=  new detail_level3_3($n1, $n2, $n3);
					 c.listofUserSecretaria;
				} 
			},
			dataType: 'html'
		});

	});

	/*=============================================
		  Section EDITAR NUEVOS SECRETARIAS
	=============================================*/

	function ListModificarUserSecretaria(id) {
		$('#load_Update_secretaria').hide();
		$.ajax({
			url: "<?php echo site_url('AdministratorControl/ListUserUpdate')?>/" + id,
			type: "GET",
			dataType: "JSON",
			beforeSend: function () {
				$('#ButtonEditarSecretaria').prop('disabled', true);
				$('#load_Update_secretaria').show();
			},
			success: function(obj) {
				var data=JSON.parse(obj)
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
					alertify.alert('SISCO','Tiene <span style="color:red;">'+data.usu_count+'</span> Oportunidades Para Modificar este Usuario', function(){ alertify.success('Ok'); });
					} else {
					alertify.alert('SISCO','No se puede realizar Mas Modificaciones a este Usuario, Por favor Contactese con el Administrador del Sistema', function(){ alertify.success('Ok'); });
				}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function(){ alertify.error('Cancel'); });
				$('#load_Update_secretaria').hide();
			},
			complete: function() {
				$('#load_Update_secretaria').hide();
				$('#ButtonEditarSecretaria').prop('disabled', false);
			},
			dataType: 'html'
		});
	}
	

	$("#form_UpdateUserSecretaria").submit(function(e) {
		e.preventDefault();
		$n1=document.getElementById('niv1S').value;
		$n2=document.getElementById('niv2S').value;
		$n3=document.getElementById('niv3S').value;
		$.ajax({
			type: 'POST',
			url: "<?=site_url("AdministratorControl/UpdateUserSecretaria")?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#ButtonEditarSecretaria').prop('disabled', true);
				$('#form_UpdateUserSecretaria').hide();
				$('#load_Update_secretaria').show();
			},
			success: function(data) {
			//	alertify.alert('SISCO', data, function(){ alertify.success('Ok'); });
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Secretaria Modificada Correctamente',
				showConfirmButton: false,
				timer: 1500
				});
				
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function(){ alertify.error('Cancel'); });
				$('#ButtonEditarSecretaria').prop('disabled', false);
				$('#form_UpdateUserSecretaria')[0].reset();
				$('#load_Update_secretaria').hide();
				$('#form_UpdateUserSecretaria').show();
			},
			complete: function() {
				$('#form_UpdateUserSecretaria')[0].reset();
				$('#ButtonEditarSecretaria').prop('disabled', false);
				$('#form_UpdateUserSecretaria').show();
				$('#load_Update_secretaria').hide();
				$('#ModificarSecretaria').modal('hide');
				if($n1>0 &&  $n2==0 && $n3==0)
				{ var a=  new detail_level1_1($n1); a.listofUserSecretaria;
				} 
				if($n1>0 &&  $n2>0  && $n3==0)
				{ var b=  new detail_level2_2($n1, $n2); b.listofUserSecretaria;
				}
				if($n1>0 &&  $n2>0  && $n3>0 )
				{ var c=  new detail_level3_3($n1, $n2, $n3); c.listofUserSecretaria;
				} 
			},
			dataType: 'html'
		});
	});

	////////////////////////// END  USER SECRETARIA ////////////////////////


	/*=============================================
		  CAMBIAR ESTADO DE USUARIO
	=============================================*/
	function check(id)
      {  
		  var idUser=id;
		  var estado=0;
		  var yes = document.getElementById(idUser);  
		  if (yes.checked == true ){ 
			   estado=1;
		}else{
			   estado=0;
		}
		$.ajax({
			type: 'POST',
			url: "<?=site_url("AdministratorControl/UpdateStateUser")?>",
			data: { idd:idUser, statee:estado},
			success: function(data) {
				//alertify.alert('SISCO', data, function(){ alertify.success('Ok'); });
				Swal.fire({
				type: 'success',
				title: data,
				showConfirmButton: false,
				timer: 2500
				});
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function(){ alertify.error('Cancel'); });				
			},
			complete: function() {
			
			},
			dataType: 'html'
		});  
	}
	/*=============================================
		  VER PASSWORD
	=============================================*/
	function verPassword(password){
		alertify.alert('SISCO', '<b>Contraseña:</b> '+password, function(){ alertify.success('Ok'); });
	}






</script>
</body>

</html>