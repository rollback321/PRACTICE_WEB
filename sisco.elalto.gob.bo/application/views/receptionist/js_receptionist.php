
<script>
	$(document).ready(function() {
		var stepper = new Stepper($('.bs-stepper')[0]);
		CargarTema();
		CountBandeja();
		TableInicio();
		bsCustomFileInput.init();
	});
	$('#load_register_niveles').hide();
	
	////////////////////////////////////
	function limpiarTable() {
		$(`#TableDocDerivar thead`).empty();
		$(`#TableDocDerivar tbody`).empty();
	}
	//////////////////////////////
	function Actualizar() {
		Actualizar1Tablas();
	}
</script>
</body>

</html>