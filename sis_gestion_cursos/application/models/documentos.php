<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class documentos extends CI_Model {

private $nroDeposito="";
private $fechaDeposito="";
private $montoDeposito="";
private $fotocopiaBoleta="";
private $boletaOriginal ="";
private $observaciones ="";

public	function __construct(){

    parent::__construct();


    }
   

function registrar($data){
    $this->db->insert('documentos',$data);
}

function listar($id_part, $id_prog){
    
    $sql = 	"SELECT
    p.id_part, 
    p.nombre,
    p.apellidoP,
    p.apellidoM,
    p.ci,
    
    pr.id_prog,
    pr.nombre programa,
    pr.version,
    
    d.id_doc, 
    d.id_part,
    d.folder,
    d.foto4x4,
    d.foto2_5x2_5,
    d.formularioIncripcion,
    d.hojaIncripcion,
    d.fotocopiaCarnet,
    d.diplomaAcademico,
    d.tituloAcademico,
    d.cartaInscripcion,
    d.hojaDeVida,
    d.Observaciones
  FROM documentos d
  INNER JOIN participantes p on p.id_part=d.id_part 
  INNER JOIN inscritos i on i.id_part = p.id_part
  INNER JOIN programas pr on i.id_prog = pr.id_prog
  WHERE i.id_part = ".$id_part." and i.id_prog = ".$id_prog;

$query = $this->db->query($sql);
 return $query;

}

function listarUpdate ($id_doc){
$sql = "SELECT * FROM documentos WHERE id_doc=".$id_doc;

$query = $this->db->query($sql);

return $query;

}

function modificar($data,$id){
    $this->db->where('id_doc',$id);
    $this->db->update('documentos',$data);

    
  }

}
