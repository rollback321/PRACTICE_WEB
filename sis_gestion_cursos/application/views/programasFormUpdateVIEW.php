<?php
$id_prog="";
$nombre="";
$version="";
$sede="";
$fecha_de_inicio="";
$duracion="";
 if ($datos!=FALSE){
    foreach($datos->result() as $row){
    $id_prog=$row->id_prog;
    $nombre=$row->nombre;
    $version=$row->version;
    $sede=$row->sede;
    $fecha_de_inicio=$row->fecha_de_inicio;
    $duracion=$row->duracion;
      
    }

}else{
   
}

?>
<div >
<h4>Programas</h4>
<form action="../modificarRegistro" method="POST">
       <input type="hidden" name="id_prog" id="id_prog" value="<?= $id_prog?>">
Nombre:<input type="text" name="nombre" id="nombre" value="<?= $nombre?>">
<br>
Version:<input type="text" name="version" id="version" value="<?= $version?>">
<br>
Sede:<input type="text" name="sede" id="sede" value="<?= $sede?>">
<br>
Fecha de inicio: <input type="date" name="fecha_de_inicio" id="fecha_de_inicio" value="<?= $fecha_de_inicio ?>">
<br>
Duracion: <input type="text" name="duracion"  id="duracion" value="<?= $duracion ?>">
<br>
<input type="submit" name="Registrar" value ="Modificar">
</form>
</div>


