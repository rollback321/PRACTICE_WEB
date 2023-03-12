<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
////////////////////////////////////////////////////////////////////////////////////
$('#load_concluir_hoja').hide();	
function ConcluirHojaRuta(cor_id, his_id, corEstado, origen, nro_copia, codigo) {
		$('#modal_ConcluirHoja').modal('show');
		$('.cod_GAMEAConcluir').text(codigo);
		$('#cor_id').val(cor_id);
		$("#his_id").val(his_id);
		$("#origen").val(origen);
		$("#nro_copia").val(nro_copia);
		$("#codigo").val(codigo);
		$("#cor_estado").val(corEstado);
	}
		/*=============================================
     CONCLUIR HOJAS DE RUTA
	=============================================*/
	$("#form_concluir_hoja").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("JefeControl/ConcluirHojaRuta") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_concluir_hoja').show();
				$('#form_concluir_hoja').hide();
				$('#ButtonConcluirHoja').prop('disabled', true);
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
					title: 'Error en el Servidor',
					showConfirmButton: false,
					timer: 2500
				});
				$('#form_concluir_hoja')[0].reset();
				$('#load_concluir_hoja').hide();
				$('#form_concluir_hoja').show();
				$('#ButtonConcluirHoja').prop('disabled', false);
			},
			complete: function() {
				$('#form_concluir_hoja')[0].reset();
				$('#form_concluir_hoja').show();
				$('#load_concluir_hoja').hide();
				$('#modal_ConcluirHoja').modal('hide');
				$('#ButtonConcluirHoja').prop('disabled', false);
				Actualizar2_4TablasBandeja();
			},
			dataType: 'html'
		});
	});

////////////////////////////////////////////////////////////////////////////////////


</script>
