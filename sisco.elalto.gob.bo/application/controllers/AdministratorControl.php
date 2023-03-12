<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdministratorControl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Admin');
		$this->load->model('Model_Secretary');
		$this->load->model('Model_Correspondencia');
		$enable = $this->session->userdata('usu_rol_estado');
		if ($enable == null)
			redirect('/Welcome', 'refresh');
	}
	//BANDEJA DE ENTRADA
	public function index()
	{
		$data['level1'] = $this->Model_Admin->fetch_Level1();
		$data2['subTitle'] = '<i class="nav-icon fas fa-envelope-square"></i> Bandeja Hoja de Ruta';
		$this->load->view('includes/head');
		$this->load->view('administrador/navbar', $data2);
		$this->load->view('administrador/menu', $data);
		$this->load->view('administrador/organigrama');
		$this->load->view('includes/footer');
		$this->load->view('administrador/js_receptionist');
	}
	public function list_Of_Direction()
	{
		$niv_id_1 = strip_tags(trim($this->input->post('niv_id_1')));
		$data = $this->Model_Admin->list_Of_Direction($niv_id_1);
		echo json_encode($data);
	}
	public function list_Of_Units()
	{
		$niv_id_2 = strip_tags(trim($this->input->post('niv_id_2')));
		$data = $this->Model_Admin->list_Of_Units($niv_id_2);
		echo json_encode($data);
	}
	/////////////////////////////////////////////////////////////////////////////////////////////
	public function fetch_UserListJefeniv_1($niv_id_1)
	{
		$result = array('data' => array());
		$data = $this->Model_Admin->fetchUserListJefeniv_1($niv_id_1);
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUserJefe(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
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
	public function fetch_UserListSecretarianiv_1($niv_id_1)
	{
		$result = array('data' => array());
		$data = $this->Model_Admin->fetchUserListSecretarianiv_1($niv_id_1);
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUserSecretaria(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
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
	public function fetch_UserListTecniconiv_1($niv_id_1)
	{
		$result = array('data' => array());
		$data = $this->Model_Admin->fetchUserListTecniconiv_1($niv_id_1);
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUserTecnico(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
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
	///////////////////////////////////////////////////////////////////////////////////

	public function fetch_UserListJefeniv_2($niv_id_1, $niv_id_2)
	{
		$result = array('data' => array());
		$data = $this->Model_Admin->fetchUserListJefeniv_2($niv_id_1, $niv_id_2);
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUserJefe(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
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
	public function fetch_UserListSecretarianiv_2($niv_id_1, $niv_id_2)
	{
		$result = array('data' => array());
		$data = $this->Model_Admin->fetchUserListSecretarianiv_2($niv_id_1, $niv_id_2);
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUserSecretaria(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
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
	public function fetch_UserListTecniconiv_2($niv_id_1, $niv_id_2)
	{
		$result = array('data' => array());
		$data = $this->Model_Admin->fetchUserListTecniconiv_2($niv_id_1, $niv_id_2);
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUserTecnico(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
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
	} /////////////////////////////////////////////////////////////////////////////////////////

	public function fetch_UserListJefeniv_3($niv_id_1, $niv_id_2, $niv_id_3)
	{
		$result = array('data' => array());
		$data = $this->Model_Admin->fetchUserListJefeniv_3($niv_id_1, $niv_id_2, $niv_id_3);
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUserJefe(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
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
	public function fetch_UserListSecretarianiv_3($niv_id_1, $niv_id_2, $niv_id_3)
	{
		$result = array('data' => array());
		$data = $this->Model_Admin->fetchUserListSecretarianiv_3($niv_id_1, $niv_id_2, $niv_id_3);
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUserSecretaria(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
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
	public function fetch_UserListTecniconiv_3($niv_id_1, $niv_id_2, $niv_id_3)
	{
		$result = array('data' => array());
		$data = $this->Model_Admin->fetchUserListTecniconiv_3($niv_id_1, $niv_id_2, $niv_id_3);
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
				'<button type="button" class="btn btn-xs btn-outline-primary" name="ButtonEditar" onclick="ListModificarUserTecnico(' . $value['usu_id'] . ')"><i class="fas fa-user-edit"></i> Modificar</button>',
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
	} //////////////////////////////////////////////////////////////////////////////////////
	public function registrarUserJefe()
	{
		$dataUser = array(
			'usu_nombres' => strtoupper($this->input->post('nombresJefe')),
			'usu_apellidos' => strtoupper($this->input->post('apellidosJefe')),
			'usu_ci' => $this->input->post('ciJefe'),
			'usu_ci_expedido' => $this->input->post('expedidoJefe'),
			'usu_celular' => $this->input->post('celularJefe'),
			'usu_genero' => $this->input->post('generoJefe')
		);
		$niv1 = $this->input->post('niv1');
		$niv2 = $this->input->post('niv2');
		$niv3 = $this->input->post('niv3');
		$niv1Int = (int)$niv1;
		$niv2Int = (int)$niv2;
		$niv3Int = (int)$niv3;
		$Dep = $this->Model_Admin->Model_searchDependencia($niv1Int, $niv2Int, $niv3Int);
		$Dependencia = $Dep->nombreDependencia;
		if ($niv1Int == 0) {
			$niv1Int = null;
		}
		if ($niv2Int == 0) {
			$niv2Int = null;
		}
		if ($niv3Int == 0) {
			$niv3Int = null;
		}

		
		if ($this->Model_Admin->InsertUser($dataUser)) {
			$id_cargo = $this->db->insert_id();
			$Object = new DateTime();
			$usu_rol_create_at = $Object->format("Y-m-d h:i:s a");
			$dataRegistrarUserPass = array(
				'usu_rol_usuario' => $this->input->post('nameUserJefe'),
				'usu_rol_password' => $this->input->post('passwordJefe'),
				'usu_rol_fecha_habilitacion' => date('Y-m-d H:i:s'),
				'usu_rol_estado' => "1",
				'usu_rol_cargo' => strtoupper($this->input->post('cargoJefe')),
				'usuario_usu_id' => $id_cargo,
				'nivel_1_niv1_id' => $niv1Int,
				'nivel_2_niv2_id' => $niv2Int,
				'nivel_3_niv3_id' => $niv3Int,
				'usu_dependencia' => $Dependencia,
				'roles_rol_id' => 4,
				'usu_count' => 3,
				'usu_rol_create_at' => $usu_rol_create_at,
			);
			if ($this->Model_Admin->InsertUserRol($dataRegistrarUserPass)) {
				echo '¡Usuario Creado Correctamente!';
			} else {
				echo "Error de Insercion en la Base de Datos 2";
			}
		} else {
			echo 'Error de Insercion en la Base de Datos 3';
		}
	}

	public function ListUser($id)
	{
		$data = $this->Model_Admin->ListUser($id);
		echo json_encode($data);
	}

	public function UpdateUserJefe()
	{
		$CountUpdateUser = (int)$this->input->post('UpdateCountUserJefe');
		if ($CountUpdateUser > 0) {
			$iduser = $this->input->post('idUpdateUserJefe');
			$dataUser = array(
				'usu_nombres' => strtoupper($this->input->post('nombresUpdateJefe')),
				'usu_apellidos' => strtoupper($this->input->post('apellidosUpdateJefe')),
				'usu_ci' => (int)$this->input->post('ciUpdateJefe'),
				'usu_ci_expedido' => $this->input->post('expedidoUpdateJefe'),
				'usu_celular' => (int) $this->input->post('celularUpdateJefe'),
				'usu_genero' => (int)$this->input->post('generoUpdateJefe')
			);
			if ($this->Model_Admin->ModelUpdateUser(array('usu_id' => $iduser), $dataUser)) {
				if ($CountUpdateUser > 0) {
					$MenosCount = $CountUpdateUser - 1;
				} else {
					$MenosCount = 0;
				}
				$dataModificarUserPass = array(
					'usu_rol_usuario' => $this->input->post('nameUserUpdateJefe'),
					'usu_rol_password' => $this->input->post('passwordUpdateJefe'),
					'usu_rol_cargo' => strtoupper($this->input->post('cargoUpdateJefe')),
					'usu_count' => $MenosCount
				);
				if ($this->Model_Admin->ModelUpdateUserRol(array('usuario_usu_id' => $iduser), $dataModificarUserPass)) {
					echo "¡Usuario Modificado Correctamente!";
				} else {
					echo "Error de Insercion en la Base de Datos 3";
				}
			} else {
				echo 'Error de Insercion en la Base de Datos 2';
			}
		}
	}

	////////////////////////////////////////////////////////////
	public function registrarUserTecnico()
	{
		$dataUser = array(
			'usu_nombres' => strtoupper($this->input->post('nombresTecnico')),
			'usu_apellidos' => strtoupper($this->input->post('apellidosTecnico')),
			'usu_ci' => $this->input->post('ciTecnico'),
			'usu_ci_expedido' => $this->input->post('expedidoTecnico'),
			'usu_celular' => $this->input->post('celularTecnico'),
			'usu_genero' => $this->input->post('generoTecnico')
		);
		$niv1 = $this->input->post('niv1T');
		$niv2 = $this->input->post('niv2T');
		$niv3 = $this->input->post('niv3T');
		$niv1Int = (int)$niv1;
		$niv2Int = (int)$niv2;
		$niv3Int = (int)$niv3;
		$Dep = $this->Model_Admin->Model_searchDependencia($niv1Int, $niv2Int, $niv3Int);
		$Dependencia = $Dep->nombreDependencia;
		if ($niv1Int == 0) {
			$niv1Int = null;
		}
		if ($niv2Int == 0) {
			$niv2Int = null;
		}
		if ($niv3Int == 0) {
			$niv3Int = null;
		}
		//echo "$niv1,$niv2,$niv3.hola"; 
		if ($this->Model_Admin->InsertUser($dataUser)) {
			$id_cargo = $this->db->insert_id();
			$Object = new DateTime();
			$usu_rol_create_at = $Object->format("Y-m-d h:i:s a");
			$dataRegistrarUserPass = array(
				'usu_rol_usuario' => $this->input->post('nameUserTecnico'),
				'usu_rol_password' => $this->input->post('passwordTecnico'),
				'usu_rol_fecha_habilitacion' => date('Y-m-d H:i:s'),
				'usu_rol_estado' => "1",
				'usu_rol_cargo' => strtoupper($this->input->post('cargoTecnico')),
				'usuario_usu_id' => $id_cargo,
				'nivel_1_niv1_id' => $niv1Int,
				'nivel_2_niv2_id' => $niv2Int,
				'nivel_3_niv3_id' => $niv3Int,
				'usu_dependencia' => $Dependencia,
				'roles_rol_id' => 2,
				'usu_count' => 3,
				'usu_rol_create_at' => $usu_rol_create_at,
			);
			if ($this->Model_Admin->InsertUserRol($dataRegistrarUserPass)) {
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
	public function UpdateUser()
	{
		$CountUpdateUser = $this->input->post('UpdateCountUserTecnico');

		if ($CountUpdateUser > 0) {
			$iduser = $this->input->post('idUpdateUserTecnico');
			$dataUser = array(
				'usu_nombres' => strtoupper($this->input->post('nombresUpdateTecnico')),
				'usu_apellidos' => strtoupper($this->input->post('apellidosUpdateTecnico')),
				'usu_ci' => $this->input->post('ciUpdateTecnico'),
				'usu_ci_expedido' => $this->input->post('expedidoUpdateTecnico'),
				'usu_celular' => $this->input->post('celularUpdateTecnico'),
				'usu_genero' => $this->input->post('generoUpdateTecnico')
			);
			if ($this->Model_Secretary->ModelUpdateUser(array('usu_id' => $iduser), $dataUser)) {
				if ($CountUpdateUser > 0) {
					$MenosCount = $CountUpdateUser - 1;
				} else {
					$MenosCount = 0;
				}
				$dataModificarUserPass = array(
					'usu_rol_usuario' => $this->input->post('nameUserUpdateTecnico'),
					'usu_rol_password' => $this->input->post('passwordUpdateTecnico'),
					'usu_rol_cargo' => strtoupper($this->input->post('cargoUpdateTecnico')),
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

	/////////////////////////////////////////////////////////////
	public function registrarUserSecretaria()
	{
		$niv1 = $this->input->post('niv1S');
		$niv2 = $this->input->post('niv2S');
		$niv3 = $this->input->post('niv3S');
		$niv1Int = (int)$niv1;
		$niv2Int = (int)$niv2;
		$niv3Int = (int)$niv3;
		$Dep = $this->Model_Admin->Model_searchDependencia($niv1Int, $niv2Int, $niv3Int);
		$Dependencia = $Dep->nombreDependencia;
		if ($niv1Int == 0) {
			$niv1Int = null;
		}
		if ($niv2Int == 0) {
			$niv2Int = null;
		}
		if ($niv3Int == 0) {
			$niv3Int = null;
		}
		//echo "$niv1,$niv2,$niv3,hola2";  

		$dataUser = array(
			'usu_nombres' => strtoupper($this->input->post('nombresSecretaria')),
			'usu_apellidos' => strtoupper($this->input->post('apellidosSecretaria')),
			'usu_ci' => $this->input->post('ciSecretaria'),
			'usu_ci_expedido' => $this->input->post('expedidoSecretaria'),
			'usu_celular' => $this->input->post('celularSecretaria'),
			'usu_genero' => $this->input->post('generoSecretaria')
		);

		if ($this->Model_Admin->InsertUser($dataUser)) {
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
				'nivel_1_niv1_id' => $niv1Int,
				'nivel_2_niv2_id' => $niv2Int,
				'nivel_3_niv3_id' => $niv3Int,
				'usu_dependencia' => $Dependencia,
				'roles_rol_id' => 1,
				'usu_count' => 3,
				'usu_rol_create_at' => $usu_rol_create_at,
			);
			if ($this->Model_Admin->InsertUserRol($dataRegistrarUserPass)) {
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

	public function ListUserUpdate($id)
	{
		$data = $this->Model_Admin->ListUser($id);
		echo json_encode($data);
	}
	function UpdateStateUser()
	{
		$iduser = $this->input->post('idd');
		$dataUserState = array('usu_rol_estado' => $this->input->post('statee'));
		if ($this->Model_Admin->ModelUpdateUserState(array('usuario_usu_id' => $iduser), $dataUserState)) {
			echo '¡Estado Usuario Modificado Correctamente!';
		} else {
			echo 'Error de Insercion en la Base de Datos 4';
		}
	}
	//////////////////////////////////////////////////////////////
	function CambiarPass()
	{
		$user = $this->session->userdata('usu_id');
		$Pass = trim($this->input->post('Newpassword'));
		$NewPass = array('usu_rol_password' =>  $Pass);
		if ($this->Model_Admin->ModelUpdatePass(array('usuario_usu_id' => $user), $NewPass)) {
			echo "¡Password Modificado Correctamente!";
		} else {
			echo "Error Al modificar el Password";
		}
	}
}
