<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	////////////////////////////////////////////////////////////////////////////////////
	function desconcluir(conclu_id, cor_id, his_id,origen,nro_copia,codigo) {
		Swal.fire({
			title: '<p style="font-size:25px;">Descripcion de la Desconclusion  de  la Hoja Ruta <b>' + codigo + ':</b></p>',
			input: "text",
			showCancelButton: true,
			confirmButtonText: "Desconcluir",
			cancelButtonText: "Cancelar",
			inputValidator: value => {
				// Si el valor es válido, debes regresar undefined. Si no, una cadena
				if (value.trim() == '') {
					return 'Por favor, Inserte un motivo!';
				} else {
					$.ajax({
						type: 'POST',
						url: "<?= site_url('JefeControl/DesconcluirHojaRuta'); ?>",
						data: {
							conclu_id: conclu_id,
							cor_id: cor_id,
							his_id: his_id,
							codigo: codigo,
							origen: origen,
							nro_copia: nro_copia,
							motivo_des: value
						},
						beforeSend: function() {
							//	$('#ButtonDeny').prop('disabled', true);
						},
						success: function(json) {
							Swal.fire({
								type: 'success',
								title: json,
								showConfirmButton: false,
								timer: 2500
							});
							CountBandeja();
							//console.log(json);
						},
						error: function(xhr) {
							Swal.fire({
								type: 'error',
								title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
								showConfirmButton: false,
								timer: 2500
							});
							//$('#ButtonDeny').prop('disabled', false);
						},
						complete: function() {
							Actualizar2_4TablasBandeja();
							//$('#ButtonDeny').prop('disabled', false);
						},
						dataType: 'html'
					});
				}
			}
		});
	}

	////////////////////////////////////////////////////////////////////////////////////
</script>