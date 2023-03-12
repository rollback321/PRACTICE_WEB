<script>
	////////////////////////////////////////////
	DiviCheck = document.getElementById('DivCheck');
	DiviCheckReception = document.getElementById('DivCheckReception');

	$(function() {
		$('.checkbox-toggle').click(function() {
			var clicks = $(this).data('clicks');
			if (clicks) {
				//Uncheck all checkboxes
				$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
				$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
				DiviCheck.style.display = 'none';
			} else {
				if (!listInbox.data().any()) {
					Swal.fire({
						type: 'warning',
						title: 'Para Aceptar o Rechazar, Seleccione Hojas de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					//Check all checkboxes
					$('.mailbox-messages input[type=\'checkbox\']').prop('checked', true);
					$('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square');
					DiviCheck.style.display = 'block';
				}
			}
			$(this).data('clicks', !clicks);
		});
		$('.checkbox-toggleReception').click(function() {
			var clicks = $(this).data('clicks');
			if (clicks) {
				//Uncheck all checkboxes
				$('.mailbox-messagesR input[type=\'checkbox\']').prop('checked', false);
				$('.checkbox-toggleReception .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
				DiviCheckReception.style.display = 'none';
			} else {
				if (!listReception.data().any()) {
					Swal.fire({
						type: 'warning',
						title: 'Para la Derivacion Multiple, Seleccione Hojas de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					//Check all checkboxes
					$('.mailbox-messagesR input[type=\'checkbox\']').prop('checked', true);
					$('.checkbox-toggleReception .far.fa-square').removeClass('fa-square').addClass('fa-check-square');
					DiviCheckReception.style.display = 'block';
				}
			}
			$(this).data('clicks', !clicks);
		});

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
		});
	});


	function OcultarDivInbox() {
		$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
		$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
		DiviCheck.style.display = 'none';
	}

	function OcultarDivReception() {
		$('.mailbox-messagesR input[type=\'checkbox\']').prop('checked', false);
		$('.checkbox-toggleReception .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
		DiviCheckReception.style.display = 'none';
	}

	function VerCheckboxEntrada() {
		var checkbox = document.getElementsByName('ckbox[]');
		var ln = 0;
		for (var i = 0; i < checkbox.length; i++) {
			if (checkbox[i].checked)
				ln++
		}
		if (ln > 0) {
			DiviCheck.style.display = 'flex';
			DiviCheck.style.display = 'block';
		} else {
			OcultarDivInbox();
		}
		console.log(ln);
	}

	function VerCheckboxReception() {
		var checkbox2 = document.getElementsByName('ReceptionCkbox[]');
		var ln2 = 0;
		for (var i = 0; i < checkbox2.length; i++) {
			if (checkbox2[i].checked)
				ln2++
		}
		if (ln2 > 0) {
			DiviCheckReception.style.display = 'block';
		} else {
			OcultarDivReception();
		}
		console.log(ln2);
	}
</script>