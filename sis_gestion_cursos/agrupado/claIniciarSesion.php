<?php


class IniciarSesion{
 private $usuario = "";
 private $contraseña="";

function __construct($usuario, $contraseña){
       $this->$usuario=$usuario;
       $this->$contraseña=$contraseña;
}

function verificarUsuario($usuario, $contraseña){
    
  require_once 'conexion.php';


    $sql = "SELECT * FROM administrador WHERE usuario='".sha1($usuario)."' and password ='".md5($contraseña)."'";

    $estado = $conn->query($sql);
    if (mysqli_num_rows($estado)>0){

        while ($fila =  $estado->fetch_array()) {
            $recibo_invent[] = $fila;
        }
        foreach ($recibo_invent as $item){
            $user=$item['nombre'];
            $apellido=$item ['apellidos'];
        }
        echo "Existe--".$user." ".$apellido;
    } else {
        header ("Location: ventanaLogin.php");
    }
    
    mysqli_close($conn);
}

}

?>