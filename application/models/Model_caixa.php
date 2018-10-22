<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_caixa extends CI_Model {

    public function getFluxo($codEmpresa, $tipo = null, $date = null) {

        $this->db->select("movimentacaofinanceira.*, usuario.nome");
        $this->db->from("movimentacaofinanceira");
        $this->db->join("usuario", "usuario.codUsuario = movimentacaofinanceira.codUsuario");
        $this->db->where("movimentacaofinanceira.codEmpresa", $codEmpresa);

        if (is_null($date)) {
            $this->db->where("date(movimentacaofinanceira.horario)", date("Y-m-d"));
        } else {
            $this->db->where("date(movimentacaofinanceira.horario)", $date);
        }

        if (!is_null($tipo)) {
            $this->db->where("movimentacaofinanceira.tipoMovimentacao", $tipo);
        }

        return $this->db->get();
    }

    public function getUltimoCaixa($codEmpresa, $status = -1) {

        $this->db->select("*");
        $this->db->from("caixa");
        $this->db->where("codEmpresa", $codEmpresa);
        $this->db->order_by("data", "desc");

        if ($status > -1) {
            $this->db->where("status", $status);
        }
        
        $this->db->order_by("codCaixa", "desc");

        $retorno = $this->db->get();

        return $retorno->row(0);
    }

    public function movimentacoes_realizadas($codCaixa, $movimentacoes = NULL) {

        $parametros = [
            "codCaixa" => $codCaixa
        ];
        
        if(!is_null($movimentacoes))
            $parametros["tipoMovimentacao"] = $movimentacoes;
        
        return $this->db->get_where("detalhamento_caixa", $parametros);
    }

    public function getSituacaoCaixa($codEmpresa) {

        /* Retorno
          0 - Caixa Anterior ainda não fechado
          1 - Caixa Necessita ser aberto
          2 - Caixa Aberto pronto para atualizações
          3 - Caixa Fechado, impossivel fazer operações
         */
    }

}
