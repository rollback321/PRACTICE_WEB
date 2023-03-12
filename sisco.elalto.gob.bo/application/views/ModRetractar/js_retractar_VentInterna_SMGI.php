<script>
	/*=============================================
	  	FUNCTION HOJA DE RUTA
	=============================================*/
	function retractar(cor_id, pend_id, codigo) {
		Swal.fire({
			title: 'Esta seguro de Retractar la Hoja de Ruta ' + codigo + ' ?',
			text: "Confirme",
			type: 'info',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, estoy seguro'
		}).then((result) => {
			if (result.value === true) {
				$.ajax({
					type: 'POST',
					url: "<?= site_url('VentanillaInternaControlSMGI/Retractar_HojaRuta_VentanillaInternaSMGI_Bandeja'); ?>",
					data: {
						cor_id: cor_id,
						pend_id: pend_id,
						codigo: codigo,
					},
					beforeSend: function() {
						//$('#ButtonDeny_VI_SMGI').prop('disabled', true);
					},
					success: function(json) {
						Swal.fire({
							type: 'success',
							title: json,
							showConfirmButton: false,
							timer: 2500
						});
						CountBandeja();
					},
					error: function(xhr) {
						Swal.fire({
							type: 'error',
							title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
							showConfirmButton: false,
							timer: 2500
						});
					},
					complete: function() {
						//	$('#ButtonDeny_VI_SMGI').prop('disabled', false);
						Actualizar2_3TablasBandeja();
					},
					dataType: 'html'
				});

			}
		});

	}


</script>