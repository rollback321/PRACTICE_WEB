<?php


$host ='localhost';
$user = 'root';
$pass = '';
$bd = 'sistemadegestiondecursos';

$conn = new mysqli($host,$user,$pass,$bd);
if ($conn->connect_errno > 0) {
	die('ERROR DE CONEXION' .$conn->connect_error);
}
 ?>



