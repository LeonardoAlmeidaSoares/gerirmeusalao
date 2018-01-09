<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_clientes extends CI_Model {

    public function getClientes($codEmpresa){
        return $this->db->get_where("cliente", array("codEmpresa" => $codEmpresa));
    }
     
    public function Inserir($parametros){
        return $this->db->insert("cliente", $parametros);
    }
    
    public function getClienteByName($nome, $codEmpresa){
        
        return $this->db->get_where("cliente", array("nome" => $nome, "codEmpresa" => $codEmpresa));
        
    }
    
    public function getCliente($codCliente){
        return $this->db->select("cli.*, c.descricao as cidade, e.UF")
                ->from("cliente cli")
                ->join("cidade c", "c.codCidade = cli.codCidade")
                ->join("estado e", "e.codEstado = c.codEstado")
                ->where("cli.codCliente",$codCliente)
                ->get();
    }
        
    public function getServicosPrestados($codCliente, $codEmpresa){
        return $this->db->select("count(*) as qtd, s.descricao, (select count(*) from servicoprestado where codCliente = $codCliente) as total")
                ->from("servicoprestado sp")
                ->join("servico s", "s.codServico = sp.codServico")
                ->where("codCliente",$codCliente)
                ->where("codEmpresa",$codEmpresa)
                ->group_by("sp.codServico")
                ->get();
    }
    
    public function aniversariantes($codEmpresa){
        return $this->db->select("*")
                ->from("cliente")
                ->where("DATE_FORMAT(nascimento,'%m-%d') = DATE_FORMAT(CURDATE(),'%m-%d')", null)
                ->where("codEmpresa", $codEmpresa)
                ->get();
                
    }
}