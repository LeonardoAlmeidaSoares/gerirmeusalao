<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_rendimentos extends CI_Model {

    public function getMensal($codEmpresa) {
        return $this->db->select("count(*) as qtd, sp.codServico, sp.codFuncionario, s.descricao as servico, f.nome as funcionario, s.valorComum,"
                                                    . "MONTH(horario) as Mes, YEAR(horario) as Ano")
                ->from("servicoprestado sp")
                ->join("servico s","s.codServico = sp.codServico")
                ->join("funcionario f","f.codFuncionario = sp.codFuncionario")
                ->where("MONTH(horario) = MONTH(NOW()) and YEAR(horario) = YEAR(NOW())")
                ->where("f.codEmpresa", $codEmpresa)
                ->group_by("codFuncionario, codServico")
                ->order_by("codFuncionario, qtd desc, codServico")
                ->get();
    }
    
    public function getRendimentos($codEmpresa){
        return $this->db->select("(sum(f.comissao * s.valorComum / 100) + f.salario) as valor, f.nome")
                ->from("servicoprestado sp")
                ->join("servico s","s.codServico = sp.codServico")
                ->join("funcionario f","f.codFuncionario = sp.codFuncionario")
                ->where("MONTH(horario) = MONTH(NOW()) and YEAR(horario) = YEAR(NOW())")
                ->where("f.codEmpresa", $codEmpresa)
                ->group_by("sp.codFuncionario")
                ->get();
    }

}
