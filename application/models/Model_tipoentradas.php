<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_tipoentradas extends CI_Model {

    public function getTipoEntradas($codEmpresa) {
        return $this->db->get_where("categoriaentrada", array('codEmpresa' => $codEmpresa));
    }

}
