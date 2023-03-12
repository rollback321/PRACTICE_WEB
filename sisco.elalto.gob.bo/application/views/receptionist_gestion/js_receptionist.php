
<script>
	$(document).ready(function() {
		
		DiviCheck = document.getElementById('DivCheck');
		$("#load_register_edit").hide();
		$('#load_register_niveles').hide();
		$('#load_derive_multiple').hide();
		$('#load_register_external_multiple').hide();
		$('#load_register_external').hide();
		$("#load_derive_internal").hide();
		$('#load_register_edit_secretary').hide();
		$('#load_viewEyeRoute').hide();
		$('#load_asignar_Destino').hide();
	$('#load_derivar_Directa').hide();
	$('#div_select_nivel_11').hide();
	$('#div_select_nivel_22').hide();
	$('#div_select_nivel_33').hide();
	});

	function VerCheckbox() {
		var checkbox = document.getElementsByName('ckbox[]');
		var ln = 0;
		for (var i = 0; i < checkbox.length; i++) {
			if (checkbox[i].checked)
				ln++
		}
		if (ln > 0) {
			DiviCheck.style.display = 'flex';
			DiviCheck.style.display = 'block';
		} else {
			$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
			$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
			DiviCheck.style.display = 'none';
		}
		console.log(ln);

	}

	$(function() {
		CountBandejaVentanillaInterna();
		CountBandejaVentanillaUnica();
		CountBandejaGeneral();
		bsCustomFileInput.init();
		//Enable check and uncheck all functionality
		$('.checkbox-toggle').click(function() {
			var clicks = $(this).data('clicks')
			if (clicks) {
				//Uncheck all checkboxes
				$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
				$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
				DiviCheck.style.display = 'none';

			} else {

				if (!HojaRutaActiva.data().any()) {
					Swal.fire({
						type: 'warning',
						title: 'Para la Derivacion Multiple, Seleccione Hojas de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					//Check all checkboxes
					$('.mailbox-messages input[type=\'checkbox\']').prop('checked', true);
					$('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square');
					DiviCheck.style.display = 'block';
				}


			}
			$(this).data('clicks', !clicks)
		})
		//Handle starring for font awesome
		$('.mailbox-star').click(function(e) {
			e.preventDefault()
			//detect type
			var $this = $(this).find('a > i')
			var fa = $this.hasClass('fa')

			//Switch states
			if (fa) {
				$this.toggleClass('fa-star')
				$this.toggleClass('fa-star-o')
			}
		})
		//////////////////////SELECCION DE PROVEIDO/////////////////
		$('select#select_proveidoMultiple').on('change', function() {
			$('#a_provMultiple').val($(this).find(":selected").text() + ' ');
			$('#a_provMultiple').focus();
			$('#select_proveidoMultiple').val($('#select_proveidoMultiple > option:first').val());
		});
		$('select#select_proveidoMultipleExterno').on('change', function() {
			$('#a_provMultipleExterno').val($(this).find(":selected").text() + ' ');
			$('#a_provMultipleExterno').focus();
			$('#select_proveidoMultipleExterno').val($('#select_proveidoMultipleExterno > option:first').val());
		});
		$('select#select_proveidoInterno').on('change', function() {
			$('#a_provInterno').val($(this).find(":selected").text() + ' ');
			$('#a_provInterno').focus();
			$('#select_proveidoInterno').val($('#select_proveidoInterno > option:first').val());
		});
		$('select#select_proveidoDerivarDirecta').on('change', function() {
			$('#prov_DerivarDirecta').val($(this).find(":selected").text() + ' ');
			$('#prov_DerivarDirecta').focus();
			$('#select_proveidoDerivarDirecta').val($('#select_proveidoDerivarDirecta > option:first').val());
		});
		//////////////////////////////////////////////////////////////

	});

	function DerivarMultipleInterna() {
		$("#etiquetas").empty();
		var checkbox = document.getElementsByName('ckbox[]');
		var ln = 0;
		var CheckSelected = [];
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
		console.log(ln);
		var respaldo_array = JSON.stringify(CheckSelected);
		$("#cor_id_Array").val(respaldo_array);
		$("#cor_id_ArrayCantidad").val(ln);
		$.ajax({
			url: "<?= site_url("VentanillaUnicaControl/SacarCodigos") ?>",
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
					$("#etiquetas").append('<b><span title="3 New Messages" class="badge bg-success" style="margin-right: 2px;margin-top: 2px;font-size:12px;">GAMEA-' + data[i].cor_codigo + "-" + data[i].ges_gestion + '</span><b>');
				}
				derivarHojaRutaInternaResponsable();
			},
			error: function(xhr) {

			},
			complete: function() {

			},

		});
	}
	/*=============================================
      Section DERIVAR responsable interno
	=============================================*/
	function derivarHojaRutaInternaResponsable() {

		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnical'); ?>",
			beforeSend: function() {},
			success: function(data) {
				var content = '<option value="0" selected="selected">Seleccionar Tecnico</option>';
				var obj = JSON.parse(data);
				for (var i = 0; i < obj.length; i++) {
					content += '<option value="' + obj[i].usu_rol_id + '">';
					content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
					content += '</option>';
				}
				$('#usuInterno_idResponsable').html(content);
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
					alertify.success('Ok');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}
	////////////////////////////////////

	$("#form_derivarHojaRutaMultipleInterna").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/derivarHojaRutaInternaMultiple") ?>",
			// dataType: "JSON",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_derive_multiple').show();
				$('#form_derivarHojaRutaMultipleInterna').hide();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				HojaRutaActiva.ajax.reload(null, false);
				HojaRutaActivaProccess.ajax.reload(null, false);
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentar a Cambiar la Contraseña', function() {
					alertify.error('Cancel');
				});
				$('#form_derivarHojaRutaMultipleInterna')[0].reset();
				$('#load_derive_multiple').hide();
				$('#form_derivarHojaRutaMultipleInterna').show();
			},
			complete: function() {
				$('#form_derivarHojaRutaMultipleInterna')[0].reset();
				$('#form_derivarHojaRutaMultipleInterna').show();
				$('#load_derive_multiple').hide();
				$('#derivarHojaRutaMultiple').modal('hide');

			},
			dataType: 'html'
		});

	});
	////////////////////////////////////////////DERIVAR MULTIPLE     ////////
	function DerivarMultipleExterna() {
		$("#etiquetasExterna").empty();
		var checkbox = document.getElementsByName('ckbox[]');
		var ln = 0;
		var CheckSelected = [];
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
		var respaldo_array = JSON.stringify(CheckSelected);
		$("#cor_id_ArrayExterna").val(respaldo_array);
		$("#cor_id_ArrayCantidadExterna").val(ln);
		$.ajax({
			url: "<?= site_url("VentanillaUnicaControl/SacarCodigos") ?>",
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
				}
				derivarHojaRutaExternaSelect();
			},
			error: function(xhr) {

			},
			complete: function() {

			},

		});
	}








	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA MULTIPLE
	=============================================*/
	$('#div_select_nivel_1ME').hide();
	$('#div_select_nivel_2ME').hide();
	$('#div_select_nivel_3ME').hide();

	function derivarHojaRutaExternaSelect() {
		limpiarControles();
		var nivel1 = '<?= $this->session->userdata('rol_niv_1') ?>';
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';
		var nivel3 = '<?= $this->session->userdata('rol__niv_3') ?>';

		if (nivel2.length === 0 && nivel3.length == 0) {
			$('#div_select_nivel_1ME').show();
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
					$('#select_nivel_1ME').html(content);

				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},

				dataType: 'html'
			});
		} else {
			if (nivel2.length != 0 && nivel3.length == 0) {
				$('#div_select_nivel_1ME').show();
				$('#div_select_nivel_2ME').show();
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
						$('#select_nivel_1ME').html(content_n1);

						var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n2.length; i++) {
							content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
							content_n2 += nuevoArray_n2[i].niv2_nombre;
							content_n2 += '</option>';
						}
						$('#select_nivel_2ME').html(content_n2);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});
			} else {
				$('#div_select_nivel_2ME').show();
				$('#div_select_nivel_3ME').show();
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
						$('#select_nivel_2ME').html(content_n2);

						var content_n3 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n3.length; i++) {
							content_n3 += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
							content_n3 += nuevoArray_n3[i].niv3_nombre;
							content_n3 += '</option>';
						}
						$('#select_nivel_3ME').html(content_n3);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});
			}
		}

	}

	$('#select_nivel_1ME').change(function() {
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
					$('#list_usuariosME').html(content);
				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},
				dataType: 'html'

			});
			$('#div_select_nivel_2ME').show();
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
					$('#select_nivel_2ME').html(content);
				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},

				dataType: 'html'
			});


			$('#div_select_nivel_3ME').hide();
		} else {
			$('#div_select_nivel_2ME').hide();
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
					$('#list_usuariosME').html(content);
				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},

				dataType: 'html'
			});
		}


	});
	$('#select_nivel_2ME').change(function() {
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
						$('#list_usuariosME').html(content);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});
				$('#div_select_nivel_3ME').show();

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
						$('#select_nivel_3ME').html(content);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});



			} else {
				$('#div_select_nivel_3ME').hide();
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
						$('#list_usuariosME').html(content);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});
			}
		}
	});
	$('#select_nivel_3ME').change(function() {
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
					$('#list_usuariosME').html(content);
				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},

				dataType: 'html'
			});
		}
	});




	$("#form_derivarHojaRutaMultipleExterna").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/derivarHojaRutaExternaMultiple") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_register_external_multiple').show();
				$('#form_derivarHojaRutaMultipleExterna').hide();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				HojaRutaActiva.ajax.reload(null, false);
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentar a Cambiar la Contraseña', function() {
					alertify.error('Cancel');
				});
				$('#form_derivarHojaRutaMultipleExterna')[0].reset();
				$('#load_register_external_multiple').hide();
				$('#form_derivarHojaRutaMultipleExterna').show();
			},
			complete: function() {
				$('#form_derivarHojaRutaMultipleExterna')[0].reset();
				$('#form_derivarHojaRutaMultipleExterna').show();
				$('#load_register_external_multiple').hide();
				$('#derivarHojaRutaMultipleExterna').modal('hide');

			},
			dataType: 'html'
		});

	});



	//////////////////////////////////////////////////////////////////////////////////////










	function DerivacionDirecta(cor_id, codigo) {
		$(".cod_GAMEA").text(codigo);
		$('#cor_id_Hoja').val(cor_id);
		$('#codigo_Hoja').val(codigo);
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
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
					alertify.error('Cancel');
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
				$('#select_nivel_22').html(content_n1);
				$('#list_usuarioss').html(content);
				$('#div_select_nivel_33').hide();
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
					alertify.error('Cancel');
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
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
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
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},
				dataType: 'html'
			});
		}
	});

	$("#form_derivar_Directa").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryGestionControl/derivarHojaRutaExternaGestion") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#submitDerivarDirecta').prop('disabled', true);
				$('#form_derivar_Directa').hide();
				$('#load_derivar_Directa').show();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				HojaRutaActiva.ajax.reload(null, false);
				HojaRutaActivaProccess.ajax.reload(null, false);
				
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Existe un Error, vuelta Intentarlo de Nuevo', function() {
					alertify.error('Cancel');
				});
				$('#submitDerivarDirecta').prop('disabled', false);
				$('#form_derivar_Directa')[0].reset();
				$('#load_derivar_Directa').hide();
				$('#form_derivar_Directa').hide();
			},
			complete: function() {
				$('#form_derivar_Directa')[0].reset();
				$('#submitDerivarDirecta').prop('disabled', false);
				$('#form_derivar_Directa').show();
				$('#load_derivar_Directa').hide();
				$('#DerivacionDirecta').modal('hide');
				OcultarDivCheckbox();
			},
			dataType: 'html'
		});
	});




</script>
<script>
	/*=============================================
      Section SUBIR ARCHVOS
	=============================================*/
	// DropzoneJS Demo Code Start
	Dropzone.autoDiscover = false
	// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
	var previewNode = document.querySelector("#template")
	previewNode.id = ""
	var previewTemplate = previewNode.parentNode.innerHTML
	previewNode.parentNode.removeChild(previewNode)
	//////////////////////////1er DROPZONE/////////////////////
	var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
		url: "<?= site_url("SecretaryControl/fileUpload") ?>", // Set the url
		maxFiles: 1,
		maxFilesize: 2,
		thumbnailWidth: 80,
		thumbnailHeight: 80,
		parallelUploads: 20,
		acceptedFiles: "application/pdf",
		previewTemplate: previewTemplate,
		autoQueue: false, // Make sure the files aren't queued until manually added
		previewsContainer: "#previews", // Define the container to display the previews
		clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
	})

	myDropzone.on("addedfile", function(file) {
		// Hookup the start button
		file.previewElement.querySelector(".start").onclick = function() {
			myDropzone.enqueueFile(file)
		}
	})

	// Update the total progress bar
	myDropzone.on("totaluploadprogress", function(progress) {
		document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
	})

	myDropzone.on("sending", function(file) {
		// Show the total progress bar when upload starts
		document.querySelector("#total-progress").style.opacity = "1"
		// And disable the start button
		file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
	})

	// Hide the total progress bar when nothing's uploading anymore
	myDropzone.on("queuecomplete", function(progress) {
		document.querySelector("#total-progress").style.opacity = "0"
	})

	// Setup the buttons for all transfers
	// The "add files" button doesn't need to be setup because the config
	// `clickable` has already been specified.
	document.querySelector("#actions .start").onclick = function() {
		myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
	}
	document.querySelector("#actions .cancel").onclick = function() {
		myDropzone.removeAllFiles(true)
	}
	// DropzoneJS Demo Code End	


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
      CAMBIAR PASSWORD USUARIOS
	=============================================*/
	$('#load_cambiarpass').hide();
	$("#form_cambiarpass").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/CambiarPass") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_cambiarpass').show();
				$('#form_cambiarpass').hide();
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
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentar a Cambiar la Contraseña', function() {
					alertify.error('Cancel');
				});
				$('#form_cambiarpass')[0].reset();
				$('#load_cambiarpass').hide();
				$('#form_cambiarpass').show();
			},
			complete: function() {
				$('#form_cambiarpass')[0].reset();
				$('#form_cambiarpass').show();
				$('#load_cambiarpass').hide();
				$('#modal_cambiarpass').modal('hide');
				$('#spanPass').hide();
			},
			dataType: 'html'
		});

	});


	/*=============================================
      Section DATATABLE FORMULARIO HOJA DE RUTA
	=============================================*/
	HojaRutaActiva = $('#example1').DataTable({
		"processing": true,
    "serverSide": false,
	"ajax": "<?= site_url('SecretaryGestionControl/fetch_Corresp'); ?>",
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": true,
    "responsive": true,
    columnDefs: [{
        className: "align-middle text-xs",
        targets: "_all"
      },
	  ]
	});
	HojaRutaActivaProccess = $('#example2').DataTable({
		"ajax": "<?= site_url('SecretaryGestionControl/fetch_CorrespProcess'); ?>",
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
	HojaRutaActivaConcluded = $('#example3').DataTable({
		"ajax": "<?= site_url('SecretaryGestionControl/fetch_CorrespConcluded'); ?>",
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
	HojaRutaActiva.ajax.reload(null, false);
	/*=============================================
      Section CREAR HOJA DE RUTA FORMULARIO
	=============================================*/
	$("#load_register").hide();
	$(".secretary #form_crearHoja").submit(function(e) {
		e.preventDefault();
		if ($(".secretary #form_crearHoja").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("SecretaryControl/registrarHojaRuta") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#enviarHojaRuta').prop('disabled', true);
					$('#form_crearHoja').hide();
					$('#load_register').show();
					myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
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
					alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function() {
						alertify.error('Cancel');
					});
					$('#enviarHojaRuta').prop('disabled', false);
					$('#form_crearHoja')[0].reset();
					$('#load_register').hide();
					$('#form_crearHoja').show();
				},
				complete: function() {
					$('#form_crearHoja')[0].reset();
					$('#enviarHojaRuta').prop('disabled', false);
					$('#form_crearHoja').show();
					$('#load_register').hide();
					$('#CrearHojaRuta').modal('hide');
					HojaRutaActiva.ajax.reload(null, false);
				},
				dataType: 'html'
			});
		}
	});

	function Actualizar() {
		HojaRutaActiva.ajax.reload(null, false);
	}
	/*==================================================
	=     Section EDITAR FORMULARIO HOJA DE RUTA       =
	==================================================*/
	function listarDatosHojaRuta(cor_id, cod) {
		$(".cod_GAMEA").text(cod);
		limpiarCamposHDR();
		VerArchivosEditar(cor_id);
		$.ajax({
			type: "GET",
			url: "<?= site_url('secretaryControl/listarDatosHojaRuta') ?>/" + cor_id,
			dataType: "json",
			beforeSend: function() {
				$('#enviarHojaRuta_edit').prop('disabled', true);
				$('#form_editarHoja').hide();
				$('#load_register_edit').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				$('#id_cor').val(obj.cor_id);
				$("#cite_edit").val(obj.cor_cite);
				$("#ref_edit").val(obj.cor_referencia);
				$("#descrip_doc_edit").val(obj.cor_descripcion);
				$("#obs_doc_edit").val(obj.cor_observacion);
				$("#nro_contacto_edit").val(obj.cor_tel_remitente);
				$("#rdo_urgente").attr('checked', (obj.cor_nivel == 'U' ? true : false));
				$("#rdo_prioritario").attr('checked', (obj.cor_nivel == 'P' ? true : false));
				$("#rdo_rutinario").attr('checked', (obj.cor_nivel == 'R' ? true : false));
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Existe un Error, vuelta Intentarlo de Nuevo', function() {
					alertify.error('Cancel');
				});
				$('#enviarHojaRuta_edit').prop('disabled', false);
				$('#form_editarHoja')[0].reset();
				$('#load_register_edit').hide();
				$('#form_editarHoja').hide();
			},
			complete: function() {
				$('#enviarHojaRuta_edit').prop('disabled', false);
				$('#form_editarHoja').show();
				$('#load_register_edit').hide();
			},
			dataType: 'html'
		});
	}

	$('#form_editarHoja').submit(function(e) {
		e.preventDefault();
		if ($('.secretary_edit #form_editarHoja').valid()) {
			var formData = new FormData($("#form_editarHoja")[0]);
			$.ajax({
				type: 'POST',
				url: '<?= site_url("secretaryControl/modificarDatosHojaRuta") ?>',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$('#enviarHojaRuta_edit').prop('disabled', true);
					$('#form_editarHoja').hide();
					$('#load_register_edit').show();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					HojaRutaActiva.ajax.reload(null, false);

				},
				error: function(xhr) {

					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor',
						showConfirmButton: false,
						timer: 2500
					});
					HojaRutaActiva.ajax.reload(null, false);
					$('#enviarHojaRuta_edit').prop('disabled', false);
					$('#form_editarHoja')[0].reset();
					$('#load_register_edit').hide();
					$('#form_editarHoja').hide();
				},
				complete: function() {
					$('#form_editarHoja')[0].reset();
					$('#enviarHojaRuta_edit').prop('disabled', false);
					$('#form_editarHoja').show();
					$('#load_register_edit').hide();
					$('#editarHojaRuta').modal('hide');
				},
				dataType: 'html'
			});
		}
	});


	/*=============================================
      Section DERIVAR HOJA DE RUTA INTERNA
	=============================================*/
	function derivarHojaRutaInterna(cor_id, cod) {
		limpiarControlesIn();
		$(".cod_GAMEA").text(cod);
		$('#cor_id_interno').val(cor_id);
		$('#codigo_interno').val(cod);
		VerArchivosDerivar(cor_id);
		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnical'); ?>",
			beforeSend: function() {},
			success: function(data) {
				var content = '<option value="" selected="selected">Seleccionar Tecnico</option>';
				var obj = JSON.parse(data);
				for (var i = 0; i < obj.length; i++) {
					content += '<option value="' + obj[i].usu_rol_id + '">';
					content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
					content += '</option>';
				}
				$('#usuInterno_id').html(content);
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
					alertify.success('Ok');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}

	$(".secretary #form_derivarHojaRutainterna").submit(function(e) {
		e.preventDefault();
		if ($(".secretary #form_derivarHojaRutainterna").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("secretaryControl/derivarHojaRutaInterna") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#submitDeriveInternal').prop('disabled', true);
					$('#form_derivarHojaRutainterna').hide();
					$('#load_derive_internal').show();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					HojaRutaActivaProccess.ajax.reload(null, false);
					HojaRutaActiva.ajax.reload(null, false);
				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function() {
						alertify.error('Cancel');
					});
					$('#submitDeriveInternal').prop('disabled', false);
					$('#form_derivarHojaRutainterna')[0].reset();
					$('#load_derive_internal').hide();
					$('#form_derivarHojaRutainterna').show();
				},
				complete: function() {
					$('#form_derivarHojaRutainterna')[0].reset();
					$('#submitDeriveInternal').prop('disabled', false);
					$('#form_derivarHojaRutainterna').show();
					$('#load_derive_internal').hide();
					$('#derivarHojaRutaInterna').modal('hide');
				},
				dataType: 'html'
			});
		}
	});



	


	/////////////////////////////////////

	/*=============================================
  		FUNCTION VER HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	function viewFile(cor_id, codigo) {
		$('.modal-body').hide();
		$('#viewEyeRouteTitle').text(codigo);
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/Correspondencia") ?>",
			data: {
				cor_id: cor_id
			},
			beforeSend: function() {
				$('#load_viewEyeRoute').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj[0]);
				$('#cite').val(obj[0].cor_cite);
				$('#reference').val(obj[0].cor_referencia);
				$('#description').val(obj[0].cor_descripcion);
				$('#observation').val(obj[0].cor_observacion);
				$('#remitente').val(obj[0].cor_nombre_remitente);
				$('#cargo_remitenteV').val(obj[0].cor_cargo_remitente);
				$('#inst_remitente').val(obj[0].cor_institucion);
				$('#tel_remitente').val(obj[0].cor_tel_remitente);
				$('.modal-body').show();
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function() {
					alertify.error('Cancel');
				});
				$('#load_viewEyeRoute').hide();
			},
			complete: function() {
				$('#load_viewEyeRoute').hide();
			},
			dataType: 'html'
		});
	}


	/*=============================================
	  FUNCTION VER ARCHIVOS
	=============================================*/
	function VerArchivosAjax(cor_id) {
		$('#load_archivos').hide();
		$.ajax({
			url: "<?= site_url('SecretaryControl/ListDocument') ?>/" + cor_id,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {
				$('#ButtonVerArchivo').prop('disabled', true);
				limpiarTable();
			},
			success: function(data) {
				$('#load_archivos').hide();
				var newData = JSON.parse(JSON.stringify(data))
				var count = Object.keys(data).length;
				if (count > 0) {
					$('#VerArchivos').modal('show');
					var tr_head = "<tr>" +
						"<th style='font-size: 10px; text-align: center;'>NRO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DOCUMENTO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DEPENDENCIA</th>" +
						"<th style='font-size: 10px; text-align: center;'>FECHA</th>" +
						"</tr>";
					$("#TableDocDerivar thead").append(tr_head);
					for (var i = 0; i < count; i++) {
						var idDoc = newData[i].id_doc;
						var id = newData[i].cor_id;
						var original = newData[i].name_document_original;
						var enc = newData[i].name_document_encript;
						var fecha = newData[i].fecha;
						var dependencia = newData[i].cor_institucion;
						newcount = i + 1;
						var tr_str = "<tr>" +
							"<td style=' text-align: center;'>" + newcount + "</td>" +
							"<td ><a href='<?= base_url() ?>assets/upload/documents/" + enc + "' style='color: #fff;background-color: #007bff;border-color: #007bff;padding: .25rem .5rem;font-size: .575rem;line-height: 1.5;border-radius: .2rem;' target='_blank'><i class='fa fa-eye'></i> " + original + "</a></td>" +
							"<td >" + dependencia + "</td>" +
							"<td >" + fecha + "</td>" +
							"</tr>";
						$("#TableDocDerivar tbody").append(tr_str);
					}
				} else {
					$('#VerArchivos').modal('hide');
					alertify.alert('SISCO', 'No Tiene Archivos', function() {
						alertify.success('Ok');
					});
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#VerArchivos').modal('hide');
				alert('Error con el servidor 33');
			},
			complete: function() {
				$('#ButtonVerArchivo').prop('disabled', false);
				$('#VerArchivos').modal('hide');
			}
		});

	}

	////////////////////////////////////
	function limpiarTable() {
		$(`#TableDocDerivar thead`).empty();
		$(`#TableDocDerivar tbody`).empty();
	}

	function VerArchivosDerivar(cor_id) {
		$.ajax({
			url: "<?= site_url('SecretaryControl/ListDocument') ?>/" + cor_id,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {
				$(`#TableDocDerivar thead`).empty();
				$(`#TableDocDerivar tbody`).empty();
			},
			success: function(data) {
				var newData = JSON.parse(JSON.stringify(data))
				var count = Object.keys(data).length;
				if (count > 0) {

					var tr_head = "<tr>" +
						"<th style='font-size: 10px; text-align: center;'>NRO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DOCUMENTO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DEPENDENCIA</th>" +
						"<th style='font-size: 10px; text-align: center;'>FECHA</th>" +
						"</tr>";
					$("#TableDocDerivar thead").append(tr_head);
					for (var i = 0; i < count; i++) {
						var idDoc = newData[i].id_doc;
						var id = newData[i].cor_id;
						var original = newData[i].name_document_original;
						var enc = newData[i].name_document_encript;
						var fecha = newData[i].fecha;
						var dependencia = newData[i].cor_institucion;
						newcount = i + 1;
						var tr_str = "<tr>" +
							"<td style=' text-align: center;'>" + newcount + "</td>" +
							"<td ><a href='<?= base_url() ?>assets/upload/documents/" + enc + "' style='color: #fff;background-color: #007bff;border-color: #007bff;padding: .25rem .5rem;font-size: .575rem;line-height: 1.5;border-radius: .2rem;' target='_blank'><i class='fa fa-eye'></i> " + original + "</a></td>" +
							"<td >" + dependencia + "</td>" +
							"<td >" + fecha + "</td>" +
							"</tr>";
						$("#TableDocDerivar tbody").append(tr_str);
					}
				} else {
					var tr_str = "<tr>" +
						"<td style=' text-align: center;'>NO TIENE ARCHIVOS</td>" +
						"</tr>";
					$("#TableDocDerivar tbody").append(tr_str);
				}
			}
		});

	}
	//////////////////////////////////
	function VerArchivosEditar(cor_id) {
		$.ajax({
			url: "<?= site_url('SecretaryControl/ListDocument') ?>/" + cor_id,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {
				$(`#TableDocEditar thead`).empty();
				$(`#TableDocEditar tbody`).empty();
			},
			success: function(data) {
				var newData = JSON.parse(JSON.stringify(data))
				var count = Object.keys(data).length;
				if (count > 0) {

					$("#NuevoArchivo").prop('disabled', true);
					var tr_head = "<tr>" +
						"<th style='font-size: 10px; text-align: center;'>NRO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DOCUMENTO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DEPENDENCIA</th>" +
						"<th style='font-size: 10px; text-align: center;'>FECHA</th>" +
						"<th ></th>" +
						"</tr>";
					$("#TableDocEditar thead").append(tr_head);
					for (var i = 0; i < count; i++) {
						var idDoc = newData[i].id_doc;
						var id = newData[i].cor_id;
						var original = newData[i].name_document_original;
						var enc = newData[i].name_document_encript;
						var fecha = newData[i].fecha;
						var dependencia = newData[i].cor_institucion;
						newcount = i + 1;
						var tr_str = "<tr>" +
							"<td style=' text-align: center;'>" + newcount + "</td>" +
							"<td ><a href='<?= base_url() ?>assets/upload/documents/" + enc + "' style='color: #fff;background-color: #007bff;border-color: #007bff;padding: .25rem .5rem;font-size: .575rem;line-height: 1.5;border-radius: .2rem;' target='_blank'><i class='fa fa-eye'></i> " + original + "</a></td>" +
							"<td >" + dependencia + "</td>" +
							"<td >" + fecha + "</td>" +
							"<td align='center'><button type='button'  style='color: #fff;background-color: #dc3545;border-color: #e83e8c;padding: .25rem .5rem;font-size: .775rem;line-height: 1.5;border-radius: .2rem;'  onclick='BorrarFile(" + idDoc + ")'  >Eliminar</button></td>" +
							"</tr>";
						$("#TableDocEditar tbody").append(tr_str);
					}
				} else {
					var tr_str = "<tr>" +
						"<td style=' text-align: center;'>NO TIENE ARCHIVOS</td>" +

						"</tr>";
					$("#TableDocEditar tbody").append(tr_str);
					$("#NuevoArchivo").prop('disabled', false);
				}
			}
		});
	}


		/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function CountBandejaVentanillaUnica() {
		$.ajax({
			url: "<?php echo site_url('SecretaryGestionControl/CountBandejaInitVentanilla') ?>/",
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				var obj = JSON.parse(obj);
				var num = obj.contador;
				if (num > 0) {
					$('#spancontador').html(obj.contador);
				} else {
					$('#spancontador').empty();
				}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error con el Contador de Bandeja 1', function() {
					alertify.error('Cancel');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}
	/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function CountBandejaVentanillaInterna() {
		$.ajax({
			url: "<?php echo site_url('SecretaryGestionControl/CountBandejaInit') ?>/",
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				var obj = JSON.parse(obj);
				var num = obj.contador;
				if (num > 0) {
					$('#spancontador2').html(obj.contador);
				} else {
					$('#spancontador2').empty();
				}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error con el Contador de Bandeja 2', function() {
					alertify.error('Cancel');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}

	/////////////////////////////////////////////////////////
	/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function CountBandejaGeneral() {
		$.ajax({
			url: "<?php echo site_url('TechnicalControl/CountBandejaInit') ?>/",
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				var obj = JSON.parse(obj);
				var num = obj.contador;
				if (num > 0) {
					$('#spancontador3').html(obj.contador);
				} else {
					$('#spancontador3').empty();
				}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error con el Contador de Bandeja 2', function() {
					alertify.error('Cancel');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}

	/////////////////////////////////////////////////////////
	function resetDropZone() {
		myDropzone.removeAllFiles(true);
	}

	function BorrarFile(cod) {
		$.ajax({
			url: "<?= site_url('secretaryControl/DeleteFile') ?>/" + cod,
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(dataa) {
				Swal.fire({
					type: 'success',
					title: 'Archivo Eliminado Exitosamente',
					showConfirmButton: false,
					timer: 2500
				});
				VerArchivosEditar(cod);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error con el servidor con el Processo Eliminar, Vuelva a Intentarlo');
			},
			complete: function() {
				HojaRutaActiva.ajax.reload(null, false);
			}
		});

	}
	////////////////////////////////////
	function comunicados() {
		$('#modalComunicados').modal('toggle');
	}
	/////////////////////////////

	$('#btnCrearhojaderuta').on('click', function() {
		limpiarCamposHDR();
	});
	///////////////////////////////////////
	function limpiarControlesVentanilla() {
		$('select#select_nivel_22 option[value="0"]').prop('selected', true);
		$('select#select_nivel_33 option[value="0"]').prop('selected', true);
		$("select#list_usuarioss option").each(function() {
			$(this).remove();
		});
	}
</script>
</body>

</html>