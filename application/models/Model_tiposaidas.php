<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_tiposaidas extends CI_Model {

    public function getTipoSaidas($codEmpresa) {
        return $this->db->get_where("categoriasaida", array('codEmpresa' => $codEmpresa));
    }

}
