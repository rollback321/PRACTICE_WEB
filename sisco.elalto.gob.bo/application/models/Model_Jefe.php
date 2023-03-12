<?php
class Model_Jefe extends CI_Model
{
	var $table = 'usuario';
	var $table2 = 'usuario_rol';
	var $table3 = 'documento';

	//BANDEJA DE CORRESPONDENCIA
	public function fetchInbox()
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

		$sql = "  SELECT his_id,accion,historial.cor_id,a_plazo,a_fecha,a_proveido,a_obs,bandeja,recepcion,id_a,r_descrip_rechazo, correspondencia.*
				FROM historial INNER JOIN correspondencia ON historial.cor_id=correspondencia.cor_id
				WHERE historial.id_r=$id_rol_usuario AND bandeja=1 AND recepcion=1;";
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

		$sql = "  SELECT his_id,historial.cor_id,reaccion,r_plazo,r_fecha,a_proveido,a_obs,bandeja,recepcion,id_a,r_descrip_rechazo, correspondencia.*
				FROM historial INNER JOIN correspondencia ON historial.cor_id=correspondencia.cor_id
				WHERE historial.id_r=$id_rol_usuario AND bandeja=0 AND recepcion=1;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	//////////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////
	////////////////BUSCADOR TOTALES HOJAS DE RUTA////////////////
	public function TotalesHojasRuta($dep)
	{
		$contador = '';
		$bandeja = '';
		$aceptada = '';
		$derivada = '';
		$rechazada = '';
		$aceptadaForConcluir = '';

		$sql = "SELECT COUNT(his_id) as bandeja FROM historial h  INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id  WHERE ur.usu_dependencia='" . $dep . "' and h.reaccion is null";
		$query = $this->db->query($sql);
		$valoruno = $query->row();
		$bandeja = $valoruno->bandeja;

		$sql = "SELECT COUNT(his_id) as aceptada FROM corres_accept ca  INNER JOIN usuario_rol ur ON ca.id_r=ur.usu_rol_id  WHERE ur.usu_dependencia='" . $dep . "' and ca.reaccion='A'";
		$query = $this->db->query($sql);
		$valoruno = $query->row();
		$aceptada = $valoruno->aceptada;

		$sql = "SELECT COUNT(his_id) as derivada FROM historial h  INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id  WHERE ur.usu_dependencia='" . $dep . "' and h.reaccion='D'";
		$query = $this->db->query($sql);
		$valoruno = $query->row();
		$derivada = $valoruno->derivada;

		$sql = "SELECT COUNT(his_id) as rechazada FROM historial h  INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id  WHERE ur.usu_dependencia='" . $dep . "' and h.reaccion='R'";
		$query = $this->db->query($sql);
		$valoruno = $query->row();
		$rechazada = $valoruno->rechazada;

		$sql = "SELECT COUNT(his_id) as aceptadaForConcluir FROM historial h  INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id  WHERE ur.usu_dependencia='" . $dep . "' and h.reaccion='A' and recepcion=1 ";
		$query = $this->db->query($sql);
		$valoruno = $query->row();
		$aceptadaConcluir = $valoruno->aceptadaForConcluir;

		$datos = array(
			'bandeja' => $bandeja,
			'aceptada' => $aceptada,
			'derivada' => $derivada,
			'rechazada' => $rechazada,
			'aceptadaForConcluir' => $aceptadaConcluir,
		);
		return  $datos;
	}
	//////////////////////////////////////////////////////////////////////////////////
	//HOJA DE RUTA
	public function Model_fetchUserBandeja() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$name_dependencia = $this->session->userdata('nameUnique');
		$sql = "    SELECT u.usu_nombres,u.usu_apellidos,ur.usu_rol_cargo,ur.usu_rol_estado, u.usu_genero, ur.usu_rol_id, count(his_id) as bandeja 
		FROM historial h 
		INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id 
		INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id
		WHERE ur.usu_dependencia='$name_dependencia' and h.reaccion is null GROUP BY ur.usu_rol_id order by u.usu_nombres ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetchUserAceptadas() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$name_dependencia = $this->session->userdata('nameUnique');
		$sql = "   SELECT u.usu_nombres,u.usu_apellidos,ur.usu_rol_cargo,ur.usu_rol_estado, u.usu_genero, ur.usu_rol_id, count(ca.his_id) as bandeja 
		FROM corres_accept ca INNER JOIN  historial h ON ca.his_id =h.his_id 
		 INNER JOIN usuario_rol ur ON ca.id_r=ur.usu_rol_id 
		 INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id
		 WHERE ur.usu_dependencia='$name_dependencia' and ca.reaccion='A' GROUP BY ur.usu_rol_id order by u.usu_nombres ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetchUserDerivadas() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$name_dependencia = $this->session->userdata('nameUnique');
		$sql = "    SELECT u.usu_nombres,u.usu_apellidos,ur.usu_rol_cargo,ur.usu_rol_estado, u.usu_genero, ur.usu_rol_id , count(his_id) as bandeja FROM historial h 
		INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id 
		INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id
		WHERE ur.usu_dependencia='$name_dependencia' and h.reaccion='D' GROUP BY ur.usu_rol_id order by u.usu_nombres ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetchUserRechazadas() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$name_dependencia = $this->session->userdata('nameUnique');
		$sql = "    SELECT u.usu_nombres,u.usu_apellidos,ur.usu_rol_cargo,ur.usu_rol_estado, u.usu_genero, ur.usu_rol_id , count(his_id) as bandeja FROM historial h 
		INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id 
		INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id
		WHERE ur.usu_dependencia='$name_dependencia' and h.reaccion='R' GROUP BY ur.usu_rol_id order by u.usu_nombres ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetchUserAceptadasForConcluir() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$name_dependencia = $this->session->userdata('nameUnique');
		$sql = "SELECT u.usu_nombres,u.usu_apellidos,ur.usu_rol_cargo,ur.usu_rol_estado, u.usu_genero, ur.usu_rol_id, count(h.his_id) as bandeja 
		FROM  historial h 
		 INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id 
		 INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id
		 WHERE ur.usu_dependencia='$name_dependencia' and h.reaccion='A' and h.recepcion=1  GROUP BY ur.usu_rol_id order by u.usu_nombres ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	////////////////////////////////////////////////////////////////////////////////


	public function Model_fetchUserDetallesBandeja($user) //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$name_dependencia = $this->session->userdata('nameUnique');
		$sql = "SELECT h.cor_id,h.his_id, u.usu_nombres, u.usu_apellidos,u.usu_nombres as receptionN, u.usu_apellidos as receptionNA,c.cor_referencia,ur.usu_rol_id,urA.usu_dependencia, h.a_fecha, c.cor_codigo,g.ges_gestion , h.origen,h.nro_copia,
	 CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,
    CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
	FROM historial h 
	INNER JOIN correspondencia c ON c.cor_id=h.cor_id 
	INNER JOIN gestion g  ON c.gestion_ges_id =g.ges_id 
	INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id 
	INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id
	INNER JOIN usuario_rol urA ON h.id_a=urA.usu_rol_id 
	INNER JOIN usuario uA ON urA.usu_rol_id=uA.usu_id
	WHERE ur.usu_dependencia='$name_dependencia' and h.reaccion is null and h.id_r=$user ORDER BY h.his_id desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetchUserDetallesAceptada($user)//CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$name_dependencia=$this->session->userdata('nameUnique');
		$sql="	SELECT h.cor_id,h.his_id, u.usu_nombres as ReceptionN, u.usu_apellidos as ReceptionNA, uA.usu_nombres as EmisorN, uA.usu_apellidos as EmisorNA,c.cor_referencia,ur.usu_rol_id,urA.usu_dependencia, h.a_fecha, h.r_fecha, c.cor_codigo,g.ges_gestion , ca.origen,ca.nro_copia 
		FROM historial h 
		INNER JOIN corres_accept ca ON ca.his_id =h.his_id 
	   INNER JOIN correspondencia c ON c.cor_id=h.cor_id 
	   INNER JOIN gestion g  ON c.gestion_ges_id =g.ges_id 
	   INNER JOIN usuario_rol ur ON ca.id_r=ur.usu_rol_id 
	   INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id
	
	   INNER JOIN usuario_rol urA ON ca.id_a=urA.usu_rol_id 
	   INNER JOIN usuario uA ON urA.usu_rol_id=uA.usu_id
	   WHERE ur.usu_dependencia='$name_dependencia'  and ca.reaccion='A' and ca.id_r=$user";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetchUserDetallesAceptadaConcluir($user) //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$name_dependencia = $this->session->userdata('nameUnique');
		$sql = "SELECT h.his_id,h.cor_id, c.cor_estado,u.usu_nombres as ReceptionN, u.usu_apellidos as ReceptionNA, uA.usu_nombres as EmisorN, uA.usu_apellidos as EmisorNA,c.cor_referencia,ur.usu_rol_id,urA.usu_dependencia, h.a_fecha, h.r_fecha, c.cor_codigo,g.ges_gestion , h.origen,h.nro_copia 
	FROM historial h 
	   INNER JOIN correspondencia c ON c.cor_id=h.cor_id 
	   INNER JOIN gestion g  ON c.gestion_ges_id =g.ges_id 
	   INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id 
	   INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id
	
	   INNER JOIN usuario_rol urA ON h.id_a=urA.usu_rol_id 
	   INNER JOIN usuario uA ON urA.usu_rol_id=uA.usu_id
	   WHERE ur.usu_dependencia='$name_dependencia'  and h.reaccion='A' and h.recepcion=1 and h.id_r=$user ORDER BY h.his_id desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetchUserDetallesDerivada($user) //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$name_dependencia = $this->session->userdata('nameUnique');
		$sql = "SELECT h.his_id, h.cor_id, u.usu_nombres as ReceptionN, u.usu_apellidos as ReceptionNA, uA.usu_nombres as EmisorN, uA.usu_apellidos as EmisorNA,c.cor_referencia,ur.usu_rol_id,urA.usu_dependencia, h.a_fecha, h.r_fecha, c.cor_codigo,g.ges_gestion , h.origen,h.nro_copia 
	FROM historial h 
	INNER JOIN correspondencia c ON c.cor_id=h.cor_id 
	INNER JOIN gestion g  ON c.gestion_ges_id =g.ges_id 

	INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id 
	INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id

	INNER JOIN usuario_rol urA ON h.id_a=urA.usu_rol_id 
	INNER JOIN usuario uA ON urA.usu_rol_id=uA.usu_id

	WHERE ur.usu_dependencia='$name_dependencia' and h.reaccion='D' and h.id_r=$user ORDER BY h.his_id desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function Model_fetchUserDetallesRechazada($user) //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$userServidor=intval($user);
		$name_dependencia = $this->session->userdata('nameUnique');
		$sql = "SELECT h.r_descrip_rechazo,  h.cor_id,h.his_id, u.usu_nombres as ReceptionN, u.usu_apellidos as ReceptionNA, uA.usu_nombres as EmisorN, uA.usu_apellidos as EmisorNA,c.cor_referencia,ur.usu_rol_id,urA.usu_dependencia, h.a_fecha, h.r_fecha, c.cor_codigo,g.ges_gestion , h.origen,h.nro_copia 
	FROM historial h 
	INNER JOIN correspondencia c ON c.cor_id=h.cor_id 
	INNER JOIN gestion g  ON c.gestion_ges_id =g.ges_id 
	INNER JOIN usuario_rol ur ON h.id_r=ur.usu_rol_id 
	INNER JOIN usuario u ON ur.usu_rol_id=u.usu_id
	INNER JOIN usuario_rol urA ON h.id_a=urA.usu_rol_id 
	INNER JOIN usuario uA ON urA.usu_rol_id=uA.usu_id
	WHERE ur.usu_dependencia='$name_dependencia' and h.reaccion='R' and h.id_r=$userServidor ORDER BY h.his_id desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	//////////////////////////////////////////////////////////////////////
	public function fetchCorrespAdm() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$userid = intval($this->session->userdata('usu_rol_id'));
		$niv1 = intval($this->session->userdata('rol_niv_1'));
		$niv2 = intval($this->session->userdata('rol__niv_2'));
		$niv3 = intval($this->session->userdata('rol__niv_3'));
		$sql = "SELECT *FROM usuario_rol as ur INNER JOIN usuario as u ON ur.usuario_usu_id=u.usu_id WHERE ur.nivel_1_niv1_id=$niv1 and ur.nivel_2_niv2_id=$niv2 and ur.nivel_3_niv3_id=$niv3 AND ur.usu_rol_id!=$userid";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	/////////////////////////////////////SOLO SUS HOJAS DE RUTA DEL JEFE//////////////////////////////////////////////////

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
		$sql = " SELECT DISTINCT h.his_id, h.origen, h.cor_id,h.nro_copia,c.*,g.ges_gestion
			FROM correspondencia as c 
			INNER JOIN	historial as h ON c.cor_id =h.cor_id 	
			INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
			WHERE c.cor_estado=2 and c.usu_rol_id=$id_rol_usuario ORDER BY h.his_id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function fetchCorrespModelConcluded() //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$sql = " SELECT DISTINCT h.his_id, h.origen, h.cor_id,h.nro_copia,c.*,g.ges_gestion
			FROM correspondencia as c 
			INNER JOIN	historial as h ON c.cor_id =h.cor_id 	
			INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
			WHERE c.cor_estado=3 and c.usu_rol_id=$id_rol_usuario ORDER BY h.his_id DESC ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	///////////////////////////////////////////////////////////////////////////////

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
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null  and roles_rol_id=2");
			$listTecnical = $query1;
		} elseif (!isset($rol__niv_2) and !isset($rol__niv_3)) {
			$id_sec = intval($rol_niv_1);
			$query1 = $this->db->query("SELECT usu_rol_id,usu_id,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo
                                     FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=2");
			$listTecnical = $query1;
		} else {
			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);
			$id_uni = intval($rol__niv_3);

			$query1 = $this->db->query("SELECT usu_rol_id,usu_id,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo
									 FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=2");
			$listTecnical  = $query1;
		}
		return $listTecnical->result_array();
	}

	/////////////////////////////////////////////////////
	public function fetchUserListTechnicaVerSecretaria()
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
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null  and roles_rol_id=1 and usu_rol_estado=1 ");
			$listTecnical = $query1->result();
		} elseif (!isset($rol__niv_2) and !isset($rol__niv_3)) {
			$id_sec = intval($rol_niv_1);
			$query2 = $this->db->query("SELECT usuario.*,usu_rol_id ,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									 WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and roles_rol_id=1  and usu_rol_estado=1");
			$listTecnical = $query2->result();
		} else {
			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);
			$id_uni = intval($rol__niv_3);

			$query2 = $this->db->query("SELECT usuario.*,usu_rol_id ,usu_rol_cargo
									FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id
									WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=1 and usu_rol_estado=1 ");
			$listTecnical  = $query2->result();
		}
		return $listTecnical;
	}
	///////////////////////////////////////////////////////////////////////////////
	public function fetchUserListTechnical()
	{
		$rol_niv_1 = $this->session->userdata('rol_niv_1');
		$rol__niv_2 = $this->session->userdata('rol__niv_2');
		$rol__niv_3 = $this->session->userdata('rol__niv_3');
		$listTecnical = '';

		if (isset($rol__niv_2) and is_null($rol__niv_3)) {
			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);
			$query1 = $this->db->query("SELECT usuario.*,usu_rol_id  ,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null  and roles_rol_id=2 ");
			$listTecnical = $query1->result();
		} elseif (!isset($rol__niv_2) and !isset($rol__niv_3)) {
			$id_sec = intval($rol_niv_1);
			$query2 = $this->db->query("SELECT usuario.*,usu_rol_id ,usu_rol_cargo
									  FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id 
									 WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=2 ");
			$listTecnical = $query2->result();
		} else {
			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);
			$id_uni = intval($rol__niv_3);
			$query2 = $this->db->query("SELECT usuario.*,usu_rol_id  ,usu_rol_cargo
									FROM usuario_rol INNER JOIN usuario ON usuario_rol.usuario_usu_id= usuario.usu_id
									WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=2 ");
			$listTecnical  = $query2->result();
		}
		return $listTecnical;
	}

	public function dependencyListLevel_1()
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$query = $this->db->query("SELECT * FROM nivel_1 WHERE  nivel_1.niv1_id=$sec_id");
		return $query->result();
	}
	public function depListLevel1()
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$query = $this->db->query("SELECT * FROM nivel_1 ORDER BY niv1_nombre ASC");
		return $query->result();
	}

	public function dependencyListLevel_2()
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$query = $this->db->query("SELECT * FROM nivel_2 WHERE nivel_2.nivel1_id=$sec_id");
		return $query->result();
	}
	public function dependencyListLevel_3()
	{
		$dir_id = intval($this->session->userdata('rol__niv_2'));
		$query = $this->db->query("SELECT * FROM nivel_3 WHERE  nivel_3.nivel2_id=$dir_id");
		return $query->result();
	}


	public function listUsersLevel_1($id_sec)
	{
		$usu_id = intval($this->session->userdata('usu_id'));
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos 
                                     FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=1
									and usuario_rol.usu_rol_estado=1 and usuario.usu_id!=$usu_id");
		return $query1->result();
	}
	public function listUsersLevel_2($id_dir)
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$usu_id = intval($this->session->userdata('usu_id'));
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos 
								  FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id 
								  WHERE usuario_rol.nivel_1_niv1_id=$sec_id and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null and roles_rol_id=1 and usuario_rol.usu_rol_estado=1 AND usuario.usu_id!=$usu_id;");
		return $query1->result();
	}
	public function listUsersLevel_3($id_uni)
	{
		$sec_id = intval($this->session->userdata('rol_niv_1'));
		$dir_id = intval($this->session->userdata('rol__niv_2'));
		$usu_id = intval($this->session->userdata('usu_id'));
		$query1 = $this->db->query("SELECT usu_rol_id,usu_nombres,usu_apellidos 
								  FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id 
								  WHERE usuario_rol.nivel_1_niv1_id=$sec_id and usuario_rol.nivel_2_niv2_id=$dir_id and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=1 and usuario_rol.usu_rol_estado=1 AND usuario.usu_id!=$usu_id;");
		return $query1->result();
	}

	public function deriveExternal($data)
	{
		$this->db->insert('historial', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
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

	public function rowHistory($his_id)
	{
		$his_id = intval($his_id);
		$query = $this->db->query("SELECT * FROM historial WHERE historial.his_id=$his_id;");

		return $query->row();
	}
	public function rowCorrespondenceDocument($cor_id)
	{
		$cor_id = intval($cor_id);
		$query = $this->db->query("SELECT *
								 FROM correspondencia
								 WHERE correspondencia.cor_id=$cor_id");
		return $query->row();
	}


////////////////////
public function insertHojaRutaConcluida($data)
{
  $this->db->insert('conclusion_hoja', $data);
  if ($this->db->affected_rows())
	return true;
  else
	return false;
}
////////////////////




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
	//////////////////////////// END USUARIOS/////////

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
	public function updateAcceptHistory($data, $id)
	{
		$this->db->where('his_id', $id);
		$this->db->update('historial', $data);
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

	public function ModelListDocument($idHojaruta, $iduser)
	{
		$sql = "SELECT d.*, c.cor_institucion FROM documento as d INNER JOIN correspondencia as c ON d.id_hojaruta=c.cor_id where id_hojaruta='" . $idHojaruta . "' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	//////////////////////////////////////////////
	public function fetchUserListTecnico()
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
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null  and roles_rol_id=2 ORDER BY usu_rol_id DESC");
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
									WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=2 ORDER BY usu_rol_id DESC");
			$listTecnical  = $query1;
		}
		return $listTecnical->result_array();
	}


	//////////////////////////////////////////////
	public function fetchUserListSecretaria()
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
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id is null  and roles_rol_id=1 ORDER BY usu_rol_id DESC ");
			$listTecnical = $query1;
		} elseif (!isset($rol__niv_2) and !isset($rol__niv_3)) {
			$id_sec = intval($rol_niv_1);
			$query1 = $this->db->query("SELECT usu_rol_id,usu_id,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo
                                     FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									  WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id is null and usuario_rol.nivel_3_niv3_id is null  and  roles_rol_id=1 ORDER BY usu_rol_id DESC");
			$listTecnical = $query1;
		} else {
			$id_sec = intval($rol_niv_1);
			$id_dir = intval($rol__niv_2);
			$id_uni = intval($rol__niv_3);

			$query1 = $this->db->query("SELECT usu_rol_id,usu_id,roles_rol_id,usu_nombres,usu_apellidos,usu_ci,usu_ci_expedido,usu_celular,usu_genero,usu_rol_usuario,usu_rol_password,usu_rol_fecha_habilitacion,usu_rol_estado,usu_rol_cargo
									 FROM usuario INNER JOIN usuario_rol ON usuario.usu_id=usuario_rol.usuario_usu_id
									WHERE usuario_rol.nivel_1_niv1_id=$id_sec and usuario_rol.nivel_2_niv2_id=$id_dir and usuario_rol.nivel_3_niv3_id=$id_uni and roles_rol_id=1 ORDER BY usu_rol_id DESC");
			$listTecnical  = $query1;
		}
		return $listTecnical->result_array();
	}

	//////////////////////////////////////////////
	public function Model_Dependencia_niv1($niv1)
	{
		$id_sec = intval($niv1);
		$query = $this->db->query("SELECT * FROM nivel_1 WHERE niv1_id=$id_sec and niv1_estado=1");
		return $query->row();
	}
	//////////////////////////////////////////////
	public function Model_Dependencia_niv2($niv2)
	{
		$id_dir = intval($niv2);
		$query = $this->db->query("SELECT * from nivel_2 where niv2_id =$id_dir and niv2_estado=1");
		return $query->result();
	}
	//////////////////////////////////////////////
	public function Model_Dependencia_niv3($niv3)
	{
		$id_uni= intval($niv3);
		$query = $this->db->query("SELECT *from nivel_3 where niv3_id =$id_uni and niv3_estado=1 ");
		return $query->result();
	}

	////////////////////////BUSCAR DEPENDENCIAS PARA ADMINISTRAR HOJAS DE RUTAS //////////////////////
	public function Model_Dependencia_niv2_niv3($niv2)
	{
		$id_dir = intval($niv2);
		$query = $this->db->query("SELECT *from nivel_3 where nivel2_id =$id_dir and niv3_estado=1 ");
		return $query->result();
	}
	public function Model_Dependencia_niv1_niv2($niv1)
	{
		$id_sec = intval($niv1);
		$query = $this->db->query("SELECT *from nivel_2 where nivel1_id =$id_sec and niv2_estado=1 ");
		return $query->result();
	}

}
