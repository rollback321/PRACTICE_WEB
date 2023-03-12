<script>
	$(function() {
		CountBandeja();
		
		derivarHojaRutaCopia();
		origen();
		evaluar();
		derivarHojaRutaInterna();
		CargarTema();
		$("#submitAgregarFila").click(function() {
			agregar();
		});
		$("#botonCancelarDerivacion").click(function() {
			window.location = "<?= site_url('VentanillaInternaControlSMGI/'); ?>";
		});

	});
	$('#div_select_nivel_1').hide();
	$('#div_select_nivel_2').hide();
	$('#div_select_nivel_3').hide();
	var cont = 0;
	var num = 1;
	//MOSTRAR BOTON SI TOTAL ES MAYOR A 0
	function evaluar() {
		if (cont > 0) {
			$("#guardar").show();
		} else {
			$("#guardar").hide();
		}
	};

	//ELIMINAR UNA FILA
	function eliminar(index) {
		num = num - 1;
		cont = cont - 1;
		$("#fila" + index).remove();
		evaluar();
	}

	//CLIC PARA LIMPIAR IMPUT DESPUES DE AGREGAR
	function limpiar() {
		$("#a_proveido").val('');
		$("#a_obs").val('');
	};

	function origen() {
		var historial = '<?php echo $datos1 ?>';
		console.log(historial);
		$.ajax({
			type: 'POST',
			url: "<?= site_url('SecretaryControl/ObtenerOrginalCopia'); ?>/" + historial,
			data: historial,
			beforeSend: function() {},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj);
				if (obj.origen == "O") {
					console.log(obj.origen);
				} else {
					console.log(obj.origen);
					var orig = obj.origen;
					var maxcopias = obj.maxcopia;
					cont = 1;
				}
			},
		});
	}


	function agregar() {
		if ($('#formCrearCopias').valid()) {
			var datosRecepcionista;
			var origen = "";
			var his_id = <?php echo $datos1; ?>;
			var cod_id = <?php echo $datos2; ?>;
			var pend_id = <?php echo $datos3; ?>;

			var recepcionista = $("#list_usuarios option:selected").val();
			var nombreRecepcionista = $("#list_usuarios option:selected").text();

			var proveido = $("#a_proveido").val();
			var observacion = $("#a_obs").val();
			var plazo = $("#DerFecha_plazo").val();
			if (cont == 0) {
				origen = "ORIGINAL";
			} else {
				origen = "COPIA " + cont;
			}
			var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn text-red p-0" onclick="eliminar(' + cont + ')"><i class="fas fa-minus-circle fa-2x"></i></button></td><td><input type="hidden" id="contador" name="contador" value="' + num + '"hidden><input type="hidden" id="cor_idTab" name="cor_idTab[]" value="' + cod_id + '">' + num + '</td><td>' + origen + '</td><td><div class="form-group input-group-sm "><input class="form-control " type="hidden" name="recepcionista[]" value="' + recepcionista + '" id="recepcionista">' + nombreRecepcionista + '</div></td><td  width="90px"><div class="form-group input-group-sm "><input class="form-control" style="width:80px"  type="hidden" id="proveido" name="proveido[]" value="' + proveido + '">' + proveido + '</div></td><td ><div class="form-group input-group-sm "><input class="form-control" type="hidden" name="Observacion[]" value="' + observacion + '">' + observacion + '</div></td><td><div class="form-group input-group-sm "><input class="form-control" type="hidden" name="plazo[]" value="' + plazo + '" >' + plazo + '</td></tr>';
			cont++;
			num++;
			limpiar();
			limpiarSelect();
			evaluar();
			$("#detalles").append(fila);
			alertify.success('Derivacion Agregado Correctamente ');
		}
	}

	//PROCESOS AL CREAR NOTA DE INGRESO -> TABLA INGRESO
	$("#formCrearCopias").submit(function(e) {
		e.preventDefault();
		var dataCopias = $("#formCrearCopias").serialize();
		console.log(dataCopias);
		$.ajax({
			type: 'POST',
			url: "<?= site_url('VentanillaInternaControlSMGI/DerivacionPendientesCopiasBandeja'); ?>",
			data: dataCopias,
			beforeSend: function() {
				$('#submitCrearCopias').prop('disabled', true);
			},
			success: function(data) {
				//if (data == "Derivacion Con Copias Correcta!") {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				// } else {
				// 	alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
				// 		alertify.error('Cancel');
				// 	});
				//	}
					//console.log(data);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#submitCrearCopias').prop('disabled', false);
			},
			complete: function() {
				setTimeout(function() {
					window.location = "<?= site_url('VentanillaInternaControlSMGI/'); ?>";
				}, 1000);
				 $('#submitCrearCopias').prop('disabled', false);
			},
			dataType: 'html'
		});
		//validator.resetForm();
	});

	/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function DatosRemitente(recepcionista) {
		var result;
		$.ajax({
			url: "<?php echo site_url('SecretaryControl/DatosRemitente') ?>/" + recepcionista,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				result = obj;
				console.log(result);
			}

		});
		return result;
	}
	/*=============================================
	      Section DERIVAR HOJA DE RUTA INTERNA
		=============================================*/
	function derivarHojaRutaInterna() {
		//	limpiarControlesIn();
		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnicalGestionSecretary'); ?>",
			beforeSend: function() {},
			success: function(data) {
				console.log(data);
				var content = '';
				var obj = JSON.parse(data);
				for (var i = 0; i < obj.length; i++) {
					content += '<option selected="selected" value="' + obj[i].usu_rol_id + '">';
					content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
					content += '</option>';
					console.log(obj[i].usu_nombres);
				}
				$('#usuInterno_id').html(content);
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


	/////////////////////////
	function limpiarSelect() {
		$('select#select_nivel_2 option[value="0"]').prop('selected', true);
		$('select#select_nivel_3 option[value="0"]').prop('selected', true);
		$("select#list_usuarios option").each(function() {
			$(this).remove();
		});
	}
	/////////////////////////
	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/
	function derivarHojaRutaCopia() {
		limpiarSelect();
		$('#div_select_nivel_1').show();

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
				$('#select_nivel_1').html(content);
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
					alertify.error('Cancel');
				});
			},
			dataType: 'html'
		});
		derivarHojaRutaInterna();
	}

	$('#select_nivel_1').change(function() {
		var parametros = $("#select_nivel_1").val();
		console.log(parametros);
		$('#div_select_nivel_1').show();
		$('#div_select_nivel_2').show();
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
				$('#select_nivel_2').html(content_n1);
				$('#list_usuarios').html(content);
				$('#div_select_nivel_3').hide();
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


	$('#select_nivel_2').change(function() {
		var parametros = $("#select_nivel_1").val();
		var parametros2 = $("#select_nivel_2").val();
		console.log(parametros + " " + parametros2);
		if (parametros == 0) {
			limpiarSelect();
			$('#div_select_nivel_3').hide();
		} else {
			$('#div_select_nivel_3').show();
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
					$('#select_nivel_3').html(content);
					$('#list_usuarios').html(content2);
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

	$('#select_nivel_3').change(function() {
		var parametros = $("#select_nivel_1").val();
		var parametros2 = $("#select_nivel_2").val();
		var parametros3 = $("#select_nivel_3").val();
		if (parametros2 == 0) {
			limpiarSelect();
		} else {

			$('#div_select_nivel_3').show();
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
					$('#list_usuarios').html(content);
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
	/*=============================================
      Section DERIVAR HOJA DE RUTA INTERNA
	=============================================*/
	function derivarHojaRutaInterna() {
		//	limpiarControlesIn();
		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnicalGestionSecretary'); ?>",
			beforeSend: function() {},
			success: function(data) {
				console.log(data);
				var content = '<option value="" >Seleccionar Responsable</option>';
				var obj = JSON.parse(data);
				for (var i = 0; i < obj.length; i++) {
					content += '<option selected="selected" value="' + obj[i].usu_rol_id + '">';
					content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
					content += '</option>';
					console.log(obj[i].usu_nombres);
				}
				$('#usuInterno_id').html(content);
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
	/////////////////////////////
	$('#btnCrearhojaderuta').on('click', function() {
		limpiarCamposHDR();
	});
</script>
</body>

</html>