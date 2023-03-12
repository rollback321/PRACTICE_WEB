<script>
	
	function regresarTotales() {
		Totales.style.display = 'block';
		Totales.style.display = 'flex';
		Totales2.style.display = 'block';
		Bandeja.style.display = 'none';
		Aceptadas.style.display = 'none';
		Derivadas.style.display = 'none';
		Rechazadas.style.display = 'none';
		AceptadasForConcluir.style.display = 'none';
		ButtonRegresarTotales.style.display = 'none';
		var tituloadmin = '<img src="<?= base_url() ?>assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:22px; "> CONTROL DE HOJAS DE RUTA DE <br> <?= $this->session->userdata('nameUnique'); ?>';
		$(".TituloAdmin").html(tituloadmin);
	}

	function regresarBandejaUsers() {
		Bandeja.style.display = 'block';
		BandejaDetalles.style.display = 'none';
		$("#example5").dataTable().fnDestroy();
	}

	function regresarAceptadaUsers() {
		Aceptadas.style.display = 'block';
		AceptadasDetalles.style.display = 'none';
		$("#example6").dataTable().fnDestroy();
	}

	function regresarDerivadaUsers() {
		Derivadas.style.display = 'block';
		DerivadasDetalles.style.display = 'none';
		$("#example7").dataTable().fnDestroy();
	}

	function regresarRechazadaUsers() {
		Rechazadas.style.display = 'block';
		RechazadasDetalles.style.display = 'none';
		$("#example8").dataTable().fnDestroy();
	}

	function regresarAceptadaConcluirUsers() {
		AceptadasForConcluir.style.display = 'block';
		AceptadasForConcluirDetalles.style.display = 'none';
		$("#example10").dataTable().fnDestroy();
	}

	function regresar() {
		divDireccion.style.display = 'block';
		divUnidad.style.display = 'none';
		limpiarControles();
	}
</script>