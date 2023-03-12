<?php
class Model_Correspondencia extends CI_Model
{

  var $tablaU = 'derivacion_pendiente';
  //CREAR HOJA DE RUTA
  public function fetchCorrespModel() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

    $sql = "SELECT c.*,rd.rec_fecha_recep,rd.rec_cant_fojas,g.ges_gestion
          FROM correspondencia c
          INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
          INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id=rd.rec_doc_id 
		  WHERE c.cor_estado=1 and c.usu_rol_id=$id_rol_usuario
	  	  ORDER BY c.cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function fetchCorrespModelProcess() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

    $sql = "SELECT c.*,rd.rec_fecha_recep,rd.rec_cant_fojas,g.ges_gestion
    FROM correspondencia c
    INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
    INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id=rd.rec_doc_id 
		  WHERE cor_estado=2 and usu_rol_id=$id_rol_usuario
	  	  ORDER BY cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function fetchCorrespModelConcluid() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

    $sql = "SELECT c.*,rd.rec_fecha_recep,rd.rec_cant_fojas,g.ges_gestion
    FROM correspondencia c
    INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
    INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id=rd.rec_doc_id 
		  WHERE cor_estado=3 and usu_rol_id=$id_rol_usuario
	  	  ORDER BY cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  ///////////////////////////////////////////////////////////////////////
  public function fetchCorrespModelProcessVent_Recaudaciones() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

    $sql = "SELECT DISTINCT  h.origen, h.his_id, h.cor_id,h.nro_copia,c.*,rd.*,g.ges_gestion
  FROM correspondencia c
  INNER JOIN	historial as h ON c.cor_id =h.cor_id 	
  INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
  INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id=rd.rec_doc_id 
  WHERE cor_estado=2 and c.usu_rol_id=$id_rol_usuario 
  GROUP BY h.cor_id,h.origen,h.nro_copia
  ORDER BY h.cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  /////////////////////////////////////////////////////////
  public function fetchCorrespModelVentanillaExterna() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

    $sql = "SELECT c.*, dp.pend_id, dp.origen,dp.nro_copia,rd.rec_fecha_recep,rd.rec_cant_fojas,g.ges_gestion
    FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id
    INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
    INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id=rd.rec_doc_id 
     WHERE dp.estado=1 and dp.accion='C' and  c.cor_tipo='E' and dp.id_a=$id_rol_usuario ORDER BY c.cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function fetchCorrespModelProcessVentanillaExterna() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
    $sql = "SELECT c.*, dp.pend_id, dp.origen,dp.nro_copia,rd.rec_fecha_recep,rd.rec_cant_fojas,g.ges_gestion
    FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id
    INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
    INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id=rd.rec_doc_id 
     WHERE  (dp.accion='P' or dp.accion='D')and  c.cor_tipo='E' and dp.id_a=$id_rol_usuario ORDER BY c.cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function fetchCorrespModelConcluidVentanillaExterna() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

    $sql = "SELECT c.*,dp.pend_id, dp.origen,dp.nro_copia,rd.rec_fecha_recep,rd.rec_cant_fojas,g.ges_gestion
    FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id
    INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
    INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id=rd.rec_doc_id 
     WHERE  cor_estado=3 and  c.cor_tipo='E' and dp.id_a=$id_rol_usuario ORDER BY c.cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function fetchCorrespModelRetractarVentanillaExterna() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

    $sql = "SELECT c.*,dp.pend_id, dp.origen,dp.nro_copia,rd.rec_fecha_recep,rd.rec_cant_fojas,g.ges_gestion
    FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id
    INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
    inner join usuario_rol ur on dp.id_a=ur.usu_rol_id
    INNER JOIN recepcion_documento rd ON c.recepcion_documento_rec_doc_id=rd.rec_doc_id 
     WHERE dp.estado=1 and  dp.accion='P' and  c.cor_tipo='E' and dp.id_a=$id_rol_usuario and ur.roles_rol_id=3 ORDER BY c.cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function fetchCorrespModelVentanillaInterna() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

    $sql = "SELECT c.*, dp.pend_id, dp.origen,dp.nro_copia,g.ges_gestion
    FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id
    INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
     WHERE dp.estado=1 and dp.accion='C' and  c.cor_tipo='I'and c.cor_codigo > 80000 and c.cor_codigo < 100000 and dp.id_a=$id_rol_usuario ORDER BY c.cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function fetchCorrespModelProcessVentanillaInterna() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
    $sql = "SELECT c.*, dp.pend_id, dp.origen,dp.nro_copia,g.ges_gestion
    FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id
    INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
     WHERE  (dp.accion='P' or dp.accion='D') and  c.cor_tipo='I' and c.cor_codigo > 80000 and c.cor_codigo < 100000  and dp.id_a=$id_rol_usuario ORDER BY c.cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function fetchCorrespModelConcluidVentanillaInterna() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));

    $sql = "SELECT c.*, dp.pend_id, dp.origen,dp.nro_copia,g.ges_gestion
    FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id
    INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
     WHERE  cor_estado=3 and  c.cor_tipo='I' and c.cor_codigo > 80000 and c.cor_codigo < 100000  and dp.id_a=$id_rol_usuario ORDER BY c.cor_id desc";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  //////////////////////////////////////////////////
  public function insertHojaRutaRecepcion($data)
  {
    $this->db->insert('recepcion_documento', $data);
    if ($this->db->affected_rows())
      return true;
    else
      return false;
  }
  public function insertHojaRutaCorrespondencia($data)
  {
    $this->db->insert('correspondencia', $data);
    if ($this->db->affected_rows())
      return true;
    else
      return false;
  }
  ///////////////////////////////////////////
  public function Model_deriveCopiasPendientes($data)
  {
    $this->db->insert_batch('derivacion_pendiente', $data);
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function ModelUpdateDerivacionCopiasVentanilla($where, $data)
  {

    $this->db->where('cor_id', $where);
    $this->db->update('derivacion_pendiente', $data);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }
  public function ModelUpdateDerivacionCopiasVentanillaInternaBandeja($where, $data)
  {

    $this->db->where('pend_id', $where);
    $this->db->update('derivacion_pendiente', $data);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }
  public function ModelUpdateDerivacionMultipleVentanilla($where, $data)
  {

    $this->db->where('pend_id', $data);
    $this->db->update('derivacion_pendiente', $where);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }
  //LISTAR HOJA DE RUTA
  public function listarDatosCorrespModel($cor_id) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $sql = "SELECT cor_id,cor_codigo,cor_estado,cor_cite,cor_descripcion,cor_referencia,cor_observacion,cor_nombre_remitente,cor_cargo_remitente,cor_institucion,cor_tel_remitente,cor_count,rec_doc_id,rec_fecha_recep,rec_doc_nro_fojas,rec_cant_fojas,rec_cd_dvd,rec_cant_cd_dvd,rec_sobres,rec_cant_sobres,rec_carpetas,rec_cant_carpetas,rec_anillados,rec_cant_anillados
    FROM correspondencia INNER JOIN recepcion_documento ON correspondencia.recepcion_documento_rec_doc_id=recepcion_documento.rec_doc_id 
    WHERE correspondencia.cor_estado=1 AND correspondencia.cor_id = '" . $cor_id . "'";
    $query = $this->db->query($sql);
    return $query->row();
  }

  //MODIFOCAR HOJA DE RUTA
  public function modificarHojaRutaRecepcion($id, $data)
  {
    //$this->load->database();
    $this->db->where('rec_doc_id', $id);
    $this->db->update('recepcion_documento', $data);
    if ($this->db->affected_rows())
      return true;
    else
      return false;
  }
  /////////UPDATE/////////
  public function ModelUpdateDestino($id, $data)
  {

    $this->db->where('pend_id', $id);
    $this->db->update('derivacion_pendiente', $data);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }



  /////////BUSCAR DATOS Y MODIFICAR  DE LA PROCEDENCIA /////////
  public function Model_SearchUserProcedencia($id)
  {
    $sql = "SELECT usu_dependencia from usuario_rol where usu_rol_id= $id ";
    $query = $this->db->query($sql);
    return $query->row();
  }
  public function Model_SearchCorrespondenciaProcedencia($id)
  {
    $sql = "SELECT * from correspondencia where cor_id= $id ";
    $query = $this->db->query($sql);
    return $query->row();
  }
  public function ModelUpdateProcedencia($where, $id)
  {
    $this->db->where('cor_id', $id);
    $this->db->update('correspondencia', $where);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }

  ///////////////////////////////////////

  //DATOS DE CORRESPONDENCIA Y RECPECION DOCUMENTOS
  // public function rowCorrespondenceDocument2tablas($cor_id)
  // {
  //   $cor_id = intval($cor_id);
  //   $query = $this->db->query("SELECT * 
  //   FROM correspondencia as c 
  //   INNER JOIN recepcion_documento as r ON c.recepcion_documento_rec_doc_id=r.rec_doc_id 
  // 							 WHERE c.cor_id=$cor_id");
  //   return $query->row();
  // }
  public function rowCorrespondenceDocument2tablas($pend_id)
  {
    $DataPend_id = intval($pend_id);
    $query = $this->db->query("	SELECT * 
    FROM correspondencia as c 
    inner join derivacion_pendiente dp on dp.cor_id=c.cor_id
    INNER JOIN recepcion_documento as r ON c.recepcion_documento_rec_doc_id=r.rec_doc_id 
	WHERE dp.pend_id= $DataPend_id");
    return $query->row();
  }
  //DATOS DE CORRESPONDENCIA Y RECPECION DOCUMENTOS
  public function rowCorrespondencia($cor_id)
  {
    $cor_id = intval($cor_id);
    $query = $this->db->query("SELECT * FROM correspondencia  WHERE cor_id=$cor_id");
    return $query->row();
  }
  public function Model_derivarPendiente($data)
  {
    $this->db->insert('derivacion_pendiente', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }
  public function modificarHojaRutaCorrespondencia($id, $data)
  {
    $this->db->where('cor_id', $id);
    $this->db->update('correspondencia', $data);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }
  //LISTA PARA CARGAR ETIQUETA SELECT SECRETARIAS-DIRECCIONES-UNIDADES
  public function listarS($id_secretaria)
  {
    $this->db->select('niv1_id,niv1_nombre,niv1_sigla');
    $this->db->from('nivel_1');
    $this->db->where('niv1_estado', 1);
    $resultados = $this->db->get();
    return $resultados->result();
  }
  public function listarD($id_direccion)
  {
    $this->db->select('niv2_id,niv2_nombre,niv2_sigla');
    $this->db->from('nivel_2');
    $this->db->where('niv2_estado', 1);
    $resultados = $this->db->get();
    return $resultados->result();
  }
  public function listarU($id_unidad)
  {
    $this->db->select('niv3_id,niv3_nombre,niv3_sigla');
    $this->db->from('nivel_3');
    $this->db->where('niv3_estado', 1);
    $resultados = $this->db->get();
    return $resultados->result();
  }

  //LISTA RELACIONADA SECRETARIAS-DIRECCIONES-UNIDADES - CARGAR ETIQUETA SELECT
  public function listarSDU($depen, $id_depen)
  {
    $query = $this->db->query("CALL obtener_idsDependencias('" . $depen . "'," . $id_depen . ")");
    $rows = $query->result_array();
    return $rows;
  }

  //LISTA DE USUARIOS SEGUN ID DEPENDENCIA SECRETARIAS-DIRECCIONES-UNIDADES - CARGAR ETIQUETA SELECT
  public function listarUsuariosSDU($depen, $id_depen)
  {
    $query = $this->db->query("CALL obtener_regUsuarioRolDependencia('" . $depen . "'," . $id_depen . ")");
    $rows = $query->result_array();
    return $rows;
  }

  //   //LISTA DE USUARIOS SEGUN ID DEPENDENCIA SECRETARIAS-DIRECCIONES-UNIDADES - CARGAR ETIQUETA SELECT
  // public function listarUsuariosSDU($nivel,$id_nivel){
  //   $this->db->select('usu_nombres');
  //   $this->db->from('vista_regUsuarioRolDependencia');
  //   $this->db->where('nivel_3_niv3_id',  $id_nivel);
  //   $resultados = $this->db->get();
  //   return $resultados->result();
  // }











  public function row_gestion($year)
  {
    $query = $this->db->query("SELECT * FROM gestion  WHERE ges_gestion=$year ");
    return $query->row();
  }
  public function updateNumberGestion($ges_id, $data)
  {
    $this->db->where('ges_id', $ges_id);
    $this->db->update('gestion', $data);
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

  public function idUltimoCorres($user) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $sql = "SELECT cor_id FROM correspondencia WHERE id_user=$user order by cor_id desc LIMIT 1";
    $query = $this->db->query($sql);
    return $query->row();
  }
  public function idUltimoCorresHistorial($user) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $sql = "SELECT h.cor_id FROM historial as h INNER JOIN usuario_rol as ur ON h.id_a=ur.usu_rol_id  WHERE h.id_a=$user order by h.his_id desc LIMIT 1";
    $query = $this->db->query($sql);
    return $query->row();
  }



  function ModelSubirDocumento($iduser, $archivo, $datos, $fecha, $id)
  {
    $cons = $this->db->query("Select max(file_number) AS number from documento WHERE id_hojaruta=$id");
    if ($cons->num_rows() > 0) {
      $result = $cons->result_array();
      $number = $result[0]['number'] + 1;
    } else {
      $number = 1;
    }
    $dataa = array(
      'id_hojaruta' => $id,
      'id_user' => $iduser,
      'name_document_encript' => $archivo,
      'name_document_original' => $datos,
      'nameIG' => $id . '_' . $number,
      'file_number' => $number,
      'fecha' => $fecha,
      'status_file' => 1
    );
    $this->db->insert('documento', $dataa);
    return true;
  }

  public function ModelListDocument($idHojaruta, $iduser)
  {
    $sql = "SELECT d.*, c.cor_institucion FROM documento as d INNER JOIN correspondencia as c ON d.id_hojaruta=c.cor_id where id_hojaruta='" . $idHojaruta . "' ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function ModelListDocumentAll($idHojaruta)
  {
    $sql = "SELECT d.*, c.cor_institucion FROM documento as d INNER JOIN correspondencia as c ON d.id_hojaruta=c.cor_id where id_hojaruta='" . $idHojaruta . "' ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }
  public function ModelListDocumentDerivar($idHojaruta)
  {
    $cor_id = intval($idHojaruta);
    $query = $this->db->query("SELECT *
								 FROM correspondencia as c INNER JOIN documento as d ON c.cor_id=d.id_hojaruta
								 WHERE c.cor_id=$cor_id");
    return $query->result_array();
  }

  //LISTAR HOJA DE RUTA
  public function ModelSearchHojaRuta($cor_id, $gestion) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {

    $sql = "	SELECT * FROM correspondencia c INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id WHERE c.cor_tipo='E' AND c.cor_id=$cor_id and g.ges_gestion=$gestion";
    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      if ($result[0]['cor_estado'] == 1) {
        $sqlVenUnica = "SELECT * FROM correspondencia c 
        INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
        INNER JOIN usuario_rol ur ON ur.usu_rol_id=c.id_user 
        INNER JOIN usuario u ON ur.usuario_usu_id =u.usu_id 
        WHERE c.cor_tipo='E' and c.cor_id=$cor_id and g.ges_gestion=$gestion";
        $queryVenUnica = $this->db->query($sqlVenUnica);
        return $queryVenUnica->row();
      } else {
        $sqlVenUnicaProcess = "SELECT * FROM correspondencia c 
        INNER JOIN historial h ON c.cor_id =h.cor_id 
        WHERE c.cor_tipo='E' and h.cor_id=$cor_id";
        $queryeVenUnicaProcess = $this->db->query($sqlVenUnicaProcess);
        if ($queryeVenUnicaProcess->num_rows() > 0) {
          return $queryeVenUnicaProcess->row();
        } else {
          $sqlVenUnica = "SELECT * FROM correspondencia c 
          INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
          INNER JOIN usuario_rol ur ON ur.usu_rol_id=c.id_user 
          INNER JOIN usuario u ON ur.usuario_usu_id =u.usu_id 
          WHERE c.cor_tipo='E' and c.cor_id=$cor_id and g.ges_gestion=$gestion";
          $queryVenUnica = $this->db->query($sqlVenUnica);
          return $queryVenUnica->row();
        }
      }
    } else {

      $sqlHistorial = "  SELECT  h.*, c.*,g.ges_gestion,
      CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,  
      CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
      FROM  correspondencia as c 
      INNER JOIN historial as h ON h.cor_id=c.cor_id 
      INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
      INNER JOIN usuario u ON u.usu_id = h.id_r
      INNER JOIN usuario ua ON ua.usu_id = h.id_a`
      INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
      INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
      WHERE h.cor_id=$cor_id AND g.ges_gestion=$gestion AND h.origen='O' ORDER BY h.his_id desc LIMIT 1";
      $queryHistorial = $this->db->query($sqlHistorial);

      if ($queryHistorial->num_rows() > 0) {
        return $queryHistorial->row();
      } else {
        $sqlCorrespon = "SELECT  c.*,g.ges_gestion
        FROM  correspondencia as c 
        INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
        WHERE c.cor_id=$cor_id  AND g.ges_gestion=$gestion";
        $queryCorrespon = $this->db->query($sqlCorrespon);
        return $queryCorrespon->row();
      }
    }
  }



  //////////////////////////BUSQUEDA SIMPLE///////////////////////////////////
  public function ModelSearchHojaRutaCorrespondenciaSimple($codigo, $gestion)
  {
    $sql = " SELECT c.*, g.ges_gestion , u.usu_nombres,u.usu_apellidos FROM correspondencia c 
  INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
  INNER JOIN usuario_rol ur ON c.usu_rol_id =ur.usu_rol_id 
  INNER JOIN usuario u ON ur.usuario_usu_id =u.usu_id 
  WHERE c.cor_codigo=$codigo AND g.ges_gestion=$gestion ";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  /////////HISTORIAL ORIGINAL/////////
  public function ModelSearchHojaRutaHistorialOriginalSimple($cod, $gestion)
  {
    $sql = " SELECT h.his_id, h.cor_id, h.a_fecha, h. r_fecha, CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,
        CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
        FROM  correspondencia as c 
        INNER JOIN historial as h ON h.cor_id=c.cor_id 
        INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
        INNER JOIN usuario u ON u.usu_id = h.id_r
        INNER JOIN usuario ua ON ua.usu_id = h.id_a
        INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
        INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
        WHERE h.cor_id=$cod and h.origen='O' ORDER BY h.his_id DESC LIMIT 1";
    $query = $this->db->query($sql);
    return  $query->row();
  }
  public function ModelSearchHojaRutaCopiasSimple($cod, $gestion) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $sql = "SELECT max(nro_copia) as maximo FROM historial h WHERE h.cor_id =$cod";
    $query = $this->db->query($sql);
    $salvarData = $query;
    $array = array();
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      $nro = $result[0]['maximo'];
      for ($y = 1; $y <= $nro; $y++) {
        $sql2 = "    SELECT h.his_id, h.cor_id, h.origen, h.nro_copia, h.a_fecha, h. r_fecha, CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,
            CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
            FROM  correspondencia as c 
            INNER JOIN historial as h ON h.cor_id=c.cor_id 
            INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
            INNER JOIN usuario u ON u.usu_id = h.id_r
            INNER JOIN usuario ua ON ua.usu_id = h.id_a
            INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
            INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
            WHERE h.cor_id=$cod  and h.origen='C' and h.nro_copia=" . $y . " ORDER BY h.his_id DESC LIMIT 1";
        $query2 = $this->db->query($sql2);
        if ($query2->num_rows() > 0) {
          $array[] = $query2->row();
        }
      }
      return  $array;
    } else {
      return  $salvarData->row();
    }
  }
  //////////////////////////////////////////////////////////////////////////////////////////////////////////


  /////////////////////////////////

  public function Model_SearchViewHistorial($cod, $origen, $nrocopia)
  {
    if ($nrocopia == null || $nrocopia == 0 || $nrocopia == '') {
      $copia = 'h.nro_copia is null';
    } else {
      $copia = 'h.nro_copia='.$nrocopia;
    }
    $cor_id = intval($cod);
    $sql = "SELECT h.his_id,h.origen,h.nro_copia,h.accion,h.a_fecha,h.reaccion,h.r_fecha,h.cor_id,h.id_a,h.id_r,uA.usu_nombres as NomRemitente,uA.usu_apellidos as ApeRemitente ,urA.usu_dependencia as DepRemitente,u.usu_nombres as NomDestino,u.usu_apellidos as ApeDestino,ur.usu_dependencia as DepDestino,h.a_proveido,h.a_obs,h.r_descrip_rechazo
    from historial h
    INNER JOIN usuario_rol ur ON ur.usu_rol_id = h.id_r
    INNER JOIN usuario u on u.usu_id = ur.usuario_usu_id
      INNER JOIN usuario_rol urA ON urA.usu_rol_id = h.id_a
    INNER JOIN usuario uA on uA.usu_id = urA.usuario_usu_id
    where h.cor_id= $cor_id and h.origen='" . $origen . "' and  $copia order by h.his_id asc ";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  //////////////////////////BUSQUEDA SIMPLE///////////////////////////////////
  public function ModelSearchHojaRutaCorrespondenciaSimpleHistorial($cod, $gestion)
  {
    $sql = " SELECT c.*, g.ges_gestion , u.usu_nombres,u.usu_apellidos 
    FROM correspondencia c 
  INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
  INNER JOIN usuario_rol ur ON c.usu_rol_id =ur.usu_rol_id 
  INNER JOIN usuario u ON ur.usuario_usu_id =u.usu_id 
  WHERE c.cor_id=$cod AND g.ges_gestion=$gestion ";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  //////////////////////////BUSQUEDA LISTADO DATOS VENTANA///////////////////////////////////

  public function ModelSearchHojaRutaHIstorialVista($his)
  {
    $sql = " SELECT h.*,  g.ges_gestion, CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,
        CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor,
        CASE WHEN h.reaccion = 'A' THEN u.usu_celular WHEN h.reaccion IS NULL THEN ua.usu_celular ELSE ua.usu_celular END Celular
        FROM  correspondencia as c 
        INNER JOIN historial as h ON h.cor_id=c.cor_id 
        INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
        INNER JOIN usuario u ON u.usu_id = h.id_r
        INNER JOIN usuario ua ON ua.usu_id = h.id_a
        INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
        INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
        WHERE h.his_id=" . $his . " ORDER BY h.his_id DESC LIMIT 1";
    $query = $this->db->query($sql);
    return  $query->row();
  }
  //////////////////////////////////////////////////////////////////////////////////////////////////////////



  //LISTAR HOJA DE RUTA
  public function Model_Comunicados() //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $sql = "  SELECT* FROM  comunicados";
    $query2 = $this->db->query($sql);
    return $query2->row();
  }
  //LISTAR HOJA DE RUTA
  public function Model_ObtenerOriginalCopias($his) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $sql = "  SELECT *,MAX(nro_copia) as maxcopia FROM historial WHERE his_id=$his";
    $query2 = $this->db->query($sql);
    return $query2->row();
  }

  //LISTAR HOJA DE RUTA
  public function Model_ObtenerOriginalCopiasDp_Bandeja_VI_SMGI($his) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $sql = "  SELECT *,MAX(nro_copia) as maxcopia FROM derivacion_pendiente WHERE pend_id=$his";
    $query2 = $this->db->query($sql);
    return $query2->row();
  }

  //LISTAR HOJA DE RUTA
  public function ModelSearchHojaRutaCopias($cor_id, $gestion) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $sql = "SELECT MAX(nro_copia) as maximoo FROM historial WHERE cor_id=$cor_id and origen='C'; ";
    $maximo = $this->db->query($sql);
    // $result =$maximo->result_array();
    // $nums=$result[0]['maximoo'];
    if ($maximo->num_rows() > 0) {
      $sql2 = "SELECT  h.*, c.*,g.*,u.usu_nombres NOMBRES, u.usu_id, h.id_a idA, h.id_r idR, ur.usu_dependencia usuReacDepen, urA.usu_dependencia usuAccioDepen, 
      CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,  
      CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
      FROM  correspondencia as c 
      INNER JOIN historial as h ON h.cor_id=c.cor_id 
      INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
      INNER JOIN usuario u ON u.usu_id = h.id_r
      INNER JOIN usuario ua ON ua.usu_id = h.id_a
      
      INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
      INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
      WHERE  h.cor_id=$cor_id AND g.ges_gestion=$gestion  and h.origen ='C' and (h.nro_copia<=(SELECT MAX(nro_copia) FROM historial WHERE cor_id=$cor_id and origen='C'))
      ORDER BY h.a_fecha  DESC ";
      $query = $this->db->query($sql2);
      return $query->result();
    } else {
      return $maximo->row();
    }
  }


  //LISTAR HOJA DE RUTA
  public function ModelSearchObtenerDep($user) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $sql = "SELECT usu_dependencia FROM usuario_rol WHERE usu_rol_id=$user ";
    $valor = $this->db->query($sql);
    return $valor->row();
  }


  public function ModelSearchHojaRutaHistorial($cor_id, $historial, $gestion) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    if ($historial == NULL || $historial == 0) {

      $sql = "	SELECT * FROM correspondencia c INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id WHERE c.cor_tipo='E' AND c.cor_id=$cor_id and g.ges_gestion=$gestion";
      $query = $this->db->query($sql);

      if ($query->num_rows() > 0) {
        $result = $query->result_array();
        if ($result[0]['cor_estado'] == 1) {
          $sqlVenUnica = "SELECT * FROM correspondencia c 
          INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
          INNER JOIN usuario_rol ur ON ur.usu_rol_id=c.id_user 
          INNER JOIN usuario u ON ur.usuario_usu_id =u.usu_id 
          WHERE c.cor_tipo='E' and c.cor_id=$cor_id and g.ges_gestion=$gestion";
          $queryVenUnica = $this->db->query($sqlVenUnica);
          return $queryVenUnica->row();
        } else {
          $sqlVenUnicaProcess = "SELECT * FROM correspondencia c 
          INNER JOIN historial h ON c.cor_id =h.cor_id 
          WHERE c.cor_tipo='E' and h.cor_id=$cor_id";
          $queryeVenUnicaProcess = $this->db->query($sqlVenUnicaProcess);
          if ($queryeVenUnicaProcess->num_rows() > 0) {
            return $queryeVenUnicaProcess->row();
          } else {
            $sqlVenUnica = "SELECT * FROM correspondencia c 
            INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
            INNER JOIN usuario_rol ur ON ur.usu_rol_id=c.id_user 
            INNER JOIN usuario u ON ur.usuario_usu_id =u.usu_id 
            WHERE c.cor_tipo='E' and c.cor_id=$cor_id and g.ges_gestion=$gestion";
            $queryVenUnica = $this->db->query($sqlVenUnica);
            return $queryVenUnica->row();
          }
        }
      } else {

        $sqlCorrespon = "SELECT  c.*,g.ges_gestion
        FROM  correspondencia as c 
        INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id 
        WHERE c.cor_id=$cor_id  AND g.ges_gestion=$gestion";
        $queryCorrespon = $this->db->query($sqlCorrespon);
        return $queryCorrespon->row();
      }
    } else {


      //   $sqlHistorial = "  SELECT  h.*, c.*,g.ges_gestion,
      //   CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,  
      //   CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
      //   FROM  correspondencia as c 
      //   INNER JOIN historial as h ON h.cor_id=c.cor_id 
      //   INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
      //   INNER JOIN usuario u ON u.usu_id = h.id_r
      //   INNER JOIN usuario ua ON ua.usu_id = h.id_a
      //   INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
      //   INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
      //   WHERE c.cor_id=$cor_id AND g.ges_gestion=$gestion AND h.origen='O' AND h.his_id=$historial  ORDER BY h.his_id desc LIMIT 1";
      //   $queryHistorial = $this->db->query($sqlHistorial);
      //   return $queryHistorial->row();



      $sql2 = "SELECT h.reaccion 
      FROM  correspondencia as c INNER JOIN historial as h ON h.cor_id=c.cor_id INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  INNER JOIN usuario_rol as ur ON ur.usu_rol_id=h.id_r INNER JOIN usuario as u ON ur.usuario_usu_id=u.usu_id
      WHERE  h.cor_id=$cor_id AND g.ges_gestion=$gestion and h.his_id=$historial and h.reaccion='A'
      ORDER BY h.a_fecha ASC;";
      $query2 = $this->db->query($sql2);

      //PARA SABER SI ACEPTO EL DERIVADO
      if ($query2->num_rows() > 0) {
        $sql3 = " SELECT  h.*,c.cor_codigo,c.cor_tipo,h.reaccion,c.cor_estado,c.cor_cite,c.cor_descripcion,c.cor_observacion,c.cor_referencia,c.cor_nombre_remitente,c.cor_cargo_remitente,c.cor_institucion,c.cor_tel_remitente,c.cor_count,g.ges_gestion,ur.usu_dependencia,u.usu_nombres,u.usu_apellidos,u.usu_celular
        FROM  correspondencia as c 
        INNER JOIN historial as h ON h.cor_id=c.cor_id 
        INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
        INNER JOIN usuario_rol as ur ON ur.usu_rol_id=h.id_r 
        INNER JOIN usuario as u ON ur.usuario_usu_id=u.usu_id
        WHERE h.cor_id=$cor_id AND h.origen='O' and h.his_id=$historial ORDER BY h.his_id desc LIMIT 1";
        $query3 = $this->db->query($sql3);

        if ($query3->num_rows() == 0 || $query3->num_rows() == NULL) {
          $sql4 = "SELECT h.*,c.cor_codigo,c.cor_tipo,c.cor_estado,c.cor_cite,c.cor_descripcion,c.cor_observacion,c.cor_referencia,c.cor_nombre_remitente,c.cor_cargo_remitente,c.cor_institucion,c.cor_tel_remitente,c.cor_count,g.ges_gestion,ur.usu_dependencia,u.usu_nombres,u.usu_apellidos,u.usu_celular 
            FROM  correspondencia as c 
            INNER JOIN historial as h ON h.cor_id=c.cor_id 
            INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
            INNER JOIN usuario_rol as ur ON ur.usu_rol_id=h.id_r 
            INNER JOIN usuario as u ON ur.usuario_usu_id=u.usu_id
            WHERE  h.cor_id=$cor_id AND g.ges_gestion=$gestion  and h.origen ='C' and h.his_id=$historial
            ORDER BY h.a_fecha ASC;";
          $query4 = $this->db->query($sql4);
          return $query4->row();
        } else {
          return $query3->row();
        }
      } else {
        $sql5 = " SELECT  h.*,c.cor_codigo,c.cor_tipo,h.reaccion,c.cor_estado,c.cor_cite,c.cor_descripcion,c.cor_observacion,c.cor_referencia,c.cor_nombre_remitente,c.cor_cargo_remitente,c.cor_institucion,c.cor_tel_remitente,c.cor_count,g.ges_gestion,ur.usu_dependencia,u.usu_nombres,u.usu_apellidos,u.usu_celular
        FROM  correspondencia as c INNER JOIN historial as h ON h.cor_id=c.cor_id INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  INNER JOIN usuario_rol as ur ON ur.usu_rol_id=h.id_a INNER JOIN usuario as u ON ur.usuario_usu_id=u.usu_id
        WHERE h.cor_id=$cor_id AND h.origen='O' and h.his_id=$historial ORDER BY h.his_id desc LIMIT 1";
        $query5 = $this->db->query($sql5);

        if ($query5->num_rows() == 0 || $query5->num_rows() == NULL) {
          $sql6 = "SELECT h.*,c.cor_codigo,c.cor_tipo,c.cor_estado,c.cor_cite,c.cor_descripcion,c.cor_observacion,c.cor_referencia,c.cor_nombre_remitente,c.cor_cargo_remitente,c.cor_institucion,c.cor_tel_remitente,c.cor_count,g.ges_gestion,ur.usu_dependencia,u.usu_nombres,u.usu_apellidos,u.usu_celular
            FROM  correspondencia as c INNER JOIN historial as h ON h.cor_id=c.cor_id INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  INNER JOIN usuario_rol as ur ON ur.usu_rol_id=h.id_a INNER JOIN usuario as u ON ur.usuario_usu_id=u.usu_id
            WHERE  h.cor_id=$cor_id AND g.ges_gestion=$gestion  and h.origen ='C' and h.his_id=$historial
            ORDER BY h.a_fecha ASC;";
          $query6 = $this->db->query($sql6);
          return $query6->row();
        } else {
          return $query5->row();
        }
      }
    }
  }

  //////////////////////////////////////BUSQUEDAS AVANZADAS //////////////////////////////////////////////////////////////
  //LISTAR HOJA DE RUTA
  public function ModelSearch_AvanzadaHojaRutaCorrespondencia($finicial, $ffinal, $codigo, $gestion, $ref, $des, $nrem, $crem, $irem, $celrem) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $valor = 0;
    $where = "";
    if ($finicial === null && $ffinal === null && $codigo === null && $ref === null && $des === null && $nrem === null && $irem === null && $celrem === null) {
      $where = " c.cor_id=0";
    } elseif ($finicial != null && $ffinal != null) {
      //  $where="r.rec_fecha_recep BETWEEN '".$finicial."'AND '".$ffinal."'";
      $where = "c.cor_create_at BETWEEN '" . $finicial . "'AND '" . $ffinal . "'";
      $valor = 1;
    } elseif ($codigo != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = "c.cor_codigo like '%" . $codigo . "%' and g.ges_gestion='" . $gestion . "'";
      $valor = 1;
    } elseif ($ref != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_referencia like '%" . $ref . "%' ";
      $valor = 1;
    } elseif ($des != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_descripcion like '%" . $des . "%' ";
      $valor = 1;
    } elseif ($nrem != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_nombre_remitente like '%" . $nrem . "%' ";
      $valor = 1;
    } elseif ($crem != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_cargo_remitente like '%" . $crem . "%' ";
      $valor = 1;
    } elseif ($irem != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_institucion like '%" . $irem . "%' ";
      $valor = 1;
    } elseif ($celrem != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_tel_remitente like '%" . $celrem . "%' ";
      $valor = 1;
    } else {
      $where = " c.cor_id=0";
    }

    $sql = "SELECT c.*,g.ges_gestion
    FROM  correspondencia as c INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
    WHERE $where ";
    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }
  /////////HISTORIAL ORIGINAL/////////
  public function ModelSearch_AvanzadaHojaRutaHistorialOriginal($cadena) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $cant = count($cadena);
    // $cod=$data_n1[1]['cor_id'];
    if ($cant > 0) {
      $array = array();
      for ($x = 0; $x < $cant; $x++) {
        $sql = " SELECT h.his_id, h.cor_id, h.origen,h.nro_copia,
        CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,
        CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
        FROM  correspondencia as c 
        INNER JOIN historial as h ON h.cor_id=c.cor_id 
        INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
        INNER JOIN usuario u ON u.usu_id = h.id_r
        INNER JOIN usuario ua ON ua.usu_id = h.id_a
        INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
        INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
      WHERE h.cor_id=" . $cadena[$x]['cor_id'] . " and h.origen='O' ORDER BY h.his_id DESC LIMIT 1";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
          $array[] = $query->row();
        }
        // $array[] = $query->row();
      }
      return $array;
    } else {
      return false;
    }
  }
  /////////HISTORIAL COPIAS/////////
  public function ModelSearch_AvanzadaHojaRutaHistorialCopias($cadena) //CONSUMO DE DATOS DE HOJAS DE RUTA
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
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //LISTAR HOJA DE RUTA
  public function ModelSearch_AvanzadaHojaRuta($finicial, $ffinal, $codigo, $gestion, $ref, $des, $nrem, $crem, $irem, $celrem) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $valor = 0;
    $where = "";
    if ($finicial === null && $ffinal === null && $codigo === null && $ref === null && $des === null && $nrem === null && $irem === null && $celrem === null) {
      $where = " c.cor_id=0";
    } elseif ($finicial != null && $ffinal != null) {
      //  $where="r.rec_fecha_recep BETWEEN '".$finicial."'AND '".$ffinal."'";
      $where = "c.cor_create_at BETWEEN '" . $finicial . "'AND '" . $ffinal . "'";
      $valor = 1;
    } elseif ($codigo != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = "c.cor_codigo like '%" . $codigo . "%' and g.ges_gestion='" . $gestion . "'";
      $valor = 1;
    } elseif ($codigo != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_cite like '%" . $codigo . "%' ";
      $valor = 1;
    } elseif ($ref != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_referencia like '%" . $ref . "%' ";
      $valor = 1;
    } elseif ($des != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_descripcion like '%" . $des . "%' ";
      $valor = 1;
    } elseif ($nrem != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_nombre_remitente like '%" . $nrem . "%' ";
      $valor = 1;
    } elseif ($crem != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_cargo_remitente like '%" . $crem . "%' ";
      $valor = 1;
    } elseif ($irem != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_institucion like '%" . $irem . "%' ";
      $valor = 1;
    } elseif ($celrem != null) {
      if ($valor > 0) {
        $where = $where . " or ";
      }
      $where = $where . " c.cor_tel_remitente like '%" . $celrem . "%' ";
      $valor = 1;
    } else {
      $where = " c.cor_id=0";
    }

    $sql = "SELECT DISTINCT h.*, c.*, u.usu_id, h.id_a idA, h.id_r idR, ur.usu_dependencia usuReacDepen, urA.usu_dependencia usuAccioDepen, g.ges_gestion , 
    CASE WHEN h.reaccion = 'A' THEN ur.usu_dependencia WHEN h.reaccion IS NULL THEN urA.usu_dependencia ELSE urA.usu_dependencia END Condicion,
    CASE WHEN h.reaccion = 'A' THEN concat_ws(' ', u.usu_nombres, u.usu_apellidos) WHEN h.reaccion IS NULL THEN concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) ELSE concat_ws(' ', ua.usu_nombres, ua.usu_apellidos) END Servidor
    FROM  correspondencia as c 
    INNER JOIN historial as h ON h.cor_id=c.cor_id 
    INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  
    INNER JOIN usuario u ON u.usu_id = h.id_r
    INNER JOIN usuario ua ON ua.usu_id = h.id_a
    INNER JOIN usuario_rol ur ON ur.usuario_usu_id = u.usu_id
    INNER JOIN usuario_rol urA ON urA.usuario_usu_id = ua.usu_id
    WHERE $where ";
    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      $sql = "SELECT c.cor_id,c.cor_codigo,c.cor_tipo,c.cor_estado,c.cor_cite,c.cor_descripcion,c.cor_observacion,c.cor_referencia,c.cor_nombre_remitente,c.cor_cargo_remitente,c.cor_institucion,c.cor_tel_remitente,c.cor_count,g.ges_gestion,ur.usu_dependencia 
      FROM  usuario as u INNER join correspondencia as c  INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  INNER JOIN usuario_rol as ur ON ur.usuario_usu_id=u.usu_id 
      WHERE  $where ";
      $query = $this->db->query($sql);
      return $query->result_array();
    }
  }


  public function ListUpdateHojaRutaVentanilla($cor_id)
  {
    $query = $this->db->query("SELECT * FROM correspondencia as c INNER JOIN recepcion_documento as r ON c.recepcion_documento_rec_doc_id= r.rec_doc_id WHERE c.cor_id=$cor_id");
    return $query->row();
  }

  public function NamefileDelete($id)
  {
    $sql = "SELECT name_document_encript  FROM documento WHERE id_doc= $id ";
    $query = $this->db->query($sql);
    return $query->row();
  }
  public function deletefile($id)
  {

    $sql = "DELETE FROM documento WHERE id_doc= $id ";
    $query = $this->db->query($sql);
    return $this->db->affected_rows($query);
  }


  ////////////////BUSCAR ULTIMA PERSONA QUE ENVIO- CORRESPONDENCIA ACEPTADA////////////////
  public function ModelRemitenteHoja($id_hoja)
  {
    $sql = "select h.his_id,h.cor_id,u.usu_nombres,u.usu_apellidos,ur.usu_rol_cargo,ur.usu_dependencia, u.usu_celular, h.id_a ,h.id_r,h.r_fecha 
             FROM  historial as h  INNER JOIN usuario_rol as ur ON ur.usu_rol_id=h.id_a INNER JOIN usuario as u ON u.usu_id=ur.usuario_usu_id 
             WHERE h.cor_id=$id_hoja ORDER BY h.his_id desc LIMIT 1";
    $query = $this->db->query($sql);
    return $query->row();
  }
  //////////////// END BUSCAR ULTIMA PERSONA QUE ENVIO////////////////

  ////////////////CONTADOR DE DE ENTRADA DE BANDEJA////////////////
  public function CountBandeja($id_user_rol)
  {
    $sql = "SELECT count(*)  as contador 
    FROM historial as h 
    INNER JOIN usuario_rol as ur ON h.id_a=ur.usuario_usu_id 
    WHERE h.id_r=$id_user_rol and( h.bandeja=1 and h.recepcion=1) ;";
    $query = $this->db->query($sql);
    return $query->row();
  }

  public function CountBandejaVentanillaInterna($id_user_rol)
  {
    $sql = "SELECT count(*)  as contador 
    FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id
    inner join usuario_rol ur on dp.id_a=ur.usu_rol_id
     WHERE dp.estado=1 and dp.accion='P' and (c.cor_tipo='I'or c.cor_tipo='E')and ur.roles_rol_id=9;";
    $query = $this->db->query($sql);
    return $query->row();
  }

  ////////////////CONTADOR DE DE ENTRADA DE BANDEJA////////////////
  public function CountBandejaVentanillaUnica()
  {
    $sql = "SELECT count(*)  as contador 
    FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id
    inner join usuario_rol ur on dp.id_a=ur.usu_rol_id
     WHERE dp.estado=1 and dp.accion='P' and c.cor_tipo='E'and ur.roles_rol_id=3;";
    $query = $this->db->query($sql);
    return $query->row();
  }
  //////////////// END CONTADOR DE DE ENTRADA DE BANDEJA ////////////////

  public function AllComunicados()
  {
    $sql = "SELECT * FROM comunicados";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  //////////////// HISTORIAL EN GENERAL ////////////////

  public function Historial_General($his_id)
  {
    $sql = "SELECT * FROM historial WHERE his_id=$his_id";
    $query = $this->db->query($sql);
    return $query->row();
  }
  ////////////////BUSCADOR DEPENDENCIA DESTINO////////////////
  public function Model_Destino($id, $pend)
  {
    $sql = "SELECT ur.*, u.usu_nombres,u.usu_apellidos,dp.* 
    FROM derivacion_pendiente dp 
    INNER JOIN usuario_rol ur ON ur.usu_rol_id=dp.id_d 
    INNER JOIN usuario u ON u.usu_id =ur.usuario_usu_id
     WHERE dp.cor_id=$id and  dp.pend_id=$pend;";
    $query = $this->db->query($sql);
    return $query->row();
  }
  ////////////////BUSCADOR DEPENDENCIA DESTINO Y PROCEDENCIA////////////////
  public function Model_Procedencia($id, $pend)
  {
    $sql = "  SELECT  c.*
      FROM derivacion_pendiente dp 
      inner join correspondencia c on c.cor_id=dp.cor_id
       WHERE dp.cor_id=$id and  dp.pend_id=$pend and c.cor_institucion is not null  ;";
    $query = $this->db->query($sql);
    return $query->row();
  }
  ////////////////BUSCADOR DEPENDENCIA PARA CHECKBOX DE VENTANILLA UNICA ////////////////
  public function Model_DestinoCheckBox($pend)
  {
    $sql = "SELECT ur.*, u.usu_nombres,u.usu_apellidos,dp.* 
      FROM derivacion_pendiente dp 
      INNER JOIN usuario_rol ur ON ur.usu_rol_id=dp.id_d 
      INNER JOIN usuario u ON u.usu_id =ur.usuario_usu_id
       WHERE  dp.pend_id=$pend;";
    $query = $this->db->query($sql);
    return $query->row();
  }
  ////////////////SACAR CODIGO DESTINO////////////////
  public function Model_Cod_Destino($id)
  {
    $sql = "SELECT dp.* 
      FROM derivacion_pendiente dp 
       WHERE dp.cor_id=$id LIMIT 1;";
    $query = $this->db->query($sql);
    return $query->row();
  }

  ///////////////////////////////////////////////////////
  public function Model_ValidarCodigoVI_SMGI($codigo)
  {
    $sql = "SELECT cor_id 
        from correspondencia 
        where cor_codigo=$codigo and YEAR(cor_create_at)=YEAR(NOW())";
    $query = $this->db->query($sql);
    return $query->row();
  }
  ////////////////BUSCADOR DEPENDENCIA DESTINO////////////////
  public function Model_SacarCodigos($cadena, $cant)
  {
    if ($cant > 0) {
      $array = array();
      for ($x = 0; $x < $cant; $x++) {
        $sql = "SELECT c.cor_codigo,g.ges_gestion FROM correspondencia c  INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id WHERE cor_id =" . $cadena[$x] . "";
        $query2 = $this->db->query($sql);
        if ($query2->num_rows() > 0) {
          $array[] = $query2->row();
        }
      }
      return $array;
    } else {
      return false;
    }
  }
  public function Model_SacarCodigosForVentanillaUnica($cadena, $cant)
  {
    if ($cant > 0) {
      $array = array();
      for ($x = 0; $x < $cant; $x++) {
        $sql = "SELECT c.cor_codigo,g.ges_gestion, dp.origen,dp.nro_copia
          FROM derivacion_pendiente dp
    INNER JOIN correspondencia as c ON dp.cor_id=c.cor_id 
        INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id
        WHERE dp.pend_id =" . $cadena[$x] . "";
        $query2 = $this->db->query($sql);
        if ($query2->num_rows() > 0) {
          $array[] = $query2->row();
        }
      }
      return $array;
    } else {
      return false;
    }
  }
  ////////////////BUSCADOR DEPENDENCIA DESTINO////////////////
  public function Model_SacarCodigosHistorial($cadena, $cant)
  {
    if ($cant > 0) {
      $array = array();
      for ($x = 0; $x < $cant; $x++) {
        $sql = "SELECT h.cor_id, c.cor_codigo,g.ges_gestion,h.his_id 
        FROM correspondencia c  
          INNER JOIN gestion g ON c.gestion_ges_id=g.ges_id 
          INNER JOIN historial h ON c.cor_id=h.cor_id 
          WHERE h.his_id =" . $cadena[$x] . "";
        $query2 = $this->db->query($sql);
        if ($query2->num_rows() > 0) {
          $array[] = $query2->row();
        }
      }
      return $array;
    } else {
      return false;
    }
  }
  ////////////////BUSCADOR DEPENDENCIA DESTINO DE VENTANILLA UNICA ////////////////
  public function Model_DestinoVentUnica($cod)
  {
    $sql = "SELECT * FROM derivacion_pendiente WHERE cor_id=" . $cod . " order by pend_id desc limit 1 ";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  ////////////////BUSCADOR DEPENDENCIA DESTINO DE VENTANILLA UNICA ////////////////
  public function Model_DestinoVentInterna($cod)
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
    $sql = "SELECT * FROM derivacion_pendiente WHERE cor_id=$cod and id_a=$id_rol_usuario order by pend_id desc limit 1 ";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  ////////////////BUSCADOR DEPENDENCIA DESTINO DE VENTANILLA INTERNA SMGI////////////////
  public function Model_DestinoVentInternaBandejaVI_SMGI($id)
  {
    $id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
    $sql = "SELECT * FROM derivacion_pendiente WHERE pend_id=$id and id_a=$id_rol_usuario order by pend_id desc limit 1 ";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  ////////////////ASIGNAR DESTINO VENTANILLA UNICA ////////////////
  public function ModelUpdateDerivacionPendiente($data, $cod_id)
  {
    $this->db->where('cor_id', $cod_id);
    $this->db->update('derivacion_pendiente', $data);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }
  ////////////////ASIGNAR DESTINO VENTANILLA INTERNA BANDEJA RECEPCTION ////////////////
  public function ModelUpdateDerivacionPendiente_VI_BandejaRecepction($data, $id)
  {
    $this->db->where('pend_id', $id);
    $this->db->update('derivacion_pendiente', $data);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }

  //////////////// UPDATE DERIVAR PENDIENTE ////////////////
  public function AsignarDestino($data, $cod_id)
  {
    $this->db->where('cor_id', $cod_id);
    $this->db->update('derivacion_pendiente', $data);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }

  ////////////////RETRACTAR VENTANILLA UNICA//////////////////////////
  public function model_Retractar_VentaUnicaExterna($data, $pend_id) //CONSUMO DE DATOS DE HOJAS DE RUTA
  {
    $this->db->where('pend_id', $pend_id);
    $this->db->update('derivacion_pendiente', $data);
    if ($this->db->affected_rows() > 0)
      return true;
    else
      return false;
  }

  public function BuscarHistorial($his_id)
	{
		$id_rol_usuario = intval($this->session->userdata('usu_rol_id'));
		$sql = "SELECT  * FROM historial 
		WHERE his_id=$his_id";
		$query = $this->db->query($sql);
		return $query->row();
	}
}
