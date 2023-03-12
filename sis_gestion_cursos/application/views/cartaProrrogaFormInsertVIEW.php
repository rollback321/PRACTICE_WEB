<h2>Carta de prorroga</h2>

<?php

$id_prog="";
$nombreProg="";
$version="";
$sede="";

$id_part="";
$nombrePart="";
$apellidoP="";
$apellidoM="";
$ci="";

$id_doc="";

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
//obteniendo id_doc
$id_doc= $_GET['id_doc'];

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
	
	<form action="../CcartaProrroga/registrar?id_doc=<?= $id_doc?>&id_part=<?= $id_part ?>&id_prog=<?= $id_prog  ?>" method="POST">
		<input type="hidden" name="id_doc" id="id_doc" value="<?= $id_doc ?>">
		<br>
		Prorroga para el diploma academico: <input type="checkbox" name="paraDiplomaAcademico" id="paraDiplomaAcademico">
		<br>
		Prorroga para titulo en provicion nacional<input type="checkbox" name="paraTituloAcademico" id="paraTituloAcademico">
		<br>
		Observacones: <br><textarea id="observaciones"  name="observaciones" rows="4" cols="50"> </textarea>			
		<br>
		<input type="submit" value="Siguiente">
	</form>
</div>