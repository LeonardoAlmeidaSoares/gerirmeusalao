<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * recebendo a data de nascimento, calcula a idade
 *
 * @author Leo
 */
if (!function_exists('getIdade')) {

    function getIdade($nasc) {
        
        $date = strtotime($nasc);
        // Descobre que dia é hoje e retorna a unix timestamp
        $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        // Descobre a unix timestamp da data de nascimento do fulano
        $nascimento = mktime(0, 0, 0, intval(date("M", $date)), intval(date("D", $date)), intval(date("Y", $date)));
        return floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
            
    }

}

if (!function_exists('dataENGtoPTBR')) {

    function dataENGtoPTBR($data) {
         
        $hora = "";
        //return strpos($data, " "); ;
        if(strpos($data, " ") > 0){
            $hora = substr($data, 11);
            $data = substr($data, 0, 10);
        }
        
        $dia = implode("-", array_reverse(explode("/", $data)));
        return $dia . " " . $hora;
            
    }

}