
<?php
$nombrePart = "";
$apellidoP = "";
$apellidoM = "";
$ci = "";

$nombreProg = "";
$version = "";
$sede = "";
//obteniendo datos del participante
$sql = "SELECT * FROM participantes WHERE id_part = ? ";
$query = $this->db->query($sql,$_GET['id_part']);
foreach($query->result() as $row){
	$nombrePart = $row->nombre;
	$apellidoP = $row->apellidoP;
	$apellidoM = $row->apellidoM;
	$ci = $row->ci;}

//obteniendo datos del programa
$sql = "SELECT * FROM programas WHERE id_prog = ? ";
$query = $this->db->query($sql,$_GET['id_prog']);

foreach($query->result() as $row){
$nombreProg = $row->nombre;
$version = $row->version;
$sede = $row->sede;
}	
?>
<div>
    <h4>Programa: <?= $nombreProg ?> <br>
        Version: <?= $version?>      <br>
	    Sede: <?= $sede ?></h4>
	<h4>Participante: <?= $nombrePart ?> <?= $apellidoP ?> <?= $apellidoM ?> <br>
        C.I. : <?= $ci ?> </h4>
</div>

<br>
<h4>Colegiatura</h4>
<?php
foreach ($colegiatura->result() as $row){
?>
<br>
<div>
<table>

<tr>
    <td>Nro. de deposito:</td> <td><?= $row->nroDeposito ?></td>
</tr>
<tr>    
    <td>Fecha de deposito:</td> <td><?= $row->fechaDeposito ?></td>
</tr>
<tr> 
    <td>Monto:</td> <td> <?= $row->monto ?> </td>
</tr>
<tr>
    <td>Boleta original:</td> <td> <?= $row->boletaOriginal ?> </td>
</tr>
<tr>
    <td>Fotocopia de boletas:</td> <td> <?= $row->fotocopiaBoleta ?> </td>
</tr>
<tr>
    <td>observaciones:</td> <td> <?= $row->observaciones ?> </td>
</tr>
</table>
<a href="../CboletaColegiatura/modificar?id_doc=<?= $_GET['id_doc'] ?>&id_part=<?= $_GET['id_part'] ?>&id_prog=<?= $_GET['id_prog'] ?>&id_boletaCol=<?= $row->id_boletaCol ?>">Modificar  </a>||
    <a href="../CboletaColegiatura/eliminar"> Eliminar</a>
</div>

<?php  
}
?>
<br>
<h4>Matricula</h4>
<?php
foreach ($matricula->result() as $row){
?>
<br>
<div>
<table>

<tr>
    <td>Nro. de deposito:</td> <td><?= $row->nroDeposito ?></td>
</tr>
<tr>    
    <td>Fecha de deposito:</td> <td><?= $row->fechaDeposito ?></td>
</tr>
<tr> 
    <td>Monto:</td> <td> <?= $row->montoDeposito ?> </td>
</tr>
<tr>
    <td>Boleta original:</td> <td> <?= $row->boletaOriginal ?> </td>
</tr>
<tr>
    <td>Fotocopia de boletas:</td> <td> <?= $row->fotocopiaBoleta ?> </td>
</tr>
<tr>
    <td>observaciones:</td> <td> <?= $row->observaciones ?> </td>
</tr>
</table>
<a href="">Modificar  </a>||
    <a href=""> Eliminar</a>
</div>
<?php  
}
?>