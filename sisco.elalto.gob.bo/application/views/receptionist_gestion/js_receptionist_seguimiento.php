<script>
	Totales = document.getElementById('DivTotalUnidad');
	Totales2 = document.getElementById('DivTotalUnidadFila2');
	Bandeja = document.getElementById('DivBandeja');
	Aceptadas = document.getElementById('DivAceptadas');
	Derivadas = document.getElementById('DivDerivadas');
	Rechazadas = document.getElementById('DivRechazadas');
	AceptadasForConcluir = document.getElementById('DivAceptadasForConcluir');

	BandejaDetalles = document.getElementById('DivBandejaDetalles');
	AceptadasDetalles = document.getElementById('DivAceptadasDetalles');
	DerivadasDetalles = document.getElementById('DivDerivadasDetalles');
	RechazadasDetalles = document.getElementById('DivRechazadasDetalles');
	AceptadasForConcluirDetalles = document.getElementById('DivAceptadasForConcluirDetalles');

	divUnidad = document.getElementById('DivUnidad');
	ButtonRegresar = document.getElementById('btnRegresarPe');
	ButtonRegresarTotales = document.getElementById('btnRegresarTotales');

	divUnidad.style.display = 'none';
	//divUnidadFila2.style.display = 'none';
	ButtonRegresar.style.display = 'none';

	Bandeja.style.display = 'none';
	Aceptadas.style.display = 'none';
	Derivadas.style.display = 'none';
	Rechazadas.style.display = 'none';
	AceptadasForConcluir.style.display = 'none';

	BandejaDetalles.style.display = 'none';
	AceptadasDetalles.style.display = 'none';
	DerivadasDetalles.style.display = 'none';
	RechazadasDetalles.style.display = 'none';
	AceptadasForConcluirDetalles.style.display = 'none';

	ButtonRegresarTotales.style.display = 'none';
	var tituloadmin = '<img src="<?= base_url() ?>assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:22px; "> CONTROL DE HOJAS DE RUTA DE <br> <?= $this->session->userdata('nameUnique'); ?>';
	$(document).ready(function() {
		cargarDatos();
		AdministrarDependencias();
		CargarTema();
		CountBandejaVentanillaInterna();
		CountBandejaVentanillaUnica();
		CountBandejaGeneral();
		$('#load_concluir_hoja').hide();
		$(".TituloAdmin").html(tituloadmin);
	});
	/*=============================================
	      Section DATATABLE FORMULARIO HOJA DE RUTA
		=============================================*/
	DataTableBANDEJA = $('#example1').DataTable({
		"ajax": "<?= site_url('JefeControl/fetch_UserBandeja'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "asc"]
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});

	DataTableACEPTADAS = $('#example2').DataTable({
		"ajax": "<?= site_url('JefeControl/fetch_UserAceptadas'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "asc"]
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});

	DataTableDERIVADAS = $('#example3').DataTable({
		"ajax": "<?= site_url('JefeControl/fetch_UserDerivadas'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "asc"]
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});

	DataTableRECHAZDAS = $('#example4').DataTable({
		"ajax": "<?= site_url('JefeControl/fetch_UserRechazadas'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "asc"]
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});

	DataTableACEPTADASForCONCLUIR = $('#example9').DataTable({
		"ajax": "<?= site_url('JefeControl/fetch_UserAceptadasForConcluir'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "asc"]
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});

	/*=============================================
	      Section DATATABLE FORMULARIO HOJA DE RUTA
		=============================================*/

	function BandejaDetallesUser(cor_user, nombre) {
		$(".nombreCompleto").text(nombre);
		Bandeja.style.display = 'none';
		BandejaDetalles.style.display = 'block';
		$("#example5").dataTable().fnDestroy();
		console.log(cor_user);
		console.log(nombre);

		DataTableBandejaDetalles = $('#example5').DataTable({
			"ajax": "<?= site_url('JefeControl/fetch_UserDetallesBandeja'); ?>/" + cor_user,
			"ordering": true,
			"order": [
				[0, "asc"]
			],
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			"order": [
				[1, "asc"]
			],
			language: {
				"decimal": "",
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Sin resultados encontrados",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	}


	function AceptadasDetallesUser(cor_user, nombre) {
		Aceptadas.style.display = 'none';
		AceptadasDetalles.style.display = 'block';
		$("#example6").dataTable().fnDestroy();
		$(".nombreCompleto").text(nombre);
		console.log(cor_user, nombre);

		DataTableAceptadasDetalles = $('#example6').DataTable({
			"ajax": "<?= site_url('JefeControl/fetch_UserDetallesAceptada'); ?>/" + cor_user,
			"ordering": true,
			"order": [
				[0, "asc"]
			],
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			"order": [
				[1, "asc"]
			],
			language: {
				"decimal": "",
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Sin resultados encontrados",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	}

	function DerivadasDetallesUser(cor_user, nombre) {
		Derivadas.style.display = 'none';
		DerivadasDetalles.style.display = 'block';
		$("#example7").dataTable().fnDestroy();
		$(".nombreCompleto").text(nombre);
		console.log(cor_user, nombre);

		DataTableDerivadasDetalles = $('#example7').DataTable({
			"ajax": "<?= site_url('JefeControl/fetch_UserDetallesDerivada'); ?>/" + cor_user,
			"ordering": true,
			"order": [
				[0, "desc"]
			],
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			"order": [
				[1, "desc"]
			],
			language: {
				"decimal": "",
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Sin resultados encontrados",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	}

	function RechazadasDetallesUser(cor_user, nombre) {
		Rechazadas.style.display = 'none';
		RechazadasDetalles.style.display = 'block';
		$("#example8").dataTable().fnDestroy();
		$(".nombreCompleto").text(nombre);
		console.log(cor_user, nombre);

		DataTableRechazadasDetalles = $('#example8').DataTable({
			"ajax": "<?= site_url('JefeControl/fetch_UserDetallesRechazada'); ?>/" + cor_user,
			"ordering": true,
			"order": [
				[0, "desc"]
			],
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			"order": [
				[1, "desc"]
			],
			language: {
				"decimal": "",
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Sin resultados encontrados",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	}

	function AceptadasConcluirDetallesUser(cor_user, nombre) {
		AceptadasForConcluir.style.display = 'none';
		AceptadasForConcluirDetalles.style.display = 'block';
		$("#example10").dataTable().fnDestroy();
		$(".nombreCompleto").text(nombre);
		console.log(cor_user, nombre);

		DataTableAceptadasConcluirDetalles = $('#example10').DataTable({
			"ajax": "<?= site_url('JefeControl/fetch_UserDetallesAceptadasConcluir'); ?>/" + cor_user,
			"ordering": true,
			"order": [
				[0, "desc"]
			],
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			"order": [
				[1, "desc"]
			],
			language: {
				"decimal": "",
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Sin resultados encontrados",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			}
		});
	}
	//////////////////////////////////////

	/*=============================================
     CONCLUIR HOJAS DE RUTA
	=============================================*/
	$("#form_concluir_hoja").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("JefeControl/ConcluirHojaRuta") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_concluir_hoja').show();
				$('#form_concluir_hoja').hide();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				setTimeout(function() {
					window.location = "<?= site_url('SecretaryGestionControl/AdministrarHojas'); ?>";
				}, 1000);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor',
					showConfirmButton: false,
					timer: 2500
				});
				$('#form_concluir_hoja')[0].reset();
				$('#load_concluir_hoja').hide();
				$('#form_concluir_hoja').show();

			},
			complete: function() {
				$('#form_concluir_hoja')[0].reset();
				$('#form_concluir_hoja').show();
				$('#load_concluir_hoja').hide();
				$('#modal_ConcluirHoja').modal('hide');
			},
			dataType: 'html'
		});
	});


	/*=============================================
      Section DATATABLE FORMULARIO HOJA DE RUTA
	=============================================*/
	function cargarDatos() {
		$.ajax({
			url: "<?= site_url('JefeControl/CantTotalHojasRutaDep') ?>",
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(data) {
				$('.numBand').text(data.bandeja);
				$('.numDeri').text(data.derivada);
				$('.numRech').text(data.rechazada);
				$('.numAcep').text(data.aceptada);
				$('.numAcepForConcluir').text(data.aceptadaForConcluir);
				console.log(data);
			},
			error: function(jqXHR, textStatus, errorThrown) {},
			complete: function() {

			}
		});

	}
	//////////////////////////////////////


	function limpiarTable() {
		$(`#TableDoc thead`).empty();
		$(`#TableDoc tbody`).empty();
	}
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
	}


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

	////////////////////////////////////////////
	function ConcluirHojaRuta(cor_id, his_id, corEstado, origen, nro_copia, codigo) {
		$('#modal_ConcluirHoja').modal('show');
		$('.cod_GAMEAConcluir').text(codigo);
		$('#cor_id').val(cor_id);
		$("#his_id").val(his_id);
		$("#origen").val(origen);
		$("#nro_copia").val(nro_copia);
		$("#codigo").val(codigo);
		$("#cor_estado").val(corEstado);
	}


	/*=============================================
	      Section DERIVAR HOJA DE RUTA EXTERNA
		=============================================*/
	$('#div_select_nivel_1').hide();
	$('#div_select_nivel_2').hide();
	$('#div_select_nivel_3').hide();

	function AdministrarDependencias() {

		var nivel1 = '<?= $this->session->userdata('rol_niv_1') ?>';
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';
		var nivel3 = '<?= $this->session->userdata('rol__niv_3') ?>';
		divUnidad.style.display = 'block';
		cargarDatos();

		// if (nivel1.length != 0 && nivel2.length != 0 && nivel3.length != 0) {
		// 	cargarDatos();
		// 	divUnidad.style.display = 'block';

		// }

		// if (nivel1.length != 0 && nivel2.length != 0 && nivel3.length == 0) {
		// 	cargarDatos();
		// 	divDireccion.style.display = 'block';
		// 	$('#div_select_nivel_2').show();
		// 	$('#div_select_nivel_3').show();
		// 	$.ajax({
		// 		url: "<?php // echo site_url('secretaryControl/dependencyListLevel_3_ID') 
							?>/",
		// 		type: "GET",
		// 		dataType: "JSON",
		// 		success: function(data) {
		// 			var obj = JSON.parse(data);
		// 			var nuevoArray_n2 = obj.data_n2;
		// 			var nuevoArray_n3 = obj.data_n3;
		// 			var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
		// 			for (var i = 0; i < nuevoArray_n2.length; i++) {
		// 				content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
		// 				content_n2 += nuevoArray_n2[i].niv2_nombre;
		// 				content_n2 += '</option>';
		// 			}
		// 			$('#select_nivel_2').html(content_n2);
		// 			var content_n3 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
		// 			for (var i = 0; i < nuevoArray_n3.length; i++) {
		// 				content_n3 += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
		// 				content_n3 += nuevoArray_n3[i].niv3_nombre;
		// 				content_n3 += '</option>';
		// 			}
		// 			$('#select_nivel_3').html(content_n3);
		// 		},
		// 		error: function(xhr) {
		// 			alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
		// 				alertify.error('Cancel');
		// 			});
		// 		},
		// 		dataType: 'html'
		// 	});
		// }


		// if (nivel1.length != 0 && nivel2.length == 0 && nivel3.length == 0) {
		// 	cargarDatos();
		// 	divDireccion.style.display = 'block';
		// 	$('#div_select_nivel_1').show();
		// 	$('#div_select_nivel_2').show();
		// 	$.ajax({
		// 		url: "<?php // echo site_url('secretaryControl/dependencyListLevel_2_ID') 
							?>/",
		// 		type: "GET",
		// 		dataType: "JSON",
		// 		success: function(data) {
		// 			var obj = JSON.parse(data);
		// 			var nuevoArray_n1 = obj.data_n1;
		// 			var nuevoArray_n2 = obj.data_n2;
		// 			var content_n1 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
		// 			for (var i = 0; i < nuevoArray_n1.length; i++) {
		// 				content_n1 += '<option value="' + nuevoArray_n1[i].niv1_id + '">';
		// 				content_n1 += nuevoArray_n1[i].niv1_nombre;
		// 				content_n1 += '</option>';
		// 			}
		// 			$('#select_nivel_1').html(content_n1);

		// 			var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
		// 			for (var i = 0; i < nuevoArray_n2.length; i++) {
		// 				content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
		// 				content_n2 += nuevoArray_n2[i].niv2_nombre;
		// 				content_n2 += '</option>';
		// 			}
		// 			$('#select_nivel_2').html(content_n2);
		// 		},
		// 		error: function(xhr) {
		// 			alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
		// 				alertify.error('Cancel');
		// 			});
		// 		},

		// 		dataType: 'html'
		// 	});
		// }









		// cargarDatos();
		// divUnidad.style.display = 'block';
		// divDireccion.style.display = 'block';
		// if (nivel1.length != 0 && nivel2.length != 0 && nivel3.length == 0) {
		// 	$('#div_select_nivel_1').show();
		// 	$('#div_select_nivel_2').show();
		// 	$.ajax({
		// 		url: "<?php //echo site_url('secretaryControl/dependencyListLevel_2_ID') 
							?>/",
		// 		type: "GET",
		// 		dataType: "JSON",
		// 		success: function(data) {
		// 			var obj = JSON.parse(data);
		// 			var nuevoArray_n1 = obj.data_n1;
		// 			var nuevoArray_n2 = obj.data_n2;
		// 			var content_n1 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
		// 			for (var i = 0; i < nuevoArray_n1.length; i++) {
		// 				content_n1 += '<option value="' + nuevoArray_n1[i].niv1_id + '">';
		// 				content_n1 += nuevoArray_n1[i].niv1_nombre;
		// 				content_n1 += '</option>';
		// 			}
		// 			$('#select_nivel_1').html(content_n1);
		// 			var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
		// 			for (var i = 0; i < nuevoArray_n2.length; i++) {
		// 				content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
		// 				content_n2 += nuevoArray_n2[i].niv2_nombre;
		// 				content_n2 += '</option>';
		// 			}
		// 			$('#select_nivel_2').html(content_n2);
		// 		},
		// 		error: function(xhr) {
		// 			alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
		// 				alertify.error('Cancel');
		// 			});
		// 		},
		// 		dataType: 'html'
		// 	});

		// } else {
		// 	$('#div_select_nivel_2').show();
		// 	$('#div_select_nivel_3').show();
		// 	$.ajax({
		// 		url: "<?php //echo site_url('secretaryControl/dependencyListLevel_3_ID') 
							?>/",
		// 		type: "GET",
		// 		dataType: "JSON",
		// 		success: function(data) {
		// 			var obj = JSON.parse(data);
		// 			var nuevoArray_n2 = obj.data_n2;
		// 			var nuevoArray_n3 = obj.data_n3;
		// 			var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
		// 			for (var i = 0; i < nuevoArray_n2.length; i++) {
		// 				content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
		// 				content_n2 += nuevoArray_n2[i].niv2_nombre;
		// 				content_n2 += '</option>';
		// 			}
		// 			$('#select_nivel_2').html(content_n2);
		// 			var content_n3 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
		// 			for (var i = 0; i < nuevoArray_n3.length; i++) {
		// 				content_n3 += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
		// 				content_n3 += nuevoArray_n3[i].niv3_nombre;
		// 				content_n3 += '</option>';
		// 			}
		// 			$('#select_nivel_3').html(content_n3);
		// 		},
		// 		error: function(xhr) {
		// 			alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
		// 				alertify.error('Cancel');
		// 			});
		// 		},
		// 		dataType: 'html'
		// 	});

		// }

	}



	$('#select_nivel_1').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv1_id = optionSelected.val();
		var niv1_nombre = optionSelected.text();
		var nivel1 = '<?= $this->session->userdata('rol_niv_1') ?>';
		if (optionSelected.val() == 0) {
			limpiarControles();
		} else {
			if (niv1_id == nivel1) {
				divDireccion.style.display = 'none';
				divUnidad.style.display = 'block';
			}
		}
	});


	$('#select_nivel_2').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv2_id = optionSelected.val();
		var niv2_nombre = optionSelected.text();
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';
		if (optionSelected.val() == 0) {
			limpiarControles();
		} else {
			if (niv2_id == nivel2) {
				divDireccion.style.display = 'none';
				divUnidad.style.display = 'block';
				$('#div_select_nivel_3').show();

				$.ajax({
					url: "<?php echo site_url('secretaryControl/dependencyListLevel_3_ID') ?>/",
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						var nuevoArray_n3 = obj.data_n3;
						var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n3.length; i++) {
							content += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
							content += nuevoArray_n3[i].niv3_nombre;
							content += '</option>';
						}
						$('#select_nivel_3').html(content);
					},
					error: function(xhr) {
						Swal.fire({
							type: 'error',
							title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
							showConfirmButton: false,
							timer: 2500
						});
					},

					dataType: 'html'
				});
			} else {
				$('#div_select_nivel_3').hide();

			}
		}

	});









	// $('#select_nivel_1').change(function() {
	// 	var optionSelected = $(this).find("option:selected");
	// 	var niv1_id = optionSelected.val();
	// 	var niv1_nombre = optionSelected.text();

	// 	var nivel1 = '<?php //$this->session->userdata('rol_niv_1') 
							?>';

	// 	if (niv1_id == nivel1) {

	// 		$('#div_select_nivel_2').show();
	// 		$.ajax({
	// 			url: "<?php //echo site_url('SecretaryControl/dependencyListLevel_2_ID') 
							?>/",
	// 			type: "GET",
	// 			dataType: "JSON",
	// 			success: function(data) {
	// 				var obj = JSON.parse(data);
	// 				var nuevoArray_n2 = obj.data_n2;
	// 				var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
	// 				for (var i = 0; i < nuevoArray_n2.length; i++) {
	// 					content += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
	// 					content += nuevoArray_n2[i].niv2_nombre;
	// 					content += '</option>';
	// 				}
	// 				$('#select_nivel_2').html(content);
	// 			},
	// 			error: function(xhr) {
	// 				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
	// 					alertify.error('Cancel');
	// 				});
	// 			},

	// 			dataType: 'html'
	// 		});
	// 		$('#div_select_nivel_3').hide();
	// 	} else {
	// 		$('#div_select_nivel_2').hide();
	// 	}


	// });
	// $('#select_nivel_2').change(function() {
	// 	var optionSelected = $(this).find("option:selected");
	// 	var niv2_id = optionSelected.val();
	// 	var niv2_nombre = optionSelected.text();
	// 	var nivel2 = '<?php //$this->session->userdata('rol__niv_2') 
							?>';

	// 	if (optionSelected.val() == 0) {
	// 		limpiarControles();
	// 	} else {
	// 		if (niv2_id == nivel2) {

	// 			$('#div_select_nivel_3').show();

	// 			$.ajax({
	// 				url: "<?php //echo site_url('secretaryControl/dependencyListLevel_3_ID') 
								?>/",
	// 				type: "GET",
	// 				dataType: "JSON",
	// 				success: function(data) {
	// 					var obj = JSON.parse(data);
	// 					var nuevoArray_n3 = obj.data_n3;
	// 					var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
	// 					for (var i = 0; i < nuevoArray_n3.length; i++) {
	// 						content += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
	// 						content += nuevoArray_n3[i].niv3_nombre;
	// 						content += '</option>';
	// 					}
	// 					$('#select_nivel_3').html(content);
	// 				},
	// 				error: function(xhr) {
	// 					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
	// 						alertify.error('Cancel');
	// 					});
	// 				},

	// 				dataType: 'html'
	// 			});



	// 		} else {
	// 			$('#div_select_nivel_3').hide();

	// 		}
	// 	}
	// });
	// $('#select_nivel_3').change(function() {
	// 	var optionSelected = $(this).find("option:selected");
	// 	var niv3_id = optionSelected.val();
	// 	var niv3_nombre = optionSelected.text();

	// 	if (optionSelected.val() == 0) {
	// 		limpiarControles();
	// 	} else {

	// 	}
	// });

	/*=============================================
  		FUNCTION VER HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	$('#load_viewEyeRoute').hide();

	function ViewDetallesDatos(cor_id) {
		$('.modal-body').hide();
		$('#Modal_viewDatosDetallesBandeja').modal('show');
		VerArchivosDerivar(cor_id);
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/Correspondencia") ?>",
			data: {
				cor_id: cor_id
			},
			beforeSend: function() {
				$('#load_viewEyeRoute').show();
			},
			success: function(data) {
				//var obj = JSON.parse(data);
				var obj = jQuery.parseJSON(data);
				console.log(obj[0]);
				$('#cite').val(obj[0].cor_cite);
				$('#reference').val(obj[0].cor_referencia);
				$('#description').val(obj[0].cor_descripcion);
				$('#observation').val(obj[0].cor_observacion);
				var codspan = "GAMEA-" + obj[0].cor_codigo + '-' + obj[0].ges_gestion;
				$(".cod_GAMEA").text(codspan);
				$('.modal-body').show();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#load_viewEyeRoute').hide();
			},
			complete: function() {
				$('#load_viewEyeRoute').hide();
			},
			dataType: 'html'
		});
	}


	function VerArchivosDerivar(cor_id) {
		$.ajax({
			url: "<?= site_url('SecretaryControl/ListDocument') ?>/" + cor_id,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {
				$(`#TableDocDerivar thead`).empty();
				$(`#TableDocDerivar tbody`).empty();
			},
			success: function(data) {
				var newData = JSON.parse(JSON.stringify(data))
				var count = Object.keys(data).length;
				if (count > 0) {
					var tr_head = "<tr>" +
						"<th style='font-size: 10px; text-align: center;'>NRO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DOCUMENTO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DEPENDENCIA</th>" +
						"<th style='font-size: 10px; text-align: center;'>FECHA</th>" +
						"</tr>";
					$("#TableDocDerivar thead").append(tr_head);
					for (var i = 0; i < count; i++) {
						var idDoc = newData[i].id_doc;
						var id = newData[i].cor_id;
						var original = newData[i].name_document_original;
						var enc = newData[i].name_document_encript;
						var fecha = newData[i].fecha;
						var dependencia = newData[i].cor_institucion;
						newcount = i + 1;
						var tr_str = "<tr>" +
							"<td style=' text-align: center;'>" + newcount + "</td>" +
							"<td ><a href='<?= base_url() ?>assets/upload/documents/" + enc + "' style='color: #fff;background-color: #007bff;border-color: #007bff;padding: .25rem .5rem;font-size: .575rem;line-height: 1.5;border-radius: .2rem;' target='_blank'><i class='fa fa-eye'></i> " + original + "</a></td>" +
							"<td >" + dependencia + "</td>" +
							"<td >" + fecha + "</td>" +
							"</tr>";
						$("#TableDocDerivar tbody").append(tr_str);
					}
				} else {
					var tr_str = "<tr>" +
						"<td style=' text-align: center;'>NO TIENE ARCHIVOS</td>" +
						"</tr>";
					$("#TableDocDerivar tbody").append(tr_str);
				}
			}
		});
	}
</script>
</body>

</html>