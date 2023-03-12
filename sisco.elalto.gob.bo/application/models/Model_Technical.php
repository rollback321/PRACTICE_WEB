<?php 
class Model_Technical extends CI_Model
{
	public function fetchUserListTechnical()
	{
		$rol_niv_1=$this->session->userdata('rol_niv_1');
		$rol__niv_2=$this->session->userdata('rol__niv_2');
		$rol__niv_3=$this->session->userdata('rol__niv_3');
		$usu_rol_id=$this->session->userdata('usu_rol_id');
		$usu_rol_id=intval($usu_rol_id);

		$listTecnical='';


		if (isset($rol__niv_2) AND is_null($rol__niv_3) ){

			$id_sec=intval($rol_niv_1);
			$id_dir=intval($rol__niv_2);

			$query1=$this->db->query("SELECT usuario.*,usu_rol_id,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									  WHERE usuario_rol.usu_rol_id!=$usu_rol_id and  usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null 
											");
			$listTecnical =$query1->result();


		}
		elseif (!isset($rol__niv_2) AND !isset($rol__niv_3))
		{
			$id_sec=intval($rol_niv_1);
			$query2=$this->db->query("SELECT usuario.*,usu_rol_id,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									 WHERE usuario_rol.usu_rol_id!=$usu_rol_id  and usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null 
											");
			$listTecnical =$query2->result();

		}else{
			$id_sec=intval($rol_niv_1);
			$id_dir=intval($rol__niv_2);
			$id_uni=intval($rol__niv_3);

			$query2=$this->db->query("SELECT usuario.*,usu_rol_id,usu_rol_cargo
									FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id
									WHERE usuario_rol.usu_rol_id!=$usu_rol_id  and usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni");
			$listTecnical  =$query2->result();

		}
		return $listTecnical;
	}





	public function MostrarSoloTecnicosDerivarInterna()
	{
		$rol_niv_1=$this->session->userdata('rol_niv_1');
		$rol__niv_2=$this->session->userdata('rol__niv_2');
		$rol__niv_3=$this->session->userdata('rol__niv_3');
		$usu_rol_id=$this->session->userdata('usu_rol_id');
		$usu_rol_id=intval($usu_rol_id);

		$listTecnical='';


		if (isset($rol__niv_2) AND is_null($rol__niv_3) ){

			$id_sec=intval($rol_niv_1);
			$id_dir=intval($rol__niv_2);

			$query1=$this->db->query("SELECT usuario.*,usu_rol_id,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									  WHERE usuario_rol.usu_rol_id!=$usu_rol_id and  usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null and usuario_rol.usu_rol_estado=1 and usuario_rol.roles_rol_id!=4  and usuario_rol.roles_rol_id!=5  and usuario_rol.roles_rol_id!=3  and usuario_rol.roles_rol_id!=7 ");
			$listTecnical =$query1->result();


		}
		elseif (!isset($rol__niv_2) AND !isset($rol__niv_3))
		{
			$id_sec=intval($rol_niv_1);
			$query2=$this->db->query("SELECT usuario.*,usu_rol_id,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									 WHERE usuario_rol.usu_rol_id!=$usu_rol_id  and usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and usuario_rol.usu_rol_estado=1 and usuario_rol.roles_rol_id!=4 and usuario_rol.roles_rol_id!=5 and usuario_rol.roles_rol_id!=3  and usuario_rol.roles_rol_id!=7  ");
			$listTecnical =$query2->result();

		}else{
			$id_sec=intval($rol_niv_1);
			$id_dir=intval($rol__niv_2);
			$id_uni=intval($rol__niv_3);

			$query2=$this->db->query("SELECT usuario.*,usu_rol_id,usu_rol_cargo
									FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id
									WHERE usuario_rol.usu_rol_id!=$usu_rol_id  and usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni and usuario_rol.usu_rol_estado=1 and usuario_rol.roles_rol_id!=4  and usuario_rol.roles_rol_id!=5  and usuario_rol.roles_rol_id!=3  and usuario_rol.roles_rol_id!=7 ");
			$listTecnical  =$query2->result();

		}
		return $listTecnical;
	}


	public function MostrarSoloTecnicosDerivarInternaGestion()
	{
		$rol_niv_1=$this->session->userdata('rol_niv_1');
		$rol__niv_2=$this->session->userdata('rol__niv_2');
		$rol__niv_3=$this->session->userdata('rol__niv_3');
		$usu_rol_id=$this->session->userdata('usu_rol_id');
		$usu_rol_id=intval($usu_rol_id);
		$listTecnical='';
			$query1=$this->db->query("SELECT usuario.*,usu_rol_id,usu_rol_cargo,usuario_rol.usu_rol_id
			FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
			WHERE   usuario_rol.roles_rol_id=9 and usuario_rol.nivel_2_niv2_id is null 
			and usuario_rol.nivel_3_niv3_id is null 
			and usuario_rol.usu_rol_estado=1  ");
			$listTecnical =$query1->result();		
		return $listTecnical;
	}



	public function MostrarSoloTecnicosDerivarInternaGestionSecretary()
	{
		$rol_niv_1=$this->session->userdata('rol_niv_1');
		$rol__niv_2=$this->session->userdata('rol__niv_2');
		$rol__niv_3=$this->session->userdata('rol__niv_3');
		$usu_rol_id=$this->session->userdata('usu_rol_id');
		$usu_rol_id=intval($usu_rol_id);
		$listTecnical='';
			$query1=$this->db->query("SELECT usuario.*,usu_rol_id,usu_rol_cargo,usuario_rol.usu_rol_id
			FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
			WHERE   usuario_rol.roles_rol_id=8 and usuario_rol.nivel_2_niv2_id is null 
			and usuario_rol.nivel_3_niv3_id is null 
			and usuario_rol.usu_rol_estado=1  ");
			$listTecnical =$query1->result();		
		return $listTecnical;
	}




	

	public function rowsOfHistoryDependence($id_a)
	{
		$query = $this->db->query("SELECT *
									FROM usuario_rol 
									WHERE usuario_rol.usu_rol_id=$id_a ");
		$row = $query->row();


		$nameDependency='';
		$nameUnique='';


		if (!isset($row->nivel_3_niv3_id) AND isset($row->nivel_2_niv2_id)){

			$id_sec=intval($row->nivel_1_niv1_id);
			$id_dir=intval($row->nivel_2_niv2_id);

			$query2=$this->db->query("SELECT nivel_1.niv1_nombre as n_sec
														FROM usuario_rol INNER JOIN nivel_1 ON usuario_rol.nivel_1_niv1_id=nivel_1.niv1_id
														WHERE usuario_rol.nivel_1_niv1_id=$id_sec");
			$sec =$query2->row();
			$nameDependency.='<i class="fas fa-house-user"></i>'.$sec->n_sec.'<br>';


			$query1=$this->db->query("SELECT nivel_2.niv2_nombre as n_dir
													FROM usuario_rol INNER JOIN nivel_2 ON usuario_rol.nivel_2_niv2_id=nivel_2.niv2_id
													WHERE usuario_rol.nivel_1_niv1_id=$id_sec AND usuario_rol.nivel_2_niv2_id=$id_dir
													");
			$dir =$query1->row();
			$nameDependency.='<i class="fas fa-house-user"></i>'.$dir->n_dir;
			$nameUnique=$dir->n_dir;
		}
		elseif (!isset($row->nivel_2_niv2_id) AND !isset($row->nivel_3_niv3_id))
		{
			$id_sec=intval($row->nivel_1_niv1_id);
			$query2=$this->db->query("SELECT nivel_1.niv1_nombre as n_sec
														FROM usuario_rol INNER JOIN nivel_1 ON usuario_rol.nivel_1_niv1_id=nivel_1.niv1_id
														WHERE usuario_rol.nivel_1_niv1_id=$id_sec");
			$sec =$query2->row();
			$nameDependency.='<i class="fas fa-house-user"></i>'.$sec->n_sec;
			$nameUnique=$sec->n_sec;

		}else{
			$id_sec=intval($row->nivel_1_niv1_id);
			$id_dir=intval($row->nivel_2_niv2_id);
			$id_uni=intval($row->nivel_3_niv3_id);

			$query2=$this->db->query("SELECT nivel_1.niv1_nombre as n_sec
														FROM usuario_rol INNER JOIN nivel_1 ON usuario_rol.nivel_1_niv1_id=nivel_1.niv1_id
														WHERE usuario_rol.nivel_1_niv1_id=$id_sec");
			$sec =$query2->row();
			$nameDependency.='<i class="fas fa-house-user"></i>'.$sec->n_sec.'<br>';

			$query1=$this->db->query("SELECT nivel_2.niv2_nombre as n_dir
													FROM usuario_rol INNER JOIN nivel_2 ON usuario_rol.nivel_2_niv2_id=nivel_2.niv2_id
													WHERE usuario_rol.nivel_1_niv1_id=$id_sec AND usuario_rol.nivel_2_niv2_id=$id_dir");
			$dir =$query1->row();
			$nameDependency.='<i class="fas fa-house-user"></i>'.$dir->n_dir.'<br>';



			$query3=$this->db->query("SELECT nivel_3.niv3_nombre as n_uni
													FROM usuario_rol INNER JOIN nivel_3 ON usuario_rol.nivel_3_niv3_id=nivel_3.niv3_id
													WHERE usuario_rol.nivel_3_niv3_id=$id_uni");
			$uni =$query3->row();
			$nameDependency .= '<i class="fas fa-house-user"></i>'.$uni->n_uni;
			$nameUnique=$uni->n_uni;

		}
		return $nameDependency;


	}
	public function rowCorrespondenceUsers($rol_user_id)
	{
		$rol_user_id=intval($rol_user_id);
		$query = $this->db->query("SELECT *
									FROM usuario
									INNER JOIN usuario_rol ON usuario_rol.usuario_usu_id=usuario.usu_id   
									WHERE usuario_rol.usu_rol_id=$rol_user_id");
		return $query->row();
	}


	public function BuscarDatosHojaRuta($cor_id)
	{
		$cor_id=intval($cor_id);
		$query=$this->db->query("SELECT * FROM correspondencia WHERE cor_id=$cor_id");
		return $query->row();
	}

}



