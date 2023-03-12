<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participantes extends CI_Model {

private $nombre="";
private $apellidoP="";
private $apellidoM="";
private $ci="";
private $nCelular1 ="";
private $nCelular2 ="";

public	function __construct(){

    parent::__construct();


    }
   

function registrar($data){
    $this->db->insert('participantes',$data);
}

function eliminar($id){
    $this->db->where('id_part',$id);
    $this->db->delete('participantes');
  
  }
function modificar($data,$id){
    $this->db->where('id_part',$id);
    $this->db->update('participantes',$data);
  }
/*function idParticipante($ci){
  $sql = "SELECT * FROM programas WHERE id_prog = ? ";
  $query = $this->db->query($sql,$id);
  
  if  ($query->num_rows() >0){
      return $query;
  }else{
      return FALSE;
  }
}
*/
function inscribir($data){
    $sql = "SELECT MAX(id_part) id_part FROM participantes ";
    $query = $this->db->query($sql);
    $id_part="";
    if($query->num_rows() == 1){
        foreach ($query->result() as $fila){;
        $id_part = $fila->id_part;}
        
        $sql =  "INSERT INTO inscritos (id_part,id_prog) VALUES (".$id_part.",".$data['idPrograma'].");";
        $query = $this->db->query($sql);
    }else{ echo 'Nose pudo registrar "existen cero o dos o mas participantes con el mismo C.I."';}
    return $id_part;
    
}

//listar participantes para la ventana participantesTableVIEW segun el id de programa
function verTodo ($id){
    $sql = "SELECT p.id_part, p.nombre, p.apellidoP,p.apellidoM,p.ci,p.nCelular1,p.nCelular2,p.correo,p.dtoResidencia 
             FROM participantes P inner join inscritos i on i.id_part=p.id_part 
             WHERE i.id_prog=".$id;
    $query = $this->db->query($sql);
    if  ($query->num_rows() >0){
              return $query;
    }else{
      return FALSE;
    }
  }

  function verParticipante($id_part){

    $sql =  "SELECT *
    FROM participantes  
    WHERE id_part=".$id_part;
    $query = $this->db->query($sql);
    
    if  ($query->num_rows() >0){
        return $query;
    }else{
        return FALSE;
    }
  }
}
