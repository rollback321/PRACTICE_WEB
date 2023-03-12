<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CboletaMatriculacion extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('boletasDepositoMatricula');
		
  }



//Funcion que envia datos a la clase programas, metodo registrar
    public function insertarRegistro()
	{

        $fotocopiaBoleta="SI";
	    if ($this->input->post('fotocopiaBoleta') == null) {
             $fotocopiaBoleta = "NO";
         } 
         $boletaOriginal="SI";
        if ($this->input->post('boletaOriginal') == null) {
             $boletaOriginal = "NO";
         } 
		$data = array(  "fechaDeposito"=>$this->input->post('fechaDeposito',TRUE),
		                "montoDeposito"=>$this->input->post('montoDeposito',TRUE),
                        "id_doc"=>$this->input->post('id_doc',TRUE),
		                 "fotocopiaBoleta"=>$fotocopiaBoleta ,
		                 "boletaOriginal"=>$boletaOriginal,
                         "observaciones"=>$this->input->post("observaciones",TRUE));
	    $this->boletasDepositoMatricula->registrar($data);		
        
        
        header('Location: ../Cmain/colegiatura?id_doc='.$_GET['id_doc'].'&id_part='.$_GET['id_part'].'&id_prog='.$_GET['id_prog']);

	}
 
    
            
      }



