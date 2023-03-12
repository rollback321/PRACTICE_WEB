
<script>
	$(function() {
		CountBandeja();
		derivarHojaRutaCopia();
		evaluar();
		$("#submitAgregarFila").click(function() {
			agregar();
		});
		$("#botonCancelarDerivacion").click(function() {
			window.location = "<?= site_url('SecretaryControl/crearHojaRuta'); ?>";
		});


   //SELECT2 OBTENER ARTICULOS
//    $("#SelectCod_id").select2({
//      // dropdownParent: $('#modalAddArticuloIngreso'),
//       placeholder: "Seleccione Hoja de Ruta",
//       autocomplete: true,
//       ajax: {
//         url: "<?= site_url('SecretaryControl/DatosSelect'); ?>",
//         // url: siteurl + '/SecretaryControl/selectObtenerArticulosNI',
//         type: "POST",
//         dataType: 'json',
//         data: function(params) {
//           return {
//             searchTerm: params.term // search term
//           };
//         },
//         processResults: function(data) {
//           return {
//             results: data
//           };
//         },
//         cache: true
//       }
//     });

    //OCULTO AL CARGAR
    //$("#guardar").hide();

 //OBTIENE NOMBRE DE UNIDAD DE MEDIDA
  // $(document).ready(function() {
// 	$("#a_ref").change(function() {
//     var idCord = $(this).val();
//     // alert(idArticulo);
//     $.ajax({
//       // url: siteurl + '/Controller_modulos/ArticuloUnidadMedida/',
//       url: "<?php //site_url('SecretaryControl/Referencia'); ?>",
//       type: 'POST',
//       data: {
//         "idCod": idCord
//       },
//       success: function(data) {
//         // alert(data);
//         var obj = JSON.parse(data);
//         // alert(obj.nombre_medida);
//         $("#a_ref").val(obj.cor_referencia);
//        // $("#ingresoUnMedida").prop("disabled", true);
//       }
//     });

//   });

	});



	function cambioOpciones(){
	//	var a =document.getElementById('a_ref').value=document.getElementById('SelectCod_id').value;
	//	var a =document.getElementById('a_ref').value=document.getElementById('SelectCod_id').value;
		var opti = $("#SelectCod_id option:selected").val();
		console.log(opti);
		//var idCord = $(this).val();
		$.ajax({
			url: "<?php echo site_url('SecretaryControl/Referencia') ?>/" + opti,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
			//	var newData= JSON.parse(JSON.stringify(obj));
			//	var data = $.parseJSON(obj);
		//	result = "{'name':'" + newData.usu_nombres + "','ap':'" + newData.usu_apellidos + "'}";
			//result= data;
			//var newData = $.parseJSON(obj);
				 console.log(obj.cor_referencia);
				 $("#a_ref").val(obj.cor_referencia);
				 $("#a_des").val(obj.cor_descripcion);
				 $(".a_ref").text(obj.cor_referencia);
				 $(".a_des").text(obj.cor_descripcion);
			},
			error: function(xhr) {

			},
			complete: function() {},
			//	dataType: 'html'
		
		});
		// return result;
	
	
	
		//var second_select = document.getElementById('SelectCod_id').value;
		

		//var optionId = document.getElementById('SelectCod_id').value;
		//$('a_ref').val(optionId);

}



	var cont = 0;
	var num = 1;
	//MOSTRAR BOTON SI TOTAL ES MAYOR A 0
	function evaluar() {
		if (cont > 0) {
			$("#guardar").show();
		} else {
			$("#guardar").hide();
		}
	};

	//ELIMINAR UNA FILA
	function eliminar(index) {
		num = num - 1;
		cont = cont - 1;
		$("#fila" + index).remove();
		evaluar();
	}



 

 


	//CLIC PARA LIMPIAR IMPUT DESPUES DE AGREGAR
	function limpiar() {
		$("#a_proveido").val('');
		$("#a_obs").val('');
	};

	function agregar() {
		//Obtener los valores de los inputs
		//var datosRecepcionista=[];
		var datosRecepcionista;
//var datosRecepcionista=[];
//var datosRecepcionista =  new Array(); 
		var cod_id = <?php echo $datos1; ?>;
		var recepcionista = $("#list_usuarios option:selected").val();
		var nombreRecepcionista = $("#list_usuarios option:selected").text();
		

		var proveido = $("#a_proveido").val();
		var observacion = $("#a_obs").val();
		var plazo = $("#DerFecha_plazo").val();
		//	datosRecepcionista= DatosRemitente(recepcionista);
		//var ar=datosRecepcionista.toString;
		//var obj = JSON.parse(datosRecepcionista);
		//var nuevoArray_n2 = obj.usu_nombres;
		//var obj =JSON.parse(JSON.stringify(datosRecepcionista))
		//var obj2 = obj;
		//var obj = JSON.parse(datosRecepcionista);
	//	var nuevoArray_n1 = obj;
	//	var rty=nuevoArray_n1;
//var atte=datosRecepcionista['usu_nombres'];
//let arregloDeClavesYValores = Object.entries(datosRecepcionista);
//console.log("Claves y valores: ", arregloDeClavesYValores);

//var newData= JSON.stringify(datosRecepcionista)
//var newData2 = datosRecepcionista.usu_nombres.
//var usu_nombres =null;

	//	console.log(datosRecepcionista[0]);
		var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn text-red p-0" onclick="eliminar(' + cont + ')"><i class="fas fa-minus-circle fa-2x"></i></button></td><td><input type="hidden" id="contador" name="contador" value="' + num + '"hidden><input type="hidden" id="cor_idTab" name="cor_idTab[]" value="' + cod_id + '">' + num + '</td><td><div class="form-group input-group-sm "><input class="form-control " type="hidden" name="recepcionista[]" value="' + recepcionista + '" id="recepcionista">' + nombreRecepcionista + '</div></td><td  width="90px"><div class="form-group input-group-sm "><input class="form-control" style="width:80px"  type="hidden" id="proveido" name="proveido[]" value="' + proveido + '">' + proveido + '</div></td><td ><div class="form-group input-group-sm "><input class="form-control" type="hidden" name="Observacion[]" value="' + observacion + '">' + observacion + '</div></td><td><div class="form-group input-group-sm "><input class="form-control" type="hidden" name="plazo[]" value="' + plazo + '" >' + plazo + '</td></tr>';
		cont++;
		num++;
		limpiar();
		limpiarSelect();
		//   $("#total").html("Bs. " + total);
		evaluar();
		$("#detalles").append(fila);
		//	$("#modalAddArticuloIngreso").modal("hide");
		alertify.success('Derivacion Agregado Correctamente ');

	}

	/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function DatosRemitente(recepcionista) {
		var result;
		$.ajax({
			url: "<?php echo site_url('SecretaryControl/DatosRemitente') ?>/" + recepcionista,
			type: "POST",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
			//	var newData= JSON.parse(JSON.stringify(obj));
			//	var data = $.parseJSON(obj);
		//	result = "{'name':'" + newData.usu_nombres + "','ap':'" + newData.usu_apellidos + "'}";
			result= obj;
				 console.log(result);
				 
			},
			error: function(xhr) {

			},
			complete: function() {},
			//	dataType: 'html'
		
		});
		return result;
	}

	function fusion() {
	

	var dataCopias = $("#formFusionar").serialize()

	console.log(dataCopias);
	$.ajax({
					type: 'POST',
					url: "<?=site_url('SecretaryControl/Fusionar'); ?>",
					data: dataCopias,
					beforeSend: function() {
					//	$('#submitCrearCopias').prop('disabled', true);
					},
					success: function(data) {
						//alert(data);
						if (data == "Fusion Correcta!") {
							Swal.fire({
								type: 'success',
								title: data,
								showConfirmButton: false,
								timer: 2500
							});

						} else {
							alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
								alertify.error('Cancel');
							});
						}
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					//	$('#submitCrearCopias').prop('disabled', false);
						//    $('#loader_process').hide();
					},
					complete: function() {
						setTimeout(function() {
							window.location = "<?= site_url('SecretaryControl/crearHojaRuta'); ?>";
						}, 1000);
						//setTimeout(window.location = "<?php //site_url('SecretaryControl/crearHojaRuta'); ?>",3000);
					//	$('#submitCrearCopias').prop('disabled', false);
						// $('#loader_process').hide();
					},
					dataType: 'html'
				});

	}
	
	


	/*=============================================
	  VALIDACION NEW PASSWORD 
	=============================================*/
	$(document).ready(function() {
		//variables
		var Newpass1 = $('[name=Newpassword]');
		var Newpass2 = $('[name=Newpassword2]');
		var confirmacion = "Contraseñas correctas";
		//var longitud = "La contraseña debe tener minimo 6 carácteres";
		var negacion = "Contraseñas Diferentes";
		var vacio = "Inserte la contraseña";
		//oculto por defecto el elemento span
		var span = $('<span id="spanPass" style="font-size: 10px;color: darkred;"></span>').insertAfter(Newpass2);
		span.hide();
		//función que comprueba las dos contraseñas
		function coincidePassword() {
			var Newvalor1 = Newpass1.val();
			var Newvalor2 = Newpass2.val();
			//muestro el span
			span.show().removeClass();
			//condiciones dentro de la función
			if (Newvalor1 != Newvalor2) {
				span.text(negacion).addClass('negacion');
				$('#ButtonModificarPass').prop('disabled', true);
			}
			if (Newvalor1.length == 0 || Newvalor1 == "") {
				span.text(vacio).addClass('negacion');
				$('#ButtonModificarPass').prop('disabled', true);
			}
			// if(valor1.length<6 || valor1.length>10){
			// span.text(longitud).addClass('negacion');
			// }
			if (Newvalor1.length != 0 && Newvalor1 == Newvalor2) {
				span.text(confirmacion).removeClass("negacion").addClass('confirmacion');
				$('#ButtonModificarPass').prop('disabled', false);
			}
		}
		//ejecuto la función al soltar la tecla
		Newpass2.keyup(function() {
			coincidePassword();
		});
	});

	/*=============================================
      CAMBIAR PASSWORD USUARIOS
	=============================================*/
	$('#load_cambiarpass').hide();
	$("#form_cambiarpass").submit(function(e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: "<?= site_url("SecretaryControl/CambiarPass") ?>",
			data: $(this).serialize(),
			beforeSend: function() {
				$('#load_cambiarpass').show();
				$('#form_cambiarpass').hide();
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
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentar a Cambiar la Contraseña', function() {
					alertify.error('Cancel');
				});
				$('#form_cambiarpass')[0].reset();
				$('#load_cambiarpass').hide();
				$('#form_cambiarpass').show();
			},
			complete: function() {
				$('#form_cambiarpass')[0].reset();
				$('#form_cambiarpass').show();
				$('#load_cambiarpass').hide();
				$('#modal_cambiarpass').modal('hide');
				$('#spanPass').hide();
			},
			dataType: 'html'
		});

	});

	/////////////////////////
	function limpiarSelect() {
		$('select#select_nivel_2 option[value="0"]').prop('selected', true);
		$('select#select_nivel_3 option[value="0"]').prop('selected', true);
		$("select#list_usuarios option").each(function() {
			$(this).remove();
		});
	}
	/////////////////////////
	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/
	$('#div_select_nivel_1').hide();
	$('#div_select_nivel_2').hide();
	$('#div_select_nivel_3').hide();

	function derivarHojaRutaCopia() {
		limpiarSelect();
		//$(".cod_GAMEA").text(cod);
		//$("#cor_id").val(cor_id);
		//VerArchivosDerivar(cor_id);
		var nivel1 = '<?= $this->session->userdata('rol_niv_1') ?>';
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';
		var nivel3 = '<?= $this->session->userdata('rol__niv_3') ?>';

		if (nivel2.length === 0 && nivel3.length == 0) {
			$('#div_select_nivel_1').show();
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
					$('#select_nivel_1').html(content);

				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},

				dataType: 'html'
			});
		} else {
			if (nivel2.length != 0 && nivel3.length == 0) {
				$('#div_select_nivel_1').show();
				$('#div_select_nivel_2').show();
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
						$('#select_nivel_1').html(content_n1);

						var content_n2 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n2.length; i++) {
							content_n2 += '<option value="' + nuevoArray_n2[i].niv2_id + '">';
							content_n2 += nuevoArray_n2[i].niv2_nombre;
							content_n2 += '</option>';
						}
						$('#select_nivel_2').html(content_n2);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});
			} else {
				$('#div_select_nivel_2').show();
				$('#div_select_nivel_3').show();
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
						$('#select_nivel_2').html(content_n2);

						var content_n3 = '<option value="0" selected="selected">Seleccionar Dependencia</option>';
						for (var i = 0; i < nuevoArray_n3.length; i++) {
							content_n3 += '<option value="' + nuevoArray_n3[i].niv3_id + '">';
							content_n3 += nuevoArray_n3[i].niv3_nombre;
							content_n3 += '</option>';
						}
						$('#select_nivel_3').html(content_n3);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});
			}
		}

	}

	$('#select_nivel_1').change(function() {
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
						content += obj[i].usu_nombres + obj[i].usu_apellidos;
						content += '</option>';
					}
					$('#list_usuarios').html(content);
				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},
				dataType: 'html'

			});
			$('#div_select_nivel_2').show();
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
					$('#select_nivel_2').html(content);
				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},

				dataType: 'html'
			});


			$('#div_select_nivel_3').hide();
		} else {
			$('#div_select_nivel_2').hide();
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
						content += obj[i].usu_nombres + obj[i].usu_apellidos;
						content += '</option>';
					}
					$('#list_usuarios').html(content);
				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
					});
				},

				dataType: 'html'
			});
		}


	});
	$('#select_nivel_2').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv2_id = optionSelected.val();
		var niv2_nombre = optionSelected.text();
		var nivel2 = '<?= $this->session->userdata('rol__niv_2') ?>';

		if (optionSelected.val() == 0) {
			//limpiar controles
			limpiarSelect();
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
							content += obj[i].usu_nombres + obj[i].usu_apellidos;
							content += '</option>';
						}
						$('#list_usuarios').html(content);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});
				$('#div_select_nivel_3').show();

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
						$('#select_nivel_3').html(content);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});



			} else {
				$('#div_select_nivel_3').hide();
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
							content += obj[i].usu_nombres + obj[i].usu_apellidos;
							content += '</option>';
						}
						$('#list_usuarios').html(content);
					},
					error: function(xhr) {
						alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
							alertify.error('Cancel');
						});
					},

					dataType: 'html'
				});
			}
		}
	});
	$('#select_nivel_3').change(function() {
		var optionSelected = $(this).find("option:selected");
		var niv3_id = optionSelected.val();
		var niv3_nombre = optionSelected.text();

		if (optionSelected.val() == 0) {
			//limpiar controles
			limpiarSelect();
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
						content += obj[i].usu_nombres + obj[i].usu_apellidos;
						content += '</option>';
					}
					$('#list_usuarios').html(content);
				},
				error: function(xhr) {
					alertify.alert('SISCO', 'Error de Conexion con el Servidor', function() {
						alertify.error('Cancel');
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
			url: "<?= site_url("secretaryControl/derivarHojaRutaExterna") ?>",
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
				HojaRutaActivaProccess.ajax.reload(null, false);
				HojaRutaActiva.ajax.reload(null, false);
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error de Servidor, vuelta Intentarlo de Nuevo', function() {
					alertify.error('Cancel');
				});
				$('#submitDeriveExternal').prop('disabled', false);
				$('#form_derivarHojaRutaExterna')[0].reset();
				$('#load_register_external').hide();
				$('#form_derivarHojaRutaExterna').show();
			},
			complete: function() {
				$('#form_derivarHojaRutaExterna')[0].reset();
				$('#submitDeriveExternal').prop('disabled', false);
				$('#form_derivarHojaRutaExterna').show();
				$('#load_register_external').hide();
				$('#derivarHojaRutaExterna').modal('hide');
			},
			dataType: 'html'
		});
	});



	/*=============================================
	  FUNCTION CONTADOR DE BANDEJA
	=============================================*/
	function CountBandeja() {
		$.ajax({
			url: "<?php echo site_url('TechnicalControl/CountBandejaInit') ?>/",
			type: "GET",
			dataType: "JSON",
			beforeSend: function() {},
			success: function(obj) {
				var obj = JSON.parse(obj);
				var num = obj.contador;
				if (num > 0) {
					$('#spancontador').html(obj.contador);
				} else {
					$('#spancontador').empty();
				}
			},
			error: function(xhr) {
				alertify.alert('SISCO', 'Error con el Contador de Bandeja', function() {
					alertify.error('Cancel');
				});
			},
			complete: function() {},
			dataType: 'html'
		});
	}

	////////////////////////////////////
	function comunicados() {
		$('#modalComunicados').modal('toggle');
	}
	/////////////////////////////

	$('#btnCrearhojaderuta').on('click', function() {
		limpiarCamposHDR();
	});
</script>
</body>

</html>