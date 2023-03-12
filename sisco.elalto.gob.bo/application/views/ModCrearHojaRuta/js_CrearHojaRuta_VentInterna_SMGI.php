<script>

	
/*=============================================
      Section CREAR HOJA DE RUTA FORMULARIO
	=============================================*/
	$('#load_register').hide();
	$("#form_crearHoja").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("ventanillaInternaControlSMGI/registrarHojaRuta") ?>",
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
				HojaRutaActiva.ajax.reload(null, false);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
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
			},
			dataType: 'html'
		});

	});
	/////////////////////////////////////////////////////////
	function validar() {
		var NewCodigo = document.getElementById('codigoNewHoja').value;
		$.ajax({
			url: "<?= site_url("VentanillaInternaControlSMGI/ValidarCodigoVI_SMGI") ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				'codigo': NewCodigo,
			},
			beforeSend: function() {},
			success: function(data) {
				console.log(data);
				$("#cod_GAMEA_VERIFICAR").removeClass();
				if (data == null || data == 0) {
					//	console.log(data);
					$("#cod_GAMEA_VERIFICAR").text("NO EXISTE");
					$("#cod_GAMEA_VERIFICAR").addClass(' badge  bg-success');
					$('#enviarHojaRuta').prop('disabled', false);
				} else {
					$("#cod_GAMEA_VERIFICAR").text("SI EXISTE");
					$("#cod_GAMEA_VERIFICAR").addClass(' badge bg-danger');
					$('#enviarHojaRuta').prop('disabled', true);
				}
			},
			error: function(xhr) {
				console.log(xhr);
			},
		});
	}



</script>