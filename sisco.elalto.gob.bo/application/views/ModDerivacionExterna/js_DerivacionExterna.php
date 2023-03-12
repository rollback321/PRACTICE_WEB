<script>
	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/
	$('#div_select_nivel_1').hide();
	$('#div_select_nivel_2').hide();
	$('#div_select_nivel_3').hide();
	$('#load_register_external').hide();

	function derivarHojaRutaExterna(cor_id, cod) {
		limpiarControles();
		$(".cod_GAMEA").text(cod);
		$("#cor_id").val(cor_id);
		VerArchivosDerivar(cor_id);
		var nivel1 = '<?= $this->session->userdata('rol_niv_1') ?>';
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';
		var nivel3 = '<?= $this->session->userdata('rol__niv_3') ?>';

		if (nivel2.length === 0 && nivel3.length == 0) {
			$('#div_select_nivel_1').show();
			$.ajax({
				url: "<?php echo site_url('secretaryControl/dependencyListLevel_1') ?>/",
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
					$('#select_nivel_1').html(content);
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
		} else {
			if (nivel2.length != 0 && nivel3.length == 0) {
				$('#div_select_nivel_1').show();
				$('#div_select_nivel_2').show();
				$.ajax({
					url: "<?php echo site_url('secretaryControl/dependencyListLevel_2_ID') ?>/",
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						var nuevoArray_n1 = obj.data_n1;
						var nuevoArray_n2 = obj.data_n2;
						var content_n1 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n1.length; i++) {
							content_n1 += '<option value="' + nuevoArray_n1[i].niv1_id + '">';
							content_n1 += nuevoArray_n1[i].niv1_nombre;
							content_n1 += '</option>';
						}
						$('#select_nivel_1').html(content_n1);
						var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n2.length; i++) {
							content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
							content_n2 += nuevoArray_n2[i].niv2_nombre;
							content_n2 += '</option>';
						}
						$('#select_nivel_2').html(content_n2);
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
			} else {
				$('#div_select_nivel_2').show();
				$('#div_select_nivel_3').show();
				$.ajax({
					url: "<?php echo site_url('secretaryControl/dependencyListLevel_3_ID') ?>/",
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						var nuevoArray_n2 = obj.data_n2;
						var nuevoArray_n3 = obj.data_n3;

						var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n2.length; i++) {
							content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
							content_n2 += nuevoArray_n2[i].niv2_nombre;
							content_n2 += '</option>';
						}
						$('#select_nivel_2').html(content_n2);

						var content_n3 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n3.length; i++) {
							content_n3 += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
							content_n3 += nuevoArray_n3[i].niv3_nombre;
							content_n3 += '</option>';
						}
						$('#select_nivel_3').html(content_n3);
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
		}
	}

	$('#select_nivel_1').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv1_id = optionSelected.val();
		var niv1_nombre = optionSelected.text();

		var nivel1 = '<?= $this->session->userdata('rol_niv_1') ?>';

		if (niv1_id == nivel1) {
			$.ajax({
				url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_1') ?>/" + niv1_id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos + ' - ' + obj[i].usu_rol_cargo;
						content += '</option>';
					}
					$('#list_usuarios').html(content);
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
			$('#div_select_nivel_2').show();
			$.ajax({
				url: "<?php echo site_url('secretaryControl/dependencyListLevel_2_ID') ?>/",
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					var nuevoArray_n2 = obj.data_n2;
					var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
					for (var i = 0; i < nuevoArray_n2.length; i++) {
						content += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
						content += nuevoArray_n2[i].niv2_nombre;
						content += '</option>';
					}
					$('#select_nivel_2').html(content);
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
			$('#div_select_nivel_3').hide();
		} else {
			$('#div_select_nivel_2').hide();
			$.ajax({
				url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_1') ?>/" + niv1_id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos + ' - ' + obj[i].usu_rol_cargo;
						content += '</option>';
					}
					$('#list_usuarios').html(content);
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
	$('#select_nivel_2').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv2_id = optionSelected.val();
		var niv2_nombre = optionSelected.text();
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';

		if (optionSelected.val() == 0) {
			//limpiar controles
			limpiarControles();
		} else {
			if (niv2_id == nivel2) {

				$.ajax({
					url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_2') ?>/" + niv2_id,
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						if (obj == '')
							var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
						else
							var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
						for (var i = 0; i < obj.length; i++) {
							content += '<option value="' + obj[i].usu_rol_id + '">';
							content += obj[i].usu_nombres + " " + obj[i].usu_apellidos + ' - ' + obj[i].usu_rol_cargo;
							content += '</option>';
						}
						$('#list_usuarios').html(content);
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
				$('#div_select_nivel_3').show();
				$.ajax({
					url: "<?php echo site_url('secretaryControl/dependencyListLevel_3_ID') ?>/",
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						var nuevoArray_n3 = obj.data_n3;
						var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n3.length; i++) {
							content += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
							content += nuevoArray_n3[i].niv3_nombre;
							content += '</option>';
						}
						$('#select_nivel_3').html(content);
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
			} else {
				$('#div_select_nivel_3').hide();
				$.ajax({
					url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_2') ?>/" + niv2_id,
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						if (obj == '')
							var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
						else
							var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
						for (var i = 0; i < obj.length; i++) {
							content += '<option value="' + obj[i].usu_rol_id + '">';
							content += obj[i].usu_nombres + " " + obj[i].usu_apellidos + ' - ' + obj[i].usu_rol_cargo;
							content += '</option>';
						}
						$('#list_usuarios').html(content);
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
		}
	});
	$('#select_nivel_3').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv3_id = optionSelected.val();
		var niv3_nombre = optionSelected.text();

		if (optionSelected.val() == 0) {
			//limpiar controles
			limpiarControles();
		} else {
			$.ajax({
				url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_3') ?>/" + niv3_id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos + ' - ' + obj[i].usu_rol_cargo;
						content += '</option>';
					}
					$('#list_usuarios').html(content);
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

	$("#form_derivarHojaRutaExterna").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("secretaryControl/derivarHojaRutaExterna") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#submitDeriveExternal').prop('disabled', true);
				$('#form_derivarHojaRutaExterna').hide();
				$('#load_register_external').show();
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
					title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#submitDeriveExternal').prop('disabled', false);
				$('#form_derivarHojaRutaExterna')[0].reset();
				$('#load_register_external').hide();
				$('#form_derivarHojaRutaExterna').show();
			},
			complete: function() {
				$('#form_derivarHojaRutaExterna')[0].reset();
				$('#submitDeriveExternal').prop('disabled', false);
				$('#form_derivarHojaRutaExterna').show();
				$('#load_register_external').hide();
				$('#derivarHojaRutaExterna').modal('hide');
			},
			dataType: 'html'
		});
	});

	
	document.addEventListener('DOMContentLoaded', function() {
		window.stepper = new Stepper(document.querySelector('.bs-stepper'));
	});
	$('select#select_proveido').on('change', function() {
		$('#a_proveido').val($(this).find(":selected").text() + ' ');
		$('#a_proveido').focus();
		$('#select_proveido').val($('#select_proveido > option:first').val());
	});
	function limpiarControlesDerivacionExterna() {
		$('select#select_nivel_1 option[value="0"]').prop('selected', true);
		$('select#select_nivel_2 option[value="0"]').prop('selected', true);
		$('select#select_nivel_3 option[value="0"]').prop('selected', true);
		$("select#list_usuarios option").each(function() {
			$(this).remove();
		});
		$('#div_select_nivel_1').hide();
		$('#div_select_nivel_2').hide();
		$('#div_select_nivel_3').hide();
	}
	/*==================================================
	=     END Section DERIVACION DIRECTA    =
	==================================================*/

</script>