
<script>
	$(function() {
		CargarTema();
		CountBandeja();
		derivarHojaRutaExterna();
		limpiarInputsSelect();
		ToastImage();
	});
	// $('#div_select_nivel_2DIRECTA').hide();
	// $('#div_select_nivel_3DIRECTA').hide();
	$('#BtnBuscarContacto').prop('disabled', true);
	$('#load_contactos').hide();

	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/
	function derivarHojaRutaExterna() {
		limpiarInputsSelect();
		$.ajax({
			url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_1Directo') ?>/",
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var obj = JSON.parse(data);
				//var content ='';
				var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
				for (var i = 0; i < obj.length; i++) {
					content += '<option value="' + obj[i].niv1_id + '">';
					content += obj[i].niv1_nombre;
					content += '</option>';
				}
				$('#select_nivel_1DIRECTA').html(content);
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
					alertify.error('Cancel');
				});
			},
			dataType: 'html'
		});

	}
	$('#select_nivel_1DIRECTA').change(function() {
		var parametros = $("#select_nivel_1DIRECTA").val();
		console.log(parametros);
		$('#div_select_nivel_1DIRECTA').show();
		$('#div_select_nivel_2DIRECTA').show();
		$.ajax({
			url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_2_IDDirecto') ?>/" + parametros,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				var obj = JSON.parse(data);
				var nuevoArray_n1 = obj.data_n1;
				var nuevoArray_n2 = obj.data_n2;
				console.log(obj);
				var content_n1 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
				for (var i = 0; i < nuevoArray_n1.length; i++) {
					content_n1 += '<option value="' + nuevoArray_n1[i].niv2_id + '">';
					content_n1 += nuevoArray_n1[i].niv2_nombre;
					content_n1 += '</option>';
				}
				if (nuevoArray_n2 == '')
					var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
				else
					var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
				for (var i = 0; i < nuevoArray_n2.length; i++) {
					content += '<option value="' + nuevoArray_n2[i].usu_rol_id + '">';
					content += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos;
					content += '</option>';
				}
				$('#select_nivel_2DIRECTA').html(content_n1);
				$('#div_select_nivel_3DIRECTA').hide();
				$('#BtnBuscarContacto').prop('disabled', false);
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
	});


	$('#select_nivel_2DIRECTA').change(function() {
		var parametros = $("#select_nivel_1DIRECTA").val();
		var parametros2 = $("#select_nivel_2DIRECTA").val();
		console.log(parametros + " " + parametros2);
		if (parametros == 0) {
			limpiarInputsSelect();
			$('#div_select_nivel_3DIRECTA').hide();
		} else {
			$('#div_select_nivel_3DIRECTA').show();
			$.ajax({
				url: "<?php echo site_url('VentanillaUnicaControl/dependencyListLevel_3_IDDirecto_ConVentanillaRecaudaciones') ?>/" + parametros + "/" + parametros2,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var obj = JSON.parse(data);
					var nuevoArray_n1 = obj.data_n1;
					var nuevoArray_n2 = obj.data_n2;
					console.log(obj);
					var content = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
					for (var i = 0; i < nuevoArray_n1.length; i++) {
						content += '<option value="' + nuevoArray_n1[i].niv3_id + '">';
						content += nuevoArray_n1[i].niv3_nombre;
						content += '</option>';
					}
					if (nuevoArray_n2 == '')
						var content2 = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content2 = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < nuevoArray_n2.length; i++) {
						content2 += '<option value="' + nuevoArray_n2[i].usu_rol_id + '">';
						content2 += nuevoArray_n2[i].usu_nombres + " " + nuevoArray_n2[i].usu_apellidos;
						content2 += '</option>';
					}
					$('#select_nivel_3DIRECTA').html(content);
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

	////////////////////////////////////

	$("#Form_Contactos").submit(function(e) {
		e.preventDefault();
		var niv1 = $("#select_nivel_1DIRECTA").val();
		var pre_niv2 = $("#select_nivel_2DIRECTA").val();
		var niv2 = pre_niv2 == 0 || pre_niv2 == "Seleccionar Dependencia" ? 0 : pre_niv2;
		var pre_niv3 = $("#select_nivel_3DIRECTA").val();
		var niv3 = pre_niv3 == 0 || pre_niv3 == "Seleccionar Dependencia" ? 0 : pre_niv3;
		console.log(niv1 + " " + niv2 + " " + niv3);

		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/SearchContactos") ?>",
			dataType: "JSON",
			data: {
				niv1: niv1,
				niv2: niv2,
				niv3: niv3
			},
			beforeSend: function() {
				$('#load_contactos').show();
				$('#BtnBuscarContacto').prop('disabled', true);
			},
			success: function(data) {

				var obj = JSON.parse(data);
				var count = Object.keys(obj).length;
				$('#load_contactos').hide();
				$(`#DivContactos`).empty();
				console.log(count);
				if (count == 0) {
					div = document.getElementById('DivContactos');
					div.style.display = 'none';
					Swal.fire({
						type: 'error',
						title: 'No se encontro Ningun Contacto',
						showConfirmButton: false,
						timer: 2500
					});
					limpiarInputsSelect();
				} else {
					div = document.getElementById('DivContactos');
					div.style.display = 'block';
					div.style.display = 'flex';

					if (count > 0) {
						for (var w = 0; w < count; w++) {
							var genero = obj[w].usu_genero == 1 ? 'varon.png' : 'mujer.png';
							var Str_Contactos = "<div class='col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column'><div class='card  d-flex flex-fill'>" +
								"<div class='card-header  border-bottom-0'><b>DATOS DEL SERVIDOR PUBLICO </b> </div>" +
								"<div class='card-body pt-0'>" +
								" <div class='row'>" +
								"  <div class='col-7'>" +
								"  <h2 class='lead'><b>" + obj[w].usu_nombres + " " + obj[w].usu_apellidos + "</b></h2>" +
								"  <p class='text-sm'><i class='fas fa-user'></i> <b>CARGO: </b> " + obj[w].usu_rol_cargo + " </p>" +
								"  <ul class='ml-4 mb-0 fa-ul '>" +
								"  <li class='text-sm'><span class='fa-li'><i class='fas fa-lg fa-building'></i></span> <b>DEPENDENCIA: </b> " + obj[w].usu_dependencia + "</li><br>" +
								"  <li class='text-sm'><span class='fa-li'><i class='fas fa-lg fa-phone'></i></span> <b>CELULAR: </b> " + obj[w].usu_celular + " </li>" +
								" </ul>" +
								" </div>" +
								" <div class='col-5 text-center'>" +
								"  <img src='<?= base_url() ?>assets/dist/img/" + genero + "' alt='user-avatar' class='img-circle img-fluid'>" +
								" </div>" +
								" </div>" +
								" </div>" +
								"  <div class='card-footer'>" +
								" <div class='text-right'>" +
								" <a href='#' class='btn btn-sm bg-teal'><i class='fas fa-user'></i> ACTIVO</a>" +
								"</div>" +
								" </div>" +
								"  </div>" +
								"</div>";
							$("#DivContactos").append(Str_Contactos);
							$('#div_select_nivel_2DIRECTA').hide();
							$('#div_select_nivel_3DIRECTA').hide();
						}
					}
				}
			},
			error: function(xhr) {
				Swal.fire({
					type: 'error',
					title: 'Error en el Servidor, Vuelva a Intentarlo de Nuevo',
					showConfirmButton: false,
					timer: 2500
				});
				$('#Form_Contactos')[0].reset();
				$('#load_contactos').hide();
				$('#Form_Contactos').show();
			},
			complete: function() {
				$('#Form_Contactos')[0].reset();
				$('#Form_Contactos').show();
				$('#load_contactos').hide();
			},
			dataType: 'html'
		});

	});
////////////////////////////////////
function ToastImage() {
      $(document).Toasts('create', {
        body: 'Si cambio de Jefe o Secretaria, por favor dirijase a la opcion "CONTACTOS GAMEA" y contactese con el Administrador para la actualizacion de datos.',
        title: 'ACTUALICE DATOS',
        subtitle: 'Cerrar',
		image: '<?= base_url() ?>assets/dist/img/plantilla/loho1.gif',
        imageAlt: 'GAMEA 2022',
      })
    }
	///////////////////////////////////////////////////////////////////////
	//Limpiar campos Formulario VentanillaUnica
	function limpiarInputsSelect() {
		$('select#select_nivel_1DIRECTA option[value="0"]').prop('selected', true);
		$('select#select_nivel_2DIRECTA option[value="0"]').prop('selected', true);
		$('select#select_nivel_3DIRECTA option[value="0"]').prop('selected', true);
		$('#Form_Contactos')[0].reset();
		$('#div_select_nivel_2DIRECTA').hide();
		$('#div_select_nivel_3DIRECTA').hide();
		$(`#DivContactos`).empty();
	}
	//////////////////////////////////////////////////
</script>
</body>

</html>