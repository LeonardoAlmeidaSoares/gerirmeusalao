<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_servico extends CI_Model {

    public function getServicos($codEmpresa) {
        return $this->db->get_where("servico", [
            "codEmpresa" => $codEmpresa,
            "status" => 1
        ]);
    }
    
    public function Inserir($parametros){
        return $this->db->insert("servico", $parametros);
    }
    
    public function Alterar($cod, $parametros){
        return $this->db->where("codServico", $cod)->update("servico", $parametros);
    }
    
    public function getServico($codServico, $codEmpresa){
        return $this->db->get_where("servico",[ 
                "codServico" => $codServico, 
                "codEmpresa" => $codEmpresa,
                "status" => 1
            ]);
    }
    /*
    public function getProdutosNecessarios($codServico){
       return $this->db->select()
       ->from()
    }
    */
}