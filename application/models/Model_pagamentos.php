<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_pagamentos extends CI_Model {

	public function getListagem($codEmpresa){
		return $this->db->get_where("pagamento", array("codEmpresa" => $codEmpresa));
	}

	public function getPagto($codPagamento, $codEmpresa){
		return $this->db->get_where("pagamento",array("codEmpresa"=>$codEmpresa, "codPagamento"=>$codEmpresa));
	}

}
