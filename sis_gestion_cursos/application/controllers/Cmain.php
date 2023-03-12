<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmain extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('programas');
		$this->load->model('participantes');


  }


	public function index()
	{

		session_start();
	
if (isset($_SESSION['usuario'])) {
	$url=array("url_Cmain"=>"/sistemaDegestionDeCursos",
	           "url_Cprogramas"=>"/sistemaDegestionDeCursos/index.php/Cprogramas/");
		$this->load->view('headers/headers');
		$this->load->view('mainVIEW',$url);
		$this->load->view('fooders/fooders');
}else{
		$this->load->view('headers/headers');
		$this->load->view('loginVIEW');
		$this->load->view('fooders/fooders');
}
	}
public function cerrarSesion (){
    session_start();
	session_destroy(); 
	header ('Location: ../../');
}

	

	public function programas ()
	{
		header ('Location: ../Cprogramas/mostrarDatos');
    
	
	}

	public function mainparticipantes ()
	{
		$this->load->view('headers/headers');
		$this->load->view('mainparticipantes');
		$this->load->view('fooders/fooders');
	}

public function matriculacion ()
	{
		$this->load->view('headers/headers');
		$this->load->view('boletaMatriculacionFormInsertVIEW');
		$this->load->view('fooders/fooders');
	}

public function colegiatura ()
	{
		$this->load->view('headers/headers');
		$this->load->view('boletaColegiaturaFormInsertVIEW');
		$this->load->view('fooders/fooders');
	}
	 
public function documentos ()
	{
		$this->load->view('headers/headers');
		$this->load->view('documentosFormInsertarVIEW');
		$this->load->view('fooders/fooders');
	}

public function prorroga ()
	{
		$this->load->view('headers/headers');
		$this->load->view('cartaProrrogaFormInsertVIEW');
		$this->load->view('fooders/fooders');
	}

public function administrador ()
	{
		$this->load->view('headers/headers');
		$this->load->view('administradorFormInsertVIEW');
		$this->load->view('fooders/fooders');

		
	}
}
