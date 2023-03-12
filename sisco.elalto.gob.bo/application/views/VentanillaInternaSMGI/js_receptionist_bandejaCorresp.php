<script>
	$(function() {
		CountBandeja();
		CargarTema();
		TableInbox();

	});

	/*=============================================
      Section DERIVAR responsable interno
	=============================================*/
	// function derivarHojaRutaInternaResponsable() {
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: "<?php // site_url('TechnicalControl/fetchDataListTechnicalGestionSecretary'); ?>",
	// 		beforeSend: function() {},
	// 		success: function(data) {
	// 			var content = '<option value="0" >Seleccionar Responsable</option>';
	// 			var obj = JSON.parse(data);
	// 			for (var i = 0; i < obj.length; i++) {
	// 				content += '<option value="' + obj[i].usu_rol_id + '"selected="selected">';
	// 				content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
	// 				content += '</option>';
	// 			}
	// 			$('#usuInterno_idResponsable').html(content);
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
	////////////////////////////////////



	



	


</script>
