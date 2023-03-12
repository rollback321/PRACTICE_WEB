<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuarios;

class Login extends Controller{


    /*Incorpora la interfaz principal del 
    login para iniciar sesion*/ 
public function index (){
    return view ('login');
}
    /* Verifica si el usuario y contraseña son correctos 
    caso true: redirecciona al menu del administrador(dasboart) 
    caso false: redirecciona al login  */
public function verificar_datos ()
{
    $usuario = $this->request->getPost('usuario');
    $password = $this->request->getPost('password');

    $data = [
        'usuario' => $usuario
    ];
    $usuario = new Usuarios();
    $result = $usuario->obtener_usuarios($data);
    
    if(count($result) > 0 && password_verify( $password , $result[0]['password']) ){
        $data = [
            'usuario' => $result[0]['usuario'],
            'rol' => $result[0]['rol']
        ];
        $session = session();
        $session->set($data);

        return redirect()->to(base_url('index'))->with('mensaje' , '1');
    } else {
        return redirect()->to(base_url('/'))->with('mensaje' , '0');
    }
  
}
/**  permite instanciar la vista del menu el administrador(dasboart)*/
public function iniciar_sesion (){
    return view ('index');
}

/* Cerrar sesion */
public function salir (){
    $sesion = session();
    $sesion->destroy();
    return redirect()->to(base_url('/'));
}


}