<script>
	//GENERAR HOJA DE RUTA PDF
	function generarPDF_sobrescribirhojaderuta(cor_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRuta') ?>", {
				cor_id_pdf: cor_id,
				hdr_pdf: 'sobrescribir'
			},
			"POST", "_blank");
	}

	function generarPDF_hojaderuta(cor_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRuta') ?>", {
				cor_id_pdf: cor_id,
				hdr_pdf: 'imprimir'
			},
			"POST", "_blank");
	}
	function generarPDF_sobrescribirhojaderutaProccess_VI_SMGI(cor_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaProcess_VI_SMGI') ?>", {
				cor_id_pdf: cor_id,
				hdr_pdf: 'sobrescribir'
			},
			"POST", "_blank");
	}

	function generarPDF_hojaderutaProccess_VI_SMGI(cor_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaProcess_VI_SMGI') ?>", {
				cor_id_pdf: cor_id,
				hdr_pdf: 'imprimir'
			},
			"POST", "_blank");
	}
	function generarPDF_sobrescribirhojaderutaHistorialBandejaSMGI(cor_id,his_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaHistorialBandejaSMGI') ?>", {
				his_id_pdf: his_id,
				cor_id_pdf: cor_id,
				hdr_pdf: 'sobrescribirHistorial'
			},
			"POST", "_blank");
	}

	function generarPDF_hojaderutaHistorialBandejaSMGI(cor_id,his_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaHistorialBandejaSMGI') ?>", {
				his_id_pdf: his_id,
				cor_id_pdf: cor_id,
				hdr_pdf: 'imprimirHistorial'
			},
			"POST", "_blank");
	}
	function generarPDF_sobrescribirhojaderutaHistorial(cor_id,his_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaHistorial') ?>", {
				his_id_pdf: his_id,
				cor_id_pdf: cor_id,
				hdr_pdf: 'sobrescribirHistorial'
			},
			"POST", "_blank");
	}

	function generarPDF_hojaderutaHistorial(cor_id,his_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaHistorial') ?>", {
				his_id_pdf: his_id,
				cor_id_pdf: cor_id,
				hdr_pdf: 'imprimirHistorial'
			},
			"POST", "_blank");
	}

	function generarPDF_sobrescribirhojaderutaCabecera(cor_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaCabecera') ?>", {
				cor_id_pdf: cor_id,
				hdr_pdf: 'sobrescribir'
			},
			"POST", "_blank");
	}

	function generarPDF_hojaderutaCabecera(cor_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaCabecera') ?>", {
				cor_id_pdf: cor_id,
				hdr_pdf: 'imprimir'
			},
			"POST", "_blank");
	}

	function generarPDF_sobrescribirhojaderutaCuerpo(cor_id,his_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaCuerpo') ?>", {
			his_id_pdf: his_id,
				cor_id_pdf: cor_id,
				hdr_pdf: 'sobrescribir'
			},
			"POST", "_blank");
	}
	function generarPDF_hojaderutaCuerpo(cor_id,his_id) {
		$.redirect("<?= site_url('/PdfControl/generarPDF_HojaDeRutaCuerpo') ?>", {
			his_id_pdf: his_id,
				cor_id_pdf: cor_id,
				hdr_pdf: 'imprimir'
			},
			"POST", "_blank");
	}
	/*=============================================
  		FUNCTION REPORTE DESTINO HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/

	function ReporteDestino(cor_id, pend_id) {
		$.redirect("<?= site_url('/PdfControl/ReportesDestino') ?>", {
				cor_id_pdf: cor_id,
				pend_id_pdf: pend_id,
				hdr_pdf: 'sobrescribirDestino'
			},
			"POST", "_blank");
	}
		/*=============================================
  		FUNCTION REPORTE DESTINO HOJA DE RUTA(CORRESPONDENCIA)
	=============================================*/
	function ReporteDestino_VentInterna_SMGI(cor_id, pend_id) {
		$.redirect("<?= site_url('/PdfControl/ReportesDestinoVentInternaBandeja') ?>", {
				cor_id_pdf: cor_id,
				pend_id_pdf: pend_id,
				hdr_pdf: 'sobrescribirDestinoVentInternaBandeja'
			},
			"POST", "_blank");
	}
</script>