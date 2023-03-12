<script>
	////////////////////////////////////////////////////////////////////////////////
	$('#TabInbox').one('click', TableInbox);
	$('#TabReception').one('click', TableReception);
	/*=============================================
      Section DATATABLE FORMULARIO HOJA DE RUTA
	=============================================*/
	function TableInbox() {
		$("#tableInbox").dataTable().fnDestroy();
		listInbox = $('#tableInbox').DataTable({
			"processing": true,
			"serverSide": false,
			"ajax": "<?= site_url('SecretaryGestionControl/fetchInboxVentanillaUnica'); ?>",
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

	function TableReception() {
		$("#tableReception").dataTable().fnDestroy();
		listReception = $('#tableReception').DataTable({
			"processing": true,
			"serverSide": false,
			"ajax": "<?= site_url('SecretaryGestionControl/fetchReceptionVentanillaUnica'); ?>",
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
		TableInbox();
	}
	function Actualizar2Tablas() {
		TableInbox();
		TableReception();
	}
	//////////////////////////////////////
</script>