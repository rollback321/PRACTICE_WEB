<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cparticipantes extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('participantes');
        $this->load->model('programas');
  }

//funcion para el menu de participantes
	public function mainparticipantes ()
	{
		$this->load->view('headers/headers');
		$this->load->view('mainparticipantes');
		$this->load->view('fooders/fooders');
	}

 //FUNCION QUE RECIBE ID DE PARTICIPANTE A ELIMINAR 
public function eliminarRegistro(){
	$id =  $this->uri->segment(3);
	$this->participantes->eliminar($id);
	//echo "id_registro:".$id."   id_prog:".$this->input->get('id_prog',TRUE);
	header ('Location: ../../seeligioprograma/'.$this->input->get('id_prog',TRUE));
}
//FUNCION, OBTIENE DATOS A MODIFICAR
public function obtenerRegistro(){
	//id del participante
	$id =  $this->uri->segment(3);
	//id del programa
	$id_prog = $this->input->get('id_prog',TRUE);
	$data_update = array("datos"=>$this->participantes->verParticipante($id),
	                     "datosPrograma"=>$this->programas->verPrograma($id_prog));
	$data_t = array("enlaces"=>$this->participantes->verTodo($id_prog),"id_prog"=>$id_prog);
	$this->load->view('headers/headers');
	$this->load->view('participantesFormUpdateVIEW',$data_update);      
    $this->load->view('participantesTableVIEW',$data_t);
	$this->load->view('fooders/fooders');
}
//FUNCION QUE MODIFICA DATOS
public function modificarRegistro (){

	$data = array("nombre"=>$this->input->post('nombre',TRUE),
				  "apellidoP"=>$this->input->post('apellidoP',TRUE),
				  "apellidoM"=>$this->input->post('apellidoM',TRUE),
				  "ci"=>$this->input->post('ci',TRUE),
				   "nCelular1"=>$this->input->post('nCelular1',TRUE),
				  "nCelular2"=>$this->input->post('nCelular2',TRUE),
				  "correo"=>$this->input->post('correo',TRUE),
				   "dtoResidencia"=>$this->input->post('dtoResidencia',TRUE));
	$id_prog=$this->input->post("id_prog",TRUE);	
	$id_part=$this->input->post("id_part",TRUE);			  	  
	$this->participantes->modificar($data,$id_part);
	header ('Location: seeligioprograma/'.$id_prog);	
}
//FUNCION LISTAR PROGRAMAS A ELEGIR 
public function elijaPrograma(){
    //Se guarda en array los distintos programas
     $data = array("enlaces"=>$this->programas->verTodo());

	$this->load->view('headers/headers');
	$this->load->view('elegirPrograma',$data);
	$this->load->view('fooders/fooders');
	}


	

public function seeligioprograma(){
	//se obtiene la id del programa
	$id = $this->uri->segment(3);
	//se obtiene el nombre del programa
	$data = array("datos"=>$this->programas->verPrograma($id),"id_prog"=>$id);
	//se obtiene datos para la tabla
     $data_t = array("enlaces"=>$this->participantes->verTodo($id));

	$this->load->view('headers/headers');
	$this->load->view('participantesFormInsertVIEW',$data);      
    $this->load->view('participantesTableVIEW',$data_t);
	$this->load->view('fooders/fooders');	
	 }

//FUNCION QUE PASA DATOS A LA CLASE PARTICIPANTES PARA REGISTRAR
	public function participantesCLASS (){
		$data = array("nombre"=>$this->input->post('nombre',TRUE),
	                  "apellidoP"=>$this->input->post('apellidoP',TRUE),
					  "apellidoM"=>$this->input->post('apellidoM',TRUE),
					  "ci"=>$this->input->post('ci',TRUE),
	                   "nCelular1"=>$this->input->post('nCelular1',TRUE),
					  "nCelular2"=>$this->input->post('nCelular2',TRUE),
					  "correo"=>$this->input->post('correo',TRUE),
					  "dtoResidencia"=>$this->input->post('dtoResidencia',TRUE) );
		$this->participantes->registrar($data);

        //incribir participantes
		$data= array("idPrograma"=>$this->input->post("idPrograma",TRUE),
		              "ci"=>$this->input->post('ci',TRUE));
	    $id_part=$this->participantes->inscribir($data);

		header ("Location: ../Cmain/documentos?id_part=".$id_part."&id_prog=".$this->input->post("idPrograma",TRUE));

		//header ("Location: seeligioprograma/".$data['idPrograma']);
        
	}



	 

}
