
<script>
	$(document).ready(function() {
		CountBandejaVentanillaInterna();
		CountBandejaVentanillaUnica();
		CountBandejaGeneral();
		CargarTema();
		TableInbox();
	});

	//////////////////////////////////////////////////////////////


	

	/*=============================================
	  	FUNCTION HOJA DE RUTA
	=============================================*/
	function deny(cor_id, pend_id, codigo) {
		$.ajax({
			type: 'POST',
			url: "<?= site_url('SecretaryGestionControl/denyHojaRuta_VentanillaInternaSMGI'); ?>",
			data: {
				cor_id: cor_id,
				pend_id: pend_id,
				codigo: codigo,
			},
			beforeSend: function() {
				$('#ButtonDeny_VI_SMGI').prop('disabled', true);
			},
			success: function(json) {
				Swal.fire({
					type: 'success',
					title: json,
					showConfirmButton: false,
					timer: 2500
				});
				CountBandejaVentanillaInterna();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {
				$('#ButtonDeny_VI_SMGI').prop('disabled', false);
				listInbox.ajax.reload(null, false);
				listReception.ajax.reload(null, false);
			},
			dataType: 'html'
		});

	}


	/*=============================================
      Section DERIVAR HOJA DE RUTA INTERNA
	=============================================*/
	function Datosforderivar(cor_id) {
		$('#cor_id_interno').val(cor_id);
		$.ajax({
			type: 'POST',
			url: "<?= site_url('TechnicalControl/fetchDataListTechnicalGestion'); ?>",
			beforeSend: function() {},
			success: function(data) {
				var content = '';
				var obj = JSON.parse(data);
				for (var i = 0; i < obj.length; i++) {
					content += '<option selected="selected"value="' + obj[i].usu_rol_id + '">';
					content += obj[i].usu_apellidos + ' ' + obj[i].usu_nombres + ' - ' + obj[i].usu_rol_cargo;
					content += '</option>';
				}
				$('#usuInterno_id').html(content);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}
	
	/////////////////////////////////////////////////////////


	/*=============================================
	  FUNCTION CONFIRMAR HOJA DE RUTA
	=============================================*/
	function confirma(cod_id, pend_id, codigo) {
		$.ajax({
			url: "<?php echo site_url('SecretaryGestionControl/ConfirmarHojaRutaForVent_Interna') ?>/" + cod_id + "/" + pend_id + "/" + codigo,
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {
				$('#ButtonConfirm_VU_SMGI').prop('disabled', true);
			},
			success: function(obj) {
				Swal.fire({
					type: 'success',
					title: obj,
					showConfirmButton: false,
					timer: 2500
				});
				CountBandejaVentanillaInterna();
				
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {
				$('#ButtonConfirm_VU_SMGI').prop('disabled', false);
				Actualizar2Tablas();
			},
			dataType: 'html'
		});
	}


	/////////////////////////////////////////////////////////

	function resetDropZone() {
		myDropzone.removeAllFiles(true);
	}



</script>
</body>

</html>