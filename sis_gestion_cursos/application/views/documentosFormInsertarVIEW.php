
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


if(isset($_GET['id_part'])){
	$id_part=$_GET['id_part'];
	$id_prog = $_GET['id_prog'];

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
	<form action="../../index.php/Cdocumentos/registrar?id_prog=<?= $id_prog ?>" method="POST">
		Folder:<input type="checkbox" name="folder" id="folder">
		
		 <input type="hidden" name="id_part" id="id_part" value="<?= $id_part ?>">
		<br>
		Foto 4 x 4: <input type="checkbox" name="foto4x4" id="foto4x4">
		<br>
		Foto 2.5 x 2.5: <input type="checkbox" name="foto2_5x2_5" id="foto2_5x2_5">
		<br>
		Formulario de inscripción: <input type="checkbox" name="formularioInscripcion" id="formularioInscripcion">
		<br>
		Hoja de inscripción: <input type="checkbox" name="hojaIncripcion" id="hojaInscripcion">
		<br>
		Fotocapia de carnet: <input type="checkbox" name="fotocopiaCarnet" id="fotocopiaCarnet">
		<br>
		Diploma académico: <input type="checkbox" name="diplomaAcademico" id="diplomaAcademico">
		<br>
		Titulo en provición nacional: <input type="checkbox" name="tituloAcademico" id="tituloAcademico">
		<br>
		Carta de inscripción: <input type="checkbox" name="cartaInscripcion" id="cartaInscripcion">
		<br>
		Hoja de vida: <input type="checkbox" name="hojaDeVida" id="hojaDeVida">
		<br>
		Observacones: <br><textarea id="observaciones"  name="observaciones" rows="4" cols="50"> </textarea>			
		<br>
		<input type="submit" value="Siguiente">
	</form>
</div>