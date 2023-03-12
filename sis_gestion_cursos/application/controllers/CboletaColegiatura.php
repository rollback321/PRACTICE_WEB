<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CboletaColegiatura extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('boletaDepositoColegiatura');
		
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
		$data = array("nroDeposito"=>$this->input->post('nroDeposito',TRUE),
		                "fechaDeposito"=>$this->input->post('fechaDeposito',TRUE),
		                "monto"=>$this->input->post('montoDeposito',TRUE),
		                 "fotocopiaBoleta"=>$fotocopiaBoleta ,
		                 "boletaOriginal"=>$boletaOriginal,
                         "id_doc"=>$this->input->post('id_doc'),
                         "observaciones"=>$this->input->post("observaciones",TRUE));
	    $this->boletaDepositoColegiatura->registrar($data);						 
	    
        header('Location: ../Cparticipantes/seeligioprograma/'.$_GET['id_prog']);
	}
 
public function modificar(){
    echo "modificar CboletaColegiatura";
    
    echo "id_part:".$_GET['id_part']."<br>id_prog:".$_GET['id_prog']."<br>id_boletaCol:".$_GET['id_boletaCol']."<br>id_doc:".$_GET['id_doc'];

    

}


public function eliminar(){
    echo "eliminar CboletaColegiatura";
}

            
      }

