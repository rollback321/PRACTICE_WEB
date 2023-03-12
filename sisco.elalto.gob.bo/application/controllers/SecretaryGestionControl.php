<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SecretaryGestionControl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Secretary');
		$this->load->model('Model_Correspondencia');
		$this->load->model('Model_Proveido');

		$enable = $this->session->userdata('usu_rol_estado');
		if ($enable == null)
			redirect('/Welcome', 'refresh');
	}
	//BANDEJA DE ENTRADA
	public function index()
	{
		$data['active'] = array("active", "", "", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-envelope-square"></i> Bandeja Hoja de Ruta Vent. Unica';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryGestionControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('receptionist_gestion/bandejaCorrespondenciaVentanillaUnica', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('ModDestino/ModalDestino');
		$this->load->view('ModViewRemitente/viewRemitente');
		$this->load->view('ModViewDetalles/viewDetallesVentUnicaExterna');
		$this->load->view('ModConfirmacionMultiple/ConfirmacionMultipleSMGI_VentExterna');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist_gestion/js_receptionist_bandejaCorrespVentanillaUnica',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModDatatable/js_datatableSMGI_VentUnicaExterna');
		$this->load->view('ModViewHistorial/js_viewHistorial');
		$this->load->view('ModDestino/js_ModalDestino');
		$this->load->view('ModViewRemitente/js_viewRemitente');
		$this->load->view('ModViewDetalles/js_viewDetallesVentUnicaExterna');
		$this->load->view('ModConfirmacionMultiple/js_ConfirmacionMultipleSMGI_VentExterna');
		$this->load->view('ModConfirmacion/js_ConfirmacionSMGI_VentExterna');
		$this->load->view('ModCheckBox/js_CheckBoxSMGI');
	}
	public function DerivarCopiasVentUnicaExterna($a, $b)
	{
		$data['active'] = array("active", "", "", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('SecretaryGestionControl/index/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Band. Vent. Unica/</a><a style="color:#000;font-size:20px;">Derivar con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '  ORIGINAL' . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$DireccionURL['url'] = 'SecretaryGestionControl/DerivarCopiasVentUnicaExterna';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('ModDerivarCopias/viewDerivarCopiasSec_VUE', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ModDerivarCopias/js_viewDerivarCopiasSec_VUE',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		
	}
	public function bandejaCorrespondenciaInterna()
	{
		$data['active'] = array("", "active", "", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-envelope-square"></i> Bandeja Hoja de Ruta Vent. Interna';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryGestionControl/bandejaCorrespondenciaInterna';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('receptionist_gestion/bandejaCorrespondenciaVentanillaInterna', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('ModDestino/ModalDestino');
		$this->load->view('ModViewRemitente/viewRemitente');
		$this->load->view('ModViewDetalles/viewDetallesVentUnicaExterna');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist_gestion/js_receptionist_bandejaCorrespVentanillaInterna',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModViewHistorial/js_viewHistorial');
		$this->load->view('ModDestino/js_ModalDestino');
		$this->load->view('ModViewRemitente/js_viewRemitente');
		$this->load->view('ModDatatable/js_datatableSMGI_VentUnicaInterna');
		$this->load->view('ModViewDetalles/js_viewDetallesVentUnicaExterna');
		$this->load->view('ModCheckBox/js_CheckBoxSMGI');
	}
	public function bandejaCorrespondenciaGeneral()
	{
		$data['active'] = array("", "", "active", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-envelope-square"></i> Bandeja Hoja de Ruta General';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryGestionControl/bandejaCorrespondenciaGeneral';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('receptionist_gestion/bandejaCorrespondenciaGeneral', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewDetalles/viewDetalles');
		$this->load->view('ModViewRemitente/viewRemitente');
		$this->load->view('ModConcluirHoja/vModalConcluirHoja');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('ModDerivacionExterna/DerivacionExternaBandeja');
		$this->load->view('ModDerivacionInterna/DerivacionInternaBandeja');
		$this->load->view('ModDerivacionMultipleExterna/DerivacionMultipleExternaBandeja');
		$this->load->view('ModDerivacionMultipleInterna/DerivacionMultipleInternaBandeja');
		$this->load->view('ModAceptacionMultiple/AceptacionMultiple');
		$this->load->view('ModRechazoMultiple/RechazoMultiple');
		$this->load->view('ModDerivacionDirecta/DerivacionDirectaBandeja');

		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist_gestion/js_receptionist_bandejaCorrespGeneral',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		$this->load->view('ModDatatable/js_datatableBandeja');
		$this->load->view('ModViewDetalles/js_viewDetalles');
		$this->load->view('ModViewRemitente/js_viewRemitente');
		$this->load->view('ModViewArchivos/js_viewArchivos');
		$this->load->view('ModConcluirHoja/js_ModalConcluirHoja');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModCheckBox/js_CheckBoxBandeja');
		$this->load->view('ModViewHistorial/js_viewHistorial');
		$this->load->view('ModDropzone/js_DropzoneBandeja');
		$this->load->view('ModRetractar/js_retractar');
		$this->load->view('ModDerivacionMultipleExterna/js_DerivacionMultipleExternaBandeja');
		$this->load->view('ModDerivacionMultipleInterna/js_DerivacionMultipleInternaBandeja');
		$this->load->view('ModAceptacionMultiple/js_AceptacionMultiple');
		$this->load->view('ModRechazoMultiple/js_RechazoMultiple');
		$this->load->view('ModDerivacionExterna/js_DerivacionExternaBandeja');
		$this->load->view('ModDerivacionInterna/js_DerivacionInternaBandeja');
		$this->load->view('ModAceptacion/js_Aceptacion');
		$this->load->view('ModRechazo/js_Rechazo');
		$this->load->view('ModViewDescripcionRechazo/js_viewDescripcionRechazo');
		$this->load->view('ModDesconcluirHoja/js_DesconcluirHoja');
		$this->load->view('ModDerivacionDirecta/js_DerivacionDirectaBandeja');
			
	}

	//HOJA DE RUTA
	public function crearHojaRuta()
	{
		$data['active'] = array("", "", "", "active", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-signature"></i> Crear Hoja de Ruta';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryGestionControl/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('receptionist_gestion/crearHojaRuta', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist_gestion/js_receptionist',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//DERIVAR COPIAS
	public function DerivarCopias($a, $b)
	{
		$data['active'] = array("", "", "", "active", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('SecretaryGestionControl/crearHojaRuta/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Crear Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivar con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$DireccionURL['url'] = 'SecretaryGestionControl/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('receptionist_gestion/vdcopias', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist_gestion/js_dcopias',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	/////////////ADMINISTRACION DE CORRESPONDENCIA /////////////////////
	public function AdministrarHojas()
	{
		$data['active'] = array("", "", "", "", "active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-archive"></i> Administrar Hojas de Ruta';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryGestionControl/AdministrarHojas';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('receptionist_gestion/seguimientohojaruta', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist_gestion/js_receptionist_seguimiento',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	//ADMIN USER
	public function adminUser()
	{
		$data['active'] = array("", "", "", "", "", "active", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-user-friends"></i> Mis Tecnicos(as)';
		$DireccionURL['url'] = 'SecretaryGestionControl/adminUser';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('receptionist_gestion/adminUser');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('receptionist_gestion/js_receptionist_user',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function contactos()
	{
		$data['active'] = array("", "", "", "", "", "", "active", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-phone-alt"></i> Buscar Contactos G.A.M.E.A.';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryGestionControl/contactos';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('ModContactos/contactos', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ModContactos/js_contactos_sec_SMGI', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	//BUSCAR HOJA DE RUTA
	public function searchHojaRuta()
	{
		$data['active'] = array("", "", "", "", "", "", "", "active", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-search-location"></i> Buscar Hoja de Ruta';
		$DireccionURL['url'] = 'SecretaryGestionControl/searchHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('ModSearch/searchHojaRuta');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModSearch/js_receptionist_search_smgi',$DireccionURL);
		$this->load->view('reports/js_pdf');
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist_gestion/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
		
	}
	//TUTORIALES
	public function tutoriales()
	{
		$data['active'] = array("", "", "", "", "", "", "", "", "active");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-search-location"></i> Tutoriales';
		$DireccionURL['url'] = 'SecretaryGestionControl/tutoriales';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist_gestion/menu', $data);
		$this->load->view('ModTutoriales/vtutoriales');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModTutoriales/js_receptionist_videos',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ventanillaInternaSMGI/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	
	}

	function fetchInboxVentanillaInterna()
	{
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchInboxVentanillaInterna();
		$origen = "";
		foreach ($data as $key => $value) {
			if ($value['accion'] === 'R')
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			elseif ($value['accion'] === 'D')
				$accion = '<b>DERIVADA</b>';
			else
				$accion = '<b>ACEPTADA</b>';
				if ($value['origen'] == 'O')
				$origen = "ORIGINAL";
			if ($value['origen'] == 'C')
				$origen = "COPIA " . $value['nro_copia'] . "";
			$dateDerive = new DateTime($value['a_fecha']);
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['a_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoCompleto = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ' . $origen;
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];
			
			if ($fecha_actual <= $dateEnd)
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			else
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';

			$result['data'][$key] = array(
				' <div class="icheck-primary">
				<input type="checkbox" name="ckbox[]" onclick="VerCheckbox()" value="' . $value['pend_id'] . '" id="' . $value['pend_id'] . '" >
				<label for="' . $value['pend_id'] . '"></label></div>',
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="' . site_url('SecretaryGestionControl/DerivarCopiasVentUnicaExterna/' . $value['cor_id'] . '/' . $codigo . '') . '"  ><i class="fas fa-download"></i> Derivacion Externa con Copias</a>
                   </div>
                  </div>',
				'<div class="btn-group">
                      <button type="button" id="ButtonConfirm_VI_SMGI" onclick="confirma(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoCompleto . '\')" class="btn btn-primary btn-sm"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-check-square"></i> Confirmar Derivacion</span></button>
					  <button type="button" id="ButtonDeny_VI_SMGI" onclick="deny(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoCompleto . '\')"   class="btn btn-secondary btn-sm"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-window-close"></i> Rechazar</span></button>
					  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">' .$codigo. '<br>' . $origen . '</span>',
				'<b>PENDIENTE</b>',
				'<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',' . $value['cor_codigo'] . ',\'' . $codigoCompleto . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span></button>',
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle. '\',\'' . 'Remitente'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Remitente</span> </button>',
				$value['cor_referencia'],
				$dateEndAlert,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] .','. $value['pend_id'].  ',\'' .$codigoCompleto . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles </span></button>',
			);
		}
		echo json_encode($result);
	}


	function fetchInboxVentanillaUnica()
	{
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchInboxVentanilla();
		$origen = "";
		foreach ($data as $key => $value) {
			if ($value['accion'] === 'R')
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			elseif ($value['accion'] === 'D')
				$accion = '<b>DERIVADA</b>';
			else
				$accion = '<b>ACEPTADA</b>';
			if ($value['origen'] == 'O')
				$origen = "ORIGINAL";
			if ($value['origen'] == 'C')
				$origen = "COPIA " . $value['nro_copia'] . "";
			$dateDerive = new DateTime($value['a_fecha']);
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['a_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoCompleto = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ' . $origen;
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];

			if ($fecha_actual <= $dateEnd)
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			else
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';

			$result['data'][$key] = array(
				' <div class="icheck-primary">
				<input type="checkbox" name="ckbox[]" onclick="VerCheckbox()" value="' . $value['pend_id'] . '" id="' . $value['pend_id'] . '" >
				<label for="' . $value['pend_id'] . '"></label></div>',
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="' . site_url('SecretaryGestionControl/DerivarCopiasVentUnicaExterna/' . $value['cor_id'] . '/' . $codigo . '') . '"  ><i class="fas fa-download"></i> Derivacion Externa con Copias</a>
                   </div>
                  </div>',
				'<div class="btn-group">
                      <button type="button" id="ButtonConfirm_VU_SMGI"  onclick="confirma(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoCompleto . '\')" class="btn btn-primary btn-sm"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-check-square"></i> Confirmar Derivacion</span></button>
                 </div>',

				'<span class="badge badge-secondary" style="font-size: 12px;">' . $codigo . '<br>' . $origen . '</span>',
				'<b>PENDIENTE</b>',
				'<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoCompleto . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span></button>',
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle. '\',\'' . 'Remitente'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Remitente</span> </button>',
				$value['cor_referencia'],
				'<b>'.$dateEndAlert.'</b>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] .','. $value['pend_id'].  ',\'' .  $codigoCompleto . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles </span></button>',
			);
		}
		echo json_encode($result);
	}

	public function fetchReceptionVentanillaInterna()
	{
		$result = array('data' => array());
		$data = $this->Model_Secretary->DerivacionDirectaGestionBandejaInterna();
		foreach ($data as $key => $value) {
			
			if ($value['accion'] === 'D')
			$accion = '<b>DERIVADA</b>';
			
			if ($value['origen'] == 'O')
				$origen = "ORIGINAL";
			if ($value['origen'] == 'C')
				$origen = "COPIA " . $value['nro_copia'] . "";
			$dateDerive = new DateTime($value['a_fecha']);
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoCompleto = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ' . $origen;
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'].'- ORIGINAL':'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'].' COPIA ' . $value['nro_copia'];
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['r_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();
			
			if ($fecha_actual <= $dateEnd)
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			else
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';

			$result['data'][$key] = array(
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaHistorialBandejaSMGI('. $value['cor_id']. ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaHistorialBandejaSMGI('. $value['cor_id']  . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 14px;">' .$codigo  . '<br>' . $origen . '</span>',
				$accion,
				'<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoCompleto . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span></button>',
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle. '\',\'' . 'Remitente'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Remitente</span> </button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['r_plazo'] . ' (dias)<br>' . $value['r_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				$value['a_obs'],
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' .$codigoTitle. '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] .','. $value['pend_id'].  ',\'' .$codigoCompleto . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles </span></button>',

			);
		}
		echo json_encode($result);
	}




	public function fetchReceptionVentanillaUnica()
	{
		$result = array('data' => array());
		$data = $this->Model_Secretary->DerivacionDirectaGestion();
		$origen = "";
		foreach ($data as $key => $value) {
			if ($value['reaccion'] === 'R')
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			elseif ($value['reaccion'] === 'D' || $value['reaccion'] === null)
				$accion = '<b>DERIVADA</b>';
			else
				$accion = '<b>ACEPTADA</b>';
			if ($value['origen'] == 'O')
				$origen = "ORIGINAL";
			if ($value['origen'] == 'C')
				$origen = "COPIA " . $value['nro_copia'] . "";
			$dateDerive = new DateTime($value['r_fecha']);
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoCompleto = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ' . $origen;
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'].'- ORIGINAL':'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'].' COPIA ' . $value['nro_copia'];
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['r_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();
			if ($value['cor_tipo'] == 'E')
				$extra = '<a class="dropdown-item" href="#" onclick="derivarHojaRutaDirecto(' . $value['his_id'] . ',' . $value['cor_id'] . ',\'' . $codigoCompleto . '\')" data-target="#derivarHojaRuta" data-toggle="modal"><i class="fas fa-sign-in-alt"></i>Derivacion Directa</a>';
			else
				$extra = '';

			if ($fecha_actual <= $dateEnd)
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			else
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			$result['data'][$key] = array(
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaHistorialBandejaSMGI('. $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaHistorialBandejaSMGI('. $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">' . $codigo . '<br>' . $origen . '</span>',
				$accion,
				'<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigoCompleto . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span></button>',
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle. '\',\'' . 'Remitente'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Remitente</span> </button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['r_plazo'] . ' (dias)<br>' . $value['r_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' .$codigoCompleto. '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] .','. $value['pend_id'].  ',\'' .$codigoCompleto . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles </span></button>',

			);
		}
		echo json_encode($result);
	}

	// function fetchInboxGeneral()
	// {
	// 	$result = array('data' => array());
	// 	$data = $this->Model_Secretary->fetchInboxGestion();
	// 	$origen = "";
	// 	foreach ($data as $key => $value) {
	// 		if ($value['accion'] === 'R')
	// 			$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
	// 		elseif ($value['accion'] === 'D')
	// 			$accion = '<b>DERIVADA</b>';
	// 		else
	// 			$accion = '<b>ACEPTADA</b>';
	// 		if ($value['origen'] == 'O')
	// 			$origen = "<b>ORIGINAL</b>";
	// 		if ($value['origen'] == 'C')
	// 			$origen = "<b>COPIA " . $value['nro_copia'] . "</b>";
			
	// 			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'].'- ORIGINAL':'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'].' COPIA ' . $value['nro_copia'];
	// 		$dateDerive = new DateTime($value['a_fecha']);
	// 		$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['a_plazo']);
	// 		$dateEnd = new DateTime($dateEnd);
	// 		$fecha_actual = new DateTime();
	// 		if ($fecha_actual <= $dateEnd)
	// 			$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
	// 		else
	// 			$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
	// 		$result['data'][$key] = array(
	// 			'<div class="icheck-primary">
	// 				<input type="checkbox" name="ckbox[]" onclick="VerCheckboxEntrada()"  id="' . $value['his_id'] . '" value="' . $value['his_id'] . '">
	// 					<label for="' . $value['his_id'] . '"></label>
	// 			</div>',
	// 			'<div class="btn-group">
    //                   <button type="button" onclick="accept(' . $value['his_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '\')" class="btn btn-primary btn-sm"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-check-square"></i> Aceptar</span></button>
    //                   <button type="button" onclick="deny(' . $value['his_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '\')"  class="btn btn-secondary btn-sm"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-window-close"></i> Rechazar</span></button>
    //              </div>',
	// 			'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '<br>'.$origen.'</span>',
	// 			$accion,
	// 			'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i>Remitente</span></button>',
	// 			$dateDerive->format('d-m-Y H:i'),
	// 			$value['a_plazo'] . ' (dias)<br>' . $value['a_plazo'] * 24 . ' horas',
	// 			$dateEndAlert,
	// 			'<b>' . $value['a_proveido'] . '</b>',
	// 			$value['a_obs'],
	// 			'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
	// 		);
	// 	}
	// 	echo json_encode($result);
	// }


	// public function fetchReceptionGeneral()
	// {
	// 	$result = array('data' => array());
	// 	$origen = "";
	// 	$data = $this->Model_Secretary->fetchReception();
	// 	foreach ($data as $key => $value) {
	// 		if ($value['reaccion'] === 'R')
	// 			$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
	// 		elseif ($value['reaccion'] === 'D')
	// 			$accion = '<b>DERIVADA</b>';
	// 		else
	// 			$accion = '<b>ACEPTADA</b>';
	// 		if ($value['origen'] == 'O')
	// 			$origen = "<b>ORIGINAL</b>";
	// 		if ($value['origen'] == 'C')
	// 			$origen = "<b>COPIA " . $value['nro_copia'] . "</b>";
			
			
	// 		$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'].'- ORIGINAL':'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'].' COPIA ' . $value['nro_copia'];
	// 		$dateDerive = new DateTime($value['r_fecha']);
	// 		$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
	// 		$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['r_plazo']);
	// 		$dateEnd = new DateTime($dateEnd);
	// 		$fecha_actual = new DateTime();
			

	// 		if ($fecha_actual <= $dateEnd)
	// 			$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
	// 		else
	// 			$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
	// 		$result['data'][$key] = array(
	// 			'<div class="icheck-primary">
	// 			<input type="checkbox"  name="ReceptionCkbox[]" onclick="VerCheckboxReception()"   id="' . $value['his_id'] . '" value="' . $value['his_id'] . '">
	// 				<label for="' . $value['his_id'] . '"></label>
	// 		</div>',
	// 			' <div class="btn-group-sm">
    //                <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
    //                   Acciones
    //                 </button>
    //                 <div class="dropdown-menu" role="menu">
							
	// 				<a class="dropdown-item" href="#" onclick="ConcluirHojaRuta(' . $value['cor_id'] . ',' . $value['his_id'] . ',' . $value['cor_estado'] . ',\'' . $value['origen'] . '\',\'' . $value['nro_copia'] . '\',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" data-target="#modal_ConcluirHoja" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Concluir Hoja de Ruta</a>  		
	// 				<a class="dropdown-item" href="#" onclick="DerivacionDirecta(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $codigo . '\')" data-target="#derivarHojaRutaDirecta" data-toggle="modal"><i class="fas fa-download"></i>Derivacion Directa</a>
	// 				<a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['his_id'] . ',' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" data-target="#derivarHojaRutaInterna" data-toggle="modal"><i class="fas fa-download"></i>Derivacion Interna</a>
	// 				<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
	// 				<a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
    //                </div>
    //               </div>',
	// 			'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '<br>'. $origen.'</span>',
	// 			$accion,
	// 			'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser"><i class="fas fa-user-circle"></i>Remitente</button>',
	// 			$dateDerive->format('d-m-Y H:i'),
	// 			$value['r_plazo'] . ' (dias)<br>' . $value['r_plazo'] * 24 . ' horas',
	// 			$dateEndAlert,
	// 			'<b>' . $value['a_proveido'] . '</b>',
	// 			$value['a_obs'],
	// 			'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' .$codigoTitle. '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
	// 			'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> ver Hoja Ruta</button>',
	// 		);
	// 	}
	// 	echo json_encode($result);
	// }
	function fetch_Corresp()
	{
		$valor = "";
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchCorrespModel();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' :  ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] ;
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);
			if ($data2 == NULL || $data2 == 0) {
				$valor = "";
			} else {
				$valor = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><i class="fa fa-copy"></i> <br>Ver Archivos</button>';
			}
			$result['data'][$key] = array(
				' <div class="icheck-primary">
				<input type="checkbox" class="ids" name="ckbox[]" onclick="VerCheckbox()" value="' . $value['cor_id'] . '" id="' . $value['cor_id'] . '" >
				<label for="' . $value['cor_id'] . '"></label></div>',
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item" href="#" onclick="DerivacionDirecta(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#DerivacionDirecta" data-toggle="modal"><i class="fas fa-sign-in-alt"></i>Derivacion Directa</a>
                       <a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#derivarHojaRutaInterna" data-toggle="modal"><i class="fas fa-download"></i>Derivacion Interna</a>
					   <a class="dropdown-item" href="' . site_url('SecretaryGestionControl/DerivarCopias/' . $value['cor_id'] . '/' . $codigo . '') . '" ><i class="fas fa-download"></i>Derivacion con Copias</a>
					   <a class="dropdown-item" href="#" onclick="listarDatosHojaRuta(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#editarHojaRuta" data-toggle="modal"><i class="fas fa-edit"></i> Editar</a>
                      <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja de Ruta(Sobre Imprimir)</a>
					  <a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja de Ruta(Imprimir)</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '<br>ORIGINAL</span>',
				'<i class="fas fa-circle-notch fa-spin"></i>Iniciado',
				$tipo,
				$valor,
				$value['cor_referencia'],
				$nivel,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> <br>Mas Detalles</button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_CorrespProcess()
	{
		$valor = "";
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchCorrespModelProcess();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' :  ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = ('O' == $value['origen']||null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 12px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 14px;">COPIA ' . $value['nro_copia'] . '</span>';
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);

			if ($data2 == NULL) {
				$valor = "";
			} else {
				$valor = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><i class="fa fa-copy"></i> <br>Ver Archivos</button>';
			}
			$result['data'][$key] = array(
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja de Ruta(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja de Ruta(Imprimir)</a>
                      <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
					  <a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
                   </div>
                  </div>',
				'<center><span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigo . '</center>',
				'<i class="fas fa-circle-notch fa-spin fa-2x" style="color: green;"></i><b style="color: darkgreen;">En_Proceso</b>',
				$tipo,
				$valor,
				$value['cor_referencia'],
				$nivel,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> <br>Mas Detalles</button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_CorrespConcluded()
	{
		$valor = "";
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchCorrespModelConcluded();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' :  ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = ('O' == $value['origen']||null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 12px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 14px;">COPIA ' . $value['nro_copia'] . '</span>';
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);

			if ($data2 == NULL) {
				$valor = "";
			} else {
				$valor = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><i class="fa fa-copy"></i> <br>Ver Archivos</button>';
			}
			$result['data'][$key] = array(
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja de Ruta(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja de Ruta(Imprimir)</a>
                      <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
					  <a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
                   </div>
                  </div>',
				'<center><span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigo . '</center>',
				'<i class="fas fa-circle-notch fa-spin fa-2x" style="color: green;"></i><b style="color: darkgreen;">En_Proceso</b>',
				$tipo,
				$valor,
				$value['cor_referencia'],
				$nivel,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> <br>Mas Detalles</button>',
			);
		}
		echo json_encode($result);
	}



	public function BuscarDependeciaDestino()
	{
		$cor_id = intval($this->input->post('cor_id'));
		$pend_id = intval($this->input->post('pend_id'));
		$data = $this->Model_Correspondencia->Model_Destino($cor_id, $pend_id);
		echo json_encode($data);
	}



	function editarHojaRutaPendiente()
	{
		$id = $this->input->post('pend_id_HojaEditar');
		$dataModificarDestino = array(
			'a_proveido' => strtoupper(strip_tags(trim($this->input->post('prov_EditDestino')))),
			'a_obs' => strtoupper(strip_tags(trim($this->input->post('obs_EditDestino')))),
			'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoEditDestino'))),
			'id_d' => trim($this->input->post('list_usuarioss'))
		);
		if ($this->Model_Correspondencia->ModelUpdateDestino($id, $dataModificarDestino)) {
			echo '¡Destino Editado Correctamente!';
		} else
			echo "Existe Problemas en el cambio del Destino!";
		//echo $cor_id ;
	}






	function derivarHojaRutaExternaGestion()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id_Hoja')));
		$action = array(
			'origen' => 'O',
			'accion' => 'D',
			'a_plazo' =>  intval($this->input->post('Fecha_plazoDerivarDirecta')),
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('prov_DerivarDirecta'))),
			'a_obs' => strip_tags(trim($this->input->post('obs_DerivarDirecta'))),
			'reaccion' => null,
			'r_plazo'  => 1,
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('list_usuarioss')),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
			echo "Derivacion Externa Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}




	public function ConfirmarHojaRuta($cod_id, $pend_id, $codigo)
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);

		$data = $this->Model_Correspondencia->Model_Destino($cod_id, $pend_id);
		$reception = $data->id_d;
		$a_fecha = $data->a_fecha;
		$plazo = $data->a_plazo;
		$r_plazo = $data->r_plazo;
		$prov = $data->a_proveido;
		$obs = $data->a_obs;
		$origen = $data->origen;
		$nroCopia = $data->nro_copia;
		$action = array(
			'origen' => $origen,
			'nro_copia' => $nroCopia,
			'accion' => 'D',
			'a_plazo' => $plazo,
			'a_fecha' => $a_fecha,
			'a_proveido' => $prov,
			'a_obs' => $obs,
			'reaccion' => null,
			'r_plazo'  => $r_plazo,
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cod_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => $reception,
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateConfirmDerivacion(array('estado' => 0, 'accion' => 'D', 'pendfecha_insert_historial' => $fecha), $pend_id);
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cod_id);
			echo "Derivacion Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}


	public function ConfirmarHojaRutaForVent_Interna($cod_id, $pend_id, $codigo)
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);

		$data = $this->Model_Correspondencia->Model_Destino($cod_id, $pend_id);
		$remitente = $data->id_a;
		$reception = $data->id_d;
		$a_fecha = $data->a_fecha;
		$plazo = $data->a_plazo;
		$r_plazo = $data->r_plazo;
		$prov = $data->a_proveido;
		$obs = $data->a_obs;
		$origen = $data->origen;
		$nroCopia = $data->nro_copia;
		$action = array(
			'origen' => $origen,
			'nro_copia' => $nroCopia,
			'accion' => 'D',
			'a_plazo' => $plazo,
			'a_fecha' => $a_fecha,
			'a_proveido' => $prov,
			'a_obs' => $obs,
			'reaccion' => null,
			'r_plazo'  => $r_plazo,
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cod_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => $reception,
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateConfirmDerivacion(array('estado' => 0, 'accion' => 'D', 'pendfecha_insert_historial' => $fecha), $pend_id);
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cod_id);
			if ($this->Model_Secretary->updateCorrespondenceHistorialVentInternaEmisor($cod_id,$remitente)== NULL){
				echo "Derivacion Correcta!c";
			}else{
				$this->Model_Secretary->updateCorrespondenceHistorialVentInternaRecep(array('reaccion' => 'D','recepcion' => 0), $cod_id,$remitente);
				echo "Derivacion Correcta!";
			}
		} else
			echo "Existe Problemas en la Derivacion!";

		//echo $remitente;
	}



	public function ConfirmarHojaRutaMultiple()
	{
		$cadena = $this->input->post('cor_id_ArrayConfirmar');
		$cantidad = $this->input->post('cor_id_ArrayCantidadConfirmar');
		$myArray = json_decode($cadena, true);
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
		$stich = 0;
		for ($i = 0; $i < $cantidad; $i++) {

			$data = $this->Model_Correspondencia->Model_DestinoCheckBox($myArray[$i]);
			$reception = $data->id_d;
			$a_fecha = $data->a_fecha;
			$plazo = $data->a_plazo;
			$r_plazo = $data->r_plazo;
			$prov = $data->a_proveido;
			$obs = $data->a_obs;
			$origen = $data->origen;
			$cor_id = $data->cor_id;
			$nroCopia = $data->nro_copia;
			$action = array(
				'origen' => $origen,
				'nro_copia' => $nroCopia,
				'accion' => 'D',
				'a_plazo' => $plazo,
				'a_fecha' => $a_fecha,
				'a_proveido' => $prov,
				'a_obs' => $obs,
				'reaccion' => null,
				'r_plazo'  => $r_plazo,
				'r_fecha' => null,
				'r_descrip_rechazo' => null,
				'cor_id' => $cor_id,
				'bandeja' => 1,
				'recepcion' => 1,
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => $reception,
			);

			if ($this->Model_Secretary->deriveExternal($action)) {
				$this->Model_Secretary->updateConfirmDerivacion(array('estado' => 0, 'accion' => 'D', 'pendfecha_insert_historial' => $fecha), $myArray[$i]);
				$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
				$stich = 1;
			} else {
				$stich = 0;
			}
		}
		if ($stich == 1) {
			echo "Confirmacion Multiple Correcta!";
		} else {
			echo "Existe Problemas con la Confirmacion!";
		}
	}





	public function CountBandejaInitVentanilla()
	{
		//$user = $this->session->userdata('usu_rol_id');
		$data = $this->Model_Correspondencia->CountBandejaVentanillaUnica();
		echo json_encode($data);
	}


	public function CountBandejaInit()
	{
		$user = $this->session->userdata('usu_rol_id');
		$data = $this->Model_Correspondencia->CountBandejaVentanillaInterna($user);
		echo json_encode($data);
	}
	function derivarHojaRutaExterna()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id')));
		$action = array(
			'origen' => 'O',
			'accion' => 'D',
			'a_plazo' => 1,
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('a_proveido'))),
			'a_obs' => strip_tags(trim($this->input->post('a_obs'))),
			'reaccion' => null,
			'r_plazo'  => 1,
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('list_usuarios')),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
			echo "Derivacion Externa Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}
	function derivarHojaRutaInterna()
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
			'a_proveido' => strip_tags(trim($this->input->post('prev_descripcion'))),
			'a_obs' => strip_tags(trim($this->input->post('prev_observacion'))),
			'reaccion' => null,
			'r_plazo'  => strip_tags(trim($this->input->post('prevFecha_plazo'))),
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('usuInterno_id')),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
			echo "Derivacion Interna de Hoja de Ruta " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}


	function derivarHojaRutaExternaBandeja()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_idExt')));
		$his_id = strip_tags(trim($this->input->post('his_id')));
		$codigo = strip_tags(trim($this->input->post('codigo')));
		$action = array(
			'origen' => 'O',
			'accion' => 'D',
			'a_plazo' => 1,
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('a_proveido'))),
			'a_obs' => strip_tags(trim($this->input->post('a_obs'))),
			'reaccion' => null,
			'r_plazo'  => strip_tags(trim($this->input->post('prevFecha_plazo'))),
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('list_usuarios')),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'D'), $his_id);
			echo "Derivacion Externa de Hoja de Ruta " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}



	function derivarHojaRutaExternaBandejaDirecta()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('Cod_idDirecta')));
		$his_id = strip_tags(trim($this->input->post('His_idDirecta')));
		$codigo = strip_tags(trim($this->input->post('Codigo_Directa')));
		$action = array(
			'origen' => 'O',
			'accion' => 'D',
			'a_plazo' => 1,
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('a_provDerivacionDirecta'))),
			'a_obs' => strip_tags(trim($this->input->post('a_obsDerivacionDirecta'))),
			'reaccion' => null,
			'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoDerivacionDirecta'))),
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('list_usuariosDIRECTA')),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'D'), $his_id);
			echo "Derivacion Directa  " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}


	public function acceptHojaRuta($his_id, $codigo)
	{
		$time = time();
		$r_fecha = date("Y-m-d H:i:s", $time);
		if ($this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'r_fecha' => $r_fecha, 'reaccion' => 'A'), $his_id)) {
			echo '¡Hoja de Ruja ' . $codigo . ' Aceptada!';
		} else {
			echo 'Error en Aceptar Hoja de Ruta!';
		}
	}
	public function denyHojaRuta()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$his_id = strip_tags(trim($this->input->post('his_id')));
		$dataHistory = $this->Model_Secretary->rowHistory($his_id);
		$codigo = strip_tags(trim($this->input->post('codigo')));
		$action = array(
			'accion' => 'R',
			'a_plazo' => 1,
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($dataHistory->a_proveido)),
			'a_obs' => strip_tags(trim($dataHistory->a_obs)),
			'reaccion' => null,
			'r_plazo'  => 1,
			'r_fecha' => null,
			'r_descrip_rechazo' => strip_tags(trim($this->input->post('descp_denny'))),
			'cor_id' => $dataHistory->cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($dataHistory->id_a),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'R'), $his_id);
			echo '¡Hoja de Ruja ' . $codigo . ' Rechazada!';
		} else
			echo "Existe Problemas en la Derivacion!";
	}

	public function denyHojaRuta_VentanillaInternaSMGI()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id')));
		$pend_id = strip_tags(trim($this->input->post('pend_id')));
		$codigo = strip_tags(trim($this->input->post('codigo')));

		if (	$this->Model_Secretary->updateDerivacionPendienteRechazar_VI_SMGI(array('accion' => 'C', 'estado' => 1), $pend_id)) {
			echo '¡Hoja de Ruja ' . $codigo . ' Rechazada!';
		} else
			echo "Existe Problemas en la Derivacion!";
	}

	
	public function rowsOfCorrespondenceDocument()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id')));
		$data[0] = $this->Model_Secretary->rowCorrespondenceDocument($cor_id);
		$data[1] = $this->Model_Correspondencia->ModelListDocumentAll($cor_id);
		echo json_encode($data);
	}
	public function Correspondencia()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id')));
		$data[0] = $this->Model_Secretary->rowCorrespondenceDocument($cor_id);
		echo json_encode($data);
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
		$row = $this->Model_Correspondencia->row_gestion(date("Y"));
		$nro_codigo = $row->ges_nro_gestion;
		$gestion_id = $row->ges_id;
		$user = $this->session->userdata('usu_id');
		$dataRegistrarHojaRuta = array(
			'cor_codigo' => $nro_codigo,
			'cor_estado' => 1,
			'cor_tipo' => 'I',
			'cor_cite' => strip_tags(trim(strtoupper($this->input->post('cite')))),
			'cor_nivel' => strip_tags(trim($this->input->post('nivel'))),
			'cor_referencia' => strip_tags(trim($this->input->post('ref'))),
			'cor_descripcion' => strip_tags(trim($this->input->post('descrip_doc'))),
			'cor_observacion' => strip_tags(trim($this->input->post('obs_doc'))),
			'cor_nombre_remitente' => strip_tags($this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos')),
			'cor_cargo_remitente' => strip_tags($this->session->userdata('rol_cargo')),
			'cor_institucion' => strip_tags($this->session->userdata('nameUnique')),
			'cor_tel_remitente' => strip_tags(trim($this->input->post('nro_contacto'))),
			'gestion_ges_id' => $gestion_id,
			'recepcion_documento_rec_doc_id' => NULL,
			'cor_count' => 3,
			'usu_rol_id' => intval($this->session->userdata('usu_rol_id')),
			'cor_create_at' => date('Y-m-d H:i:s'),
			'id_user' => $user
		);
		if ($this->Model_Correspondencia->insertHojaRutaCorrespondencia($dataRegistrarHojaRuta)) {
			$nro_codigo = (int)$nro_codigo + 1;
			$data_gestion = array('ges_nro_gestion' => $nro_codigo,);
			$this->Model_Correspondencia->updateNumberGestion($gestion_id, $data_gestion);
			echo '¡Hoja de Ruta Creada Correctamente!';
		} else
			echo 'Error de Insercion en la Base de Datos';
	}

	public function receptionRemitente()
	{
		$cor_id = trim($this->input->post('cor_id'));
		$data = $this->Model_Correspondencia->ModelRemitenteHoja($cor_id);
		echo json_encode($data);
	}

	public function filaDeCorrespondencia()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id_edit')));
		$data = $this->Model_Correspondencia->rowCorrespondence($cor_id);
		echo json_encode($data);
	}
	public function fetchDataListTechnical()
	{
		$data = $this->Model_Secretary->fetchUserListTechnical();
		echo json_encode($data);
	}
	public function dependencyListLevel_1_ID()
	{
		$data = $this->Model_Secretary->dependencyListLevel_1();
		echo json_encode($data);
	}

	public function dependencyListLevel_1()
	{
		$data = $this->Model_Secretary->depListLevel1();
		echo json_encode($data);
	}
	public function listUsersReceptionistLevel_1($niv_id)
	{
		$data = $this->Model_Secretary->listUsersLevel_1(intval($niv_id));
		echo json_encode($data);
	}

	public function dependencyListLevel_2_ID()
	{
		$data_n1 = $this->Model_Secretary->dependencyListLevel_1();
		$data_n2 = $this->Model_Secretary->dependencyListLevel_2();
		$data = array(
			"data_n1" => $data_n1,
			"data_n2" => $data_n2,
		);
		echo json_encode($data);
	}
	public function listUsersReceptionistLevel_2($niv2_id)
	{
		$data = $this->Model_Secretary->listUsersLevel_2(intval($niv2_id));
		echo json_encode($data);
	}

	public function dependencyListLevel_3_ID()
	{
		$data_n2 = $this->Model_Secretary->depListLevel2();
		$data_n3 = $this->Model_Secretary->dependencyListLevel_3();
		$data = array(
			"data_n2" => $data_n2,
			"data_n3" => $data_n3,
		);
		echo json_encode($data);
	}
	public function listUsersReceptionistLevel_3($niv3_id)
	{
		$data = $this->Model_Secretary->listUsersLevel_3(intval($niv3_id));
		echo json_encode($data);
	}

	public function fetch_UserList()
	{
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchUserList();
		foreach ($data as $key => $value) {

			if (strcmp($value['usu_genero'], "1") == 0)
				$genero = '<img src="' . base_url() . '/assets/dist/img/plantilla/hombre-de-negocios.svg" height="40" class="img-circle elevation-2"  alt="User Image">';
			else
				$genero = '<img src="' . base_url() . '/assets/dist/img/plantilla/mujer.svg" height="40" class="img-circle elevation-2" alt="User Image">';

			if (strcmp($value['usu_rol_estado'], "1") == 0)
				$state = '<div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="' . $value['usu_id'] . '"  onclick="check(' . $value['usu_id'] . ')" name="nameCheck" id="' . $value['usu_id'] . '" checked>
                      <label class="custom-control-label" for="' . $value['usu_id'] . '">Habilitado</label>
                    </div>
                  </div>';
			else
				$state = '<div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="' . $value['usu_id'] . '" onclick="check(' . $value['usu_id'] . ')" name="nameCheck" id="' . $value['usu_id'] . '" >
                      <label class="custom-control-label" for="' . $value['usu_id'] . '">Deshabilitado</label>
                    </div>
                  </div>';

			$dateEnable = new DateTime($value['usu_rol_fecha_habilitacion']);


			$result['data'][$key] = array(
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUser(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
				$value['usu_nombres'],
				$value['usu_apellidos'],
				$value['usu_ci'] . ' ' . $value['usu_ci_expedido'],
				'<i class="fas fa-phone-square"></i>' . $value['usu_celular'],
				$genero,
				'<i class="fas fa-house-user"></i>' . $value['usu_rol_cargo'],
				$state,
				'<i class="fas fa-user"></i>' . $value['usu_rol_usuario'],
				'<button type="button" class="btn btn-xs btn-outline-primary" onclick="verPassword(\'' . $value['usu_rol_password'] . '\')">Ver Contraseña</button>',

				'<i class="fas fa-calendar-alt"></i>' . $dateEnable->format('d/m/Y H:i:s a'),
			);
		}
		echo json_encode($result);
	}
	public function registrarUser()
	{
		$dataUser = array(
			'usu_nombres' => strtoupper($this->input->post('nombres')),
			'usu_apellidos' => strtoupper($this->input->post('apellidos')),
			'usu_ci' => $this->input->post('ci'),
			'usu_ci_expedido' => $this->input->post('expedido'),
			'usu_celular' => $this->input->post('celular'),
			'usu_genero' => $this->input->post('genero')
		);
		if ($this->Model_Secretary->InsertUser($dataUser)) {
			$id_cargo = $this->db->insert_id();
			$Object = new DateTime();
			$usu_rol_create_at = $Object->format("Y-m-d h:i:s a");

			$dataRegistrarUserPass = array(
				'usu_rol_usuario' => $this->input->post('nameUser'),
				'usu_rol_password' => $this->input->post('password'),
				'usu_rol_fecha_habilitacion' => date('Y-m-d H:i:s'),
				'usu_rol_estado' => "1",
				'usu_rol_cargo' => strtoupper($this->input->post('cargo')),
				'usuario_usu_id' => $id_cargo,
				'nivel_1_niv1_id' => $this->session->userdata('rol_niv_1'),
				'nivel_2_niv2_id' => $this->session->userdata('rol__niv_2'),
				'nivel_3_niv3_id' => $this->session->userdata('rol__niv_3'),
				'roles_rol_id' => 2,
				'usu_count' => 3,
				'usu_dependencia' => $this->session->userdata('nameUnique'),
				'usu_rol_create_at' => $usu_rol_create_at,
			);
			if ($this->Model_Secretary->InsertUserRol($dataRegistrarUserPass)) {
				echo '¡Usuario Creado Correctamente!';
			} else {
				echo "Error de Insercion en la Base de Datos 2";
			}
		} else {
			echo 'Error de Insercion en la Base de Datos 3';
		}
	}
	public function ListUserTechnical($id)
	{
		$data = $this->Model_Secretary->ListUser($id);
		echo json_encode($data);
	}

	public function UpdateStateUser()
	{
		$iduser = $this->input->post('idd');
		$dataUserState = array('usu_rol_estado' => $this->input->post('statee'));
		if ($this->Model_Secretary->ModelUpdateUserState(array('usuario_usu_id' => $iduser), $dataUserState)) {
			echo '¡Estado Usuario Modificado Correctamente!';
		} else {
			echo 'Error de Insercion en la Base de Datos 4';
		}
	}

	//MODIFICAR TECNICO
	public function UpdateUser()
	{
		$CountUpdateUser = $this->input->post('UpdateCountUser');
		if ($CountUpdateUser > 0) {
			$iduser = $this->input->post('idUpdateUser');
			$dataUser = array(
				'usu_nombres' => strtoupper($this->input->post('nombresUpdate')),
				'usu_apellidos' => strtoupper($this->input->post('apellidosUpdate')),
				'usu_ci' => $this->input->post('ciUpdate'),
				'usu_ci_expedido' => $this->input->post('expedidoUpdate'),
				'usu_celular' => $this->input->post('celularUpdate'),
				'usu_genero' => $this->input->post('generoUpdate')
			);
			if ($this->Model_Secretary->ModelUpdateUser(array('usu_id' => $iduser), $dataUser)) {
				if ($CountUpdateUser > 0) {
					$MenosCount = $CountUpdateUser - 1;
				} else {
					$MenosCount = 0;
				}
				$dataModificarUserPass = array(
					'usu_rol_usuario' => $this->input->post('nameUserUpdate'),
					'usu_rol_password' => $this->input->post('passwordUpdate'),
					'usu_rol_cargo' => strtoupper($this->input->post('cargoUpdate')),
					'usu_count' => $MenosCount
				);
				if ($this->Model_Secretary->ModelUpdateUserRol(array('usuario_usu_id' => $iduser), $dataModificarUserPass)) {
					echo "¡Usuario Modificado Correctamente!";
				} else {

					echo "Error de Insercion en la Base de Datos 3";
				}
			} else {
				echo 'Error de Insercion en la Base de Datos 2';
			}
		}
	}
	public function downloads($name)
	{
		$dataa = file_get_contents('./assets/upload/documents/' . $name);
		force_download($name, $dataa);
	}
	// File upload
	public function fileUpload()
	{ //echo base_url('assets/upload/documents/');
		if (!empty($_FILES['file']['name'])) {
			// Set preference
			$config['upload_path'] = './assets/upload/documents/';
			$config['allowed_types'] = 'pdf|docx';
			$config['max_size'] = '20048';
			// max_size in kb
			$datos = $_FILES['file']['name'];
			$config['file_name'] = $_FILES['file']['name'];
			$config['encrypt_name'] = TRUE;
			//Load upload library
			$this->load->library('upload', $config);
			// File upload
			if ($this->upload->do_upload('file')) {
				// Get data about the file
				$uploadData = $this->upload->data();
				$user = $this->session->userdata('usu_id');
				$archivo = $uploadData['file_name'];
				$fecha = date('Y-m-d H:i:s');
				$us = $this->Model_Correspondencia->idUltimoCorres($user);
				$id = $us->cor_id;
				$this->Model_Correspondencia->ModelSubirDocumento($user, $archivo, $datos, $fecha, $id);
			}
		}
	}


	public function fileUploadDerivarExterno()
	{ //echo base_url('assets/upload/documents/');
		if (!empty($_FILES['file']['name'])) {
			// Set preference
			$config['upload_path'] = './assets/upload/documents/';
			$config['allowed_types'] = 'pdf|docx';
			$config['max_size'] = '10048';

			// max_size in kb
			$datos = $_FILES['file']['name'];
			$config['file_name'] = $_FILES['file']['name'];
			$config['encrypt_name'] = TRUE;
			//Load upload library
			$this->load->library('upload', $config);
			// File upload
			if ($this->upload->do_upload('file')) {
				// Get data about the file
				date_default_timezone_set('America/La_Paz');
				$time = time();
				$fecha = date("Y-m-d H:i:s", $time);
				$uploadData = $this->upload->data();
				$user = $this->session->userdata('usu_id');
				$archivo = $uploadData['file_name'];
				$us = $this->Model_Correspondencia->idUltimoCorresHistorial($user);
				$id = $us->cor_id;
				$this->Model_Correspondencia->ModelSubirDocumento($user, $archivo, $datos, $fecha, $id);
			}
		}
	}
	//LISTA DOCUMENTOS
	public function ListDocument($id)
	{
		$result = array('data' => array());
		$user = $this->session->userdata('usu_id');
		$data = $this->Model_Correspondencia->ModelListDocument($id, $user);
		echo json_encode($data);
	}

	public function ListDocumentTodo($id)
	{
		$result = array('data' => array());
		$user = $this->session->userdata('usu_id');
		$data = $this->Model_Correspondencia->ModelListDocumentAll($id, $user);
		echo json_encode($data);
	}



	//Funcion para Listar y Mostrar datos en el form Modificar Hoja de Ruta
	public function listarDatosHojaRuta($id)
	{
		$data = $this->Model_Secretary->rowCorrespondence($id);
		echo json_encode($data);
	}

	//MODIFICAR HOJA DE RUTA
	public function modificarDatosHojaRuta()
	{
		$cor_id = $this->input->post('id_cor');
		$dataModificarHojaRuta = array(
			'cor_cite' => strip_tags(trim(strtoupper($this->input->post('cite_edit')))),
			'cor_referencia' => strip_tags(trim($this->input->post('ref_edit'))),
			'cor_descripcion' => strip_tags(trim($this->input->post('descrip_doc_edit'))),
			'cor_observacion' => strip_tags(trim($this->input->post('obs_doc_edit'))),
			'cor_tel_remitente' => strip_tags(trim($this->input->post('nro_contacto_edit'))),
			'cor_nivel' => strip_tags(trim($this->input->post('nivel_edit'))),
			'cor_update_at' => date('Y-m-d H:i:s')
		);
		if ($this->Model_Secretary->modificarHojaRutaCorrespondencia($cor_id, $dataModificarHojaRuta)) {
			echo '¡Hoja de Ruta Actualizado Correctamente!';
		} else {
			echo "¡Error de Insercion en la Base de Datos!";
		}
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

	//BORRAR ARCHIVO
	public function DeleteFile($cod)
	{
		$ModeloNombreFile = $this->Model_Correspondencia->NamefileDelete($cod);
		$Nombrefile = $ModeloNombreFile->name_document_encript; //$nom=$NombreFile.name_document;
		$Direccion = "./assets/upload/documents/" . $Nombrefile;
		unlink($Direccion);

		$tr = $this->Model_Correspondencia->deletefile($cod);
		echo json_encode($tr);
	}


}
