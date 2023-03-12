<script>
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
	//////////////////////////////////////
</script>