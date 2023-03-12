<script>
/*=============================================
  		FUNCTION VER HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	$('#load_viewEyeRoute').hide();

	function viewFile(cor_id, codigo) {
		$('.modal-body').hide();
		VerArchivosDerivar(cor_id);
		$('#viewEyeRouteTitle').text(codigo);
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/Correspondencia") ?>",
			data: {
				cor_id: cor_id
			},
			beforeSend: function() {
				$('#load_viewEyeRoute').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj[0]);
				$('#ViewDetallesCite').val(obj[0].cor_cite);
				$('#ViewDetallesReference').val(obj[0].cor_referencia);
				$('#ViewDetallesDescription').val(obj[0].cor_descripcion);
				$('#ViewDetallesObservation').val(obj[0].cor_observacion);
				$('.modal-body').show();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
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