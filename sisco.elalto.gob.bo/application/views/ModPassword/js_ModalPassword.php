<script>
/*=============================================
	  VALIDACION NEW PASSWORD 
	=============================================*/
	$(document).ready(function() {
		//variables
		var Newpass1 = $('[name=Newpassword]');
		var Newpass2 = $('[name=Newpassword2]');
		var confirmacion = "Contraseñas correctas";
		//var longitud = "La contraseña debe tener minimo 6 carácteres";
		var negacion = "Contraseñas Diferentes";
		var vacio = "Inserte la contraseña";
		//oculto por defecto el elemento span
		var span = $('<span id="spanPass" style="font-size: 10px;color: darkred;"></span>').insertAfter(Newpass2);
		span.hide();
		//función que comprueba las dos contraseñas
		function coincidePassword() {
			var Newvalor1 = Newpass1.val();
			var Newvalor2 = Newpass2.val();
			//muestro el span
			span.show().removeClass();
			//condiciones dentro de la función
			if (Newvalor1 != Newvalor2) {
				span.text(negacion).addClass('negacion');
				$('#ButtonModificarPass').prop('disabled', true);
			}
			if (Newvalor1.length == 0 || Newvalor1 == "") {
				span.text(vacio).addClass('negacion');
				$('#ButtonModificarPass').prop('disabled', true);
			}
			// if(valor1.length<6 || valor1.length>10){
			// span.text(longitud).addClass('negacion');
			// }
			if (Newvalor1.length != 0 && Newvalor1 == Newvalor2) {
				span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
				$('#ButtonModificarPass').prop('disabled', false);
			}
		}
		//ejecuto la función al soltar la tecla
		Newpass2.keyup(function() {
			coincidePassword();
		});
	});
	/*=============================================
      CAMBIAR PASSWORD USUARIOS
	=============================================*/
	$('#load_cambiarpass').hide();
	$("#form_cambiarpass").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/CambiarPass") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_cambiarpass').show();
				$('#form_cambiarpass').hide();
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
				Swal.fire({
					type: 'error',
					title: 'Error de Servidor, vuelta Intentar a Cambiar la Contraseña',
					showConfirmButton: false,
					timer: 2500
				});
				$('#form_cambiarpass')[0].reset();
				$('#load_cambiarpass').hide();
				$('#form_cambiarpass').show();
			},
			complete: function() {
				$('#form_cambiarpass')[0].reset();
				$('#form_cambiarpass').show();
				$('#load_cambiarpass').hide();
				$('#modal_cambiarpass').modal('hide');
				$('#spanPass').hide();
			},
			dataType: 'html'
		});

	});
    </script>