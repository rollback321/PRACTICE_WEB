<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cboletas extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('boletasDepositoMatricula');
        $this->load->model('boletaDepositoColegiatura');
		
  }




    public function listar()
	{
     //   echo "id_doc:".$_GET['id_doc']."<br>id_part:".$_GET['id_part']."<br>id_prog:".$_GET['id_prog'];
        
        $data = array("colegiatura"=>$this->boletaDepositoColegiatura->verTodo($_GET['id_doc']),
                     "matricula" => $this->boletasDepositoMatricula->verTodo($_GET['id_doc']));
       
                     $this->load->view('headers/headers');    
                     $this->load->view('boletasTableVIEW',$data);
                     $this->load->view('fooders/fooders');	

	}
}