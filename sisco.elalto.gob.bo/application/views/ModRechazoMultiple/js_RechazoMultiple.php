<script>
/*=============================================
	 	RECHAZO MULTIPLE
	=============================================*/
	$('#load_derive_rechazo_multiple').hide();
	$("#TextRechazo").focus();
	function RechazoMultiple() {
		LimpiarInputTextRechazo();
		$("#etiquetasRechazar").empty();
		var checkbox = document.getElementsByName('ckbox[]');
		var ln = 0;
		var CheckSelected = [];
		for (var i = 0; i < checkbox.length; i++) {
			if (checkbox[i].checked) {
				CheckSelected.push(checkbox[i].value);
				ln++;
			}
		}
		if (ln > 0) {
			DiviCheck.style.display = 'flex';
			DiviCheck.style.display = 'block';
		} else {
			DiviCheck.style.display = 'none';
		}
		console.log(CheckSelected);
		console.log(ln);
		var respaldo_array = JSON.stringify(CheckSelected);
		$("#cor_id_ArrayRechazar").val(respaldo_array);
		$("#cor_id_ArrayCantidadRechazar").val(ln);
		$.ajax({
			url: "<?= site_url("TechnicalControl/SacarCodigosHistorial") ?>",
			type: "POST",
			dataType: "JSON",
			data: {
				'cadena': JSON.stringify(CheckSelected),
				'count': ln,
			},
			beforeSend: function() {},
			success: function(data) {
				console.log(data);
				var totalArray = data.length;
				for (var i = 0; i < totalArray; i++) {
					$("#etiquetasRechazar").append('<b><span title="3 New Messages" class="badge bg-success" style="margin-right: 2px;margin-top: 2px;font-size:14px;">GAMEA-' + data[i].cor_codigo + "-" + data[i].ges_gestion + '</span><b>');
				}
			},
			error: function(xhr) {},
			complete: function() {},
		});
	}
	$("#form_rechazarmultiple").submit(function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?= site_url('TechnicalControl/denyHojaRutaRechazarMultiple') ?>",
			type: "POST",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_derive_rechazo_multiple').show();
				$('#form_rechazarmultiple').hide();
				$('#submitRechazarMultiple').prop('disabled', true);
			},
			success: function(obj) {
				Swal.fire({
					type: 'success',
					title: obj,
					showConfirmButton: false,
					timer: 2500
				});
				CountBandeja();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#form_rechazarmultiple')[0].reset();
				$('#form_rechazarmultiple').show();
				$('#submitRechazarMultiple').prop('disabled', false);
			},
			complete: function() {
				Actualizar1TablasBandeja();
				$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
				$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');

				DiviCheck.style.display = 'none';
				$('#form_rechazarmultiple')[0].reset();
				$('#form_rechazarmultiple').show();
				$('#load_derive_rechazo_multiple').hide();
				$('#RechazarHojaRutaMultiple').modal('hide');
				$('#submitRechazarMultiple').prop('disabled', false);
				OcultarDivInbox();
				Actualizar2TablasBandeja();
			},
			dataType: 'html'
		});
	});
	function LimpiarInputTextRechazo(){
		$('#TextRechazo').val("");
	}

    </script>