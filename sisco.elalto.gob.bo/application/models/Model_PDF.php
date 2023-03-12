<?php
class Model_PDF extends CI_Model
{
	//CARGAR HOJA DE RUTA
	public function rowCorrespondenciaGestion($cor_id)
	{
		$nro_cor_id = intval($cor_id);
		$query = $this->db->query("SELECT c.cor_id as cor_id, c.cor_codigo as cor_codigo, c.cor_nivel as cor_nivel, c.cor_cite as cor_cite, c.cor_referencia as cor_referencia, c.cor_descripcion as cor_descripcion, c.cor_observacion as cor_observacion, c.cor_institucion as cor_institucion, c.cor_create_at as cor_create_at,c.recepcion_documento_rec_doc_id as recepcion_documento_rec_doc_id, g.ges_id as ges_id, g.ges_gestion as ges_gestion, ur.usu_rol_id as usu_rol_id, ur.usu_rol_cargo as usu_rol_cargo, ur.nivel_1_niv1_id as nivel_1_niv1_id, ur.nivel_2_niv2_id as nivel_2_niv2_id, ur.nivel_3_niv3_id as nivel_3_niv3_id, u.usu_id as usu_id, u.usu_nombres as usu_nombres, u.usu_apellidos as usu_apellidos 
		FROM correspondencia c
		INNER JOIN gestion g ON c.gestion_ges_id = g.ges_id 
		INNER JOIN usuario_rol ur ON ur.usu_rol_id = c.usu_rol_id  
		INNER JOIN usuario u ON u.usu_id = ur.usuario_usu_id  
		WHERE c.cor_id = $nro_cor_id");
		return $query->row();
	}

	public function arrayCorrespondenciaDerivacion($cor_id)
	{

		$nro_cor_id = intval($cor_id);
		$query = $this->db->query("SELECT c.cor_id as cor_id, c.cor_codigo as cor_codigo, h.a_fecha as a_fecha, h.r_fecha as r_fecha, h.r_plazo as r_plazo, c.recepcion_documento_rec_doc_id as recepcion_documento_rec_doc_id,ur.nivel_1_niv1_id as r_nivel_1_niv1_id, ur.nivel_2_niv2_id as r_nivel_2_niv2_id, ur.nivel_3_niv3_id as r_nivel_3_niv3_id, h.id_r as r_idreaccion, u.usu_nombres as r_usu_nombres, u.usu_apellidos as r_usu_apellidos, ur.usu_rol_cargo as r_usu_rol_cargo, c.cor_referencia as cor_referencia, h.a_proveido as a_proveido, h.a_obs as a_obs, h.r_descrip_rechazo as descrip_rechazo, h.id_a as idaccion
		FROM historial h 
		INNER JOIN usuario_rol ur ON ur.usu_rol_id = h.id_r
		INNER JOIN usuario u on u.usu_id = ur.usuario_usu_id
		INNER JOIN correspondencia c on c.cor_id = h.cor_id
		WHERE h.cor_id = $nro_cor_id");
		return $query->result_array();
	}
	public function arrayCorrespondenciaDerivacionCabecera($cor_id)
	{

		$nro_cor_id = intval($cor_id);
		$query = $this->db->query("SELECT c.cor_id as cor_id, c.cor_codigo as cor_codigo, h.a_fecha as a_fecha, h.r_fecha as r_fecha, h.r_plazo as r_plazo, c.recepcion_documento_rec_doc_id as recepcion_documento_rec_doc_id,ur.nivel_1_niv1_id as r_nivel_1_niv1_id, ur.nivel_2_niv2_id as r_nivel_2_niv2_id, ur.nivel_3_niv3_id as r_nivel_3_niv3_id, h.id_r as r_idreaccion, u.usu_nombres as r_usu_nombres, u.usu_apellidos as r_usu_apellidos, ur.usu_rol_cargo as r_usu_rol_cargo, c.cor_referencia as cor_referencia, h.a_proveido as a_proveido, h.a_obs as a_obs, h.r_descrip_rechazo as descrip_rechazo, h.id_a as idaccion
		FROM historial h 
		INNER JOIN usuario_rol ur ON ur.usu_rol_id = h.id_r
		INNER JOIN usuario u on u.usu_id = ur.usuario_usu_id
		INNER JOIN correspondencia c on c.cor_id = h.cor_id
		WHERE h.cor_id = $nro_cor_id");
		return $query->result_array();
	}
	public function Model_SacarOrigen($cor_id, $his_id)
	{
		$nro_cor_id = intval($cor_id);
		$nro_his_id = intval($his_id);
		$sql ="SELECT h.origen as origen, h.nro_copia as nro_copia,id_r as id_r
		FROM historial h 
		INNER JOIN correspondencia c ON c.cor_id=h.cor_id
		WHERE h.cor_id =$nro_cor_id and h.his_id=$nro_his_id ";
		$query = $this->db->query($sql);
		return $query->row();
	}
	public function arrayCorrespondenciaDerivacionHistorial($cor_id, $origen, $nro_copia)
	{
		$nro_cor_id = intval($cor_id);
		if ($nro_copia == null  || $nro_copia == 0) {
			$wherecopia = "h.nro_copia is null";
		} else {
			$wherecopia = "h.nro_copia=$nro_copia";
		}
		$query = $this->db->query("SELECT  h.his_id as his_id,c.cor_id as cor_id, c.cor_codigo as cor_codigo, h.a_fecha as a_fecha, h.r_fecha as r_fecha, h.r_plazo as r_plazo, c.recepcion_documento_rec_doc_id as recepcion_documento_rec_doc_id,ur.nivel_1_niv1_id as r_nivel_1_niv1_id, ur.nivel_2_niv2_id as r_nivel_2_niv2_id, ur.nivel_3_niv3_id as r_nivel_3_niv3_id, h.id_r as r_idreaccion, u.usu_nombres as r_usu_nombres, u.usu_apellidos as r_usu_apellidos, ur.usu_rol_cargo as r_usu_rol_cargo, c.cor_referencia as cor_referencia, h.a_proveido as a_proveido, h.a_obs as a_obs, h.r_descrip_rechazo as descrip_rechazo, h.id_a as idaccion, h.origen as origen, h.nro_copia as nro_copia
		FROM historial h 
		INNER JOIN usuario_rol ur ON ur.usu_rol_id = h.id_r
		INNER JOIN usuario u on u.usu_id = ur.usuario_usu_id
		INNER JOIN correspondencia c on c.cor_id = h.cor_id
		WHERE h.cor_id = $nro_cor_id and h.origen='" . $origen . "' and  $wherecopia  ");
		return $query->result_array();
	}

	public function arrayCorrespondenciaPendiente($pend_id)
	{
		$nro_pend_id = intval($pend_id);
		$query = $this->db->query("SELECT c.cor_id as cor_id, c.cor_codigo as cor_codigo, dp.a_fecha as a_fecha, c.recepcion_documento_rec_doc_id as recepcion_documento_rec_doc_id,ur.nivel_1_niv1_id as r_nivel_1_niv1_id, ur.nivel_2_niv2_id as r_nivel_2_niv2_id, ur.nivel_3_niv3_id as r_nivel_3_niv3_id, dp.id_r as r_idreaccion, u.usu_nombres as r_usu_nombres, u.usu_apellidos as r_usu_apellidos, ur.usu_rol_cargo as r_usu_rol_cargo, c.cor_referencia as cor_referencia, dp.a_proveido as a_proveido, dp.a_obs as a_obs,  dp.id_a as idaccion, dp.origen as origen, dp.nro_copia as nro_copia
	  FROM derivacion_pendiente dp 
	  INNER JOIN usuario_rol ur ON ur.usu_rol_id = dp.id_d
	  INNER JOIN usuario u on u.usu_id = ur.usuario_usu_id
	  INNER JOIN correspondencia c on c.cor_id = dp.cor_id
		WHERE dp.pend_id = $nro_pend_id");
		return $query->result_array();
	}

	public function cantidadResepcionDocumento($id_resep_doc)
	{
		$id_resep_doc = intval($id_resep_doc);
		$query = $this->db->query("SELECT rec_doc_id,rec_cant_fojas as cant_fojas ,rec_cant_cd_dvd as cant_cd,rec_cant_sobres as cant_sobres,rec_cant_carpetas as cant_carpetas,rec_cant_anillados as cant_anillados  FROM recepcion_documento WHERE rec_doc_id = $id_resep_doc");
		return $query->row();
	}

	public function BuscarDepDestino($pend_id)
	{
		$id = intval($pend_id);
		$query = $this->db->query("SELECT ur.usu_dependencia as dependencia
		FROM derivacion_pendiente dp 
	   INNER JOIN usuario_rol ur ON ur.usu_rol_id=dp.id_d 
	   WHERE dp.pend_id = $id");
		return $query->row();
	}

	public function BuscarOficinaDestino($id_r)
	{
		$id = intval($id_r);
		$query = $this->db->query("SELECT usu_dependencia as dependencia
		FROM usuario_rol
	   WHERE usu_rol_id = $id");
		return $query->row();
	}
	public function fetchDependencia($rol_nivel1, $rol_nivel2, $rol_nivel3)
	{
		$dependencia = '';
		if (isset($rol_nivel2) and is_null($rol_nivel3)) {
		//	if (isset($rol_nivel2) and is_null($rol_nivel3)) 
			//Nivel2
			$id_sec = intval($rol_nivel1);
			$id_dir = intval($rol_nivel2);

			$query1 = $this->db->query("select n2.niv2_id as niv2_id, n2.niv2_nombre as niv2_nombre, n2.niv2_sigla as sigla
			from nivel_1 n 
			inner join nivel_2 n2 on n2.nivel1_id = n.niv1_id 
			inner join nivel_3 n3 on n3.nivel2_id = n2.niv2_id 
			where n.niv1_estado = 1 and n2.niv2_estado = 1 and n3.niv3_estado = 1 and n.niv1_id = $id_sec and n2.niv2_id = $id_dir
			group by n2.niv2_id");
			$dependencia = $query1->result();
		} elseif (!isset($rol_nivel2) and !isset($rol_nivel3)) {
			//Nivel1
			$id_sec = intval($rol_nivel1);

			$query2 = $this->db->query("select n1.niv1_id as niv1_id, n1.niv1_nombre as niv1_nombre, n1.niv1_sigla as sigla
			from nivel_1 n1 
			inner join nivel_2 n2 on n2.nivel1_id = n1.niv1_id 
			inner join nivel_3 n3 on n3.nivel2_id = n2.niv2_id 
			where n1.niv1_estado = 1 and n2.niv2_estado = 1 and n3.niv3_estado = 1 and n1.niv1_id = $id_sec
			group by n1.niv1_id");
			$dependencia = $query2->result();
		} else {
			//Nivel3
			$id_sec = intval($rol_nivel1);
			$id_dir = intval($rol_nivel2);
			$id_uni = intval($rol_nivel3);

			$query3 = $this->db->query("select n3.niv3_id as niv3_id, n3.niv3_nombre as niv3_nombre, n3.niv3_sigla as sigla
			from nivel_1 n 
			inner join nivel_2 n2 on n2.nivel1_id = n.niv1_id 
			inner join nivel_3 n3 on n3.nivel2_id = n2.niv2_id 
			where n.niv1_estado = 1 and n2.niv2_estado = 1 and n3.niv3_estado = 1 and n.niv1_id = $id_sec and n2.niv2_id = $id_dir and n3.niv3_id = $id_uni			
			group by n3.niv3_id");
			$dependencia  = $query3->result();
		}
		return $dependencia;
	}











	public function fetchDependenciaVentanillaInternaExterna($rol_nivel1, $rol_nivel2, $rol_nivel3)
	{
		$dependencia = '';
		if (isset($rol_nivel2) and is_null($rol_nivel3)) {
			$id_sec = intval($rol_nivel1);
			$id_dir = intval($rol_nivel2);
			$query1 = $this->db->query("select n2.niv2_id as niv2_id, n2.niv2_nombre as niv2_nombre, n2.niv2_sigla as sigla
			from nivel_1 n 
			inner join nivel_2 n2 on n2.nivel1_id = n.niv1_id 
			where n.niv1_estado = 1 and n2.niv2_estado = 1  and n.niv1_id =$id_sec and n2.niv2_id = $id_dir group by n2.niv2_id");
			$dependencia = $query1->result();
		} elseif (!isset($rol_nivel2) and !isset($rol_nivel3)) {
			$id_sec = intval($rol_nivel1);
			$query2 = $this->db->query("select n1.niv1_id as niv1_id, n1.niv1_nombre as niv1_nombre, n1.niv1_sigla as sigla
			from nivel_1 n1 
			where n1.niv1_estado = 1  and n1.niv1_id = $id_sec
			group by n1.niv1_id");
			$dependencia = $query2->result();
		} else {
			$id_sec = intval($rol_nivel1);
			$id_dir = intval($rol_nivel2);
			$id_uni = intval($rol_nivel3);
			$query3 = $this->db->query("select n3.niv3_id as niv3_id, n3.niv3_nombre as niv3_nombre, n3.niv3_sigla as sigla
			from nivel_1 n 
			inner join nivel_2 n2 on n2.nivel1_id = n.niv1_id 
			inner join nivel_3 n3 on n3.nivel2_id = n2.niv2_id 
			where n.niv1_estado = 1 and n2.niv2_estado = 1 and n3.niv3_estado = 1 and n.niv1_id = $id_sec and n2.niv2_id = $id_dir and n3.niv3_id = $id_uni			
			group by n3.niv3_id");
			$dependencia  = $query3->result();
		}
		return $dependencia;
	}










	public function nombreUsuarioRol($rol_id)
	{
		$rol_id = intval($rol_id);
		$query = $this->db->query("select u.usu_nombres as a_usu_nombres, u.usu_apellidos as a_usu_apellidos, ur.usu_rol_cargo as a_usu_rol_cargo, ur.nivel_1_niv1_id as a_nivel_1_niv1_id,ur.nivel_2_niv2_id as a_nivel_2_niv2_id, ur.nivel_3_niv3_id as a_nivel_3_niv3_id
		from usuario u 
		inner join usuario_rol ur on ur.usuario_usu_id = u.usu_id
		where ur.usu_rol_id=$rol_id");
		return $query->row();
	}
	/////////////////////////////////////////////////////////////////////////////////////////
	// public function ReportesVentanillaUnica($f_inicioD,$f_inicioH,$f_finalD,$f_finalH)
	// {   $query=$this->db->query("SELECT * FROM correspondencia c 
	// INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id =rd.rec_doc_id 
	// INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
	// WHERE c.cor_tipo='E' AND c.cor_create_correspondencia BETWEEN '$f_inicioD .' '.$f_inicioH' AND '$f_finalD.''.$f_finalH'");
	// 	return $query->result();
	// }
	public function ReportesVentanillaUnica($f_inicioD, $f_inicioH, $f_finalD, $f_finalH)
	{
		$query = $this->db->query("SELECT * 
	FROM derivacion_pendiente dp 
	INNER JOIN correspondencia c ON c.cor_id=dp.cor_id
	INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id =rd.rec_doc_id 
	INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
	WHERE dp.tipo='E' AND dp.pend_create_at BETWEEN '".$f_inicioD ." ".$f_inicioH."' AND '".$f_finalD." ".$f_finalH."' ");
		return $query->result();
	}
	public function ReportesVentanillaInternaSMGI($f_inicioD, $f_inicioH, $f_finalD, $f_finalH)
	{
		$query = $this->db->query("SELECT * 
	FROM derivacion_pendiente dp 
	INNER JOIN correspondencia c ON c.cor_id=dp.cor_id
	INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
	WHERE dp.tipo='I' AND dp.pend_create_at BETWEEN '".$f_inicioD ." ".$f_inicioH."' AND '".$f_finalD." ".$f_finalH."' ");
		return $query->result();
	}

	public function Model_ReportesVentanillaUnicaRecaudaciones($f_inicioD, $f_inicioH, $f_finalD, $f_finalH,$usuario)
	{ $usu_rol_id = intval($usuario);
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$query = $this->db->query("SELECT c.*,h.his_id,h.origen,h.nro_copia,u.usu_nombres,u.usu_apellidos,ur.usu_dependencia,g.ges_gestion,rd.*
		FROM historial h
		INNER JOIN correspondencia c ON c.cor_id=h.cor_id
		INNER JOIN usuario_rol ur ON ur.usu_rol_id=h.id_r
		INNER JOIN usuario u ON u.usu_id=ur.usu_rol_id
		INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id =rd.rec_doc_id 
		INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
		WHERE c.cor_tipo='E' and h.id_r=$usu_rol_id and h.id_a=$id_rol_usuario and c.cor_create_at BETWEEN '".$f_inicioD ." ".$f_inicioH."' AND '".$f_finalD." ".$f_finalH."' order by c.cor_id asc");
		return $query->result();
	}
	public function Model_ReportesVentanillaUnicaRecaudacionesRecepcionista($usuario)
	{ $usu_rol_id = intval($usuario);

		$query = $this->db->query("SELECT u.*
		FROM usuario_rol ur 
		INNER JOIN usuario u ON u.usu_id=ur.usu_rol_id
		WHERE ur.usu_rol_id=$usu_rol_id");
		return $query->result();
	}



////////////////////////////////////////REPORTES SECRETARIAS //////////////////////////
public function Model_Reportes_Secretaria($f_inicioD, $f_inicioH, $f_finalD, $f_finalH,$usuario,$criterio)
{   $Recep_usu_rol_id = intval($usuario);
	$criterio_dato = intval($criterio);
	$my_id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
if($criterio_dato==1){
	$query = $this->db->query("SELECT c.*,h.his_id,h.origen,h.nro_copia,h.a_fecha,u.usu_nombres,u.usu_apellidos,ur.usu_dependencia,g.ges_gestion
	FROM historial h
	INNER JOIN correspondencia c ON c.cor_id=h.cor_id
	INNER JOIN usuario_rol ur ON ur.usu_rol_id=h.id_r
	INNER JOIN usuario u ON u.usu_id=ur.usu_rol_id
	INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
	WHERE  h.id_a=$Recep_usu_rol_id and h.id_r=$my_id_rol_usuario and h.a_fecha BETWEEN '".$f_inicioD ." ".$f_inicioH."' AND '".$f_finalD." ".$f_finalH."' order by c.cor_id asc");
}else{
	$query = $this->db->query("SELECT c.*,h.his_id,h.origen,h.nro_copia,h.a_fecha,u.usu_nombres,u.usu_apellidos,ur.usu_dependencia,g.ges_gestion
	FROM historial h
	INNER JOIN correspondencia c ON c.cor_id=h.cor_id
	INNER JOIN usuario_rol ur ON ur.usu_rol_id=h.id_r
	INNER JOIN usuario u ON u.usu_id=ur.usu_rol_id
	INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
	WHERE h.id_a=$my_id_rol_usuario and h.id_r=$Recep_usu_rol_id and h.a_fecha  BETWEEN '".$f_inicioD ." ".$f_inicioH."' AND '".$f_finalD." ".$f_finalH."' order by c.cor_id asc");
}
	return $query->result();
}

	/////////////////////////////////////////////////////////////////////////////////////
	public function ReportesSecretary_fechas($f_inicioD, $f_inicioH, $f_finalD, $f_finalH)

	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$query = $this->db->query(" SELECT c.*, g.ges_gestion 
		FROM correspondencia c 
		INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
		INNER JOIN usuario_rol ur ON c.usu_rol_id=ur.usu_rol_id 
		INNER JOIN usuario u ON u.usu_id=ur.usuario_usu_id 
		WHERE c.usu_rol_id =$id_rol_usuario and c.cor_create_at BETWEEN '".$f_inicioD ." ".$f_inicioH."' AND '".$f_finalD." ".$f_finalH."'   ");
		return $query->result_array();
	}

	/////////HISTORIAL ORIGINAL/////////
	public function ModelHistorialOriginal($cadena) //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$cant = count($cadena);
		if ($cant > 0) {
			$array = array();
			for ($x = 0; $x < $cant; $x++) {
				$valor = $cadena[$x]['cor_id'];
				$sql = " SELECT h.his_id, h.cor_id, CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,
			CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
			FROM  correspondencia as c 
			INNER JOIN historial as h ON h.cor_id=c.cor_id 
			INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
			INNER JOIN usuario u ON u.usu_id = h.id_r
			INNER JOIN usuario ua ON ua.usu_id = h.id_a
			INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
			INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
	    	WHERE h.cor_id=$valor and h.origen='O' ORDER BY h.his_id DESC LIMIT 1";
				$query = $this->db->query($sql);
				if ($query->num_rows() > 0) {
					$array[] = $query->row();
				}
			}
			return $array;
		} else {
			return false;
		}
	}
	public function ModelHistorialCopias($cadena) //CONSUMO DE DATOS DE HOJAS DE RUTA
	{
		$cant = count($cadena);
		// $cod=$data_n1[1]['cor_id'];
		if ($cant > 0) {
			$array = array();
			for ($x = 0; $x < $cant; $x++) {
				$sql = "SELECT max(nro_copia) as maximo FROM historial h WHERE h.cor_id =" . $cadena[$x]['cor_id'] . "";
				$query = $this->db->query($sql);

				if ($query->num_rows() > 0) {
					$result = $query->result_array();
					$nro = $result[0]['maximo'];

					for ($y = 1; $y <= $nro; $y++) {
						$sql2 = "    SELECT h.his_id, h.cor_id, h.origen, h.nro_copia, CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,
            CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
            FROM  correspondencia as c 
            INNER JOIN historial as h ON h.cor_id=c.cor_id 
            INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
            INNER JOIN usuario u ON u.usu_id = h.id_r
            INNER JOIN usuario ua ON ua.usu_id = h.id_a
            INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
            INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
          WHERE h.cor_id=" . $cadena[$x]['cor_id'] . "  and h.origen='C' and h.nro_copia=" . $y . " ORDER BY h.his_id DESC LIMIT 1";
						$query2 = $this->db->query($sql2);
						if ($query2->num_rows() > 0) {
							$array[] = $query2->row();
						}
					}
				} else {
					// $array[] = null;
				}
			}
			return $array;
		} else {
			return false;
		}
	}
}
