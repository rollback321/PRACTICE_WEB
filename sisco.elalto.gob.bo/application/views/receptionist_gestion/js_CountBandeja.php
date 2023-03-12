<script>
		/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function CountBandejaVentanillaUnica() {
		$.ajax({
			url: "<?php echo site_url('SecretaryGestionControl/CountBandejaInitVentanilla') ?>/",
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
				alertify.alert('SISCO', 'Error con el Contador de Bandeja 1', function() {
					alertify.error('Cancel');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}
	/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function CountBandejaVentanillaInterna() {
		$.ajax({
			url: "<?php echo site_url('SecretaryGestionControl/CountBandejaInit') ?>/",
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				var obj = JSON.parse(obj);
				var num = obj.contador;
				if (num > 0) {
					$('#spancontador2').html(obj.contador);
				} else {
					$('#spancontador2').empty();
				}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error con el Contador de Bandeja 2', function() {
					alertify.error('Cancel');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}

	/////////////////////////////////////////////////////////
	/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function CountBandejaGeneral() {
		$.ajax({
			url: "<?php echo site_url('TechnicalControl/CountBandejaInit') ?>/",
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				var obj = JSON.parse(obj);
				var num = obj.contador;
				if (num > 0) {
					$('#spancontador3').html(obj.contador);
				} else {
					$('#spancontador3').empty();
				}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error con el Contador de Bandeja 2', function() {
					alertify.error('Cancel');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}

	/////////////////////////////////////////////////////////
    </script>