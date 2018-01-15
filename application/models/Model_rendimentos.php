<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_rendimentos extends CI_Model {

    public function getMensal($codEmpresa) {
        return $this->db->select("count(*) as qtd, sp.codServico, sp.codFuncionario, s.descricao as servico, f.nome as funcionario, s.valorComum, MONTH(horario) as Mes, YEAR(horario) as Ano")
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

    public function getRendimentoUltimoAno($codEmpresa){
        
        $dadosNPagos = $this->db->select("SUM(valor) as Valor, DATE_FORMAT(dataVencimento, '%m-%Y') as Mes")
            ->from("notaentrada")
            ->group_by("DATE_FORMAT(dataVencimento, '%m-%Y')")
            ->order_by("dataVencimento desc")
            ->get();

        $vetTotal = $vetPagos = array();

        foreach($dadosNPagos->result() as $item){
            $vetTotal[$item->Mes] = $item->Valor;
            $vetPagos[$item->Mes] = 0;
        }

        $dadosPagos = $this->db->select("SUM(valor) as Valor, DATE_FORMAT(dataPagto, '%m-%Y') as Mes")
            ->from("notaentrada")
            ->where("status", 1)
            ->group_by("DATE_FORMAT(dataPagto, '%m-%Y')")
            ->order_by("dataPagto desc")
            ->get();

        foreach($dadosPagos->result() as $item){
            
            $vetPagos[$item->Mes] = $item->Valor;
        }
 
        $vetDados = array(
            "pagos" => $vetPagos,
            "naoPagos" => $vetTotal
        );

        return $vetDados;

    }

    public function getRedimentosUltimoAnoResumido($codEmpresa){

        /*select DATE_FORMAT(dataPagto, '%m-%Y') as mes, sum(ne.valor) as valor, c.codFuncionario, f.nome
            from notaentrada ne
            join compromisso c on c.codCompromisso = ne.codCompromisso
            inner join funcionario f on f.codFuncionario = c.codFuncionario
            where dataPagto is not null
            group by c.codFuncionario, DATE_FORMAT(dataPagto, '%m-%Y')
            order by dataPagto desc, valor desc
        */

        return $this->db->select("DATE_FORMAT(dataPagto, '%m-%Y') as mes, sum(ne.valor) as valor, c.codFuncionario, f.nome")
            ->from("notaentrada ne")
            ->join("compromisso c", "c.codCompromisso = ne.codCompromisso")
            ->join("funcionario f", "f.codFuncionario = c.codFuncionario")
            ->where("dataPagto is not null", NULL)
            ->where("dataPagto >= DATE_SUB(NOW(),INTERVAL 1 YEAR)", NULL)
            ->group_by("c.codFuncionario, DATE_FORMAT(dataPagto, '%m-%Y')")
            ->order_by("dataPagto desc, valor desc")
            ->get();

    }

}
