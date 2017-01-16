<?php if (!defined('BASEPATH')) exit('No se permite el acceso directo al script');

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
    
    public function __construct() {
        parent::__construct(); 
        session_start();
        $this->load->helper(['url_helper','form','security']);
        $this->load->library(['form_validation','table']);
        $this->load->model('usuario_model','usu');
        if(!isset($_SESSION['login'])){
             redirect('inicio');
        }
    }
    
  public function index(){    
        $this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[90]|trim');  
        $this->form_validation->set_rules('nombre','Nombre','required|min_length[3]|max_length[45]|trim');        
        $this->form_validation->set_rules('apellido', 'Apellido', 'required|min_length[3]|max_length[45]|trim');
        $this->form_validation->set_rules('cedula','Cédula','required|numeric|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|min_length[20]|max_length[125]|trim');         
        
        if($this->form_validation->run()){
            if(!empty($this->input->post('id'))){
                $this->usu->updateUser($this->input->post());
            }else {
                $this->usu->new_user($this->input->post());
            }
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
        if($this->usu->deleteUser($this->input->post('id')))
            redirect('usuario', 'refresh');
    }
    
    public function resetarPassword() {
        if($this->usu->resetearPass($this->input->post('id')))
             redirect('usuario', 'refresh');
    }
    
    public function datosUsuario(){
        echo json_encode($this->usu->usuario($this->input->post('id')));
    }
    
    public function cambioPass(){
        if($this->usu->cambiarPass($this->input->post('password')))
             redirect('usuario', 'refresh');
    }
}
/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */