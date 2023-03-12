<script>
function Comunicados() {
		$.ajax({
			url: "<?php echo site_url('TechnicalControl/ComunicadosInit') ?>/",
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				var obj = JSON.parse(obj);
				$('#modalComunicados').modal('show');
				// fecha=Date(obj[0].com_fecha).format('DD/MM/YYYY');
				$('#comref').html(obj[0].com_referencia);
				$('#comdirigido').html('A: ' + obj[0].com_dirigido);
				$('#comde').html('DE: ' + obj[0].com_de);
				$('#comfecha').html('El Alto, ' + obj[0].com_fecha);
				$('#comdes').html(obj[0].com_descripcion);
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error con el Contador de Bandeja', function() {
					alertify.error('Cancel');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}
</script>