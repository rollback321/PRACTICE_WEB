<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Model {



public	function __construct(){

    parent::__construct();


    }
   

function verificar($data){
$acceso="";
$usuario="";
$nombre="";
$apellidos="";    
    $sql="SELECT * FROM administrador WHERE usuario = '".$data["usuario"]."' and password= '".sha1($data['password'])."'";;

    $query = $this->db->query($sql);
  
  if  ($query->num_rows() >0){

    foreach($query->result() as $row){
      $acceso = $row->acceso;
      $usuario = $row->usuario;
      $nombre = $row->nombre;
      $apellidos = $row->apellidos;         }

     if ($acceso == "SI") {
     session_start();
     $_SESSION['usuario'] = $usuario;
     $_SESSION['nombre']= $nombre;
     $_SESSION['apellidos']= $apellidos;
     return true;
     }else{ return false; 
     
     }

  }else{  return false; 
  }
}

}