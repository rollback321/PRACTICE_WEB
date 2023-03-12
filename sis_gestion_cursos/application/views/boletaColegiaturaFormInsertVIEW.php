<?php
$id_prog="";
$nombreProg="";
$version="";
$sede="";

$id_doc="";

$id_part="";
$nombrePart="";
$apellidoP="";
$apellidoM="";
$ci="";

if (isset($_GET['id_doc'])){
$id_doc=$_GET['id_doc'];
$id_prog = $_GET['id_prog'];
$id_part=$_GET['id_part'];
}

$sql =  "SELECT *
FROM participantes  
WHERE id_part=".$id_part;
$query = $this->db->query($sql);

//obteniendo datos del participante
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
?>



<h3>Registro de datos para la boleta de colegiatura</h3>

<div>
    <h4>Programa: <?= $nombreProg ?> <br>
        Version: <?= $version?>      <br>
	    Sede: <?= $sede ?></h4>
	<h4>Participante: <?= $nombrePart ?> <?= $apellidoP ?> <?= $apellidoM ?> <br>
        C.I. : <?= $ci ?> </h4>
</div>

<div class="col-sm-4-mx-auto">	
<form action="../CboletaColegiatura/insertarRegistro?id_prog=<?= $id_prog ?>" method="POST">

	<input type="hidden" name="id_doc" id="id_doc" value="<?= $id_doc ?>">
<br>
	Nro. de deposito:<input type="text" name="nroDeposito" id="nroDeposito" value ="">
<br>
	Fecha de deposito:<input type="date" name="fechaDeposito" id="fechaDeposito" value="">
<br>
	Monto de deposito:<input type="text" name="montoDeposito" value="">
<br>
	Fotocopia de boleta:<input type="checkbox" name="fotocopiaBoleta" id="fotocopiaBoleta" value="SI">
<br>
	Boleta original:<input type="checkbox" name="boletaOriginal" id="boletaOriginal" value="SI">
<br>
	Observaciones:<input type="text" name="observaciones" id="observaciones">
<br>
	<input type="submit" name="Registrar" value= "Registrar">
</form>
</div>