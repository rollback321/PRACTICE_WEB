<?php
class Model_Admin extends CI_Model
{
	public function fetch_Level1() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$sql = "SELECT * FROM nivel_1 ORDER BY niv1_nombre and niv1_estado=1 ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function list_Of_Direction($niv_id_1)
	{
		$niv_id_1 = intval($niv_id_1);
		$query = $this->db->query("select * from bd_correspondencia.nivel_2 where nivel1_id =$niv_id_1 and niv2_estado=1 ");
		return $query->result_array();
	}
	public function list_Of_Units($niv_id_2)
	{
		$niv_id_2 = intval($niv_id_2);
		$query = $this->db->query("select *from bd_correspondencia.nivel_3 where nivel2_id =$niv_id_2 and niv3_estado=1 ");
		return $query->result();
	}

	//////////////////////////////////////////////////////////////////////
	// public function fetch_LevelDependencia() //CONSUMO DE DATOS DE HOJAS DE RUTA
	// {
		
	// 	$rol_niv_1 = $this->session->userdata('rol_niv_1');
	// 	$rol__niv_2 = $this->session->userdata('rol__niv_2');
	// 	$rol__niv_3 = $this->session->userdata('rol__niv_3');
		
		
	
		
	// 	$sql = "SELECT * FROM nivel_1 ORDER BY niv1_nombre and niv1_estado=1 ASC";
	// 	$query = $this->db->query($sql);
	// 	return $query->result();
	// }
	// public function list_Of_Directionhfgh($niv_id_1)
	// {
	// 	$niv_id_1 = intval($niv_id_1);
	// 	$query = $this->db->query("select * from bd_correspondencia.nivel_2 where nivel1_id =$niv_id_1 and niv2_estado=1 ");
	// 	return $query->result();
	// }
	// public function list_Of_Unitshfgh($niv_id_2)
	// {
	// 	$niv_id_2 = intval($niv_id_2);
	// 	$query = $this->db->query("select *from bd_correspondencia.nivel_3 where nivel2_id =$niv_id_2 and niv3_estado=1 ");
	// 	return $query->result();
	// }
	///////////////////////////////////////////////////////////////////////////////
	public function fetchUserListJefeniv_1($niv_id_1)
	{
		$niv_id_1 = intval($niv_id_1);
		$query1 = $this->db->query("SELECT usu_rol_id,usu_id,niv1_nombre,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id INNER JOIN nivel_1 ON nivel_1.niv1_id=usuario_rol.nivel_1_niv1_id WHERE usuario_rol.nivel_1_niv1_id=$niv_id_1 and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null and roles_rol_id=4");
		return $query1->result_array();
	}
	public function fetchUserListSecretarianiv_1($niv_id_1)
	{
		$niv_id_1 = intval($niv_id_1);
		$query1 = $this->db->query("SELECT usu_rol_id,usu_id,niv1_nombre,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id INNER JOIN nivel_1 ON nivel_1.niv1_id=usuario_rol.nivel_1_niv1_id WHERE usuario_rol.nivel_1_niv1_id=$niv_id_1 and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null and roles_rol_id=1");
		return $query1->result_array();
	}
	public function fetchUserListTecniconiv_1($niv_id_1)
	{
		$niv_id_1 = intval($niv_id_1);
		$query1 = $this->db->query("SELECT usu_rol_id,usu_id,niv1_nombre,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id INNER JOIN nivel_1 ON nivel_1.niv1_id=usuario_rol.nivel_1_niv1_id WHERE usuario_rol.nivel_1_niv1_id=$niv_id_1 and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null and roles_rol_id=2");
		return $query1->result_array();
	}
	/////////////////////////////////////////////////////////////////////////////////////
	public function fetchUserListJefeniv_2($niv_id_1, $niv_id_2)
	{
		$niv_id_1 = intval($niv_id_1);
		$niv_id_2 = intval($niv_id_2);
		$query1 = $this->db->query("SELECT usu_rol_id,usu_id,niv1_nombre,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id INNER JOIN nivel_1 ON nivel_1.niv1_id=usuario_rol.nivel_1_niv1_id WHERE usuario_rol.nivel_1_niv1_id=$niv_id_1 and usuario_rol.nivel_2_niv2_id=$niv_id_2 and usuario_rol.nivel_3_niv3_id is null and roles_rol_id=4");
		return $query1->result_array();
	}
	public function fetchUserListSecretarianiv_2($niv_id_1, $niv_id_2)
	{
		$niv_id_1 = intval($niv_id_1);
		$niv_id_2 = intval($niv_id_2);
		$query1 = $this->db->query("SELECT usu_rol_id,usu_id,niv1_nombre,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id INNER JOIN nivel_1 ON nivel_1.niv1_id=usuario_rol.nivel_1_niv1_id WHERE usuario_rol.nivel_1_niv1_id=$niv_id_1 and usuario_rol.nivel_2_niv2_id=$niv_id_2 and usuario_rol.nivel_3_niv3_id is null and roles_rol_id=1");
		return $query1->result_array();
	}
	public function fetchUserListTecniconiv_2($niv_id_1, $niv_id_2)
	{
		$niv_id_1 = intval($niv_id_1);
		$niv_id_2 = intval($niv_id_2);
		$query1 = $this->db->query("SELECT usu_rol_id,usu_id,niv1_nombre,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id INNER JOIN nivel_1 ON nivel_1.niv1_id=usuario_rol.nivel_1_niv1_id WHERE usuario_rol.nivel_1_niv1_id=$niv_id_1 and usuario_rol.nivel_2_niv2_id=$niv_id_2 and usuario_rol.nivel_3_niv3_id is null and roles_rol_id=2");
		return $query1->result_array();
	}
	////////////////////////////////////////////////////////////////////////////////////////
	public function fetchUserListJefeniv_3($niv_id_1, $niv_id_2, $niv_id_3)
	{
		$niv_id_1 = intval($niv_id_1);
		$niv_id_2 = intval($niv_id_2);
		$niv_id_3 = intval($niv_id_3);
		$query1 = $this->db->query("SELECT usu_rol_id,usu_id,niv1_nombre,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id INNER JOIN nivel_1 ON nivel_1.niv1_id=usuario_rol.nivel_1_niv1_id WHERE usuario_rol.nivel_1_niv1_id=$niv_id_1 and usuario_rol.nivel_2_niv2_id=$niv_id_2 and usuario_rol.nivel_3_niv3_id=$niv_id_3 and roles_rol_id=4");
		return $query1->result_array();
	}
	public function fetchUserListSecretarianiv_3($niv_id_1, $niv_id_2, $niv_id_3)
	{
		$niv_id_1 = intval($niv_id_1);
		$niv_id_2 = intval($niv_id_2);
		$niv_id_3 = intval($niv_id_3);
		$query1 = $this->db->query("SELECT usu_rol_id,usu_id,niv1_nombre,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id INNER JOIN nivel_1 ON nivel_1.niv1_id=usuario_rol.nivel_1_niv1_id WHERE usuario_rol.nivel_1_niv1_id=$niv_id_1 and usuario_rol.nivel_2_niv2_id=$niv_id_2 and usuario_rol.nivel_3_niv3_id=$niv_id_3 and roles_rol_id=1");
		return $query1->result_array();
	}
	public function fetchUserListTecniconiv_3($niv_id_1, $niv_id_2, $niv_id_3)
	{
		$niv_id_1 = intval($niv_id_1);
		$niv_id_2 = intval($niv_id_2);
		$niv_id_3 = intval($niv_id_3);
		$query1 = $this->db->query("SELECT usu_rol_id,usu_id,niv1_nombre,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id INNER JOIN nivel_1 ON nivel_1.niv1_id=usuario_rol.nivel_1_niv1_id WHERE usuario_rol.nivel_1_niv1_id=$niv_id_1 and usuario_rol.nivel_2_niv2_id=$niv_id_2 and usuario_rol.nivel_3_niv3_id=$niv_id_3 and roles_rol_id=2");
		return $query1->result_array();
	}
	///////////////////////////////////////////
	public function InsertUser($data)
	{
		$this->db->insert('usuario', $data);
		return $this->db->insert_id();
	}
	public function InsertUserRol($data2)
	{
		$this->db->insert('usuario_rol', $data2);
		return $this->db->insert_id();
	}
	///////////////////////////////
	public function ListUser($usu_id)
	{
		$usu_id = intval($usu_id);
		$query = $this->db->query("SELECT u.usu_id, u.usu_nombres,u.usu_apellidos,u.usu_ci,u.usu_ci_expedido,u.usu_celular,u.usu_genero, ur.usu_rol_usuario, ur.usu_rol_password,ur.usu_rol_cargo, ur.usu_count 
								FROM usuario as u INNER JOIN usuario_rol as ur ON u.usu_id=$usu_id and ur.usuario_usu_id=$usu_id");
		return $query->row();
	}
	/////////UPDATE/////////
	public function ModelUpdateUser($where, $data)
	{
		$this->db->update('usuario', $data, $where);
		return true;
	}
	public function ModelUpdateUserRol($where2, $data2)
	{
		$this->db->update('usuario_rol', $data2, $where2);
		return true;
	}
	public function ModelUpdateUserState($where2, $data2)
	{
		$this->db->update('usuario_rol', $data2, $where2);
		return true;
	}
	/////////////////////////////////////////////////////////////
	public function Model_searchDependencia($niv_id_1, $niv_id_2, $niv_id_3)
	{
		$niv_id_1 = intval($niv_id_1);
		$niv_id_2 = intval($niv_id_2);
		$niv_id_3 = intval($niv_id_3);
		if ($niv_id_1 <> 0 && $niv_id_2 == 0) {
			$query1 = $this->db->query("	SELECT distinct n1.niv1_nombre as nombreDependencia
			FROM nivel_1 n1 
			WHERE n1.niv1_id=$niv_id_1 and n1.niv1_estado=1");
		}
		if ($niv_id_1 <> 0 && $niv_id_2 <> 0 && $niv_id_3 == 0) {
			$query1 = $this->db->query("	SELECT distinct n2.niv2_nombre  as nombreDependencia
			FROM nivel_1 n1 
			inner join nivel_2 n2 on n2.nivel1_id=n1.niv1_id 
			WHERE n1.niv1_id=$niv_id_1 and n1.niv1_estado=1 and n2.niv2_id=$niv_id_2  and n2.niv2_estado=1  ");
		}
		if ($niv_id_1 <> 0 && $niv_id_2 <> 0 && $niv_id_3 <> 0) {
			$query1 = $this->db->query("	SELECT distinct n3.niv3_nombre  as nombreDependencia 
			FROM nivel_1 n1 
			inner join nivel_2 n2 on n2.nivel1_id=n1.niv1_id  
			inner join nivel_3 n3 on n3.nivel2_id=n2.niv2_id 
			WHERE n1.niv1_id=$niv_id_1 and n1.niv1_estado=1 and n2.niv2_id=$niv_id_2  and n2.niv2_estado=1  and n3.niv3_id=$niv_id_3  and n3.niv3_estado=1  ");
		}
		return $query1->row();
	}
}
