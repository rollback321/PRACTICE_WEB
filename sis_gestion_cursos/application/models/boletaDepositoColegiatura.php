<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class boletaDepositoColegiatura extends CI_Model {

private $nroDeposito="";
private $fechaDeposito="";
private $montoDeposito="";
private $fotocopiaBoleta="";
private $boletaOriginal ="";
private $observaciones ="";

public	function __construct(){

    parent::__construct();


    }
   

function registrar($data){
    $this->db->insert('boletacolegiatura',$data);
}

function eliminar($id){
    $this->db->where('id_part',$id);
    $this->db->delete('participantes');
  
  }
function modificar($data,$id){
    $this->db->where('id_part',$id);
    $this->db->update('participantes',$data);
  }

function verTodo ($id_doc){
    $sql = "SELECT * 
             FROM boletacolegiatura 
             WHERE id_doc=".$id_doc;
    $query = $this->db->query($sql);
    if  ($query->num_rows() >0){
              return $query;
    }else{
      return FALSE;
    }
  }

}
