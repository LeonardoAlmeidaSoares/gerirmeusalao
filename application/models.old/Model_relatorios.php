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
    /*select 
        from 
        join 
        where 
        group by s.codServico
    */
    
    public function getListagemServicosMesAtual($codEmpresa){
        return $this->db->select("count(*) as qtd, s.descricao as servico")
                ->from("servicoprestado sp")
                ->join("servico s","s.codServico = sp.codServico")
                ->where("MONTH(sp.horario) = MONTH(NOW())")
                ->where("YEAR(sp.horario) = YEAR(NOW())")
                ->where("s.codEmpresa", $codEmpresa)
                ->group_by("s.codServico")
                ->get();
    }

}
