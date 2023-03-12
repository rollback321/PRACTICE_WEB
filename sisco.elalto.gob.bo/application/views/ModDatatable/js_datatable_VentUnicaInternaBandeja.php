<script>
	////////////////////////////////////////////////////////////////////////////////
	$('#TabInbox').one('click', TableInbox);
	$('#TabReception').one('click', TableReception);
	$('#TabRetractar').one('click', TableRetractar);
	$('#TabConcluidos').one('click', TableConcluidos);
	/*=============================================
      Section DATATABLE FORMULARIO HOJA DE RUTA
	=============================================*/
	function TableInbox() {
		$("#tableInbox").dataTable().fnDestroy();
		listInbox = $('#tableInbox').DataTable({
			"processing": true,
			"serverSide": false,
			"ajax": "<?= site_url('VentanillaInternaControlSMGI/fetchInbox'); ?>",
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
			"ajax": "<?= site_url('VentanillaInternaControlSMGI/fetchReception'); ?>",
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

	function TableRetractar() {
		$("#tableRetractar").dataTable().fnDestroy();
		listDerivadas = $('#tableRetractar').DataTable({
			"processing": true,
			"serverSide": false,
			"ajax": "<?= site_url('VentanillaInternaControlSMGI/fetchDerivadasBandeja'); ?>",
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
	function TableConcluidos() {
		$("#tableConcluidos").dataTable().fnDestroy();
		listConcluidos = $('#tableConcluidos').DataTable({
			"processing": true,
			"serverSide": false,
			"ajax": "<?= site_url('VentanillaInternaControlSMGI/fetchConcluidos'); ?>",
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
	function Actualizar1TablasBandeja() {
		TableInbox();
	}
	function Actualizar2TablasBandeja() {
		TableInbox();
		TableReception();
	}
	function Actualizar3TablasBandeja() {
		TableInbox();
		TableReception();
		TableRetractar();
	}
	function Actualizar4TablasBandeja() {
		TableInbox();
		TableReception();
		TableRetractar();
		TableConcluidos();
	}
	function Actualizar2TablaBandeja() {
		TableReception();
	}
	function Actualizar2_3TablasBandeja() {
		TableReception();
		TableRetractar();
	}
	function Actualizar2_4TablasBandeja() {
		TableReception();
		TableConcluidos();
	}
	function Actualizar1_4TablasBandeja() {
		TableInbox();
		TableConcluidos();
	}
	//////////////////////////////////////
</script>