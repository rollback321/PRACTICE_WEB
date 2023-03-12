<script>
	$('#load_ViewHistorial').hide();

	$(function() {
		CargarTema();
		divBuscador = document.getElementById('primercontenedor');
		div2 = document.getElementById('divSearch');
		div3 = document.getElementById('titulo');
		div4 = document.getElementById('segundocontenedor');
		//div5 = document.getElementById('titulo');
		div6 = document.getElementById('tituloprincipal');
		div7 = document.getElementById('titulosegundario');
		div3.style.display = 'none';
		//div7.style.display = 'none';
	});
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()
		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
		//Money Euro
		$('[data-mask]').inputmask()
		//Date picker
		$('#reservationdate').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		//Date picker
		$('#reservationdate2').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		//Date and time picker
		$('#reservationdatetime').datetimepicker({
			icons: {
				time: 'far fa-clock'
			}
		});
	})

	

	//var gblarray_reporteCabecera = '';
	var gblarray_reporte = [];

	/*=============================================
      CAMBIAR PASSWORD USUARIOS
	=============================================*/


	$("#form_Buscar").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/SearchCorrespondencia") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#search').prop('disabled', true);
			},
			success: function(data) {

				console.log(data);
				var obj = jQuery.parseJSON(data);
				var nuevoArray_n1 = obj.data_n1;
				var nuevoArray_n2 = obj.data_n2;
				var nuevoArray_n3 = obj.data_n3;
				var nuevoArray_n4 = obj.data_n4;
				var count = Object.keys(nuevoArray_n1).length;
				var estadoOriginal = "";
				var id_concluOriginal = 0;
				var countCopiasEstadoOriginal = Object.keys(nuevoArray_n4).length;
				console.log(nuevoArray_n1);
				console.log(nuevoArray_n2);
				console.log(nuevoArray_n3);
				console.log(nuevoArray_n4);
				//	console.log(count);

				$('#divSearch').empty();
				if (nuevoArray_n1 == null || nuevoArray_n1 == "" || nuevoArray_n1 == 0) {
					DatosVacios();
					Swal.fire({
						type: 'error',
						title: 'No se encontro ',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					if (nuevoArray_n1.cor_estado == 1) {
						estadoOriginal = "INICIADO";
						id_concluOriginal = 0;
					}
					if (nuevoArray_n1.cor_estado == 2) {
						estadoOriginal = "EN PROCESO";
						id_concluOriginal = 0;
					}
					if (nuevoArray_n1.cor_estado == 3) {

						for (var a = 0; a < countCopiasEstadoOriginal; a++) {
							if ("O" == nuevoArray_n4[a].origen) {
								console.log(nuevoArray_n4[a].nro_copia);
								if (nuevoArray_n4[a].conclu_estado == 1) {
									estadoOriginal = "CONCLUIDO";
									id_concluOriginal = nuevoArray_n4[a].conclu_id;
									a = countCopiasEstadoOriginal;
								}
							} else {
								estadoOriginal = "EN PROCESO";
								id_concluOriginal = 0;
							}
						}

					}
					//----------- PARA MOSTRAR VENTANILLA EXTERNA---------------
					if (nuevoArray_n2 == null || nuevoArray_n2 == "" || nuevoArray_n2 == 0) {
						var dependencia = nuevoArray_n1.cor_institucion;
						var servidor = nuevoArray_n1.cor_nombre_remitente;
						if (nuevoArray_n1.cor_estado == 1 && nuevoArray_n1.cor_tipo == 'E') {
							var dependencia = "VENTANILLA UNICA";
							var servidor = nuevoArray_n1.usu_nombres + " " + nuevoArray_n1.usu_apellidos;
						}
						var his_id = null;
						//----------- END  MOSTRAR VENTANILLA EXTERNA---------------
					} else {
						var dependencia = nuevoArray_n2.Condicion;
						var servidor = nuevoArray_n2.Servidor;
						var his_id = nuevoArray_n2.his_id;
					}
					MostrarOcultarDatosVacios()
					var etiqueta = '<br><span title="3 New Messages" class="badge bg-success " style="font-size: 10px;">GAMEA-' + nuevoArray_n1.cor_codigo + '-' + nuevoArray_n1.ges_gestion + '</span>';
					$('#divSearch').append('<div class=" col-sm-4 col-md-4 col-lg-3 col-xl-3"><div class="card card-secondary card-outline"><div class="card-header pt-1" style="height: 50px;text-align: center;"><span class="" style="font-size: 20px;"><i class="fas fa-file-invoice "></i><b>  ORIGINAL</b>' + etiqueta + '</span><span class="badge badge-danger" id="spancategoria"></span></div><div class="card-body p-1"><div class="row"><div class="col-md-4"><center><div class="widget-user-image "><img class="" src="<?= base_url() ?>assets/dist/img/plantilla/original.svg" width="70px" alt="User Avatar"></div></center></div><div class="col-md-8 "><b>UBICACION ACTUAL:</b><br><span style="font-size:12px; "><b>' + dependencia + '</b><br> <b style="color: #008000">' + estadoOriginal + '</b></span></div></div></div><div class="card-footer p-1"><button type="button" id="mostrar" class="btn btn-block btn-info p-1" onclick="listado(' + nuevoArray_n1.cor_id + ',' + his_id + ',' + nuevoArray_n1.ges_gestion + ',' + id_concluOriginal + ')">Mas Informacion<i class="fas fa-arrow-circle-right"></i></button></div></div></div>');
					//----------- PARA BUSCAR COPIAS---------------
					if (nuevoArray_n3 != null || nuevoArray_n3 != "" || nuevoArray_n3 != 0) {
						var countCopias = Object.keys(nuevoArray_n3).length;
						var countCopiasEstado = Object.keys(nuevoArray_n4).length;
						console.log(countCopias);
						console.log(countCopiasEstado);
						var estadoCopia = "";
						var id_conclu = 0;
						for (var w = 0; w < countCopias; w++) {

							var dependencia = nuevoArray_n3[w].Condicion;
							var servidor = nuevoArray_n3[w].Servidor;
							var his_id = nuevoArray_n3[w].his_id;
							var copia = nuevoArray_n3[w].nro_copia;


							for (var y = 0; y < countCopiasEstado; y++) {
								//	for (var z = 1; z <= countCopias; z++) {
								if (copia == nuevoArray_n4[y].nro_copia) {
									console.log(nuevoArray_n4[y].nro_copia);
									if (nuevoArray_n4[y].conclu_estado == 1) {
										estadoCopia = "CONCLUIDO";
										id_conclu = nuevoArray_n4[y].conclu_id;
										//	console.log("estado:"+nuevoArray_n4[y].conclu_estado);
										y = countCopiasEstado;
									}
								} else {
									estadoCopia = "EN PROCESO";
									id_conclu = 0;
								}
								//	}
							}

							var etiqueta = '<br><span title="3 New Messages" class="badge bg-success " style="font-size: 10px;">GAMEA-' + nuevoArray_n1.cor_codigo + '-' + nuevoArray_n1.ges_gestion + '</span>';
							$('#divSearch').append('<div class=" col-sm-4 col-md-4 col-lg-3 col-xl-3"><div class="card card-secondary card-outline"><div class="card-header pt-1" style="height: 50px;text-align: center;"><span class="" style="font-size: 20px;"><i class="fas fa-file-invoice "></i><b>  COPIA-' + copia + '</b>' + etiqueta + '</span><span class="badge badge-danger" id="spancategoria"></span></div><div class="card-body p-1"><div class="row"><div class="col-md-4"><center><div class="widget-user-image "><img class="" src="<?= base_url() ?>assets/dist/img/plantilla/original.svg" width="70px" alt="User Avatar"></div></center></div><div class="col-md-8 "><b>UBICACION ACTUAL:</b><br><span style="font-size:12px; "><b>' + dependencia + '</b><br> <b style="color: #008000">' + estadoCopia + '</b></span></div></div></div><div class="card-footer p-1"><button type="button" id="mostrar" class="btn btn-block btn-info p-1" onclick="listado(' + nuevoArray_n1.cor_id + ',' + his_id + ',' + nuevoArray_n1.ges_gestion + ',' + id_conclu + ')">Mas Informacion<i class="fas fa-arrow-circle-right"></i></button></div></div></div>');
						}
					}
					//----------- END BUSCAR COPIAS---------------
				}
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#search').prop('disabled', false);
				$('#form_Buscar')[0].reset();
			},
			complete: function() {
				$('#form_Buscar')[0].reset();
				$('#search').prop('disabled', false);
			},
			dataType: 'html'
		});
	});

	function DatosVacios() {
		$('#form_Buscar')[0].reset();
		$('#search').prop('disabled', false);
		divBuscador.style.display = 'block';
		div2.style.display = 'none';
		div3.style.display = 'none';
		div4.style.display = 'none';
		//div5.style.display = 'none';
		div6.style.display = 'block';
		//	div7.style.display = 'none';
	}

	function MostrarOcultarDatosVacios() {
		div2.style.display = 'block';
		div2.style.display = 'flex';
		div3.style.display = 'block';
		div4.style.display = 'none';
		//	div5.style.display = 'block';
	}

	function listado(cod, historial, gestion, conclu_id) {
		div2.style.display = 'none';
		div4.style.display = 'block';
		div3.style.display = 'none';
		div6.style.display = 'none';
		divBuscador.style.display = 'none';
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/SearchCorrespondenciaHistorialForConcluted") ?>/" + cod + "/" + historial + "/" + gestion + "/" + conclu_id,
			beforeSend: function() {},
			success: function(data) {
				console.log(data);
				var obj = jQuery.parseJSON(data);
				var nuevoArray_n1 = obj.data_n1;
				var nuevoArray_n2 = obj.data_n2;
				var nuevoArray_n3 = obj.data_n3;
				console.log(nuevoArray_n3);
				var origen = "";
				var buttonConcluir = "";
				var estado = "";
				var etiqueta = "<span title='3 New Messages' class='badge bg-success ' style='font-size: 70%;margin-bottom:5px;'>GAMEA-" + nuevoArray_n1.cor_codigo + "-" + nuevoArray_n1.ges_gestion + "</span>";


				if (conclu_id == 0) {
					estado = "EN PROCESO";
					buttonConcluir = "<br>";
				} else {
					estado = nuevoArray_n1.cor_estado == 1 ? "INICIADO" : nuevoArray_n1.cor_estado == 2 ? "EN PROCESO" : "EN PROCESO";
					buttonConcluir = nuevoArray_n1.cor_estado == 1 ? "<br>" : nuevoArray_n1.cor_estado == 2 ? "<br>" : "<br>";

					if (nuevoArray_n3 != null || nuevoArray_n3 != "" || nuevoArray_n3 != 0) {
						if (nuevoArray_n3[0].conclu_estado == 1) {
							//	console.log("estado de conclusion:" + nuevoArray_n3[0].conclu_estado);
							estado = "CONCLUIDO";
							buttonConcluir = "<button type='button' class='btn btn-block bg-gradient-info btn-sm' style='width:50%;margin-bottom:1rem;' onclick=ViewDatosConluir(" + nuevoArray_n2.cor_id + "," + nuevoArray_n2.his_id+ "," + conclu_id + ",'" + nuevoArray_n2.origen + "'," + nuevoArray_n2.nro_copia + ",'GAMEA-" + nuevoArray_n1.cor_codigo + "-" + nuevoArray_n1.ges_gestion + "')> <i class='fas fa-eye'></i> VER MAS DETALLES</button>";
						}
					}
				}

				//	console.log(estado);
				//	console.log(buttonConcluir);

				if (nuevoArray_n2 == null || nuevoArray_n2 == "" || nuevoArray_n2 == 0) {
					var dependencia = nuevoArray_n1.cor_institucion;
					var servidor = nuevoArray_n1.cor_nombre_remitente;
					var TelServidor = nuevoArray_n1.cor_tel_remitente;
					var Etfecha = "FECHA DE REGISTRO: ";
					var fecha = nuevoArray_n1.cor_create_at;
					origen = " ORIGINAL";

					var fecha = " " + nuevoArray_n1.cor_create_at;
					if (nuevoArray_n1.cor_estado == 1 && nuevoArray_n1.cor_tipo == 'E') {
						var dependencia = "VENTANILLA UNICA";
						var servidor = nuevoArray_n1.usu_nombres + " " + nuevoArray_n1.usu_apellidos;
					}
				} else {
					if (nuevoArray_n2.origen == 'O') {
						origen = " ORIGINAL";
					} else {
						origen = " COPIA - " + nuevoArray_n2.nro_copia;
					}
					var dependencia = nuevoArray_n2.Condicion;
					var servidor = nuevoArray_n2.Servidor;
					var TelServidor = nuevoArray_n2.Celular;
					var Etfecha = " HISTORIAL DE LA HOJA DE RUTA";
					var fecha = "<button type='button' class='btn btn-block bg-gradient-info btn-sm' style='width:50%;' onclick=ViewHistorial(" + nuevoArray_n2.cor_id + "," + historial + ",'" + nuevoArray_n2.origen + "'," + nuevoArray_n2.nro_copia + ",'GAMEA-" + nuevoArray_n1.cor_codigo + "-" + nuevoArray_n1.ges_gestion + "')> <i class='fas fa-eye'></i> VER HISTORIAL</button>";
				}
				var dep1 = "<b><i class='fas fa-hotel'></i> UBICACION ACTUAL:</b>";
				var dep2 = dependencia;
				var est1 = "<b><i class='fas fa-arrow-circle-right'></i>ESTADO:</b>";
				var est2 = estado;
				var ref1 = "<b><i class='fas fa-file-invoice '></i> REFERENCIA:</b>";
				var ref2 = nuevoArray_n1.cor_referencia;
				var des1 = "<b><i class='fas fa-eye-dropper '></i> DESCRIPCION:</b>";
				var des2 = nuevoArray_n1.cor_descripcion;
				var serv1 = "<b><i class='fas fa-user'></i> CON EL SERVIDOR PUBLICO:</b>";
				var serv2 = servidor;
				var telf1 = "<b><i class='fas fa-phone-alt'></i> CELULAR SERVIDOR PUBLICO</b>";
				var telf2 = TelServidor;
				var Fecha1 = "<b><i class='fa fa-calendar' aria-hidden='true'></i> " + Etfecha + "</b>";
				var Fecha2 = fecha;
				var est = '<br><span title="3 New Messages" class="badge bg-success " style="font-size: 18px;">' + origen + ' </span>'
				var anexo = '<button type="button" id="btnRegresarPe" class="btn btn-info" onclick="regresar();"><i class="fas fa-undo-alt"> </i> Regresar</button><h1 class="text-center display-8" id="tituloprincipal"><b>HOJA DE RUTA ' + etiqueta + '<b>' + est + '</h1><br><section id="about" class="about"><div class="container"><div class="row">   <div class="col-xl-4 col-lg-6 icon-boxes d-flex flex-column align-items-stretch "><h5><b>INFORMACION:</b></h5><div class="icon-box"><h6 ><a href="">' + dep1 + '</a></h6><p> ' + dep2 + '</p></div>    <div class="icon-box"><h6 class="title"><a href="">' + est1 + '</a></h6><p class="description" style="margin-bottom: 0.1rem;"> ' + est2 + '</p>' + buttonConcluir + '</div>    <div class="icon-box"><h6 ><a href="">' + ref1 + '</a></h6><p > ' + ref2 + '</p></div>  <div class="icon-box"><h6 class="title"><a href="">' + des1 + '</a></h6><p class="description"> ' + des2 + '</p></div>     </div>             <div class="col-xl-4 col-lg-6 icon-boxes d-flex flex-column align-items-stretch "><h5><b>  </b></h5> <div class="icon-box"><h6 class="title"><a href="">' + serv1 + '</a></h6><p class="description"> ' + serv2 + '</p></div>  <div class="icon-box"><h6 class="title"><a href="">' + telf1 + '</a></h6><p class="description"> ' + telf2 + '</p></div>        <div class="icon-box"><h6 class="title"><a href="">' + Fecha1 + '</a></h6><p class="description"> ' + Fecha2 + '</p></div>     </div>        <div class="col-xl-3 col-lg-6 d-flex justify-content-center video-box align-items-stretch position-relative"><img style="width:auto;height:30%; " src="<?php echo base_url() ?>assets/dist/img/plantilla/oficina.png"></img></div>      </div></div></section>';
				$('#append').empty();
				$('#append').append(anexo);
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



	function ViewHistorial(cod, his, origen, nro_copia, codigo) {

		$(".Codigo").text(codigo);
		$("#TableHistorial").dataTable().fnDestroy();
		DataTableBandejaDetalles = $('#TableHistorial').DataTable({
			"ajax": "<?= site_url("SecretaryControl/SearchCorrespondenciaViewHistorial") ?>/" + cod + "/" + origen + "/" + nro_copia,
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
		$('#Modal_ViewHistorial').modal('show');
		$("#DivButtonReportHistory").empty();
		var ButtonReportDatatableHistory = '<center> <button type="button" class="btn btn-sm btn-info" id="ButtonPrintReportHistorial" name="ButtonPrintReportHistorial" onclick="generarPDF_hojaderuta(' + cod + ',' + his + ')" ><i class="fa fa-print"></i> Imprimir Historial</button> <button type="button" class="btn btn-sm btn-success" id="ButtonPrintReportCabeceraHojaRuta" name="ButtonPrintReportCabeceraHojaRuta" onclick="generarPDF_sobrescribirhojaderutaCabecera(' + cod + ')" ><i class="fa fa-print"></i> Imprimir Cabecera Hoja de Ruta</button> </center>';
		$("#DivButtonReportHistory").append(ButtonReportDatatableHistory);
	}

	//////////////////////////////////////////////////////////

	function ViewDatosConluir(cod,his,conclu_idd, origen, nro_copia, codigo) {
		$(".CodigoConclusion").text(codigo);
		$('#Modal_ViewDataConcluido').modal('show');
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/DatosViewConclusion") ?>",
			data: {
				conclu_idd: conclu_idd
			},
			beforeSend: function() {
				$('#load_ViewDataConclusion').show();
			},
			success: function(data) {
				//var obj = JSON.parse(data);
				var obj = jQuery.parseJSON(data);
				console.log(obj);
				$('#ConclusionMotivo').text(obj.motivo_conclusion);
				$('#ConclusionServidor').text(obj.usu_nombres + " " + obj.usu_apellidos);
				$('#ConclusionDependencia').text(obj.usu_dependencia);
				$('#ConclusionFecha').text(obj.fecha_conclusion);
				$('.modal-body').show();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#load_ViewDataConclusion').hide();
			},
			complete: function() {
				$('#load_ViewDataConclusion').hide();
			},
			dataType: 'html'
		});

	}

	function regresar() {
		divBuscador.style.display = 'block';
		div2.style.display = 'block';
		div2.style.display = 'flex';
		div3.style.display = 'block';
		div4.style.display = 'none';
		//div5.style.display = 'block';
		div6.style.display = 'block';
		//	div7.style.display = 'block';
		$('#append').empty();
	}

	/////////////////////////////////////////////////////////

	$("#form_SearchAvanzada").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("secretaryControl/SearchAvanzadaCorrespondencia") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#enviarSearchAvanzada').prop('disabled', true);
			},
			success: function(data) {
				console.log(data);
				var obj = JSON.parse(data);
				var tr_str = '';
				var tr_strReporte = '';
				var arrayReporte = new Array();

				var nuevoArray_n1 = obj.data_n1;
				var nuevoArray_n2 = obj.data_n2;
				var nuevoArray_n3 = obj.data_n3;
				var count = Object.keys(nuevoArray_n1).length;
				var countHistorial = Object.keys(nuevoArray_n2).length;
				var countCopias = Object.keys(nuevoArray_n3).length;
				console.log(nuevoArray_n1);
				console.log(nuevoArray_n2);
				console.log(nuevoArray_n3);
				console.log(count);
				console.log(countHistorial);
				console.log(countCopias);

				if (count == 0) {
					div = document.getElementById('divSearchTable');
					div.style.display = 'none';
					Swal.fire({
						type: 'error',
						title: 'No se encontro la Hoja de Ruta',
						showConfirmButton: false,
						timer: 2500
					});
				} else {
					div = document.getElementById('divSearchTable');
					div.style.display = 'block';
					var tr_head = "<tr>" +
						"<th style='text-align: center;background:#6C757D;font-size:12px;color:white;padding-bottom: 0.7em;width:10%'  >CODIGO HOJA DE RUTA</th>" +
						"<th style='text-align: center;background:#6C757D;font-size:12px;color:white;padding-bottom: 0.7em;width:15%' >UBICACION ACTUAL:</th>" +
						"<th style='text-align: center;background:#6C757D;font-size:12px;color:white;padding-bottom: 0.7em;width:30%' >REFERENCIA</th>" +
						"<th style='text-align: center;background:#6C757D;font-size:12px;color:white;padding-bottom: 0.7em;width:15%' >NOMBRE <br> REMITENTE</th>" +
						"<th style='text-align: center;background:#6C757D;font-size:12px;color:white;padding-bottom: 0.7em;width:15%' >CARGO <br> REMITENTE</th>" +
						"<th style='text-align: center;background:#6C757D;font-size:12px;color:white;padding-bottom: 0.7em;width:15%' >INSTITUCION <br> REMITENTE</th>" +
						"<th style='text-align: center;background:#6C757D;font-size:12px;color:white;padding-bottom: 0.7em;width:15%' >CELULAR <br> REMITENTE</th>" +
						"<th style='text-align: center;background:#6C757D;font-size:12px;color:white;padding-bottom: 0.7em;width:7%' >HISTORIAL</th>" +
						"<th style='text-align: center;background:#6C757D;font-size:12px;color:white;padding-bottom: 0.7em;width:7%' >MAS DETALLES</th>" +
						"</tr>";
					$("#example5 thead").append(tr_head);

					for (var i = 0; i < count; i++) {
						var ButtonHistorial = "Iniciado";
						var codigo = "GAMEA-" + nuevoArray_n1[i].cor_codigo + "-" + nuevoArray_n1[i].ges_gestion;
						var masinfo = '<button type="button" onclick="viewDatos(' + nuevoArray_n1[i].cor_id + ')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewDatos"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas detalles</span></button>';
						if (countHistorial > 0) {

							for (var z = 0; z < countHistorial; z++) {
								if (nuevoArray_n1[i].cor_id == nuevoArray_n2[z].cor_id) {
									var dependencia = nuevoArray_n2[z].Condicion;
									var servidor = nuevoArray_n2[z].Servidor;
									var DataHis = nuevoArray_n2[z].his_id;
									var DataOrigen = nuevoArray_n2[z].origen;
									var DataNroCopia = nuevoArray_n2[z].nro_copia;
									var ButtonHistorial = "<button type='button' onclick=ViewHistorial(" + nuevoArray_n2[z].cor_id + "," + DataHis + ",'" + DataOrigen + "'," + DataNroCopia + ",'GAMEA-" + nuevoArray_n1[i].cor_codigo + "-" + nuevoArray_n1[i].ges_gestion + "') class='btn btn-outline-primary btn-sm'><span title='3 New Messages'style='font-size:12px;' ><i class='fas fa-file-alt'></i> Ver Historial</span></button>";
									z = countHistorial;
								} else {
									var dependencia = nuevoArray_n1[i].cor_institucion;
									var servidor = nuevoArray_n1[i].cor_nombre_remitente;
								}
							}
						} else {
							var dependencia = nuevoArray_n1[i].cor_institucion;
							var servidor = nuevoArray_n1[i].cor_nombre_remitente;
						}
						var tr_strReporte = {
							codigo: "<span title='3 New Messages' class='badge ' style='background:#6C757D;font-size:12px;color:white;'> GAMEA-" + nuevoArray_n1[i].cor_codigo + "-" + nuevoArray_n1[i].ges_gestion + "</span><br><span title='3 New Messages' class='badge' style='background:#6C757D;font-size:12px;color:white;'> ORGINAL</span>",
							depen: dependencia + " CON " + servidor,
							ref: nuevoArray_n1[i].cor_referencia,
							rem: nuevoArray_n1[i].cor_nombre_remitente,
							car: nuevoArray_n1[i].cor_cargo_remitente,
							ins: nuevoArray_n1[i].cor_institucion,
							tel: nuevoArray_n1[i].cor_tel_remitente,
						}
						var tr_str = "<tr>" +
							"<td align='center'><span title='3 New Messages' class='badge ' style='background:#6C757D;font-size:10px;color:white;'> GAMEA-" + nuevoArray_n1[i].cor_codigo + "-" + nuevoArray_n1[i].ges_gestion + "</span><br><span title='3 New Messages' class='badge' style='background:#6C757D;font-size:12px;color:white;'>" + "ORIGINAL" + "</span></td>" +
							"<td  style='text-align: center;font-size:10px;'><b>" + dependencia + "</b> CON <b>" + servidor + "</b></td>" +
							"<td style='text-align: center;font-size:10px;'>" + nuevoArray_n1[i].cor_referencia + "</td>" +
							"<td style='text-align: center;font-size:10px;'>" + nuevoArray_n1[i].cor_nombre_remitente + "</td>" +
							"<td style='text-align: center;font-size:10px;'>" + nuevoArray_n1[i].cor_cargo_remitente + "</td>" +
							"<td style='text-align: center;font-size:10px;'>" + nuevoArray_n1[i].cor_institucion + "</td>" +
							"<td style='text-align: center;font-size:10px;'>" + nuevoArray_n1[i].cor_tel_remitente + "</td>" +
							"<td align='center'>" + ButtonHistorial + "</td>" +
							"<td align='center'>" + masinfo + "</td>" +
							"</tr>";

						$("#example5 tbody").append(tr_str);
						gblarray_reporte.push(tr_strReporte);

						if (countCopias > 0) {
							for (var w = 0; w < countCopias; w++) {
								if (nuevoArray_n1[i].cor_id == nuevoArray_n3[w].cor_id) {
									var dependencia = nuevoArray_n3[w].Condicion;
									var servidor = nuevoArray_n3[w].Servidor;
									var DataHis = nuevoArray_n3[w].his_id;
									var DataOrigen = nuevoArray_n3[w].origen;
									var DataNroCopia = nuevoArray_n3[w].nro_copia;
									var ButtonHistorial = "<button type='button' onclick=ViewHistorial(" + nuevoArray_n3[w].cor_id + "," + DataHis + ",'" + DataOrigen + "'," + DataNroCopia + ",'GAMEA-" + nuevoArray_n1[i].cor_codigo + "-" + nuevoArray_n1[i].ges_gestion + "') class='btn btn-outline-primary btn-sm'><span title='3 New Messages'style='font-size:12px;' ><i class='fas fa-file-alt'></i> Ver Historial</span></button>";
									var tr_strReporte = {
										codigo: "<span title='3 New Messages' class='badge ' style='background:#6C757D;font-size:12px;color:white;'> GAMEA-" + nuevoArray_n1[i].cor_codigo + "-" + nuevoArray_n1[i].ges_gestion + "</span><br><span title='3 New Messages' class='badge' style='background:#6C757D;font-size:12px;color:white;'>" + "COPIA-" + nuevoArray_n3[w].nro_copia + "</span>",
										depen: dependencia + " CON " + servidor,
										ref: nuevoArray_n1[i].cor_referencia,
										rem: nuevoArray_n1[i].cor_nombre_remitente,
										car: nuevoArray_n1[i].cor_cargo_remitente,
										ins: nuevoArray_n1[i].cor_institucion,
										tel: nuevoArray_n1[i].cor_tel_remitente,

									}
									var tr_str = "<tr>" +
										"<td align='center'><span title='3 New Messages' class='badge ' style='background:#6C757D;font-size:12px;color:white;'> GAMEA-" + nuevoArray_n1[i].cor_codigo + "-" + nuevoArray_n1[i].ges_gestion + "</span><br><span title='3 New Messages' class='badge' style='background:#6C757D;font-size:12px;color:white;'>" + "COPIA-" + nuevoArray_n3[w].nro_copia + "</span></td>" +
										"<td align='center'><b>" + dependencia + "</b> CON <b>" + servidor + "</b></td>" +
										"<td align='center'>" + nuevoArray_n1[i].cor_referencia + "</td>" +
										"<td align='center'>" + nuevoArray_n1[i].cor_nombre_remitente + "</td>" +
										"<td align='center'>" + nuevoArray_n1[i].cor_cargo_remitente + "</td>" +
										"<td align='center'>" + nuevoArray_n1[i].cor_institucion + "</td>" +
										"<td align='center'>" + nuevoArray_n1[i].cor_tel_remitente + "</td>" +
										"<td align='center'>" + ButtonHistorial + "</td>" +
										"<td align='center'>" + masinfo + "</td>" +
										"</tr>";

									$("#example5 tbody").append(tr_str);
									gblarray_reporte.push(tr_strReporte);
								}
							}
						}

					}
				}
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error de Servidor, vuelta Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#enviarSearchAvanzada').prop('disabled', false);
				$('#form_SearchAvanzada')[0].reset();
				limpiarInputs();
			},
			complete: function() {
				$('#form_SearchAvanzada')[0].reset();
				$('#enviarSearchAvanzada').prop('disabled', false);
				limpiarInputs();
			},
			dataType: 'html'
		});
	});

	$('#ImpReporte').click(function() {
		var total = Object.keys(gblarray_reporte).length;
		if (total > 0) {
			$.redirect("<?= site_url('/PdfControl/ReporteBusqueda') ?>", {
					gblarray_reporte: gblarray_reporte,
				},
				"POST", "_blank");
		} else {
			Swal.fire({
				type: 'error',
				title: 'Inserte un valor',
				showConfirmButton: false,
				timer: 2500
			});
		}

	});

	function limpiarInputs() {
		document.getElementById("finicial").value = null;
		document.getElementById("ffinal").value = null;
		document.getElementById("SearchCodigo").value = null;
		document.getElementById("SearchRef").value = null;
		//document.getElementById("SearchDes").value = null;
		document.getElementById("SearchNomRem").value = null;
		document.getElementById("SearchCargoRem").value = null;
		document.getElementById("SearchInsRem").value = null;
		document.getElementById("SearchCelRem").value = null;
	}

	function limpiarInputsAll() {
		document.getElementById("finicial").value = null;
		document.getElementById("ffinal").value = null;
		document.getElementById("SearchCodigo").value = null;
		document.getElementById("SearchRef").value = null;
		//document.getElementById("SearchDes").value = null;
		document.getElementById("SearchNomRem").value = null;
		document.getElementById("SearchCargoRem").value = null;
		document.getElementById("SearchInsRem").value = null;
		document.getElementById("SearchCelRem").value = null;

		div = document.getElementById('divSearchTable');
		div.style.display = 'none';
		gblarray_reporte = [];
	}

	function limpiarTable() {
		$(`#example5 thead`).empty();
		$(`#example5 tbody`).empty();
		gblarray_reporte = [];
	}

	/////////////////////////////////////////////////////////
	/*=============================================
  		FUNCTION VER HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	$('#load_viewEyeRoute').hide();

	function viewDatos(cor_id) {
		$('.modal-body').hide();
		VerArchivosDerivar(cor_id);
		var codspan = "GAMEA-" + cor_id + '-2021';
		$(".cod_GAMEA").text(codspan);
		//$('#viewEyeRouteTitle').text(codigo);
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
				//var obj = JSON.parse(data);
				var obj = jQuery.parseJSON(data);
				console.log(obj[0]);
				$('#cite').val(obj[0].cor_cite);
				$('#reference').val(obj[0].cor_referencia);
				$('#description').val(obj[0].cor_descripcion);
				$('#observation').val(obj[0].cor_observacion);
				$('.modal-body').show();
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, vuelva a Intentarlo de nuevo',
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
</script>