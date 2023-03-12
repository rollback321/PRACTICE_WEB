<script>
/*=============================================
	 	ACEPTACION MULTIPLE
	=============================================*/
	$('#load_derive_acept_multiple').hide();
	function AceptacionMultiple() {
		$("#etiquetasAceptar").empty();
		var checkbox = document.getElementsByName('ckbox[]');
		var ln = 0;
		var CheckSelectedId = [];
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
		$("#cor_id_ArrayAceptar").val(respaldo_array);
		$("#cor_id_ArrayCantidadAceptar").val(ln);
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
					$("#etiquetasAceptar").append('<b><span title="3 New Messages" class="badge bg-success" style="margin-right: 2px;margin-top: 2px;font-size:14px;">GAMEA-' + data[i].cor_codigo + "-" + data[i].ges_gestion + '</span><b>');
				}
			},
			error: function(xhr) {},
			complete: function() {},

		});
	}
	$("#form_aceptarmultiple").submit(function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?= site_url('TechnicalControl/acceptHojaRutaMultiple') ?>",
			type: "POST",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_derive_acept_multiple').show();
				$('#form_aceptarmultiple').hide();
				$('#submitAceptarMultiple').prop('disabled', true);
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
				$('#form_aceptarmultiple')[0].reset();
				$('#form_aceptarmultiple').show();
				$('#submitAceptarMultiple').prop('disabled', false);
			},
			complete: function() {
				Actualizar1TablasBandeja();
				$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
				$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');

				DiviCheck.style.display = 'none';
				$('#form_aceptarmultiple')[0].reset();
				$('#form_aceptarmultiple').show();
				$('#load_derive_acept_multiple').hide();
				$('#AceptarHojaRutaMultiple').modal('hide');
				$('#submitAceptarMultiple').prop('disabled', false);
				OcultarDivInbox();
				Actualizar2TablasBandeja();
			},
			dataType: 'html'
		});
	});


    </script>