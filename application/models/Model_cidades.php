<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_cidades extends CI_Model {

    public function getCidades($codEstado = 0){
        return ($codEstado > 0)
        ? $this->db->get_where("cidade", array("codEstado" => $codEstado))
        : $this->db->get("cidade"); 
    }
     
    public function getCidadesDoMesmoEstado($codCidade = 0){
        $ret = $this->db->get_where("cidade", array("codCidade" => $codCidade));
        return $this->db->get_where("cidade", array("codEstado" => $ret->row(0)->codEstado));
    }
        
}