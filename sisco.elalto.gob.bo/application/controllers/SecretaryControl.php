<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SecretaryControl extends CI_Controller
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
	///////////////////BANDEJA DE ENTRADA/////////////////////////
	public function index()
	{
		$data['active'] = array("active", "", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-envelope-square"></i> Bandeja Hoja de Ruta';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/bandejaCorrespondencia', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewDetalles/viewDetalles');
		$this->load->view('ModViewRemitente/viewRemitente');
		$this->load->view('ModConcluirHoja/vModalConcluirHoja');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('ModDerivacionExterna/DerivacionExternaBandeja');
		$this->load->view('ModDerivacionInterna/DerivacionInternaBandeja');
		$this->load->view('ModDerivacionDirecta/DerivacionDirectaBandeja');
		$this->load->view('ModDerivacionMultipleExterna/DerivacionMultipleExternaBandeja');
		$this->load->view('ModDerivacionMultipleInterna/DerivacionMultipleInternaBandeja');
		$this->load->view('ModAceptacionMultiple/AceptacionMultiple');
		$this->load->view('ModRechazoMultiple/RechazoMultiple');


		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_receptionist_bandejaCorresp', $DireccionURL);
		$this->load->view('ModDatatable/js_datatableBandeja');
		$this->load->view('ModViewDetalles/js_viewDetalles');
		$this->load->view('ModViewRemitente/js_viewRemitente');
		$this->load->view('ModViewArchivos/js_viewArchivos');
		$this->load->view('ModConcluirHoja/js_ModalConcluirHoja');
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
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
	public function RecepcionDerivarCopias($a, $b, $c)
	{
		$data['active'] = array("active", "", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('SecretaryControl/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Bandeja Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivar con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$data3['datos3'] = $c;
		$DireccionURL['url'] = 'SecretaryControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/vdcopiasReception', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('receptionist/js_dcopiasReception', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function RecepcionDerivarCopiasInterna($a, $b, $c)
	{
		$data['active'] = array("active", "", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('SecretaryControl/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Bandeja Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivacion Interna con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$data3['datos3'] = $c;
		$DireccionURL['url'] = 'SecretaryControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/vdcopias_internaReception', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('receptionist/js_dcopias_internaReception', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function fusionesBandeja($a, $b)
	{
		$data['active'] = array("active", "", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('SecretaryControl/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Bandeja Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Fusionar Hoja de Ruta  <span title="3 New Messages" class="badge bg-success " >' . $b . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$data3['SelectCodigo'] = $this->Model_Secretary->DatosCor_codigo2();
		$DireccionURL['url'] = 'SecretaryControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/vfusionesBandeja', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_fusionesBandeja');
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	//////////////////crear hoja de ruta////////////////////////
	public function crearHojaRuta()
	{
		$data['active'] = array("", "active", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-signature"></i> Crear Hoja de Ruta';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryControl/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/crearHojaRuta', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewArchivos/viewArchivos');
		$this->load->view('ModViewDetalles/viewDetalles');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('ModDerivacionMultipleExterna/DerivacionMultipleExterna');
		$this->load->view('ModDerivacionMultipleInterna/DerivacionMultipleInterna');
		$this->load->view('ModDerivacionDirecta/DerivacionDirecta');
		$this->load->view('ModDerivacionExterna/DerivacionExterna');
		$this->load->view('ModDerivacionInterna/DerivacionInterna');
		$this->load->view('ModCrearHojaRuta/CrearHojaRuta');
		$this->load->view('ModEditarHojaRuta/EditarHojaRuta');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_receptionist', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModCheckBox/js_CheckBox');
		$this->load->view('ModDatatable/js_datatable');
		$this->load->view('ModViewDetalles/js_viewDetalles');
		$this->load->view('ModViewArchivos/js_viewArchivos');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModViewHistorial/js_viewHistorial');
		$this->load->view('ModDerivacionMultipleExterna/js_DerivacionMultipleExterna');
		$this->load->view('ModDerivacionMultipleInterna/js_DerivacionMultipleInterna');
		$this->load->view('ModDerivacionDirecta/js_DerivacionDirecta');
		$this->load->view('ModDerivacionExterna/js_DerivacionExterna');
		$this->load->view('ModDerivacionInterna/js_DerivacionInterna');
		$this->load->view('ModDropzone/js_Dropzone');
		$this->load->view('ModCrearHojaRuta/js_CrearHojaRuta');
		$this->load->view('ModEditarHojaRuta/js_EditarHojaRuta');
	}
	public function DerivarCopias($a, $b)
	{
		$data['active'] = array("", "active", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('SecretaryControl/crearHojaRuta/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Crear Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivar con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$DireccionURL['url'] = 'SecretaryControl/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/vdcopias', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_dcopias', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function DerivarCopiasInterna($a, $b)
	{
		$data['active'] = array("", "active", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('SecretaryControl/crearHojaRuta/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Crear Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivacion Interna con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$DireccionURL['url'] = 'SecretaryControl/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/vdcopias_interna', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_dcopias_interna', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function fusiones($a, $b)
	{
		$data['active'] = array("", "active", "", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('SecretaryControl/crearHojaRuta/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Crear Hoja de Ruta</a><a style="color:#000;font-size:20px;">Fusionar Hoja de Ruta <span title="3 New Messages" class="badge bg-success " >' . $b . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$data3['SelectCodigo'] = $this->Model_Secretary->DatosCor_codigo2();
		$DireccionURL['url'] = 'SecretaryControl/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/vfusiones', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_fusiones', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	/////////////ADMINISTRACION DE CORRESPONDENCIA /////////////////////
	public function AdministrarHojas()
	{
		$data['active'] = array("", "", "active", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-archive"></i> Administrar Hojas de Ruta';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryControl/AdministrarHojas';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/seguimientohojaruta', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_receptionist_seguimiento', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModViewHistorial/js_viewHistorial');
		$this->load->view('ModSeguimientoHojasRutas/js_datatableSeguimientoMenuPrincipal');
		$this->load->view('ModSeguimientoHojasRutas/js_datatableSeguimientoMenuPrincipalUserDetalles');
		$this->load->view('ModSeguimientoHojasRutas/js_viewStyleMenuPrincipal');
		$this->load->view('ModSeguimientoHojasRutas/js_viewStyleRegresar');
	}

	//REPORTES DE HOJA DE RUTA
	public function reportes()
	{
		$data['active'] = array("", "", "", "active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-archive"></i> Reportes-Dependencias Externas';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryControl/reportes';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/reportes', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_reportes', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	//REPORTES DE HOJA DE RUTA
	public function reportesInterno()
	{
		$data['active'] = array("", "", "", "active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-archive"></i> Reportes-Dependencia Interna';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryControl/reportes';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/reportes_interno', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_reportes_interno', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//HOJA DE RUTA
	public function contactos()
	{
		$data['active'] = array("", "", "", "", "active", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-phone-alt"></i> Buscar Contactos G.A.M.E.A.';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'SecretaryControl/reportes';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('ModContactos/contactos', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ModContactos/js_contactos', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	//ADMIN USER
	public function adminUser()
	{
		$data['active'] = array("", "", "", "", "",  "active", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-user-friends"></i> Mis Tecnicos(as)';
		$DireccionURL['url'] = 'SecretaryControl/adminUser';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('receptionist/adminUser');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('receptionist/js_receptionist_user', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//BUSCAR HOJA DE RUTA
	public function searchHojaRuta()
	{
		$data['active'] = array("", "", "", "", "", "",  "active", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-search-location"></i> Buscar Hoja de Ruta';
		$DireccionURL['url'] = 'SecretaryControl/searchHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('ModSearch/searchHojaRuta');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModSearch/js_receptionist_search', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('reports/js_pdf');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//TUTORIALES
	public function tutoriales()
	{
		$data['active'] = array("", "", "", "", "", "", "", "active");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-search-location"></i> Tutoriales';
		$DireccionURL['url'] = 'SecretaryControl/tutoriales';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('receptionist/menu', $data);
		$this->load->view('ModTutoriales/vtutoriales');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModTutoriales/js_receptionist_videos', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}

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
				$origen = "ORIGINAL";
			if ($value['origen'] == 'C')
				$origen = "COPIA " . $value['nro_copia'] . "";
			$dateDerive = new DateTime($value['a_fecha']);
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['a_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();
			if ($fecha_actual <= $dateEnd) {
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			} else {
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			}
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];
			$result['data'][$key] = array(
				'<div class="icheck-primary">
					<input type="checkbox" name="ckbox[]" onclick="VerCheckboxEntrada()"  id="' . $value['his_id'] . '" value="' . $value['his_id'] . '">
						<label for="' . $value['his_id'] . '"></label>
				</div>',
				'<div class="btn-group">
                      <button type="button" id="ButtonConfirm" onclick="accept(' . $value['his_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '\')" class="btn btn-primary btn-sm"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-check-square"></i> Aceptar</span> </button>
                      <button type="button" id="ButtonDeny"  onclick="deny(' . $value['his_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '\')"  class="btn btn-secondary btn-sm"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-window-close"></i> Rechazar</span> </button>
                 </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '<br>' . $origen . '</span>',
				$accion,
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle. '\',\'' . 'Remitente'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Remitente</span> </button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['a_plazo'] . ' (dias)<br>' . $value['a_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				$value['a_obs'],
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigoTitle . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoTitle. '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span> </button>',
			);
		}
		echo json_encode($result);
	}


	public function fetchReception()
	{
		$result = array('data' => array());
		$origen = "";
		$data = $this->Model_Secretary->fetchReception();
		foreach ($data as $key => $value) {
			if ($value['reaccion'] === 'R')
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			elseif ($value['reaccion'] === 'D')
				$accion = '<b>DERIVADA</b>';
			else
				$accion = '<b>ACEPTADA</b>';
			if ($value['origen'] == 'O')
				$origen = "ORIGINAL";
			if ($value['origen'] == 'C')
				$origen = "COPIA-" . $value['nro_copia'] . "";

			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];
			$dateDerive = new DateTime($value['r_fecha']);
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['r_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();
			if ($fecha_actual <= $dateEnd)
				$dateEndAlert = '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			else
				$dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			$result['data'][$key] = array(
				'<div class="icheck-primary">
				<input type="checkbox"  name="ReceptionCkbox[]" onclick="VerCheckboxReception()"   id="' . $value['his_id'] . '" value="' . $value['his_id'] . '">
					<label for="' . $value['his_id'] . '"></label>
			</div>',
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
							
					<a class="dropdown-item" href="#" onclick="ConcluirHojaRuta(' . $value['cor_id'] . ',' . $value['his_id'] . ',' . $value['cor_estado'] . ',\'' . $value['origen'] . '\',\'' . $value['nro_copia'] . '\',\'' .$codigoTitle  . '\')" data-target="#modal_ConcluirHoja" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Concluir Hoja de Ruta</a>  
					<a class="dropdown-item" href="#" onclick="derivarHojaRutaExterna(' . $value['his_id'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle  . '\')" data-target="#derivarHojaRutaExterna" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Derivacion Externa</a>  
					<a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['his_id'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle  . '\')" data-target="#derivarHojaRutaInterna" data-toggle="modal"><i class="fas fa-download"></i> Derivacion Interna</a>
					<a class="dropdown-item" href="#" onclick="derivarHojaRutaExternaDirecta(' . $value['cor_id'] . ',' . $value['his_id']  . ',\'' . $codigoTitle  . '\')" data-target="#derivarHojaRutaExternaDirecta" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Derivacion Directa </a>
					<a class="dropdown-item" href="' . site_url('SecretaryControl/RecepcionDerivarCopias/' . $value['cor_id'] . '/' . 'GAMEA-'. $value['cor_codigo'] . '-' . $value['ges_gestion'] .'-'.$origen . '/' . $value['his_id'] . '') . '" ><i class="fas fa-download"></i> Derivacion Externa con Copias</a>
					<a class="dropdown-item" href="' . site_url('SecretaryControl/RecepcionDerivarCopiasInterna/' . $value['cor_id'] . '/' . 'GAMEA-'. $value['cor_codigo'] . '-' . $value['ges_gestion'] .'-'.$origen . '/' . $value['his_id'] . '') . '" ><i class="fas fa-download"></i> Derivacion Interna con Copias</a>
					
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '<br>' . $origen . '</span>',
				$accion,
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle. '\',\'' . 'Remitente'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Remitente</span> </button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['r_plazo'] . ' (dias)<br>' . $value['r_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				$value['a_obs'],
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigo . ' ' . $origen . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' .$codigoTitle . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	public function fetchRetractar()
	{
		$result = array('data' => array());
		$origen = "";
		$data = $this->Model_Secretary->fetch_Retractar();
		foreach ($data as $key => $value) {

			//$accion =($value['reaccion'] === 'R')?'<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>':($value['reaccion'] === 'D')?'<b>DERIVADA</b>':($value['reaccion'] === 'A')?'<b>DERIVADA</b>':($value['reaccion'] === null)?'<b>SIN RECEPCION</b>':'<b>NULO 2</b>';

			if ($value['reaccion'] === 'R') {
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			} elseif ($value['reaccion'] === 'D') {
				$accion = '<b>DERIVADA</b>';
			} elseif ($value['reaccion'] === 'A') {
				$accion = '<b>ACEPTADA</b>';
			} elseif ($value['reaccion'] === null) {
				$accion = '<b>SIN RECEPCION</b>';
			}

			if ($value['origen'] == 'O')
				$origen = "ORIGINAL";
			if ($value['origen'] == 'C')
				$origen = "COPIA " . $value['nro_copia'] . "";


			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];
			$dateDerive = new DateTime($value['a_fecha']);
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
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
					<a class="dropdown-item" href="#" onclick="retractar(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $codigoTitle   . '\')" ><i class="fas fa-sign-in-alt"></i> Retractar</a>  
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '<br>' . $origen . '</span>',
				$accion,
				'<button type="button"  onclick="viewUser(' . $value['id_r'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle. '\',\'' . 'Destinatario'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Destinatario</span> </button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['r_plazo'] . ' (dias)<br>' . $value['r_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				$value['a_obs'],
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigo . ' ' . $origen . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' .$codigoTitle . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	public function fetchConcluidos()
	{
		$result = array('data' => array());
		$origen = "";
		$data = $this->Model_Secretary->Model_fetch_Concluidos();
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
					<a class="dropdown-item" href="#" onclick="desconcluir('.$value['conclu_id'].',' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigoTitle  . '\')" ><i class="fas fa-sign-in-alt"></i> Desconcluir</a>  
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '<br>' . $origen . '</span>',
				$value['cor_referencia'],
				$value['cor_descripcion'],
				$value['motivo_conclusion'],
				$value['usu_nombres'] . ' ' . $value['usu_apellidos'],
				$value['fecha_conclusion'],
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigoTitle . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoTitle  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}


	function fetch_Corresp()
	{
		$valor = "";
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchCorrespModel();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'].' '.'ORIGINAL';
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);
			if ($data2 == NULL || $data2 == 0) {
				$valor = "";
			} else {
				$valor = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Archivos</span></button>';
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
                      <a class="dropdown-item" href="#" onclick="derivarHojaRutaExterna(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#derivarHojaRutaExterna" data-toggle="modal"><i class="fas fa-sign-in-alt"></i>Derivacion Externa</a>
                       <a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#derivarHojaRutaInterna" data-toggle="modal"><i class="fas fa-download"></i>Derivacion Interna</a>
					   <a class="dropdown-item" href="#" onclick="derivarHojaRutaExternaDirecta(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#derivarHojaRutaExternaDirecta" data-toggle="modal"><i class="fas fa-sign-in-alt"></i>Derivacion Directa </a>
					   <a class="dropdown-item" href="' . site_url('SecretaryControl/DerivarCopias/' . $value['cor_id'] . '/' . $codigo . '') . '" ><i class="fas fa-download"></i>Derivacion Externa con Copias</a>
					    <a class="dropdown-item" href="' . site_url('SecretaryControl/DerivarCopiasInterna/' . $value['cor_id'] . '/' . $codigo . '') . '" ><i class="fas fa-download"></i>Derivacion Interna con Copias</a> 
					   <a class="dropdown-item" href="#" onclick="listarDatosHojaRuta(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#editarHojaRuta" data-toggle="modal"><i class="fas fa-edit"></i> Editar</a>
                      <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Sobre Imprimir Hoja de Ruta </a>
					  <a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Hoja de Ruta  </a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '<br>ORIGINAL</span>',
				'<b > Iniciada</b>',
				$tipo,
				$valor,
				$value['cor_referencia'],
				$value['cor_descripcion'],
				$nivel,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_CorrespProcess()
	{
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchCorrespModelProcess();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 12px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 12px;">COPIA ' . $value['nro_copia'] . '</span>';
			$a = $value['cor_id'];
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '- ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];
			$result['data'][$key] = array(
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Sobre Imprimir Cabecera Hoja de Ruta</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Cabecera Hoja de Ruta</a>
                   </div>
                  </div>',
				'<center><span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigo . '</center>',
				'<b > Derivada y en Proceso</b>',
				$tipo,
				$value['cor_referencia'],
				$value['cor_descripcion'],
				$nivel,
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigoTitle . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_CorrespConcluded()
	{
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchCorrespModelConcluded();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 12px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 14px;">COPIA ' . $value['nro_copia'] . '</span>';
			$a = $value['cor_id'];
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '- ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];
			$result['data'][$key] = array(
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Sobre Imprimir Cabecera Hoja de Ruta</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Cabecera Hoja de Ruta</a>
				
                   </div>
                  </div>',
				'<center><span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigo . '</center>',
				'<b> Concluida</b>',
				$tipo,
				$value['cor_referencia'],
				$value['cor_descripcion'],
				$nivel,
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigoTitle . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}



	//CREAR NOTA DE INGRESO
	public function DerivacionExternaCopias()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = $this->input->post('cor_idTab'); //array()
		$recepcionista = $this->input->post('recepcionista');
		$contador = $this->input->post('contador');
		$proveido = $this->input->post('proveido');
		$Observacion = $this->input->post('Observacion');
		$plazo = $this->input->post('plazo');
		$numCopia = 0;
		for ($k = 0; $k < count($cor_id); $k++) {
			if ($k == 0) {
				$origen1 = "O";
				$numCopia = NULL;
			}
			if ($k > 0) {
				$origen1 = "C";
				$numCopia = $numCopia + 1;
			}
			$action[] = [
				'origen' => $origen1,
				'nro_copia' => $numCopia,
				'accion' => 'D',
				'a_plazo' => $plazo[$k],
				'a_fecha' => $a_fecha,
				'a_proveido' => $proveido[$k],
				'a_obs' => $Observacion[$k],
				'reaccion' => null,
				'r_plazo'  => $plazo[$k],
				'r_fecha' => null,
				'r_descrip_rechazo' => null,
				'cor_id' => $cor_id[$k],
				'bandeja' => 1,
				'recepcion' => 1,
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => $recepcionista[$k],
			];
		}
		if ($this->Model_Secretary->deriveExternalCopias($action)) {
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id[0]);
			echo "Derivacion Externa Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
		//echo json_encode($cor_id);

	}

	function derivarHojaRutaExternaDirecta()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id_ExternaDirecta')));
		$codigo = strip_tags(trim($this->input->post('codigo_ExternaDirecta')));
		//	$his = strip_tags(trim($this->input->post('his')));
		$plazoa = strip_tags(trim($this->input->post('Fecha_plazoExternoDIRECTA')));
		$action = array(
			'origen' => 'O',
			'accion' => 'D',
			'a_plazo' => $plazoa,
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('a_provExternoDIRECTA'))),
			'a_obs' => strip_tags(trim($this->input->post('a_obsExternoDIRECTA'))),
			'reaccion' => null,
			'r_plazo'  => $plazoa,
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('list_usuariosDIRECTA')),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
			echo "Derivacion Directa de " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}



	function derivarHojaRutaExternaDireccionesBandeja()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id_ExternaDirecciones')));
		$his_id = strip_tags(trim($this->input->post('his_id_ExternaDirecciones')));
		$codigo = strip_tags(trim($this->input->post('codigo_ExternaDirecciones')));
		$data = $this->Model_Correspondencia->Model_ObtenerOriginalCopias($his_id);
		$datoOriginal = $data->origen;
		$maximocopia = $data->maxcopia;
		if ($maximocopia == null || $maximocopia == 0) {
			$numCopia = 0;
		} else {
			$numCopia = $maximocopia;
		}
		if ($datoOriginal == 'O') {
			$origen1 = "O";
			$numCopia = NULL;
		} else {
			$origen1 = "C";
			$numCopia = $numCopia;
		}
		$action = array(
			'origen' => $origen1,
			'nro_copia' => $numCopia,
			'accion' => 'D',
			'a_plazo' => 1,
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('a_provExternoDIRE'))),
			'a_obs' => strip_tags(trim($this->input->post('a_obsExternoDIRE'))),
			'reaccion' => null,
			'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoExternoDIRE'))),
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('list_usuariosDIRE')),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'D'), $his_id);
			echo "Derivacion Direcciones de Hoja de Ruta  " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}

	public function DerivacionExternaCopiasBandeja()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = $this->input->post('cor_idTab'); //array()
		$his_id = strip_tags(trim($this->input->post('his_id')));
		$recepcionista = $this->input->post('recepcionista');
		$contador = $this->input->post('contador');
		$proveido = $this->input->post('proveido');
		$Observacion = $this->input->post('Observacion');
		$plazo = $this->input->post('plazo');

		$data = $this->Model_Correspondencia->Model_ObtenerOriginalCopias($his_id);
		$datoOriginal = $data->origen;
		$maximocopia = $data->maxcopia;
		if ($maximocopia == null || $maximocopia == 0) {
			$numCopia = 0;
		} else {
			$numCopia = $maximocopia;
		}
		for ($k = 0; $k < count($cor_id); $k++) {

			if ($datoOriginal == 'O' && $k == 0) {
				$origen1 = "O";
				$numCopia = NULL;
			} else {
				$origen1 = "C";
				$numCopia = $numCopia + 1;
			}
			$action[] = [
				'origen' => $origen1,
				'nro_copia' => $numCopia,
				'accion' => 'D',
				'a_plazo' => $plazo[$k],
				'a_fecha' => $a_fecha,
				'a_proveido' => $proveido[$k],
				'a_obs' => $Observacion[$k],
				'reaccion' => null,
				'r_plazo'  => $plazo[$k],
				'r_fecha' => null,
				'r_descrip_rechazo' => null,
				'cor_id' => $cor_id[$k],
				'bandeja' => 1,
				'recepcion' => 1,
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => $recepcionista[$k],
			];
		}

		if ($this->Model_Secretary->deriveExternalCopias($action)) {
			$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'D'), $his_id);
			echo "Derivacion Externa Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}


	//CREAR NOTA DE INGRESO
	public function fusionar()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$hoja = $this->input->post('SelectCod_id');
		$cor_id = $this->input->post('cor_id');
		$ref = $this->input->post('a_ref');
		$des = $this->input->post('a_des');
		$moti = $this->input->post('a_motivo');
		$numCopia = 0;
		$action = array(
			'cor_id' => $cor_id,
			'motivo' => $moti,
			'fusiones' => $hoja . "_" . $cor_id,
			'user' => intval($this->session->userdata('usu_rol_id')),
			'fecha_fusion' => $a_fecha,
		);
		if ($this->Model_Secretary->fusion($action)) {
			echo "Fusion Correcta!";
		} else
			echo "Existe Problemas con la Fusion!";
	}




	function DatosRemitente($recepcionista)
	{
		$data = $this->Model_Secretary->DatosRecepcionista($recepcionista);
		echo json_encode($data);
	}
	function DatosSelect()
	{
		$searchTerm = strip_tags(trim($this->input->post('searchTerm')));
		$data = $this->Model_Secretary->DatosCor_codigo($searchTerm);
		echo json_encode($data);
	}


	function derivarHojaRutaExternaDirectaBandeja()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id_ExternaDirecta')));
		$codigo = strip_tags(trim($this->input->post('codigo_ExternaDirecta')));
		$his_id = intval(trim($this->input->post('his_id_ExternaDirecta')));
		$plazoa = strip_tags(trim($this->input->post('Fecha_plazoExternoDIRECTA')));
		$datosHistorial = $this->Model_Correspondencia->BuscarHistorial($his_id);
		$His_Origen = $datosHistorial->origen;
		$His_nroCopia = $datosHistorial->nro_copia;
		$action = array(
			'origen' => $His_Origen,
			'nro_copia' => $His_nroCopia,
			'accion' => 'D',
			'a_plazo' => $plazoa,
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('a_provExternoDIRECTA'))),
			'a_obs' => strip_tags(trim($this->input->post('a_obsExternoDIRECTA'))),
			'reaccion' => null,
			'r_plazo'  => 1,
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
			echo "Derivacion Directa de " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
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
			'a_plazo' => strip_tags(trim($this->input->post('prevFecha_plazo'))),
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
			'a_plazo' => strip_tags(trim($this->input->post('Fecha_plazoInterno'))),
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('a_provInterno'))),
			'a_obs' => strip_tags(trim($this->input->post('a_obsInterno'))),
			'reaccion' => null,
			'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoInterno'))),
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

	function derivarHojaRutaInternaMultiple()
	{
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
				'a_plazo' =>  strip_tags(trim($this->input->post('prevFecha_plazoMultiple'))),
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
				'id_r' => intval($this->input->post('usuInterno_idResponsable')),
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



	function derivarHojaRutaExternaMultiple()
	{

		$cadena = $this->input->post('cor_id_ArrayExterna');
		$cantidad = $this->input->post('cor_id_ArrayCantidadExterna');
		$myArray = json_decode($cadena, true);

		for ($i = 0; $i < $cantidad; $i++) {
			date_default_timezone_set('America/La_Paz');
			$time = time();
			$a_fecha = date("Y-m-d H:i:s", $time);
			$action = array(
				'origen' => 'O',
				'accion' => 'D',
				'a_plazo' => strip_tags(trim($this->input->post('Fecha_plazoMultipleExterno'))),
				'a_fecha' => $a_fecha,
				'a_proveido' => strip_tags(trim($this->input->post('a_provMultipleExterno'))),
				'a_obs' => strip_tags(trim($this->input->post('a_obsMultipleExterno'))),
				'reaccion' => null,
				'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoMultipleExterno'))),
				'r_fecha' => null,
				'r_descrip_rechazo' => null,
				'cor_id' => $myArray[$i],
				'bandeja' => 1,
				'recepcion' => 1,
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => intval($this->input->post('list_usuariosME')),
			);
			if ($this->Model_Secretary->deriveExternal($action)) {
				$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $myArray[$i]);
				$stich = 1;
			} else
				$stich = 0;
		}

		if ($stich == 1) {
			echo "Derivacion Interna Multiple de Hoja de Ruta  Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}


	function derivarHojaRutaExternaBandeja()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_idExtbandeja')));
		$his_id = strip_tags(trim($this->input->post('his_idExtbandeja')));
		$codigo = strip_tags(trim($this->input->post('codigoExtbandeja')));
		$data = $this->Model_Correspondencia->Model_ObtenerOriginalCopias($his_id);
		$datoOriginal = $data->origen;
		$maximocopia = $data->maxcopia;
		if ($maximocopia == null || $maximocopia == 0) {
			$numCopia = 0;
		} else {
			$numCopia = $maximocopia;
		}

		if ($datoOriginal == 'O') {
			$origen1 = "O";
			$numCopia = NULL;
		} else {
			$origen1 = "C";
			$numCopia = $numCopia;
		}
		$action = array(
			'origen' => $origen1,
			'nro_copia' => $numCopia,
			'accion' => 'D',
			'a_plazo' => strip_tags(trim($this->input->post('prevFecha_plazo'))),
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
			echo "Derivacion Externa de Hoja de Ruta  " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}




	public function acceptHojaRuta($his_id, $codigo)
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$r_fecha = date("Y-m-d H:i:s", $time);
		if ($this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'r_fecha' => $r_fecha, 'reaccion' => 'A'), $his_id)) {
			echo '¡Hoja de Ruja ' . $codigo . ' Aceptada!';
		} else {
			echo 'Error en Aceptar Hoja de Ruta!';
		}
	}

	public function DatosDerivacionDirecta($his_id)
	{
		$dataHistory = $this->Model_Secretary->rowHistory($his_id);
		echo json_encode($dataHistory);
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

	public function ObtenerOrginalCopia($his)
	{
		$data = $this->Model_Correspondencia->Model_ObtenerOriginalCopias($his);
		echo json_encode($data);
	}

	//OBTIENE LA REFERENCIA Y DESCRIPCION
	public function Referencia($a)
	{
		$idCorVerificar = $a;
		$Datos = $this->Model_Secretary->RefeyDescripcion($idCorVerificar);
		echo json_encode($Datos); //salida, formato JSON
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
			if ($numberDay == "0" || $numberDay == "6") {
				$c++;
			}
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
		$fechaCreate = date("Y-m-d H:i:s", $time);
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
			'cor_referencia' => strip_tags(trim(strtoupper($this->input->post('ref')))),
			'cor_descripcion' => strip_tags(trim(strtoupper($this->input->post('descrip_doc')))),
			'cor_observacion' => strip_tags(trim(strtoupper($this->input->post('obs_doc')))),
			'cor_nombre_remitente' => strip_tags($this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos')),
			'cor_cargo_remitente' => strip_tags($this->session->userdata('rol_cargo')),
			'cor_institucion' => strip_tags($this->session->userdata('nameUnique')),
			'cor_tel_remitente' => strip_tags(trim($this->input->post('nro_contacto'))),
			'gestion_ges_id' => $gestion_id,
			'recepcion_documento_rec_doc_id' => NULL,
			'cor_count' => 3,
			'usu_rol_id' => intval($this->session->userdata('usu_rol_id')),
			'cor_create_at' => $fechaCreate,
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

		if ($niv_id == 1) {
			$data = $this->Model_Secretary->listUsersLevel_1Gestion(intval($niv_id));
		} else {
			$data = $this->Model_Secretary->listUsersLevel_1(intval($niv_id));
		}
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

	function derivarHojaRutaExternaMultipleReception()
	{
		$cadena = $this->input->post('ArrayCorIdMultipleExternaBandeja');
		$cantidad = $this->input->post('ArrayCantidadMultipleExternaBandeja');
		$cadenaHis = $this->input->post('his_idArrayMultipleExternaBandeja');
		$myArray = json_decode($cadena, true);
		$myArrayHistorial = json_decode($cadenaHis, true);

		for ($i = 0; $i < $cantidad; $i++) {
			date_default_timezone_set('America/La_Paz');
			$time = time();
			$a_fecha = date("Y-m-d H:i:s", $time);

			$his_id = $myArrayHistorial[$i];
			$dataHistory = $this->Model_Secretary->rowHistory($his_id);

			$data = $this->Model_Correspondencia->Model_ObtenerOriginalCopias($his_id);
			$datoOriginal = $data->origen;
			$maximocopia = $data->maxcopia;
			if ($maximocopia == null || $maximocopia == 0) {
				$numCopia = 0;
			} else {
				$numCopia = $maximocopia;
			}
			if ($datoOriginal == 'O') {
				$origen1 = "O";
				$numCopia = NULL;
			} else {
				$origen1 = "C";
				$numCopia = $numCopia;
			}
			$action = array(
				'origen' => $origen1,
				'nro_copia' => $numCopia,
				'accion' => 'D',
				'a_plazo' => strip_tags(trim($this->input->post('Fecha_plazoMultipleExternoBandeja'))),
				'a_fecha' => $a_fecha,
				'a_proveido' => strip_tags(trim($this->input->post('a_provMultipleExternoBandeja'))),
				'a_obs' => strip_tags(trim($this->input->post('a_obsMultipleExternoBandeja'))),
				'reaccion' => null,
				'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoMultipleExternoBandeja'))),
				'r_fecha' => null,
				'r_descrip_rechazo' => null,
				'cor_id' => $dataHistory->cor_id,
				'bandeja' => 1,
				'recepcion' => 1,
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => intval($this->input->post('list_usuariosME')),
			);

			if ($this->Model_Secretary->deriveExternal($action)) {
				$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'D'), $myArrayHistorial[$i]);
				$stich = 1;
			} else {
				$stich = 0;
			}
		}

		if ($stich == 1) {
			echo "Derivacion Interna Multiple de Hoja de Ruta  Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
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

		date_default_timezone_set('America/La_Paz');
		$time = time();
		$usu_create_at = date("Y-m-d H:i:s", $time);
		$dataUser = array(
			'usu_nombres' => strtoupper($this->input->post('nombres')),
			'usu_apellidos' => strtoupper($this->input->post('apellidos')),
			'usu_ci' => $this->input->post('ci'),
			'usu_ci_expedido' => $this->input->post('expedido'),
			'usu_celular' => $this->input->post('celular'),
			'usu_genero' => $this->input->post('genero'),
			'usu_create_at' => $usu_create_at,
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
				'usu_rol_create_at' => $usu_rol_create_at
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
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha_update = date("Y-m-d H:i:s", $time);

		$CountUpdateUser = $this->input->post('UpdateCountUser');
		if ($CountUpdateUser > 0) {
			$iduser = $this->input->post('idUpdateUser');
			$dataUser = array(
				'usu_nombres' => strtoupper($this->input->post('nombresUpdate')),
				'usu_apellidos' => strtoupper($this->input->post('apellidosUpdate')),
				'usu_ci' => $this->input->post('ciUpdate'),
				'usu_ci_expedido' => $this->input->post('expedidoUpdate'),
				'usu_celular' => $this->input->post('celularUpdate'),
				'usu_genero' => $this->input->post('generoUpdate'),
				'usu_update_at' => $fecha_update
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
				//$this->Model_Correspondencia->ModelSubirDocumento($user, $archivo, $datos, $fecha, $id);
				if ($this->Model_Correspondencia->ModelSubirDocumento($user, $archivo, $datos, $fecha, $id)) {
					echo '<script type="text/javascript">', 'Actualizar();', '</script>';
				}
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

	//LISTA DOCUMENTOS
	public function Controller_Counicados()
	{
		$data = $this->Model_Correspondencia->Model_Comunicados();
		echo json_encode($data);
	}

	public function ListDocumentTodo($id)
	{
		$result = array('data' => array());
		$user = $this->session->userdata('usu_id');
		$data = $this->Model_Correspondencia->ModelListDocumentAll($id, $user);
		echo json_encode($data);
	}



	public function SearchCorrespondenciaViewHistorial($cod, $origen, $nrocopia)
	{
		$result = array('data' => array());
		$data = $this->Model_Correspondencia->Model_SearchViewHistorial($cod, $origen, $nrocopia);
		$cont = 1;
		foreach ($data as $key => $value) {
			$afecha = $value['a_fecha'];
			$new_afecha = date("d-m-Y H:i:s", strtotime($afecha));
			if ($value['r_fecha'] == null) {
				$new_rfecha = 'Sin Recepcion';
			} else {
				$rfecha = $value['r_fecha'];
				$new_rfecha = date("d-m-Y H:i:s", strtotime($rfecha));
			}
			$result['data'][$key] = array(
				'<center>' .	$cont . '</center>',
				'<center>' .  $value['NomRemitente'] . ' ' . $value['ApeRemitente'] . '<b> <br> [ ' . $value['DepRemitente'] . ']</center>',
				'<center>' . $new_afecha . '</center>',
				'<center>' .  $value['NomDestino'] . ' ' . $value['ApeDestino'] . '<b> <br> [ ' . $value['DepDestino'] . ']</center>',
				'<center>' . $new_rfecha . '</center>',
				'<center>' . $value['a_proveido'] . '</center>',
				'<center>' . $value['a_obs'] . '</center>',
				'<center>' . $value['r_descrip_rechazo'] . '</center>',
			);
			$cont = $cont + 1;
		}
		echo json_encode($result);
	}



	public function SearchCorrespondencia()
	{
		$id = 0;
		$Cod = trim($this->input->post('codCorres'));
		$gestion = trim($this->input->post('gestion'));
		$data_n1 = $this->Model_Correspondencia->ModelSearchHojaRutaCorrespondenciaSimple($Cod, $gestion);
		if ($data_n1 == false) {
			$data = array(
				"data_n1" => 0,
				"data_n2" => 0,
				"data_n3" => 0,
				"data_n4" => 0,
			);
		} else {
			$id = intval($data_n1->cor_id);
			$data_n2 = $this->Model_Correspondencia->ModelSearchHojaRutaHistorialOriginalSimple($id, $gestion);
			$data_n3 = $this->Model_Correspondencia->ModelSearchHojaRutaCopiasSimple($id, $gestion);
			$data_n4 = $this->Model_Secretary->SearchDataConcluidos222($id);
			$data = array(
				"data_n1" => $data_n1,
				"data_n2" => $data_n2,
				"data_n3" => $data_n3,
				"data_n4" => $data_n4,
			);
		}
		echo json_encode($data);
	}

	public function SearchCorrespondenciaHistorial($cod, $his, $gestion)
	{
		$data_n1 = $this->Model_Correspondencia->ModelSearchHojaRutaCorrespondenciaSimpleHistorial($cod, $gestion);
		$data_n2 = $this->Model_Correspondencia->ModelSearchHojaRutaHIstorialVista($his);
		$data_n3 = $this->Model_Secretary->SearchDataConcluidos222($cod);
		$data = array(
			"data_n1" => $data_n1,
			"data_n2" => $data_n2,
			"data_n3" => $data_n3,
		);
		echo json_encode($data);
	}
	public function SearchCorrespondenciaHistorialForConcluted($cod, $his, $gestion,$id_conlcu)
	{
		$data_n1 = $this->Model_Correspondencia->ModelSearchHojaRutaCorrespondenciaSimpleHistorial($cod, $gestion);
		$data_n2 = $this->Model_Correspondencia->ModelSearchHojaRutaHIstorialVista($his);
		$data_n3 = $this->Model_Secretary->SearchDataConcluidosSimple($id_conlcu);
		$data = array(
			"data_n1" => $data_n1,
			"data_n2" => $data_n2,
			"data_n3" => $data_n3,
		);
		echo json_encode($data);
	}
	public function ObtenerDependencia($user)
	{
		$data = $this->Model_Correspondencia->ModelSearchObtenerDep($user);
		echo json_encode($data);
	}

	public function SearchAvanzadaCorrespondencia()
	{
		$finicial = trim($this->input->post('finicial'));
		$ffinal = trim($this->input->post('ffinal'));
		$codigo = trim($this->input->post('SearchCodigo'));
		$gestion = trim($this->input->post('gestionAvanzada'));
		//list($cod, $gestion) = explode('-', $codigo);
		$ref = trim($this->input->post('SearchRef'));
		$des = trim($this->input->post('SearchDes'));
		$nrem = trim($this->input->post('SearchNomRem'));
		$crem = trim($this->input->post('SearchCargoRem'));
		$irem = trim($this->input->post('SearchInsRem'));
		$celrem = trim($this->input->post('SearchCelRem'));
		$result = array('data' => array());
		//$data = $this->Model_Correspondencia->ModelSearch_AvanzadaHojaRuta($finicial, $ffinal, $codigo, $gestion, $ref, $des, $nrem, $crem, $irem, $celrem);
		$data_n1 = $this->Model_Correspondencia->ModelSearch_AvanzadaHojaRutaCorrespondencia($finicial, $ffinal, $codigo, $gestion, $ref, $des, $nrem, $crem, $irem, $celrem);
		if ($data_n1 == false) {
			$data_n1 = 0;
			$data_n2 = 0;
			$data_n3 = 0;
		} else {
			$data_n2 = $this->Model_Correspondencia->ModelSearch_AvanzadaHojaRutaHistorialOriginal($data_n1);
			if ($data_n2 == false) {
				$data_n2 = 0;
				$data_n3 = 0;
			} else {
				$data_n3 = $this->Model_Correspondencia->ModelSearch_AvanzadaHojaRutaHistorialCopias($data_n1);
			}
		}
		$data = array(
			"data_n1" => $data_n1,
			"data_n2" => $data_n2,
			"data_n3" => $data_n3,
		);
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
		if (!empty($_FILES['NuevoArchivo']['name'])) {
			$nombreOriginal = $_FILES['NuevoArchivo']['name'];
			$config['upload_path'] = './assets/upload/documents/';
			$config['allowed_types'] = 'pdf|docx';
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
				$fecha = date('Y-m-d H:i:s');
				$this->Model_Correspondencia->ModelSubirDocumento($user, $nombreEncriptado, $nombreOriginal, $fecha, $cor_id);
			} else {
				echo 'error';
			}
		}

		$dataModificarHojaRuta = array(
			'cor_cite' => strip_tags(trim(strtoupper($this->input->post('cite_edit')))),
			'cor_referencia' => strip_tags(trim(strtoupper($this->input->post('ref_edit')))),
			'cor_descripcion' => strip_tags(trim(strtoupper($this->input->post('descrip_doc_edit')))),
			'cor_observacion' => strip_tags(trim(strtoupper($this->input->post('obs_doc_edit')))),
			'cor_tel_remitente' => strip_tags(trim($this->input->post('nro_contacto_edit'))),
			'cor_nivel' => strip_tags(trim($this->input->post('nivel_edit'))),
			'cor_update_at' => date('Y-m-d H:i:s')
		);
		if ($this->Model_Secretary->modificarHojaRutaCorrespondencia($cor_id, $dataModificarHojaRuta)) {
			echo '¡Hoja de Ruta Modificado Correctamente! ';
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


	public function UpdateStateTema()
	{
		$iduser = $this->input->post('idd');
		$dataUserState = array('usu_color_tema' => $this->input->post('statee'));
		if ($this->Model_Secretary->ModelUpdateState_Tema(array('usuario_usu_id' => $iduser), $dataUserState)) {
			$this->session->set_userdata('usu_color_tema', intval($this->input->post('statee')));
			echo '¡Tema de Sistema Modificado Correctamente!';
		} else {
			echo 'Error en la modificacion del Tema';
		}
	}

	public function DatosViewConclusion()
	{
		$conclu_id = intval($this->input->post('conclu_idd'));
		$data = $this->Model_Secretary->SearchDataConcluidos($conclu_id);	
		echo json_encode($data);
	}
	public function SearchContactos()
	{
		$n1 = intval($this->input->post('niv1'));
		$n2 = intval($this->input->post('niv2'));
		$n3 = intval($this->input->post('niv3'));
		$data = $this->Model_Secretary->Model_SearchContactos($n1, $n2, $n3);
		echo json_encode($data);
	}

	public function Retractar()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);

		$cor_id = intval($this->input->post('cod_id')); //array()
		$his_id = intval($this->input->post('his_id'));
		$codigo = $this->input->post('codigo');
		$data = $this->Model_Correspondencia->Historial_General($his_id);
		$origen = $data->origen;
		$copia = $data->nro_copia;
		$prov = $data->a_proveido;
		$obs = $data->a_obs;
		$action = array(
			'origen' => $origen,
			'nro_copia' => $copia,
			'accion' => 'RT',
			'a_plazo' => 1,
			'a_fecha' => $a_fecha,
			'a_proveido' => $prov,
			'a_obs' => $obs,
			'reaccion' => 'A',
			'r_plazo'  => 1,
			'r_fecha' => $a_fecha,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 0,
			'recepcion' => 1,
			'id_a' => $data->id_r,
			'id_r' => intval($this->session->userdata('usu_rol_id')),
		);
		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'RT', 'a_obs' => 'RETRACTADO POR EL REMITENTE',), $his_id);
			//echo '¡Hoja de Ruja ' . $codigo . ' Retractada!';
			$resp = '¡Hoja de Ruja ' . $codigo . ' Retractada!';
		} else {
			//	echo "Existe Problemas en la Retractacion!";
			$resp = "Existe Problemas en la Retractacion!";
		}

		echo json_encode($resp);
	}
}
