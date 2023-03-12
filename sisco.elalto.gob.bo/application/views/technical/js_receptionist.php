
<script>
	DiviCheck = document.getElementById('DivCheck');
	$(function() {
		CountBandeja();
		CargarTema();
		TableInicio();
		bsCustomFileInput.init();
	});


	function limpiarTable() {
		$(`#TableDoc thead`).empty();
		$(`#TableDoc tbody`).empty();
		$(`#TableDocDerivar thead`).empty();
		$(`#TableDocDerivar tbody`).empty();
	}
	//////////////////////////////////

</script>
</body>

</html>