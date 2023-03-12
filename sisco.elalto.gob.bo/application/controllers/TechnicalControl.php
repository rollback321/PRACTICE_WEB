<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TechnicalControl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Correspondencia');
		$this->load->model('Model_Secretary');
		$this->load->model('Model_Technical');
		$this->load->model('Model_Comunicados');
		$this->load->model('Model_Proveido');
		$enable = $this->session->userdata('usu_rol_estado');
		if ($enable == null)
			redirect('/Welcome', 'refresh');
	}
	//BANDEJA DE ENTRADA
	public function index()
	{

		$data['active'] = array("active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-envelope-square"></i> Bandeja de Correspondencia';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'TechnicalControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('technical/menu', $data);
		$this->load->view('technical/bandejaCorrespondencia', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModConcluirHoja/vModalConcluirHoja');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('ModViewDetalles/viewDetalles');
		$this->load->view('ModViewRemitente/viewRemitente');
		$this->load->view('ModDerivacionMultipleInterna/DerivacionMultipleInternaBandeja');
		$this->load->view('ModAceptacionMultiple/AceptacionMultiple');
		$this->load->view('ModRechazoMultiple/RechazoMultiple');
		$this->load->view('ModDerivacionInterna/DerivacionInternaBandejaTechnical');

		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('technical/js_technical_bandejaCorresp', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModDatatable/js_datatableBandeja_technical');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModCheckBox/js_CheckBoxBandeja');
		$this->load->view('ModDropzone/js_DropzoneBandejaTechnical');
		$this->load->view('ModRetractar/js_retractar');
		$this->load->view('ModViewDetalles/js_viewDetalles');
		$this->load->view('ModViewRemitente/js_viewRemitente');
		$this->load->view('ModViewArchivos/js_viewArchivos');
		$this->load->view('ModConcluirHoja/js_ModalConcluirHoja');
		$this->load->view('ModDesconcluirHoja/js_DesconcluirHoja');
		$this->load->view('ModViewHistorial/js_viewHistorial');
		$this->load->view('ModDerivacionMultipleInterna/js_DerivacionMultipleInternaBandeja');
		$this->load->view('ModAceptacionMultiple/js_AceptacionMultiple');
		$this->load->view('ModRechazoMultiple/js_RechazoMultiple');
		$this->load->view('ModDerivacionInterna/js_DerivacionInternaBandejaTechnical');
		$this->load->view('ModAceptacion/js_Aceptacion');
		$this->load->view('ModRechazo/js_Rechazo');
		$this->load->view('ModViewDescripcionRechazo/js_viewDescripcionRechazo');
	}
	public function RecepcionDerivarCopiasInterna($a, $b, $c)
	{
		$data['active'] = array("active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('TechnicalControl/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Bandeja Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivacion Interna con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$data3['datos3'] = $c;
		$DireccionURL['url'] = 'SecretaryControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('technical/menu', $data);
		$this->load->view('technical/vdcopias_internaReception', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('technical/js_dcopias_internaReception', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//CREAR HOJA DE RUTA
	public function crearHojaRuta()
	{
		$data['active'] = array("", "active", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-signature"></i> Hojas de Ruta';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'TechnicalControl/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('technical/menu', $data);
		$this->load->view('technical/crearHojaRuta', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('ModCrearHojaRuta/CrearHojaRuta');
		$this->load->view('ModEditarHojaRuta/EditarHojaRuta');
		$this->load->view('ModDerivacionInterna/DerivacionInterna');
		$this->load->view('ModViewArchivos/viewArchivos');
		$this->load->view('ModViewDetalles/viewDetalles');
		$this->load->view('ModDerivacionMultipleInterna/DerivacionMultipleInterna');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('technical/js_receptionist', $DireccionURL);
		$this->load->view('ModCheckBox/js_CheckBox');
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModDatatable/js_datatableTechnical');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModViewDetalles/js_viewDetalles');
		$this->load->view('ModViewArchivos/js_viewArchivos');
		$this->load->view('ModViewHistorial/js_viewHistorial');
		$this->load->view('ModCrearHojaRuta/js_CrearHojaRuta');
		$this->load->view('ModEditarHojaRuta/js_EditarHojaRuta');
		$this->load->view('ModDropzone/js_Dropzone');
		$this->load->view('ModDerivacionInterna/js_DerivacionInterna');
		$this->load->view('ModDerivacionMultipleInterna/js_DerivacionMultipleInterna');
	}
	public function DerivarCopiasInterna($a, $b)
	{
		$data['active'] = array("", "active", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('TechnicalControl/crearHojaRuta/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Crear Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivacion Interna con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$DireccionURL['url'] = 'SecretaryControl/crearHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('technical/menu', $data);
		$this->load->view('technical/vdcopias_interna', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('technical/js_dcopias_interna', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	public function contactos()
	{
		$data['active'] = array("", "", "active", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-phone-alt"></i> Buscar Contactos G.A.M.E.A.';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'TechnicalControl/contactos';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('technical/menu', $data);
		$this->load->view('ModContactos/contactos', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ModContactos/js_contactos', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
	}


	//BUSCAR HOJA DE RUTA
	public function searchHojaRuta()
	{
		$data['active'] = array("", "", "", "active", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-search-location"></i> Buscar Hoja de Ruta';
		$DireccionURL['url'] = 'TechnicalControl/searchHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('technical/menu', $data);
		$this->load->view('ModSearch/searchHojaRuta');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModSearch/js_receptionist_search', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('receptionist/js_CountBandeja');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('reports/js_pdf');
	}
	//TUTORIALES
	public function tutoriales()
	{
		$data['active'] = array("", "", "", "", "active");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fab fa-youtube"></i> Tutoriales';
		$DireccionURL['url'] = 'TechnicalControl/tutoriales';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('technical/menu', $data);
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
				$origen = "<b>ORIGINAL</b>";
			if ($value['origen'] == 'C')
				$origen = "<b>COPIA " . $value['nro_copia'] . "</b>";

			$dateDerive = new DateTime($value['a_fecha']);
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['a_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();
			$dateEndAlert = $fecha_actual <= $dateEnd ? '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>' : $dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];

			$result['data'][$key] = array(
				'<div class="icheck-primary">
					<input type="checkbox"  name="ckbox[]" onclick="VerCheckboxEntrada()" id="' . $value['his_id'] . '" value="' . $value['his_id'] . '">
						<label for="' . $value['his_id'] . '"></label>
				</div>',
				'<div class="btn-group">
                      <button type="button" id="ButtonConfirm" onclick="accept(' . $value['his_id'] . ',\'' . $codigoTitle  . '\')" class="btn btn-primary btn-sm"><i class="fas fa-check-square"></i> Aceptar</button>
                      <button type="button" id="ButtonDeny" onclick="deny(' . $value['his_id'] . ',\'' . $codigoTitle . '\')"  class="btn btn-secondary btn-sm"><i class="fas fa-window-close"></i> Rechazar</button>
                 </div>',
				'<span class="badge badge-secondary" style="font-size: 14px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']   . '<br>' . $origen . '</span>',
				$accion,
				'<button type="button"  onclick="viewUser(' . $value['id_a'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle. '\',\'' . 'Remitente'  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRouteUser">  <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-user-circle"></i><br> Remitente</span> </button>',
				$dateDerive->format('d-m-Y H:i'),
				$value['a_plazo'] . ' (dias)<br>' . $value['a_plazo'] * 24 . ' horas',
				$dateEndAlert,
				'<b>' . $value['a_proveido'] . '</b>',
				$value['a_obs'],
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigoTitle . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoTitle. '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> Mas Detalles</button>',
			);
		}
		echo json_encode($result);
	}

	public function fetchReception()
	{
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchReception();
		$origen = "";
		foreach ($data as $key => $value) {
			if ($value['reaccion'] === 'R')
				$accion = '<a href="#" onclick="viewDescriptionDenny(\'' . $value['r_descrip_rechazo'] . '\')" class="btn btn-outline-primary btn-sm"><b>RECHAZADA</b></a>';
			elseif ($value['reaccion'] === 'D')
				$accion = '<b>DERIVADA</b>';
			else
				$accion = '<b>ACEPTADA</b>';
			if ($value['origen'] == 'O')
				$origen = "<b>ORIGINAL</b>";
			if ($value['origen'] == 'C')
				$origen = "<b>COPIA " . $value['nro_copia'] . "</b>";

			$dateDerive = new DateTime($value['r_fecha']);
			$dateEnd = $this->returnDateEnable($dateDerive->format('Y-m-d H:i:s'), $value['r_plazo']);
			$dateEnd = new DateTime($dateEnd);
			$fecha_actual = new DateTime();
			$codigoTitle = ('O' == $value['origen'] || null == $value['origen']) ? 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' ORIGINAL' : 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . ' COPIA ' . $value['nro_copia'];
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$dateEndAlert = $fecha_actual <= $dateEnd ? '<span class="badge badge-success">' . $dateEnd->format('d-m-Y H:i:s') . '</span>' : $dateEndAlert = '<span class="badge badge-danger">' . $dateEnd->format('d-m-Y H:i:s') . '</span>';

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
                    <a class="dropdown-item" href="#" onclick="ConcluirHojaRuta(' . $value['cor_id'] . ',' . $value['his_id'] . ',' . $value['cor_estado'] . ',\'' . $value['origen'] . '\',\'' . $value['nro_copia'] . '\',\'' . $codigoTitle . '\')" data-target="#modal_ConcluirHoja" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> Concluir Hoja de Ruta</a>  		
					<a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['his_id'] . ',' . $value['cor_id'] . ',\'' . $codigoTitle  . '\')" data-target="#derivarHojaRutaInterna" data-toggle="modal"><i class="fas fa-download"></i>Derivacion Interna</a>
					<a class="dropdown-item" href="' . site_url('TechnicalControl/RecepcionDerivarCopiasInterna/' . $value['cor_id'] . '/' . $codigo . '/' . $value['his_id'] . '') . '" ><i class="fas fa-download"></i> Derivacion Interna con Copias</a>  
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
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigoTitle . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoTitle . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> Mas Detalles</button>',

			);
		}
		echo json_encode($result);
	}

	//////////////////////////////////////////////////////////////////////////////


	function fetch_Corresp()
	{
		$valor = "";
		$result = array('data' => array());
		$data = $this->Model_Secretary->fetchCorrespModel();

		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' .  $value['ges_gestion'].' '.'ORIGINAL';
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);
			if ($data2 == NULL) {
				$valor = "";
			} else {
				$valor = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Archivos</span></button>';
			}
			$result['data'][$key] = array(
				' <div class="icheck-primary">
				<input type="checkbox" name="ckbox[]" onclick="VerCheckbox()" value="' . $value['cor_id'] . '" id="' . $value['cor_id'] . '" >
				<label for="' . $value['cor_id'] . '"></label></div>',
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
                       <a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#derivarHojaRutaInterna" data-toggle="modal"><i class="fas fa-download"></i>Derivacion Interna</a>
					   <a class="dropdown-item" href="' . site_url('TechnicalControl/DerivarCopiasInterna/' . $value['cor_id'] . '/' . $codigo . '') . '" ><i class="fas fa-download"></i>Derivacion Interna con Copias</a>   
					   <a class="dropdown-item" href="#" onclick="listarDatosHojaRuta(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#editarHojaRuta" data-toggle="modal"><i class="fas fa-edit"></i> Editar</a> 
					   <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Sobre Imprimir Hoja Ruta</a>
					  <a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Imprimir Hoja Ruta</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '<br>ORIGINAL</span>',
				'<b > Iniciada</b>',
				$tipo,
				$valor,
				$value['cor_referencia'],
				$value['cor_descripcion'],
				$nivel,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigo  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
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
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 12px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 12px;">COPIA ' . $value['nro_copia'] . '</span>';
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
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoTitle  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
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
			$codigo = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 12px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 12px;">COPIA ' . $value['nro_copia'] . '</span>';
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
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'' . $codigoTitle . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}



	function derivarHojaRutaInterna()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id_interno')));
		$his_id = strip_tags(trim($this->input->post('his_id_interno')));
		$codigo = strip_tags(trim($this->input->post('codigo_interno')));

		$data = $this->Model_Correspondencia->Model_ObtenerOriginalCopias($his_id);
		$datoOriginal = $data->origen;
		$maximocopia = $data->maxcopia;
		if ($maximocopia == null || $maximocopia == 0) {
			$numCopia = null;
		} else {
			$numCopia = $maximocopia;
		}
		if ($datoOriginal == 'O') {
			$origen1 = "O";
			$numCopia = null;
		} else {
			$origen1 = "C";
			$numCopia = $numCopia;
		}
		$action = array(
			'origen' => $origen1,
			'nro_copia' => $numCopia,
			'accion' => 'D',
			'a_plazo' => strip_tags(trim($this->input->post('prevFecha_plazoInternoBandeja'))),
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('a_proveidoInternoBandeja'))),
			'a_obs' => strip_tags(trim($this->input->post('a_obsInternoBandeja'))),
			'reaccion' => null,
			'r_plazo'  => strip_tags(trim($this->input->post('prevFecha_plazoInternoBandeja'))),
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('usuInterno_id')),
		);

		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'D'), $his_id);
			echo "Derivacion Interna de Hoja de Ruta " . $codigo . " Correcta!";
		} else {
			echo "Existe Problemas en la Derivacion!";
		}
	}



	function derivarHojaRutaBandejaGestion()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$cor_id = strip_tags(trim($this->input->post('cor_id_interno')));
		$his_id = strip_tags(trim($this->input->post('his_id_interno')));
		$codigo = strip_tags(trim($this->input->post('codigo_interno')));
		$action = array(
			'origen' => 'O',
			'nro_copia' => null,
			'accion' => 'D',
			'a_plazo' => 1,
			'a_fecha' => $a_fecha,
			'a_proveido' => strip_tags(trim($this->input->post('prev_descripcion'))),
			'a_obs' => strip_tags(trim($this->input->post('prev_observacion'))),
			'reaccion' => null,
			'r_plazo'  => strip_tags(trim($this->input->post('prevFecha_plazoD'))),
			'r_fecha' => null,
			'r_descrip_rechazo' => null,
			'cor_id' => $cor_id,
			'bandeja' => 1,
			'recepcion' => 1,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('list_usuarioss')),
		);

		if ($this->Model_Secretary->deriveExternal($action)) {
			$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'D'), $his_id);
			echo "Derivacion Interna de Hoja de Ruta " . $codigo . " Correcta!";
		} else {
			echo "Existe Problemas en la Derivacion!";
		}
	}
	function derivarHojaRutaInternaTecnico()
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
			$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'D'));
			echo "Derivacion Interna de Hoja de Ruta : " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Derivacion!";
	}



	public function acceptHojaRuta($his_id, $codigo)
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$r_fecha = date("Y-m-d H:i:s", $time);

		if ($this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'r_fecha' => $r_fecha, 'reaccion' => 'A'), $his_id)) {
			if ($this->Model_Secretary->RegisterCorrespAccept($his_id)) {
				echo '¡Hoja de Ruta ' . $codigo . ' Aceptada!';
			} else {
				echo 'Error en Aceptar Hoja de Ruta! en la segunda tabla';
			}
		} else {
			echo 'Error en Aceptar Hoja de Ruta!';
		}
	}
	public function acceptHojaRutaMultiple()
	{
		$cadena = $this->input->post('cor_id_ArrayAceptar');
		$cantidad = $this->input->post('cor_id_ArrayCantidadAceptar');
		$myArray = json_decode($cadena, true);
		for ($i = 0; $i < $cantidad; $i++) {
			date_default_timezone_set('America/La_Paz');
			$time = time();
			$r_fecha = date("Y-m-d H:i:s", $time);
			if ($this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'r_fecha' => $r_fecha, 'reaccion' => 'A'), $myArray[$i])) {
				if ($this->Model_Secretary->RegisterCorrespAccept($myArray[$i])) {
					$stich = 1;
				} else {
					$stich = 0;
				}
			} else {
				echo 'Error en Aceptar Hoja de Ruta!';
			}
		}
		if ($stich == 1) {
			echo '¡Hojas de Ruta Aceptadas!';
		} else
			echo 'Error en Aceptar Hoja de Ruta!';
	}
	public function denyHojaRuta()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$a_fecha = date("Y-m-d H:i:s", $time);
		$his_id = strip_tags(trim($this->input->post('his_id')));
		$dataHistory = $this->Model_Secretary->rowHistory($his_id);
		$codigo = strip_tags(trim($this->input->post('codigo')));

		$data = $this->Model_Correspondencia->Model_ObtenerOriginalCopias($his_id);
		$datoOriginal = $data->origen;
		$maximocopia = $data->maxcopia;
		if ($maximocopia == null || $maximocopia == 0) {
			$numCopia = null;
		} else {
			$numCopia = $maximocopia;
		}
		if ($datoOriginal == 'O' || $datoOriginal == null) {
			$origen1 = "O";
			$numCopia = null;
		} else {
			$origen1 = "C";
			$numCopia = $numCopia;
		}

		$action = array(
			'origen' => $origen1,
			'nro_copia' => $numCopia,
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



	public function denyHojaRutaRechazarMultiple()
	{

		$cadena = $this->input->post('cor_id_ArrayRechazar');
		$cantidad = $this->input->post('cor_id_ArrayCantidadRechazar');
		$myArray = json_decode($cadena, true);
		for ($i = 0; $i < $cantidad; $i++) {
			date_default_timezone_set('America/La_Paz');
			$time = time();
			$a_fecha = date("Y-m-d H:i:s", $time);
			$his_id = $myArray[$i];
			$dataHistory = $this->Model_Secretary->rowHistory($myArray[$i]);

			$data = $this->Model_Correspondencia->Model_ObtenerOriginalCopias($his_id);
			$datoOriginal = $data->origen;
			$maximocopia = $data->maxcopia;
			if ($maximocopia == null || $maximocopia == 0) {
				$numCopia = null;
			} else {
				$numCopia = $maximocopia;
			}
			if ($datoOriginal == 'O' || $datoOriginal == null) {
				$origen1 = "O";
				$numCopia = null;
			} else {
				$origen1 = "C";
				$numCopia = $numCopia;
			}
			$action = array(
				'origen' => $origen1,
				'nro_copia' => $numCopia,
				'accion' => 'R',
				'a_plazo' => 1,
				'a_fecha' => $a_fecha,
				'a_proveido' => strip_tags(trim($dataHistory->a_proveido)),
				'a_obs' => strip_tags(trim($dataHistory->a_obs)),
				'reaccion' => null,
				'r_plazo'  => 1,
				'r_fecha' => null,
				'r_descrip_rechazo' => strip_tags(trim(strtoupper($this->input->post('TextRechazo')))),
				'cor_id' => $dataHistory->cor_id,
				'bandeja' => 1,
				'recepcion' => 1,
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => intval($dataHistory->id_a),
			);
			if ($this->Model_Secretary->deriveExternal($action)) {
				$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'R'), $his_id);
				$stich = 1;
			} else
				$stich = 0;
		}

		if ($stich == 1) {
			echo '¡Hojas de Ruta Rechazadas!';
		} else
			echo "Existe Problemas en el Rechazo";
	}


	public function rowsOfHistoryDependence()
	{
		$id_a = strip_tags(trim($this->input->post('id_a')));
		$id_a = intval($id_a);
		$dependence = $this->Model_Technical->rowsOfHistoryDependence($id_a);
		echo $dependence;
	}
	public function rowsOfCorrespondenceUsers()
	{
		$id_action = strip_tags(trim($this->input->post('id_action')));
		$data = $this->Model_Technical->rowCorrespondenceUsers($id_action);
		echo json_encode($data);
	}

	///////REVISAR PARAR BORRARA
	public function rowsOfCorrespondenceDocument()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id')));
		$data = $this->Model_Secretary->rowCorrespondenceDocument2($cor_id);
		echo json_encode($data);
	}
	//////////////////////////////

	public function SacarCodigosHistorial()
	{
		$cadena = $this->input->post('cadena');
		$cantidad = $this->input->post('count');
		$myArray = json_decode($cadena, true);
		$data = $this->Model_Correspondencia->Model_SacarCodigosHistorial($myArray, $cantidad);
		echo json_encode($data);
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
			$cor_id = strip_tags(trim($this->input->post('cor_id_interno')));
			$his_id = strip_tags(trim($this->input->post('his_id_interno')));

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
				'id_r' => intval($this->input->post('usuInterno_id')),
			);

			if ($this->Model_Secretary->deriveExternal($action)) {
				$this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0, 'r_fecha' => $a_fecha, 'reaccion' => 'D'), $his_id);
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

	function derivarHojaRutaInternaMultipleReception()
	{
		$cadena = $this->input->post('cor_id_Array');
		$cantidad = $this->input->post('cor_id_ArrayCantidad');
		$cadenaHis = $this->input->post('his_idArray');
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
				'a_plazo' => strip_tags(trim($this->input->post('prevFecha_plazoMultiple'))),
				'a_fecha' => $a_fecha,
				'a_proveido' => strip_tags(trim($this->input->post('a_provMultiple'))),
				'a_obs' => strip_tags(trim($this->input->post('a_obsMultiple'))),
				'reaccion' => null,
				'r_plazo'  => strip_tags(trim($this->input->post('prevFecha_plazoMultiple'))),
				'r_fecha' => null,
				'r_descrip_rechazo' => null,
				'cor_id' => $dataHistory->cor_id,
				'bandeja' => 1,
				'recepcion' => 1,
				'id_a' => intval($this->session->userdata('usu_rol_id')),
				'id_r' => intval($this->input->post('usuInterno_idResponsable')),
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
	public function fetchDataListTechnical()
	{
		$data = $this->Model_Technical->MostrarSoloTecnicosDerivarInterna();
		echo json_encode($data);
	}

	public function fetchDataListTechnicalGestion()
	{
		$data = $this->Model_Technical->MostrarSoloTecnicosDerivarInternaGestion();
		echo json_encode($data);
	}

	public function fetchDataListTechnicalGestionSecretary()
	{
		$data = $this->Model_Technical->MostrarSoloTecnicosDerivarInternaGestionSecretary();
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
			'cor_cite' => strip_tags(trim($this->input->post('cite'))),
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

	//////////////////////////////////////////////////////////////////////////////



	/////////////////////////////////////////

	public function fileUploadDerivarInterno()
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


	public function Viewhojaruta()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id')));
		$data = $this->Model_Technical->BuscarDatosHojaRuta($cor_id);
		echo json_encode($data);
	}

	public function CountBandejaInit()
	{
		$user = $this->session->userdata('usu_rol_id');
		$data = $this->Model_Correspondencia->CountBandeja($user);
		echo json_encode($data);
		//	echo "alert($data)";
	}

	public function CountBandejaInitVentanilla()
	{
		$user = $this->session->userdata('usu_rol_id');
		$data = $this->Model_Correspondencia->CountBandeja($user);
		echo json_encode($data);
		//	echo "alert($data)";
	}
	public function ComunicadosInit()
	{  // $user = $this->session->userdata('usu_id');
		$data = $this->Model_Correspondencia->AllComunicados();
		echo json_encode($data);
	}
}
