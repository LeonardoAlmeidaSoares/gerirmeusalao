<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_venda extends CI_Model {

    public function getVendas($codEmpresa) {
        return $this->db->select("venda.codVenda, cliente.nome, DATE_FORMAT(venda.data, '%d/%m/%Y %H:%i') as horario, venda.valor")
        ->from("venda")
        ->join("cliente", "cliente.codCliente = venda.codCliente")
        ->where("venda.codEmpresa", $codEmpresa)
        ->get();
    }

}
