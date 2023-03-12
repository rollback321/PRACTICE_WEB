<script>

$("#load_ViewHistorial").hide();
function ViewHistorial(cod,his, origen, nro_copia,codigo) {
		$(".Codigo").text(codigo);
		$("#TableHistorial").dataTable().fnDestroy();
			 DataTableBandejaDetalles = $('#TableHistorial').DataTable({
		 	"ajax": "<?= site_url("SecretaryControl/SearchCorrespondenciaViewHistorial") ?>/" + cod + "/" + origen + "/" + nro_copia,
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
		 $('#Modal_ViewHistorial').modal('show');
		 
		 $("#DivButtonReportHistory").empty();
		 var ButtonReportDatatableHistory= '<center> <button type="button" class="btn btn-sm btn-info" id="ButtonPrintReportHistorial" name="ButtonPrintReportHistorial" onclick="generarPDF_hojaderuta('+cod+','+his+')" ><i class="fa fa-print"></i> Imprimir Historial</button> <button type="button" class="btn btn-sm btn-success" id="ButtonPrintReportCabeceraHojaRuta" name="ButtonPrintReportCabeceraHojaRuta" onclick="generarPDF_sobrescribirhojaderutaCabecera('+cod+')" ><i class="fa fa-print"></i> Imprimir Cabecera Hoja de Ruta</button> </center>';
		 $("#DivButtonReportHistory").append(ButtonReportDatatableHistory);
		 // let btn = document.getElementById("ButtonPrintReportHistorial")
		 //btn.onclick=generarPDF_sobrescribirhojaderutaHistorial(cod,his);
	}

	</script>