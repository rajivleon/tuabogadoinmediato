<?php  if (!defined('BASEPATH')) exit('No se permite el acceso directo al script');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario_model
 *
 * @author RLEON
 */
class Usuario_model extends CI_Model {
    
    private $login = null;
    private $pass = null;
    
     public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('tuabogado', TRUE);
    }
    
    public function new_user($var = []){
        array_splice($var,count($var)-1);
        $var['password'] = password_hash($var['login'],PASSWORD_DEFAULT);
        if(!$this->existeUser($var)){
            if($this->db->insert('usuario',$var))
                return true;
        }
    }
    
    public function updateUser($var = []){
        array_splice($var,count($var)-1);
        if(empty($var['bloqueado'])){
            $var['bloqueado'] = false;
        }
        $this->db->where('id',$var['id']);
        if($this->db->update('usuario',$var))
                return true;
    }
    
    public function deleteUser($var=0){
        $this->db->where('id',$var);
        if($this->db->delete('usuario'))
           return true;   
    }

    public function listaUsuarios(){
       $query = $this->db->get('usuario');
       if($query->num_rows()>0)
           return $query->result();
    }
    
    public function resetearPass($var=0){
        $user = $this->usuario($var)[0];
        $pass['password'] = password_hash($user->login,PASSWORD_DEFAULT);
        $this->db->where('id',$var);
        if($this->db->update('usuario',$pass))
           return true;
    }
    
    public function cambiarPass($var = null){
        $pass['password'] = password_hash($var,PASSWORD_DEFAULT);
        $this->db->where('login',$_SESSION['login']);
         if($this->db->update('usuario',$pass))
           return true;
    }

    private function existeUser($var=[]){
        $buscar['login'] = $var['login'];
        $buscar['cedula'] = $var['cedula'];
        $this->db->or_where($buscar);
        $query = $this->db->get('usuario');
        if($query->num_rows()>0){
            return true;
        }
    }

    public function usuario($id=null){
        $user = $this->db->get_where('usuario',['id'=>$id]);
        if($user->num_rows()>0)
            return $user->result();
    }
    
    private function validatioLogin(){
        $user = $this->db->get_where('usuario',['login'=> $this->getLogin()]);
        if($user->num_rows()>0){
            $usuario = $user->result();
            if(password_verify($this->getPassword(),$usuario[0]->password)){
                $this->load->library('session');
                $this->session->set_userdata(['login'=> $this->getLogin()]);
                return true;
            }
        }               
    }
    
    private function setLogin($var = null){
        $this->login = strip_tags(stripslashes(trim($var)));
    }
    
    private function getLogin(){
        return $this->login;
    }
    
    private function setPassword($var = null){
        $this->pass = $var;
    }
    private function getPassword(){
        return $this->pass;
    }
    
    public function usuarioValido($var = []){
        $this->setLogin($var['login']);
        $this->setPassword($var['password']);
        return $this->validatioLogin();
    }
    
}
/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */