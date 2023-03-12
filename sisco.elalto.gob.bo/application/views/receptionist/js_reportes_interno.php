<script>
	$(function() {
		CargarTema();
		CountBandeja();
		ListaTecnicos();
	});


	$('#pdfReport').prop('disabled', true);

	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()
		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
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
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()
		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})
		//Date picker
		$('#reservationdates').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		//Date picker
		$('#reservationdates2').datetimepicker({
			format: 'YYYY-MM-DD'
		});
		//Date and time picker
		$('#reservationdatetime').datetimepicker({
			icons: {
				time: 'far fa-clock'
			}
		});
	})

	////////////VALIDACION BOTON IMPRIMIR PDF/////////////////////////////////
	function validarInput() {
		//var fechaI = $('[name=fecha_inicio]').val();
		//var fechaF = $('[name=fecha_final]').val();
		var Usuario = $('[name=list_usuariosDIRECTA]').val();
		//	if (fechaI == null || fechaI == "" || fechaF == null || fechaF == "" || Usuario == null || Usuario == "") {
		if (Usuario == null || Usuario == "") {
			$('#pdfReport').prop('disabled', true);
		} else {
			$('#pdfReport').prop('disabled', false);
		}
	//	console.log(fechaI + "-" + fechaF + "-" + Usuario + "-");
	}
	/*=============================================
      Section DERIVAR HOJA DE RUTA EXTERNA
	=============================================*/


	function ListaTecnicos() {
		limpiarControlesSelect();
		$.ajax({
				url: "<?php echo site_url('TechnicalControl/fetchDataListTechnical'); ?>/",
				beforeSend: function() {},
				success: function(data) {
					var obj = JSON.parse(data);

					console.log(obj);
					if (obj == '')
						var content = '<option value="0" selected="selected">No Existe Funcionario Habilitado</option>';
					else
						var content = '<option value="0" selected="selected">Seleccionar Funcionario</option>';
					for (var i = 0; i < obj.length; i++) {
						content += '<option value="' + obj[i].usu_rol_id + '">';
						content += obj[i].usu_nombres + " " + obj[i].usu_apellidos+ ' - ' + obj[i].usu_rol_cargo;;
						content += '</option>';
					}
					$('#list_usuariosDIRECTA').html(content);
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
	}

	///////////////////////////////////////////////////////////////////////
	//Limpiar campos Formulario VentanillaUnica
	function limpiarControlesSelect() {
		$("select#list_usuariosDIRECTA option").each(function() {
			$(this).remove();
		});
	}
	//////////////////////////////////////////////////////////
	function VerPDF() {
		var site = '<?= site_url("PdfControl/Reportes_Iframe_Secretary") ?>';
		document.getElementById('iframeReport').src = site;
	}

	//////////////////////////////////////////////////
	//////////////////////////////////////////////////////////
	function limpiarInputsConsulta() {
	
		$('#Form_ReportesSecretary')[0].reset();
		document.getElementById('iframeReport').src = "";
	}

	//////////////////////////////////////////////////
</script>
</body>

</html>