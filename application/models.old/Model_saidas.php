<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_saidas extends CI_Model {

    public function getSaidas($codEmpresa) {
        return $this->db->select("n.*, c.descricao")
                ->from("notasaida n")
                ->join("categoriasaida c", "c.codcategoriaSaida = n.codcategoriaSaida")
                ->where("n.codEmpresa",$codEmpresa)
                ->get();
    }
    
    public function Inserir($parametros){
        return $this->db->insert("notasaida", $parametros);
    }
    
    public function getEntrada($codServico){
        return $this->db->get_where("notasaida", array("codNotaSaida" => $codServico));
    }

    public function getCategorias($codEmpresa){
        return $this->db->get_where("categoriasaida", array("codEmpresa" => $codEmpresa));
    }
    
    public function getVencimentoHoje($codEmpresa){
        return $this->db->query("SELECT * FROM notasaida where status = 0 and dataVencimento = CURDATE() and codEmpresa = $codEmpresa");
    }
    
}
