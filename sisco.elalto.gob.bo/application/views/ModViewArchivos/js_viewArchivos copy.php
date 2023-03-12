<script>


	/*=============================================
	  FUNCTION VER ARCHIVOS
	=============================================*/
	function VerArchivosAjax(cor_id) {
		$('#load_archivos').hide();
		$.ajax({
			url: "<?= site_url('SecretaryControl/ListDocument') ?>/" + cor_id,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {
				$('#ButtonVerArchivo').prop('disabled', true);
				limpiarTable();
			},
			success: function(data) {
				$('#load_archivos').hide();
				var newData = JSON.parse(JSON.stringify(data))
				var count = Object.keys(data).length;
				if (count > 0) {
					$('#VerArchivos').modal('show');
					var tr_head = "<tr>" +
						"<th style='font-size: 10px; text-align: center;'>NRO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DOCUMENTO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DEPENDENCIA</th>" +
						"<th style='font-size: 10px; text-align: center;'>FECHA</th>" +
						"</tr>";
					$("#TableDocDerivar thead").append(tr_head);
					for (var i = 0; i < count; i++) {
						var idDoc = newData[i].id_doc;
						var id = newData[i].cor_id;
						var original = newData[i].name_document_original;
						var enc = newData[i].name_document_encript;
						var fecha = newData[i].fecha;
						var dependencia = newData[i].cor_institucion;
						newcount = i + 1;
						var tr_str = "<tr>" +
							"<td style=' text-align: center;'>" + newcount + "</td>" +
							"<td ><a href='<?= base_url() ?>assets/upload/documents/" + enc + "' style='color: #fff;background-color: #007bff;border-color: #007bff;padding: .25rem .5rem;font-size: .575rem;line-height: 1.5;border-radius: .2rem;' target='_blank'><i class='fa fa-eye'></i> " + original + "</a></td>" +
							"<td >" + dependencia + "</td>" +
							"<td >" + fecha + "</td>" +
							"</tr>";
						$("#TableDocDerivar tbody").append(tr_str);
					}
				} else {
					$('#VerArchivos').modal('hide');
					alertify.alert('SISCO', 'No Tiene Archivos', function() {
						alertify.success('Ok');
					});
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#VerArchivos').modal('hide');
				alert('Error con el servidor 33');
			},
			complete: function() {
				$('#ButtonVerArchivo').prop('disabled', false);
				$('#VerArchivos').modal('hide');
			}
		});

	}


	function VerArchivosDerivar(cor_id) {
		$.ajax({
			url: "<?= site_url('SecretaryControl/ListDocument') ?>/" + cor_id,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {
				$(`#TableDocDerivar thead`).empty();
				$(`#TableDocDerivar tbody`).empty();
			},
			success: function(data) {
				var newData = JSON.parse(JSON.stringify(data))
				var count = Object.keys(data).length;
				if (count > 0) {

					var tr_head = "<tr>" +
						"<th style='font-size: 10px; text-align: center;'>NRO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DOCUMENTO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DEPENDENCIA</th>" +
						"<th style='font-size: 10px; text-align: center;'>FECHA</th>" +
						"</tr>";
					$("#TableDocDerivar thead").append(tr_head);
					for (var i = 0; i < count; i++) {
						var idDoc = newData[i].id_doc;
						var id = newData[i].cor_id;
						var original = newData[i].name_document_original;
						var enc = newData[i].name_document_encript;
						var fecha = newData[i].fecha;
						var dependencia = newData[i].cor_institucion;
						newcount = i + 1;
						var tr_str = "<tr>" +
							"<td style=' text-align: center;'>" + newcount + "</td>" +
							"<td ><a href='<?= base_url() ?>assets/upload/documents/" + enc + "' style='color: #fff;background-color: #007bff;border-color: #007bff;padding: .25rem .5rem;font-size: .575rem;line-height: 1.5;border-radius: .2rem;' target='_blank'><i class='fa fa-eye'></i> " + original + "</a></td>" +
							"<td >" + dependencia + "</td>" +
							"<td >" + fecha + "</td>" +
							"</tr>";
						$("#TableDocDerivar tbody").append(tr_str);
					}
				} else {
					var tr_str = "<tr>" +
						"<td style=' text-align: center;'>NO TIENE ARCHIVOS</td>" +
						"</tr>";
					$("#TableDocDerivar tbody").append(tr_str);
				}
			}
		});

	}
	//////////////////////////////////
	function VerArchivosEditar(cor_id) {
		$.ajax({
			url: "<?= site_url('SecretaryControl/ListDocument') ?>/" + cor_id,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {
				$(`#TableDocEditar thead`).empty();
				$(`#TableDocEditar tbody`).empty();
			},
			success: function(data) {
				var newData = JSON.parse(JSON.stringify(data))
				var count = Object.keys(data).length;
				if (count > 0) {

					$("#NuevoArchivo").prop('disabled', true);
					var tr_head = "<tr>" +
						"<th style='font-size: 10px; text-align: center;'>NRO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DOCUMENTO</th>" +
						"<th style='font-size: 10px; text-align: center;'>DEPENDENCIA</th>" +
						"<th style='font-size: 10px; text-align: center;'>FECHA</th>" +
						"<th ></th>" +
						"</tr>";
					$("#TableDocEditar thead").append(tr_head);
					for (var i = 0; i < count; i++) {
						var idDoc = newData[i].id_doc;
						var id = newData[i].cor_id;
						var original = newData[i].name_document_original;
						var enc = newData[i].name_document_encript;
						var fecha = newData[i].fecha;
						var dependencia = newData[i].cor_institucion;
						newcount = i + 1;
						var tr_str = "<tr>" +
							"<td style=' text-align: center;'>" + newcount + "</td>" +
							"<td ><a href='<?= base_url() ?>assets/upload/documents/" + enc + "' style='color: #fff;background-color: #007bff;border-color: #007bff;padding: .25rem .5rem;font-size: .575rem;line-height: 1.5;border-radius: .2rem;' target='_blank'><i class='fa fa-eye'></i> " + original + "</a></td>" +
							"<td >" + dependencia + "</td>" +
							"<td >" + fecha + "</td>" +
							"<td align='center'><button type='button'  style='color: #fff;background-color: #dc3545;border-color: #e83e8c;padding: .25rem .5rem;font-size: .775rem;line-height: 1.5;border-radius: .2rem;'  onclick='BorrarFile(" + idDoc + ")'  >Eliminar</button></td>" +
							"</tr>";
						$("#TableDocEditar tbody").append(tr_str);
					}
				} else {
					var tr_str = "<tr>" +
						"<td style=' text-align: center;'>NO TIENE ARCHIVOS</td>" +

						"</tr>";
					$("#TableDocEditar tbody").append(tr_str);
					$("#NuevoArchivo").prop('disabled', false);
				}
			}
		});
	}


///////////////////////////////////////

	function BorrarFile(cod) {
		$.ajax({
			url: "<?= site_url('secretaryControl/DeleteFile') ?>/" + cod,
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(dataa) {
				Swal.fire({
					type: 'success',
					title: 'Archivo Eliminado Exitosamente',
					showConfirmButton: false,
					timer: 2500
				});
				VerArchivosEditar(cod);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				Swal.fire({
					type: 'error',
					title: 'Error con el servidor con el Processo Eliminar, Vuelva a Intentarlo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {
				HojaRutaActiva.ajax.reload(null, false);
			}
		});

	}

	</script>