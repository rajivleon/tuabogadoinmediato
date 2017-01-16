<?php if (!defined('BASEPATH')) exit('No se permite el acceso directo al script');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Articulo
 *
 * @author RLEON
 */
class Articulo extends CI_Controller {
    
    public function __construct() {
        parent::__construct(); 
        session_start();
        $this->load->helper(['url_helper','form','security']);
        $this->load->library(['form_validation','table']);
        $this->load->model('articulo_model','art');
        if(!isset($_SESSION['login'])){
             redirect('inicio');
        }
    }
    
    
    public function index(){
        $this->form_validation->set_rules('titulo', 'Título', 'required|min_length[5]|max_length[140]|trim');  
        $this->form_validation->set_rules('articulo','Artículo','required|min_length[3]|max_length[140]|trim');        
        $this->form_validation->set_rules('texto', 'Texto', 'required|min_length[3]|trim');        
        
        if($this->form_validation->run()){
            if(!empty($this->input->post('id'))){
                $this->art->updateArticulo($this->input->post());
            }else {
                $this->art->newArticulo($this->input->post());
            }
          redirect('articulo', 'refresh');
        }
        
        $data['title'] = 'Modulo de Usuarios';
        $articulo['lista'] = $this->art->listaArticulo();
        $data['cuerpo'] = $this->load->view('articulo/inicio',$articulo,true);
        $header['admilteCss'] = ['/plugins/iCheck/all.css','/plugins/datatables/dataTables.bootstrap.css'];
        $header['barraSup']= $this->load->view('seguridad/barrasuperior',null,TRUE);
        
        $this->load->view('plantillas/header',$header);
        $this->load->view('plantillas/content',$data);
        $foot['admilteJs'] = ['/plugins/iCheck/icheck.min.js','/plugins/datatables/jquery.dataTables.min.js'];
        $foot['pagina']= 'usuario';
        $this->load->view('plantillas/footer',$foot);
    } 

    public function eliminar(){
        if($this->art->deleteArticulo($this->input->post('id')))
            redirect('articulo', 'refresh');
    }
    
    public function datosArticulo(){
        echo json_encode($this->art->articulo($this->input->post('id')));
    }
}
/* End of file Articulo.php */
/* Location: ./application/controllers/Articulo.php */