<script>
	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA MULTIPLE
	=============================================*/
	$('#load_register_external_multiple').hide();
	$('#div_select_nivel_1ME').hide();
	$('#div_select_nivel_2ME').hide();
	$('#div_select_nivel_3ME').hide();

	function DerivarMultipleExternaBandeja() {
		$('#div_select_nivel_1ME').show();
		$("#etiquetasExterna").empty();
		var checkbox = document.getElementsByName('ReceptionCkbox[]');
		var ln = 0;
		var CheckSelected = [];
		var ArrayCorId = [];
		var ArrayHistorial = [];
		for (var i = 0; i < checkbox.length; i++) {
			if (checkbox[i].checked) {
				CheckSelected.push(checkbox[i].value);
				ln++;
			}
		}
		if (ln > 0) {
			DiviCheck.style.display = 'flex';
			DiviCheck.style.display = 'block';
		} else {
			DiviCheck.style.display = 'none';
		}
		$("#ArrayCantidadMultipleExternaBandeja").val(ln);
		$.ajax({
			url: "<?= site_url("TechnicalControl/SacarCodigosHistorial") ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				'cadena': JSON.stringify(CheckSelected),
				'count': ln,
			},
			beforeSend: function() {},
			success: function(data) {
				console.log(data);
				var totalArray = data.length;
				for (var i = 0; i < totalArray; i++) {
					$("#etiquetasExterna").append('<b><span title="3 New Messages" class="badge bg-success" style="margin-right: 2px;margin-top: 2px;font-size:12px;">GAMEA-' + data[i].cor_codigo + "-" + data[i].ges_gestion + '</span><b>');
					ArrayCorId.push(data[i].cor_id);
					ArrayHistorial.push(data[i].his_id);
				}
				var respaldo_arrayCor_id = JSON.stringify(ArrayCorId);
				$("#ArrayCorIdMultipleExternaBandeja").val(respaldo_arrayCor_id);
				var arrayHistorialConvert = JSON.stringify(ArrayHistorial);
				$("#his_idArrayMultipleExternaBandeja").val(arrayHistorialConvert);
				derivarHojaRutaExternaSelect();
			},
			error: function(xhr) {},
			complete: function() {},
		});
	}


	function derivarHojaRutaExternaSelect() {
		limpiarControlesDerivacionMultipleExterna();
		$('#div_select_nivel_1ME').show();
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
				$('#select_nivel_1ME').html(content);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			dataType: 'html'
		});
	}
	$('#select_nivel_1ME').change(function() {
		var parametros = $("#select_nivel_1ME").val();
		console.log(parametros);
		$('#div_select_nivel_1ME').show();
		$('#div_select_nivel_2ME').show();
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
				$('#select_nivel_2ME').html(content_n1);
				$('#list_usuariosME').html(content);
				$('#div_select_nivel_3ME').hide();
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


	$('#select_nivel_2ME').change(function() {
		var parametros = $("#select_nivel_1ME").val();
		var parametros2 = $("#select_nivel_2ME").val();
		console.log(parametros + " " + parametros2);
		if (parametros == 0) {
			limpiarControlesDerivacionMultipleExterna();
			$('#div_select_nivel_3ME').hide();
		} else {
			$('#div_select_nivel_3ME').show();
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
					$('#select_nivel_3ME').html(content);
					$('#list_usuariosME').html(content2);
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
	$('#select_nivel_3ME').change(function() {
		var parametros = $("#select_nivel_1ME").val();
		var parametros2 = $("#select_nivel_2ME").val();
		var parametros3 = $("#select_nivel_3ME").val();
		if (parametros2 == 0) {
			limpiarControlesDerivacionMultipleExterna();
		} else {
			$('#div_select_nivel_3ME').show();
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
					$('#list_usuariosME').html(content);
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

	$("#form_derivarHojaRutaMultipleExterna").submit(function(e) {
		e.preventDefault();
		if ($(".secretary #form_derivarHojaRutaMultipleExterna").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("SecretaryControl/derivarHojaRutaExternaMultipleReception") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#load_register_external_multiple').show();
					$('#form_derivarHojaRutaMultipleExterna').hide();
					$('#submitDeriveExternalMultiple').prop('disabled', true);
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
					$('#submitDeriveExternalMultiple').prop('disabled', false);
					$('#form_derivarHojaRutaMultipleExterna')[0].reset();
					$('#load_register_external_multiple').hide();
					$('#form_derivarHojaRutaMultipleExterna').show();
				},
				complete: function() {
					$('#form_derivarHojaRutaMultipleExterna')[0].reset();
					$('#form_derivarHojaRutaMultipleExterna').show();
					$('#load_register_external_multiple').hide();
					$('#derivarHojaRutaMultipleExterna').modal('hide');
					$('#submitDeriveExternalMultiple').prop('disabled', false);
					OcultarDivInbox();
					OcultarDivReception();
					Actualizar2_3TablasBandeja();
				},
				dataType: 'html'
			});
		}
	});

	function limpiarControlesDerivacionMultipleExterna() {
		$('select#select_nivel_1ME option[value="0"]').prop('selected', true);
		$('select#select_nivel_2ME option[value="0"]').prop('selected', true);
		$('select#select_nivel_3ME option[value="0"]').prop('selected', true);
		$("select#list_usuariosME option").each(function() {
			$(this).remove();
		});
		$('#div_select_nivel_1ME').hide();
		$('#div_select_nivel_2ME').hide();
		$('#div_select_nivel_3ME').hide();
	}
	$('select#select_proveidoMultipleExternoBandeja').on('change', function() {
		$('#a_provMultipleExternoBandeja').val($(this).find(":selected").text() + ' ');
		$('#a_provMultipleExternoBandeja').focus();
		$('#select_proveidoMultipleExternoBandeja').val($('#select_proveidoMultipleExternoBandeja > option:first').val());
	});
</script>