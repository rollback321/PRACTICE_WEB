<script>
	function displayLevel_1(niv_id, niv_name, niv_initials) {
		// $('.titleLevel_1').text(niv_name);
		// $('.titleInitialsLevel_1').text(niv_initials);
		// $('.titleInitialsLevel_1').attr('title', niv_name);
		// $('.titleInitialsLevel_1').attr('onClick', 'detail_level1_1("' + niv_id + '");');

		$.ajax({
			type: 'POST',
			url: "<?= site_url('AdministratorControl/list_Of_Direction'); ?>",
			data: {
				niv_id_1: niv_id
			},
			success: function(json) {
				var obj = JSON.parse(json);
				console.log(obj.length);
				//$('#link-'+niv_id).addClass('active');
				$('#ulDirecciones-' + niv_id).empty();
				var anexo = '';
				for (var i = 0; i < obj.length; i++) {
					anexo += '<li class="nav-item" onclick="detail_level3(' + obj[i].niv2_id + ')"> <a href="#" class="nav-link">   <i class="nav-icon far fa-circle text-warning"></i>   <p>';
					anexo += obj[i].niv2_nombre;
					anexo += '<i class="right fas fa-angle-left"></i></p></a>';
					anexo += '<ul class="nav nav-treeview" id="ulUnidades-' + obj[i].niv2_id + '"></ul>';
					anexo += '</li>';
					console.log(anexo);
				}
				$('#ulDirecciones-' + niv_id).append(anexo);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor',
					showConfirmButton: false,
					timer: 2500
				});
			},
			dataType: 'html'
		});


		
	}

	function detail_level3(niv_id) {

		$.ajax({
			type: 'POST',
			url: "<?= site_url('AdministratorControl/list_Of_Units'); ?>",
			data: {
				niv_id_2: niv_id
			},
			success: function(json) {
				var obj = JSON.parse(json);
				console.log(obj.length);
				//$('#link-'+niv_id).addClass('active');
				$('#ulUnidades-' + niv_id).empty();
				var anexo = '';
				for (var i = 0; i < obj.length; i++) {
					anexo += '<li class="nav-item"> <a href="#" class="nav-link"><i class="nav-icon far fa-circle text-info"></i><p>';
					anexo += obj[i].niv3_nombre;
					anexo += '</p></a>';
					anexo += '<ul class="nav nav-treeview" id="ulUnidades-' + obj[i].niv3_id + '" onclick="detail_level3(' + obj[i].niv3_id + ')"></ul>';
					anexo += '</li>';
					console.log(anexo);
				}
				$('#ulUnidades-' + niv_id).append(anexo);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor',
					showConfirmButton: false,
					timer: 2500
				});
			},
			dataType: 'html'
		});
	}
</script>

<script>
	$(function() {
		Mostrar_GraficoHRC(2);
	});

	var finalDateValues = new Array();
	var xxxx;

	function Mostrar_GraficoHRC(niv_id) {
		$.ajax({
			type: 'POST',
			url: "<?= site_url('AlcaldesaControl/list_Of_SecretaryDependency'); ?>",
			//data: {
			//	niv_id_1: niv_id
			//},
			success: function(json) {
				var obj = JSON.parse(json);
				for (var i = 0; i < obj.length; i++) {
					finalDateValues[i] = [obj[i].niv1_nombre,parseInt(obj[i].total)];
				}
				llamarGrafico(finalDateValues);
				console.log(obj);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor',
					showConfirmButton: false,
					timer: 2500
				});
			},
			dataType: 'html'
		});
	}

	function llamarGrafico(arr) {
		Highcharts.chart('container', {
			chart: {
				type: 'pie',
				options3d: {
					enabled: true,
					alpha: 45,
					beta: 0
				}
			},
			title: {
				text: 'HOJAS DE RUTA CREADAS EN EL GAMEA'
			},
			accessibility: {
				point: {
					valueSuffix: '%'
				}
			},
			tooltip: {
				//pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			},
			plotOptions: {
				pie: {
					allowPointSelect: true,
					cursor: 'pointer',
					depth: 35,
					dataLabels: {
						enabled: true,
						format: '{point.name}'
					}
				}
			},
			series: [{
				type: 'pie',
				name: 'Nro Hojas de Ruta:',
				data: arr
			}]
		});
	}
</script>