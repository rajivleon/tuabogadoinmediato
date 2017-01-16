<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author RLEON
 */
class Admin extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        session_start();
        $this->load->helper(['url_helper','form','security']);
        $this->load->library(['form_validation','table']);
    }
    
    public function acceso(){
        $this->load->model('usuario_model','usu');
        if($this->usu->usuarioValido($this->input->post())){
            redirect('articulo');
        }        
    }
    
    public function cerrar(){
        unset($_SESSION['login']);
        session_destroy();
        redirect('inicio');
    }
}
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
