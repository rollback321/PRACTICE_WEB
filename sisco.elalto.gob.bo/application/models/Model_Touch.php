<?php 
class Model_Touch extends CI_Model
{
	
    public function ModelSearchHojaRuta($id_hoja,$gestion)//CONSUMO DE DATOS DE HOJAS DE RUTA
    {         
         $sql="SELECT  h.his_id,c.cor_id,c.cor_codigo,c.cor_tipo,c.cor_estado,c.cor_cite,c.cor_descripcion,c.cor_observacion,c.cor_referencia,c.cor_nombre_remitente,c.cor_cargo_remitente,c.cor_institucion,c.cor_tel_remitente,c.cor_count,g.ges_gestion,h.id_r,h.a_fecha, ur.usu_dependencia, u.usu_nombres,u.usu_apellidos
        FROM  correspondencia as c INNER JOIN historial as h ON h.cor_id=c.cor_id INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id INNER JOIN usuario_rol as ur ON ur.usu_rol_id=h.id_r INNER JOIN usuario as u ON u.usu_id=ur.usuario_usu_id
        WHERE c.cor_codigo=$id_hoja AND g.ges_gestion=$gestion ORDER BY h.his_id desc LIMIT 1";
        $query=$this->db->query($sql);
  
        if($query->num_rows()>0)
        {
          return $query->row();
  
        }else{
          $sql="SELECT c.cor_id,c.cor_codigo,c.cor_tipo,c.cor_estado,c.cor_cite,c.cor_descripcion,c.cor_observacion,c.cor_referencia,c.cor_nombre_remitente,c.cor_cargo_remitente,c.cor_institucion,c.cor_tel_remitente,c.cor_count,g.ges_gestion,ur.usu_dependencia 
          FROM  usuario as u INNER join correspondencia as c  INNER JOIN gestion as g ON c.gestion_ges_id=g.ges_id  INNER JOIN usuario_rol as ur ON ur.usuario_usu_id=u.usu_id 
          WHERE c.cor_codigo=$id_hoja AND g.ges_gestion=$gestion ORDER BY c.cor_id desc LIMIT 1";
          $query=$this->db->query($sql);
          return $query->row();
        }
   
    }
  
}



