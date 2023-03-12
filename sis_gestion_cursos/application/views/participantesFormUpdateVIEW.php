

<?php
//LISTAR LOS DATOS DEL PROGRAMA
$idPrograma="";

 if ($datosPrograma!=FALSE){
    foreach($datosPrograma->result() as $row){

       $idPrograma=$row->id_prog; 
       echo "<h3>Para: ".$row->nombre."
             <br>Version:".$row->version."
             <br>Sede:".$row->sede."</h3>"; 
    }

}else{
   
}
//LISTAR LOS DATOS DEL PARTICIPANTE
$id_part="";
$nombre="";
$apellidoM="";
$apellidoP="";
$ci="";
$nCelular1="";
$nCelular2="";
$correo="";
$dtoResidencia="";
if ($datos!=FALSE){
    foreach($datos->result() as $row){
        $id_part=$row->id_part;
        $nombre=$row->nombre;
        $apellidoM= $row->apellidoM;
        $apellidoP=$row->apellidoP;
        $ci=$row->ci;
        $nCelular1=$row->nCelular1;
        $nCelular2=$row->nCelular2;
        $correo=$row->correo;
        $dtoResidencia=$row->dtoResidencia;
    }

}else{
   
}
?>

<div>
<form action="../../modificarRegistro" method="POST">
<input type="hidden" name="id_prog" id="id_prog" value="<?= $idPrograma ?>">
<input type="hidden" name="id_part" id="id_part" value="<?= $id_part ?>">
Nombre: <input type="text" name="nombre" id="nombre" required value="<?=$nombre ?>">
<br>
Apellido paterno: <input type="text" name="apellidoP" id="apellidoP" value="<?=$apellidoP?>">
<br>
Apellido materno: <input type="text" name ="apellidoM" id="apellidoM"  value ="<?=$apellidoM ?>">
<br>
C.I. : <input type="text" name="ci" id="ci" required value="<?= $ci?>">
<br>
Numero de celular: <input type="text" name="nCelular1" id ="nCelular1" value= "<?= $nCelular1?>" >
<br>
Numero de celular: <input type="text" name ="nCelular2" id="nCelular2" value ="<?= $nCelular2 ?>">
<br>
Correo: <input type="email" name ="correo" id="correo" value ="<?= $correo?>">
<br>
Departamento de residencia: <input type="text" name ="dtoResidencia" id="dtaResidencia" value="<?= $dtoResidencia?>">
<br>
<input type="submit" value="Modificar" name="Modificar">
</form>

</div>