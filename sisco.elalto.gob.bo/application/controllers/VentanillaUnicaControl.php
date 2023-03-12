<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VentanillaUnicaControl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Proveido');
		$this->load->model('Model_Secretary');
		$this->load->model('Model_PDF');
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
		/*Data_select SECRETARIAS*/
		$dependecia['data_nivel1'] = $this->Model_Correspondencia->listarS(0);
		/*Data_select DIRECCIONES*/
		$dependecia['data_nivel2'] = $this->Model_Correspondencia->listarD(0);
		/*Data_select UNIDADES*/
		$dependecia['data_nivel3'] = $this->Model_Correspondencia->listarU(0);
		$data['active'] = array("active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-signature"></i> Crear Hoja de Ruta';
		$dependecia['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'VentanillaUnicaControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnica/menu', $data);
		$this->load->view('ventanillaUnica/crearHojaRuta', $dependecia);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewArchivos/viewArchivos');
		$this->load->view('ModViewDetalles/viewDetallesVentUnicaExterna');
		//	$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('ModCrearHojaRuta/CrearHojaRuta_VentExterna');
		$this->load->view('ModEditarHojaRuta/EditarHojaRuta_VentExterna');
		$this->load->view('ModDestino/ModalDestino');
		$this->load->view('ModDerivacionInterna/DerivacionInterna_VentExterna');
		$this->load->view('ModDerivacionMultipleInterna/DerivacionMultipleInterna_VentExterna');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaUnica/js_ventanilla_unica', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModCrearHojaRuta/js_CrearHojaRuta_VentExterna');
		$this->load->view('ModEditarHojaRuta/js_EditarHojaRuta_VentExterna');
		$this->load->view('ModDropzone/js_Dropzone_VentExterna');
		$this->load->view('ModDestino/js_ModalDestino');
		$this->load->view('ModCheckBox/js_CheckBox_VentExterna');
		$this->load->view('ModDerivacionInterna/js_DerivacionInterna_VentExterna');
		$this->load->view('ModDatatable/js_datatable_VentUnicaExterna');
		$this->load->view('ModViewDetalles/js_viewDetallesVentUnicaExterna');
		$this->load->view('ModRetractar/js_retractar_VU_Externa');
		$this->load->view('ModCheckInput/js_CheckInput');
		$this->load->view('ModDerivacionMultipleInterna/js_DerivacionMultipleInterna_VentExterna');
		$this->load->view('ModViewArchivos/js_viewArchivos');
		//$this->load->view('ModViewHistorial/js_viewHistorial');	

	}

	public function DerivarCopias($a, $b)
	{
		$data['active'] = array("active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('ventanillaUnicaControl/index/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Crear Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivar con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '  ORIGINAL' . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$DireccionURL['url'] = 'VentanillaUnicaControl/DerivarCopias';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnica/menu', $data);
		$this->load->view('ventanillaUnica/vdcopias', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaUnica/js_dcopias', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function contactos()
	{
		$data['active'] = array("", "", "active", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-phone-alt"></i> Buscar Contactos G.A.M.E.A.';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'VentanillaUnicaControl/contactos';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnica/menu', $data);
		$this->load->view('ModContactos/contactos', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ModContactos/js_contactos_jefe', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function reportes()
	{
		$data['active'] = array("", "active", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-pdf"></i> Reportes';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'VentanillaUnicaControl/reportes';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnica/menu', $data);
		$this->load->view('ventanillaUnica/reportes', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaUnica/js_reportes', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	//BUSCAR HOJA DE RUTA
	public function searchHojaRuta()
	{
		$data['active'] = array("", "", "", "active", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-search-location"></i> Buscar Hoja de Ruta';
		$DireccionURL['url'] = 'VentanillaUnicaControl/searchHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnica/menu', $data);
		$this->load->view('ModSearch/searchHojaRuta');
		$this->load->view('ModPassword/vModalPassword');
		//$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('includes/footer');
		$this->load->view('ModSearch/js_receptionist_search_Jefe', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('reports/js_pdf');
		//$this->load->view('ModViewHistorial/js_viewHistorial');
	}
	//TUTORIALES
	public function tutoriales()
	{
		$data['active'] = array("", "", "", "", "active");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fab fa-youtube"></i> Tutoriales';
		$DireccionURL['url'] = 'VentanillaUnicaControl/tutoriales';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnica/menu', $data);
		$this->load->view('ModTutoriales/vtutoriales');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModTutoriales/js_receptionist_videos_VU_SMGI', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	/*=====  End of Section PDF  ======*/


	//CARGAR REGISTROS EN DATATABLE
	function fetch_Corresp() //Llamar al DataTable de HOJA DE RUTA ACTIVA
	{
		$result = array('data' => array());
		$data = $this->Model_Correspondencia->fetchCorrespModelVentanillaExterna();
		foreach ($data as $key => $value) {
			$date = new DateTime($value['rec_fecha_recep']);
			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Ninguna';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$a = $value['cor_id'];

			$Destino = $this->Model_Correspondencia->Model_DestinoVentUnica($a);
			$valor_destino = $Destino->id_d;

			if ($valor_destino == NULL || $valor_destino == 0) {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-secondary btn-sm"  onclick="AsignarDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigo . '\')" data-target="#asignar_Destino" data-toggle="modal"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Sugerir Destino</span> </button>';
			} else {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigo . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span> </button>';
			}
			$result['data'][$key] = array(
				' <div class="icheck-primary">
				<input type="checkbox" name="ckbox[]" onclick="VerCheckbox()" value="' . $value['pend_id'] . '" id="' . $value['pend_id'] . '" >
				<label for="' . $value['pend_id'] . '"></label></div>',
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="derivarHojaRutaInterna(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigo . '\')" ><i class="fas fa-sign-in-alt"></i>Derivacion a SMGI</a>
					<a class="dropdown-item" href="' . site_url('VentanillaUnicaControl/DerivarCopias/' . $value['cor_id'] . '/' . $codigo . '') . '" ><i class="fas fa-download"></i>Derivacion con Copias</a>
					<a class="dropdown-item" href="#" onclick="listarDatosHojaRuta(' .  $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#editarHojaRuta" data-toggle="modal"><i class="fas fa-edit"></i> Editar</a>
					
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja Ruta(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja Ruta(Imprimir)</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size:12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '<br>ORIGINAL</span>',
				$destinoResult,
				$value['cor_referencia'],
				$nivel,
				$value['cor_nombre_remitente'],
				$value['cor_institucion'],
				$date->format('d/m/Y H:i:s a'),
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',' . $value['pend_id'] .  ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
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
		$data = $this->Model_Correspondencia->fetchCorrespModelProcessVentanillaExterna();
		foreach ($data as $key => $value) {
			$date = new DateTime($value['rec_fecha_recep']);
			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Ninguna';
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoSpan = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 12px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 12px;">COPIA ' . $value['nro_copia'] . '</span>';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$a = $value['cor_id'];
			$Destino = $this->Model_Correspondencia->Model_DestinoVentUnica($a);
			$valor_destino = $Destino->id_d;

			if ($valor_destino == NULL || $valor_destino == 0) {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-secondary btn-sm"  onclick="AsignarDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigo . '\')" data-target="#asignar_Destino" data-toggle="modal"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Sugerir Destino</span> </button>';
			} else {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigo . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span></button>';
			}

			$result['data'][$key] = array(
				' <div class="btn-group-sm">
				<button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
				   Acciones
				 </button>
				 <div class="dropdown-menu" role="menu">
				 <a class="dropdown-item" href="#" onclick="listarDatosHojaRuta(' .  $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#editarHojaRuta" data-toggle="modal"><i class="fas fa-edit"></i> Editar</a>
				 <a class="dropdown-item" href="' . site_url('VentanillaUnicaControl/DerivarCopias/' . $value['cor_id'] . '/' . $codigo . '') . '" ><i class="fas fa-download"></i>Derivacion con Copias</a>
				 <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
				 <a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
				</div>
			   </div>',
				'<center><span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigoSpan . '</center>',
				$destinoResult,
				$value['cor_referencia'],
				$nivel,
				$value['cor_nombre_remitente'],
				$value['cor_institucion'],
				$date->format('d/m/Y H:i:s a'),

				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',' . $value['pend_id'] .  ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_CorrespConcluded()
	{
		$result = array('data' => array());
		$data = $this->Model_Correspondencia->fetchCorrespModelConcluidVentanillaExterna();
		foreach ($data as $key => $value) {
			$date = new DateTime($value['rec_fecha_recep']);
			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Ninguna';
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoSpan = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 12px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 12px;">COPIA ' . $value['nro_copia'] . '</span>';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$a = $value['cor_id'];
			$Destino = $this->Model_Correspondencia->Model_DestinoVentUnica($a);
			$valor_destino = $Destino->id_d;
			if ($valor_destino == NULL || $valor_destino == 0) {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-secondary btn-sm"  onclick="AsignarDestino(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#asignar_Destino" data-toggle="modal"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Sugerir <br>Destino</span></button>';
			} else {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino <br> Sugerido</span></button>';
			}
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
				'<center><span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigoSpan . '</center>',
				$destinoResult,
				$value['cor_referencia'],
				$nivel,
				$value['cor_nombre_remitente'],
				$value['cor_institucion'],
				$date->format('d/m/Y H:i:s a'),

				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',' . $value['pend_id'] .  ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_CorrespRetractar()
	{
		$result = array('data' => array());
		$data = $this->Model_Correspondencia->fetchCorrespModelRetractarVentanillaExterna();
		foreach ($data as $key => $value) {
			$date = new DateTime($value['rec_fecha_recep']);
			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Ninguna';
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoSpan = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 12px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 12px;">COPIA ' . $value['nro_copia'] . '</span>';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$a = $value['cor_id'];
			$Destino = $this->Model_Correspondencia->Model_DestinoVentUnica($a);
			$valor_destino = $Destino->id_d;
			if ($valor_destino == NULL || $valor_destino == 0) {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-secondary btn-sm"  onclick="AsignarDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigo . '\')" data-target="#asignar_Destino" data-toggle="modal"> <span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Sugerir Destino</span> </button>';
			} else {
				$destinoResult = '<button type="button" name="ButtonVerDestino" class="btn btn-outline-primary btn-sm"  onclick="VerDestino(' . $value['cor_id'] . ',' . $value['pend_id'] . ',\'' . $codigo . '\')" data-target="#viewDestino"  data-toggle="modal"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-hotel"></i> Destino Sugerido</span> </button>';
			}
			$result['data'][$key] = array(
				' <div class="btn-group-sm">
				<button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
				   Acciones
				 </button>
				 <div class="dropdown-menu" role="menu">
				 <a class="dropdown-item" id="ButtonVU_Retractar" href="#" onclick="retractar(' . $value['pend_id']  . ',\'' . $codigo . '\')"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Retractar</a>
				</div>
			   </div>',
				'<center><span class="badge badge-secondary" style="font-size: 12px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigoSpan . '</center>',
				$destinoResult,
				$value['cor_referencia'],
				$nivel,
				$value['cor_nombre_remitente'],
				$value['cor_institucion'],
				$date->format('d/m/Y H:i:s a'),

				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',' . $value['pend_id'] .  ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
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
			$row = $this->Model_Correspondencia->row_gestion(date("Y"));
			$nro_codigo = $row->ges_nro_gestion_ventanilla;
			$gestion_id = $row->ges_id;
			$institucion = strtoupper(strip_tags(trim($this->input->post('institucion_remitente'))));
			if (empty($institucion)) {
				$procedencia = "VENTANILLA UNICA";
			} else {
				$procedencia = $institucion . " (VENTANILLA UNICA)";
			}
			$dataRegistrarHojaRuta = array(
				'cor_codigo' => $nro_codigo,
				'cor_estado' => 1,
				'cor_tipo' => 'E',
				'cor_nivel' => strtoupper(strip_tags(trim($this->input->post('nivel')))),
				'cor_cite' => strtoupper(strip_tags(trim($this->input->post('cite')))),
				'cor_referencia' => strtoupper(strip_tags(trim($this->input->post('ref')))),
				'cor_descripcion' => strtoupper(strip_tags(trim($this->input->post('descrip_doc')))),
				'cor_observacion' => strtoupper(strip_tags(trim($this->input->post('obs_doc')))),
				'cor_nombre_remitente' => strtoupper(strip_tags(trim($this->input->post('nombre_remitente')))),
				'cor_cargo_remitente' => strtoupper(strip_tags(trim($this->input->post('cargo_remitente')))),
				'cor_institucion' => $procedencia,
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
				$data_gestion = array('ges_nro_gestion_ventanilla' => $nro_codigo,);
				$this->Model_Correspondencia->updateNumberGestion($gestion_id, $data_gestion);
				$user = $this->session->userdata('usu_id');
				$us = $this->Model_Correspondencia->idUltimoCorres($user);
				$id = $us->cor_id;
				$action = array(
					'tipo' => 'E',
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
		//$nro_cantidad = $row->cor_count;
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
				'cor_estado' => 1,
				'cor_cite' => strtoupper(strip_tags(trim($this->input->post('cite_edit')))),
				'cor_referencia' => strtoupper(strip_tags(trim($this->input->post('ref_edit')))),
				'cor_descripcion' => strtoupper(strip_tags(trim($this->input->post('descrip_doc_edit')))),
				'cor_observacion' => strip_tags(trim($this->input->post('obs_doc_edit'))),
				'cor_nombre_remitente' => strtoupper(strip_tags(trim($this->input->post('nombre_remitente_edit')))),
				'cor_cargo_remitente' => strtoupper(strip_tags(trim($this->input->post('cargo_remitente_edit')))),
				'cor_institucion' => strtoupper(strip_tags(trim($this->input->post('institucion_remitente_edit')))),
				'cor_tel_remitente' => strip_tags(trim($this->input->post('nro_contacto_edit'))),
				'recepcion_documento_rec_doc_id' => $id_recepcion,
				//	'cor_count' => $nro_cantidad - 1,
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





	public function BuscarDependeciaDestinoforCheckBox()
	{
		$pend_id = $this->input->post('pend_id');
		$data = $this->Model_Correspondencia->Model_DestinoCheckBox($pend_id);
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
			'a_proveido' => strip_tags(trim($this->input->post('prov_asigDestino'))),
			'a_obs' => strip_tags(trim($this->input->post('obs_asigDestino'))),
			'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoDestino'))),
			'id_d' => intval($this->input->post('list_usuarioss')),
		);
		if ($this->Model_Correspondencia->AsignarDestino($action, $cor_id)) {
			echo "Asignacion de Hoja de Ruta  " . $codigo . " Correcta!";
		} else
			echo "Existe Problemas en la Asignacion!";
	}

	//MODIFICAR HOJA DE RUTA
	function EditarDestino()
	{
		$id = $this->input->post('pend_id_HojaEditar');
		$dataModificarDestino = array(
			'a_proveido' => strip_tags(trim($this->input->post('prov_EditDestino'))),
			'a_obs' => strip_tags(trim($this->input->post('obs_EditDestino'))),
			'r_plazo'  => strip_tags(trim($this->input->post('Fecha_plazoEditDestino'))),
			'id_d' => trim($this->input->post('list_usuariosss'))

		);
		$this->Model_Correspondencia->ModelUpdateDestino($id, $dataModificarDestino);
		echo '¡Destino Editado Correctamente!';
	}

	function derivarHojaRutaPendienteCorId()
	{
		$cor_id = strip_tags(trim($this->input->post('cor_id_interno')));
		$id_d = strip_tags(trim($this->input->post('usuInterno_id')));
		if ($this->Model_Correspondencia->ModelUpdateDerivacionPendiente(array('accion' => 'P', 'id_r' => $id_d), $cor_id)) {
			//	$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
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
			'a_proveido' => strip_tags(trim($this->input->post('prev_descripcion'))),
			'a_obs' => strip_tags(trim($this->input->post('prev_observacion'))),
			'cor_id' => $cor_id,
			'id_a' => intval($this->session->userdata('usu_rol_id')),
			'id_r' => intval($this->input->post('usuInterno_id')),
			'id_d' => intval($this->input->post('list_usuarios')),
		);
		if ($this->Model_Correspondencia->Model_derivarPendiente($action)) {
			//$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $cor_id);
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
			'a_proveido' => strip_tags(trim($this->input->post('prev_descripcion'))),
			'a_obs' => strip_tags(trim($this->input->post('prev_observacion'))),
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


	// function derivarHojaRutaInternaMultiple()
	// {
	// 	$stich = 0;
	// 	$cadena = $this->input->post('cor_id_Array');
	// 	$cantidad = $this->input->post('cor_id_ArrayCantidad');
	// 	$myArray = json_decode($cadena, true);

	// 	for ($i = 0; $i < $cantidad; $i++) {
	// 		date_default_timezone_set('America/La_Paz');
	// 		$time = time();
	// 		$a_fecha = date("Y-m-d H:i:s", $time);
	// 		$action = array(
	// 			'origen' => 'O',
	// 			'accion' => 'D',
	// 			'a_plazo' => 1,
	// 			'a_fecha' => $a_fecha,
	// 			'a_proveido' => strip_tags(trim($this->input->post('a_provMultiple'))),
	// 			'a_obs' => strip_tags(trim($this->input->post('a_obsMultiple'))),
	// 			'reaccion' => null,
	// 			'r_plazo'  => strip_tags(trim($this->input->post('prevFecha_plazoMultiple'))),
	// 			'r_fecha' => null,
	// 			'r_descrip_rechazo' => null,
	// 			'cor_id' => $myArray[$i],
	// 			'bandeja' => 1,
	// 			'recepcion' => 1,
	// 			'id_a' => intval($this->session->userdata('usu_rol_id')),
	// 			'id_r' => intval($this->input->post('usuInterno_idGestion')),
	// 		);
	// 		if ($this->Model_Secretary->deriveExternal($action)) {
	// 			$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 2), $myArray[$i]);
	// 			$stich = 1;
	// 		} else
	// 			$stich = 0;
	// 	}
	// 	if ($stich == 1) {
	// 		echo "Derivacion Interna Multiple de Hoja de Ruta  Correcta!";
	// 	} else
	// 		echo "Existe Problemas en la Derivacion!";
	// }



	function derivarHojaRutaInternaMultiple()
	{
		$stich = 0;
		$cadena = $this->input->post('cor_id_Array');
		$cantidad = $this->input->post('cor_id_ArrayCantidad');
		$myArray = json_decode($cadena, true);
		for ($i = 0; $i < $cantidad; $i++) {
			$action = array(
				'accion' => 'P',
				'id_r' => intval($this->input->post('usuInterno_idGestion')),
			);
			if ($this->Model_Correspondencia->ModelUpdateDerivacionMultipleVentanilla($action, $myArray[$i])) {
				$stich = 1;
			} else {
				$stich = 0;
			}
		}
		if ($stich == 1) {
			echo "Derivacion Interna Multiple de Hoja de Ruta  Correcta!";
		} else {
			echo "Existe Problemas en la Derivacion!";
		}
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
			$data_n2 = $this->Model_Secretary->listUsersLevel_1DirectoGestion($niv1);
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

	public function dependencyListLevel_2_ID_DirectoSecretaryGestion($niv1)
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
	///////////////VENTANILLA DE RECAUDAIONES/////////////
	public function dependencyListLevel_3_IDDirecto_ConVentanillaRecaudaciones($niv1, $niv2)
	{
		$data_n1 = $this->Model_Secretary->dependencyListLevel_3Directo($niv2);
		$data_n2 = $this->Model_Secretary->listUsersLevel_2DirectoVentanillaRecaudaciones($niv1, $niv2);
		$data = array(
			"data_n1" => $data_n1,
			"data_n2" => $data_n2,
		);
		echo json_encode($data);
	}
	/////////////////////////////////////////////////////
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


	public function SacarCodigosForVentanilla()
	{
		$cadena = $this->input->post('cadena');
		$cantidad = $this->input->post('count');
		$myArray = json_decode($cadena, true);
		//	$sin=$myArray[0];
		$data = $this->Model_Correspondencia->Model_SacarCodigosForVentanillaUnica($myArray, $cantidad);
		//	echo json_encode($cadena[1]);
		//
		//$art=strlen($cadena);
		echo json_encode($data);
	}

	public function DatosCorrespondencia()
	{
		$cor_id = intval(trim($this->input->post('cor_id')));
		$pend_id = intval(trim($this->input->post('pend_id')));
		$data_n1 = $this->Model_Correspondencia->Model_SearchCorrespondenciaProcedencia($cor_id);
		$data_n2 = $this->Model_Correspondencia->rowCorrespondenceDocument2tablas($pend_id);
		$data = array(
			"data_n1" => $data_n1,
			"data_n2" => $data_n2
		);
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
			// $resp_array1 = $this->unique_multidim_array($array, "n1");
			// $resp_array2 = $this->unique_multidim_array($array, "n2");
			// $resp_array3 = $this->unique_multidim_array($array, "n3");
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
	public function unique_multidim_array(array $array, string $sw)
	//	public function unique_multidim_array(array $array, string $sw): array
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

	public function RetractarVentUnica()
	{
		$pend_id = intval($this->input->post('pend_id'));
		if ($this->Model_Correspondencia->model_Retractar_VentaUnicaExterna((array('accion' => 'C')), $pend_id)) {
			echo "Retractado Exitosamente";
		} else {
			echo "Error en la Retractacion";
		}
		//	echo json_encode($data);
	}
}
