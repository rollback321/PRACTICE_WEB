<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VentanaTouch extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Touch');      
    }

    public function index(){
        $this->load->view('ventana_touch/ventana');
        $this->load->view('ventana_touch/js_ventana');
    }
   
   
}
