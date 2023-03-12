<script>

/*=============================================
	  	FUNCTION HOJA DE RUTA
	=============================================*/
	function deny(his_id, codigo) {
		Swal.fire({
			title: '<p style="font-size:25px;">Descripcion de Rechazo de  la Hoja Ruta <b>' + codigo + ':</b></p>',
			input: "text",
			showCancelButton: true,
			confirmButtonText: "Rechazar",
			cancelButtonText: "Cancelar",
			inputValidator: value => {
				// Si el valor es válido, debes regresar undefined. Si no, una cadena
				if (value.trim() == '') {
					return 'Por favor, Inserte la Descripcion!';
				} else {
					$.ajax({
						type: 'POST',
						url: "<?= site_url('TechnicalControl/denyHojaRuta'); ?>",
						data: {
							his_id: his_id,
							codigo: codigo,
							descp_denny: value
						},
						beforeSend: function() {
							$('#ButtonDenyVI_SMGI').prop('disabled', true);
						},
						success: function(json) {
							Swal.fire({
								type: 'success',
								title: codigo+' '+json,
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
							$('#ButtonDenyVI_SMGI').prop('disabled', false);
							Actualizar3TablasBandeja();
						},
						dataType: 'html'
					});
				}
			}
		});
	}
    </script>