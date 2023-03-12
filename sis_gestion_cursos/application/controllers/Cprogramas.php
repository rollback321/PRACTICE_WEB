<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cprogramas extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('programas');
		
  }



//Funcion que envia datos a la clase programas, metodo registrar
    public function programasCLASS ()
	{
	
		$data = array("nombre"=>$this->input->post('nombre',TRUE),
		                "version"=>$this->input->post('version',TRUE),
		                "sede"=>$this->input->post('sede',TRUE),
		                 "fecha_de_inicio"=>$this->input->post('fecha_de_inicio',TRUE),
		                 "duracion"=>$this->input->post('duracion',TRUE));
	    $this->programas->registrar($data);						 
		$this->mostrarDatos();
	}
 //FUNCION QUE RECIBE DATOS DE LOS PROGRAMAS Y LOS ENVIA   
    public function mostrarDatos(){
    
        
	
        $data = array("enlaces"=>$this->programas->verTodo());
        $this->load->view('headers/headers');
        $this->load->view('programasFormInsertVIEW');
		$this->load->view('programasTableVIEW',$data);
		$this->load->view('fooders/fooders');
	}

    public function eliminarRegistro(){
        $id =  $this->uri->segment(3);
        $this->programas->eliminar($id);
        $this->mostrarDatos();
     
    }

    
    public function obtenerRegistro(){
        $id =  $this->uri->segment(3);
        $data_update = array("datos"=>$this->programas->verPrograma($id));
        $data = array("enlaces"=>$this->programas->verTodo());
        $this->load->view('headers/headers');
		$this->load->view('programasFormUpdateVIEW',$data_update);
        $this->load->view('programasTableVIEW',$data);
		$this->load->view('fooders/fooders');
      }

      public function modificarRegistro(){
        $id=$this->input->post('id_prog',TRUE);
        $data = array(
        "nombre"=>$this->input->post('nombre',TRUE),
        "version"=>$this->input->post('version',TRUE),
        "sede"=>$this->input->post('sede',TRUE),
         "fecha_de_inicio"=>$this->input->post('fecha_de_inicio',TRUE),
         "duracion"=>$this->input->post('duracion',TRUE));
        $this->programas->modificar($data,$id);
        $this->mostrarDatos();
     
            
      }







	










	 

}
