<script>
	/*=============================================
	  FUNCTION ACEPTAR HOJA DE RUTA
	=============================================*/
	function accept(his_id, codigo) {
		$.ajax({
			url: "<?php echo site_url('TechnicalControl/acceptHojaRuta') ?>/" + his_id + "/" + codigo,
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {
				$('#ButtonConfirm').prop('disabled', true);
			},
			success: function(obj) {
				Swal.fire({
					type: 'success',
					title: obj,
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
				$('#ButtonConfirm').prop('disabled', false);
			},
			complete: function() {
				Actualizar2TablasBandeja();
				$('#ButtonConfirm').prop('disabled', false);
			},
			dataType: 'html'
		});
	}


    </script>