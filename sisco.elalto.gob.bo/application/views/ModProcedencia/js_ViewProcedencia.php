<script>
	$('#load_viewProcedencia').hide();
	$('#load_asignar_Procedencia').hide();
	$('#load_editar_Procedencia').hide();
	$('#div_select_nivel_1Procedencia').hide();
	$('#div_select_nivel_2Procedencia').hide();
	$('#div_select_nivel_3Procedencia').hide();

	$('#div_select_nivel_1ProcedenciaEditar').hide();
	$('#div_select_nivel_2ProcedenciaEditar').hide();
	$('#div_select_nivel_3ProcedenciaEditar').hide();
	/*=============================================
			  FUNCTION ASIGNAR PROCEDENCIA
			=============================================*/
	function AsignarProcedencia(cor_id, cod_pend, codigo) {
		$(".cod_Procedencia").text(codigo);
		$('#cor_id_HojaProcedencia').val(cor_id);
		$('#codigo_HojaProcedencia').val(codigo);
		$('#div_select_nivel_1Procedencia').show();
		$.ajax({
			url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_1Directo') ?>/",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var obj = JSON.parse(data);
				var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
				for (var i = 0; i < obj.length; i++) {
					content += '<option value="' + obj[i].niv1_id + '">';
					content += obj[i].niv1_nombre;
					content += '</option>';
				}
				$('#select_nivel_1Procedencia').html(content);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			dataType: 'html'
		});
	}


	$('#select_nivel_1Procedencia').change(function() {
		var parametros = $("#select_nivel_1Procedencia").val();
		console.log(parametros);
		$('#div_select_nivel_1Procedencia').show();
		$('#div_select_nivel_2Procedencia').show();
		$.ajax({
			url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_2_IDDirecto') ?>/" + parametros,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var obj = JSON.parse(data);
				var nuevoArray_n1 = obj.data_n1;
				var nuevoArray_n2 = obj.data_n2;
				console.log(obj);
				var content_n1 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
				for (var i = 0; i < nuevoArray_n1.length; i++) {
					content_n1 += '<option value="' + nuevoArray_n1[i].niv2_id + '">';
					content_n1 += nuevoArray_n1[i].niv2_nombre;
					content_n1 += '</option>';
				}
				if (nuevoArray_n2 == '')
					var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
				else
					var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
				for (var i = 0; i < nuevoArray_n2.length; i++) {
					content += '<option value="' + nuevoArray_n2[i].usu_rol_id + '">';
					content += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos;
					content += '</option>';
				}
				$('#select_nivel_2Procedencia').html(content_n1);
				$('#list_usuariosProcedencia').html(content);
				$('#div_select_nivel_3Procedencia').hide();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			dataType: 'html'
		});
	});

	$('#select_nivel_2Procedencia').change(function() {
		var parametros = $("#select_nivel_1Procedencia").val();
		var parametros2 = $("#select_nivel_2Procedencia").val();
		console.log(parametros + " " + parametros2);
		if (parametros == 0) {
			limpiarControlesVentanillaInterna();
			$('#div_select_nivel_3Procedencia').hide();
		} else {

			$('#div_select_nivel_3Procedencia').show();
			$.ajax({
				url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_3_IDDirecto') ?>/" + parametros + "/" + parametros2,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					var nuevoArray_n1 = obj.data_n1;
					var nuevoArray_n2 = obj.data_n2;
					console.log(obj);
					var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
					for (var i = 0; i < nuevoArray_n1.length; i++) {
						content += '<option value="' + nuevoArray_n1[i].niv3_id + '">';
						content += nuevoArray_n1[i].niv3_nombre;
						content += '</option>';
					}
					if (nuevoArray_n2 == '')
						var content2 = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content2 = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < nuevoArray_n2.length; i++) {
						content2 += '<option value="' + nuevoArray_n2[i].usu_rol_id + '">';
						content2 += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos;
						content2 += '</option>';
					}
					$('#select_nivel_3Procedencia').html(content);
					$('#list_usuariosProcedencia').html(content2);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},
				dataType: 'html'
			});
		}
	});

	$('#select_nivel_3Procedencia').change(function() {
		var parametros = $("#select_nivel_1Procedencia").val();
		var parametros2 = $("#select_nivel_2Procedencia").val();
		var parametros3 = $("#select_nivel_3Procedencia").val();
		if (parametros2 == 0) {
			limpiarControlesVentanillaInterna();
		} else {

			$('#div_select_nivel_33').show();
			$.ajax({
				url: "<?php echo site_url('VentanillaUnicaControl/listUsersReceptionistLevel_3Directo') ?>/" + parametros + "/" + parametros2 + "/" + parametros3,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);

					console.log(obj);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
						content += '</option>';
					}
					$('#list_usuariosProcedencia').html(content);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},
				dataType: 'html'
			});
		}
	});

	$("#form_asignar_Procedencia").submit(function(e) {
		e.preventDefault();
		if ($(".secretary #form_asignar_Procedencia").valid()) {
		$.ajax({
			type: 'POST',
			url: "<?= site_url("VentanillaInternaControlSMGI/AsignarProcedencia") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#submitAsignarProcedencia').prop('disabled', true);
				$('#form_asignar_Procedencia').hide();
				$('#load_asignar_Procedencia').show();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				Actualizar2Tabla();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#submitAsignarProcedencia').prop('disabled', false);
				$('#form_asignar_Procedencia')[0].reset();
				$('#load_asignar_Procedencia').hide();
				$('#form_asignar_Procedencia').hide();
			},
			complete: function() {
				$('#form_asignar_Procedencia')[0].reset();
				$('#submitAsignarProcedencia').prop('disabled', false);
				$('#form_asignar_Procedencia').show();
				$('#load_asignar_Procedencia').hide();
				$('#asignar_Procedencia').modal('hide');
				//OcultarDivCheckbox();
			},
			dataType: 'html'
		});
	}
	});
	/*=============================================
  		FUNCTION VER DESTINO HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	function VerProcedencia(cor_id, pend_id, codigo) {
		$('.modal-body').hide();
		$('.cod_ViewProcedencia').text(codigo);
		var ButtonEditarProcedencia = document.getElementById('ButtonEditarProcedencia');
		$.ajax({
			type: 'POST',
			url: "<?= site_url("VentanillaInternaControlSMGI/BuscarDependeciaProcedencia") ?>",
			data: {
				cor_id: cor_id,
			},
			beforeSend: function() {
				$('#load_viewProcedencia').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj);

				$('#dependenciaProcedencia').val(obj.cor_institucion);
				$('#ServidorProcedencia').val(obj.cor_nombre_remitente);

				ButtonEditarProcedencia.setAttribute("onclick", "EditarProcedencia(" + cor_id + ",'" + codigo + "')");
				$('.modal-body').show();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#load_viewProcedencia').hide();
			},
			complete: function() {
				$('#load_viewProcedencia').hide();
			},
			dataType: 'html'
		});
	}





	////////////////////////////EDITAR PROCEDENCIA//////////
	function EditarProcedencia(cor_id, codigo) {
		$('#viewProcedencia').modal('hide');
		$('#editar_Procedencia').modal('show');
		$('.cod_ProcedenciaEditar').text(codigo);
		$('#cor_idProcedenciaEditar').val(cor_id);
		$('#div_select_nivel_1ProcedenciaEditar').show();
		$.ajax({
			url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_1Directo') ?>/",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var obj = JSON.parse(data);
				//var content ='';
				var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
				for (var i = 0; i < obj.length; i++) {
					content += '<option value="' + obj[i].niv1_id + '">';
					content += obj[i].niv1_nombre;
					content += '</option>';
				}
				$('#select_nivel_1ProcedenciaEditar').html(content);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},

			dataType: 'html'
		});
	}

	$('#select_nivel_1ProcedenciaEditar').change(function() {
		var parametros = $("#select_nivel_1ProcedenciaEditar").val();
		console.log(parametros);
		$('#div_select_nivel_1ProcedenciaEditar').show();
		$('#div_select_nivel_2ProcedenciaEditar').show();
		$.ajax({
			url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_2_IDDirecto') ?>/" + parametros,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var obj = JSON.parse(data);
				var nuevoArray_n1 = obj.data_n1;
				var nuevoArray_n2 = obj.data_n2;
				console.log(obj);
				var content_n1 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
				for (var i = 0; i < nuevoArray_n1.length; i++) {
					content_n1 += '<option value="' + nuevoArray_n1[i].niv2_id + '">';
					content_n1 += nuevoArray_n1[i].niv2_nombre;
					content_n1 += '</option>';
				}
				if (nuevoArray_n2 == '')
					var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
				else
					var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
				for (var i = 0; i < nuevoArray_n2.length; i++) {
					content += '<option value="' + nuevoArray_n2[i].usu_rol_id + '">';
					content += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos;
					content += '</option>';
				}
				$('#select_nivel_2ProcedenciaEditar').html(content_n1);
				$('#list_usuariosProcedenciaEditar').html(content);
				$('#div_select_nivel_3ProcedenciaEditar').hide();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			dataType: 'html'
		});
	});


	$('#select_nivel_2ProcedenciaEditar').change(function() {
		var parametros = $("#select_nivel_1ProcedenciaEditar").val();
		var parametros2 = $("#select_nivel_2ProcedenciaEditar").val();
		console.log(parametros + " " + parametros2);
		if (parametros == 0) {
			limpiarControlesVentanillaEditarProcedencia();
			$('#div_select_nivel_3ProcedenciaEditar').hide();
		} else {

			$('#div_select_nivel_3ProcedenciaEditar').show();
			$.ajax({
				url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_3_IDDirecto') ?>/" + parametros + "/" + parametros2,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					var nuevoArray_n1 = obj.data_n1;
					var nuevoArray_n2 = obj.data_n2;
					console.log(obj);
					var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
					for (var i = 0; i < nuevoArray_n1.length; i++) {
						content += '<option value="' + nuevoArray_n1[i].niv3_id + '">';
						content += nuevoArray_n1[i].niv3_nombre;
						content += '</option>';
					}
					if (nuevoArray_n2 == '')
						var content2 = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content2 = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < nuevoArray_n2.length; i++) {
						content2 += '<option value="' + nuevoArray_n2[i].usu_rol_id + '">';
						content2 += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos;
						content2 += '</option>';
					}
					$('#select_nivel_3ProcedenciaEditar').html(content);
					$('#list_usuariosProcedenciaEditar').html(content2);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},
				dataType: 'html'
			});
		}

	});

	$('#select_nivel_3ProcedenciaEditar').change(function() {
		var parametros = $("#select_nivel_1ProcedenciaEditar").val();
		var parametros2 = $("#select_nivel_2ProcedenciaEditar").val();
		var parametros3 = $("#select_nivel_3ProcedenciaEditar").val();
		if (parametros2 == 0) {
			limpiarControlesVentanillaEditarProcedencia();
		} else {

			$('#div_select_nivel_3ProcedenciaEditar').show();
			$.ajax({
				url: "<?php echo site_url('VentanillaUnicaControl/listUsersReceptionistLevel_3Directo') ?>/" + parametros + "/" + parametros2 + "/" + parametros3,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					console.log(obj);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
						content += '</option>';
					}
					$('#list_usuariosProcedenciaEditar').html(content);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},
				dataType: 'html'
			});
		}
	});

	$("#form_editar_Procedencia").submit(function(e) {
		e.preventDefault();
		if ($(".secretary #form_editar_Procedencia").valid()) {
		$.ajax({
			type: 'POST',
			url: "<?= site_url("VentanillaInternaControlSMGI/EditarProcedencia") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#submitEditarProcedencia').prop('disabled', true);
				$('#form_editar_Procedencia').hide();
				$('#load_editar_Procedencia').show();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				Actualizar2Tabla();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#submitEditarProcedencia').prop('disabled', false);
				$('#form_editar_Procedencia')[0].reset();
				$('#load_editar_Procedencia').hide();
				$('#form_editar_Procedencia').hide();
			},
			complete: function() {
				$('#form_editar_Procedencia')[0].reset();
				$('#submitEditarProcedencia').prop('disabled', false);
				$('#form_editar_Procedencia').show();
				$('#load_editar_Procedencia').hide();
				$('#editar_Procedencia').modal('hide');
				//OcultarDivCheckbox();
			},
			dataType: 'html'
		});
	}
	});
	
	function VerificarDestinoYProcedencia(cor_id, pend_id) {
		$.ajax({
			type: 'POST',
			url: "<?= site_url("VentanillaInternaControlSMGI/BuscarDependeciaProcedenciaYDestinoForDerivar") ?>",
			data: {
				cor_id: cor_id,
				pend_id: pend_id
			},
			success: function(data) {
				console.log(data);
				var obj = jQuery.parseJSON(data);
				var nuevoArray_n1 = obj.data_n1;
				var nuevoArray_n2 = obj.data_n2;
				console.log(nuevoArray_n1);
				console.log(nuevoArray_n2);

				if (nuevoArray_n1 == null || nuevoArray_n1 == "" || nuevoArray_n1 == 0 || nuevoArray_n2 == null || nuevoArray_n2 == "" || nuevoArray_n2 == 0) {
					Swal.fire({
						type: 'warning',
						title: 'Designe un Destino y una Procedencia para la Hoja de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					var dep = nuevoArray_n1.usu_dependencia;
					var ser = nuevoArray_n1.usu_nombres + " " + nuevoArray_n1.usu_apellidos;
					$('#dependenciaDesDerivar').val(dep);
					$('#ViewDestinoProveidoDerivar').val(nuevoArray_n1.a_proveido);
					$('#ViewDestinoObservacionDerivar').val(nuevoArray_n1.a_obs);
					$('#plazoViewDestinoDerivar').val(nuevoArray_n1.r_plazo);
					$('#derivarHojaRutaInterna').modal('show');
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
			dataType: 'html'
		});
	}
</script>