<script>
	$(function() {
		CargarTema();
		CountBandeja();
		derivarHojaRutaExterna();
	});
	//$('#div_select_nivel_1DIRECTA').hide();
	$('#div_select_nivel_2DIRECTA').hide();
	$('#div_select_nivel_3DIRECTA').hide();
	$('#pdfReport').prop('disabled', true);

	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()
		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
		//Date picker
		$('#reservationdate').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		//Date picker
		$('#reservationdate2').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		//Date and time picker
		$('#reservationdatetime').datetimepicker({
			icons: {
				time: 'far fa-clock'
			}
		});
	})
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()
		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
		//Date picker
		$('#reservationdates').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		//Date picker
		$('#reservationdates2').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		//Date and time picker
		$('#reservationdatetime').datetimepicker({
			icons: {
				time: 'far fa-clock'
			}
		});
	})

	////////////VALIDACION BOTON IMPRIMIR PDF/////////////////////////////////
	function validarInput() {
		//var fechaI = $('[name=fecha_inicio]').val();
		//var fechaF = $('[name=fecha_final]').val();
		var Usuario = $('[name=list_usuariosDIRECTA]').val();
		//	if (fechaI == null || fechaI == "" || fechaF == null || fechaF == "" || Usuario == null || Usuario == "") {
		if (Usuario == null || Usuario == "") {
			$('#pdfReport').prop('disabled', true);
		} else {
			$('#pdfReport').prop('disabled', false);
		}
	//	console.log(fechaI + "-" + fechaF + "-" + Usuario + "-");
	}
	//////////////////////////////////////////////////////////
	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/
	function derivarHojaRutaExterna() {
		limpiarControlesVentanilla();

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
					content += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos;
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
			limpiarControlesVentanilla();
			$('#div_select_nivel_3DIRECTA').hide();
		} else {
			$('#div_select_nivel_3DIRECTA').show();
			$.ajax({
				url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_3_IDDirecto_ConVentanillaRecaudaciones') ?>/" + parametros + "/" + parametros2,
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
			limpiarControlesVentanilla();
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
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
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



	///////////////////////////////////////////////////////////////////////
	//Limpiar campos Formulario VentanillaUnica
	function limpiarControlesVentanilla() {
		$('select#select_nivel_2DIRECTA option[value="0"]').prop('selected', true);
		$('select#select_nivel_3DIRECTA option[value="0"]').prop('selected', true);
		$("select#list_usuariosDIRECTA option").each(function() {
			$(this).remove();
		});
	}
	//////////////////////////////////////////////////////////
	function VerPDF() {
		var site = '<?= site_url("PdfControl/Reportes_Iframe_Secretary") ?>';
		document.getElementById('iframeReport').src = site;
	}

	//////////////////////////////////////////////////
	//////////////////////////////////////////////////////////
	function limpiarInputsConsulta() {
		$('#div_select_nivel_2DIRECTA').hide();
		$('#div_select_nivel_3DIRECTA').hide();
		$('#Form_ReportesSecretary')[0].reset();
		document.getElementById('iframeReport').src = "";
	}

	//////////////////////////////////////////////////
</script>
</body>

</html>