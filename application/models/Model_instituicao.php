<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_instituicao extends CI_Model {

    public function getInstituicao($codEmpresa) {
        return $this->db->get_where("empresa", array("codEmpresa"=>$codEmpresa));
    }

    public function alterarInstituicao($codEmpresa, $parametros, $alterarSessao = false){
    	
    	$this->db->where("codEmpresa", $codEmpresa)->update("empresa", $parametros);
    	
    	if($alterarSessao){
    		$_SESSION["empresa"] = $this->db->select("e.*, c.descricao as cidade, est.UF")
                ->from("empresa e")
                ->join("cidade c", "c.codCidade = e.codCidade")
                ->join("estado est", "est.codEstado = c.codEstado")
                ->where("codEmpresa",$codEmpresa)
                ->get();
                $_SESSION["empresa"] = $_SESSION["empresa"]->row(0);
    	}
    }
    
}
