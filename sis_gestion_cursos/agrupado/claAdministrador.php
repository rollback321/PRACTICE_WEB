<?php
class administrador {

    private $nombre ;
    private $apellido;
    private $celular;
    private $ci;
    private $usuario;
    private $password;

    function correr ($jugar){
    echo "desde la clase administrador".$jugar;

    }
}
$adm = new administrador ();
?>

