<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_cargos extends CI_Model {

    public function getCargos() {
        return $this->db->get("cargo");
    }

}
