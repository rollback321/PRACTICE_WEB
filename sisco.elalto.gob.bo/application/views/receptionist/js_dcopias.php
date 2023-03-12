<script>
	$(function() {
		CountBandeja();
		CargarTema();
		derivarHojaRutaCopia();
		evaluar();
		$("#submitAgregarFila").click(function() {
			agregar();
		});
		$("#botonCancelarDerivacion").click(function() {
			window.location = "<?= site_url('SecretaryControl/crearHojaRuta'); ?>";
		});
	});



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

	function agregar() {
		if ($('#formCrearCopias').valid()) {
			var datosRecepcionista;
			var origen="";
			var cod_id = <?php echo $datos1; ?>;
			var recepcionista = $("#list_usuarios option:selected").val();
			var nombreRecepcionista = $("#list_usuarios option:selected").text();

			var proveido = $("#a_proveido").val();
			var observacion = $("#a_obs").val();
			var plazo = $("#DerFecha_plazo").val();

			if(cont==0)
			{origen="ORIGINAL";}
			else{origen="COPIA "+cont;}

			var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn text-red p-0" onclick="eliminar(' + cont + ')"><i class="fas fa-minus-circle fa-2x"></i></button></td><td><input type="hidden" id="contador" name="contador" value="' + num + '"hidden><input type="hidden" id="cor_idTab" name="cor_idTab[]" value="' + cod_id + '">' + num + '</td><td>'+origen+'</td><td><div class="form-group input-group-sm "><input class="form-control " type="hidden" name="recepcionista[]" value="' + recepcionista + '" id="recepcionista">' + nombreRecepcionista + '</div></td><td  width="90px"><div class="form-group input-group-sm "><input class="form-control" style="width:80px"  type="hidden" id="proveido" name="proveido[]" value="' + proveido + '">' + proveido + '</div></td><td ><div class="form-group input-group-sm "><input class="form-control" type="hidden" name="Observacion[]" value="' + observacion + '">' + observacion + '</div></td><td><div class="form-group input-group-sm "><input class="form-control" type="hidden" name="plazo[]" value="' + plazo + '" >' + plazo + '</td></tr>';
			cont++;
			num++;
			limpiar();
			limpiarSelect();
			//   $("#total").html("Bs. " + total);
			evaluar();
			$("#detalles").append(fila);
			//	$("#modalAddArticuloIngreso").modal("hide");
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
			url: "<?= site_url('SecretaryControl/DerivacionExternaCopias'); ?>",
			data: dataCopias,
			beforeSend: function() {
				$('#submitCrearCopias').prop('disabled', true);
			},
			success: function(data) {
				if (data == "Derivacion Externa Correcta!") {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				}
				console.log(data);
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
				setTimeout(function() {window.location = "<?= site_url('SecretaryControl/crearHojaRuta'); ?>";}, 1000);
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
				//	var newData= JSON.parse(JSON.stringify(obj));
				//	var data = $.parseJSON(obj);
				//	result = "{'name':'" + newData.usu_nombres + "','ap':'" + newData.usu_apellidos + "'}";
				result = obj;
				console.log(result);

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
			//	dataType: 'html'
		});
		return result;
	}
	/////////////////////////
	function limpiarSelect() {
		$('select#select_nivel_1 option[value="0"]').prop('selected', true);
		$('select#select_nivel_2 option[value="0"]').prop('selected', true);
		$('select#select_nivel_3 option[value="0"]').prop('selected', true);
		$("select#list_usuarios option").each(function() {
			$(this).remove();
		});
		$('#div_select_nivel_2').hide();
		$('#div_select_nivel_3').hide();
	}
	/////////////////////////
	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/
	$('#div_select_nivel_1').hide();
	$('#div_select_nivel_2').hide();
	$('#div_select_nivel_3').hide();

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
					content += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos+ ' - ' + nuevoArray_n2[i].usu_rol_cargo;
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
						content2 += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos+ ' - ' + nuevoArray_n2[i].usu_rol_cargo;
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
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos+ ' - ' + obj[i].usu_rol_cargo;
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
	/////////////////////////////
	$('#btnCrearhojaderuta').on('click', function() {
		limpiarCamposHDR();
	});
</script>
</body>

</html>