<script>
////////////////////////////////////////////
DiviCheck = document.getElementById('DivCheck');

$(function() {
		//Enable check and uncheck all functionality
		$('.checkbox-toggle').click(function() {
			var clicks = $(this).data('clicks')
			if (clicks) {
				//Uncheck all checkboxes
				
				$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
				$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
				DiviCheck.style.display = 'none';
			
			} else {
				if (!HojaRutaActiva.data().any()) {
					Swal.fire({
						type: 'warning',
						title: 'Para la Derivacion Multiple, Seleccione Hojas de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					//Check all checkboxes
					//VerCheckbox();
					$('.mailbox-messages input[type=\'checkbox\']').prop('checked', true);
					$('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square');
					DiviCheck.style.display = 'flex';
					DiviCheck.style.display = 'block';
				}
			}
			$(this).data('clicks', !clicks)
		})
		//Handle starring for font awesome
		$('.mailbox-star').click(function(e) {
			e.preventDefault()
			//detect type
			var $this = $(this).find('a > i')
			var fa = $this.hasClass('fa')
			//Switch states
			if (fa) {
				$this.toggleClass('fa-star')
				$this.toggleClass('fa-star-o')
			}
		})
	});


	function OcultarDivCheckbox() {
		$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
		$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
		DiviCheck.style.display = 'none';
	}

	function VerCheckbox() {
		var checkbox = document.getElementsByName('ckbox[]');
		console.log(checkbox);
		var ln = 0;
		for (var i = 0; i < checkbox.length; i++) {
			console.log(checkbox.length);
			if (checkbox[i].checked) {
				ln++;
				var Destino = document.getElementsByName('ckbox[]')[i].value;
				console.log('Valor ' + Destino);
				BuscarDestinoCheckBox(Destino);
			}
		}
		if (ln > 0) {
			DiviCheck.style.display = 'flex';
			DiviCheck.style.display = 'block';
		} else {
			$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
			$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
			DiviCheck.style.display = 'none';
		}
		console.log(ln);
	}
	$(function() {
		bsCustomFileInput.init();
		//Initialize Select2 Elements
		$('.select2').select2()
		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	});

	/*=============================================
  		HABILITAR O DESABILITAR CHECKBOX DEPENDEIENDO SI TIENE DESTINO LA HOJA DE RUTA
	=============================================*/
	function BuscarDestinoCheckBox(pend_id) {
		$.ajax({
			type: 'POST',
			url: "<?= site_url("VentanillaUnicaControl/BuscarDependeciaDestinoforCheckBox") ?>",
			data: {
				pend_id: pend_id
			},
			beforeSend: function() {},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log('Ok'+data);
				if (obj === null || obj === 0 || obj === "") {
					Swal.fire({
						type: 'warning',
						title: 'Designe un Destino para la Hoja de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
					OcultarDivCheckbox();
				} 
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}



</script>