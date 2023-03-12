<script>
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
					Swal.fire({
						type: 'error',
						title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
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
					Actualizar1Tablas();
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