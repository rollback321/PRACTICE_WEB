
    
<?php
$id_part="";
$nombrePart="";
$apellidoP="";
$apellidoM="";
$ci="";

$id_prog="";
$nombreProg="";
$version="";
$sede="";

$id_doc="";
$folder="";
$foto4x4="";
$foto2_5x2_5="";
$formularioInscripcion="";
$hojaInscripcion="";
$fotocopiaCarnet="";
$diplomaAcademico="";
$tituloAcademico="";
$cartaInscripcion="";
$hojaDeVida="";
$Observaciones="";

if(isset($_GET['id_part'])){
	$id_part=$_GET['id_part'];
	$id_prog = $_GET['id_prog'];
    $id_doc="";

//obteniendo datos del participante
    $sql =  "SELECT *
    FROM participantes  
    WHERE id_part=".$id_part;
    $query = $this->db->query($sql);
    
	foreach($query->result() as $row){
		$nombrePart = $row->nombre;
		$apellidoP = $row->apellidoP;
		$apellidoM = $row->apellidoM;
		$ci = $row->ci;}
//obteniendo datos del programa
		$sql = "SELECT * FROM programas WHERE id_prog = ? ";
		$query = $this->db->query($sql,$id_prog);

	foreach($query->result() as $row){
		$nombreProg = $row->nombre;
		$version = $row->version;
		$sede = $row->sede;
		}

//obteniendo datos de los documentos
foreach($enlaces->result() as $row){
	 $id_doc=$row->id_doc;
	 $folder=$row->folder;
	 $foto4x4=$row->foto4x4;
	 $foto2_5x2_5=$row->foto2_5x2_5;
	 $formularioInscripcion=$row->formularioIncripcion;
	 $hojaInscripcion=$row->hojaIncripcion;
	 $fotocopiaCarnet=$row->fotocopiaCarnet;
	 $diplomaAcademico=$row->diplomaAcademico;
	 $tituloAcademico=$row->tituloAcademico;
	 $cartaInscripcion=$row->cartaInscripcion;
	 $hojaDeVida=$row->hojaDeVida;
	 $Observaciones=$row->Observaciones;
 }	
 
      if($folder=="SI"){
        $folder="checked";
	  }
	  if($foto4x4=="SI"){
        $foto4x4="checked";
	  }
	  if($foto2_5x2_5=="SI"){
        $foto2_5x2_5="checked";
	  }
	  if($formularioInscripcion=="SI"){
        $formularioInscripcion="checked";
	  }
	  if($hojaInscripcion=="SI"){
        $hojaInscripcion="checked";
	  }
	  if($fotocopiaCarnet=="SI"){
        $fotocopiaCarnet="checked";
	  }
	  if($diplomaAcademico=="SI"){
        $diplomaAcademico="checked";
	  }
	  if($tituloAcademico=="SI"){
        $tituloAcademico="checked";
	  }
	  if($cartaInscripcion=="SI"){
        $cartaInscripcion="checked";
	  }
	  if($hojaDeVida=="SI"){
        $hojaDeVida="checked";
	  }
	  
}





?>	
<div>
	<h4>Programa: <?= $nombreProg ?> <br>
        Version: <?= $version?>      <br>
	    Sede: <?= $sede ?></h4>
	<h3>Registro de documentacion para:</h3>
	<h4>Participante: <?= $nombrePart ?> <?= $apellidoP ?> <?= $apellidoM ?> <br>
        C.I. : <?= $ci ?> </h4>
</div>
<div>
	<form action="../../index.php/Cdocumentos/modificar?id_prog=<?= $id_prog ?>&id_doc=<?= $id_doc ?>" method="POST">
		Folder:<input type="checkbox" name="folder" id="folder"  <?= $folder ?> >
		 <input type="hidden" name="id_doc" id="id_doc" value="<?= $id_doc ?>" >
		 <input type="hidden" name="id_part" id="id_part" value="<?= $id_part ?>">
		<br>
		Foto 4 x 4: <input type="checkbox" name="foto4x4" id="foto4x4" <?= $foto4x4 ?> >
		<br>
		Foto 2.5 x 2.5: <input type="checkbox" name="foto2_5x2_5" id="foto2_5x2_5" <?= $foto2_5x2_5 ?> >
		<br>
		Formulario de inscripción: <input type="checkbox" name="formularioInscripcion" id="formularioInscripcion"  <?= $formularioInscripcion ?> >
		<br>
		Hoja de inscripción: <input type="checkbox" name="hojaIncripcion" id="hojaInscripcion" <?= $hojaInscripcion ?> >
		<br>
		Fotocapia de carnet: <input type="checkbox" name="fotocopiaCarnet" id="fotocopiaCarnet" <?= $fotocopiaCarnet ?>>
		<br>
		Diploma académico: <input type="checkbox" name="diplomaAcademico" id="diplomaAcademico" <?= $diplomaAcademico ?> >
		<br>
		Titulo en provición nacional: <input type="checkbox" name="tituloAcademico" id="tituloAcademico" <?= $tituloAcademico ?> >
		<br>
		Carta de inscripción: <input type="checkbox" name="cartaInscripcion" id="cartaInscripcion" <?= $cartaInscripcion ?> >
		<br>
		Hoja de vida: <input type="checkbox" name="hojaDeVida" id="hojaDeVida" <?= $hojaDeVida ?> >
		<br>
		Observacones: <br><textarea id="observaciones"  name="observaciones" rows="4" cols="50"> <?= $Observaciones ?></textarea>			
		<br>
		<input type="submit" value="Modificar">
	</form>
</div>
