
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?=base_url()?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>assets/plugins/sparklines/sparkline.js"></script>
<!-- Select2 -->
<script src="<?=base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- InputMask -->
<script src="<?=base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php //base_url()?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- Alertify -->
<script src="<?php echo base_url();?>assets/plugins/alertify/alertify.min.js"></script>
<!-- BS-Stepper -->
<script src="<?=base_url()?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- jsGrid -->
<script src="<?=base_url()?>assets/plugins/jsgrid/demos/db.js"></script>
<!-- <script src="<?php //base_url()?>assets/pluginsjsgrid/jsgrid.min.js"></script> -->
<!-- dropzonejs -->
<script src="<?=base_url()?>assets/plugins/dropzone/min/dropzone.min.js"></script>
<script>
elementBuscador = document.getElementById('buscador');
elementBuscador.style.display = 'block';  
elementDatos = document.getElementById('datos');
elementDatos.style.display = 'none';  
elementDatosVacios = document.getElementById('datosVacios');
elementDatosVacios.style.display = 'none';
var ans = "";
var clear = false;
var calc = "";
$(document).ready(function() {
  $("button").click(function() {
    var text = $(this).attr("value");
    if(parseInt(text, 10) == text || text === "." || text === "/" || text === "*" || text === "-" || text === "+" || text === "%") {
      if(clear === false) {
        calc += text;
        $("#codCorres").val(calc);
      } else {
        calc = text;
        $("#codCorres").val(calc);
        clear = false;
      }
    } else if(text === "CE") {
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
function Limpiar(cal){
  calc = "";
  $("#codCorres").val("");
}
$("#form_Buscar").submit(function(e) {
			e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?=site_url("VentanaTouch/SearchVentana")?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#search').prop('disabled', true);
				//$('#modal_search').modal('show');
				$('#form_Buscar').hide();
			//	$('#load_search').show();
      Limpiar();
			},
			success: function(data) {
			var obj = jQuery.parseJSON(data);
      console.log(obj);
			if(obj==null || obj==""){
        Limpiar();
        mostrarOcultarDatosVacios();
			//	div = document.getElementById('divSearch');
		//		alertify.alert('SISCO', 'No se encontro la Hoja de ruta - '+obj, function(){ alertify.error('Cancel'); });
			}else{
				var est="";
				if(obj.cor_estado==1){ est="INICIADO";
				}else if(obj.cor_estado==2){
					est="EN PROCESO";
				}else if(obj.cor_estado==3){
					est="TERMINADO";
				}
				var a="GAMEA"+"-"+obj.cor_codigo+'-'+obj.ges_gestion;
				var conva=a.toString();
        var nombre=obj.usu_nombres + ' '+ obj.usu_apellidos;
		
				$( ".cod_GAMEA" ).text(conva);
				$("#Search_estado").val(est);
				$("#Search_referencia").val(obj.cor_referencia);
				$("#Search_dependenciaactual").val(obj.usu_dependencia);
        $("#Search_fecha").val(obj.a_fecha);
				$("#Search_funcionario").val(nombre);
         Limpiar();
         mostrarOcultarDat()
			}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error en el Servidor, Vuelva a Intentarlo', function(){ alertify.error('Cancel'); });
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
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function mostrarOcultarBuscador(){
  elementBuscador = document.getElementById('buscador');
  elementDatos = document.getElementById('datos');
  elementDatosVacios = document.getElementById('datosVacios');
  elementBuscador.style.display='block';
  elementDatos.style.display = 'none'; 
  elementDatosVacios.style.display = 'none';  
}
function mostrarOcultarDat(){
  elementBuscador = document.getElementById('buscador');
  elementDatos = document.getElementById('datos');
  elementDatosVacios = document.getElementById('datosVacios');
  elementBuscador.style.display='none';
  elementDatos.style.display = 'block'; 
  elementDatosVacios.style.display = 'none';  
}
function mostrarOcultarDatosVacios(){
  elementBuscador = document.getElementById('buscador');
  elementDatos = document.getElementById('datos');
  elementDatosVacios = document.getElementById('datosVacios');
  elementBuscador.style.display='none';
  elementDatos.style.display = 'none'; 
  elementDatosVacios.style.display = 'block';  
}




</script>
</body>

</html>


