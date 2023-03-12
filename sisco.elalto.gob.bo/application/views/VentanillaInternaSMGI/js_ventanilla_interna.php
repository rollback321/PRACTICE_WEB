<script>
	$(document).ready(function() {
		CargarTema();
		CountBandeja();
		CargarCalendarioRegistro();
		TableInicio();
	});


	//////////////////////////////////////////////////////////////

	function CargarCalendarioRegistro() {
		$("#colFormLabelSmRegister").empty();
		<?php
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i", $time);
		?>
		//$("#colFormLabelSmRegister").val(moment().format("YYYY-MM-DDTHH:mm"));
		$("#colFormLabelSmRegister").val(moment(new Date(), 'America/La_Paz').format("YYYY-MM-DDTHH:mm"));
	}


	/*=============================================
      Section DERIVAR HOJA DE RUTA INTERNA
	=============================================*/
	// function DatosResponsableGestion() {
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: "<?php // site_url('TechnicalControl/fetchDataListTechnicalGestionSecretary'); ?>",
	// 		beforeSend: function() {},
	// 		success: function(data) {
	// 			console.log(data);
	// 			var content = '';
	// 			var obj = JSON.parse(data);
	// 			for (var i = 0; i < obj.length; i++) {
	// 				content += '<option selected="selected"value="' + obj[i].usu_rol_id + '">';
	// 				content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
	// 				content += '</option>';
	// 			}
	// 			$('#usuInterno_idGestion').html(content);
	// 		},
	// 		error: function(xhr) {
	// 			alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
	// 				alertify.success('Ok');
	// 			});
	// 		},
	// 		complete: function() {},
	// 		dataType: 'html'
	// 	});
	// }



	

	function limpiarTable() {
		$(`#TableDocDerivar thead`).empty();
		$(`#TableDocDerivar tbody`).empty();
	}
	





	/*=============================================
      Section DERIVAR HOJA DE RUTA INTERNA
	=============================================*/
	// function Datosforderivar(cor_id) {
	// 	$('#cor_id_interno').val(cor_id);
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: "<?php // site_url('TechnicalControl/fetchDataListTechnicalGestionSecretary'); ?>",
	// 		beforeSend: function() {},
	// 		success: function(data) {
	// 			var content = '';
	// 			var obj = JSON.parse(data);
	// 			for (var i = 0; i < obj.length; i++) {
	// 				content += '<option selected="selected"value="' + obj[i].usu_rol_id + '">';
	// 				content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
	// 				content += '</option>';
	// 			}
	// 			$('#usuInterno_id').html(content);
	// 		},
	// 		error: function(xhr) {
	// 			Swal.fire({
	// 				type: 'error',
	// 				title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
	// 				showConfirmButton: false,
	// 				timer: 2500
	// 			});
	// 		},
	// 		complete: function() {},
	// 		dataType: 'html'
	// 	});
	// }

	/////////////////////////////////////////////////////////

</script>
</body>

</html>