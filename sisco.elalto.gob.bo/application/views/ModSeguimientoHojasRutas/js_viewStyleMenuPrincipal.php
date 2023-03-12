<script>
	/////////////////////////////////
	function VerBandeja() {
		Bandeja.style.display = 'block';
		ButtonRegresarTotales.style.display = 'block';
		Aceptadas.style.display = 'none';
		Derivadas.style.display = 'none';
		Rechazadas.style.display = 'none';
		AceptadasForConcluir.style.display = 'none';
		Totales.style.display = 'none';
		Totales2.style.display = 'none';
		// var tituloadmin = '<img src="<?= base_url() ?>assets/dist/img/plantilla/referencia.jpeg" class="mb-2 " alt="dependencia" style="width:22px; height: auto;"> HOJAS DE RUTA EN BANDEJA';
		var tituloadmin = 'HOJAS DE RUTA EN BANDEJA  <br> DE 	<?php echo $this->session->userdata('nameUnique'); ?>';
		$(".TituloAdmin").html(tituloadmin);
		DatatableMenuPrincipalBandeja();
	}
	function VerAceptadas() {
		Bandeja.style.display = 'none';
		Aceptadas.style.display = 'block';
		ButtonRegresarTotales.style.display = 'block';
		Derivadas.style.display = 'none';
		Rechazadas.style.display = 'none';
		AceptadasForConcluir.style.display = 'none';
		Totales.style.display = 'none';
		Totales2.style.display = 'none';
		// var tituloadmin = '<img src="<?= base_url() ?>assets/dist/img/plantilla/referencia.jpeg" class="mb-2 " alt="dependencia" style="width:22px; height: auto; "> HOJAS DE RUTA ACEPTADAS';
		var tituloadmin = ' HOJAS DE RUTA ACEPTADAS  <br> DE 	<?php echo $this->session->userdata('nameUnique'); ?>';
		$(".TituloAdmin").html(tituloadmin);
		DatatableMenuPrincipalAceptadas();
	}

	function VerDerivadas() {
		Bandeja.style.display = 'none';
		Aceptadas.style.display = 'none';
		Derivadas.style.display = 'block';
		ButtonRegresarTotales.style.display = 'block';
		Rechazadas.style.display = 'none';
		AceptadasForConcluir.style.display = 'none';
		Totales.style.display = 'none';
		Totales2.style.display = 'none';
		// var tituloadmin = '<img src="<?= base_url() ?>assets/dist/img/plantilla/referencia.jpeg" class="mb-2 " alt="dependencia" style="width:22px; height: auto;"> HOJAS DE RUTA DERIVADAS';
		var tituloadmin = ' HOJAS DE RUTA DERIVADAS  <br> DE 	<?php echo $this->session->userdata('nameUnique'); ?>';
		$(".TituloAdmin").html(tituloadmin);
		DatatableMenuPrincipalDerivadas();
	}

	function VerRechazadas() {
		Bandeja.style.display = 'none';
		Aceptadas.style.display = 'none';
		Derivadas.style.display = 'none';
		Rechazadas.style.display = 'block';
		ButtonRegresarTotales.style.display = 'block';
		AceptadasForConcluir.style.display = 'none';
		Totales.style.display = 'none';
		Totales2.style.display = 'none';
		var tituloadmin = ' HOJAS DE RUTA RECHAZADAS  <br> DE 	<?php echo $this->session->userdata('nameUnique'); ?>';
		// var tituloadmin = '<img src="<?= base_url() ?>assets/dist/img/plantilla/referencia.jpeg" class="mb-2 " alt="dependencia" style="width:22px; height: auto;"> HOJAS DE RUTA RECHAZADAS';
		$(".TituloAdmin").html(tituloadmin);
		DatatableMenuPrincipalRechazadas();
	}

	function VerAceptadasForConcluir() {
		Bandeja.style.display = 'none';
		Aceptadas.style.display = 'none';
		Derivadas.style.display = 'none';
		Rechazadas.style.display = 'none';
		ButtonRegresarTotales.style.display = 'block';
		AceptadasForConcluir.style.display = 'block';
		Totales.style.display = 'none';
		Totales2.style.display = 'none';
		var tituloadmin = ' HOJAS DE RUTA QUE SE PUEDEN CONCLUIR  <br> DE 	<?php echo $this->session->userdata('nameUnique'); ?>';
		// var tituloadmin = '<img src="<?= base_url() ?>assets/dist/img/plantilla/referencia.jpeg" class="mb-2 " alt="dependencia" style="width:22px; height: auto;"> HOJAS DE RUTA RECHAZADAS';
		$(".TituloAdmin").html(tituloadmin);
		DatatableMenuPrincipalParaConcluir();
	}


</script>