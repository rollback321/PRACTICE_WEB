<script>
	/*==================================================
		=     Section DERIVACION DIRECXTA    =
		==================================================*/
	$('#div_select_nivel_1DIRECTA').hide();
	$('#div_select_nivel_2DIRECTA').hide();
	$('#div_select_nivel_3DIRECTA').hide();
	$('#load_register_external_directa').hide();

	function derivarHojaRutaExternaDirecta(cor_id, codigo) {
		$(".cod_GAMEA").text(codigo);
		$('#cor_id_ExternaDirecta').val(cor_id);
		$('#codigo_ExternaDirecta').val(codigo);
		limpiarControlesDerivacionDirecta();
		$('#div_select_nivel_1DIRECTA').show();
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
				$('#select_nivel_1DIRECTA').html(content);
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
					alertify.error('Cancel');
				});
			},
			dataType: 'html'
		});
	}

	$('#select_nivel_1DIRECTA').change(function() {
		var parametros = $("#select_nivel_1DIRECTA").val();
		console.log(parametros);
		$('#div_select_nivel_1DIRECTA').show();
		$('#div_select_nivel_2DIRECTA').show();
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
					content += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos + ' - ' + nuevoArray_n2[i].usu_rol_cargo;
					content += '</option>';
				}
				$('#select_nivel_2DIRECTA').html(content_n1);
				$('#list_usuariosDIRECTA').html(content);
				$('#div_select_nivel_3DIRECTA').hide();

			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			dataType: 'html'
		});
	});


	$('#select_nivel_2DIRECTA').change(function() {
		var parametros = $("#select_nivel_1DIRECTA").val();
		var parametros2 = $("#select_nivel_2DIRECTA").val();
		console.log(parametros + " " + parametros2);
		if (parametros == 0) {
			limpiarControlesDerivacionDirecta();
			$('#div_select_nivel_3DIRECTA').hide();
		} else {
			$('#div_select_nivel_3DIRECTA').show();
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
						content2 += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos + ' - ' + nuevoArray_n2[i].usu_rol_cargo;
						content2 += '</option>';
					}
					$('#select_nivel_3DIRECTA').html(content);
					$('#list_usuariosDIRECTA').html(content2);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},
				dataType: 'html'
			});
		}

	});
	$('#select_nivel_3DIRECTA').change(function() {
		var parametros = $("#select_nivel_1DIRECTA").val();
		var parametros2 = $("#select_nivel_2DIRECTA").val();
		var parametros3 = $("#select_nivel_3DIRECTA").val();
		if (parametros2 == 0) {
			limpiarControlesDerivacionDirecta();
		} else {
			$('#div_select_nivel_3DIRECTA').show();
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
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos + ' - ' + obj[i].usu_rol_cargo;
						content += '</option>';
					}
					$('#list_usuariosDIRECTA').html(content);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},
				dataType: 'html'
			});
		}
	});

	$("#form_derivarHojaRutaExternaDirecta").submit(function(e) {
		e.preventDefault();
		if ($(".secretary #form_derivarHojaRutaExternaDirecta").valid()) {

			$.ajax({
				type: 'POST',
				url: "<?= site_url("SecretaryControl/derivarHojaRutaExternaDirecta") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#submitDeriveExternalDirecta').prop('disabled', true);
					$('#form_derivarHojaRutaExternaDirecta').hide();
					$('#load_register_external_directa').show();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					Actualizar2Tablas();
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Existe un Error, vuelta Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
					$('#submitDeriveExternalDirecta').prop('disabled', false);
					$('#form_derivarHojaRutaExternaDirecta')[0].reset();
					$('#load_register_external_directa').hide();
					$('#form_derivarHojaRutaExternaDirecta').hide();
				},
				complete: function() {
					$('#form_derivarHojaRutaExternaDirecta')[0].reset();
					$('#submitDeriveExternalDirecta').prop('disabled', false);
					$('#form_derivarHojaRutaExternaDirecta').show();
					$('#load_register_external_directa').hide();
					$('#derivarHojaRutaExternaDirecta').modal('hide');
					//OcultarDivCheckbox();
				},
				dataType: 'html'
			});
		}
	});


	$('select#select_proveidoExternoDIRECTA').on('change', function() {
		$('#a_provExternoDIRECTA').val($(this).find(":selected").text() + ' ');
		$('#a_provExternoDIRECTA').focus();
		$('#select_proveidoExternoDIRECTA').val($('#select_proveidoExternoDIRECTA > option:first').val());
	});

	function limpiarControlesDerivacionDirecta() {
		$('select#select_nivel_1DIRECTA option[value="0"]').prop('selected', true);
		$('select#select_nivel_2DIRECTA option[value="0"]').prop('selected', true);
		$('select#select_nivel_3DIRECTA option[value="0"]').prop('selected', true);
		$("select#list_usuariosDIRECTA option").each(function() {
			$(this).remove();
		});
		$('#div_select_nivel_1DIRECTA').hide();
		$('#div_select_nivel_2DIRECTA').hide();
		$('#div_select_nivel_3DIRECTA').hide();
	}
	/*==================================================
	=     END Section DERIVACION DIRECTA    =
	==================================================*/
</script>