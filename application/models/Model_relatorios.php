<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_relatorios extends CI_Model {

    public function getCompromissosUltimoAno($codEmpresa) {
        return $this->db->select("count(*) as qtd, concat(MONTH(horario), '/', YEAR(horario)) as 'Mes'")
                        ->from("compromisso")
                        ->where("codEmpresa", $codEmpresa)
                        ->group_by("MONTH(horario)")
                        ->get();
    }

    public function getCompromissosUltimoAnoByUser($codFuncionario) {
        return $this->db->select("count(*) as qtd, concat(MONTH(horario), '/', YEAR(horario)) as 'Mes'")
                        ->from("compromisso")
                        ->where("codFuncionario", $codFuncionario)
                        ->group_by("MONTH(horario)")
                        ->get();
    }

    public function getListagemServicosMesAtual($codEmpresa) {
        return $this->db->select("count(*) as qtd, s.descricao as servico")
                        ->from("servicoprestado sp")
                        ->join("servico s", "s.codServico = sp.codServico")
                        ->where("MONTH(sp.horario) = MONTH(NOW())")
                        ->where("YEAR(sp.horario) = YEAR(NOW())")
                        ->where("s.codEmpresa", $codEmpresa)
                        ->group_by("s.codServico")
                        ->get();
    }

    public function getListagemServicosMesAtualByUser($codFuncionario) {
        return $this->db->select("count(*) as qtd, s.descricao as servico")
                        ->from("servicoprestado sp")
                        ->join("servico s", "s.codServico = sp.codServico")
                        ->where("MONTH(sp.horario) = MONTH(NOW())")
                        ->where("YEAR(sp.horario) = YEAR(NOW())")
                        ->where("sp.codFuncionario", $codFuncionario)
                        ->group_by("s.codServico")
                        ->get();
    }

    public function getAniversariantes($codEmpresa, $data) {
        $this->db->select("cliente.*");
        $this->db->from("cliente");
        $this->db->where("codEmpresa", $codEmpresa);
        if (is_null($data)) {
            $this->db->where("DATE_FORMAT(nascimento, '%d-%m') = DATE_FORMAT(CURDATE(),'%d-%m')", null);
        } else {
            $this->db->where("DATE_FORMAT(nascimento, '%d-%m') = $data", null);
        }
        return $this->db->get();
    }

}
