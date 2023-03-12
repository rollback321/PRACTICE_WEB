<script>
	/*=============================================
      Section DERIVAR MULTIPLE INTERNO
	=============================================*/
	$('#load_derive_multiple').hide();
	function DerivarMultipleInterna() {
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
		console.log(ln);
		var respaldo_array = JSON.stringify(CheckSelected);
		$("#cor_id_Array").val(respaldo_array);
		$("#cor_id_ArrayCantidad").val(ln);
		$.ajax({
			url: "<?= site_url("VentanillaUnicaControl/SacarCodigos") ?>",
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
					$("#etiquetas").append('<b><span title="3 New Messages" class="badge bg-success" style="margin-right: 2px;margin-top: 2px;font-size:12px;">GAMEA-' + data[i].cor_codigo + "-" + data[i].ges_gestion + '</span><b>');
				}
				derivarHojaRutaInternaResponsable();
			},
			error: function(xhr) {},
			complete: function() {},
		});
	}
	/*=============================================
      Section DERIVAR responsable interno
	=============================================*/
	function derivarHojaRutaInternaResponsable() {
		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnical'); ?>",
			beforeSend: function() {},
			success: function(data) {
				var content = '<option value="0" selected="selected">Seleccionar Tecnico</option>';
				var obj = JSON.parse(data);
				for (var i = 0; i < obj.length; i++) {
					content += '<option value="' + obj[i].usu_rol_id + '">';
					content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
					content += '</option>';
				}
				$('#usuInterno_idResponsable').html(content);
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
	$("#form_derivarHojaRutaMultipleInterna").submit(function(e) {
		e.preventDefault();
		if ($(".secretary #form_derivarHojaRutaMultipleInterna").valid()) {
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/derivarHojaRutaInternaMultiple") ?>",
			// dataType: "JSON",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_derive_multiple').show();
				$('#form_derivarHojaRutaMultipleInterna').hide();
				$('#submitDeriveInternalMultiple').prop('disabled', true);
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
				$('#submitDeriveInternalMultiple').prop('disabled', false);
				$('#form_derivarHojaRutaMultipleInterna')[0].reset();
				$('#load_derive_multiple').hide();
				$('#form_derivarHojaRutaMultipleInterna').show();
			},
			complete: function() {
				$('#submitDeriveInternalMultiple').prop('disabled', false);
				$('#form_derivarHojaRutaMultipleInterna')[0].reset();
				$('#form_derivarHojaRutaMultipleInterna').show();
				$('#load_derive_multiple').hide();
				$('#derivarHojaRutaMultiple').modal('hide');
				OcultarDivCheckbox();
			},
			dataType: 'html'
		});
	}
	});

	////////////////////////////////////
	$('select#select_proveidoMultiple').on('change', function() {
			$('#a_provMultiple').val($(this).find(":selected").text() + ' ');
			$('#a_provMultiple').focus();
			$('#select_proveidoMultiple').val($('#select_proveidoMultiple > option:first').val());
		});
	
	function limpiarControlesDerivacionMultipleInterna() {
		$("select#list_usuariosME option").each(function() {
			$(this).remove();
		});
	}
</script>