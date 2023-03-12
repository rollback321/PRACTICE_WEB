<?php 
class Model_Comunicados extends CI_Model
{	
	public function AllComunicados()
	{
	$sql="SELECT * FROM comunicados";
    $query=$this->db->query($sql);
    return $query->result_array();
	}



}



