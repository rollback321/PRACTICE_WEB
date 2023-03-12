<script>
	/*=============================================
	  FUNCTION RETRACTAR
	=============================================*/
	function retractar(pend_id, codigo) {

		Swal.fire({
			title: 'Esta seguro de Retractar la Hoja de Ruta ' + codigo + ' ?',
			text: "Confirme: ",
			type: 'info',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, estoy seguro!'
		}).then((result) => {
			if (result.value === true) {
				$.ajax({
					type: "POST",
					url: "<?= site_url('VentanillaUnicaControl/RetractarVentUnica') ?>/" + pend_id,
					//dataType: "JSON",
					data: {
						pend_id: pend_id,
					},
					beforeSend: function() {
						$('#ButtonVU_Retractar').prop('disabled', true);
					},
					success: function(data) {
						Swal.fire({
							type: 'success',
							title: codigo + ' ' + data,
							showConfirmButton: false,
							timer: 2500
						});
					},
					error: function(jqXHR, textStatus, errorThrown) {
						Swal.fire({
							type: 'error',
							title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
							showConfirmButton: false,
							timer: 2500
						});
					},
					complete: function() {
						$('#ButtonVerArchivo').prop('disabled', false);
						Actualizar1_4Tablas();

					}
				});
			}
		});


	}
</script>