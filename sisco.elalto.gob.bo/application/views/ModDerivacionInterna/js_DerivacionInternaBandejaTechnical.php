<script>
	
	/*=============================================
      Section DERIVAR HOJA DE RUTA INTERNA
	=============================================*/
	$("#load_derive_internal").hide();
	function derivarHojaRutaInterna(his_id, cor_id, cod) {
		limpiarControlesIn();
		$('#load_derive_internal').hide();
		$(".cod_GAMEA").text(cod);
		$('#cor_id_interno').val(cor_id);
		$('#his_id_interno').val(his_id);
		$('#codigo_interno').val(cod);
		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnical'); ?>",
			beforeSend: function() {
				$('#submitDeriveInternal').prop('disabled', true);
				$('#form_derivarHojaRutainterna').hide();
				$('#load_derive_internal').show();
			},
			success: function(data) {
				var content = '<option value="0" selected="selected">Seleccionar Tecnico</option>';
				var obj = JSON.parse(data);
				for (var i = 0; i < obj.length; i++) {
					content += '<option value="' + obj[i].usu_rol_id + '">';
					content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
					content += '</option>';
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
			complete: function() {
				$('#form_derivarHojaRutainterna')[0].reset();
				$('#submitDeriveInternal').prop('disabled', false);
				$('#form_derivarHojaRutainterna').show();
				$('#load_derive_internal').hide();
			},
			dataType: 'html'
		});
	}

	$("#form_derivarHojaRutainterna").submit(function(e) {
		e.preventDefault();
		if ($("#form_derivarHojaRutainterna").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("TechnicalControl/derivarHojaRutaInterna") ?>",
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
					myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
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
					Actualizar2_3TablasBandeja();
				},
				dataType: 'html'
			});
		}

	});
	$('select#select_proveidoInternoBandeja').on('change', function() {
		$('#a_proveidoInternoBandeja').val($(this).find(":selected").text() + ' ');
		$('#a_proveidoInternoBandeja').focus();
		$('#select_proveidoInternoBandeja').val($('#select_proveidoInternoBandeja > option:first').val());
	});
	function limpiarControlesDerivacionInterna() {
		$('select#select_proveidoInterno option[value="0"]').prop('selected', true);
	}
	/*==================================================
	=     END Section DERIVACION INTERNA    =
	==================================================*/

</script>