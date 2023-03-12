<script>
	/*=============================================
		  FUNCTION ASIGNAR DESTINO 
		=============================================*/
	$('#div_select_nivel_11').hide();
	$('#div_select_nivel_22').hide();
	$('#div_select_nivel_33').hide();

	function AsignarDestino(cor_id, cod_pend, codigo) {
		$(".cod_GAMEA").text(codigo);
		$('#cor_id_Hoja').val(cor_id);
		$('#pend_id_Hoja').val(cod_pend);
		$('#codigo_Hoja').val(codigo);
		limpiarControlesVentanilla() ;
		$('#div_select_nivel_11').show();
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
				$('#select_nivel_11').html(content);
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

	$('#select_nivel_11').change(function() {
		var parametros = $("#select_nivel_11").val();
		console.log(parametros);
		$('#div_select_nivel_11').show();
		$('#div_select_nivel_22').show();
		$.ajax({
			url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_2_ID_DirectoSecretaryGestion') ?>/" + parametros,
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
				$('#select_nivel_22').html(content_n1);
				$('#list_usuarioss').html(content);
				$('#div_select_nivel_33').hide();
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


	$('#select_nivel_22').change(function() {
		var parametros = $("#select_nivel_11").val();
		var parametros2 = $("#select_nivel_22").val();
		console.log(parametros + " " + parametros2);
		if (parametros == 0) {
			limpiarControlesVentanilla();
			$('#div_select_nivel_33').hide();
		} else {
			$('#div_select_nivel_33').show();
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
					$('#select_nivel_33').html(content);
					$('#list_usuarioss').html(content2);
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

	$('#select_nivel_33').change(function() {
		var parametros = $("#select_nivel_11").val();
		var parametros2 = $("#select_nivel_22").val();
		var parametros3 = $("#select_nivel_33").val();
		if (parametros2 == 0) {
			limpiarControlesVentanilla();
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
					$('#list_usuarioss').html(content);
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
	/////////////////////////////ASIGNAR DESTINO//////////
	$('#load_asignar_Destino').hide();
	$("#form_asignar_Destino").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("VentanillaUnicaControl/AsignarDestino") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#submitAsignarDestino').prop('disabled', true);
				$('#form_asignar_Destino').hide();
				$('#load_asignar_Destino').show();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				Actualizar2TablasBandeja();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#submitAsignarDestino').prop('disabled', false);
				$('#form_asignar_Destino')[0].reset();
				$('#load_asignar_Destino').hide();
				$('#form_asignar_Destino').hide();
			},
			complete: function() {
				$('#form_asignar_Destino')[0].reset();
				$('#submitAsignarDestino').prop('disabled', false);
				$('#form_asignar_Destino').show();
				$('#load_asignar_Destino').hide();
				$('#asignar_Destino').modal('hide');
			//	OcultarDivCheckbox();
			},
			dataType: 'html'
		});
	});

	/////////////////////////////EDITAR DESTINO//////////
	$('#div_select_nivel_111').hide();
	$('#div_select_nivel_222').hide();
	$('#div_select_nivel_333').hide();
	$('#load_editar_Destino').hide();

	function EditarDestino(pend_id) {
		$('#viewDestino').modal('hide');
		$('#editar_Destino').modal('show');
		$('#pend_id_HojaEditar').val(pend_id);
		limpiarControlesVentanillaEditar();
		$('#div_select_nivel_111').show();

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
				$('#select_nivel_111').html(content);
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

	$('#select_nivel_111').change(function() {
		var parametros = $("#select_nivel_111").val();
		console.log(parametros);
		$('#div_select_nivel_111').show();
		$('#div_select_nivel_222').show();
		$.ajax({
			url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_2_ID_DirectoSecretaryGestion') ?>/" + parametros,
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
				$('#select_nivel_222').html(content_n1);
				$('#list_usuariosss').html(content);
				$('#div_select_nivel_333').hide();
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


	$('#select_nivel_222').change(function() {
		var parametros = $("#select_nivel_111").val();
		var parametros2 = $("#select_nivel_222").val();
		console.log(parametros + " " + parametros2);
		if (parametros == 0) {
			limpiarControlesVentanillaEditar();
			$('#div_select_nivel_333').hide();
		} else {

			$('#div_select_nivel_333').show();
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
					$('#select_nivel_333').html(content);
					$('#list_usuariosss').html(content2);
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

	$('#select_nivel_333').change(function() {
		var parametros = $("#select_nivel_111").val();
		var parametros2 = $("#select_nivel_222").val();
		var parametros3 = $("#select_nivel_333").val();
		if (parametros2 == 0) {
			limpiarControlesVentanillaEditar();
		} else {

			$('#div_select_nivel_333').show();
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
					$('#list_usuariosss').html(content);
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

	$("#form_editar_Destino").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("VentanillaUnicaControl/EditarDestino") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#submitEditarDestino').prop('disabled', true);
				$('#form_editar_Destino').hide();
				$('#load_editar_Destino').show();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				Actualizar2TablasBandeja();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#submitEditarDestino').prop('disabled', false);
				$('#form_editar_Destino')[0].reset();
				$('#load_editar_Destino').hide();
				$('#form_editar_Destino').hide();
			},
			complete: function() {
				$('#form_editar_Destino')[0].reset();
				$('#submitEditarDestino').prop('disabled', false);
				$('#form_editar_Destino').show();
				$('#load_editar_Destino').hide();
				$('#editar_Destino').modal('hide');
				//OcultarDivCheckbox();
			},
			dataType: 'html'
		});
	});


	/*=============================================
  		FUNCTION VER DESTINO HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	function VerDestino(cor_id, pend_id, codigo) {
		$('.modal-body').hide();
		$('.cod_GAMEA').text(codigo);
		var ButtonImprimir = document.getElementById('ImpReporte');
		var ButtonEditarDest = document.getElementById('ButtonEditarDestino');
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryGestionControl/BuscarDependeciaDestino") ?>",
			data: {
				cor_id: cor_id,
				pend_id: pend_id
			},
			beforeSend: function() {
				$('#load_viewDestino').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj);
				var dep = obj.usu_dependencia;
				var ser = obj.usu_nombres + " " + obj.usu_apellidos;
				$('#dependenciaDes').val(dep);
				$('#ServidorDes').val(ser);
				$('#ViewDestinoProveido').val(obj.a_proveido);
				$('#ViewDestinoObservacion').val(obj.a_obs);
				$('#plazoViewDestino').val(obj.r_plazo);
				ButtonImprimir.setAttribute("onclick", "ReporteDestino_VentInterna_SMGI(" + obj.cor_id + "," + pend_id + ")");
				ButtonEditarDest.setAttribute("onclick", "EditarDestino(" + pend_id + ")");
				$('.modal-body').show();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#load_viewDestino').hide();
			},
			complete: function() {
				$('#load_viewDestino').hide();
			},
			dataType: 'html'
		});
	}
	/*=============================================
  		FUNCTION VER DESTINO HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	function VerDestinoDerivar(cor_id, pend_id) {
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryGestionControl/BuscarDependeciaDestino") ?>",
			data: {
				cor_id: cor_id,
				pend_id: pend_id
			},
			beforeSend: function() {},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj);
				if (obj === null || obj === 0 || obj === "") {
					Swal.fire({
						type: 'warning',
						title: 'Designe un Destino para la Hoja de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					var dep = obj.usu_dependencia;
					var ser = obj.usu_nombres + " " + obj.usu_apellidos;
					$('#dependenciaDesDerivar').val(dep);
					$('#ViewDestinoProveidoDerivar').val(obj.a_proveido);
					$('#ViewDestinoObservacionDerivar').val(obj.a_obs);
					$('#plazoViewDestinoDerivar').val(obj.r_plazo);
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
			complete: function() {},
			dataType: 'html'
		});
	}

	//////////////////////SELECCION DE PROVEIDO/////////////////
	$('select#select_proveidoAsignarDestino').on('change', function() {
		$('#prov_asigDestino').val($(this).find(":selected").text() + ' ');
		$('#prov_asigDestino').focus();
		$('#select_proveidoAsignarDestino').val($('#select_proveidoAsignarDestino > option:first').val());
	});
	$('select#select_proveidoEditarDestino').on('change', function() {
		$('#prov_EditDestino').val($(this).find(":selected").text() + ' ');
		$('#prov_EditDestino').focus();
		$('#select_proveidoEditarDestino').val($('#select_proveidoEditarDestino > option:first').val());
	});
	////////////////////////////////////////

	//Limpiar campos Formulario VentanillaUnica
	function limpiarControlesVentanillaEditar() {
		$('#div_select_nivel_111').hide();
		$('#div_select_nivel_222').hide();
		$('#div_select_nivel_333').hide();
		$('select#select_nivel_111 option[value="0"]').prop('selected', true);
		$('select#select_nivel_222 option[value="0"]').prop('selected', true);
		$('select#select_nivel_333 option[value="0"]').prop('selected', true);
		$("select#list_usuariosss option").each(function() {
			$(this).remove();
		});
	}
	function limpiarControlesVentanilla() {
		$('#div_select_nivel_11').hide();
		$('#div_select_nivel_22').hide();
		$('#div_select_nivel_33').hide();
		$('select#select_nivel_22 option[value="0"]').prop('selected', true);
		$('select#select_nivel_33 option[value="0"]').prop('selected', true);
		$("select#list_usuarioss option").each(function() {
			$(this).remove();
		});
	}
	////////////////////////////////////
</script>