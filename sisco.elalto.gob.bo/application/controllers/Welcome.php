<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login/ModelLogin');       
    }

    public function index(){
        $this->load->view('login/login_register');
    }
    public function goApplicationUser()
    {
        $hab_nombreusuario= strip_tags(trim($this->input->post('name')));
        $hab_password = strip_tags(trim($this->input->post('pass')));
		if(!empty($hab_nombreusuario) or !empty($hab_password))
        {
            if ($this->ModelLogin->login_user($hab_nombreusuario,$hab_password))
            {
                $result= $this->ModelLogin->data_user($hab_nombreusuario, $hab_password);
                $this->session->set_userdata($result);
                echo 'Login Correcto';
            }
            else
            {
                echo '<b style="color: red;">Nombre de Usuario</b> y/o <b style="color: red;">Contraseña</b> Incorrectos';
            }
        }
        else
        {
            echo 'Introduzca <b>Nombre de Usuario</b> y/o <b>Contraseña</b>';
        }
    }
    public function close_session()
    {
        $this->session->sess_destroy();
        redirect('/Welcome','refresh');
       
    }
   
}
