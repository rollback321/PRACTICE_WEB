<script>
/*=============================================
	  FUNCTION ACEPTAR HOJA DE RUTA
	=============================================*/
	function accept(his_id, codigo) {
		acceptForRecepction_DerivacionPendiente(his_id, codigo);
		$.ajax({
			url: "<?php echo site_url('VentanillaInternaControlSMGI/acceptHojaRuta') ?>/" + his_id + "/" + codigo,
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {
				$('#ButtonAceptVI_SMGI').prop('disabled', true); },
			success: function(obj) {
				Swal.fire({
					type: 'success',
					title: codigo+' '+obj,
					showConfirmButton: false,
					timer: 2500
				});
				CountBandeja();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {
				$('#ButtonAceptVI_SMGI').prop('disabled', false);
				Actualizar3TablasBandeja();
			},
			dataType: 'html'
		});
	}
		/*=============================================
	  FUNCTION ACEPTAR HOJA DE RUTA
	=============================================*/
	function acceptForRecepction_DerivacionPendiente(his_id, codigo) {
		$.ajax({
			url: "<?php echo site_url('VentanillaInternaControlSMGI/acceptForDerivacionPendiente') ?>/" + his_id + "/" + codigo,
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				console.log(obj);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {
			},
			dataType: 'html'
		});
	}
	

    </script>