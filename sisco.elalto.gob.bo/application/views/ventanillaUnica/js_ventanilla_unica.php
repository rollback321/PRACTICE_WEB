

<script>
	$(function() {
		CargarTema();
		CargarCalendarioRegistro();
		TableInicio();
	});

	// $("#load_register_edit").hide();
	// $('#load_register_niveles').hide();

	// $('#load_viewDestino').hide();
	// $('#load_derive_internal').hide();
	// $('#load_derive_hoja').hide();
	// $('#div_select_nivel_1').hide();
	// $('#div_select_nivel_2').hide();
	// $('#div_select_nivel_3').hide();

	$('select#select_proveidoMultiple').on('change', function() {
		$('#a_provMultiple').val($(this).find(":selected").text() + ' ');
		$('#a_provMultiple').focus();
		$('#select_proveidoMultiple').val($('#select_proveidoMultiple > option:first').val());
	});
	//////////////////////////////////////////////////////////////
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
	$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Date picker
    $('#reservationdate').datetimepicker({
        format:'YYYY-MM-DD'
    });
	  //Date picker
	  $('#reservationdate2').datetimepicker({
		format:'YYYY-MM-DD'
    });
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  });
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Date picker
    $('#reservationdates').datetimepicker({
        format:'YYYY-MM-DD'
    });
	  //Date picker
	  $('#reservationdates2').datetimepicker({
		format:'YYYY-MM-DD'
    });
    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
  });

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  

	




	

	
	
	
	
	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/
	// function derivarHojaRuta(cor_id, cod) {
	// 	limpiarControlesVentanilla();
	// 	$(".cod_GAMEA").text(cod);
	// 	$("#cor_id_Hoja").val(cor_id);
	// 	$('#codigo_Hoja').val(cod);
	// 	Datosforderivar(cor_id);
	// 	$('#div_select_nivel_1').show();
	// 	$.ajax({
	// 		url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_1Directo') ?>/",
	// 		type: "GET",
	// 		dataType: "JSON",
	// 		success: function(data) {
	// 			var obj = JSON.parse(data);
	// 			var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
	// 			for (var i = 0; i < obj.length; i++) {
	// 				content += '<option value="' + obj[i].niv1_id + '">';
	// 				content += obj[i].niv1_nombre;
	// 				content += '</option>';
	// 			}
	// 			$('#select_nivel_1').html(content);
	// 		},
	// 		error: function(xhr) {
	// 			Swal.fire({
	// 				type: 'error',
	// 				title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
	// 				showConfirmButton: false,
	// 				timer: 2500
	// 			});
	// 		},
	// 		dataType: 'html'
	// 	});

	// }

	// $('#select_nivel_1').change(function() {
	// 	var parametros = $("#select_nivel_1").val();
	// 	console.log(parametros);
	// 	$('#div_select_nivel_1').show();
	// 	$('#div_select_nivel_2').show();
	// 	$('#div_select_nivel_3').hide();
	// 	$.ajax({
	// 		url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_2_IDDirecto') ?>/" + parametros,
	// 		type: "GET",
	// 		dataType: "JSON",
	// 		success: function(data) {
	// 			var obj = JSON.parse(data);
	// 			var nuevoArray_n1 = obj.data_n1;
	// 			var nuevoArray_n2 = obj.data_n2;
	// 			console.log(obj);
	// 			var content_n1 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
	// 			for (var i = 0; i < nuevoArray_n1.length; i++) {
	// 				content_n1 += '<option value="' + nuevoArray_n1[i].niv2_id + '">';
	// 				content_n1 += nuevoArray_n1[i].niv2_nombre;
	// 				content_n1 += '</option>';
	// 			}
	// 			if (nuevoArray_n2 == '')
	// 				var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
	// 			else
	// 				var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
	// 			for (var i = 0; i < nuevoArray_n2.length; i++) {
	// 				content += '<option value="' + nuevoArray_n2[i].usu_rol_id + '">';
	// 				content += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos;
	// 				content += '</option>';
	// 			}
	// 			$('#select_nivel_2').html(content_n1);
	// 			$('#list_usuarios').html(content);
	// 			$('#div_select_nivel_3').hide();
	// 		},
	// 		error: function(xhr) {
	// 			Swal.fire({
	// 				type: 'error',
	// 				title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
	// 				showConfirmButton: false,
	// 				timer: 2500
	// 			});
	// 		},
	// 		dataType: 'html'
	// 	});
	// });
	// $('#select_nivel_2').change(function() {
	// 	var parametros = $("#select_nivel_1").val();
	// 	var parametros2 = $("#select_nivel_2").val();
	// 	console.log(parametros + " " + parametros2);
	// 	if (parametros == 0) {
	// 		limpiarControlesVentanilla();
	// 		$('#div_select_nivel_3').hide();
	// 	} else {

	// 		$('#div_select_nivel_3').show();
	// 		$.ajax({
	// 			url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_3_IDDirecto') ?>/" + parametros + "/" + parametros2,
	// 			type: "GET",
	// 			dataType: "JSON",
	// 			success: function(data) {
	// 				var obj = JSON.parse(data);
	// 				var nuevoArray_n1 = obj.data_n1;
	// 				var nuevoArray_n2 = obj.data_n2;
	// 				console.log(obj);
	// 				var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
	// 				for (var i = 0; i < nuevoArray_n1.length; i++) {
	// 					content += '<option value="' + nuevoArray_n1[i].niv3_id + '">';
	// 					content += nuevoArray_n1[i].niv3_nombre;
	// 					content += '</option>';
	// 				}
	// 				if (nuevoArray_n2 == '')
	// 					var content2 = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
	// 				else
	// 					var content2 = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
	// 				for (var i = 0; i < nuevoArray_n2.length; i++) {
	// 					content2 += '<option value="' + nuevoArray_n2[i].usu_rol_id + '">';
	// 					content2 += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos;
	// 					content2 += '</option>';
	// 				}
	// 				$('#select_nivel_3').html(content);
	// 				$('#list_usuarios').html(content2);
	// 			},
	// 			error: function(xhr) {
	// 				Swal.fire({
	// 				type: 'error',
	// 				title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
	// 				showConfirmButton: false,
	// 				timer: 2500
	// 			});
	// 			},
	// 			dataType: 'html'
	// 		});
	// 	}
	// });
	// $('#select_nivel_3').change(function() {
	// 	var parametros = $("#select_nivel_1").val();
	// 	var parametros2 = $("#select_nivel_2").val();
	// 	var parametros3 = $("#select_nivel_3").val();
	// 	if (parametros2 == 0) {
	// 		limpiarControlesVentanilla();
	// 	} else {
	// 		$('#div_select_nivel_3').show();
	// 		$.ajax({
	// 			url: "<?php echo site_url('VentanillaUnicaControl/listUsersReceptionistLevel_3Directo') ?>/" + parametros + "/" + parametros2 + "/" + parametros3,
	// 			type: "GET",
	// 			dataType: "JSON",
	// 			success: function(data) {
	// 				var obj = JSON.parse(data);
	// 				console.log(obj);
	// 				if (obj == '')
	// 					var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
	// 				else
	// 					var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
	// 				for (var i = 0; i < obj.length; i++) {
	// 					content += '<option value="' + obj[i].usu_rol_id + '">';
	// 					content += obj[i].usu_nombres + obj[i].usu_apellidos;
	// 					content += '</option>';
	// 				}
	// 				$('#list_usuarios').html(content);
	// 			},
	// 			error: function(xhr) {
	// 				Swal.fire({
	// 				type: 'error',
	// 				title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
	// 				showConfirmButton: false,
	// 				timer: 2500
	// 			});
	// 			},
	// 			dataType: 'html'
	// 		});
	// 	}
	// });

	/////////////////////////////////////////////////////////
	
	//Limpiar campos Formulario VentanillaUnica


	// function limpiarControlesVentanillaEditar() {
	// 	$('select#select_nivel_22 option[value="0"]').prop('selected', true);
	// 	$('select#select_nivel_33 option[value="0"]').prop('selected', true);
	// 	$("select#list_usuariosss option").each(function() {
	// 		$(this).remove();
	// 	});
	// }

	function limpiarTable() {
		$(`#TableDocDerivar thead`).empty();
		$(`#TableDocDerivar tbody`).empty();
	}
		/////////////////////////////////////////////////////////

</script>
</body>

</html>