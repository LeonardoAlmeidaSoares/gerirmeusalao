<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_lembrete extends CI_Model {
    public function getLembretes($codEmpresa) {
        return $this->db->get_where("lembrete", array(
            "codEmpresa" => $codEmpresa,
            "dataLeitura=CURDATE()" => null ,
        ));
    }
    
    public function getLembretesUsuario($codCOlaborador) {
        return $this->db->get("lembrete", array(
            "codEmpresa" => $codEmpresa,
            "dataLeitura<=" => "CURDATE()",
        ));
    }
    public function getLembrete($cod){
       return $this->db->get_where("lembrete", array("codLembrete" => $cod));
   }
}