<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_empresa extends CI_Model {

    public function getDados($codEmpresa){
        return $this->db->select("e.*, c.descricao as cidade, est.UF")
                ->from("empresa e")
                ->join("cidade c", "c.codCidade = e.codCidade")
                ->join("estado est", "est.codEstado = c.codEstado")
                ->where("codEmpresa",$codEmpresa)
                ->get();
    }
     
    public function Inserir($parametros){
        return $this->db->insert("empresa", $parametros);
    }
        
}