<?php
$estadoCheck = "checked";
?>

<h3>Registrar administrador</h3>
<div class="col-sm-4-mx-auto">	
<form action="../Cadministrador/registrar" method="POST">


	Nombre:<input type="text" name="nombre" id="nombre" value ="">
<br>
    Apellidos: <input type="text" name="apellidos" id="apellidos" value ="">
<br>
	C.I:<input type="text" name="ci" id="ci" value="">
    <br>
	Celular:<input type="text" name="celular" id="celular" value="">
<br>
    Usuario:<input type="text" name="usuario" id="usuario" value="">
<br>
    Contraseña:<input type="password" name="pass" id ="pass" value="">
<br>
    Acceso al sistema: <input type="checkbox" name="acceso" <?= $estadoCheck ?> id="acceso" value="on">
<br>
    <input type="submit" name="Registrar" value= "Registrar">
</form>
</div>