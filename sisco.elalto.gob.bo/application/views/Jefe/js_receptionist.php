
<script>
	DiviCheck = document.getElementById('DivCheck');
	$("#load_register_edit").hide();
	$('#load_register_niveles').hide();
	$('#load_derive_multiple').hide();
	$('#load_viewEyeRoute').hide();
	$("#load_derive_internal").hide();
	$(function() {
		CargarTema();
		bsCustomFileInput.init();
	});
	$(function() {
		//Enable check and uncheck all functionality
		$('.checkbox-toggle').click(function() {
			var clicks = $(this).data('clicks')
			if (clicks) {
				//Uncheck all checkboxes
				$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
				$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
				DiviCheck.style.display = 'none';
			} else {
				if (!HojaRutaActiva.data().any()) {
					Swal.fire({
						type: 'warning',
						title: 'Para la Derivacion Multiple, Seleccione Hojas de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					//Check all checkboxes
					$('.mailbox-messages input[type=\'checkbox\']').prop('checked', true);
					$('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square');
					DiviCheck.style.display = 'block';
				}
			}
			$(this).data('clicks', !clicks)
		})
		//Handle starring for font awesome
		$('.mailbox-star').click(function(e) {
			e.preventDefault()
			//detect type
			var $this = $(this).find('a > i')
			var fa = $this.hasClass('fa')
			//Switch states
			if (fa) {
				$this.toggleClass('fa-star')
				$this.toggleClass('fa-star-o')
			}
		})
		//////////////////////SELECCION DE PROVEIDO/////////////////
		$('select#select_proveidoMultiple').on('change', function() {
			$('#a_provMultiple').val($(this).find(":selected").text() + ' ');
			$('#a_provMultiple').focus();
			$('#select_proveidoMultiple').val($('#select_proveidoMultiple > option:first').val());
		});
		$('select#select_proveidoDerivar').on('change', function() {
			$('#a_provInterno').val($(this).find(":selected").text() + ' ');
			$('#a_provInterno').focus();
			$('#select_proveidoDerivar').val($('#select_proveidoDerivar > option:first').val());
		});
		//////////////////////////////////////////////////////////////
	});

	function OcultarDivCheckbox() {
		$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
		$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
		DiviCheck.style.display = 'none';

	}

	function VerCheckbox() {
		var checkbox = document.getElementsByName('ckbox[]');
		var ln = 0;
		for (var i = 0; i < checkbox.length; i++) {
			if (checkbox[i].checked)
				ln++
		}
		if (ln > 0) {
			DiviCheck.style.display = 'flex';
			DiviCheck.style.display = 'block';
		} else {
			OcultarDivCheckbox();
		}
		console.log(ln);

	}

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
	////////////////////////////////////

	$("#form_derivarHojaRutaMultipleInterna").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/derivarHojaRutaInternaMultiple") ?>",
			// dataType: "JSON",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_derive_multiple').show();
				$('#form_derivarHojaRutaMultipleInterna').hide();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				HojaRutaActiva.ajax.reload(null, false);
				HojaRutaActivaProccess.ajax.reload(null, false);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#form_derivarHojaRutaMultipleInterna')[0].reset();
				$('#load_derive_multiple').hide();
				$('#form_derivarHojaRutaMultipleInterna').show();
			},
			complete: function() {
				$('#form_derivarHojaRutaMultipleInterna')[0].reset();
				$('#form_derivarHojaRutaMultipleInterna').show();
				$('#load_derive_multiple').hide();
				$('#derivarHojaRutaMultiple').modal('hide');
				OcultarDivCheckbox();
			},
			dataType: 'html'
		});

	});
	//////////////////////////////////

	/*=============================================
      Section SUBIR ARCHVOS
	=============================================*/
	// DropzoneJS Demo Code Start
	Dropzone.autoDiscover = false
	// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
	var previewNode = document.querySelector("#template")
	previewNode.id = ""
	var previewTemplate = previewNode.parentNode.innerHTML
	previewNode.parentNode.removeChild(previewNode)
	//////////////////////////1er DROPZONE/////////////////////
	var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
		url: "<?= site_url("SecretaryControl/fileUpload") ?>", // Set the url
		maxFiles: 1,
		maxFilesize: 2,
		thumbnailWidth: 80,
		thumbnailHeight: 80,
		parallelUploads: 20,
		acceptedFiles: "application/pdf",
		previewTemplate: previewTemplate,
		autoQueue: false, // Make sure the files aren't queued until manually added
		previewsContainer: "#previews", // Define the container to display the previews
		clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
	})
	myDropzone.on("addedfile", function(file) {
		// Hookup the start button
		file.previewElement.querySelector(".start").onclick = function() {
			myDropzone.enqueueFile(file)
		}
	})
	// Update the total progress bar
	myDropzone.on("totaluploadprogress", function(progress) {
		document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
	})
	myDropzone.on("sending", function(file) {
		// Show the total progress bar when upload starts
		document.querySelector("#total-progress").style.opacity = "1"
		// And disable the start button
		file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
	})
	// Hide the total progress bar when nothing's uploading anymore
	myDropzone.on("queuecomplete", function(progress) {
		document.querySelector("#total-progress").style.opacity = "0"
	})
	// Setup the buttons for all transfers
	// The "add files" button doesn't need to be setup because the config
	// `clickable` has already been specified.
	document.querySelector("#actions .start").onclick = function() {
		myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
	}
	document.querySelector("#actions .cancel").onclick = function() {
		myDropzone.removeAllFiles(true)
	}
	// DropzoneJS Demo Code End	

	/*=============================================
      Section DATATABLE FORMULARIO HOJA DE RUTA
	=============================================*/
	HojaRutaActiva = $('#example1').DataTable({
		"ajax": "<?= site_url('TechnicalControl/fetch_Corresp'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[0, "asc"]
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});
	HojaRutaActivaProccess = $('#example2').DataTable({
		"ajax": "<?= site_url('TechnicalControl/fetch_CorrespProcess'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[0, "asc"]
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});
	HojaRutaActivaConcluded = $('#example3').DataTable({
		"ajax": "<?= site_url('TechnicalControl/fetch_CorrespConcluded'); ?>",
		"ordering": true,
		"order": [
			[0, "asc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[0, "asc"]
		],
		language: {
			"decimal": "",
			"emptyTable": "No hay información",
			"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
			"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
			"infoFiltered": "(Filtrado de _MAX_ total entradas)",
			"infoPostFix": "",
			"thousands": ",",
			"lengthMenu": "Mostrar _MENU_ Entradas",
			"loadingRecords": "Cargando...",
			"processing": "Procesando...",
			"search": "Buscar:",
			"zeroRecords": "Sin resultados encontrados",
			"paginate": {
				"first": "Primero",
				"last": "Ultimo",
				"next": "Siguiente",
				"previous": "Anterior"
			}
		}
	});

	/*==================================================
	=     Section EDITAR FORMULARIO HOJA DE RUTA       =
	==================================================*/
	function listarDatosHojaRuta(cor_id, cod) {
		$(".cod_GAMEA").text(cod);
		limpiarCamposHDR();
		VerArchivosEditar(cor_id);
		$.ajax({
			type: "GET",
			url: "<?= site_url('SecretaryControl/listarDatosHojaRuta') ?>/" + cor_id,
			dataType: "json",
			beforeSend: function() {
				$('#enviarHojaRuta_edit').prop('disabled', true);
				$('#form_editarHoja').hide();
				$('#load_register_edit').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				$('#id_cor').val(obj.cor_id);
				$("#cite_edit").val(obj.cor_cite);
				$("#ref_edit").val(obj.cor_referencia);
				$("#descrip_doc_edit").val(obj.cor_descripcion);
				$("#obs_doc_edit").val(obj.cor_observacion);
				$("#nro_contacto_edit").val(obj.cor_tel_remitente);
				$("#rdo_urgente").attr('checked', (obj.cor_nivel == 'U' ? true : false));
				$("#rdo_prioritario").attr('checked', (obj.cor_nivel == 'P' ? true : false));
				$("#rdo_rutinario").attr('checked', (obj.cor_nivel == 'R' ? true : false));
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#enviarHojaRuta_edit').prop('disabled', false);
				$('#form_editarHoja')[0].reset();
				$('#load_register_edit').hide();
				$('#form_editarHoja').hide();
			},
			complete: function() {
				$('#enviarHojaRuta_edit').prop('disabled', false);
				$('#form_editarHoja').show();
				$('#load_register_edit').hide();
			},
			dataType: 'html'
		});
	}
	$('#form_editarHoja').submit(function(e) {
		e.preventDefault();
		if ($('.secretary_edit #form_editarHoja').valid()) {
			var formData = new FormData($("#form_editarHoja")[0]);
			$.ajax({
				type: 'POST',
				url: '<?= site_url("secretaryControl/modificarDatosHojaRuta") ?>',
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$('#enviarHojaRuta_edit').prop('disabled', true);
					$('#form_editarHoja').hide();
					$('#load_register_edit').show();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					HojaRutaActiva.ajax.reload(null, false);

				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor',
						showConfirmButton: false,
						timer: 2500
					});
					HojaRutaActiva.ajax.reload(null, false);
					$('#enviarHojaRuta_edit').prop('disabled', false);
					$('#form_editarHoja')[0].reset();
					$('#load_register_edit').hide();
					$('#form_editarHoja').hide();
				},
				complete: function() {
					$('#form_editarHoja')[0].reset();
					$('#enviarHojaRuta_edit').prop('disabled', false);
					$('#form_editarHoja').show();
					$('#load_register_edit').hide();
					$('#editarHojaRuta').modal('hide');
				},
				dataType: 'html'
			});
		}
	});


	/////////////////////////////////////////////////////////
	/*=============================================
  		FUNCTION VER HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	function viewFile(cor_id, codigo) {
		$('.modal-body').hide();
		$('#viewEyeRouteTitle').text(codigo);
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/Correspondencia") ?>",
			data: {
				cor_id: cor_id
			},
			beforeSend: function() {
				$('#load_viewEyeRoute').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj[0]);
				$('#cite').val(obj[0].cor_cite);
				$('#reference').val(obj[0].cor_referencia);
				$('#description').val(obj[0].cor_descripcion);
				$('#observation').val(obj[0].cor_observacion);
				$('#remitente').val(obj[0].cor_nombre_remitente);
				$('#cargo_remitenteV').val(obj[0].cor_cargo_remitente);
				$('#inst_remitente').val(obj[0].cor_institucion);
				$('#tel_remitente').val(obj[0].cor_tel_remitente);
				$('.modal-body').show();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#load_viewEyeRoute').hide();
			},
			complete: function() {
				$('#load_viewEyeRoute').hide();
			},
			dataType: 'html'
		});
	}

	/*=============================================
      Section CREAR HOJA DE RUTA FORMULARIO
	=============================================*/
	$("#load_register").hide();
	$("#form_crearHoja").submit(function(e) {
		e.preventDefault();
		if ($("#form_crearHoja").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("SecretaryControl/registrarHojaRuta") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#enviarHojaRuta').prop('disabled', true);
					$('#form_crearHoja').hide();
					$('#load_register').show();
					myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
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
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
					$('#enviarHojaRuta').prop('disabled', false);
					$('#form_crearHoja')[0].reset();
					$('#load_register').hide();
					$('#form_crearHoja').show();
				},
				complete: function() {
					$('#form_crearHoja')[0].reset();
					$('#enviarHojaRuta').prop('disabled', false);
					$('#form_crearHoja').show();
					$('#load_register').hide();
					$('#CrearHojaRuta').modal('hide');
					HojaRutaActiva.ajax.reload(null, false);
				},
				dataType: 'html'
			});
		}

	});

	/*=============================================
      Section DERIVAR HOJA DE RUTA INTERNA
	=============================================*/
	function derivarHojaRutaInterna(cor_id, cod) {
		limpiarControlesIn();
		$(".cod_GAMEA").text(cod);
		$('#cor_id_interno').val(cor_id);
		$('#codigo_interno').val(cod);
		VerArchivosDerivar(cor_id);
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
				$('#usuInterno_id').html(content);
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

	$(".secretary #form_derivarHojaRutainterna").submit(function(e) {
		e.preventDefault();

		if ($(".secretary #form_derivarHojaRutainterna").valid()) {
			$.ajax({
				type: 'POST',
				url: "<?= site_url("SecretaryControl/derivarHojaRutaInterna") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#submitDeriveInternal').prop('disabled', true);
					$('#form_derivarHojaRutainterna').hide();
					$('#load_derive_internal').show();
				},
				success: function(data) {
					Swal.fire({
						type: 'success',
						title: data,
						showConfirmButton: false,
						timer: 2500
					});
					HojaRutaActivaProccess.ajax.reload(null, false);
					HojaRutaActiva.ajax.reload(null, false);
				},
				error: function(xhr) {
					Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
					$('#submitDeriveInternal').prop('disabled', false);
					$('#form_derivarHojaRutainterna')[0].reset();
					$('#load_derive_internal').hide();
					$('#form_derivarHojaRutainterna').show();
				},
				complete: function() {
					$('#form_derivarHojaRutainterna')[0].reset();
					$('#submitDeriveInternal').prop('disabled', false);
					$('#form_derivarHojaRutainterna').show();
					$('#load_derive_internal').hide();
					$('#derivarHojaRutaInterna').modal('hide');
				},
				dataType: 'html'
			});
		}

	});


	function resetDropZone() {
		myDropzone.removeAllFiles(true);
	}

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
				//var obj = jQuery.parseJSON(data);
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
						var tr_str = "<tr style='text-align: center;'>" +
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

	function limpiarTable() {
		$(`#TableDoc thead`).empty();
		$(`#TableDoc tbody`).empty();
		$(`#TableDocDerivar thead`).empty();
		$(`#TableDocDerivar tbody`).empty();
	}
	//////////////////////////////////
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
				alert('Error con el servidor con el Processo Eliminar, Vuelva a Intentarlo');
			},
			complete: function() {
				HojaRutaActiva.ajax.reload(null, false);
			}
		});

	}

	function CambiarPas() {
		$('#load_cambiarpass').hide();
		$('#modal_cambiarpass').modal('show');
		$.ajax({
			url: "<?= site_url("secretaryControl/CambiarPass") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_cambiarpass').show();
			},
			success: function(data) {
				$('#load_cambiarpass').hide();
				$('#modal_cambiarpass').modal('hide');
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$('#modal_cambiarpass').modal('hide');
				alert('Error con el servidor 55');
			},
			complete: function() {
				$('#load_cambiarpass').hide();
				$('#VerArchivos').modal('hide');
				$('#form_cambiarpass')[0].reset();

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

	$('#btnCrearhojaderuta').on('click', function() {
		limpiarCamposHDR();
	});
</script>
</body>

</html>