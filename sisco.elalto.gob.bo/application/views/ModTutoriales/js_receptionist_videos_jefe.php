<script>
	$(function() {
		CargarTema();
	});
	$('#modal1').on('show.bs.modal', function(e) {
		// var idVideo = $(e.relatedTarget).data('id');
		$('#modal1 .modal-body').html('<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="yt-player">   <iframe class="embed-responsive-item" id="VideoPlayer" src="<?= base_url() ?>assets/dist/videos/busquedas.mp4" allowfullscreen></iframe></div>');
	});
	//on close remove
	$('#modal1').on('hidden.bs.modal', function() {
		$('#modal1 .modal-body').empty();
	});
	$('#modal2').on('show.bs.modal', function(e) {
		// var idVideo = $(e.relatedTarget).data('id');
		$('#modal2 .modal-body').html('<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="yt-player">   <iframe class="embed-responsive-item" id="VideoPlayer" src="<?= base_url() ?>assets/dist/videos/crearhojaruta.mp4" allowfullscreen></iframe></div>');
	});
	//on close remove
	$('#modal2').on('hidden.bs.modal', function() {
		$('#modal2 .modal-body').empty();
	});
	$('#modal3').on('show.bs.modal', function(e) {
		// var idVideo = $(e.relatedTarget).data('id');
		$('#modal3 .modal-body').html('<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="yt-player">   <iframe class="embed-responsive-item" id="VideoPlayer" src="<?= base_url() ?>assets/dist/videos/DerivacionInterna.mp4" allowfullscreen></iframe></div>');
	});
	//on close remove
	$('#modal3').on('hidden.bs.modal', function() {
		$('#modal3 .modal-body').empty();
	});
	$('#modal4').on('show.bs.modal', function(e) {
		// var idVideo = $(e.relatedTarget).data('id');
		$('#modal4 .modal-body').html('<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="yt-player">   <iframe class="embed-responsive-item" id="VideoPlayer" src="<?= base_url() ?>assets/dist/videos/imprimir.mp4" allowfullscreen></iframe></div>');
	});
	//on close remove
	$('#modal4').on('hidden.bs.modal', function() {
		$('#modal4 .modal-body').empty();
	});
	$('#modal5').on('show.bs.modal', function(e) {
		// var idVideo = $(e.relatedTarget).data('id');
		$('#modal5 .modal-body').html('<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="yt-player">   <iframe class="embed-responsive-item" id="VideoPlayer" src="<?= base_url() ?>assets/dist/videos/bandeja.mp4" allowfullscreen></iframe></div>');
	});
	//on close remove
	$('#modal5').on('hidden.bs.modal', function() {
		$('#modal5 .modal-body').empty();
	});
	$('#modal6').on('show.bs.modal', function(e) {
		// var idVideo = $(e.relatedTarget).data('id');
		$('#modal6 .modal-body').html('<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="yt-player">   <iframe class="embed-responsive-item" id="VideoPlayer" src="<?= base_url() ?>assets/dist/videos/DerivacionExterna.mp4" allowfullscreen></iframe></div>');
	});
	//on close remove
	$('#modal6').on('hidden.bs.modal', function() {
		$('#modal6 .modal-body').empty();
	});
	$('#modal7').on('show.bs.modal', function(e) {
		// var idVideo = $(e.relatedTarget).data('id');
		$('#modal7 .modal-body').html('<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="yt-player">   <iframe class="embed-responsive-item" id="VideoPlayer" src="<?= base_url() ?>assets/dist/videos/DerivacionCopias.mp4" allowfullscreen></iframe></div>');
	});
	//on close remove
	$('#modal7').on('hidden.bs.modal', function() {
		$('#modal7 .modal-body').empty();
	});
	$('#modal8').on('show.bs.modal', function(e) {
		// var idVideo = $(e.relatedTarget).data('id');
		$('#modal8 .modal-body').html('<div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="yt-player">   <iframe class="embed-responsive-item" id="VideoPlayer" src="<?= base_url() ?>assets/dist/videos/tecnicos.mp4" allowfullscreen></iframe></div>');
	});
	//on close remove
	$('#modal8').on('hidden.bs.modal', function() {
		$('#modal8 .modal-body').empty();
	});



	//////////////////////////////////////////////
	function DownloadManual() {
		$.ajax({
			url: "<?= site_url("secretaryControl/downloadsManual") ?>",
			beforeSend: function() {
				$('#BtnManual').prop('disabled', true);
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
					title: 'Error con el servidor, Vuelva a Intentarlo',
					showConfirmButton: false,
					timer: 2500
				});

			},
			complete: function() {
				$('#BtnManual').prop('disabled', false);
			}
		});


		////////////////////////////////////
	}
</script>
</body>

</html>