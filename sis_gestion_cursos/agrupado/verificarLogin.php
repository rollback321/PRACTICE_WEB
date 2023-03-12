<?php
include "claIniciarSesion.php";


$usuario= $_POST['usuario'];
$password = $_POST['password'];

$obj= new IniciarSesion($usuario,$password);
$obj->verificarUsuario($usuario,$password);

?>