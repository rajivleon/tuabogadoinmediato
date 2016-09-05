<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario_model
 *
 * @author rleon
 */
class usuario_model extends CI_Model {
    
    private $db = null;
    private $id = null;
    private $login = null;
    private $pass = null;
    private $nombre = null;
    private $apellido = null;
    private $cedula = null;
    private $email = null;
    private $bloqueado = null;
    
    public function __construct() {
        parent::__construct();   
        $this->load->help('date');
        $this->db = $this->load->database('tuabogado',TRUE);
    }
    
    public function datosUsuario() {
        $this->db->from('usuario');
        $this->db->Where('login',$this->getLoginUsuario());
        $query = $this->db->get();
        if($query->num_row()>0){
            return $query->result_array();
        }        
        return NULL;
    }
    
    public function insertUsuario(){
        $this->load->library('encrypt');
        $this->nuevaClave();
        $query = array('login'=>  $this->getLoginUsuario(),'password'=>  $this->encrypt->encode($this->getPassUsuario()),'nombre'=>  $this->getNombreUsuario(),'apellido'=>  $this->getApellidoUsuario(),'cedula'=>  $this->getCedulaUsuario(),'email'=>  $this->getEmailUsuario());
        $this->db->insert('usuario',$query);    
    }
    
    public function modificarUsuario(){
        $this->load->library('encrypt');
        
        if(!empty($this->getNombreUsuario())){
            $data['nombre']=  $this->getNombreUsuario();
        }
        if(!empty($this->getApellidoUsuario())){
            $data['apellido']=  $this->getApellidoUsuario();
        }
        
        if(!empty($this->getCedulaUsuario())){
            $data['cedula']=  $this->getCedulaUsuario();
        }
        
        if(!empty($this->getPassUsuario())){
            $data['password']=  $this->encrypt->encode($this->getPassUsuario());
        }
        
        if(!empty($this->getEmailUsuario())){
            $data['email']=  $this->getEmailUsuario();
        }
        
        if(!empty($this->getBloqueado())){
            $data['bloqueado']=  $this->getBloqueado();
        }
        
        $this->db->update('usuario',$data);
        
    }
    
    public function resetearPass(){
        $this->load->library('encrypt');
        $this->nuevaClave();
        $data = array('password',$this->encrypt->encode($this->getPassUsuario()));
        $this->db->update('usuario',$data);
    }

    private function nuevaClave(){
        $this->load->library('seguridad');
        $this->pass = $this->seguridad->generarClave(20);
        //$this->pass = seguridad::generarClave(20);
    }
    
    public function buscarUsario() {
        $this->db->from('usuario');
        $this->db->where('cedula',  $this->getCedulaUsuario());
        $this->db->or_where('email', $this->getEmailUsuario());
        $this->db->or_where('login',  $this->getLoginUsuario());
        $query = $this->db->get();
        if($query->num_rows()>0){
            return TRUE;
        }
        return FALSE;
    }

    public function setIdUsuario($param=null) {
        $this->id = $param;
    }
    
    public function getIdUsuario(){
        return $this->id;
    }
    
    public function setLoginUsuario($param = null){
        $this->login = stripslashes(strip_tags(trim($param)));
    }
    
    public function getLoginUsuario() {
        return $this->login;
    }

    public function setPassUsuario($param = null) {
        $this->load->library('encrypt');
        $this->pass = $this->encrypt->encode($param);
    }
    
    public function getPassUsuario() {
        return $this->pass;
    }

    public function setNombreUsuario($param=null) {
        $this->nombre = $param;
    }
    
    public function getNombreUsuario() {
        return $this->nombre;
    }
    
    public function setApellidoUsuario($param=null) {
        $this->apellido = $param;
    }
    
    public function getApellidoUsuario() {
        return $this->apellido;
    }
    
    public function setCedulaUsuario($param = null){
        $this->cedula = $param;
    }
    
    public function getCedulaUsuario() {
        return $this->cedula;
    }
    
    public function setEmailUsuario($param=null) {
        $this->email = $param;
    }
    
    public function getEmailUsuario() {
        return $this->email;
    }
    
    public function setBloqueado($param = null) {
        $this->bloqueado = $param;
    }
    
    public function getBloqueado() {
        return $this->bloqueado;
    }
}
