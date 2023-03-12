<script>
/*=============================================
	  FUNCTION CONFIRMAR HOJA DE RUTA
	=============================================*/
	function confirma(cod_id, pend_id, codigo) {
		$.ajax({
			url: "<?php echo site_url('SecretaryGestionControl/ConfirmarHojaRuta') ?>/" + cod_id + "/" + pend_id + "/" + codigo,
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {
				$('#ButtonConfirm_VU_SMGI').prop('disabled', true);
			},
			success: function(obj) {
				Swal.fire({
					type: 'success',
					title: obj,
					showConfirmButton: false,
					timer: 2500
				});
				CountBandejaVentanillaUnica();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {
				$('#ButtonConfirm_VU_SMGI').prop('disabled', false);
				Actualizar2Tablas();
			},
			dataType: 'html'
		});
	}



    </script>