<?php
class Model_Alcaldesa extends CI_Model
{
	public function Model_list_Of_SecretaryDependency()
	{
		$query = $this->db->query("select count(c.cor_id) as total ,n1.niv1_nombre 
		from correspondencia c
		INNER JOIN usuario_rol ur on c.usu_rol_id=ur.usu_rol_id
		INNER JOIN nivel_1 n1 on ur.nivel_1_niv1_id =n1.niv1_id 
		GROUP by n1.niv1_nombre ");
		return $query->result_array();
	}
}
