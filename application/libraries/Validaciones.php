<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validaciones
 *
 * @author rajiv
 */
class Validaciones {
    
    public function existePagina($page = NULL) {
        if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
        {
            show_404();            
        }
    }   
        
}
