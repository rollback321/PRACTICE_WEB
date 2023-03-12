<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Model {

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
    $this->db->insert('administrador',$data);
}
}