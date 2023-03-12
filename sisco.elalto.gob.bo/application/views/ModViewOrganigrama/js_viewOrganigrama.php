<script>

function ViewOrganigrama() {
		var rol_niv_1 = <?php echo intval($this->session->userdata('rol_niv_1')) ?>;
		var rol__niv_2 = <?php echo intval($this->session->userdata('rol__niv_2')) ?>;
		var rol__niv_3 = <?php echo intval($this->session->userdata('rol__niv_3')) ?>;


		if (rol_niv_1 != 0 && rol__niv_2 != 0 && rol__niv_3 != 0) {
			$('.titleInitialsLevel_Inicial').text("<?php echo strval($this->session->userdata('nameUnique')) ?>");
		}
		if (rol_niv_1 != 0 && rol__niv_2 != 0 && rol__niv_3 == 0) {
			$('.titleInitialsLevel_Inicial').text("<?php echo strval($this->session->userdata('nameUnique')) ?>");
			list_Of_UnitsDireccion(rol_niv_1, rol__niv_2);
		}
		if (rol_niv_1 != 0 && rol__niv_2 == 0 && rol__niv_3 == 0) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url('JefeControl/Dependecias_niv1'); ?>",
				data: {
					niv_id_1: rol_niv_1,
				},
				success: function(json) {
					var obj = JSON.parse(json);
					$('.titleInitialsLevel_Inicial').text("<?php echo strval($this->session->userdata('nameUnique')) ?>");
					$('.titleInitialsLevel_Inicial').attr('title', obj.niv1_nombre);
					$('.titleInitialsLevel_Inicial').attr('onClick', 'ViewDetail_level1_1("' + obj.niv_id + '");');
					console.log(json);
				},
				error: function(xhr) {
					alertify.alert('SeguiPRO', 'Existe un Error, vuelta Intentarlo de Nuevo', function() {
						alertify.success('Ok');
					});
				},

			});

			$.ajax({
				type: 'POST',
				url: "<?= site_url('JefeControl/Dependecias_niv2'); ?>",
				data: {
					niv_id_1: rol_niv_1,
					niv_id_2: rol__niv_2,
				},
				success: function(json) {
					var obj = JSON.parse(json);
					var html = '';
					for (var i = 0; i < obj.length; i++) {
						html += '<li id="D' + obj[i].niv2_id + '"><a href="#" onclick="detail_level2_2(' + rol_niv_1 + ',' + obj[i].niv2_id + ')" title="' + obj[i].niv2_nombre + '">' + obj[i].niv2_sigla + '</a>';
						html += list_Of_Units(rol_niv_1, obj[i].niv2_id);
						html += '</li>';
					}
					$('#address_structure').html(html);
				},
				error: function(xhr) {
					alertify.alert('SeguiPRO', 'Existe un Error, vuelta Intentarlo de Nuevo', function() {
						alertify.success('Ok');
					});
				},
				dataType: 'html'
			});
		}
	}



	function list_Of_UnitsDireccion(rol_niv_1, niv2_id) {
		var list_html;
		$.ajax({
			type: 'POST',
			url: "<?= site_url('JefeControl/Dependecias_niv3'); ?>",
			data: {
				niv_id_2: niv2_id
			},
			async: false,
			success: function(json) {
				var data = JSON.parse(json);
				var htm = '';
				for (var j = 0; j < data.length; j++) {
					htm += '<li onclick="detail_level3_3(' + rol_niv_1 + ',' + niv2_id + ',' + data[j].niv3_id + ')" title="' + data[j].niv3_nombre + '"><a href="#">' + data[j].niv3_sigla + '</a></li>';
				}
				$('#address_structure').html(htm);
			},
			dataType: 'html'
		});

	}
	function list_Of_Units(rol_niv_1, niv2_id) {
		var list_html;
		$.ajax({
			type: 'POST',
			url: "<?= site_url('JefeControl/Dependecias_niv3'); ?>",
			data: {
				niv_id_2: niv2_id
			},
			async: false,
			success: function(json) {
				var data = JSON.parse(json);
				var htm = '';
				htm += '<ul>';
				for (var j = 0; j < data.length; j++) {
					htm += '<li onclick="detail_level3_3(' + rol_niv_1 + ',' + niv2_id + ',' + data[j].niv3_id + ')" title="' + data[j].niv3_nombre + '"><a href="#">' + data[j].niv3_sigla + '</a></li>';
				}
				htm += '</ul>';
				list_html = htm;
			}
		});
		return list_html;
	}


	</script>