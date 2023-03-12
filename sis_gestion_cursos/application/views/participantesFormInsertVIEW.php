

<?php

$idPrograma="";

 if ($datos!=FALSE){
    foreach($datos->result() as $row){

       $idPrograma=$row->id_prog; 
       echo "<h3>Para: ".$row->nombre."
             <br>Version:".$row->version."
             <br>Sede:".$row->sede."</h3>"; 
    }

}else{
   
}

?>

<div>
<form action="../participantesCLASS" method="POST">
<input type="hidden" name="idPrograma" id="idPrograma" value="<?= $idPrograma ?>">
Nombre: <input type="text" name="nombre" id="nombre" required>
<br>
Apellido paterno: <input type="text" name="apellidoP" id="apellidoP">
<br>
Apellido materno: <input type="text" name ="apellidoM" id="apellidoM">
<br>
C.I. : <input type="text" name="ci" id="ci" placeholder="Ejemplo: 14034654 LP" required  >
<br>
Numero de celular: <input type="text" name="nCelular1" id ="nCelular1">
<br>
Numero de celular: <input type="text" name ="nCelular2" id="nCelular2">
<br>
Correo: <input type="email" name ="correo" id="correo">
<br>
Departamento de residencia: <input type="text" name ="dtoResidencia" id="dtaResidencia">
<br>
<input type="submit" value="Registrar e ir documentos" name="Registrar">
</form>

</div>