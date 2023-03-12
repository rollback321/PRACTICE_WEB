<script>
	$(document).ready(function() {
		CountBandeja();
		var stepper = new Stepper($('.bs-stepper')[0]);
		CargarTema();
		TableInbox();
	});

	function CountBandeja() {
		CountBandejaVentanillaInterna();
		CountBandejaVentanillaUnica();
		CountBandejaGeneral();
	}
</script>
</body>

</html>