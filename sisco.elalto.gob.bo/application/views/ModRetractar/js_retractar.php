<script>
	/*=============================================
	  FUNCTION RETRACTAR
	=============================================*/
	function retractar(cod_id,his_id, codigo) {

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
					url: "<?= site_url('SecretaryControl/Retractar') ?>/",
					dataType: "JSON",
					data: {
						cod_id: cod_id,
						his_id: his_id,
						codigo: codigo,
					},
					beforeSend: function() {
						//$('#ButtonVU_Retractar').prop('disabled', true);
					},
					success: function(data) {
						Swal.fire({
							type: 'success',
							title: data,
							showConfirmButton: false,
							timer: 2500
						});
						//console.log(data);
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
					//	$('#ButtonVerArchivo').prop('disabled', false);
					Actualizar2_3TablasBandeja();

					}
				});
			}
		});


	}
</script>