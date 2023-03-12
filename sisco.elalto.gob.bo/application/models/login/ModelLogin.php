<?php
class ModelLogin extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    public function login_user($username,$password)
    {
        $this->db->where('usu_rol_usuario',$username);
        $this->db->where('usu_rol_password',$password);
        $this->db->where('usu_rol_estado',true);
        $q=$this->db->get('usuario_rol');
        if($q->num_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function data_user($user, $password)
    {

        $query = $this->db->query("SELECT *
	FROM usuario
	INNER JOIN usuario_rol ON usuario_rol.usuario_usu_id=usuario.usu_id   
	INNER JOIN roles ON roles.rol_id=usuario_rol.roles_rol_id 
	WHERE usuario_rol.usu_rol_usuario='$user' AND usuario_rol.usu_rol_password='$password'");
        $row = $query->row();
        $nameDependency='';
        $nameUnique='';
		$this->db->reconnect();

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
		$data_session = array(
			'usu_rol_estado' => $row->usu_rol_estado,
			'usu_color_tema' => $row->usu_color_tema,
			'usu_rol_id' => $row->usu_rol_id,
			'usu_id' => $row->usu_id,
			'usu_nombres' => $row->usu_nombres,
			'usu_apellidos' => $row->usu_apellidos,
			'usu_celular' => $row->usu_celular,
			'rol_nombre' => $row->rol_nombre,
			'rol_cargo' => $row->usu_rol_cargo,
			'usu_genero' => $row->usu_genero,

			'rol_niv_1' => $row->nivel_1_niv1_id,
			'rol__niv_2' => $row->nivel_2_niv2_id,
			'rol__niv_3' => $row->nivel_3_niv3_id,
			'nameDependency' => $nameDependency,
			'nameUnique' => $nameUnique,
			'estado_comunicado' =>1,

		);
		return $data_session;
	}
  
}
