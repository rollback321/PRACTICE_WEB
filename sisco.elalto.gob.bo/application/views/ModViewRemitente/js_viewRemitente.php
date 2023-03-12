<script>
/*=============================================
	  FUNCTION VER EL USUARIO
	=============================================*/
	$('#load_viewEyeRouteUser').hide();

	function viewUser(id_a, cor_id, codigo,title) {
		$('.modal-body').hide();
		$('#viewEyeRouteTitleUser').text(codigo);
		$('#TitleModalRemitente').text(title);
		$.ajax({
			type: 'POST',
			url: "<?= site_url("TechnicalControl/rowsOfHistoryDependence") ?>",
			data: {
				id_a: id_a
			},
			beforeSend: function() {
				$('#load_viewEyeRouteUser').show();
			},
			success: function(data) {
				$.ajax({
					type: 'POST',
					url: "<?= site_url("TechnicalControl/rowsOfCorrespondenceUsers") ?>",
					data: {
						id_action: id_a
					},
					success: function(data) {
						var obj = JSON.parse(data);
						$('#name').text(obj.usu_nombres.toUpperCase() + ' ' + obj.usu_apellidos.toUpperCase());
						$('#cargo').text(obj.usu_rol_cargo.toUpperCase());
						$('#phone').text(obj.usu_celular.toUpperCase());
					},
					dataType: 'html'
				});
				$('#dependence').html(data);
				$('.modal-body').show()
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#load_viewEyeRouteUser').hide();
			},
			complete: function() {
				$('#load_viewEyeRouteUser').hide();
			},
			dataType: 'html'
		});
	}
	</script>