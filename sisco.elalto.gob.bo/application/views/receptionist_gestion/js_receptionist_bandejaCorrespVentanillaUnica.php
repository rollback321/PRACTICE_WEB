<script>
	$(document).ready(function() {
		CountBandejaVentanillaInterna();
		CountBandejaVentanillaUnica();
		CountBandejaGeneral();
		CargarTema();
		TableInbox();
	});

	/////////////////////////////////////////////////
	function resetDropZone() {
		myDropzone.removeAllFiles(true);
	}
</script>
</body>

</html>