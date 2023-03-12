<script>
	
	$("#load_register_edit").hide();
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
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
					showConfirmButton: false,
					timer: 2500
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
					Actualizar1Tablas();
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, vuelva a Intentarlo',
						showConfirmButton: false,
						timer: 2500
					});
					Actualizar1Tablas();
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

</script>