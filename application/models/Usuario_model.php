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
class Usuario_model extends CI_Model {
    
    private $db = null;
    
    public function __construct() {
        parent::__construct();   
        $this->load->helper('date');
        $this->db = $this->load->database('default',TRUE);
    }
    
    public function datosUsuario() {
        $this->db->from('usuario');
        $this->db->Where($this->input->post());
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function save() {
        $this->load->library('encrypt');
        $post = $this->input->post();
        unset($post['registrar']);
        if(!empty($post['id'])){   
            $this->db->where('id',$post['id']);
            return $this->db->update('usuario', $post);
        }        
        $post['password'] = $this->encrypt->encode(self::nuevaClave());
       return $this->db->insert('usuario', $post);
    }
    
    public function delete(){
        $this->db->where($this->input->post());
        return $this->db->delete('usuario');
    }

     public function listaUsuarios(){
        $this->db->from('usuario');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function resetearPass(){
        $this->load->library('encrypt');        
        $data = ['password'=>$this->encrypt->encode(self::nuevaClave())];
        $this->db->where($this->input->post());
        $this->db->update('usuario',$data);
    }

    private function nuevaClave(){
        $this->load->library('Seguridad'); 
        return $this->seguridad->generarClave(20);
    }    
}

