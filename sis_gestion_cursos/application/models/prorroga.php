<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class prorroga extends CI_Model {


public	function __construct(){
    parent::__construct();
    }





function registrar($data){
    $this->db->insert('cartaprorroga',$data);
}
}