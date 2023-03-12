<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>assets/dist/js/sweetalert2.all.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Alertify -->
<script src="<?php echo base_url(); ?>assets/plugins/alertify/alertify.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url() ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- jsGrid -->
<script src="<?= base_url() ?>assets/plugins/jsgrid/demos/db.js"></script>

<!-- dropzonejs -->
<script src="<?= base_url() ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
<script>
	elementBuscador = document.getElementById('buscador');
	elementBuscador.style.display = 'block';
	titulo = document.getElementById('titulo');
	titulo.style.display = 'none';
	Un_dato = document.getElementById('UnDato');
	Un_dato.style.display = 'none';
	CerrarPrimerContent = document.getElementById('ButtonCerrar');
	CerrarPrimerContent.style.display = 'none';
	PrimerContenedor = document.getElementById('divSearch');
	PrimerContenedor.style.display = 'none';
	PrimerContenedor.style.display = 'flex';
	elementDatosVacios = document.getElementById('datosVacios');
	elementDatosVacios.style.display = 'none';

	var ans = "";
	var clear = false;
	var calc = "";
	$(document).ready(function() {
		$("button").click(function() {
			var text = $(this).attr("value");
			if (parseInt(text, 10) == text || text === "." || text === "/" || text === "*" || text === "-" || text === "+" || text === "%") {
				if (clear === false) {
					calc += text;
					$("#codCorres").val(calc);
				} else {
					calc = text;
					$("#codCorres").val(calc);
					clear = false;
				}
			} else if (text === "CE") {
				calc = calc.slice(0, -1);
				$("#codCorres").val(calc);
			}
		});
	});

	$(document).ready(function() {
		$("#search").click(function() {
			$("#form_Buscar").submit();
		});
	});

	function Limpiar(cal) {
		calc = "";
		$("#codCorres").val("");
	}
	$("#form_Buscar").submit(function(e) {
		e.preventDefault();

		InputBuscardor = document.getElementById('codCorres');
		if (InputBuscardor > 0 || InputBuscardor != null) {

			$.ajax({
				type: 'POST',
				url: "<?= site_url("SecretaryControl/SearchCorrespondencia") ?>",
				data: $(this).serialize(),
				beforeSend: function() {
					$('#search').prop('disabled', true);
				},
				success: function(data) {
					var obj = jQuery.parseJSON(data);
					var nuevoArray_n1 = obj.data_n1;
					var nuevoArray_n2 = obj.data_n2;
					console.log(obj);
					$('#divSearch').empty();

					if ((nuevoArray_n1 == null || nuevoArray_n1 == "")) {
						Limpiar();
						mostrarOcultarDatosVacios();
					} else {
						if (nuevoArray_n2.length > 0) {
							Limpiar();
							mostrarOcultarDat()
							var est = "";
							var est2 = "";
							var origen = "ORIGINAL";
							var estadocreacion = "";
							if (nuevoArray_n1.cor_estado == 1) {
								est = "INICIADO";	
								estadocreacion = "<label style='color: #007bff;font-size: 15px;margin-bottom: 0rem;'>  FECHA DE CREACION: </label>  ";
							}
							if (nuevoArray_n1.cor_estado == 2) {
								est = "EN PROCESO";
								estadocreacion = "<label style='color: #007bff;font-size: 15px;margin-bottom: 0rem;'>  FECHA DE ACEPTACION: </label>  ";
							}
							if (nuevoArray_n1.cor_estado == 3) {
								est = "CONCLUIDO";
								estadocreacion = "<label style='color: #007bff;font-size: 15px;margin-bottom: 0rem;'>  FECHA DE ACEPTACION: </label>  ";
							}

							var a = nuevoArray_n1.cor_codigo + '-' + nuevoArray_n1.ges_gestion;
							var conva = a.toString();
							var id = nuevoArray_n1.cor_id;
							var historia = nuevoArray_n1.his_id;
							var gestion = nuevoArray_n1.ges_gestion;
							var dependencia = "";
							var servidorO = "";
							var f_acept = "";
							var referencia1 = nuevoArray_n1.cor_referencia;
							var referencia2 = '<div class="col-md-12 "><img src="<?= base_url() ?>assets/dist/img/plantilla/referencia.jpeg" height="18" >  <label style="color: #007bff;font-size: 15px;margin-bottom: 0rem;">  REFERENCIA: </label>  <br><span style="font-size:15px; padding-left: 24px;"> ' + referencia1 + '</span></div>';

							if (nuevoArray_n2.length > 0) {
								dependencia = nuevoArray_n1.Condicion;
								servidorO = nuevoArray_n1.Servidor;
								f_acept = nuevoArray_n1.a_fecha;
							} else {
								dependencia = nuevoArray_n1.cor_institucion;
								servidorO = nuevoArray_n1.cor_nombre_remitente;
								f_acept = nuevoArray_n1.cor_create_at;
							}
							var f_acept2 = '<div class="col-md-12 "><img src="<?= base_url() ?>assets/dist/img/plantilla/calendario.jpeg" height="20" > ' + estadocreacion + ' <br><span style="font-size:15px;padding-left: 24px;">' + f_acept + '</span></div>';
							var servidorO2 = '<div class="col-md-12 "><img src="<?= base_url() ?>assets/dist/img/plantilla/hombre-de-negocios.svg" height="20">  <label style="color: #007bff;font-size: 15px;margin-bottom: 0rem;">   CON EL SERVIDOR PUBLICO : </label>    <br><span style="font-size:15px; padding-left: 20px;">' + servidorO + '</span></div>';
							var etiqueta = '<br><span title="3 New Messages" class="badge bg-success " style="font-size: 15px;padding-bottom: 1%;">GAMEA-' + id + '-2021</span>';
							$('#divSearch').append('<div class=" col-sm-4 col-md-4 col-lg-3 col-xl-3" style="padding-top: 2%;"><div class="card card-secondary card-outline"><div class="card-header pt-1" style="height: 60px;text-align: center;"><span class="" style="font-size: 3erm;"><i class="fas fa-file-invoice "></i><b>  ORIGINAL</b>' + etiqueta + '</span><span class="badge badge-danger" id="spancategoria"></span></div><div class="card-body p-1"><div class="row"><div class="col-md-3"><center><div class="widget-user-image bg-white "><img class="" src="<?= base_url() ?>assets/dist/img/plantilla/original.svg" width="50" alt="User Avatar"></div></center></div>      <div class="col-md-9 ">   <img src="<?= base_url() ?>assets/dist/img/dependencia.svg"  height="15" >  <label style="color: #007bff;font-size: 15px; margin-bottom: 0rem;">   UBICACION ACTUAL: </label> <br><span style="font-size:14px; ">' + dependencia + '<br> <b style="color: #008000">' + est + '</b></span></div>      ' + servidorO2 + referencia2 + f_acept2 + '           </div></div><div class="card-footer p-1"><button type="button" id="mostrar" class="btn btn-block btn-primary p-1" "disabled>    </button></div></div></div>');

							var contador = 1;
							var fecha_acept = "";
							for (var i = 0; i < nuevoArray_n2.length; i++) {
								if (nuevoArray_n2[i].r_fecha == null || nuevoArray_n2[i].r_fecha == 0) {
									fecha_acept = nuevoArray_n2[i].a_fecha;
								} else {
									fecha_acept = nuevoArray_n2[i].r_fecha;
								}
								var servidor1 = nuevoArray_n2[i].Servidor;
								var servidor2 = '<div class="col-md-12 "> <img src="<?= base_url() ?>assets/dist/img/plantilla/hombre-de-negocios.svg" height="20" >  <label style="color: #007bff;font-size: 15px;margin-bottom: 0rem;">  CON EL SERVIDOR PUBLICO:  </label>  <br><span style="font-size:15px;padding-left: 24px;"> ' + servidor1 + '</span></div>';
								var historia2 = nuevoArray_n2[i].his_id;
								var dep = nuevoArray_n2[i].Condicion;
								var ref = "";
								var fecha_acept2 = '<div class="col-md-12 "> <img src="<?= base_url() ?>assets/dist/img/plantilla/calendario.jpeg" height="20" >  ' + estadocreacion + '<br><span style="font-size:15px; padding-left: 24px;padding-left: 20px;">' + fecha_acept + '</span></div>';
								$('#divSearch').append('<div class=" col-sm-4 col-md-4 col-lg-3 col-xl-3"style="padding-top: 2%;"><div class="card card-secondary card-outline"><div class="card-header pt-1" style="height: 60px;text-align: center;"><span class="" style="font-size: 3erm;"><i class="fas fa-file-invoice "></i><b>  COPIA ' + contador + '</b>' + etiqueta + '</span><span class="badge badge-danger" id="spancategoria"></span></div><div class="card-body p-1"><div class="row"><div class="col-md-3"><center><div class="widget-user-image bg-white "><img class="" src="<?= base_url() ?>assets/dist/img/plantilla/original.svg" width="50" alt="User Avatar"></div></center></div>        <div class="col-md-9 ">   <img src="<?= base_url() ?>assets/dist/img/dependencia.svg"  height="15" >      <label style="color: #007bff;font-size: 15px;margin-bottom: 0rem;">   UBICACION ACTUAL: </label> <br><span style="font-size:14px; ">' + dep + '<br> <b style="color: #008000">' + est + '</b></span></div>    ' + servidor2 + referencia2 + fecha_acept2 + '       </div></div><div class="card-footer p-1"><button type="button" id="mostrar" class="btn btn-block btn-primary p-1""disabled>     </button></div></div></div>');
								contador = contador + 1;
							}

						} else {

							if (nuevoArray_n2.length > 0) {
								dependencia = nuevoArray_n1.Condicion;
								servidorO = nuevoArray_n1.Servidor;
								f_acept = nuevoArray_n1.a_fecha;

								
							} else {
								dependencia = nuevoArray_n1.cor_institucion;
								servidorO = nuevoArray_n1.cor_nombre_remitente;
								f_acept = nuevoArray_n1.cor_create_at;

								if(nuevoArray_n1.Condicion>0 || nuevoArray_n1.Condicion!=null)
								{
								dependencia = nuevoArray_n1.Condicion;
								servidorO = nuevoArray_n1.Servidor;
								f_acept = nuevoArray_n1.a_fecha;
								}
							}


							if (nuevoArray_n1.cor_estado == 1) {
								est2 = "INICIADO";
								estadocreacion = "FECHA DE CREACION:";
							}
							if (nuevoArray_n1.cor_estado == 2) {
								est2 = "EN PROCESO";
								estadocreacion = "FECHA DE ACEPTACION:";
							}
							if (nuevoArray_n1.cor_estado == 3) {
								est2 = "CONCLUIDO";
								estadocreacion = "FECHA DE ACEPTACION:";
							}
							var a = "GAMEA" + "-" + nuevoArray_n1.cor_codigo + '-' + nuevoArray_n1.ges_gestion;
							var conva = a.toString();
							var nombre = nuevoArray_n1.usu_nombres + ' ' + nuevoArray_n1.usu_apellidos;
							$(".cod_GAMEA").text(conva);
							$(".cod_sup").text("ORIGINAL");
							$(".ref").text(nuevoArray_n1.cor_referencia);
							$(".ubi").text(dependencia);
							$(".fun").text(servidorO);
							$(".estado").text(est2);
							$(".fecha").text(f_acept);
							$(".Fechasss").text(estadocreacion);
							Limpiar();
							mostrarOcultarDatUno()
						}
					}
				},
				error: function(xhr) {
					Swal.fire({
						type: 'error',
						title: "INSERTE UN NUMERO",
						showConfirmButton: false,
						timer: 2500
					});

					$('#search').prop('disabled', false);
					$('#form_Buscar')[0].reset();
					$('#form_Buscar').show();
					Limpiar();
				},
				complete: function() {
					$('#form_Buscar')[0].reset();
					$('#search').prop('disabled', false);
					$('#form_Buscar').show();
				},
				dataType: 'html'
			});


		} else {

			Swal.fire({
				type: 'error',
				title: "INSERTE UN NUMERO",
				showConfirmButton: false,
				timer: 2500
			});
		}

	});


	function startTime() {
		var today = new Date();
		var hr = today.getHours();
		var min = today.getMinutes();
		var sec = today.getSeconds();
		ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
		hr = (hr == 0) ? 12 : hr;
		hr = (hr > 12) ? hr - 12 : hr;
		//Add a zero in front of numbers<10
		hr = checkTime(hr);
		min = checkTime(min);
		sec = checkTime(sec);
		document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
		var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
		var days = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
		var curWeekDay = days[today.getDay()];
		var curDay = today.getDate();
		var curMonth = months[today.getMonth()];
		var curYear = today.getFullYear();
		var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear;
		document.getElementById("date").innerHTML = date;
		var time = setTimeout(function() {
			startTime()
		}, 500);
	}

	function checkTime(i) {
		if (i < 10) {
			i = "0" + i;
		}
		return i;
	}

	function mostrarOcultarBuscador() {
		elementBuscador.style.display = 'block';
		PrimerContenedor.style.display = 'none';
		Un_dato.style.display = 'none';
		titulo.style.display = 'none';
		elementDatosVacios.style.display = 'none';
		CerrarPrimerContent.style.display = 'none';
	}

	function mostrarOcultarDat() {
		elementBuscador.style.display = 'none';
		titulo.style.display = 'block';
		Un_dato.style.display = 'none';
		PrimerContenedor.style.display = 'block';
		PrimerContenedor.style.display = 'flex';
		CerrarPrimerContent.style.display = 'block';
		elementDatosVacios.style.display = 'none';
	}

	function mostrarOcultarDatUno() {
		elementBuscador.style.display = 'none';
		titulo.style.display = 'none';
		Un_dato.style.display = 'block';
		PrimerContenedor.style.display = 'none';
		PrimerContenedor.style.display = 'flex';
		CerrarPrimerContent.style.display = 'block';
		elementDatosVacios.style.display = 'none';
	}

	function mostrarOcultarDatosVacios() {
		elementBuscador.style.display = 'none';
		titulo.style.display = 'none';
		Un_dato.style.display = 'none';
		PrimerContenedor.style.display = 'none';
		elementDatosVacios.style.display = 'block';
		CerrarPrimerContent.style.display = 'none';
	}
</script>
</body>

</html>