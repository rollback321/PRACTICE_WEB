<script>
	/*=============================================
      Section DERIVAR MULTIPLE INTERNO
	=============================================*/

	function DerivarMultiple() {
		$("#etiquetas").empty();
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
		var respaldo_array = JSON.stringify(CheckSelected);
		$("#cor_id_Array").val(respaldo_array);
		$("#cor_id_ArrayCantidad").val(ln);
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
					$("#etiquetas").append('<b><span title="3 New Messages" class="badge bg-success" style="margin-right: 2px;margin-top: 2px;">GAMEA-' + data[i].cor_codigo + "-" + data[i].ges_gestion + '</span><b>');
				}
				DatosResponsableGestion();
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
		});
	}
	/*=============================================
      Section DERIVAR HOJA DE RUTA INTERNA
	=============================================*/
	function DatosResponsableGestion() {
		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnicalGestionSecretary'); ?>",
			beforeSend: function() {},
			success: function(data) {
				console.log(data);
				var content = '';
				var obj = JSON.parse(data);
				for (var i = 0; i < obj.length; i++) {
					content += '<option selected="selected"value="' + obj[i].usu_rol_id + '">';
					content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
					content += '</option>';
				}
				$('#usuInterno_idGestion').html(content);
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


	////////////////////////////////////
	$('#load_derive_multiple').hide();
	$("#form_derivarHojaRutaMultiple").submit(function(e) {
		e.preventDefault();
		//if ($(".secretary #form_derivarHojaRutaMultiple").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("VentanillaUnicaControl/derivarHojaRutaInternaMultiple") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#submitDeriveMultiple').prop('disabled', true);
					$('#load_derive_multiple').show();
					$('#form_derivarHojaRutaMultiple').hide();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					Actualizar2Tablas();
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
					$('#form_derivarHojaRutaMultiple')[0].reset();
					$('#load_derive_multiple').hide();
					$('#form_derivarHojaRutaMultiple').show();
					$('#submitDeriveMultiple').prop('disabled', false);
				},
				complete: function() {
					$('#form_derivarHojaRutaMultiple')[0].reset();
					$('#form_derivarHojaRutaMultiple').show();
					$('#load_derive_multiple').hide();
					$('#derivarHojaRutaMultiple').modal('hide');
					$('#submitDeriveMultiple').prop('disabled', false);
					OcultarDivCheckbox();
				},
				dataType: 'html'
			});
		//}
	});
</script>