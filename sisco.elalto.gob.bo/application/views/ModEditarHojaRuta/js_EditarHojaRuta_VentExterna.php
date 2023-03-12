<script>
	/*=============================================
	=        Section EDITAR FORMULARIO HOJA DE RUTA            =
	=============================================*/
	$("#load_register_edit").hide();
	function listarDatosHojaRuta(cor_id, cod) {
		$(".cod_GAMEA").text(cod);
		VerArchivosEditar(cor_id);
		$.ajax({
			type: "GET",
			url: "<?= site_url('VentanillaUnicaControl/listarDatosHojaRuta') ?>/" + cor_id,
			dataType: "json",
			beforeSend: function() {
				$('#enviarHojaRutaEditado').prop('disabled', true);
				$('#form_editarHoja').hide();
				$('#load_register_editar').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj);
				$("#cite_edit").val(obj.cor_cite);
				$("#ref_edit").val(obj.cor_referencia);
				$("#descrip_doc_edit").val(obj.cor_descripcion);
				$("#obs_doc_edit").val(obj.cor_observacion);
				$("#nombre_remitente_edit").val(obj.cor_nombre_remitente);
				$("#cargo_remitente_edit").val(obj.cor_cargo_remitente);
				$("#institucion_remitente_edit").val(obj.cor_institucion);
				$("#nro_contacto_edit").val(obj.cor_tel_remitente);
				$("#colFormLabelSmFecha_edit").val(moment(obj.rec_fecha_recep).format("YYYY-MM-DDTHH:mm:ss"));
				$("#nro_cant_fojas_edit").val(obj.rec_cant_fojas);
				inicializarControlCheckInput("#nro_fojas_edit", obj.rec_doc_nro_fojas, "#nro_cant_fojas_edit");
				$("#nro_cant_cd_dvd_edit").val(obj.rec_cant_cd_dvd);
				inicializarControlCheckInput("#nro_cd_dvd_edit", obj.rec_cd_dvd, "#nro_cant_cd_dvd_edit");
				$("#sobres_cant_edit").val(obj.rec_cant_sobres);
				inicializarControlCheckInput("#sobres_edit", obj.rec_sobres, "#sobres_cant_edit");
				$("#carpetas_cant_edit").val(obj.rec_cant_carpetas);
				inicializarControlCheckInput("#carpetas_edit", obj.rec_carpetas, "#carpetas_cant_edit");
				$("#anillados_cant_edit").val(obj.rec_cant_anillados);
				inicializarControlCheckInput("#anillados_edit", obj.rec_anillados, "#anillados_cant_edit");
				$("#varcor_id").val(obj.cor_id);
				$("#varrec_doc_id").val(obj.rec_doc_id);
				$("#rdo_urgente").attr('checked', (obj.cor_nivel == "U" ? true : false));
				$("#rdo_prioritario").attr('checked', (obj.cor_nivel == "P" ? true : false));
				$("#rdo_rutinario").attr('checked', (obj.cor_nivel == "R" ? true : false));
				$("#Fecha_plazoCorrespondencia_Edit").val(obj.cor_plazo);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#enviarHojaRutaEditado').prop('disabled', false);
				$('#form_editarHoja')[0].reset();
				$('#load_register_editar').hide();
				$('#form_editarHoja').hide();
			},
			complete: function() {
				$('#enviarHojaRutaEditado').prop('disabled', false);
				$('#form_editarHoja').show();
				$('#load_register_editar').hide();
			},
			dataType: 'html'
		});
	}

	$("#form_editarHoja").submit(function(e) {
		e.preventDefault();
		var formData = new FormData($("#form_editarHoja")[0]);
		$.ajax({
			type: 'POST',
			url: "<?= site_url("ventanillaUnicaControl/modificarHojaRuta") ?>",
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function() {
				$('#enviarHojaRutaEditado').prop('disabled', true);
				$('#form_editarHoja').hide();
				$('#load_register_editar').show();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				Actualizar2Tablas();
				console.log(data);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#enviarHojaRutaEditado').prop('disabled', false);
				$('#form_editarHoja')[0].reset();
				$('#load_register_editar').hide();
				$('#form_editarHoja').hide();
			},
			complete: function() {
				$('#form_editarHoja')[0].reset();
				$('#enviarHojaRutaEditado').prop('disabled', false);
				$('#form_editarHoja').show();
				$('#load_register_editar').hide();
				$('#editarHojaRuta').modal('hide');
				OcultarDivCheckbox();
			},
			dataType: 'html'
		});
	});

</script>