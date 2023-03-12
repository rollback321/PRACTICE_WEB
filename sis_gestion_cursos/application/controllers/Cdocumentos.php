<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cdocumentos extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('programas');
		$this->load->model('documentos');
	}


  function registrar(){
	    $folder="SI";
	    if ($this->input->post('folder') == null) {    $folder = "NO";}

        $foto4x4="SI";
		if ($this->input->post('foto4x4') == null) {    $foto4x4 = "NO";}
		
		$foto2_5x2_5="SI";
		if ($this->input->post('foto2_5x2_5') == null) {    $foto2_5x2_5 = "NO";} 

		$formularioIncripcion="SI";
		if ($this->input->post('formularioInscripcion') == null) {    $formularioIncripcion = "NO";} 

		$hojaIncripcion="SI";
		if ($this->input->post('hojaIncripcion') == null) {    $hojaIncripcion = "NO";} 

		$fotocopiaCarnet="SI";
		if ($this->input->post('fotocopiaCarnet') == null) {    $fotocopiaCarnet = "NO";} 

		$diplomaAcademico="SI";
		if ($this->input->post('diplomaAcademico') == null) {    $diplomaAcademico = "NO";} 

		$tituloAcademico="SI";
		if ($this->input->post('tituloAcademico') == null) {    $tituloAcademico = "NO";} 

		$cartaInscripcion="SI";
		if ($this->input->post('cartaInscripcion') == null) {    $cartaInscripcion = "NO";} 
        
		$hojaDeVida="SI";
		if ($this->input->post('hojaDeVida') == null) {    $hojaDeVida = "NO";} 

		$data = array("id_part"=>$this->input->post('id_part',TRUE),
		"folder"=>$folder ,
		"foto4x4"=>$foto4x4,
		 "foto2_5x2_5"=>$foto2_5x2_5 ,
		 "formularioIncripcion"=>$formularioIncripcion,
		 "hojaIncripcion"=>$hojaIncripcion,
		 "fotocopiaCarnet"=>$fotocopiaCarnet,
		 "diplomaAcademico"=>$diplomaAcademico,
		 "tituloAcademico"=>$tituloAcademico,
		 "cartaInscripcion"=>$cartaInscripcion,
		 "hojaDeVida"=>$hojaDeVida,
		 "observaciones"=>$this->input->post('observaciones'));
$this->documentos->registrar($data);
$sql = "SELECT MAX(id_doc) id_doc  FROM documentos;"; 
$query = $this->db->query($sql);
foreach($query->result() as $row){
	$id_doc = $row->id_doc;}				    
  
//VERIFICAR SI SE MARCO LAS OPCIONES DE LOS TITULOS ACADEMICOS
if($tituloAcademico == "NO" || $diplomaAcademico =="NO"){
header('Location: ../Cmain/prorroga?id_part='.$this->input->post('id_part',TRUE)."&id_doc=".$id_doc."&id_prog=".$_GET['id_prog']);
}else{

}

  }

  function listar(){
	$data = array("enlaces"=>$this->documentos->listar($_GET['id_part'],$_GET['id_prog']));
//$data = $this->documentos->listar($_GET['id_part'],$_GET['id_prog']);

$this->load->view('headers/headers');
		$this->load->view('documentosTableVIEW',$data);
		$this->load->view('fooders/fooders');

//echo "ID_PART".$_GET['id_part']."<br>"."ID_PROG".$_GET['id_prog'];


  }


  //../../Cdocumentos/listar?id_part=".$row->id_part."&id_prog=".$id_prog."'
function obteniendoDatosUpdate(){

	$id_prog= $_GET['id_prog'];
	$id_doc = $_GET['id_doc'];
	$id_part= $_GET['id_part'];

	$data = array("enlaces"=>$this->documentos->listarUpdate($id_doc));

	
	$this->load->view('headers/headers');
			$this->load->view('documentosFormUpdateVIEW',$data);
			$this->load->view('fooders/fooders');
//	echo "obteniendo datos update<br>id_prog:".$_GET['id_prog']."<br>id_doc:".$_GET['id_doc']."<br>id_part:".$_GET['id_part'];
}

function modificar(){
	$folder="SI";
	if ($this->input->post('folder') == null) {    $folder = "NO";}

	$foto4x4="SI";
	if ($this->input->post('foto4x4') == null) {    $foto4x4 = "NO";}
	
	$foto2_5x2_5="SI";
	if ($this->input->post('foto2_5x2_5') == null) {    $foto2_5x2_5 = "NO";} 

	$formularioIncripcion="SI";
	if ($this->input->post('formularioInscripcion') == null) {    $formularioIncripcion = "NO";} 

	$hojaIncripcion="SI";
	if ($this->input->post('hojaIncripcion') == null) {    $hojaIncripcion = "NO";} 

	$fotocopiaCarnet="SI";
	if ($this->input->post('fotocopiaCarnet') == null) {    $fotocopiaCarnet = "NO";} 

	$diplomaAcademico="SI";
	if ($this->input->post('diplomaAcademico') == null) {    $diplomaAcademico = "NO";} 

	$tituloAcademico="SI";
	if ($this->input->post('tituloAcademico') == null) {    $tituloAcademico = "NO";} 

	$cartaInscripcion="SI";
	if ($this->input->post('cartaInscripcion') == null) {    $cartaInscripcion = "NO";} 
	
	$hojaDeVida="SI";
	if ($this->input->post('hojaDeVida') == null) {    $hojaDeVida = "NO";}

	$data = array(
		"folder"=>$folder ,
		"foto4x4"=>$foto4x4,
		 "foto2_5x2_5"=>$foto2_5x2_5 ,
		 "formularioIncripcion"=>$formularioIncripcion,
		 "hojaIncripcion"=>$hojaIncripcion,
		 "fotocopiaCarnet"=>$fotocopiaCarnet,
		 "diplomaAcademico"=>$diplomaAcademico,
		 "tituloAcademico"=>$tituloAcademico,
		 "cartaInscripcion"=>$cartaInscripcion,
		 "hojaDeVida"=>$hojaDeVida,
		 "observaciones"=>$this->input->post('observaciones'));
$this->documentos->modificar($data,$this->input->post('id_doc',TRUE));

header('Location: ../Cparticipantes/seeligioprograma/'.$_GET['id_prog']);

}

}

	

	

	


	 


