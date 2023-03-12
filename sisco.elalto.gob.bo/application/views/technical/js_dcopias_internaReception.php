
<script>
	$(function() {
		CountBandeja();
		CargarTema();
		derivarHojaRutaCopia();
		origen();
		evaluar();
		$("#submitAgregarFila").click(function() {
			agregar();
		});
		$("#botonCancelarDerivacion").click(function() {
			window.location = "<?= site_url('TechnicalControl/'); ?>";
		});

	});

	$('#load_cambiarpass').hide();
	
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
		var historial = '<?php echo $datos3 ?>';
		console.log(historial);
		$.ajax({
			type: 'POST',
			url: "<?= site_url('SecretaryControl/ObtenerOrginalCopia'); ?>/" + historial,
			data: historial,
			beforeSend: function() {
			},
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
			var cod_id = <?php echo $datos1; ?>;
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
			url: "<?= site_url('SecretaryControl/DerivacionExternaCopiasBandeja'); ?>",
			data: dataCopias,
			beforeSend: function() {
				$('#submitCrearCopias').prop('disabled', true);
			},
			success: function(data) {
				if (data == "Derivacion Externa Correcta!") {
					Swal.fire({
						type: 'success',
						title: "Derivacion Interna Correcta",
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
					window.location = "<?= site_url('TechnicalControl/'); ?>";
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
	/////////////////////////
	function limpiarSelect() {
		$('select#list_usuarios option[value="0"]').prop('selected', true);
	}
	/////////////////////////
	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/
	function derivarHojaRutaCopia() {
		limpiarSelect();
		$.ajax({
				url: "<?php echo site_url('TechnicalControl/fetchDataListTechnical'); ?>/",
				beforeSend: function() {},
				success: function(data) {
					var obj = JSON.parse(data);

					console.log(obj);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos+ ' - ' + obj[i].usu_rol_cargo;;
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

	

	/////////////////////////////
	$('#btnCrearhojaderuta').on('click', function() {
		limpiarCamposHDR();
	});
</script>
</body>

</html>