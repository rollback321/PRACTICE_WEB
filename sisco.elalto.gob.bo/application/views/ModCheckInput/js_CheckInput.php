<script>
////////////////////////////////////////////
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

////////////////////////////////////////////////////


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
</script>