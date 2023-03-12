<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VentanillaInternaControlSMGI extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		/*===================================
      =            Section PDF            =
      ===================================*/
		/*$this->load->library('pdf_reporte');
	 /*=====  End of Section PDF  ======*/
		$this->load->model('Model_Proveido');
		$this->load->model('Model_Secretary');
		$this->load->model('Model_PDF');
		$this->load->model('Model_Jefe');
		$this->load->model('Model_Correspondencia');
		$enable = $this->session->userdata('usu_rol_estado');

		if ($enable == null)
			redirect('/Welcome', 'refresh');
	}

	/*===================================
      =            MENU            =
      ===================================*/
	//BANDEJA DE ENTRADA
	public function index()
	{
		$data['active'] = array("active", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-envelope-square"></i> Bandeja Hoja de Ruta';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'VentanillaInternaControlSMGI/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaInternaSMGI/menu', $data);
		$this->load->view('ventanillaInternaSMGI/bandejaCorrespondencia', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('ModViewDetalles/viewDetalles');
		$this->load->view('ModViewRemitente/viewRemitente');
		$this->load->view('ModConcluirHoja/vModalConcluirHoja');
		$this->load->view('ModDestino/ModalDestino');
		$this->load->view('ModDerivacionInterna/DerivacionInterna_VentInternaBandeja_SMGI');

		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaInternaSMGI/js_receptionist_bandejaCorresp', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ventanillaInternaSMGI/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModViewHistorial/js_viewHistorial');
		$this->load->view('ModViewRemitente/js_viewRemitente');
		$this->load->view('ModDatatable/js_datatable_VentUnicaInternaBandeja');
		$this->load->view('ModViewDetalles/js_viewDetalles');
		$this->load->view('ModConcluirHoja/js_ModalConcluirHoja_VentInterna_SMGI');
		$this->load->view('ModAceptacion/js_Aceptacion_VentInterna_SMGI');
		$this->load->view('ModRechazo/js_Rechazo_VentInterna_SMGI');
		$this->load->view('ModDestino/js_ModalDestino_VentInterna_SMGI');
		$this->load->view('ModRetractar/js_retractar_VentInterna_SMGI');
		$this->load->view('ModViewArchivos/js_viewArchivos');
		$this->load->view('ModDerivacionInterna/js_DerivacionInterna_VentInternaBandeja_SMGI');
		$this->load->view('ModDesconcluirHoja/js_DesconcluirHoja_VentInterna_SMGI');
	}

	public function crearHojaRuta()
	{
		/*Data_select SECRETARIAS*/
		$dependecia['data_nivel1'] = $this->Model_Correspondencia->listarS(0);
		/*Data_select DIRECCIONES*/
		$dependecia['data_nivel2'] = $this->Model_Correspondencia->listarD(0);
		/*Data_select UNIDADES*/
		$dependecia['data_nivel3'] = $this->Model_Correspondencia->listarU(0);
		$data['active'] = array("", "active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-signature"></i> Crear Hoja de Ruta';
		$dependecia['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'VentanillaInternaControlSMGI/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaInternaSMGI/menu', $data);
		$this->load->view('ventanillaInternaSMGI/crearHojaRuta', $dependecia);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModCrearHojaRuta/CrearHojaRuta_VentInterna_SMGI');
		$this->load->view('ModEditarHojaRuta/EditarHojaRuta_VentInterna_SMGI');
		$this->load->view('ModDestino/ModalDestino');
		$this->load->view('ModProcedencia/ViewProcedencia');
		$this->load->view('ModViewDetalles/viewDetallesVentUnicaExterna');
		$this->load->view('ModDerivacionInterna/DerivacionInterna_VentExterna');

		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaInternaSMGI/js_ventanilla_interna', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ventanillaInternaSMGI/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModDropzone/js_Dropzone_VentInterna_SMGI');
		$this->load->view('ModDatatable/js_datatable_VentUnicaInterna');
		$this->load->view('ModCrearHojaRuta/js_CrearHojaRuta_VentInterna_SMGI');
		$this->load->view('ModEditarHojaRuta/js_EditarHojaRuta_VentInterna_SMGI');
		$this->load->view('ModDestino/js_ModalDestino');
		$this->load->view('ModCheckInput/js_CheckInput');
		$this->load->view('ModProcedencia/js_ViewProcedencia');
		$this->load->view('ModViewDetalles/js_viewDetallesVentUnicaExterna');
		$this->load->view('ModDerivacionInterna/js_DerivacionInterna_VentExterna');
		$this->load->view('ModViewArchivos/js_viewArchivos');
	}
	//BUSCAR HOJA DE RUTA
	public function reportes()
	{
		$data['active'] = array("", "", "active", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-pdf"></i> Reportes';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'VentanillaInternaControlSMGI/reportes';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaInternaSMGI/menu', $data);
		$this->load->view('ventanillaInternaSMGI/reportes', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaInternaSMGI/js_reportes', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ventanillaInternaSMGI/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function contactos()
	{
		$data['active'] = array("", "",  "", "active", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-phone-alt"></i> Buscar Contactos G.A.M.E.A.';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'VentanillaInternaControlSMGI/contactos';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaInternaSMGI/menu', $data);
		$this->load->view('ModContactos/contactos', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ModContactos/js_contactos', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ventanillaInternaSMGI/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//BUSCAR HOJA DE RUTA
	public function searchHojaRuta()
	{
		$data['active'] = array("", "", "", "", "active", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-search-location"></i> Buscar Hoja de Ruta';
		$DireccionURL['url'] = 'VentanillaInternaControlSMGI/searchHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaInternaSMGI/menu', $data);
		$this->load->view('ModSearch/searchHojaRuta');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModSearch/js_receptionist_search', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ventanillaInternaSMGI/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('reports/js_pdf');
	}
	//TUTORIALES
	public function tutoriales()
	{
		$data['active'] = array("", "", "", "", "", "active");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fab fa-youtube"></i> Tutoriales';
		$DireccionURL['url'] = 'VentanillaInternaControlSMGI/tutoriales';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaInternaSMGI/menu', $data);
		$this->load->view('ModTutoriales/vtutoriales');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModTutoriales/js_receptionist_videos', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ventanillaInternaSMGI/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function DerivarCopias($a, $b)
	{
		$data['active'] = array("", "active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('VentanillaInternaControlSMGI/crearHojaRuta/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Crear Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivar con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '  ORIGINAL' . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$DireccionURL['url'] = 'VentanillaInternaControlSMGI/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaInternaSMGI/menu', $data);
		$this->load->view('ventanillaInternaSMGI/vdcopias', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaInternaSMGI/js_dcopias', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ventanillaInternaSMGI/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}


	public function RecepcionDerivarCopias($a, $b, $c, $d, $e)
	{
		$data['active'] = array("active", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('VentanillaInternaControlSMGI/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Bandeja Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivar con Copias <span title="3 New Messages" class="badge bg-success " >' . $d . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$data3['datos3'] = $c;
		$data3['datos4'] = $d;
		$data3['datos5'] = $e;
		$DireccionURL['url'] = 'VentanillaInternaControlSMGI/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaInternaSMGI/menu', $data);
		$this->load->view('ventanillaInternaSMGI/vdcopiasReception', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ventanillaInternaSMGI/js_dcopiasReception', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ventanillaInternaSMGI/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}


	/*=====  End of Section PDF  ======*/
	function fetchInbox()
	{
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchInbox();
		$origen = "";
		foreach ($data as $key => $value) {
			if ($value['accion'] === 'R')
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			elseif ($value['accion'] === 'D')
				$accion = '<b>DERIVADA</b>';
			else
				$accion = '<b>ACEPTADA</b>';
			if ($value['origen'] == 'O')
				$origen = " ORIGINAL";
			if ($value['origen'] == 'C')
				$origen = " COPIA " . $value['nro_copia'] . "";
			$dateDerive = new DateTime($value['a_fecha']);
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['a_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoCompleto = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ' . $origen;
			if ($fecha_actual <= $dateEnd)
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			else
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			$result['data'][$key] = array(
				// '<div class="icheck-primary">
				// 	<input type="checkbox" name="ckbox[]" onclick="VerCheckboxEntrada()"  id="' . $value['his_id'] . '" value="' . $value['his_id'] . '">
				// 		<label for="' . $value['his_id'] . '"></label>
				// </div>',
				'<div class="btn-group">
                      <button type="button" id="ButtonAceptVI_SMGI" onclick="accept(' . $value['his_id'] . ',\'' . $codigoCompleto  . '\')" class="btn btn-primary btn-sm"><span style="font-size: 12px;"><i class="fas fa-check-square"></i> Aceptar</span></button>
                      <button type="button" id="ButtonDenyVI_SMGI" onclick="deny(' . $value['his_id'] . ',\'' . $codigoCompleto  . '\')"  class="btn btn-secondary btn-sm"><span style="font-size: 12px;"><i class="fas fa-window-close"></i> Rechazar</span></button>
                 </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">' . $codigo . '<br>' . $origen . '</span>',
				$accion,
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoCompleto. '\',\'' . 'Remitente'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Remitente</span> </button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['a_plazo'] . ' (dias)<br>' . $value['a_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				$value['a_obs'],
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' .$codigo.' '.$origen. '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoCompleto  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}


	public function fetchReception()
	{
		$result = array('data' => array());
		$origen = "";
		$data = $this->Model_Secretary->fetchReceptionVentanillaInternaSMGI();
		foreach ($data as $key => $value) {
			if ($value['reaccion'] === 'R') {
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			} elseif ($value['reaccion'] === 'D') {
				$accion = '<b>DERIVADA</b>';
			} else {
				$accion = '<b>ACEPTADA</b>';
			}

			if ($value['origen'] == 'O') {
				$origen = " ORIGINAL";
			}
			if ($value['origen'] == 'C') {
				$origen = " COPIA " . $value['nro_copia'] . "";
			}

			$Destino = $this->Model_Correspondencia->Model_DestinoVentInterna($value['cor_id']);
			$valor_destino = $Destino->id_d;
			$valor_Der_Pend = $Destino->pend_id;
			$dateDerive = new DateTime($value['r_fecha']);
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoCompleto = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '-' . $origen;
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['r_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();


			if ($fecha_actual <= $dateEnd) {
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			} else {
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			}

			if ($valor_destino == NULL || $valor_destino == 0) {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-secondary btn-sm"  onclick="AsignarDestino(' . $value['cor_id'] . ',' .$value['pend_id']. ',\'' . $codigoCompleto . '\')" data-target="#asignar_Destino" data-toggle="modal"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Sugerir Destino</span> </button>';
			} else {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' .$value['pend_id']. ',\'' . $codigoCompleto . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span></button>';
			}
			$result['data'][$key] = array(
			// 	'<div class="icheck-primary">
			// 	<input type="checkbox"  name="ReceptionCkbox[]" onclick="VerCheckboxReception()"   id="' . $value['pend_id'] . '" value="' . $value['pend_id'] . '">
			// 		<label for="' . $value['pend_id'] . '"></label>
			// </div>',
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="ConcluirHojaRuta(' . $value['cor_id'] . ',' . $value['his_id'] . ',' . $value['pend_id'] . ',' . $value['cor_estado'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' .$codigoCompleto  . '\')" data-target="#modal_ConcluirHoja" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Concluir Hoja de Ruta</a>  			
					<a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['cor_id'] . ',' . $value['his_id'] . ',' .  $valor_Der_Pend  . ',\'' . $codigoCompleto  . '\')"><i class="fas fa-download"></i>Derivacion a SMGI</a>
                    <a class="dropdown-item" href="' . site_url('VentanillaInternaControlSMGI/RecepcionDerivarCopias/' . $value['his_id'] . '/' .  $value['cor_id'] . '/' . $valor_Der_Pend . '/' . $codigo . '/' . $value['cor_tipo'] . '') . '" ><i class="fas fa-download"></i>Derivacion con Copias</a>
					
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">' . $codigo  . '<br>' . $origen . '</span>',
				$accion,
				$destinoResult,
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoCompleto. '\',\'' . 'Remitente'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Remitente</span> </button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['r_plazo'] . ' (dias)<br>' . $value['r_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				$value['a_obs'],
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' .$codigo.' '.$origen. '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoCompleto  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas <br>Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	public function fetchDerivadasBandeja()
	{
		$result = array('data' => array());
		$origen = "";
		$data = $this->Model_Secretary->fetchReceptionVentanillaInternaSMGIDerivadasBandeja();
		foreach ($data as $key => $value) {
			if ($value['reaccion'] === 'R') {
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			} elseif ($value['acciondp'] === 'P') {
				$accion = '<b>PENDIENTE</b>';
			} else {
				$accion = '<b>ACEPTADA</b>';
			}

			if ($value['origendp'] == 'O') {
				$origen = "ORIGINAL";
			}
			if ($value['origendp'] == 'C') {
				$origen = "COPIA " . $value['nro_copiadp'] . "";
			}

			$Destino = $this->Model_Correspondencia->Model_DestinoVentInternaBandejaVI_SMGI($value['pend_id']);
			$valor_destino = $Destino->id_d;
			$valor_Der_Pend = $Destino->pend_id;
			$valor_Destino_Pend = $Destino->id_r;
			$dateDerive = new DateTime($value['r_fecha']);
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoCompleto = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ' . $origen;
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['r_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();

			if ($fecha_actual <= $dateEnd) {
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			} else {
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			}

			if ($valor_destino == NULL || $valor_destino == 0) {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-secondary btn-sm"  onclick="AsignarDestino(' . $value['cor_id'] . ',' .$value['pend_id']. ',\'' . $codigoCompleto . '\')" data-target="#asignar_Destino" data-toggle="modal"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Sugerir Destino</span> </button>';
			} else {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' .$value['pend_id']. ',\'' . $codigoCompleto . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span></button>';
			}
			$result['data'][$key] = array(
			
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="retractar(' . $value['cor_id'] . ',' . $valor_Der_Pend  . ',\'' . $codigoCompleto  . '\')"><i class="fas fa-download"></i> Retractar</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">' . $codigo  . '<br>' . $origen . '</span>',
				$accion,
				$destinoResult,
				'<button type="button"  onclick="viewUser(' .$valor_Destino_Pend . ',' . $value['cor_id'] . ',\'' . $codigoCompleto. '\',\'' . 'Destinatario'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Destinatario</span> </button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['r_plazo'] . ' (dias)<br>' . $value['r_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				$value['a_obs'],
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' .$codigoCompleto . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}

	public function fetchDerivadas()
	{
		$result = array('data' => array());
		$origen = "";
		$data = $this->Model_Secretary->fetchReceptionVentanillaInternaSMGIDerivadas();
		foreach ($data as $key => $value) {
			if ($value['reaccion'] === 'R') {
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			} elseif ($value['reaccion'] === 'D') {
				$accion = '<b>DERIVADA</b>';
			} else {
				$accion = '<b>ACEPTADA</b>';
			}

			if ($value['origendp'] == 'O') {
				$origen = " ORIGINAL";
			}
			if ($value['origendp'] == 'C') {
				$origen = " COPIA " . $value['nro_copiadp'] . "";
			}

			$Destino = $this->Model_Correspondencia->Model_DestinoVentInterna($value['cor_id']);
			$valor_destino = $Destino->id_d;
			$valor_Der_Pend = $Destino->pend_id;
			$dateDerive = new DateTime($value['r_fecha']);
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoCompleto = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '-' . $origen;
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['r_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();

			if ($fecha_actual <= $dateEnd) {
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			} else {
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			}

			if ($valor_destino == NULL || $valor_destino == 0) {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-secondary btn-sm"  onclick="AsignarDestino(' . $value['cor_id'] . ',' .$value['pend_id']. ',\'' . $codigo . '\')" data-target="#asignar_Destino" data-toggle="modal"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Sugerir Destino</span> </button>';
			} else {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' .$value['pend_id']. ',\'' . $codigo . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span></button>';
			}
			$result['data'][$key] = array(
			
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['his_id'] . ',' . $value['cor_id'] . ',' .  $valor_Der_Pend  . ',\'' . $codigoCompleto  . '\')"><i class="fas fa-download"></i>Derivacion a SMGI</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">' . $codigo  . '<br>' . $origen . '</span>',
				$accion,
				$destinoResult,
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoCompleto . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i> Remitente</span></button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['r_plazo'] . ' (dias)<br>' . $value['r_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				$value['a_obs'],
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoCompleto  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" > <i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}

	public function fetchConcluidos()
	{
		$result = array('data' => array());
		$origen = "";
		$data = $this->Model_Secretary->Model_fetch_Concluidos_VentInterna_SMGI();
		foreach ($data as $key => $value) {
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '- ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];
			if ($value['origen'] == 'O')
				$origen = "<b>ORIGINAL</b>";
			if ($value['origen'] == 'C')
				$origen = "<b>COPIA " . $value['nro_copia'] . "</b>";

			$result['data'][$key] = array(
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="desconcluir('.$value['conclu_id'].',' . $value['cor_id'] . ',' . $value['his_id']. ',' . $value['pend_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigoTitle  . '\')" ><i class="fas fa-sign-in-alt"></i> Desconcluir</a>  
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '<br>' . $origen . '</span>',
				$value['cor_referencia'],
				$value['cor_descripcion'],
				$value['motivo'],
				$value['usu_nombres'] . ' ' . $value['usu_apellidos'],
				$value['fecha_action_at'],
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigoTitle . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoTitle  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}






	//CARGAR REGISTROS EN DATATABLE
	function fetch_Corresp() //Llamar al DataTable de HOJA DE RUTA ACTIVA
	{
		$result = array('data' => array());
		$data = $this->Model_Correspondencia->fetchCorrespModelVentanillaInterna();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Interna';
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoOriginal = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ORIGINAL';
			$id = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($id, null);
			$Destino = $this->Model_Correspondencia->Model_DestinoVentUnica($id);
			$Procedencia = $this->Model_Correspondencia->Model_SearchCorrespondenciaProcedencia($id);
			$valor_destino = $Destino->id_d;
			$valor_Procedencia = $Procedencia->cor_institucion;
			
			if ($valor_destino == NULL || $valor_destino == 0) {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-secondary btn-sm"  onclick="AsignarDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoOriginal . '\')" data-target="#asignar_Destino" data-toggle="modal"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Sugerir <br> Destino</span></button>';
			} else {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' .$value['pend_id']. ',\'' . $codigo . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span></button>';
			}
			if ($valor_Procedencia == NULL) {
				$ProcedenciaResult = '<button type="button" name="ButtonVerProcedencia" class="btn btn-outline-secondary btn-sm"  onclick="AsignarProcedencia(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoOriginal . '\')" data-target="#asignar_Procedencia" data-toggle="modal"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Asignar <br> Procedencia</span></button>';
			} else {
				$ProcedenciaResult = '<button type="button" name="ButtonVerProcedencia" class="btn btn-outline-primary btn-sm"  onclick="VerProcedencia(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoOriginal . '\')" data-target="#viewProcedencia"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Ver<br>Procedencia</span></button>';
			}
			$result['data'][$key] = array(
				// ' <div class="icheck-primary">
				// <input type="checkbox" name="ckbox[]" value="' . $value['cor_id'] . '" id="' . $value['cor_id'] . '" >
				// <label for="' . $value['cor_id'] . '"></label></div>',
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoOriginal . '\')" ><i class="fas fa-sign-in-alt"></i>Derivacion a SMGI</a>
					<a class="dropdown-item" href="' . site_url('VentanillaInternaControlSMGI/DerivarCopias/' . $value['cor_id'] . '/' . $codigo . '') . '" ><i class="fas fa-download"></i>Derivacion con Copias</a>
					<a class="dropdown-item" href="#" onclick="listarDatosHojaRuta(' .  $value['cor_id'] . ',\'' . $codigoOriginal . '\')" data-target="#editarHojaRuta" data-toggle="modal"><i class="fas fa-edit"></i> Editar</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja Ruta(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja Ruta(Imprimir)</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size:12px;">' . $codigo . '<br>ORIGINAL</span>',
				$ProcedenciaResult,
				$destinoResult,
				$value['cor_referencia'],
				$value['cor_descripcion'],
				$value['cor_nombre_remitente'],
				$value['cor_create_at'],
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',' . $value['pend_id'] .  ',\'' . $codigoOriginal  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}


	////////////////REUTILIZACION CODIGO///////
	//<a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#derivarHojaRutaInterna" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Derivacion Regular</a>
	///////////////////////////////////////////
	function fetch_CorrespProcess()
	{
		$result = array('data' => array());
		$data = $this->Model_Correspondencia->fetchCorrespModelProcessVentanillaInterna();

		foreach ($data as $key => $value) {

			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Interna';
			$codigoGamea = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$origen = ('O' == $value['origen'] || null == $value['origen']) ? ' ORIGINAL' : ' COPIA- ' . $value['nro_copia'];
			$a = $value['cor_id'];
			$Destino = $this->Model_Correspondencia->Model_DestinoVentUnica($a);
			$valor_destino = $Destino->id_d;
		
			if ($valor_destino == NULL || $valor_destino == 0) {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-secondary btn-sm"  onclick="AsignarDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigo . $origen . '\')" data-target="#asignar_Destino" data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" > <i class="fas fa-hotel"></i> Asignar Destino</span></button>';
			} else {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigo . $origen . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino <br>Sugerido</span></button>';
			}

			$result['data'][$key] = array(
				' <div class="btn-group-sm">
				<button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
				   Acciones
				 </button>
				 <div class="dropdown-menu" role="menu">
				 <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaProccess_VI_SMGI(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
				 <a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaProccess_VI_SMGI(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
				</div>
			   </div>',
				'<span class="badge badge-secondary" style="font-size:12px;">' . $codigo . '<br>' . $origen . '</span>',
				$destinoResult,
				$value['cor_referencia'],
				$value['cor_descripcion'],
				$value['cor_nombre_remitente'],
				$value['cor_institucion'],
				$value['cor_create_at'],
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',' . $value['pend_id'] .  ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_CorrespConcluded()
	{
		$result = array('data' => array());
		$data = $this->Model_Correspondencia->fetchCorrespModelConcluidVentanillaInterna();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Interna';
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$origen = ('O' == $value['origen'] || null == $value['origen']) ? ' ORIGINAL' : ' COPIA- ' . $value['nro_copia'];
			$result['data'][$key] = array(
				' <div class="btn-group-sm">
				<button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
				   Acciones
				 </button>
				 <div class="dropdown-menu" role="menu">
				 <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
				 <a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
				</div>
			   </div>',
			   '<span class="badge badge-secondary" style="font-size:12px;">' . $codigo . '<br>' . $origen . '</span>',
				$value['cor_referencia'],
				$value['cor_descripcion'],
				$value['cor_nombre_remitente'],
				$value['cor_institucion'],
				$value['cor_create_at'],
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',' . $value['pend_id'] .  ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	public function returnDateEnable($date, $plazo_entrega)
	{
		date_default_timezone_set('America/La_Paz');
		$dateCopy = $date;
		$c = 0;
		for ($i = 1; $i <= $plazo_entrega; $i++) {
			$c = $c + $this->Model_Secretary->returnDateEnable($date);
			$date = strtotime('+1 day', strtotime($date));
			$date = date('Y-m-d', $date);

			$numberDay = date("w", strtotime($date));
			if ($numberDay == "0" || $numberDay == "6")
				$c++;
		}
		$cant = $c + $plazo_entrega;
		$newDate = strtotime("+$cant day", strtotime($dateCopy));
		$newDate  = date('Y-m-d H:i:s', $newDate);

		return $newDate;
	}
	function registrarHojaRuta()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
		$dataRegHRRecepcion = array(
			'rec_fecha_recep' => strip_tags(trim($this->input->post('fecha_recep'))),
			'rec_doc_nro_fojas' => $this->input->post('nro_fojas'),
			'rec_cant_fojas' => $this->input->post('nro_cant_fojas'),
			'rec_cd_dvd' => $this->input->post('nro_cd_dvd'),
			'rec_cant_cd_dvd' => $this->input->post('nro_cant_cd_dvd'),
			'rec_sobres' => $this->input->post('sobres'),
			'rec_cant_sobres' => $this->input->post('sobres_cant'),
			'rec_carpetas' => $this->input->post('carpetas'),
			'rec_cant_carpetas' => $this->input->post('carpetas_cant'),
			'rec_anillados' => $this->input->post('anillados'),
			'rec_cant_anillados' => $this->input->post('anillados_cant'),
			'rec_doc_create_at' => $fecha
		);
		if ($this->Model_Correspondencia->insertHojaRutaRecepcion($dataRegHRRecepcion)) {
			$id_recepcion = $this->db->insert_id();
			$nro_codigoInput = $this->input->post('codigoNewHoja');
			$row = $this->Model_Correspondencia->row_gestion(date("Y"));
			$nro_codigo = $row->ges_nro_gestion_ventanilla_interna;
			$gestion_id = $row->ges_id;
			$institucion = strtoupper(strip_tags(trim($this->input->post('institucion_remitente'))));
			$dataRegistrarHojaRuta = array(
				'cor_codigo' => $nro_codigoInput,
				'cor_estado' => 1,
				'cor_tipo' => 'I',
				'cor_nivel' => strtoupper(strip_tags(trim($this->input->post('nivel')))),
				'cor_cite' => strtoupper(strip_tags(trim($this->input->post('cite')))),
				'cor_referencia' => strtoupper(strip_tags(trim($this->input->post('ref')))),
				'cor_descripcion' => strtoupper(strip_tags(trim($this->input->post('descrip_doc')))),
				'cor_observacion' => strtoupper(strip_tags(trim($this->input->post('obs_doc')))),
				'cor_nombre_remitente' => strtoupper(strip_tags(trim($this->input->post('nombre_remitente')))),
				'cor_cargo_remitente' => strtoupper(strip_tags(trim($this->input->post('cargo_remitente')))),
				'cor_institucion' => null,
				'cor_tel_remitente' => strip_tags(trim($this->input->post('nro_contacto'))),
				'gestion_ges_id' => $gestion_id,
				'recepcion_documento_rec_doc_id' => $id_recepcion,
				'cor_count' => 3,
				'usu_rol_id' => intval($this->session->userdata('usu_rol_id')),
				'cor_create_correspondencia' => strip_tags(trim($this->input->post('fecha_recep'))),
				'cor_plazo' => strip_tags(trim($this->input->post('Fecha_plazoCorrespondencia'))),
				'cor_create_at' => $fecha,
				'id_user' => $this->session->userdata('usu_id')
			);
			if ($this->Model_Correspondencia->insertHojaRutaCorrespondencia($dataRegistrarHojaRuta)) {
				$nro_codigo = (int)$nro_codigo + 1;
				$data_gestion = array('ges_nro_gestion_ventanilla_interna' => $nro_codigo,);
				$this->Model_Correspondencia->updateNumberGestion($gestion_id, $data_gestion);
				$user = $this->session->userdata('usu_id');
				$us = $this->Model_Correspondencia->idUltimoCorres($user);
				$id = $us->cor_id;
				$action = array(
					'tipo' => 'I',
					'estado' => 1,
					'origen' => 'O',
					'accion' => 'C',
					'a_plazo' =>  1,
					'a_fecha' => $fecha,
					'a_proveido' => null,
					'a_obs' => null,
					'r_plazo'  => null,
					'cor_id' => $id,
					'id_a' => $user,
					'id_r' => null,
					'id_d' => null,
					'pend_create_at' => $fecha,
					'pendfecha_insert_historial' => null,
				);
				if ($this->Model_Correspondencia->Model_derivarPendiente($action)) {
					echo '¡Hoja de Ruta Creada Correctamente!';
				} else
					echo 'Error de Insercion en la Base de Datos';
			} else
				echo 'Error de Insercion en la Base de Datos';
		} else {
			echo 'Error de Insercion en la Base de Datos';
		}
	}



	//MODIFICAR HOJA DE RUTA
	function modificarHojaRuta()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);

		$row = $this->Model_Correspondencia->listarDatosCorrespModel($this->input->post('varcor_id'));
		$nro_cantidad = $row->cor_count;
		$cor_id = $this->input->post('varcor_id');
		$nivel = strip_tags(trim($this->input->post('nivel_edit')));
		if (!empty($_FILES['NuevoArchivo']['name'])) {
			$nombreOriginal = $_FILES['NuevoArchivo']['name'];
			$config['upload_path'] = './assets/upload/documents/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '2048';
			$config['file_name'] = $_FILES['NuevoArchivo']['name'];
			$config['encrypt_name'] = TRUE;
			if (!is_dir($config['upload_path'])) {
				die("El directorio de carga no existe");
			}
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('NuevoArchivo')) {
				$uploadData = $this->upload->data();
				$user = $this->session->userdata('usu_id');
				$nombreEncriptado = $uploadData['file_name'];
				$fecha = $fecha;
				$this->Model_Correspondencia->ModelSubirDocumento($user, $nombreEncriptado, $nombreOriginal, $fecha, $cor_id);
			} else {
				echo 'error';
			}
		}
		$dataModificarHRRecepcion = array(
			'rec_fecha_recep' => strip_tags(trim($this->input->post('fecha_recep_edit'))),
			'rec_doc_nro_fojas' => $this->input->post('nro_fojas_edit'),
			'rec_cant_fojas' => $this->input->post('nro_cant_fojas_edit'),
			'rec_cd_dvd' => $this->input->post('nro_cd_dvd_edit'),
			'rec_cant_cd_dvd' => $this->input->post('nro_cant_cd_dvd_edit'),
			'rec_sobres' => $this->input->post('sobres_edit'),
			'rec_cant_sobres' => $this->input->post('sobres_cant_edit'),
			'rec_carpetas' => $this->input->post('carpetas_edit'),
			'rec_cant_carpetas' => $this->input->post('carpetas_cant_edit'),
			'rec_anillados' => $this->input->post('anillados_edit'),
			'rec_cant_anillados' => $this->input->post('anillados_cant_edit'),
			'rec_doc_update_at' => $fecha
		);

		if (!empty($this->input->post('varcor_id')) && !empty($this->input->post('varrec_doc_id'))) {
			$this->Model_Correspondencia->modificarHojaRutaRecepcion((int)$this->input->post('varrec_doc_id'), $dataModificarHRRecepcion);
			$id_recepcion = $this->input->post('varrec_doc_id');
			$dataModificarHojaRuta = array(
				'cor_codigo' => trim($this->input->post('codigoNewHoja_Edit')),
				'cor_estado' => 1,
				'cor_cite' => strtoupper(strip_tags(trim($this->input->post('cite_edit')))),
				'cor_referencia' => strtoupper(strip_tags(trim($this->input->post('ref_edit')))),
				'cor_descripcion' => strtoupper(strip_tags(trim($this->input->post('descrip_doc_edit')))),
				'cor_observacion' => strip_tags(trim($this->input->post('obs_doc_edit'))),
				'cor_nombre_remitente' => strtoupper(strip_tags(trim($this->input->post('nombre_remitente_edit')))),
				'cor_cargo_remitente' => strtoupper(strip_tags(trim($this->input->post('cargo_remitente_edit')))),
				//	'cor_institucion' => strtoupper(strip_tags(trim($this->input->post('institucion_remitente_edit')))),
				'cor_tel_remitente' => strip_tags(trim($this->input->post('nro_contacto_edit'))),
				'recepcion_documento_rec_doc_id' => $id_recepcion,
				'cor_count' => $nro_cantidad - 1,
				'usu_rol_id' => intval($this->session->userdata('usu_rol_id')),
				'cor_nivel' =>  $nivel,
				'cor_create_correspondencia' => strip_tags(trim($this->input->post('fecha_recep_edit'))),
				'cor_plazo' => strip_tags(trim($this->input->post('Fecha_plazoCorrespondencia_Edit'))),
				'cor_update_at' => $fecha
			);
			if ($this->Model_Correspondencia->modificarHojaRutaCorrespondencia((int)$this->input->post('varcor_id'), $dataModificarHojaRuta)) {
				echo '¡Hoja de Ruta Actualizado Correctamente!';
			} else {
				echo 'Error al actualizar la Hoja de Ruta';
			}
		}
		//	echo $nivel;
	}



	public function Retractar_HojaRuta_VentanillaInternaSMGI_Bandeja()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id')));
		$pend_id = strip_tags(trim($this->input->post('pend_id')));
		$codigo = strip_tags(trim($this->input->post('codigo')));

		if (	$this->Model_Secretary->updateDerivacionPendienteRechazar_VI_SMGI(array('accion' => 'C', 'estado' => 1), $pend_id)) {
			echo '¡Hoja de Ruja ' . $codigo . ' Retractada!';
		} else
			echo "Existe Problemas en la Derivacion!";
	}

	public function DerivacionPendientesCopias()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = $this->input->post('cor_idTab');
		$recepcionista = $this->input->post('recepcionista');
		$responsable = intval($this->input->post('usuInterno_id'));
		$contador = $this->input->post('contador');
		$proveido = $this->input->post('proveido');
		$Observacion = $this->input->post('Observacion');
		$plazo = $this->input->post('plazo');
		$origen1 = "";
		$numCopia = 0;
		for ($k = 0; $k < $contador; $k++) {
			if ($k == 0) {
				$origen1 = "O";
				$numCopia = NULL;
				$actionUpdate = array(
					'origen' =>  $origen1,
					'nro_copia' => $numCopia,
					'accion' => 'P',
					'r_plazo' => $plazo[$k],
					'a_fecha' => $a_fecha,
					'a_proveido' => $proveido[$k],
					'a_obs' => $Observacion[$k],
					'id_a' => intval($this->session->userdata('usu_rol_id')),
					'id_r' => $responsable,
					'id_d' => $recepcionista[$k],
				);
				$this->Model_Correspondencia->ModelUpdateDerivacionCopiasVentanilla($cor_id[$k], $actionUpdate);
				$k = $k + 1;
			}
			if ($k > 0) {
				$origen1 = "C";
				$numCopia = $numCopia + 1;
			}
			$action[] = [
				'tipo' => 'E',
				'estado' => 1,
				'origen' =>  $origen1,
				'nro_copia' => $numCopia,
				'accion' => 'P',
				'a_plazo' => $plazo[$k],
				'r_plazo' => $plazo[$k],
				'a_fecha' => $a_fecha,
				'a_proveido' => $proveido[$k],
				'a_obs' => $Observacion[$k],
				'cor_id' => $cor_id[$k],
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => $responsable,
				'id_d' => $recepcionista[$k],
				'pend_create_at' => $a_fecha,
			];
		}
		if ($this->Model_Correspondencia->Model_deriveCopiasPendientes($action)) {
			echo "Derivacion Con Copias Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}


	public function DerivacionPendientesCopiasBandeja()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = $this->input->post('cor_idTab'); //array()
		$his_id =  intval($this->input->post('his_id'));
		$pend_id = intval($this->input->post('pend_id'));
		$cor_tipo = $this->input->post('cor_tipo');
		$contadordeArray = count(array($cor_id));
		$recepcionista = $this->input->post('recepcionista');
		$responsable = intval($this->input->post('usuInterno_id'));
		$contador =intval( $this->input->post('contador'));
		$proveido = $this->input->post('proveido');
		$Observacion = $this->input->post('Observacion');
		$plazo = $this->input->post('plazo');
		$data = $this->Model_Correspondencia->Model_ObtenerOriginalCopiasDp_Bandeja_VI_SMGI($pend_id);
		$datoOriginal = $data->origen;
		$maximocopia = $data->maxcopia;

		if ($maximocopia == null || $maximocopia == 0) {
			$numCopia = 0;
		} else {
			$numCopia = $maximocopia;
		}

		for ($k = 0; $k < $contador; $k++) {
			if ($k == 0) {
				$ModificarPend = array(
					'origen' => $datoOriginal,
					'nro_copia' => $maximocopia,
					'tipo' => $cor_tipo,
					'accion' => 'P',
					'a_proveido' => $proveido[$k],
					'a_obs' => $Observacion[$k],
					'r_plazo'  => $plazo[$k],
					'his_id' => $his_id,
					'id_r' => $responsable,
					'id_d' => $recepcionista[$k],
					'pend_create_at' => $a_fecha,
				);
				if($this->Model_Correspondencia->ModelUpdateDerivacionCopiasVentanillaInternaBandeja($pend_id, $ModificarPend)){
					$k = $k + 1;
				}
				
			}

			$origen1 = "C";
			$numCopia = $numCopia + 1;

			$action[] = [
				'origen' => $origen1,
				'nro_copia' => $numCopia,
				'tipo' => $cor_tipo,
				'estado' => 1,
				'origen' =>  $origen1,
				'nro_copia' => $numCopia,
				'accion' => 'P',
				'a_plazo' => $plazo[$k],
				'r_plazo' => $plazo[$k],
				'a_fecha' => $a_fecha,
				'a_proveido' => $proveido[$k],
				'a_obs' => $Observacion[$k],
				'cor_id' => intval($cor_id[$k]),
				'his_id' => $his_id,
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => $responsable,
				'id_d' => $recepcionista[$k],
				'pend_create_at' => $a_fecha,
			];
			if ($this->Model_Correspondencia->Model_deriveCopiasPendientes($action)) {
				echo "Derivacion Con Copias Correcta!";
			} else {
				echo "Existe Problemas en la Derivacion!";
			}
		}
		//echo json_encode($contador );
	}


	public function ValidarCodigoVI_SMGI()
	{
		$codigo = $this->input->post('codigo');
		$data = $this->Model_Correspondencia->Model_ValidarCodigoVI_SMGI($codigo);
		echo json_encode($data);
	}



	function AsignarDestino()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id_Hoja')));
		$codigo = strip_tags(trim($this->input->post('codigo_Hoja')));
		$action = array(
			'a_proveido' => strtoupper(strip_tags(trim($this->input->post('prov_asigDestino')))),
			'a_obs' => strtoupper(strip_tags(trim($this->input->post('obs_asigDestino')))),
			'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoDestino'))),
			'id_r' => intval($this->input->post('list_usuarioss')),
		);
		if ($this->Model_Correspondencia->AsignarDestino($action, $cor_id)) {
			echo "Asignacion de Hoja de Ruta  " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Asignacion!";
	}

	//MODIFICAR HOJA DE RUTA
	function EditarDestino()
	{
		$id = $this->input->post('cor_id_HojaEditar');
		$dataModificarDestino = array(
			'a_proveido' => strtoupper(strip_tags(trim($this->input->post('prov_EditDestino')))),
			'a_obs' => strtoupper(strip_tags(trim($this->input->post('obs_EditDestino')))),
			'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoEditDestino'))),
			'id_r' => trim($this->input->post('list_usuariosss'))
		);
		if ($this->Model_Correspondencia->ModelUpdateDestino($id, $dataModificarDestino)) {
			echo '¡Destino Editado Correctamente!';
		} else
			echo "Existe Problemas en la  Edicion del Destino !";
	}



	function AsignarProcedencia()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id_HojaProcedencia')));
		$codigo = strip_tags(trim($this->input->post('codigo_HojaProcedencia')));
		$UserProcedencia = $this->Model_Correspondencia->Model_SearchUserProcedencia(strip_tags(trim($this->input->post('list_usuariosProcedencia'))));
		$DependeciaFinal = $UserProcedencia->usu_dependencia;
		$DepFinaltexto = $DependeciaFinal . " (VENT. INTERNA)";


		$action = array(
			'cor_institucion' => $DepFinaltexto,
		);
		if ($this->Model_Correspondencia->ModelUpdateProcedencia($action, $cor_id)) {
			echo "Asignacion de Hoja de Ruta  " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Asignacion!";
	}

	function EditarProcedencia()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_idProcedenciaEditar')));
		$UserProcedencia = $this->Model_Correspondencia->Model_SearchUserProcedencia(strip_tags(trim($this->input->post('list_usuariosProcedenciaEditar'))));
		$DependeciaFinal = $UserProcedencia->usu_dependencia;
		$DepFinaltexto = $DependeciaFinal . " (VENT. INTERNA)";
		$dataModificarProcedencia = array(
			'cor_institucion' => $DepFinaltexto,
		);
		if ($this->Model_Correspondencia->ModelUpdateProcedencia($dataModificarProcedencia, $cor_id)) {
			echo '¡Procedencia Modificado Correctamente!';
		} else
			echo "Existe Problemas en la  Edicion de la Procedencia !";
	}



	public function acceptHojaRuta($his_id, $codigo)
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$r_fecha = date("Y-m-d H:i:s", $time);

		if ($this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'r_fecha' => $r_fecha, 'reaccion' => 'A'), $his_id)) {
			if ($this->Model_Secretary->RegisterCorrespAccept($his_id)) {
				echo '¡Hoja de Ruta Aceptada!';
			} else {
				echo 'Error en Aceptar Hoja de Ruta! en la segunda tabla';
			}
		} else {
			echo 'Error en Aceptar Hoja de Ruta!';
		}
	}
	
	function acceptForDerivacionPendiente($his_id, $codigo)
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$data = $this->Model_Correspondencia->Historial_General($his_id);
		$action = array(
			'tipo' => 'I',
			'estado' => 1,
			'origen' => $data->origen,
			'nro_copia' => $data->nro_copia,
			'accion' => 'C',
			'a_plazo' =>  null,
			'a_fecha' => $a_fecha,
			'a_proveido' => null,
			'a_obs' => null,
			'cor_id' => $data->cor_id,
			'his_id' => $his_id,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'pend_create_at' => $a_fecha,
		);
		if ($this->Model_Correspondencia->Model_derivarPendiente($action)) {
			echo "Aceptacion de Hoja de Ruta  Correcta!";
		} else
			echo "Existe Problemas en la Aceptacion!";
	}











	function derivarHojaRutaPendienteCorId()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id_interno')));
		if ($this->Model_Correspondencia->ModelUpdateDerivacionPendiente(array('accion' => 'P'), $cor_id)) {
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
			echo '¡Derivacion Realizada Correctamente!';
		}
	}

	function derivarHojaRutaPendiente()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id_Hoja')));
		$codigo = strip_tags(trim($this->input->post('codigo_Hoja')));
		$action = array(

			'tipo' => 'E',
			'estado' => 1,
			'origen' => 'O',
			'accion' => 'P',
			'a_plazo' =>  strip_tags(trim($this->input->post('prevFecha_plazoD'))),
			'a_fecha' => $a_fecha,
			'a_proveido' => strtoupper(strip_tags(trim($this->input->post('prev_descripcion')))),
			'a_obs' => strtoupper(strip_tags(trim($this->input->post('prev_observacion')))),
			'cor_id' => $cor_id,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('list_usuarios')),
		);
		if ($this->Model_Correspondencia->Model_derivarPendiente($action)) {
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
			echo "Derivacion de Hoja de Ruta  " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}


	function derivarHojaRutaInternaGestion()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id_interno')));
		$codigo = strip_tags(trim($this->input->post('codigo_interno')));
		$action = array(
			'origen' => 'O',
			'accion' => 'D',
			'a_plazo' => 1,
			'a_fecha' => $a_fecha,
			'a_proveido' => strtoupper(strip_tags(trim($this->input->post('prev_descripcion')))),
			'a_obs' => strtoupper(strip_tags(trim($this->input->post('prev_observacion')))),
			'reaccion' => null,
			'r_plazo'  => 1,
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('usuInterno_id2')),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
			echo "Derivacion " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}





/////////////////// BORRAR/////////////////////
	// function derivarHojaRutaPendienteCorIdBandejaVI_SMGI()
	// {
	// 	$cor_id = strip_tags(trim($this->input->post('cor_id_interno')));
	// 	$his_id = strip_tags(trim($this->input->post('his_id_interno')));
	// 	$id_r = strip_tags(trim($this->input->post('usuInterno_id')));
	// 	if ($this->Model_Correspondencia->ModelUpdateDerivacionPendiente(array('accion' => 'P', 'id_r' => $id_r, 'his_id' => $his_id), $cor_id)) {
	// 		//	$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
	// 		echo '¡Derivacion Realizada Correctamente!';
	// 	}
	// }
//////////////////////////////////////////////////////////////////

	
	function derivarHojaRutaPendienteCorIdBandejaVI_SMGI()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id_interno')));
		$his_id = strip_tags(trim($this->input->post('his_id_interno')));
		$pend_id = strip_tags(trim($this->input->post('pend_id_interno')));
		$id_r = strip_tags(trim($this->input->post('usuInterno_id')));
		if ($this->Model_Correspondencia->ModelUpdateDerivacionPendiente_VI_BandejaRecepction(array('accion' => 'P', 'id_r' => $id_r, 'his_id' => $his_id), $pend_id )) {
			//	$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
			echo '¡Derivacion Realizada Correctamente!';
		}
	}
	function derivarHojaRutaInternaMultiple()
	{
		$stich = 0;
		//	$cadena =json_encode($this->input->post('cor_id_Array'));
		$cadena = $this->input->post('cor_id_Array');
		$cantidad = $this->input->post('cor_id_ArrayCantidad');
		$myArray = json_decode($cadena, true);

		for ($i = 0; $i < $cantidad; $i++) {
			date_default_timezone_set('America/La_Paz');
			$time = time();
			$a_fecha = date("Y-m-d H:i:s", $time);
			$action = array(
				'origen' => 'O',
				'accion' => 'D',
				'a_plazo' => 1,
				'a_fecha' => $a_fecha,
				'a_proveido' => strip_tags(trim($this->input->post('a_provMultiple'))),
				'a_obs' => strip_tags(trim($this->input->post('a_obsMultiple'))),
				'reaccion' => null,
				'r_plazo'  => strip_tags(trim($this->input->post('prevFecha_plazoMultiple'))),
				'r_fecha' => null,
				'r_descrip_rechazo' => null,
				'cor_id' => $myArray[$i],
				'bandeja' => 1,
				'recepcion' => 1,
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => intval($this->input->post('usuInterno_idGestion')),
			);
			if ($this->Model_Secretary->deriveExternal($action)) {
				$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $myArray[$i]);
				// echo "Derivacion Interna Multiple de Hoja de Ruta  Correcta!";
				$stich = 1;
			} else
				$stich = 0;
		}

		if ($stich == 1) {
			echo "Derivacion Interna Multiple de Hoja de Ruta  Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}

	//BUSCAR DEPENDENCIA PROCEDENCIA CORRESPONDENCIA//
	public function BuscarDependeciaProcedencia()
	{
		$cor_id = $this->input->post('cor_id');
		$data = $this->Model_Correspondencia->Model_SearchCorrespondenciaProcedencia($cor_id);
		echo json_encode($data);
	}

	public function BuscarDependeciaProcedenciaYDestinoForDerivar()
	{
		$cor_id = $this->input->post('cor_id');
		$pend_id = $this->input->post('pend_id');
		$data_n1 = $this->Model_Correspondencia->Model_Destino($cor_id, $pend_id);
		$data_n2 = $this->Model_Correspondencia->Model_Procedencia($cor_id, $pend_id);
		$data = array(
			"data_n1" => $data_n1,
			"data_n2" => $data_n2,
		);
		echo json_encode($data);
	}

	//PARA DERIVAR DIRECTAMENTE//
	public function dependencyListLevel_1Directo()
	{
		$data = $this->Model_Secretary->dependencyListLevel_1Directo();
		echo json_encode($data);
	}
	public function dependencyListLevel_2_IDDirecto($niv1)
	{
		if ($niv1 == 1) {
			$data_n1 = $this->Model_Secretary->dependencyListLevel_2Directo($niv1);
			$data_n2 = $this->Model_Secretary->listUsersLevel_1DirectoGestionSecretary($niv1);
			$data = array(
				"data_n1" => $data_n1,
				"data_n2" => $data_n2,
			);
			echo json_encode($data);
		} else {
			$data_n1 = $this->Model_Secretary->dependencyListLevel_2Directo($niv1);
			$data_n2 = $this->Model_Secretary->listUsersLevel_1Directo($niv1);
			$data = array(
				"data_n1" => $data_n1,
				"data_n2" => $data_n2,
			);
			echo json_encode($data);
		}
	}
	public function dependencyListLevel_3_IDDirecto($niv1, $niv2)
	{
		$data_n1 = $this->Model_Secretary->dependencyListLevel_3Directo($niv2);
		$data_n2 = $this->Model_Secretary->listUsersLevel_2Directo($niv1, $niv2);
		$data = array(
			"data_n1" => $data_n1,
			"data_n2" => $data_n2,
		);
		echo json_encode($data);
	}

	public function listUsersReceptionistLevel_3Directo($niv_id, $niv_id2, $niv3_id)
	{
		$data = $this->Model_Secretary->listUsersLevel_3Directo($niv_id, $niv_id2, $niv3_id);
		echo json_encode($data);
	}
	////////////////////////////


	public function SacarCodigos()
	{
		$cadena = $this->input->post('cadena');
		$cantidad = $this->input->post('count');
		$myArray = json_decode($cadena, true);
		//	$sin=$myArray[0];
		$data = $this->Model_Correspondencia->Model_SacarCodigos($myArray, $cantidad);
		//	echo json_encode($cadena[1]);
		//
		//$art=strlen($cadena);
		echo json_encode($data);
	}

	public function DatosCorrespondencia()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id')));
		$data[0] = $this->Model_Correspondencia->rowCorrespondencia($cor_id);
		echo json_encode($data);
	}

	//Funcion para Listar y Mostrar datos en el form correspondencia
	public function listarDatosHojaRutaInterna($id)
	{
		$data = $this->Model_Correspondencia->listarDatosCorrespModel($id);
		echo json_encode($data); //salida, formato JSON
	}

	//Funcion para Listar y Mostrar datos en el form Modificar Hoja de Ruta
	public function listarDatosHojaRuta($id)
	{
		$data = $this->Model_Correspondencia->ListUpdateHojaRutaVentanilla($id);
		echo json_encode($data);
	}



	//ARRAY ID DE SECRETARIA-DIRECCION-UNIDAD PARA CTIVAR ETIQUETA SELECT
	public function listar_idsDependencia($dep, $id_dep)
	{
		if ($id_dep > 0) {
			$array = $this->Model_Correspondencia->listarSDU($dep, $id_dep);
			$resp_array['arrayquitarduplicado_idnivel1'] = $this->unique_multidim_array($array, "n1");
			$resp_array['arrayquitarduplicado_idnivel2'] = $this->unique_multidim_array($array, "n2");
			$resp_array['arrayquitarduplicado_idnivel3'] = $this->unique_multidim_array($array, "n3");
			$resp_array['dependencia'] = $dep;
			$resp_array['iddependencia'] = $id_dep;
		} else {
			/*Data_select SECRETARIAS*/
			$resp_array['data_nivel1'] = $this->Model_Correspondencia->listarS(0);
			/*Data_select DIRECCIONES*/
			$resp_array['data_nivel2'] = $this->Model_Correspondencia->listarD(0);
			/*Data_select UNIDADES*/
			$resp_array['data_nivel3'] = $this->Model_Correspondencia->listarU(0);
		}
		echo json_encode($resp_array);
	}

	//public function unique_multidim_array(array $array, string $sw): array
	public function unique_multidim_array(array $array, string $sw)
	{

		if (isset($array)) {
			$array_idsecretaria = array();
			$array_iddireccion = array();
			$array_idunidad = array();
			$array_nuevo = array();

			switch ($sw) {
				case "n1":
					foreach ($array as $s) { // array de solo ids secretaria
						array_push($array_idsecretaria, $s["niv1_id"]);
					}
					$nuevoNivel1 = array_unique($array_idsecretaria, SORT_NUMERIC); //Elimina duplicados
					foreach ($nuevoNivel1 as $i) {
						//$nuevoNivel = array_push($array_nuevo, $i);
						foreach ($array as $p) { // array de solo ids unidades
							if ($i == $p["niv1_id"]) {
								$reg_niv1 = [
									'niv1_id' => $p["niv1_id"],
									'niv1_nombre' => $p["niv1_nombre"],
									'niv1_sigla' => $p["niv1_sigla"],
								];
								array_push($array_nuevo, $reg_niv1);
								break;
							}
						}
					}
					break;
				case "n2":
					foreach ($array as $d) { // array de solo ids direcciones
						array_push($array_iddireccion, $d["niv2_id"]);
					}
					$nuevoNivel2 = array_unique($array_iddireccion, SORT_NUMERIC); //Elimina duplicados
					foreach ($nuevoNivel2 as $i) {
						//$nuevoNivel = array_push($array_nuevo, $i);
						foreach ($array as $p) { // array de solo ids unidades
							if ($i == $p["niv2_id"]) {
								$reg_niv2 = [
									'niv2_id' => $p["niv2_id"],
									'niv2_nombre' => $p["niv2_nombre"],
									'niv2_sigla' => $p["niv2_sigla"],
								];
								array_push($array_nuevo, $reg_niv2);
								break;
							}
						}
					}
					break;
				case "n3":
					foreach ($array as $u) { // array de solo ids unidades
						array_push($array_idunidad, $u["niv3_id"]);
					}
					$nuevoNivel3 = array_unique($array_idunidad, SORT_NUMERIC); //Elimina duplicados
					foreach ($nuevoNivel3 as $i) {
						//$nuevoNivel = array_push($array_nuevo, $i);
						foreach ($array as $p) { // array de solo ids unidades
							if ($i == $p["niv3_id"]) {
								$reg_niv3 = [
									'niv3_id' => $p["niv3_id"],
									'niv3_nombre' => $p["niv3_nombre"],
									'niv3_sigla' => $p["niv3_sigla"],
								];
								array_push($array_nuevo, $reg_niv3);
								break;
							}
						}
					}
					break;
			}
			//number_format((int)$i);
			// for( $contador=0; $contador < count($nuevoNivel1); $contador++ ) {
			// $nuevoNivel = array_push($array_nuevo, $nuevoNivel1[$contador]);
			// }
		}
		return $array_nuevo;
	}






	public function listaUsuariosPorNiveles()
	{
		$resp_array = $this->Model_Correspondencia->listarUsuariosSDU($_POST['nivel'], $_POST['id_nivel']);
		echo json_encode($resp_array);
	}

	//TCPDF
	public function generarHojaDeRuta($cor_id)
	{
		$data = $this->load->view('reportes/pdf_hojaruta');
		echo json_encode($cor_id);
	}

	public function filaDeCorrespondencia()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id_edit')));
		$data = $this->Model_Correspondencia->rowCorrespondence($cor_id);
		echo json_encode($data);
	}

	//LISTA DOCUMENTOS
	public function ListDocument($id)
	{
		$result = array('data' => array());
		$user = $this->session->userdata('usu_id');
		$data = $this->Model_Correspondencia->ModelListDocument($id, $user);
		echo json_encode($data);
	}

	public function SearchCorrespondencia()
	{
		$Cod = trim($this->input->post('codCorres'));
		list($id_hojaruta, $gestion) = explode('-', $Cod);
		$data = $this->Model_Correspondencia->ModelSearchHojaRuta($id_hojaruta, $gestion);
		echo json_encode($data);
	}
	public function SearchAvanzadaCorrespondencia()
	{
		$finicial = trim($this->input->post('finicial'));
		$ffinal = trim($this->input->post('ffinal'));
		$cite = trim($this->input->post('SearchCite'));
		$ref = trim($this->input->post('SearchRef'));
		$des = trim($this->input->post('SearchDes'));
		$nrem = trim($this->input->post('SearchNomRem'));
		$crem = trim($this->input->post('SearchCargoRem'));
		$irem = trim($this->input->post('SearchInsRem'));
		$celrem = trim($this->input->post('SearchCelRem'));
		$result = array('data' => array());
		$data = $this->Model_Correspondencia->ModelSearch_AvanzadaHojaRuta($finicial, $ffinal, $cite, $ref, $des, $nrem, $crem, $irem, $celrem);
		echo json_encode($data);
	}

	function CambiarPass()
	{
		$user = $this->session->userdata('usu_id');
		$Pass = trim($this->input->post('Newpassword'));
		$NewPass = array('usu_rol_password' =>  $Pass);
		if ($this->Model_Secretary->ModelUpdatePass(array('usuario_usu_id' => $user), $NewPass)) {
			echo "¡Password Modificado Correctamente!";
		} else {
			echo "Error Al modificar el Password";
		}
	}

	function ConcluirHojaRuta()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
		$user = $this->session->userdata('usu_rol_id');
		$cor_id = trim($this->input->post('cor_id'));
		$his_id = trim($this->input->post('his_id'));
		$pend_id = trim($this->input->post('pend_id'));
		$origen = trim($this->input->post('origen'));
		$nro_copia = intval(trim($this->input->post('nro_copia')));
		$codigo = trim($this->input->post('codigo'));
		$motivo = trim(strtoupper($this->input->post('TextMotivoConclusion')));
		$cor_estado = trim($this->input->post('cor_estado'));
		$action = array(
			'cor_id' =>  $cor_id,
			'his_id' =>  $his_id,
			'origen' =>  $origen,
			'nro_copia' =>  $nro_copia,
			'cor_estado' =>  $cor_estado,
			'conclu_estado' => 1,
			'user' =>  $user,
			'motivo' =>  $motivo,
			'fecha_action_at' =>  $fecha,
		);
		if ($this->Model_Jefe->insertHojaRutaConcluida($action)) {
			if ($this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0), $his_id)) {
				if ($origen == "O"  && $nro_copia == 0) {
					$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 3), $cor_id);
				}
				if ($this->Model_Secretary->updateConclusionDerivacionPendiente(array('accion' => 'T', 'estado' => 0), $pend_id)) {
					echo "Hoja de Ruta " . $codigo . " Concluida Correctamente!";
				}
			} else {
				echo "Error al Concluir la hoja de Ruta";
			}
		} else {
			echo "Error al Concluir la hoja de Ruta";
		}
	}


	function DesconcluirHojaRuta()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
		$user = $this->session->userdata('usu_rol_id');
		$cor_id = intval(trim($this->input->post('cor_id')));
		$his_id = trim($this->input->post('his_id'));
		$origen = trim($this->input->post('origen'));
		$nro_copia = intval(trim($this->input->post('nro_copia')));
		$pend_id = trim($this->input->post('pend_id'));
		$conclu_id = trim($this->input->post('conclu_id'));
		$codigo = trim($this->input->post('codigo'));
		$motivo_desconclusion = trim($this->input->post('motivo_des'));
		$action = array(
			'conclu_estado' => 0,
			'user_desconclusion' =>  $user,
			'motivo_desconclusion' =>  $motivo_desconclusion,
			'fecha_desconclusion_at' =>  $fecha,
		);
		if ($this->Model_Secretary->updateDesconclusionHojaRuta($action, $conclu_id)) {
			if ($this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 1), $his_id)) {
				if ($origen == "O" && $nro_copia == 0) {
					$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
				}
				if ($this->Model_Secretary->updateConclusionDerivacionPendiente(array('accion' => 'C', 'estado' => 1), $pend_id)) {
					echo "Hoja de Ruta " . $codigo . " Desconcluida Correctamente!";
				}
				
			} else {
				echo "Error al Desconcluir la hoja de Ruta";
			}
		} else {
			echo "Error al Desconcluir la hoja de Ruta";
		}

		//echo $nro_copia;
	}

}
