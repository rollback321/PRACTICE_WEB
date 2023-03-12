<?php 
class Model_Proveido extends CI_Model
{
	public function fetchProveido(){
		$query=$this->db->query("SELECT * FROM bd_correspondencia.proveido WHERE prov_estado=1");
		return $query->result_array();
	}

}



