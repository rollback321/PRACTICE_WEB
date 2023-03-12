<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programas extends CI_Model {

private $id = "";
private $nombre="";
private $version="";
private $sede="";
private $fechaInicio="";
private $duracion ="";

public	function __construct(){
    parent::__construct();
    }





function registrar($data){
    $this->db->insert('programas',$data);
}
function eliminar($id){
  $this->db->where('id_prog',$id);
  $this->db->delete('programas');
}
function modificar($data,$id){
  $this->db->where('id_prog',$id);
  $this->db->update('programas',$data);
}
//listar programas para la ventana programasVIEW
function verTodo (){
  $query =$this->db->get('programas');
  if  ($query->num_rows() >0){
            return $query;
  }else{
    return FALSE;
  }
}

//obtener id,nombre,version,sede del programa para incribir participante
function verPrograma($id){

  $sql = "SELECT * FROM programas WHERE id_prog = ? ";
  $query = $this->db->query($sql,$id);
  
  if  ($query->num_rows() >0){
      return $query;
  }else{
      return FALSE;
  }
}

}
