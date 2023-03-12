<script>
/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function CountBandeja() {
		$.ajax({
			url: "<?php echo site_url('TechnicalControl/CountBandejaInit') ?>/",
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				var obj = JSON.parse(obj);
				var num = obj.contador;
				if (num > 0) {
					$('#spancontador').html(obj.contador);
				} else {
					$('#spancontador').empty();
				}
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error con el Contador de Bandeja',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {

			},
			dataType: 'html'
		});
	}
	/////////////////////////////////////////////////////////
    </script>