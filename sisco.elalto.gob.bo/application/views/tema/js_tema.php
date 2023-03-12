<script>
	function CargarTema() {
		var body = document.body;
		var Dato = 0;
		var Rol_id = 0;
		Dato = <?php echo json_encode(intval($this->session->userdata('usu_color_tema'))) ?>;
		Rol_id = <?php echo json_encode(intval($this->session->userdata('usu_rol_id'))) ?>;
		if (Dato == 1) {
			body.classList.add("dark-mode");
			document.getElementById(Rol_id).checked = true;
			document.querySelector('#LabelTema').innerText = 'Habilitado';
		} else {
			body.classList.remove("dark-mode");
			document.getElementById(Rol_id).checked = false;
			document.querySelector('#LabelTema').innerText = 'DesHabilitado';
		}
	}

	function CambiarTema(id_rol) {
		var idUser = id_rol;
		var estado = 0;
		var yes = document.getElementById(idUser);
		var Rol_id = 0;
		Dato = <?php echo json_encode(intval($this->session->userdata('usu_color_tema'))) ?>;
		
		if (yes.checked == true) {
			estado = 1;
		} else {
			estado = 0;
		}
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/UpdateStateTema") ?>",
			data: {
				idd: idUser,
				statee: estado
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function() {
					alertify.error('Cancel');
				});
			},
			complete: function() {
		
				setTimeout(function() {window.location = "<?= site_url($url); ?>";}, 1000);
				CargarTema();
			},
			
			dataType: 'html'
		});

	}

	</script>