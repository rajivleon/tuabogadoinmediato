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
class Seguridad_model extends CI_Model{
    
    private $db = null;
    private $login = null;
    private $pass = null;
    private $idsession = null;  
    

    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
        $this->load->help('date');
        $this->db = $this->load->database('tuabogado',TRUE);
    }   
   

    public function setLogin($parma = NULL){
        $this->login = $parma;
    }
    
    private function getLogin(){
        return $this->login;
    }
    
    public function setPass($param = NULL) {
        $this->pass = $param;
    }
    
    private function getPass(){
        return $this->pass;
    }
    
    private function setIdSession($param = NULL){
        $this->idsession = $param;
    }
    
    public function getIdSession(){
        return $this->idsession;
    }

    public function existeUsuario(){
        $this->db->from('usuario');
        $this->db->where('login',  $this->getLogin());
        $query = $this->db->get();
        if($query->num_rows()=1){
            return TRUE;
        }
        return FALSE;
    }
    
    public function usuarioValido() {
        $this->db->from('usuario');
        $this->db->where(array('login'=>$this->getLogin(),'password'=>  $this->getPass()));
        $query = $this->db->get();
        if($query->num_rows()= 1){
            $this->_creaIdSession();
            return TRUE;
        }
        return FALSE;
    }
          
    private function _creaIdSession(){
        $cant = $this->db->count_all('session');
        $Idsession = mdate('%Y').mdate('%m').mdate('%d').mdate('%h').mdate('%i').$cant+1;
        $data = array('id'=>$Idsession,'login'=> $this->encrypt->encode($this->getLogin()),'fechaopen'=>mdate(),'ip'=>$_SERVER['REMOTE_ADDR']);
        if ($this->db->insert('session',$data)){
            $this->setIdSession($Idsession);
            return TRUE;
        };
        return FALSE;
    }
    
    public function cierraIdSession() {
        $data = array('fechahoraclose'=>mdate());
        $this->db->where('id',  $this->$this->getIdSession());
        return $this->db->update('session',$data);
    }  
}
