<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_produtos extends CI_Model {

    public function getProdutos($codEmpresa) {
        return $this->db->get_where("produto", array("codEmpresa" => $codEmpresa));
    }
    
    public function getProduto($codProduto){
        return $this->db->get_where("produto", array("codProduto" => $codProduto));
    }
    
    public function Alterar($cod, $parametros){
        return $this->db->where("codProduto", $cod)->update("produto", $parametros);
    }
    
    public function Inserir($parametros){
        return $this->db->insert("produto", $parametros);
    }

    
}
