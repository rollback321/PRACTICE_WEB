<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class boletasDepositoMatricula extends CI_Model {

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
    $this->db->insert('boletamatricula',$data);
}

function verTodo ($id_doc){
    $sql = "SELECT * 
             FROM boletamatricula 
             WHERE id_doc=".$id_doc;
    $query = $this->db->query($sql);
    if  ($query->num_rows() >0){
              return $query;
    }else{
      return FALSE;
    }
  }

}
