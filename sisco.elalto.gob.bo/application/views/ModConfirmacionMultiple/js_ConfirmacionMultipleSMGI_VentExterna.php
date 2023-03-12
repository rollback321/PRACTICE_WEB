<script>
	/*=============================================
	 	ACEPTACION MULTIPLE
	=============================================*/
	$('#load_derive_confirm_multiple ').hide();

	function ConfirmacionMultiple() {
		$("#etiquetasConfirmar").empty();
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
		$("#cor_id_ArrayConfirmar").val(respaldo_array);
		$("#cor_id_ArrayCantidadConfirmar").val(ln);
		$.ajax({
			url: "<?= site_url("VentanillaUnicaControl/SacarCodigosForVentanilla") ?>",
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
					var origen = ('O' == data[i].origen) ? 'ORIGINAL' : 'COPIA- ' + data[i].nro_copia;
					$("#etiquetasConfirmar").append('<b><span title="3 New Messages" class="badge bg-success" style="margin-right: 2px;margin-top: 2px;font-size:14px;">GAMEA-' + data[i].cor_codigo + "-" + data[i].ges_gestion + ' ' + origen + '</span><b>');
				}
			},
			error: function(xhr) {},
			complete: function() {},

		});
	}
	$("#form_ConfirmarMultiple").submit(function(e) {
		e.preventDefault();
		$.ajax({
			url: "<?= site_url('SecretaryGestionControl/ConfirmarHojaRutaMultiple') ?>",
			type: "POST",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#submitConfirmarMultipleSMGI').prop('disabled', true);
				$('#form_ConfirmarMultiple').hide();
				$('#load_derive_confirm_multiple').show();
			},
			success: function(obj) {
				Swal.fire({
					type: 'success',
					title: obj,
					showConfirmButton: false,
					timer: 2500
				});
				CountBandejaVentanillaUnica();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#form_ConfirmarMultiple')[0].reset();
				$('#form_ConfirmarMultiple').show();
				$('#submitConfirmarMultipleSMGI').prop('disabled', false);
			},
			complete: function() {
				$('#submitConfirmarMultipleSMGI').prop('disabled', false);
				$('#form_ConfirmarMultiple')[0].reset();
				$('#form_ConfirmarMultiple').show();
				$('#load_derive_confirm_multiple').hide();
				$('#ConfirmarHojaRutaMultiple').modal('hide');
				OcultarDivCheckbox();
				Actualizar2Tablas();
			},
			dataType: 'html'
		});
	});
</script>