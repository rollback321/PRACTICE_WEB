<script>
	$(function() {
		CargarTema();
		CargarCalendarioRegistro();
	});

	var cadenaDescripcion = "";
	var cadenaDescripcion_edit = "";

	function CargarCalendarioRegistro() {
		$("#colFormLabelSmRegister").empty();
		<?php
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i", $time);
		?>
		//$("#colFormLabelSmRegister").val(moment().format("YYYY-MM-DDTHH:mm"));
		$("#colFormLabelSmRegister").val(moment(new Date(), 'America/La_Paz').format("YYYY-MM-DDTHH:mm"));
	}
	//	DiviCheck = document.getElementById('DivCheck');
	$("#load_register_edit").hide();
	$("#load_register").hide();
	$('#load_register_niveles').hide();
	$('#load_derive_multiple').hide();

	$('#load_derive_internal').hide();
	$('#load_derive_hoja').hide();

	$('#div_select_nivel_1Externa').hide();
	$('#div_select_nivel_2Externa').hide();
	$('#div_select_nivel_3Externa').hide();
	$('#load_register_external').hide();

	$('#div_select_nivel_111').hide();
	$('#div_select_nivel_222').hide();
	$('#div_select_nivel_333').hide();
	$('#div_select_nivel_1').hide();
	$('#div_select_nivel_2').hide();
	$('#div_select_nivel_3').hide();
	$('#load_viewEyeRoute').hide();
	//////////////////////SELECCION DE PROVEIDO/////////////////
	$('select#select_proveidoMultiple').on('change', function() {
		$('#a_provMultiple').val($(this).find(":selected").text() + ' ');
		$('#a_provMultiple').focus();
		$('#select_proveidoMultiple').val($('#select_proveidoMultiple > option:first').val());
	});
	$('select#select_rubro').on('change', function() {
		cadenaDescripcion = document.getElementById('descrip_doc').value;
		var valorSelect = document.getElementById('select_rubro').value;
		$('#descrip_doc').text(cadenaDescripcion + " " + valorSelect + "-");
		$('#select_rubro').val($('#select_rubro > option:first').val());
	});
	$('select#select_rubro_edit').on('change', function() {
		cadenaDescripcion_edit = document.getElementById('descrip_doc_edit').value;
		var valorSelectEdit = document.getElementById('select_rubro_edit').value;
		$('#descrip_doc_edit').val(cadenaDescripcion_edit + " " + valorSelectEdit + "-");
		$('#select_rubro_edit').val($('#select_rubro_edit > option:first').val());
	});
	/////////////////////////////////////////////////////////////////
	function EnviarInputDes_nroTributario() {
		cadenaDescripcion = document.getElementById('descrip_doc').value;
		var valorTributario = document.getElementById('reg_tributario').value;
		$('#descrip_doc').text(cadenaDescripcion + " NRO REGISTRO TRIBUTARIO(" + valorTributario + ") -");
		$('#reg_tributario').val("");
	}

	function EnviarInputDes_nroTributario_edit() {
		cadenaDescripcion_edit = document.getElementById('descrip_doc_edit').value;
		var valorTributarioEdit = document.getElementById('reg_tributario_edit').value;
		$('#descrip_doc_edit').val(cadenaDescripcion_edit + " NRO REGISTRO TRIBUTARIO(" + valorTributarioEdit + ") -");
		$('#reg_tributario_edit').val("");
	}

	//////////////////////////////////////////////////////////////




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
					//VerCheckbox();
					$('.mailbox-messages input[type=\'checkbox\']').prop('checked', true);
					$('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square');
					DiviCheck.style.display = 'flex';
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
	});


	// function OcultarDivCheckbox() {
	// 	$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
	// 	$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
	// 	DiviCheck.style.display = 'none';
	// }

	function VerCheckbox() {
		var checkbox = document.getElementsByName('ckbox[]');
		console.log(checkbox);
		var ln = 0;
		for (var i = 0; i < checkbox.length; i++) {
			console.log(checkbox.length);
			if (checkbox[i].checked) {
				ln++;
				var Destino = document.getElementsByName('ckbox[]')[i].value;
				console.log('Valor ' + Destino);
				BuscarDestinoCheckBox(Destino);
			}
		}
		if (ln > 0) {
			DiviCheck.style.display = 'flex';
			DiviCheck.style.display = 'block';
		} else {
			$('.mailbox-messages input[type=\'checkbox\']').prop('checked', false);
			$('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square');
			DiviCheck.style.display = 'none';
		}
		console.log(ln);
	}
	$(function() {
		bsCustomFileInput.init();
		//Initialize Select2 Elements
		$('.select2').select2()
		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
	});






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
			error: function(xhr) {},
			complete: function() {},
		});
	}


	////////////////////////////////////
	$("#form_derivarHojaRutaMultiple").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("VentanillaUnicaControl/derivarHojaRutaInternaMultiple") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
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
				$('#form_derivarHojaRutaMultiple')[0].reset();
				$('#load_derive_multiple').hide();
				$('#form_derivarHojaRutaMultiple').show();
			},
			complete: function() {
				$('#form_derivarHojaRutaMultiple')[0].reset();
				$('#form_derivarHojaRutaMultiple').show();
				$('#load_derive_multiple').hide();
				$('#derivarHojaRutaMultiple').modal('hide');
				//	OcultarDivCheckbox();
			},
			dataType: 'html'
		});

	});
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

	$(function() {
		$('[name="nro_fojas"]').change(function() {
			if ($(this).is(':checked')) {
				$("#nro_cant_fojas").prop("disabled", false);
			} else {
				$("#nro_cant_fojas").prop("disabled", true);
			}
		});
		$('[name="nro_cd_dvd"]').change(function() {
			if ($(this).is(':checked')) {
				$("#nro_cant_cd_dvd").prop("disabled", false);
			} else {
				$("#nro_cant_cd_dvd").prop("disabled", true);
			}
		});
		$('[name="nro_cd_dvd"]').change(function() {
			if ($(this).is(':checked')) {
				$("#nro_cant_cd_dvd").prop("disabled", false);
			} else {
				$("#nro_cant_cd_dvd").prop("disabled", true);
			}
		});
		$('[name="sobres"]').change(function() {
			if ($(this).is(':checked')) {
				$("#sobres_cant").prop("disabled", false);
			} else {
				$("#sobres_cant").prop("disabled", true);
			}
		});
		$('[name="carpetas"]').change(function() {
			if ($(this).is(':checked')) {
				$("#carpetas_cant").prop("disabled", false);
			} else {
				$("#carpetas_cant").prop("disabled", true);
			}
		});
		$('[name="anillados"]').change(function() {
			if ($(this).is(':checked')) {
				$("#anillados_cant").prop("disabled", false);
			} else {
				$("#anillados_cant").prop("disabled", true);
			}
		});
		$('[name="nro_fojas_edit"]').change(function() {
			if ($(this).is(':checked')) {
				$("#nro_cant_fojas_edit").prop("disabled", false);
			} else {
				$("#nro_cant_fojas_edit").prop("disabled", true);
			}
		});
		$('[name="nro_cd_dvd_edit"]').change(function() {
			if ($(this).is(':checked')) {
				$("#nro_cant_cd_dvd_edit").prop("disabled", false);
			} else {
				$("#nro_cant_cd_dvd_edit").prop("disabled", true);
			}
		});
		$('[name="sobres_edit"]').change(function() {
			if ($(this).is(':checked')) {
				$("#sobres_cant_edit").prop("disabled", false);
			} else {
				$("#sobres_cant_edit").prop("disabled", true);
			}
		});
		$('[name="carpetas_edit"]').change(function() {
			if ($(this).is(':checked')) {
				$("#carpetas_cant_edit").prop("disabled", false);
			} else {
				$("#carpetas_cant_edit").prop("disabled", true);
			}
		});
		$('[name="anillados_edit"]').change(function() {
			if ($(this).is(':checked')) {
				$("#anillados_cant_edit").prop("disabled", false);
			} else {
				$("#anillados_cant_edit").prop("disabled", true);
			}
		});
	});

	function inicializarControlCheckInput(idcheck, estadoCheck, inputcantidad) {
		$(idcheck).prop("checked", (estadoCheck == true) ? true : false);
		if (estadoCheck == true) {
			$(inputcantidad).prop("disabled", false);
			$(inputcantidad).prop("required", true);
		} else {
			$(inputcantidad).prop("disabled", true);
			$(inputcantidad).val('');
		}
	}


	/*=============================================
      Section DATATABLE FORMULARIO HOJA DE RUTA
	=============================================*/
	HojaRutaActiva = $('#example1').DataTable({
		"ajax": "<?= site_url('ventanillaUnicaRecaudacionesControl/fetch_Corresp'); ?>",
		"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
		],
		"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
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
		"ajax": "<?= site_url('ventanillaUnicaRecaudacionesControl/fetch_CorrespProcess'); ?>",
		"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
		"ajax": "<?= site_url('ventanillaUnicaRecaudacionesControl/fetch_CorrespConcluded'); ?>",
		"ordering": true,
		"order": [
			[0, "desc"]
		],
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		"order": [
			[1, "desc"]
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
	/*=============================================
      Section CREAR HOJA DE RUTA FORMULARIO
	=============================================*/

	$("#form_crearHoja").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("ventanillaUnicaRecaudacionesControl/registrarHojaRuta") ?>",
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
				HojaRutaActiva.ajax.reload(null, false);
				//OcultarDivCheckbox();
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
				cadenaDescripcion = "";
				$("#descrip_doc").empty();
				
			},
			dataType: 'html'
		});
	});


	/*=============================================
	=        Section EDITAR FORMULARIO HOJA DE RUTA            =
	=============================================*/
	function listarDatosHojaRuta(cor_id, cod) {
		$(".cod_GAMEA").text(cod);
		VerArchivosEditar(cor_id);
		$.ajax({
			type: "GET",
			url: "<?= site_url('VentanillaUnicaControl/listarDatosHojaRuta') ?>/" + cor_id,
			dataType: "json",
			beforeSend: function() {
				$('#enviarHojaRutaEditado').prop('disabled', true);
				$('#form_editarHoja').hide();
				$('#load_register_editar').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj);
				$("#cite_edit").val(obj.cor_cite);
				$("#ref_edit").val(obj.cor_referencia);
				$("#descrip_doc_edit").val(obj.cor_descripcion);
				$("#obs_doc_edit").val(obj.cor_observacion);
				$("#nombre_remitente_edit").val(obj.cor_nombre_remitente);
				$("#cargo_remitente_edit").val(obj.cor_cargo_remitente);
				$("#institucion_remitente_edit").val(obj.cor_institucion);
				$("#nro_contacto_edit").val(obj.cor_tel_remitente);
				$("#colFormLabelSmFecha_edit").val(moment(obj.rec_fecha_recep).format("YYYY-MM-DDTHH:mm:ss"));
				$("#nro_cant_fojas_edit").val(obj.rec_cant_fojas);
				inicializarControlCheckInput("#nro_fojas_edit", obj.rec_doc_nro_fojas, "#nro_cant_fojas_edit");
				$("#nro_cant_cd_dvd_edit").val(obj.rec_cant_cd_dvd);
				inicializarControlCheckInput("#nro_cd_dvd_edit", obj.rec_cd_dvd, "#nro_cant_cd_dvd_edit");
				$("#sobres_cant_edit").val(obj.rec_cant_sobres);
				inicializarControlCheckInput("#sobres_edit", obj.rec_sobres, "#sobres_cant_edit");
				$("#carpetas_cant_edit").val(obj.rec_cant_carpetas);
				inicializarControlCheckInput("#carpetas_edit", obj.rec_carpetas, "#carpetas_cant_edit");
				$("#anillados_cant_edit").val(obj.rec_cant_anillados);
				inicializarControlCheckInput("#anillados_edit", obj.rec_anillados, "#anillados_cant_edit");
				$("#varcor_id").val(obj.cor_id);
				$("#varrec_doc_id").val(obj.rec_doc_id);
				$("#rdo_urgente").attr('checked', (obj.cor_nivel == "U" ? true : false));
				$("#rdo_prioritario").attr('checked', (obj.cor_nivel == "P" ? true : false));
				$("#rdo_rutinario").attr('checked', (obj.cor_nivel == "R" ? true : false));
				$("#Fecha_plazoCorrespondencia_Edit").val(obj.cor_plazo);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#enviarHojaRutaEditado').prop('disabled', false);
				$('#form_editarHoja')[0].reset();
				$('#load_register_editar').hide();
				$('#form_editarHoja').hide();
			},
			complete: function() {
				$('#enviarHojaRutaEditado').prop('disabled', false);
				$('#form_editarHoja').show();
				$('#load_register_editar').hide();
			},
			dataType: 'html'
		});
	}

	$("#form_editarHoja").submit(function(e) {
		e.preventDefault();
		var formData = new FormData($("#form_editarHoja")[0]);
		$.ajax({
			type: 'POST',
			url: "<?= site_url("ventanillaUnicaControl/modificarHojaRuta") ?>",
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function() {
				$('#enviarHojaRutaEditado').prop('disabled', true);
				$('#form_editarHoja').hide();
				$('#load_register_editar').show();
			},
			success: function(data) {
				Swal.fire({
					type: 'success',
					title: data,
					showConfirmButton: false,
					timer: 2500
				});
				HojaRutaActiva.ajax.reload(null, false);
				console.log(data);
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#enviarHojaRutaEditado').prop('disabled', false);
				$('#form_editarHoja')[0].reset();
				$('#load_register_editar').hide();
				$('#form_editarHoja').hide();
			},
			complete: function() {
				$('#form_editarHoja')[0].reset();
				$('#enviarHojaRutaEditado').prop('disabled', false);
				$('#form_editarHoja').show();
				$('#load_register_editar').hide();
				$('#editarHojaRuta').modal('hide');
				//OcultarDivCheckbox();
			},
			dataType: 'html'
		});
	});



	/*===== End of Section EDITAR FORMULARIO  ====*/

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
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}



	/*=============================================
	      Section DERIVAR HOJA DE RUTA EXTERNA
		=============================================*/
	function derivarHojaRutaExterna(cor_id, cod) {
		limpiarControlesVentanilla();
		$(".cod_GAMEAExterna").text(cod);
		$("#cor_id").val(cor_id);
		$("#codigo_Externa").val(cod);
		$('#div_select_nivel_3Externa').hide();
		var nivel1 = '<?= $this->session->userdata('rol_niv_1') ?>';
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';
		var nivel3 = '<?= $this->session->userdata('rol__niv_3') ?>';

		if (nivel2.length === 0 && nivel3.length == 0) {
			$('#div_select_nivel_1Externa').show();
			$.ajax({
				url: "<?php echo site_url('secretaryControl/dependencyListLevel_1') ?>/",
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].niv1_id + '">';
						content += obj[i].niv1_nombre;
						content += '</option>';
					}
					$('#select_nivel_1Externa').html(content);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},

				dataType: 'html'
			});
		} else {
			if (nivel2.length != 0 && nivel3.length == 0) {
				$('#div_select_nivel_1Externa').hide();
				$('#div_select_nivel_2Externa').show();
				$.ajax({
					url: "<?php echo site_url('secretaryControl/dependencyListLevel_2_ID') ?>/",
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						var nuevoArray_n1 = obj.data_n1;
						var nuevoArray_n2 = obj.data_n2;
						var content_n1 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n1.length; i++) {
							content_n1 += '<option value="' + nuevoArray_n1[i].niv1_id + '">';
							content_n1 += nuevoArray_n1[i].niv1_nombre;
							content_n1 += '</option>';
						}
						$('#select_nivel_1Externa').html(content_n1);

						var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n2.length; i++) {
							content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
							content_n2 += nuevoArray_n2[i].niv2_nombre;
							content_n2 += '</option>';
						}
						$('#select_nivel_2Externa').html(content_n2);
					},
					error: function(xhr) {
						Swal.fire({
							type: 'error',
							title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
							showConfirmButton: false,
							timer: 2500
						});
					},

					dataType: 'html'
				});
			} else {
				$('#div_select_nivel_2Externa').show();
				$('#div_select_nivel_3Externa').show();
				$.ajax({
					url: "<?php echo site_url('secretaryControl/dependencyListLevel_3_ID') ?>/",
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						var nuevoArray_n2 = obj.data_n2;
						var nuevoArray_n3 = obj.data_n3;

						var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n2.length; i++) {
							content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
							content_n2 += nuevoArray_n2[i].niv2_nombre;
							content_n2 += '</option>';
						}
						$('#select_nivel_2Externa').html(content_n2);

						var content_n3 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n3.length; i++) {
							content_n3 += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
							content_n3 += nuevoArray_n3[i].niv3_nombre;
							content_n3 += '</option>';
						}
						$('#select_nivel_3Externa').html(content_n3);
					},
					error: function(xhr) {
						Swal.fire({
							type: 'error',
							title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
							showConfirmButton: false,
							timer: 2500
						});
					},

					dataType: 'html'
				});
			}
		}

	}

	$('#select_nivel_1Externa').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv1_id = optionSelected.val();
		var niv1_nombre = optionSelected.text();

		var nivel1 = '<?= $this->session->userdata('rol_niv_1') ?>';

		if (niv1_id == nivel1) {
			$.ajax({
				url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_1') ?>/" + niv1_id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
						content += '</option>';
					}
					$('#list_usuarios').html(content);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},
				dataType: 'html'

			});
			$('#div_select_nivel_2Externa').show();
			$.ajax({
				url: "<?php echo site_url('secretaryControl/dependencyListLevel_2_ID') ?>/",
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					var nuevoArray_n2 = obj.data_n2;
					var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
					for (var i = 0; i < nuevoArray_n2.length; i++) {
						content += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
						content += nuevoArray_n2[i].niv2_nombre;
						content += '</option>';
					}
					$('#select_nivel_2Externa').html(content);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},

				dataType: 'html'
			});
			$('#div_select_nivel_3Externa').hide();
		} else {
			$('#div_select_nivel_2Externa').hide();
			$.ajax({
				url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_1') ?>/" + niv1_id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
						content += '</option>';
					}
					$('#list_usuarios').html(content);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},
				dataType: 'html'
			});
		}


	});
	$('#select_nivel_2Externa').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv2_id = optionSelected.val();
		var niv2_nombre = optionSelected.text();
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';

		if (optionSelected.val() == 0) {
			//limpiar controles
			limpiarControles();
		} else {
			if (niv2_id == nivel2) {
				$.ajax({
					url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_2') ?>/" + niv2_id,
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);

						if (obj == '')
							var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
						else
							var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
						for (var i = 0; i < obj.length; i++) {
							content += '<option value="' + obj[i].usu_rol_id + '">';
							content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
							content += '</option>';
						}
						$('#list_usuarios').html(content);
					},
					error: function(xhr) {
						Swal.fire({
							type: 'error',
							title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
							showConfirmButton: false,
							timer: 2500
						});
					},
					dataType: 'html'
				});
				$('#div_select_nivel_3Externa').show();
				$.ajax({
					url: "<?php echo site_url('secretaryControl/dependencyListLevel_3_ID') ?>/",
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						var nuevoArray_n3 = obj.data_n3;
						var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n3.length; i++) {
							content += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
							content += nuevoArray_n3[i].niv3_nombre;
							content += '</option>';
						}
						$('#select_nivel_3Externa').html(content);
					},
					error: function(xhr) {
						Swal.fire({
							type: 'error',
							title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
							showConfirmButton: false,
							timer: 2500
						});
					},
					dataType: 'html'
				});
			} else {
				$('#div_select_nivel_3Externa').hide();
				$.ajax({
					url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_2') ?>/" + niv2_id,
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						var obj = JSON.parse(data);
						if (obj == '')
							var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
						else
							var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
						for (var i = 0; i < obj.length; i++) {
							content += '<option value="' + obj[i].usu_rol_id + '">';
							content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
							content += '</option>';
						}
						$('#list_usuarios').html(content);
					},
					error: function(xhr) {
						Swal.fire({
							type: 'error',
							title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
							showConfirmButton: false,
							timer: 2500
						});
					},

					dataType: 'html'
				});
			}
		}
	});
	$('#select_nivel_3Externa').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv3_id = optionSelected.val();
		var niv3_nombre = optionSelected.text();

		if (optionSelected.val() == 0) {
			//limpiar controles
			limpiarControles();
		} else {
			$.ajax({
				url: "<?php echo site_url('secretaryControl/listUsersReceptionistLevel_3') ?>/" + niv3_id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos;
						content += '</option>';
					}
					$('#list_usuarios').html(content);
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
						showConfirmButton: false,
						timer: 2500
					});
				},

				dataType: 'html'
			});
		}
	});
	$("#form_derivarHojaRutaExterna").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/derivarHojaRutaExterna") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#submitDeriveExternal').prop('disabled', true);
				$('#form_derivarHojaRutaExterna').hide();
				$('#load_register_external').show();
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
					title: 'Existe un Error, vuelta Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#submitDeriveExternal').prop('disabled', false);
				$('#form_derivarHojaRutaExterna')[0].reset();
				$('#load_register_external').hide();
				$('#form_derivarHojaRutaExterna').hide();
			},
			complete: function() {
				$('#form_derivarHojaRutaExterna')[0].reset();
				$('#submitDeriveExternal').prop('disabled', false);
				$('#form_derivarHojaRutaExterna').show();
				$('#load_register_external').hide();
				$('#derivarHojaRutaExterna').modal('hide');
				//OcultarDivCheckbox();
			},
			dataType: 'html'
		});
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
			url: "<?= site_url("VentanillaUnicaControl/DatosCorrespondencia") ?>",
			data: {
				cor_id: cor_id
			},
			beforeSend: function() {
				$('#load_viewEyeRoute').show();
			},
			success: function(data) {
				var obj = jQuery.parseJSON(data);
				console.log(obj[0]);
				$('#reference').val(obj[0].cor_referencia);
				$('#description').val(obj[0].cor_descripcion);
				$('#observation').val(obj[0].cor_observacion);
				$('#remitente_nombre').val(obj[0].cor_nombre_remitente);
				$('#remitente_cargo').val(obj[0].cor_cargo_remitente);
				$('#remitente_institucion').val(obj[0].cor_institucion);
				$('#remitente_telefono').val(obj[0].cor_tel_remitente);
				$('#d_fojas').val(obj[0].rec_cant_fojas);
				$('#d_cd').val(obj[0].rec_cant_cd_dvd);
				$('#d_sobres').val(obj[0].rec_cant_sobres);
				$('#d_carpeta').val(obj[0].rec_cant_carpetas);
				$('#d_anillado').val(obj[0].rec_cant_anillados);
				$('#citeView').val(obj[0].cor_cite);
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
	//////////////////////////////////

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
					Swal.fire({
						type: 'error',
						title: 'No tiene Archivos',
						showConfirmButton: false,
						timer: 2500
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

	///////////////////////////////////////////////////////////////////////
	//Limpiar campos Formulario VentanillaUnica
	function limpiarControlesVentanilla() {
		$('select#select_nivel_2 option[value="0"]').prop('selected', true);
		$('select#select_nivel_3 option[value="0"]').prop('selected', true);
		$("select#list_usuarios option").each(function() {
			$(this).remove();
		});
	}
	/////////////////////////////////////////////////////////////////////
	function limpiarControlesVentanillaEditar() {
		$('select#select_nivel_22 option[value="0"]').prop('selected', true);
		$('select#select_nivel_33 option[value="0"]').prop('selected', true);
		$("select#list_usuariosss option").each(function() {
			$(this).remove();
		});
	}
	////////////////////////////////////////////////////////////////////////////////
	function limpiarTable() {
		$(`#TableDocDerivar thead`).empty();
		$(`#TableDocDerivar tbody`).empty();
	}
	/////////////////////////////////////////////////////////
	function resetDropZone() {
		myDropzone.removeAllFiles(true);
		CargarCalendarioRegistro();
	}
</script>
</body>

</html>