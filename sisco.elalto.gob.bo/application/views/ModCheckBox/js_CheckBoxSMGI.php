<script>
////////////////////////////////////////////
DiviCheck = document.getElementById('DivCheck');
$(function() {
		//Enable check and uncheck all functionality
		$('.checkbox-toggle').click(function() {
			var clicks = $(this).data('clicks')
			if (clicks) {
				//Uncheck all checkboxes
				$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
				$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
			} else {
				if (!listInbox.data().any()) {
					Swal.fire({
						type: 'warning',
						title: 'Para la Confirmacion Multiple, Seleccione Hojas de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					$('.mailbox-messages input[type=\'checkbox\']').prop('checked', true);
					$('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square');
					DiviCheck.style.display = 'flex';
					DiviCheck.style.display = 'block';
				}
			}
			$(this).data('clicks', !clicks)
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
		})
	});

	function OcultarDivCheckbox() {
		$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
		$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
		DiviCheck.style.display = 'none';
	}

	function VerCheckbox() {
		var checkbox = document.getElementsByName('ckbox[]');
		var ln = 0;
		for (var i = 0; i < checkbox.length; i++) {
			if (checkbox[i].checked) {
				ln++;
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
</script>