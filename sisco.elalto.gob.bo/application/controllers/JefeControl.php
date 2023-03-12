<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JefeControl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Secretary');
		$this->load->model('Model_Jefe');
		$this->load->model('Model_Admin');
		$this->load->model('Model_Correspondencia');
		$this->load->model('Model_Proveido');
		$enable = $this->session->userdata('usu_rol_estado');
		if ($enable == null)
			redirect('/Welcome', 'refresh');
	}
	public function index()
	{
		$data3['level1'] = $this->Model_Admin->fetch_Level1();
		$data['active'] = array("active", "", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-signature"></i> Adm. de Hojas de Ruta de mi Personal';
		$DireccionURL['url'] = 'JefeControl/';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('Jefe/menu', $data);
		$this->load->view('Jefe/seguimientohojaruta', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('ModViewHistorial/viewHistorial');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('Jefe/js_receptionist_seguimiento', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('ModViewHistorial/js_viewHistorial');
		$this->load->view('ModSeguimientoHojasRutas/js_datatableSeguimientoMenuPrincipal');
		$this->load->view('ModSeguimientoHojasRutas/js_datatableSeguimientoMenuPrincipalUserDetalles');
		$this->load->view('ModSeguimientoHojasRutas/js_viewStyleMenuPrincipal');
		$this->load->view('ModSeguimientoHojasRutas/js_viewStyleRegresar');
	}
	public function crearhojaruta()
	{
		$data['active'] = array("", "active", "", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-file-signature"></i> Crear hojas de Ruta';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'JefeControl/crearhojaruta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('Jefe/menu', $data);
		$this->load->view('Jefe/crearHojaRuta', $data3);
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('reports/js_pdf');
		$this->load->view('Jefe/js_receptionist', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	//ADMIN USER
	public function adminUser()
	{
		$data['active'] = array("", "", "active", "", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-user-friends"></i> Mis Personal';
		$DireccionURL['url'] = 'JefeControl/adminUser';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('Jefe/menu', $data);
		$this->load->view('Jefe/adminUser');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('Jefe/js_receptionist_user', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}
	public function contactos()
	{
		$data['active'] = array("", "", "", "active", "", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-phone-alt"></i> Buscar Contactos G.A.M.E.A.';
		$data3['proveido'] = $this->Model_Proveido->fetchProveido();
		$DireccionURL['url'] = 'JefeControl/contactos';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('Jefe/menu', $data);
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
		$data['active'] = array("", "", "", "", "active", "");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fas fa-search-location"></i> Buscar Hoja de Ruta';
		$DireccionURL['url'] = 'JefeControl/searchHojaRuta';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('Jefe/menu', $data);
		$this->load->view('ModSearch/searchHojaRuta');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModSearch/js_receptionist_search_Jefe', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
		$this->load->view('reports/js_pdf');
	}
	//TUTORIALES
	public function tutoriales()
	{
		$data['active'] = array("", "", "", "", "", "active");
		$this->load->view('includes/head');
		$data2['subTitle'] = '<i class="nav-icon fab fa-youtube"></i> Tutoriales';
		$DireccionURL['url'] = 'JefeControl/tutoriales';
		$this->load->view('includes/navbar', $data2);
		$this->load->view('Jefe/menu', $data);
		$this->load->view('ModTutoriales/vtutoriales');
		$this->load->view('ModPassword/vModalPassword');
		$this->load->view('includes/footer');
		$this->load->view('ModTutoriales/js_receptionist_videos_jefe', $DireccionURL);
		$this->load->view('tema/js_tema');
		$this->load->view('ModPassword/js_ModalPassword');
	}



	////////////////////////////////////TABLAS SOLO JEFE////////////////////////////////////

	function fetch_Corresp()
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->fetchCorrespModel();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' .  $value['ges_gestion'];
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);
			if ($data2 == NULL) {
				$valor = "";
			} else {
				$valor = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><i class="fa fa-copy"></i><br> Ver Archivos</button>';
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
					   <a class="dropdown-item" href="#" onclick="listarDatosHojaRuta(' . $value['cor_id'] . ',\'' . $codigo . '\')" data-target="#editarHojaRuta" data-toggle="modal"><i class="fas fa-edit"></i> Editar</a>
                      <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja Ruta(Sobre Imprimir)</a>
					  <a class="dropdown-item" href="#" onclick="generarPDF_hojaderuta(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja Ruta(Imprimir)</a>
                   </div>
                  </div>',
				'<span class="badge badge-secondary" style="font-size: 14px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '<br>ORIGINAL</span>',
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
		$result = array('data' => array());
		$data = $this->Model_Jefe->fetchCorrespModelProcess();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 14px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 14px;">COPIA ' . $value['nro_copia'] . '</span>';
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
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
                   </div>
                  </div>',
				'<center><span class="badge badge-secondary" style="font-size: 14px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigo . '</center>',
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
		$result = array('data' => array());
		$data = $this->Model_Jefe->fetchCorrespModelConcluded();
		foreach ($data as $key => $value) {
			$tipo = ('E' == $value['cor_tipo']) ? 'EXTERNA' : 'INTERNA';
			$nivel = ('P' == $value['cor_nivel']) ? 'Prioritario' : ('U' == $value['cor_nivel'] ? 'Urgente' : 'Rutinario');
			$codigo = ('O' == $value['origen'] || null == $value['origen']) ? '<span class="badge badge-secondary" style="font-size: 14px;">ORIGINAL</span>' : '<span class="badge badge-secondary" style="font-size: 14px;">COPIA ' . $value['nro_copia'] . '</span>';
			$a = $value['cor_id'];
			$data2 = $this->Model_Correspondencia->ModelListDocument($a, null);
			if ($data2 == NULL) {
				$valor = "";
			} else {
				$valor = '<button type="button" name="ButtonVerArchivo" class="btn btn-outline-primary btn-sm"  onclick="VerArchivosAjax(' . $value['cor_id'] . ')"  data-toggle="modal"><i class="fa fa-copy"></i> <br> Ver Archivos</button>';
			}
			$result['data'][$key] = array(
				' <div class="btn-group-sm">
                   <button type="button" class="btn btn-outline-primary dropdown-toggle btn-sm" data-toggle="dropdown">
                      Acciones
                    </button>
                    <div class="dropdown-menu" role="menu">
					<a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja de Ruta(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaCabecera(' . $value['cor_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Hoja de Ruta(Imprimir)</a>
                    <a class="dropdown-item" href="#" onclick="generarPDF_sobrescribirhojaderutaHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Sobre Imprimir)</a>
					<a class="dropdown-item" href="#" onclick="generarPDF_hojaderutaHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ')"><i class="fa fa-print" aria-hidden="true"></i> Historial(Imprimir)</a>
                   </div>
                  </div>',
				'<center><span class="badge badge-secondary" style="font-size: 14px;">GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion'] . '</span><br>' . $codigo . '</center>',
				'<i class="fas fa-circle-notch fa-spin fa-2x" style="color: green;"></i><b style="color: darkgreen;"> Concluido</b>',
				$tipo,
				$valor,
				$value['cor_referencia'],
				$nivel,
				'<button type="button" onclick="viewFile(' . $value['cor_id'] . ',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#viewEyeRoute"><i class="fas fa-file-alt"></i> <br>Mas Detalles</button>',
			);
		}
		echo json_encode($result);
	}

	//////////////////////////////////////////////////////////////////////

	////////////////////////////////////TABLAS TODA LA DEPENDENCIA///////////////
	function fetch_UserBandeja()
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserBandeja();
		$cont = 1;

		foreach ($data as $key => $value) {
			$estado = (1 == $value['usu_rol_estado']) ? '<span title="3 New Messages" class="badge bg-success">ACTIVO</span>' :  '<span title="3 New Messages" class="badge bg-danger">INACTIVO</span>';

			if ($value['usu_genero'] == 1) {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/hombre-de-negocios.svg" class="img-circle elevation-2" alt="User Image"  width="26px">';
			} else {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/mujer.svg" class="img-circle elevation-2" alt="User Image" width="26px">';
			}
			$NombreCompleto = $value['usu_nombres'] . " " . $value['usu_apellidos'];
			$result['data'][$key] = array(
				$cont,
				$genero . " " . $value['usu_nombres'] . " " . $value['usu_apellidos'],
				$value['usu_rol_cargo'],
				'<center>' . $estado . '</center>',
				'<center>' . $value['bandeja'] . '</center><div class="progress progress-sm"><div class="progress-bar bg-success" style="width:' . $value['bandeja'] . '%"></div></div>',
				'<center><button type="button" onclick="BandejaDetallesUser(' . $value['usu_rol_id'] . ',\'' . $NombreCompleto . '\')" class="btn btn-outline-primary btn-sm" ><i class="fas fa-file-alt"></i> Ver Mas Detalles</button></center>',
			);
			$cont = $cont + 1;
		}
		echo json_encode($result);
	}

	function fetch_UserAceptadas()
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserAceptadas();
		$cont = 1;
		foreach ($data as $key => $value) {
			$estado = (1 == $value['usu_rol_estado']) ? '<span title="3 New Messages" class="badge bg-success">ACTIVO</span>' :  '<span title="3 New Messages" class="badge bg-danger">INACTIVO</span>';
			if ($value['usu_genero'] == 1) {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/hombre-de-negocios.svg" class="img-circle elevation-2" alt="User Image"  width="26px">';
			} else {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/mujer.svg" class="img-circle elevation-2" alt="User Image" width="26px">';
			}
			$NombreCompleto = $value['usu_nombres'] . " " . $value['usu_apellidos'];
			$result['data'][$key] = array(
				$cont,
				$genero . " " . $value['usu_nombres'] . " " . $value['usu_apellidos'],
				$value['usu_rol_cargo'],
				'<center>' . $estado . '</center>',
				'<center>' . $value['bandeja'] . '</center><div class="progress progress-sm"><div class="progress-bar bg-success" style="width:' . $value['bandeja'] . '%"></div></div>',
				// $value['cor_descripcion'],
				'<center><button type="button" onclick="AceptadasDetallesUser(' . $value['usu_rol_id'] . ',\'' . $NombreCompleto . '\')" class="btn btn-outline-primary btn-sm" ><i class="fas fa-file-alt"></i> Ver Mas Detalles</button></center>',
			);
			$cont = $cont + 1;
		}
		echo json_encode($result);
	}

	function fetch_UserDerivadas()
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserDerivadas();
		$cont = 1;
		foreach ($data as $key => $value) {
			$estado = (1 == $value['usu_rol_estado']) ? '<span title="3 New Messages" class="badge bg-success">ACTIVO</span>' :  '<span title="3 New Messages" class="badge bg-danger">INACTIVO</span>';
			if ($value['usu_genero'] == 1) {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/hombre-de-negocios.svg" class="img-circle elevation-2" alt="User Image"  width="26px">';
			} else {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/mujer.svg" class="img-circle elevation-2" alt="User Image" width="26px">';
			}
			$NombreCompleto = $value['usu_nombres'] . " " . $value['usu_apellidos'];
			$result['data'][$key] = array(
				$cont,
				$genero . " " . $value['usu_nombres'] . " " . $value['usu_apellidos'],
				$value['usu_rol_cargo'],
				'<center>' . $value['bandeja'] . '</center><div class="progress progress-sm"><div class="progress-bar bg-success" style="width:' . $value['bandeja'] . '%"></div></div>',
				// $value['cor_descripcion'],
				'<button type="button" onclick="DerivadasDetallesUser(' . $value['usu_rol_id'] . ',\'' . $NombreCompleto . '\')" class="btn btn-outline-primary btn-sm" ><i class="fas fa-file-alt"></i> Ver Mas Detalles</button>',
			);
			$cont = $cont + 1;
		}
		echo json_encode($result);
	}

	function fetch_UserRechazadas()
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserRechazadas();
		$cont = 1;
		foreach ($data as $key => $value) {
			$estado = (1 == $value['usu_rol_estado']) ? '<span title="3 New Messages" class="badge bg-success">ACTIVO</span>' :  '<span title="3 New Messages" class="badge bg-danger">INACTIVO</span>';
			if ($value['usu_genero'] == 1) {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/hombre-de-negocios.svg" class="img-circle elevation-2" alt="User Image"  width="26px">';
			} else {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/mujer.svg" class="img-circle elevation-2" alt="User Image" width="26px">';
			}
			$NombreCompleto = $value['usu_nombres'] . " " . $value['usu_apellidos'];
			$result['data'][$key] = array(
				$cont,
				$genero . " " . $value['usu_nombres'] . " " . $value['usu_apellidos'],
				$value['usu_rol_cargo'],
				'<center>' . $value['bandeja'] . '</center><div class="progress progress-sm"><div class="progress-bar bg-success" style="width:' . $value['bandeja'] . '%"></div></div>',
				// $value['cor_descripcion'],
				'<button type="button" onclick="RechazadasDetallesUser(' . $value['usu_rol_id'] . ',\'' . $NombreCompleto . '\')" class="btn btn-outline-primary btn-sm" ><i class="fas fa-file-alt"></i> Ver Mas Detalles</button>',
			);
			$cont = $cont + 1;
		}
		echo json_encode($result);
	}

	function fetch_UserAceptadasForConcluir()
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserAceptadasForConcluir();
		$cont = 1;
		foreach ($data as $key => $value) {
			$estado = (1 == $value['usu_rol_estado']) ? '<span title="3 New Messages" class="badge bg-success">ACTIVO</span>' :  '<span title="3 New Messages" class="badge bg-danger">INACTIVO</span>';
			if ($value['usu_genero'] == 1) {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/hombre-de-negocios.svg" class="img-circle elevation-2" alt="User Image"  width="26px">';
			} else {
				$genero = '<img src="' . base_url() . 'assets/dist/img/plantilla/mujer.svg" class="img-circle elevation-2" alt="User Image" width="26px">';
			}
			$NombreCompleto = $value['usu_nombres'] . " " . $value['usu_apellidos'];
			$result['data'][$key] = array(
				$cont,
				$genero . " " . $value['usu_nombres'] . " " . $value['usu_apellidos'],
				$value['usu_rol_cargo'],
				'<center>' . $estado . '</center>',
				'<center>' . $value['bandeja'] . '</center><div class="progress progress-sm"><div class="progress-bar bg-success" style="width:' . $value['bandeja'] . '%"></div></div>',
				// $value['cor_descripcion'],
				'<center><button type="button" onclick="AceptadasConcluirDetallesUser(' . $value['usu_rol_id'] . ',\'' . $NombreCompleto . '\')" class="btn btn-outline-primary btn-sm" ><i class="fas fa-file-alt"></i> Ver Mas Detalles</button></center>',
			);
			$cont = $cont + 1;
		}
		echo json_encode($result);
	}


	///////////////////////////////////

	function fetch_UserDetallesBandeja($user)
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserDetallesBandeja($user);
		$cont = 1;
		foreach ($data as $key => $value) {
			$codigo = "GAMEA-" . $value['cor_codigo'] . "-" . $value['ges_gestion'];
			if ($value['origen'] == 'O') {
				$origen = "ORIGINAL";
			} else {
				$origen = "COPIA-" . $value['nro_copia'];
			}
			$originalDate = $value['a_fecha'];
			$newDate = date("d-m-Y H:i:s", strtotime($originalDate));
			$dateEndAlert = '<span class="badge badge-success">' . $newDate . '</span>';
			$result['data'][$key] = array(
				'<span title="3 New Messages"style="font-size:12px;"class="badge bg-secondary" >' . $codigo . '<br>' . $origen . '</span>',
				'<center>' . $value['cor_referencia'] . '</center>',
				'<center>' . $value['Servidor'] . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $value['Condicion'] . ']</center>',
				'<center>' . $value['receptionN'] . " " . $value['receptionNA'] . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $value['usu_dependencia'] . ']</center>',
				'<center>' . $dateEndAlert . '</center>',
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigo . ' ' . $origen . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="ViewDetallesDatos(' . $value['cor_id'] . ')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
			$cont = $cont + 1;
		}
		echo json_encode($result);
	}


	function fetch_UserDetallesAceptada($user)
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserDetallesAceptada($user);
		foreach ($data as $key => $value) {
			$codigo = "GAMEA-" . $value['cor_codigo'] . "-" . $value['ges_gestion'];
			if ($value['origen'] == 'O') {
				$origen = "ORIGINAL";
			} else {
				$origen = "COPIA-" . $value['nro_copia'];
			}
			$originalDate = $value['r_fecha'];
			$newDate = date("d-m-Y H:i:s", strtotime($originalDate));
			$dateEndAlert = '<span class="badge badge-success">' . $newDate . '</span>';

			$result['data'][$key] = array(
				'<span title="3 New Messages"style="font-size:12px;"class="badge bg-secondary" >' . $codigo . '<br>' . $origen . '</span>',
				'<center>' . $value['cor_referencia'] . '</center>',
				'<center>' . $value['EmisorN'] . " " . $value['EmisorNA'] . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $value['usu_dependencia'] . ']</center>',
				'<center>' . $value['ReceptionN'] . " " . $value['ReceptionNA']  . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $this->session->userdata('nameUnique') . ']</center>',
				'<center>' . $dateEndAlert . '</center>',
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigo . ' ' . $origen . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="ViewDetallesDatos(' . $value['cor_id'] . ')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}

	function fetch_UserDetallesDerivada($user)
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserDetallesDerivada($user);
		foreach ($data as $key => $value) {
			$codigo = "GAMEA-" . $value['cor_codigo'] . "-" . $value['ges_gestion'];
			if ($value['origen'] == 'O') {
				$origen = "ORIGINAL";
			} else {
				$origen = "COPIA-" . $value['nro_copia'];
			}
			$originalDate = $value['a_fecha'];
			$newDate = date("d-m-Y H:i:s", strtotime($originalDate));
			$dateEndAlert = '<span class="badge badge-success">' . $newDate . '</span>';
			$result['data'][$key] = array(
				'<span title="3 New Messages"style="font-size:12px;"class="badge bg-secondary" >' . $codigo . '<br>' . $origen . '</span>',
				'<center>' . $value['cor_referencia'] . '</center>',
				'<center>' . $value['ReceptionN'] . " " . $value['ReceptionNA']  . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $this->session->userdata('nameUnique') . ']</center>',
				'<center>' . $value['EmisorN'] . " " . $value['EmisorNA'] . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $value['usu_dependencia'] . ']</center>',
				'<center>' . $dateEndAlert . '</center>',
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigo . ' ' . $origen . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="ViewDetallesDatos(' . $value['cor_id'] . ')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_UserDetallesRechazada($user)
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserDetallesRechazada($user);
		foreach ($data as $key => $value) {
			$codigo = "GAMEA-" . $value['cor_codigo'] . "-" . $value['ges_gestion'];
			if ($value['origen'] == 'O') {
				$origen = "ORIGINAL";
			} else {
				$origen = "COPIA-" . $value['nro_copia'];
			}
			if ($value['r_descrip_rechazo'] == NULL || $value['r_descrip_rechazo'] == "") {
				$resp = "SIN MOTIVO";
			} else {
				$resp = $value['r_descrip_rechazo'];
			}
			$originalDate = $value['r_fecha'];
			$newDate = date("d-m-Y H:i:s", strtotime($originalDate));
			$dateEndAlert = '<span class="badge badge-success">' . $newDate . '</span>';

			$result['data'][$key] = array(
				'<span title="3 New Messages"style="font-size:12px;"class="badge bg-secondary" >' . $codigo . '<br>' . $origen . '</span>',
				'<center>' . $value['cor_referencia'] . '</center>',
				'<center>' . $value['EmisorN'] . " " . $value['EmisorNA'] . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $value['usu_dependencia'] . ']</center>',
				'<center>' . $value['ReceptionN'] . " " . $value['ReceptionNA']  . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $this->session->userdata('nameUnique') . ']</center>',

				'<center>' . $resp . '</center>',
				'<center>' . $dateEndAlert . '</center>',
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigo . ' ' . $origen . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="ViewDetallesDatos(' . $value['cor_id'] . ')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}
	function fetch_UserDetallesAceptadasConcluir($user)
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->Model_fetchUserDetallesAceptadaConcluir($user);
		foreach ($data as $key => $value) {
			$codigo = "GAMEA-" . $value['cor_codigo'] . "-" . $value['ges_gestion'];
			if ($value['origen'] == 'O') {
				$origen = "ORIGINAL";
			} else {
				$origen = "COPIA-" . $value['nro_copia'];
			}
			if ($value['cor_estado'] == 2 || $value['cor_estado'] == 1) {
				$state = '<button type="button" onclick="ConcluirHojaRuta(' . $value['cor_id'] . ',' . $value['his_id'] . ',' . $value['cor_estado'] . ',\'' . $value['origen'] . '\',\'' . $value['nro_copia'] . '\',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i>  Concluir Hoja de Ruta </span></button>';
			} else {
				$state = '<button type="button" onclick="ConcluirHojaRuta(' . $value['cor_id'] . ',' . $value['his_id'] . ',' . $value['cor_estado'] . ',\'' . $value['origen'] . '\',\'' . $value['nro_copia'] . '\',\'GAMEA-' . $value['cor_codigo'] . '-' . $value['ges_gestion']  . '\')" class="btn btn-outline-secondary btn-sm" ><span title="3 New Messages"style="font-size:12px;" > Concluido </span></button>';
			}
			$originalDate = $value['r_fecha'];
			$newDate = date("d-m-Y H:i:s", strtotime($originalDate));
			$dateEndAlert = '<span class="badge badge-success">' . $newDate . '</span>';
			$result['data'][$key] = array(
				'<span title="3 New Messages"style="font-size:12px;"class="badge bg-secondary" >' . $codigo . '<br>' . $origen . '</span>',
				'<center>' . $value['cor_referencia'] . '</center>',
				'<center>' . $value['EmisorN'] . " " . $value['EmisorNA'] . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $value['usu_dependencia'] . ']</center>',
				'<center>' . $value['ReceptionN'] . " " . $value['ReceptionNA']  . ' <br> [ <img src="' . base_url() . 'assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" style="width:18px; ">' . $this->session->userdata('nameUnique') . ']</center>',
				'<center>' . $dateEndAlert . '</center>',
				'<center>' . $state . '</center>',
				'<button type="button" onclick="ViewHistorial(' . $value['cor_id'] . ',' . $value['his_id'] . ',\'' . $value['origen'] . '\',' . intval($value['nro_copia']) . ',\'' . $codigo . ' ' . $origen . '\')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Ver Historial</span></button>',
				'<button type="button" onclick="ViewDetallesDatos(' . $value['cor_id'] . ')" class="btn btn-outline-primary btn-sm" ><span title="3 New Messages"style="font-size:12px;" ><i class="fas fa-file-alt"></i> Mas Detalles</span></button>',
			);
		}
		echo json_encode($result);
	}

	///////////////////////////////////END //////////////////////////////////////
	public function CantTotalHojasRutaDep()
	{
		$dep = $this->session->userdata('nameUnique');
		$data = $this->Model_Jefe->TotalesHojasRuta($dep);
		echo json_encode($data);
	}
	////////////////////////////////////TABLAS SOLO JEFE////////////////////////////////////
	function fetch_AdmHojas()
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->fetchCorrespAdm();
		echo json_encode($result);
	}
	//////////////////////////////////////////////////////////////////
	public function fetchDataListTechnical()
	{
		$data = $this->Model_Jefe->fetchUserListTechnical();
		echo json_encode($data);
	}
	public function fetchDataListSecretary()
	{
		$data = $this->Model_Jefe->fetchUserListSecretary();
		echo json_encode($data);
	}

	public function fetchUserListTechnicaVerSecretaria()
	{
		$data = $this->Model_Jefe->fetchUserListTechnicaVerSecretaria();
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
			'usu_nombres' => $this->input->post('nombres'),
			'usu_apellidos' => $this->input->post('apellidos'),
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
				'usu_rol_cargo' => $this->input->post('cargo'),
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
	//MODIFICAR TECNICO
	public function UpdateUserSecretaria()
	{
		$CountUpdateUser = $this->input->post('UpdateCountUserSecretaria');

		if ($CountUpdateUser > 0) {
			$iduser = $this->input->post('idUpdateUserSecretaria');
			$dataUser = array(
				'usu_nombres' => strtoupper($this->input->post('nombresUpdateSecretaria')),
				'usu_apellidos' => strtoupper($this->input->post('apellidosUpdateSecretaria')),
				'usu_ci' => $this->input->post('ciUpdateSecretaria'),
				'usu_ci_expedido' => $this->input->post('expedidoUpdateSecretaria'),
				'usu_celular' => $this->input->post('celularUpdateSecretaria'),
				'usu_genero' => $this->input->post('generoUpdateSecretaria')
			);
			if ($this->Model_Secretary->ModelUpdateUser(array('usu_id' => $iduser), $dataUser)) {
				if ($CountUpdateUser > 0) {
					$MenosCount = $CountUpdateUser - 1;
				} else {
					$MenosCount = 0;
				}
				$dataModificarUserPass = array(
					'usu_rol_usuario' => $this->input->post('nameUserUpdateSecretaria'),
					'usu_rol_password' => $this->input->post('passwordUpdateSecretaria'),
					'usu_rol_cargo' => strtoupper($this->input->post('cargoUpdateSecretaria')),
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


	//LISTA DOCUMENTOS
	public function ListDocument($id)
	{
		$result = array('data' => array());
		$user = $this->session->userdata('usu_id');
		$data = $this->Model_Jefe->ModelListDocument($id, $user);
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
			'cor_cite' => strip_tags(trim($this->input->post('cite_edit'))),
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

	function ConcluirHojaRuta()
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha = date("Y-m-d H:i:s", $time);
		$user = $this->session->userdata('usu_rol_id');
		$cor_id = trim($this->input->post('cor_id'));
		$his_id = trim($this->input->post('his_id'));
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
			'user_conclusion' =>  $user,
			'motivo_conclusion' =>  $motivo,
			'fecha_conclusion' =>  $fecha,
		);
		if ($this->Model_Jefe->insertHojaRutaConcluida($action)) {
			if ($this->Model_Secretary->updateAcceptHistory(array('bandeja' => 0, 'recepcion' => 0), $his_id)) {
				if ($origen == "O"  && $nro_copia == 0) {
					$this->Model_Secretary->updateCorrespondence(array('cor_estado' => 3), $cor_id);
				}
				echo "Hoja de Ruta " . $codigo . " Concluida Correctamente!";
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
				echo "Hoja de Ruta " . $codigo . " Desconcluida Correctamente!";
			} else {
				echo "Error al Desconcluir la hoja de Ruta";
			}
		} else {
			echo "Error al Desconcluir la hoja de Ruta";
		}

		//echo $nro_copia;
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





	public function fetch_UserListTecnico()
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->fetchUserListTecnico();
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
				$value['usu_ci'] . ' ' .	$value['usu_ci_expedido'],
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



	public function fetch_UserListSecretaria()
	{
		$result = array('data' => array());
		$data = $this->Model_Jefe->fetchUserListSecretaria();
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditarSecretaria" onclick="ListModificarUserSecretaria(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
				$value['usu_nombres'],
				$value['usu_apellidos'],
				$value['usu_ci'] . ' ' .	$value['usu_ci_expedido'],
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



	////////// REGISTRAR,LÑIOSTAR Y MODIFICAR TECNICOS ///////
	public function registrarUserTecnicos()
	{
		$dataUser = array(
			'usu_nombres' => strtoupper($this->input->post('nombres')),
			'usu_apellidos' => strtoupper($this->input->post('apellidos')),
			'usu_ci' => $this->input->post('ci'),
			'usu_ci_expedido' => $this->input->post('expedido'),
			'usu_celular' => $this->input->post('celular'),
			'usu_genero' => $this->input->post('genero')
		);
		if ($this->Model_Jefe->InsertUser($dataUser)) {
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
			if ($this->Model_Jefe->InsertUserRol($dataRegistrarUserPass)) {
				echo '¡Usuario Creado Correctamente!';
			} else {
				echo "Error de Insercion en la Base de Datos 2";
			}
		} else {
			echo 'Error de Insercion en la Base de Datos 3';
		}
	}
	public function ListUserTecnicos($id)
	{
		$data = $this->Model_Jefe->ListUser($id);
		echo json_encode($data);
	}

	function UpdateStateUser()
	{
		$iduser = $this->input->post('idd');
		$dataUserState = array('usu_rol_estado' => $this->input->post('statee'));
		// $iduser2= array('usuario_usu_id' => $this->input->post('id'));
		// $dataUserState= array('usu_rol_estado' => $this->input->post('state'));
		if ($this->Model_Jefe->ModelUpdateUserState(array('usuario_usu_id' => $iduser), $dataUserState)) {
			echo '¡Estado Usuario Modificado Correctamente!';
		} else {
			echo 'Error de Insercion en la Base de Datos 4';
		}
	}
	////////// END REGISTRAR,LÑIOSTAR Y MODIFICAR TECNICOS ///////


	////////// REGISTRAR,LÑIOSTAR Y MODIFICAR SECRETARIAS ///////
	public function registrarUserSecretaria()
	{
		$dataUser = array(
			'usu_nombres' => strtoupper($this->input->post('nombresSecretaria')),
			'usu_apellidos' => strtoupper($this->input->post('apellidosSecretaria')),
			'usu_ci' => $this->input->post('ciSecretaria'),
			'usu_ci_expedido' => $this->input->post('expedidoSecretaria'),
			'usu_celular' => $this->input->post('celularSecretaria'),
			'usu_genero' => $this->input->post('generoSecretaria')
		);
		if ($this->Model_Jefe->InsertUser($dataUser)) {
			$id_cargo = $this->db->insert_id();
			$Object = new DateTime();
			$usu_rol_create_at = $Object->format("Y-m-d h:i:s a");

			$dataRegistrarUserPass = array(
				'usu_rol_usuario' => $this->input->post('nameUserSecretaria'),
				'usu_rol_password' => $this->input->post('passwordSecretaria'),
				'usu_rol_fecha_habilitacion' => date('Y-m-d H:i:s'),
				'usu_rol_estado' => "1",
				'usu_rol_cargo' => strtoupper($this->input->post('cargoSecretaria')),
				'usuario_usu_id' => $id_cargo,
				'nivel_1_niv1_id' => $this->session->userdata('rol_niv_1'),
				'nivel_2_niv2_id' => $this->session->userdata('rol__niv_2'),
				'nivel_3_niv3_id' => $this->session->userdata('rol__niv_3'),
				'roles_rol_id' => 1,
				'usu_count' => 3,
				'usu_dependencia' => $this->session->userdata('nameUnique'),
				'usu_rol_create_at' => $usu_rol_create_at,
			);
			if ($this->Model_Jefe->InsertUserRol($dataRegistrarUserPass)) {
				echo '¡Usuario Creado Correctamente!';
			} else {

				echo "Error de Insercion en la Base de Datos 2";
			}
		} else {
			echo 'Error de Insercion en la Base de Datos 3';
		}
	}
	public function ListUserSecretaria($id)
	{
		$data = $this->Model_Jefe->ListUser($id);
		echo json_encode($data);
	}

	function UpdateStateUserSecretaria()
	{
		$iduser = $this->input->post('idd');
		$dataUserState = array('usu_rol_estado' => $this->input->post('statee'));
		// $iduser2= array('usuario_usu_id' => $this->input->post('id'));
		// $dataUserState= array('usu_rol_estado' => $this->input->post('state'));
		if ($this->Model_Jefe->ModelUpdateUserState(array('usuario_usu_id' => $iduser), $dataUserState)) {
			echo '¡Estado Usuario Modificado Correctamente!';
		} else {
			echo 'Error de Insercion en la Base de Datos 4';
		}
	}
	////////// END REGISTRAR,LÑIOSTAR Y MODIFICAR SECRETARIAS ///////
	public function fileUpload()
	{
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
				date_default_timezone_set('America/La_Paz');
				$time = time();
				$fecha = date("Y-m-d H:i:s", $time);
				$uploadData = $this->upload->data();
				$user = $this->session->userdata('usu_id');
				$archivo = $uploadData['file_name'];
				$us = $this->Model_Correspondencia->idUltimoCorres($user);
				$id = $us->cor_id;
				$this->Model_Correspondencia->ModelSubirDocumento($user, $archivo, $datos, $fecha, $id);
			}
		}
	}
	//////////////////////////////////////////////////////////////////
	public function Dependecias_niv1()
	{
		$niv1 = $this->input->post('niv_id_1');
		$data = $this->Model_Jefe->Model_Dependencia_niv1($niv1);
		echo json_encode($data);
	}
	//////////////////////////////////////////////////////////////////
	public function Dependecias_niv2()
	{
		$niv1 = $this->input->post('niv_id_1');
		$data = $this->Model_Jefe->Model_Dependencia_niv2($niv1);
		echo json_encode($data);
	}
	//////////////////////////////////////////////////////////////////
	public function Dependecias_niv3()
	{
		$niv2 = $this->input->post('niv_id_2');
		$data = $this->Model_Jefe->Model_Dependencia_niv3($niv2);
		echo json_encode($data);
	}


	///////////////////////
	public function BuscarDependenciasAdministracionHojasRutas()
	{
		$n1 = intval($this->input->post('niv1'));
		$n2 = intval($this->input->post('niv2'));
		$n3 = intval($this->input->post('niv3'));
		if ($n1 != 0 && $n2 != 0 && $n3 == 0) {
			$data_n2 = $this->Model_Jefe->Model_Dependencia_niv2($n2);
			$data_n3 = $this->Model_Jefe->Model_Dependencia_niv2_niv3($n2);
			$data = array(
				"data_n2" => $data_n2,
				"data_n3" => $data_n3,
			);
		}
		if ($n1 != 0 && $n2 == 0 && $n3 == 0) {
			$data_n2 = $this->Model_Jefe->Model_Dependencia_niv1($n1);
			$data_n3 = $this->Model_Jefe->Model_Dependencia_niv1_niv2($n1);
			$data = array(
				"data_n2" => $data_n2,
				"data_n3" => $data_n3,
			);
		}
		echo json_encode($data);
	}
}
