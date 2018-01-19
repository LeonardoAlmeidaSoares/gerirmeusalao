<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_instituicao extends CI_Model {

    public function getInstituicao($codEmpresa) {
        return $this->db->get_where("empresa", array("codEmpresa"=>$codEmpresa));
    }
    
}
