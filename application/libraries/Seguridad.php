<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
class Seguridad {
    
    public static function generarClave($tamano = NULL) {
        $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cadena_especial = "!#$%/()=*-+@.";

        $pos = rand(0, strlen($cadena_especial) - 1);
        $caracterEspecial = substr($cadena_especial, $pos, 1);


        $longitudCadena = strlen($cadena);
        $pass = "";
        if (is_null($tamano)) {
            $longitudPass = 10;
        } else {
            $longitudPass = $tamano;
        }

        for ($i = 1; $i <= $longitudPass; $i++) {
            $pos = rand(0, $longitudCadena - 1);
            $pass .= substr($cadena, $pos, 1);
        }
        return $caracterEspecial . $pass;
    }
    
}
