<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlcaldesaControl extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Alcaldesa');
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
		$data['level1'] = $this->Model_Admin->fetch_Level1();
		$data2['subTitle'] = '<i class="nav-icon fas fa-envelope-square"></i> Bandeja Hoja de Ruta';
		$this->load->view('includes/head');
		$this->load->view('alcaldesa/navbar', $data2);
		$this->load->view('alcaldesa/menu', $data);
		$this->load->view('alcaldesa/organigrama');
		$this->load->view('includes/footer');
		$this->load->view('alcaldesa/js_receptionist');
	}
	
	////LISTAS DE DEPENDENCIAS///////////
	public function list_Of_SecretaryDependency()
	{
	//	$niv_id_1 = strip_tags(trim($this->input->post('niv_id_1')));
		$data = $this->Model_Alcaldesa->Model_list_Of_SecretaryDependency();
		echo json_encode($data);
	}

	////////////////////////////////
	

}
