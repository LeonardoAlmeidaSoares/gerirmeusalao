<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_lembrete extends CI_Model {

    public function getLembretes($codEmpresa) {
        return $this->db->get("lembrete", array(
            "codEmpresa" => $codEmpresa,
            "dataLeitura = TODAY()" => null,
            "status" => 0
        ));
    }
    
    public function getLembretesUsuario($codCOlaborador) {
        return $this->db->get("lembrete", array(
            "codEmpresa" => $codEmpresa,
            "dataLeitura = TODAY()" => null,
            "status" => 0
        ));
    }
    
}
