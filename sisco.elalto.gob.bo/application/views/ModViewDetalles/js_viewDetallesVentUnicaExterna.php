<script>
	/*=============================================
  		FUNCTION VER HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	$('#load_viewEyeRoute').hide();

	function viewFile(cor_id, pend_id, codigo) {
		$('.modal-body').hide();
		$('.viewEyeRouteTitle').text(codigo);
		$.ajax({
			type: 'POST',
			url: "<?= site_url("VentanillaUnicaControl/DatosCorrespondencia") ?>",
			data: {
				cor_id: cor_id,
				pend_id: pend_id
			},
			beforeSend: function() {
				$('#load_viewEyeRoute').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj);
				var nuevoArray_n1 = obj.data_n1;
				var nuevoArray_n2 = obj.data_n2;
				$('#reference').val(nuevoArray_n1.cor_referencia);
				$('#description').val(nuevoArray_n1.cor_descripcion);
				$('#observation').val(nuevoArray_n1.cor_observacion);
				$('#remitente_nombre').val(nuevoArray_n1.cor_nombre_remitente);
				$('#remitente_cargo').val(nuevoArray_n1.cor_cargo_remitente);
				$('#remitente_institucion').val(nuevoArray_n1.cor_institucion);
				$('#remitente_telefono').val(nuevoArray_n1.cor_tel_remitente);
				$('#citeView').val(nuevoArray_n1.cor_cite);
				if (nuevoArray_n2 == null || nuevoArray_n2 == "" || nuevoArray_n2 == 0) {
					$('#d_fojas').val("");
					$('#d_cd').val("");
					$('#d_sobres').val("");
					$('#d_carpeta').val("");
					$('#d_anillado').val("");
				} else {
					$('#d_fojas').val(nuevoArray_n2.rec_cant_fojas);
					$('#d_cd').val(nuevoArray_n2.rec_cant_cd_dvd);
					$('#d_sobres').val(nuevoArray_n2.rec_cant_sobres);
					$('#d_carpeta').val(nuevoArray_n2.rec_cant_carpetas);
					$('#d_anillado').val(nuevoArray_n2.rec_cant_anillados);
				}
				$('.modal-body').show();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#load_viewEyeRoute').hide();
			},
			complete: function() {
				$('#load_viewEyeRoute').hide();
			},
			dataType: 'html'
		});
	}
</script>