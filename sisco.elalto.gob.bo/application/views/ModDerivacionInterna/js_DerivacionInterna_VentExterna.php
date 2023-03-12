<script>
	

	/*=============================================
      Section DERIVAR HOJA DE RUTA INTERNA
	=============================================*/
	function derivarHojaRutaInterna(cor_id, pend_id, cod) {
		limpiarControlesIn();
		$(".cod_GAMEA").text(cod);
		$('#cor_id_interno').val(cor_id);
		$('#codigo_interno').val(cod);
		$('#load_derive_internal').hide();
		VerDestinoDerivar(cor_id, pend_id);
		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnicalGestionSecretary'); ?>",
			beforeSend: function() {},
			success: function(data) {
				console.log(data);
				//var content = '<option value="" >Seleccionar Responsable</option>';
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

	$(".secretary #form_derivarHojaRutainterna").submit(function(e) {
		e.preventDefault();
		if ($(".secretary #form_derivarHojaRutainterna").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("VentanillaUnicaControl/derivarHojaRutaPendienteCorId") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#submitDeriveInternalSMGI').prop('disabled', true);
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
					Actualizar2Tablas();
				},
				error: function(xhr) {
					Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
					$('#submitDeriveInternalSMGI').prop('disabled', false);
					$('#form_derivarHojaRutainterna')[0].reset();
					$('#load_derive_internal').hide();
					$('#form_derivarHojaRutainterna').show();
				},
				complete: function() {
					$('#form_derivarHojaRutainterna')[0].reset();
					$('#submitDeriveInternalSMGI').prop('disabled', false);
					$('#form_derivarHojaRutainterna').show();
					$('#load_derive_internal').hide();
					$('#derivarHojaRutaInterna').modal('hide');
				},
				dataType: 'html'
			});
		}
	});

	function Datosforderivar(cor_id) {
		$('#cor_id_interno').val(cor_id);
		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnicalGestion'); ?>",
			beforeSend: function() {},
			success: function(data) {
				var content = '';
				var obj = JSON.parse(data);
				for (var i = 0; i < obj.length; i++) {
					content += '<option selected="selected"value="' + obj[i].usu_rol_id + '">';
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
			complete: function() {},
			dataType: 'html'
		});
	}


	/*==================================================
	=     END Section DERIVACION INTERNA    =
	==================================================*/
//////////////////////////////////////////////////////////////////////
$('select#select_proveidoInterno').on('change', function() {
		$('#a_provInterno').val($(this).find(":selected").text() + ' ');
		$('#a_provInterno').focus();
		$('#select_proveidoInterno').val($('#select_proveidoInterno > option:first').val());
	});
	function limpiarControlesDerivacionInterna() {
		$('select#select_proveidoInterno option[value="0"]').prop('selected', true);
	}
	//////////////////////////////////////////////
</script>