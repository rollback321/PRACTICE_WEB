<?php

$id_part="";
$nombrePart="";
$apellidoP="";
$apellidoM="";
$ci="";

$id_prog="";
$nombreProg="";
$version="";

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

foreach($enlaces->result() as $row){
   $id_part=$row->id_part;
	$nombrePart = $row->nombre;
	$apellidoP = $row->apellidoP;
	$apellidoM = $row->apellidoM;
	$ci = $row->ci;

   $id_prog=$row->id_prog;
   $nombreProg = $row->programa;
    $version = $row->version;
    
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

?>
<h3>Documentacion </h3>
<div>
	<h4>Programa: <?= $nombreProg ?> <br>
        Version: <?= $version?>      <br>
    </h4>
	<h3>Registro de documentacion para:</h3>
	<h4>Participante: <?= $nombrePart ?> <?= $apellidoP ?> <?= $apellidoM ?> <br>
        C.I. : <?= $ci ?> </h4>
</div>

<div>

<table border=1>

<tr>
   <td>Folder :</td>
   <td><?= $folder ?></td> 
</tr>
<tr>
   <td>Foto 4x4 :</td>
   <td><?= $foto4x4 ?></td> 
</tr>
<tr>
   <td>Foto 2.5 x 2.5 :</td>
   <td><?= $foto2_5x2_5 ?></td> 
</tr>
<tr>
   <td>Formulario de inscripción :</td>
   <td><?= $formularioInscripcion ?></td> 
</tr>
<tr>
   <td>Hoja de inscripción :</td>
   <td><?= $hojaInscripcion ?></td> 
</tr>
<tr>
   <td>Fotocopia de carnet :</td>
   <td> <?= $fotocopiaCarnet ?></td> 
</tr>
<tr>
   <td>Diploma académico :</td>
   <td><?= $diplomaAcademico ?></td> 
</tr>
<tr>
   <td>Titulo en provisión nacional :</td>
   <td><?= $tituloAcademico ?></td> 
</tr>
<tr>
   <td>Carta de inscripcion :</td>
   <td><?= $cartaInscripcion ?></td> 
</tr>
<tr>
   <td>Hoja de vida :</td>
   <td><?= $hojaDeVida ?></td> 
</tr>
<tr>
   <td>Observaciones :</td>
   <td> <?= $Observaciones ?></td> 
</tr>
</table>
<a href="../Cparticipantes/seeligioprograma/<?= $id_prog ?>">Atras</a><br>
<a href="../Cdocumentos/obteniendoDatosUpdate?id_doc=<?= $id_doc ?>&id_part=<?= $id_part ?>&id_prog=<?= $id_prog ?>">Modificar            </a>|
<a href="">Ver carta de prorroga</a><br>
<a href="../Cboletas/listar?id_doc=<?= $id_doc ?>&id_part=<?= $id_part ?>&id_prog=<?= $id_prog ?> " >Ver boletas</a><br>
<a href="" ></a><br>
</div>