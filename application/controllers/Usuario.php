<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author RLEON
 */
class Usuario extends CI_Controller {
    
    function __construct() {
        parent::__construct(); 
        $this->load->helper(['url_helper','form','security']);
        $this->load->library(['form_validation','table']); 
        $this->load->model('usuario_model','usu');
        
    }
    
    public function index(){    
        $this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[90]|trim');  
        $this->form_validation->set_rules('nombre','Nombre','required|min_length[3]|max_length[45]|trim');        
        $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[45]|trim');
        $this->form_validation->set_rules('cedula','Cédula','required|numeric|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[20]|max_length[125]|trim');              
        
        if($this->form_validation->run()&&$this->usu->save()){           
            redirect('usuario', 'refresh');
        }
        
        $data['title'] = 'Modulo de Usuarios';
        $usuario['lista'] = $this->usu->listaUsuarios();
        $data['cuerpo'] = $this->load->view('usuario/inicio',$usuario,true);
        $header['admilteCss'] = ['/plugins/iCheck/all.css','/plugins/datatables/dataTables.bootstrap.css'];
        $header['barraSup']= $this->load->view('seguridad/barrasuperior',null,TRUE);
        
        $this->load->view('plantillas/header',$header);
        $this->load->view('plantillas/content',$data);
        $foot['admilteJs'] = ['/plugins/iCheck/icheck.min.js','/plugins/datatables/jquery.dataTables.min.js'];
        $foot['pagina']= 'usuario';
        $this->load->view('plantillas/footer',$foot);
        
    }
    
    public function eliminar(){    
        $this->usu->delete();
    }
    
    public function resetarPassword() {
        $this->usu->resetearPass();
    }
    
    public function datosUsuario(){
        echo json_encode($this->usu->datosUsuario());
    }
}
