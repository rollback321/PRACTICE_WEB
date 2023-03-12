<script>
/*=============================================
      Section CREAR HOJA DE RUTA FORMULARIO
	=============================================*/
	$("#load_register").hide();
	$("#form_crearHoja").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("ventanillaUnicaControl/registrarHojaRuta") ?>",
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
				Actualizar1Tablas();
				OcultarDivCheckbox();
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

</script>