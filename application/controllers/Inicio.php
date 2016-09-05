<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inicio
 *
 * @author rajiv
 */
class Inicio extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
         $this->load->helper('url');
         $this->load->library('validaciones');
    }
    
    public function index($page = 'index') {
        $this->validaciones->existePagina('inicio/'.$page);
        $content['articulos'] = null;
        $data['cuerpo'] = $this->load->view('inicio/contenidoInicio',$content,true);
        $header['barraSup']= $this->load->view('inicio/barrasuperior',null,TRUE);
        $this->load->view('plantillas/header',$header);
        $this->load->view('plantillas/content',$data);
        $this->load->view('inicio/modalVentana');
        $foot['pagina']= 'inicio';
        $this->load->view('plantillas/footer',$foot);
    }    
    
    public function email() {
        $this->load->library('email');
        $config['useragent'] = "CodeIgniter";
        $config['mailpath'] = "/usr/bin/sendmail";
        $config['protocol'] = "smtp";
        $config['smtp_host']= "localhost";
        $config['smtp_port']= "25";
        $config['mailtype'] = 'html';
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $config['wordwrap'] = TRUE;  
            
        $data['titulo']= $this->input->post('titulo');
        $data['nombre']= $this->input->post('nombre');
        $data['residencia']= $this->input->post('residencia');
        $data['email']= $this->input->post('from');
        $data['fecnac']= $this->input->post('fecnaci');
        $data['telefono']= $this->input->post('telefono');
        $data['mensaje']= $this->input->post('mensaje');
        
        $this->correoInteno($data,$config);
        $this->correoResp($data,$config);
        
        redirect('inicio/', 'refresh');
    }
    
    private function correoInteno($data,$config){        
        $this->email->initialize($config);
        $this->email->clear(TRUE);
        $this->email->from($data['email'],$data['nombre']);
        $this->email->to('rajiv.leon@tsj.gob.ve');
        $this->email->subject('Nuevo '.$data['titulo']);
        $this->email->message($this->load->view('inicio/correoInt',$data,true));
        $this->email->send();
    }
    
    private function correoResp($data,$config) {        
        $this->email->initialize($config);
        $this->email->clear(TRUE);
        $this->email->from('rajiv.leon@gmail.com','tuabogadoinmediato.com');
        $this->email->to($data['email']);
        $this->email->subject('Hemos Recibido tu solititud de '.$data['titulo']);
        $this->load->view('inicio/correoRes',$data,true);
        $this->email->message($this->load->view('inicio/correoRes',$data,true));
        $this->email->send();    
    }
}
