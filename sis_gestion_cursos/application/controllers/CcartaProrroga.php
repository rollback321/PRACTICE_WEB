<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CcartaProrroga extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('prorroga');
		
  }



//Funcion que envia datos a la clase programas, metodo registrar
    public function registrar()
	{
        $paraDiplomaAcademico="SI";
	    if ($this->input->post('paraDiplomaAcademico') == null) {
             $paraDiplomaAcademico = "NO";
         } 
         $paraTituloAcademico="SI";
        if ($this->input->post('paraTituloAcademico') == null) {
             $paraTituloAcademico = "NO";
         } 
		$data = array(  "paraDiplomaAcademico"=>$paraDiplomaAcademico,
		                "paraTituloProvision"=>$paraTituloAcademico,
                        "id_doc"=>$this->input->post('id_doc',TRUE),
		                 "observaciones"=>$this->input->post('observaciones',TRUE));
	    $this->prorroga->registrar($data);	


        header('Location: ../Cmain/matriculacion?id_doc='.$_GET['id_doc'].'&id_part='.$_GET['id_part']."&id_prog=".$_GET['id_prog']);
        
        
	}
}