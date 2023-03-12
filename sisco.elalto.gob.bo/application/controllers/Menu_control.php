<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_control extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $enable = $this->session->userdata('usu_rol_estado');
        if ($enable === '0')
            redirect('/Welcome', 'refresh');
    }
    public function index()
    {

       
            switch ($this->session->userdata('rol_nombre')) {
                case $this->session->userdata('rol_nombre') == 'VENTANILLA UNICA':
                    redirect('/VentanillaUnicaControl/', 'refresh');
                    break;
                case $this->session->userdata('rol_nombre') == 'VENTANILLA RECAUDACIONES':
                    redirect('/VentanillaUnicaRecaudacionesControl/', 'refresh');
                    break;
                case $this->session->userdata('rol_nombre') == 'RECEPCIONISTA':
                    redirect('/SecretaryControl/', 'refresh');
                    break;
                case $this->session->userdata('rol_nombre') == 'TECNICO':
                    redirect('/TechnicalControl/', 'refresh');
                    break;
                case $this->session->userdata('rol_nombre') == 'JEFE':
                    redirect('/JefeControl/', 'refresh');
                    break;
                case $this->session->userdata('rol_nombre') == 'ADMINISTRADOR':
                    redirect('/AdministratorControl/', 'refresh');
                    break;
                case $this->session->userdata('rol_nombre') == 'ALCALDE':
                    redirect('/AlcaldesaControl/', 'refresh');
                    break;
                case $this->session->userdata('rol_nombre') == 'VENTANA_TOUCH':
                    redirect('/VentanaTouch/', 'refresh');
                    break;
                case $this->session->userdata('rol_nombre') == 'SECRETARIA GESTION':
                    redirect('/SecretaryGestionControl/', 'refresh');
                    break;
                case $this->session->userdata('rol_nombre') == 'VENTANILLA INTERNA':
                    redirect('/VentanillaInternaControlSMGI/', 'refresh');
                    break;
    
                default:
                    redirect('/Welcome', 'refresh');
                    break;
        }
    }
}
