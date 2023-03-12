<?php
class Model_Secretary extends CI_Model
{
	var $table = 'usuario';
	var $table2 = 'usuario_rol';
	var $table3 = 'documento';

	//BANDEJA DE CORRESPONDENCIA
	public function fetchInbox()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "   SELECT h.*,c.*,g.ges_gestion 
		FROM historial h
		INNER JOIN correspondencia c ON h.cor_id=c.cor_id  
		INNER JOIN usuario_rol ur ON ur.usu_rol_id =h.id_r 
		INNER JOIN usuario_rol urA ON urA.usu_rol_id =h.id_a 
		INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
		WHERE h.id_r=$id_rol_usuario AND h.bandeja=1 AND h.recepcion=1 GROUP BY h.cor_id,h.origen, h.nro_copia ORDER BY h.his_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//BANDEJA DE CORRESPONDENCIA
	public function fetchInboxGestion()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$sql = "   SELECT h.*,c.*,g.ges_gestion 
		FROM historial h
		INNER JOIN correspondencia c ON h.cor_id=c.cor_id  
		INNER JOIN usuario_rol ur ON ur.usu_rol_id =h.id_r 
		INNER JOIN usuario_rol urA ON urA.usu_rol_id =h.id_a 
		INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
		WHERE h.id_r=$id_rol_usuario AND h.bandeja=1 AND h.recepcion=1  ORDER BY h.his_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function fetchInboxVentanilla()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "SELECT c.*,dp.*,g.ges_gestion 
		FROM correspondencia c 
		INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
		INNER JOIN derivacion_pendiente dp ON  c.cor_id=dp.cor_id 
		inner join usuario_rol ur on dp.id_a=ur.usu_rol_id
		WHERE dp.estado=1 and dp.accion='P' and c.cor_tipo='E' and (ur.roles_rol_id=3 or ur.roles_rol_id=8) ORDER BY dp.pend_id DESC";
		//WHERE dp.estado=1 and dp.accion='P' and c.cor_tipo='E' and ur.roles_rol_id=3;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function fetchInboxVentanillaInterna()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "SELECT c.*,dp.*,g.ges_gestion 
		FROM correspondencia c 
		INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
		INNER JOIN derivacion_pendiente dp ON  c.cor_id=dp.cor_id 
		inner join usuario_rol ur on dp.id_a=ur.usu_rol_id
		WHERE dp.estado=1 and dp.accion='P' and (c.cor_tipo='I'or c.cor_tipo='E')and ur.roles_rol_id=9 order by dp.pend_id desc;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function fetch_Retractar()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		//	$sql="  SELECT h.his_id,h.accion,h.cor_id,h.a_plazo,h.a_fecha,h.a_proveido,h.a_obs,h.bandeja,h.recepcion,h.id_a,h.r_descrip_rechazo, c.*  FROM historial as h INNER JOIN correspondencia as c ON h.cor_id=c.cor_id WHERE h.id_a=$id_rol_usuario  AND bandeja=1 AND recepcion=1;";
		$sql = "  SELECT *
		FROM historial as h 
		INNER JOIN correspondencia as c ON h.cor_id=c.cor_id 
		INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
		WHERE h.id_a=$id_rol_usuario  AND h.bandeja=1 AND h.recepcion=1 ORDER BY h.his_id DESC ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetch_Concluidos()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$sql = " SELECT  h.his_id,c.*,ch.*,g.ges_gestion,u.usu_nombres,u.usu_apellidos
		FROM conclusion_hoja ch
		 INNER JOIN historial h ON h.his_id=ch.his_id
		INNER JOIN correspondencia c ON h.cor_id=c.cor_id
		inner join usuario_rol ur on ur.usu_rol_id=ch.user_conclusion
		 inner join usuario u on u.usu_id=ur.usuario_usu_id
		INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
		WHERE ch.user_conclusion=$id_rol_usuario and ch.conclu_estado=1 ORDER BY ch.conclu_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetch_Concluidos_VentInterna_SMGI()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$sql = " SELECT  h.his_id,c.*,ch.*,g.ges_gestion,u.usu_nombres,u.usu_apellidos,dp.pend_id
		FROM conclusion_hoja ch
		 INNER JOIN historial h ON h.his_id=ch.his_id
		INNER JOIN correspondencia c ON h.cor_id=c.cor_id
		inner join usuario_rol ur on ur.usu_rol_id=ch.user_conclusion
		 inner join usuario u on u.usu_id=ur.usuario_usu_id
		INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
		INNER JOIN derivacion_pendiente dp ON  h.cor_id=dp.cor_id 
		WHERE ch.user_conclusion=$id_rol_usuario and ch.conclu_estado=1 and dp.estado='T' ORDER BY ch.conclu_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function returnDateEnable($date)
	{
		$query = $this->db->query("SELECT * FROM bd_correspondencia.feriados WHERE fecha='$date'");
		return $query->num_rows();
	}
	//BANDEJA DE RECEPCION
	public function fetchReception()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "  SELECT h.*,c.*,g.ges_gestion
				FROM historial h
				INNER JOIN correspondencia c ON h.cor_id=c.cor_id
				INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
				WHERE h.id_r=$id_rol_usuario AND h.bandeja=0  and h.recepcion=1 GROUP BY h.cor_id,h.origen, h.nro_copia ORDER BY h.his_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	//BANDEJA DE RECEPCION
	public function fetchReceptionVentanilla()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "  SELECT his_id,historial.cor_id,reaccion,r_plazo,r_fecha,a_proveido,a_obs,bandeja,recepcion,id_a,r_descrip_rechazo, historial.origen,historial.nro_copia,correspondencia.*
					FROM historial INNER JOIN correspondencia ON historial.cor_id=correspondencia.cor_id
					WHERE historial.id_r=$id_rol_usuario AND bandeja=0 AND id_a=108 and recepcion=1;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//BANDEJA DE RECEPCION
	public function fetchReceptionVentanillaInternaSMGI()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "      SELECT h.*,c.*,g.ges_gestion,dp.pend_id
		FROM historial h
		INNER JOIN correspondencia c ON h.cor_id=c.cor_id
		INNER JOIN derivacion_pendiente dp ON dp.cor_id=h.cor_id
		INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
		WHERE dp.id_a=$id_rol_usuario and dp.accion='C' and h.reaccion='A' ORDER BY dp.pend_id desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function fetchReceptionVentanillaInternaSMGIDerivadas()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "SELECT dp.origen as origendp, dp.nro_copia as nro_copiadp,h.*,c.*,g.ges_gestion,dp.pend_id
		FROM historial h
		INNER JOIN correspondencia c ON h.cor_id=c.cor_id
		INNER JOIN derivacion_pendiente dp ON dp.cor_id=h.cor_id
		INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
		WHERE dp.id_a=$id_rol_usuario and dp.accion='P' and dp.estado=1 and h.reaccion='A' group by dp.cor_id,dp.origen,dp.nro_copia ORDER BY dp.pend_id desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function fetchReceptionVentanillaInternaSMGIDerivadasBandeja()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "SELECT dp.origen as origendp, dp.nro_copia as nro_copiadp, dp.accion as acciondp, h.*,c.*,g.ges_gestion,dp.pend_id
		FROM historial h
		INNER JOIN correspondencia c ON h.cor_id=c.cor_id
		INNER JOIN derivacion_pendiente dp ON dp.cor_id=h.cor_id
		INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
		WHERE dp.id_a=$id_rol_usuario and dp.accion='P' and dp.estado=1 and h.reaccion='A' group by dp.cor_id,dp.origen,dp.nro_copia ORDER BY dp.pend_id desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	//BANDEJA DE RECEPCION
	public function DerivacionDirectaGestion()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "  SELECT  h.*,c.*,dp.pend_id,g.ges_gestion
		FROM historial h
		INNER JOIN correspondencia c ON h.cor_id=c.cor_id
		INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
		  inner join derivacion_pendiente dp on dp.cor_id=c.cor_id
		WHERE h.id_a=$id_rol_usuario and c.cor_tipo='E' and c.cor_estado=2 ORDER BY h.his_id DESC ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	// public function DerivacionDirectaGestion()
	// {
	// 	$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

	// 	$sql = "  SELECT  h.*,c.*,g.ges_gestion,dp.pend_id
	// 			FROM historial h
	// 			INNER JOIN correspondencia c ON h.cor_id=c.cor_id
	// 			INNER JOIN derivacion_pendiente dp ON  c.cor_id=dp.cor_id 
	// 			INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
	// 			WHERE h.id_a=$id_rol_usuario and c.cor_tipo='E' and c.cor_estado=2;";
	// 	$query = $this->db->query($sql);
	// 	return $query->result_array();
	// }

	public function DerivacionDirectaGestionBandejaInterna()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$sql = "SELECT usu_rol_id from usuario_rol where roles_rol_id=9 and usu_rol_estado=1 limit 1";
		$query = $this->db->query($sql);
		$result = $query->result_array();
        $rol_VInterna_SMGI= $result[0]['usu_rol_id'];

		$sql2 = " 	 SELECT  c.*,g.ges_gestion,dp.*
		from  derivacion_pendiente dp 
		   INNER JOIN correspondencia c ON c.cor_id=dp.cor_id 
		   INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
		   WHERE dp.id_r=$id_rol_usuario and dp.id_a=$rol_VInterna_SMGI and dp.accion='D'  ORDER BY dp.pend_id DESC";
		$query2 = $this->db->query($sql2);
		return $query2->result_array();
	}
	//HOJA DE RUTA
	public function fetchCorrespModel() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "SELECT c.*,g.ges_gestion
          FROM correspondencia c
		  INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
		  WHERE c.cor_estado=1 and c.usu_rol_id=$id_rol_usuario
	  	  ORDER BY c.cor_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function fetchCorrespModelProcess() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$sql = " SELECT DISTINCT h.origen, h.his_id, h.cor_id,h.nro_copia,c.*,g.ges_gestion
		FROM correspondencia as c 
		INNER JOIN	historial as h ON c.cor_id =h.cor_id 	
		INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
		WHERE c.cor_estado=2 and c.usu_rol_id=$id_rol_usuario GROUP BY h.cor_id,h.origen, h.nro_copia ORDER BY h.his_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function fetchCorrespModelProcessVentInt() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "SELECT c.*,g.ges_gestion,dp.*
          FROM correspondencia c
		  INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
		  INNER JOIN derivacion_pendiente dp ON  c.cor_id=dp.cor_id 
		  WHERE c.cor_estado=2 and c.usu_rol_id=$id_rol_usuario
	  	  ORDER BY c.cor_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	// public function fetchCorrespModelProcess() //CONSUMO DE DATOS DE HOJAS DE RUTA
	// {
	// 	$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

	// 	$sql = "SELECT cor_id,cor_tipo,cor_codigo,cor_estado,cor_cite,cor_nivel,cor_descripcion,cor_referencia,cor_observacion,cor_nombre_remitente,cor_cargo_remitente,cor_institucion,cor_tel_remitente
	//       FROM correspondencia 
	// 	  WHERE cor_estado=2 and usu_rol_id=$id_rol_usuario
	//   	  ORDER BY cor_id DESC";
	// 	$query = $this->db->query($sql);
	// 	return $query->result_array();
	// }


	public function fetchCorrespModelConcluded() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$sql = " SELECT DISTINCT h.his_id, h.origen ,h.cor_id,h.nro_copia,c.*,g.ges_gestion
		FROM correspondencia as c 
		INNER JOIN	historial as h ON c.cor_id =h.cor_id 	
		INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
		WHERE c.cor_estado=3 and c.usu_rol_id=$id_rol_usuario GROUP BY h.cor_id,h.origen, h.nro_copia ORDER BY h.cor_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
		
	}
	////////////////////////////////////////////////////////////////////////////////
	public function fetchUserList()
	{
		$rol_niv_1 = $this->session->userdata('rol_niv_1');
		$rol__niv_2 = $this->session->userdata('rol__niv_2');
		$rol__niv_3 = $this->session->userdata('rol__niv_3');
		$listTecnical = '';


		if (isset($rol__niv_2) and is_null($rol__niv_3)) {

			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);

			$query1 = $this->db->query("SELECT usu_rol_id,usu_id,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo
									   FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null  and roles_rol_id=2  ORDER BY usu_rol_id DESC ");
			$listTecnical = $query1;
		} elseif (!isset($rol__niv_2) and !isset($rol__niv_3)) {
			$id_sec = intval($rol_niv_1);
			$query1 = $this->db->query("SELECT usu_rol_id,usu_id,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo
                                     FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=2 ORDER BY usu_rol_id DESC");
			$listTecnical = $query1;
		} else {
			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);
			$id_uni = intval($rol__niv_3);

			$query1 = $this->db->query("SELECT usu_rol_id,usu_id,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo
									 FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=2  ORDER BY usu_rol_id DESC");
			$listTecnical  = $query1;
		}
		return $listTecnical->result_array();
	}
	/////////////////////////////////////////////////////
	public function fetchUserListTechnical()
	{
		$rol_niv_1 = $this->session->userdata('rol_niv_1');
		$rol__niv_2 = $this->session->userdata('rol__niv_2');
		$rol__niv_3 = $this->session->userdata('rol__niv_3');
		$listTecnical = '';

		if (isset($rol__niv_2) and is_null($rol__niv_3)) {

			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);

			$query1 = $this->db->query("SELECT usuario.*,usu_rol_id ,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null  and roles_rol_id=2  and usuario_rol.usu_rol_estado=1 ");
			$listTecnical = $query1->result();
		} elseif (!isset($rol__niv_2) and !isset($rol__niv_3)) {
			$id_sec = intval($rol_niv_1);
			$query2 = $this->db->query("SELECT usuario.*,usu_rol_id ,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									 WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=2   and usuario_rol.usu_rol_estado=1 ");
			$listTecnical = $query2->result();
		} else {
			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);
			$id_uni = intval($rol__niv_3);
			$query2 = $this->db->query("SELECT usuario.*,usu_rol_id ,usu_rol_cargo
									FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id
									WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=2  and usuario_rol.usu_rol_estado=1 ");
			$listTecnical  = $query2->result();
		}
		return $listTecnical;
	}
	/////////////////////////////////////////////////////
	public function fetchUserListTechnical2()
	{
		$rol_niv_1 = $this->session->userdata('rol_niv_1');
		$rol__niv_2 = $this->session->userdata('rol__niv_2');
		$rol__niv_3 = $this->session->userdata('rol__niv_3');
		$listTecnical = '';

		if (isset($rol__niv_2) and is_null($rol__niv_3)) {

			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);

			$query1 = $this->db->query("SELECT usuario.*,usu_rol_id ,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null  and roles_rol_id=2  and usuario_rol.usu_rol_estado=1 ");
			$listTecnical = $query1->result();
		} elseif (!isset($rol__niv_2) and !isset($rol__niv_3)) {
			$id_sec = intval($rol_niv_1);
			$query2 = $this->db->query("SELECT usuario.*,usu_rol_id ,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									 WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=2  and usuario_rol.usu_rol_estado=1 ");
			$listTecnical = $query2->result();
		} else {
			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);
			$id_uni = intval($rol__niv_3);

			$query2 = $this->db->query("SELECT usuario.*,usu_rol_id ,usu_rol_cargo
									FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id
									WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=2  and usuario_rol.usu_rol_estado=1 ");
			$listTecnical  = $query2->result();
		}
		return $listTecnical;
	}
	///////////////////////////////////////////////////////////////////////////////

	public function dependencyListLevel_1()
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$query = $this->db->query("SELECT * FROM nivel_1 WHERE  nivel_1.niv1_id=$sec_id and niv1_estado=1");
		return $query->result();
	}
	public function depListLevel1()
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$query = $this->db->query("SELECT * FROM nivel_1 WHERE niv1_estado=1 ORDER BY niv1_nombre ASC");
		return $query->result();
	}

	public function dependencyListLevel_2()
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$query = $this->db->query("SELECT * FROM nivel_2 WHERE nivel_2.nivel1_id=$sec_id and niv2_estado=1");
		return $query->result();
	}
	public function depListLevel2()
	{
		$sec_id = intval($this->session->userdata('rol__niv_2'));
		$query = $this->db->query("SELECT * FROM nivel_2 WHERE  nivel_2.niv2_id=$sec_id and niv2_estado=1");
		return $query->result();
	}
	public function dependencyListLevel_3()
	{
		$dir_id = intval($this->session->userdata('rol__niv_2'));
		$query = $this->db->query("SELECT * FROM nivel_3 WHERE  nivel_3.nivel2_id=$dir_id and niv3_estado=1");
		return $query->result();
	}

	/////////////////////////////////////////////////////////////////////////////
	public function dependencyListLevel_1Directo()
	{
		$query = $this->db->query("SELECT * FROM nivel_1 WHERE niv1_estado=1 ORDER BY niv1_nombre ASC ");
		return $query->result();
	}

	public function dependencyListLevel_2Directo($parametro)
	{
		$query = $this->db->query("SELECT * FROM nivel_2 WHERE nivel_2.nivel1_id=$parametro and niv2_estado=1");
		return $query->result();
	}
	public function dependencyListLevel_3Directo($parametro)
	{
		$query = $this->db->query("SELECT * FROM nivel_3 WHERE  nivel_3.nivel2_id=$parametro and niv3_estado=1");
		return $query->result();
	}
	public function listUsersLevel_1Directo($id_sec)
	{
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos,usuario_rol.usu_rol_cargo
		FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
		 WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=1 
	   and usuario_rol.usu_rol_estado=1 
			   ");
		return $query1->result();
	}
	public function listUsersLevel_2DirectoVentanillaRecaudaciones($id_sec,$id_dir)
	{
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id 
		WHERE   usuario_rol.usu_rol_estado=1 and  (roles_rol_id=1 or roles_rol_id=13) and usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null;");
return $query1->result();
	}
	public function listUsersLevel_1DirectoGestion($id_sec)
	{
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos,usuario_rol.usu_rol_cargo
		FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
		 WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=9 
	   and usuario_rol.usu_rol_estado=1 
			   ");
		return $query1->result();
	}
	public function listUsersLevel_1DirectoGestionSecretary($id_sec)
	{
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos,usuario_rol.usu_rol_cargo
		FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
		 WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  
	   and usuario_rol.usu_rol_estado=1 and usuario_rol.roles_rol_id=8");
		return $query1->result();
	}
	public function listUsersLevel_2Directo($id_sec, $id_dir)
	{
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos,usuario_rol.usu_rol_cargo  FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id 
							  WHERE   usuario_rol.usu_rol_estado=1 and  roles_rol_id=1  and usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null;");
		return $query1->result();
	}
	public function listUsersLevel_3Directo($sec_id, $dir_id, $id_uni)
	{
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos,usuario_rol.usu_rol_cargo 
							  FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id 
							  WHERE usuario_rol.usu_rol_estado=1  and  roles_rol_id=1 and  usuario_rol.nivel_1_niv1_id=$sec_id and usuario_rol.nivel_2_niv2_id=$dir_id and usuario_rol.nivel_3_niv3_id=$id_uni;");
		return $query1->result();
	}

	/////////////////////////////////////////////////////////////////////////////
	public function listUsersLevel_1Gestion($id_sec)
	{
		$usu_id = intval($this->session->userdata('usu_id'));
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos,usuario_rol.usu_rol_cargo
                                     FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=9 
									and usuario_rol.usu_rol_estado=1 and usuario.usu_id!=$usu_id
											");
		return $query1->result();
	}

	//////////////////////////////////////////////////////////////////////////////
	public function listUsersLevel_1($id_sec)
	{
		$usu_id = intval($this->session->userdata('usu_id'));
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos,usuario_rol.usu_rol_cargo
                                     FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=1 
									and usuario_rol.usu_rol_estado=1 and usuario.usu_id!=$usu_id
											");
		return $query1->result();
	}
	public function listUsersLevel_2($id_dir)
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$usu_id = intval($this->session->userdata('usu_id'));
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos,usuario_rol.usu_rol_cargo
								  FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id 
								  WHERE usuario_rol.nivel_1_niv1_id=$sec_id and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null and roles_rol_id=1 and usuario_rol.usu_rol_estado=1 AND usuario.usu_id!=$usu_id;");
		return $query1->result();
	}
	public function listUsersLevel_3($id_uni)
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$dir_id = intval($this->session->userdata('rol__niv_2'));
		$usu_id = intval($this->session->userdata('usu_id'));
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos,usuario_rol.usu_rol_cargo
								  FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id 
								  WHERE usuario_rol.nivel_1_niv1_id=$sec_id and usuario_rol.nivel_2_niv2_id=$dir_id and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=1 and usuario_rol.usu_rol_estado=1 AND usuario.usu_id!=$usu_id;");
		return $query1->result();
	}
	//////////////////////////////////////////////////////////////////////////////////////
	public function deriveExternal($data)
	{
		$this->db->insert('historial', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function fusion($data)
	{
		$this->db->insert('fusiones', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function deriveExternalCopias($data)
	{
		$this->db->insert_batch('historial', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function DatosRecepcionista($recepcionista)
	{
		$recep = intval($recepcionista);
		$query = $this->db->query("SELECT u.usu_nombres,u.usu_apellidos,ur.usu_dependencia FROM usuario_rol as ur INNER JOIN usuario as u ON u.usu_id=ur.usuario_usu_id WHERE ur.usuario_usu_id=$recep");
		return $query->row();
	}
	public function DatosCor_codigo($searchTerm = "")
	{
		$query = $this->db->query("SELECT cor_codigo FROM correspondencia where cor_codigo  LIKE '%" . $searchTerm . "%'");
		$proveedor = $query->result_array();
		$data = array();
		foreach ($proveedor as $value) {
			$codigo = 'GAMEA-' . $value['cor_codigo'] . '-' . date("Y");
			$data[] = array("cor_codigo" => $value['cor_codigo'], "text" => $codigo);
		}
		return $data;
	}
	public function DatosCor_codigo2()
	{
		//$recep=intval($recepcionista);
		$query = $this->db->query("SELECT cor_id,cor_codigo FROM correspondencia");
		$proveedor = $query->result_array();
		return $proveedor;
	}

	public function RefeyDescripcion($id = null)
	{
		if ($id) {
			$sql = "SELECT cor_referencia,cor_descripcion
			   FROM correspondencia
			   WHERE cor_id=$id";
			$query = $this->db->query($sql);
			return $query->row_array();
		}
	}

	public function RefeyDescripcion2($id = null)
	{

		$sql = "SELECT cor_referencia,cor_descripcion
			   FROM correspondencia";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function updateCorrespondence($data, $id)
	{
		$this->db->where('cor_id', $id);
		$this->db->update('correspondencia', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	public function updateCorrespondenceHistorialVentInternaRecep($data, $cor_id, $remitente)
	{
		$rem = intval($remitente);
		$cor_id = intval($cor_id);
		$sql = $this->db->query("SELECT * 
		from historial h 
		where id_r=$remitente and reaccion='A'and cor_id= $cor_id ORDER BY his_id DESC limit 1");
		$result = $sql->result_array();
		$his = $result[0]['his_id'];

		$this->db->where('his_id', $his);
		$this->db->update('historial', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	public function updateCorrespondenceHistorialVentInternaEmisor($cor_id, $remitente)
	{
		$rem = intval($remitente);
		$cor_id = intval($cor_id);
		$sql = $this->db->query("SELECT * 
		from historial h 
		where id_r=$remitente and accion='D'and cor_id= $cor_id ORDER BY his_id DESC limit 1");
		$result = $sql->result_array();
			return $result;
	}
	public function rowHistory($his_id)
	{
		$his_id = intval($his_id);
		$query = $this->db->query("SELECT * FROM historial WHERE historial.his_id=$his_id;");

		return $query->row();
	}
	public function rowCorrespondenceDocument($cor_id)
	{
		$cor_id = intval($cor_id);
		$query = $this->db->query("SELECT c.*,g.ges_gestion
								 FROM correspondencia c
								 INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
								 WHERE c.cor_id=$cor_id");
		return $query->row();
	}


	public function rowCorrespondenceDocument2($cor_id)
	{
		$cor_id = intval($cor_id);
		$query = $this->db->query("SELECT * FROM correspondencia as c INNER JOIN documento as d ON c.cor_id=d.id_hojaruta
								 WHERE c.cor_id=$cor_id");
		return $query->row();
	}

	//ADMINISTRACION DE USUARIOS
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
	public function ListUser($usu_id)
	{
		$usu_id = intval($usu_id);
		$query = $this->db->query("SELECT u.usu_id, u.usu_nombres,u.usu_apellidos,u.usu_ci,u.usu_ci_expedido,u.usu_celular,u.usu_genero, ur.usu_rol_usuario, ur.usu_rol_password,ur.usu_rol_cargo, ur.usu_count 
								FROM usuario as u INNER JOIN usuario_rol as ur ON u.usu_id=$usu_id and ur.usuario_usu_id=$usu_id");
		return $query->row();
	}

	public function ListUserCount($usu_id)
	{
		$query = $this->db->query("CALL UPDATE_COUNT_USER($usu_id)");
		return $query->row();
	}
	/////////UPDATE/////////
	public function ModelUpdateUser($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return true;
	}
	public function ModelUpdateUserRol($where2, $data2)
	{
		$this->db->update($this->table2, $data2, $where2);
		return true;
	}
	public function ModelUpdateUserState($where2, $data2)
	{
		$this->db->update($this->table2, $data2, $where2);
		return true;
	}
	public function ModelUpdateState_Tema($where, $data)
	{
		$this->db->update($this->table2, $data, $where);
		return true;
	}
	public function updateAcceptHistory($data, $id)
	{
		$this->db->where('his_id', $id);
		$this->db->update('historial', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	public function updateConclusionDerivacionPendiente($data, $id)
	{
		$this->db->where('pend_id', $id);
		$this->db->update('derivacion_pendiente', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	public function updateDesconclusionHojaRuta($data, $id)
	{
		$this->db->where('conclu_id', $id);
		$this->db->update('conclusion_hoja', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	public function updateDerivacionPendienteRechazar_VI_SMGI($data, $id)
	{
		$this->db->where('pend_id', $id);
		$this->db->update('derivacion_pendiente', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	public function updateConfirmDerivacion($data, $id)
	{
		$this->db->where('pend_id', $id);
		$this->db->update('derivacion_pendiente', $data);
		if ($this->db->affected_rows() > 0)
			return true;
		else
			return false;
	}
	public function rowCorrespondence($cor_id)
	{
		$this->db->where('cor_id', $cor_id);
		$query = $this->db->get('correspondencia');
		return $query->row();
	}

	//MODIFOCAR HOJA DE RUTA
	public function modificarHojaRutaCorrespondencia($id, $parametros)
	{
		//extract($parametros);
		$this->db->where('cor_id', $id);
		$this->db->update('correspondencia', $parametros);
		if ($this->db->affected_rows())
			return true;
		else
			return false;
	}

	///////////////////MODIFICAR CONTRASEÑA////////
	public function ModelUpdatePass($where, $data)
	{
		$this->db->update('usuario_rol', $data, $where);
		return true;
	}
	// 	$this->db->update('correspondencia');
	// 	if ($this->db->affected_rows())
	// 	  return true;
	// 	else
	// 	  return false;
	//   }

	//////REGISTRAR EN TABLA CORRESPONDENCIA ACEPTADA////////

	public function RegisterCorrespAccept($his_id)
	{
		date_default_timezone_set('America/La_Paz');
		$time = time();
		$fecha_created = date("Y-m-d H:i:s", $time);

		$sql = "SELECT * FROM historial WHERE his_id=$his_id";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		$data = array(
			'his_id' => $result[0]['his_id'],
			'origen' => $result[0]['origen'],
			'nro_copia' => $result[0]['nro_copia'],
			'reaccion' => 'A',
			'r_plazo'  => $result[0]['r_plazo'],
			'r_fecha' => $result[0]['r_fecha'],
			'cor_id' => $result[0]['cor_id'],
			'id_a' =>  $result[0]['id_a'],
			'id_r' =>  $result[0]['id_r'],
			'acc_created_at' => $fecha_created,
		);

		$this->db->insert('corres_accept', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}


	/////////////////BUSCQUEDA DE DATOS DE HOJAS CONLCUIDAS


	public function SearchDataConcluidos($conclu_id)
	{
		$DataConclu_id = intval($conclu_id);
		$query = $this->db->query("SELECT ch.*,ur.usu_dependencia, u.usu_nombres,u.usu_apellidos
		FROM conclusion_hoja ch
		INNER JOIN usuario_rol ur on ch.user_conclusion=ur.usu_rol_id
		INNER JOIN usuario u on ur.usuario_usu_id=u.usu_id
		WHERE ch.conclu_id=$DataConclu_id
		ORDER BY ch.his_id DESC limit 1");
		return $query->row();
	}
	
	public function SearchDataConcluidos222($cor_id)
	{
		$DataCor_id = intval($cor_id);
		$query = $this->db->query(" SELECT ch.*,ur.usu_dependencia, u.usu_nombres,u.usu_apellidos
		FROM conclusion_hoja ch
		INNER JOIN usuario_rol ur on ch.user_conclusion=ur.usu_rol_id
		INNER JOIN usuario u on ur.usuario_usu_id=u.usu_id
		WHERE ch.cor_id=$DataCor_id
		ORDER BY ch.his_id DESC ");
		return $query->result();
	}
	public function SearchDataConcluidosSimple($conclu_id)
	{
		$DataConclu_id = intval($conclu_id);
		$query = $this->db->query(" SELECT ch.*
		FROM conclusion_hoja ch
		WHERE ch.conclu_id=$DataConclu_id
		ORDER BY ch.conclu_id DESC LIMIT 1");
		return $query->result();
	}
	//////////////////////SEARCH CONTACTOS///////////////////////
	public function Model_SearchContactos($n1,$n2,$n3)
	{
		$val_n1=$n1==0?  "ur.nivel_1_niv1_id is null":" ur.nivel_1_niv1_id=$n1";
		$val_n2=$n2==0?  "ur.nivel_2_niv2_id is null":" ur.nivel_2_niv2_id=$n2";
		$val_n3=$n3==0?  "ur.nivel_3_niv3_id is null":" ur.nivel_3_niv3_id=$n3";
		$query1 = $this->db->query("SELECT ur.usu_rol_id,u.usu_nombres,u.usu_apellidos,u.usu_genero,ur.usu_rol_cargo,u.usu_celular,ur.usu_dependencia,ur.usu_rol_estado
		FROM usuario u
		INNER JOIN usuario_rol ur ON u.usu_id=ur.usuario_usu_id
		WHERE $val_n1 and $val_n2 and $val_n3  and  (ur.roles_rol_id=4  or  ur.roles_rol_id=1 or  ur.roles_rol_id=3 or  ur.roles_rol_id=8 or  ur.roles_rol_id=9) and ur.usu_rol_estado=1 ");
		return $query1->result();
	}


}
