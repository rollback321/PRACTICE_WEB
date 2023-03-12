<script>
	$(function() {
	CountBandeja();
	CargarTema();
	TableInbox();
	});
	

	/*==================================================
			=     Section DERIVACION DIRECXTA    =
			==================================================*/
	
	

	// function DatosResponsableGestion() {
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: "<?php //site_url('TechnicalControl/fetchDataListTechnicalGestion'); ?>",
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
	// 			Swal.fire({
	// 				type: 'error',
	// 				title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
	// 				showConfirmButton: false,
	// 				timer: 2500
	// 			});
	// 		},
	// 		complete: function() {},
	// 		dataType: 'html'
	// 	});
	// }
	



</script>
</body>

</html>