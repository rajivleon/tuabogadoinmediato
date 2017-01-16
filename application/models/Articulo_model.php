<?php  if (!defined('BASEPATH')) exit('No se permite el acceso directo al script');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Articulo_model
 *
 * @author RLEON
 */
class Articulo_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('tuabogado', TRUE);
    }
    
    public function newArticulo($var = []){
        array_splice($var,count($var)-1);
        $var['usuario_id']=2;
        if(!$this->existeArticulo($var)){
            if($this->db->insert('articulo',$var))
                return true;
        }
    }
    
    public function updateArticulo($var = []){
        array_splice($var,count($var)-1);
        if(empty($var['publicar'])){
            $var['publicar'] = false;
        }else{
              $var['publicar'] = true;
        }
        $var['usuario_id']=2;
        $this->db->where('id',$var['id']);
        if($this->db->update('articulo',$var))
                return true;
    }
    
    public function deleteArticulo($var=0){
        $this->db->where('id',$var);
        if($this->db->delete('articulo'))
           return true;   
    }

    public function listaArticulo(){
        $this->db->select('articulo.id,titulo,articulo,texto,fechahora,publicar,login');
        $this->db->join('usuario','usuario.id=articulo.usuario_id');
        $query = $this->db->get('articulo');
        if($query->num_rows()>0)
           return $query->result();
    }
    
    private function existeArticulo($var=[]){
        $buscar['articulo'] = $var['articulo'];
        $buscar['texto'] = $var['texto'];
        $this->db->or_where($buscar);
        $query = $this->db->get('articulo');
        if($query->num_rows()>0){
            return true;
        }
    }
    
    public function articulo($id=null){
        $user = $this->db->get_where('articulo',['id'=>$id]);
        if($user->num_rows()>0)
            return $user->result();
    }
}
/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */