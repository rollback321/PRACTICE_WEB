<script>


	////////////////////////////////////////////////////////////////////////////////
	$('#TabHojaInicio').one('click', TableInicio);
	$('#TabHojaProceso').one('click', TableProceso);
	$('#TabHojaSalida').one('click', TableConcluido);
	/*=============================================
      Section DATATABLE FORMULARIO HOJA DE RUTA
	=============================================*/
	function TableInicio() {
		$("#example1").dataTable().fnDestroy();
		HojaRutaActiva = $('#example1').DataTable({
			"processing": true,
			"serverSide": false,
			"ajax": "<?= site_url('SecretaryControl/fetch_Corresp'); ?>",
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
				[0, "asc"]
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

	function TableProceso() {
		$("#example2").dataTable().fnDestroy();
		HojaRutaActivaProccess = $('#example2').DataTable({
			"processing": true,
			"serverSide": false,
			"ajax": "<?= site_url('SecretaryControl/fetch_CorrespProcess'); ?>",
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
				[0, "asc"]
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

	function TableConcluido() {
		$("#example3").dataTable().fnDestroy();
		HojaRutaActivaConcluded = $('#example3').DataTable({
			"processing": true,
			"serverSide": false,
			"ajax": "<?= site_url('SecretaryControl/fetch_CorrespConcluded'); ?>",
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
				[0, "asc"]
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
	/////////////////////////////////////
		function Actualizar1Tablas() {
		TableInicio();
	}
	function Actualizar2Tablas() {
		TableInicio();
		TableProceso();
	}
	function Actualizar3Tablas() {
		TableInicio();
		TableProceso();
		TableConcluido();
	}
	//////////////////////////////////////
	</script>