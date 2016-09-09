<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of seguridad
 *
 * @author rleon
 */
class Seguridad extends CI_Controller{
     
    public function __construct() {
        parent::__construct();
        $this->load->model('seguridad_model','sg');
    }
    
    public function validar() {
        $login = stripslashes(strip_tags(trim($this->input->post('login'))));
    }
    
    private function _activarSecion($login = null,$pass = null) {
        $this->load->library('session');
        $this->sg->setLogin($login);
        $this->sg->setPass($pass);
        if($this->sg->usuarioValido()){
            $sdata=array('id'=>$this->sg->getIdsession());
            $this->session->set_userdata($sdata);
            return TRUE;
        }
        return FALSE;
    }
    
    private function _usuarioexiste($param) {        
        return FALSE;
    }
}
