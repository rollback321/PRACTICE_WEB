<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('login');	
	}


  function verificar(){

$iniciar_sesion = false;

$data= array("usuario"=>$this->input->post('usuario',TRUE),
             "password"=>$this->input->post('password',TRUE));

$iniciar_sesion = $this->login->verificar($data);
if($iniciar_sesion){
   echo "nombre".$_SESSION['nombre']."<br>apellido:".$_SESSION['apellidos'];
   //   session_destroy(); 
   header('Location: ../../');
}else{
  header('Location: ../../');
}
 //  echo "iniciar sesion";
  }




}