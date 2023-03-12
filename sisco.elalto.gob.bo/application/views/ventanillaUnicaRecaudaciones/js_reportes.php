<script>
$(function() {
		CargarTema();
		derivarHojaRutaExterna();
	});
    $('#div_select_nivel_1Externa').hide();
	$('#div_select_nivel_2Externa').hide();
	$('#div_select_nivel_3Externa').hide();

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Date picker
    $('#reservationdate').datetimepicker({
        format:'YYYY-MM-DD'
    });
	  //Date picker
	  $('#reservationdate2').datetimepicker({
		format:'YYYY-MM-DD'
    });
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  })
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Date picker
    $('#reservationdates').datetimepicker({
        format:'YYYY-MM-DD'
    });
	  //Date picker
	  $('#reservationdates2').datetimepicker({
		format:'YYYY-MM-DD'
    });
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  })


	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/
	function derivarHojaRutaExterna() {
		limpiarControlesVentanilla();
		$('#div_select_nivel_3Externa').hide();
		var nivel1 = '<?= $this->session->userdata('rol_niv_1') ?>';
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';
		var nivel3 = '<?= $this->session->userdata('rol__niv_3') ?>';

		if (nivel2.length === 0 && nivel3.length == 0) {
			$('#div_select_nivel_1Externa').show();
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
					$('#select_nivel_1Externa').html(content);
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
			if (nivel2.length != 0 && nivel3.length == 0) {
				$('#div_select_nivel_1Externa').hide();
				$('#div_select_nivel_2Externa').show();
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
						$('#select_nivel_1Externa').html(content_n1);

						var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n2.length; i++) {
							content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
							content_n2 += nuevoArray_n2[i].niv2_nombre;
							content_n2 += '</option>';
						}
						$('#select_nivel_2Externa').html(content_n2);
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
				$('#div_select_nivel_2Externa').show();
				$('#div_select_nivel_3Externa').show();
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
						$('#select_nivel_2Externa').html(content_n2);

						var content_n3 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n3.length; i++) {
							content_n3 += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
							content_n3 += nuevoArray_n3[i].niv3_nombre;
							content_n3 += '</option>';
						}
						$('#select_nivel_3Externa').html(content_n3);
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

	$('#select_nivel_1Externa').change(function() {
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
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
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
			$('#div_select_nivel_2Externa').show();
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
					$('#select_nivel_2Externa').html(content);
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
			$('#div_select_nivel_3Externa').hide();
		} else {
			$('#div_select_nivel_2Externa').hide();
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
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
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
	$('#select_nivel_2Externa').change(function() {
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
							content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
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
				$('#div_select_nivel_3Externa').show();
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
						$('#select_nivel_3Externa').html(content);
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
				$('#div_select_nivel_3Externa').hide();
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
							content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
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
	$('#select_nivel_3Externa').change(function() {
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
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
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
	///////////////////////////////////////////////////////////////////////
	//Limpiar campos Formulario VentanillaUnica
	function limpiarControlesVentanilla() {
		$('select#select_nivel_2Externa option[value="0"]').prop('selected', true);
		$('select#select_nivel_3Externa option[value="0"]').prop('selected', true);
		$("select#list_usuarios option").each(function() {
			$(this).remove();
		});
	}
</script>
</body>

</html>


