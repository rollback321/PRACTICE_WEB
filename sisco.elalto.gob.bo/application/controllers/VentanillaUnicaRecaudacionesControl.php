<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VentanillaUnicaRecaudacionesControl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Proveido');
		$this->load->model('Model_Secretary');
		$this->load->model('Model_PDF');
		$this->load->model('Model_Correspondencia');
		$this->load->model('Model_Vent_Recaudaciones');
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
		$DireccionURL['url'] = 'VentanillaUnicaRecaudacionesControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnicaRecaudaciones/menu', $data);
		$this->load->view('ventanillaUnicaRecaudaciones/crearHojaRuta', $dependecia);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaUnicaRecaudaciones/js_ventanilla_unica',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	public function DerivarCopias($a, $b)
	{
		$data['active'] = array("active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<a  href="' . site_url('ventanillaUnicaRecaudacionesControl/index/') . '" style="color:#000;font-size:20px;"><i class="nav-icon fas fa-file-signature"></i>Crear Hoja de Ruta/</a><a style="color:#000;font-size:20px;">Derivar con Copias <span title="3 New Messages" class="badge bg-success " >' . $b . '  ORIGINAL' . '</span></a>';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$data3['datos1'] = $a;
		$data3['datos2'] = $b;
		$DireccionURL['url'] = 'VentanillaUnicaRecaudacionesControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnicaRecaudaciones/menu', $data);
		$this->load->view('ventanillaUnicaRecaudaciones/vdcopias', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaUnicaRecaudaciones/js_dcopias',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//BUSCAR HOJA DE RUTA
	public function reportes()
	{
		$data['active'] = array("", "active", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-pdf"></i> Reportes';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'VentanillaUnicaRecaudacionesControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnicaRecaudaciones/menu', $data);
		$this->load->view('ventanillaUnicaRecaudaciones/reportes', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ventanillaUnicaRecaudaciones/js_reportes',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('reports/js_pdf');
	}
	public function contactos()
	{
		$data['active'] = array("", "", "active", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-phone-alt"></i> Buscar Contactos G.A.M.E.A.';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'VentanillaUnicaRecaudacionesControl/contactos';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnicaRecaudaciones/menu', $data);
		$this->load->view('ModContactos/contactos', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('ModContactos/js_contactos_jefe', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//BUSCAR HOJA DE RUTA
	public function searchHojaRuta()
	{
		$data['active'] = array("", "", "", "active", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-search-location"></i> Buscar Hoja de Ruta';
		$DireccionURL['url'] = 'VentanillaUnicaRecaudacionesControl/searchHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnicaRecaudaciones/menu', $data);
		$this->load->view('ModSearch/searchHojaRuta');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModSearch/js_receptionist_search_Jefe',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//TUTORIALES
	public function tutoriales()
	{
		$data['active'] = array("", "", "", "", "active");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fab fa-youtube"></i> Tutoriales';
		$DireccionURL['url'] = 'VentanillaUnicaRecaudacionesControl/tutoriales';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('ventanillaUnicaRecaudaciones/menu', $data);
		$this->load->view('ModTutoriales/vtutoriales');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModTutoriales/js_receptionist_videos_VU_SMGI',$DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}

	/*=====  End of Section PDF  ======*/


	//CARGAR REGISTROS EN DATATABLE
	function fetch_Corresp() //Llamar al DataTable de HOJA DE RUTA ACTIVA
	{
		$result = array('data' => array());
		$data = $this->Model_Correspondencia->fetchCorrespModel();
		foreach ($data as $key => $value) {
			$date = new DateTime($value['rec_fecha_recep']);
			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Ninguna';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);

			if ($data2 == NULL || $data2 == 0) {
				$archivo = '';
			} else {
				$archivo = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><i class="fa fa-copy"></i> Archivos</button>';
			}

			$result['data'][$key] = array(
				// ' <div class="icheck-primary">
				// <input type="checkbox" name="ckbox[]" onclick="VerCheckbox()" value="' . $value['cor_id'] . '" id="' . $value['cor_id'] . '" >
				// <label for="' . $value['cor_id'] . '"></label></div>',
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="derivarHojaRutaExterna(' . $value['cor_id'] . ',\'' . $codigo . '\')"  data-target="#derivarHojaRutaExterna" data-toggle="modal"><i class="fas fa-sign-in-alt"></i>Derivacion Externa</a>
					<a class="dropdown-item" href="' . site_url('VentanillaUnicarecaudacionesControl/DerivarCopias/' . $value['cor_id'] . '/' . $codigo . '') . '" ><i class="fas fa-download"></i>Derivacion con Copias</a>
					<a class="dropdown-item" href="#" onclick="listarDatosHojaRuta(' .  $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#editarHojaRuta" data-toggle="modal"><i class="fas fa-edit"></i> Editar</a>
					
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja Ruta(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja Ruta(Imprimir)</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size:14px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '<br>ORIGINAL</span>',
				$value['cor_referencia'],
				$nivel,
				$value['cor_nombre_remitente'],
				$value['cor_institucion'],
				$date->format('d/m/Y H:i:s a'),
				$archivo,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> Mas <br>Detalles</button>',
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
		$data = $this->Model_Correspondencia->fetchCorrespModelProcessVent_Recaudaciones();
		foreach ($data as $key => $value) {
			$date = new DateTime($value['rec_fecha_recep']);
			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Ninguna';
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoSpan = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 14px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 14px;">COPIA ' . $value['nro_copia'] . '</span>';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);
			if ($data2 == NULL || $data2 == 0) {
				$archivo = '';
			} else {
				$archivo = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><i class="fa fa-copy"></i> Archivos</button>';
			}
			$result['data'][$key] = array(
				' <div class="btn-group-sm">
				<button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
				   Acciones
				 </button>
				 <div class="dropdown-menu" role="menu">
				 <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true" style="color:#0B5345;"></i> Hoja de Ruta(Cabecera-Sobre Imprimir)</a>
				 <a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true" style="color:#0B5345;"></i> Hoja de Ruta(Cabecera-Imprimir)</a>
				 <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaCuerpo(' . $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true" style="color:#78281F;"></i> Hoja de Ruta(Cuerpo-Sobre Imprimir)</a>
				 <a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaCuerpo(' . $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true" style="color:#78281F;"></i> Hoja de Ruta(Cuerpo-Imprimir)</a>
				 <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true" style="color:#17202A;"></i> Historial(Sobre Imprimir)</a>
				 <a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true"style="color:#17202A;"></i> Historial(Imprimir)</a>
				</div>
			   </div>',
				'<center><span class="badge badge-secondary" style="font-size: 14px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigoSpan . '</center>',
				$value['cor_referencia'],
				$nivel,
				$value['cor_nombre_remitente'],
				$value['cor_institucion'],
				$date->format('d/m/Y H:i:s a'),
				$archivo,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> Mas <br>Detalles</button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_CorrespConcluded()
	{

		$result = array('data' => array());
		$data = $this->Model_Correspondencia->fetchCorrespModelConcluid();
		foreach ($data as $key => $value) {
			$date = new DateTime($value['rec_fecha_recep']);
			$tipo = ('E' == $value['cor_tipo']) ? 'Externa' : 'Ninguna';
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'];
			$codigoSpan = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 14px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 14px;">COPIA ' . $value['nro_copia'] . '</span>';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);
			if ($data2 == NULL || $data2 == 0) {
				$archivo = '';
			} else {
				$archivo = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><i class="fa fa-copy"></i> Archivos</button>';
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
				'<center><span class="badge badge-secondary" style="font-size: 14px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigoSpan . '</center>',
				$value['cor_referencia'],
				$nivel,
				$value['cor_nombre_remitente'],
				$value['cor_institucion'],
				$date->format('d/m/Y H:i:s a'),
				$archivo,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> Mas <br>Detalles</button>',
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
			$nro_codigo = $row->ges_nro_gestion_ventanilla_recaudaciones;
			$gestion_id = $row->ges_id;
			$institucion = strtoupper(strip_tags(trim($this->input->post('institucion_remitente'))));
			if (empty($institucion)) {
				$procedencia = "VENTANILLA D.R.Y.P.T.";
			} else {
				$procedencia = $institucion . " (VENTANILLA D.R.Y.P.T.)";
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
				$data_gestion = array('ges_nro_gestion_ventanilla_recaudaciones' => $nro_codigo,);
				$this->Model_Correspondencia->updateNumberGestion($gestion_id, $data_gestion);
				echo '¡Hoja de Ruta Creada Correctamente!';
			} else {
				echo 'Error de Insercion en la Base de Datos';
			}
		} else {
			echo 'Error de Insercion en la Base de Datos';
		}
	}
}
