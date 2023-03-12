<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadministrador extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('administrador');
		
  }



//Funcion que envia datos a la clase programas, metodo registrar
    public function registrar()
	{
 
       $acceso="SI";
	    if ($this->input->post('acceso') == null) {
             $acceso = "NO";
         } 
        
		$data = array(  "nombre"=>$this->input->post('nombre',TRUE),
		                "apellidos"=>$this->input->post('apellidos',TRUE),
                        "celular"=>$this->input->post('celular',TRUE),
                        "ci"=>$this->input->post('ci',TRUE),
		                 "usuario"=>$this->input->post('usuario',TRUE),
                        "password"=>sha1($this->input->post('pass',TRUE)),
                        "acceso"=>$acceso);
	    $this->administrador->registrar($data);
        header("Location: ../");
    
    }
}