<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_entradas extends CI_Model {

    public function getEntradas($codEmpresa) {
        return $this->db->select("n.*, c.descricao, cli.nome as nomeCliente")
                ->from("notaentrada n")
                ->join("cliente cli", "n.codCliente = cli.codCliente")
                ->join("categoriaentrada c", "c.codCategoriaEntrada = n.codCategoriaEntrada")
                ->where("n.codEmpresa",$codEmpresa)
                ->get();
    }
    
    public function Inserir($parametros){
        return $this->db->insert("notaentrada", $parametros);
    }
    
    public function getEntrada($codServico){
        return $this->db->get_where("notaentrada", array("codNotaEntrada" => $codServico));
    }

    public function getCategorias($codEmpresa){
        return $this->db->get_where("categoriaentrada", array("codEmpresa" => $codEmpresa));
    }
    
    public function getInvoice($codEntrada){
        return $this->db->select("*")
                ->from("notaentrada n")
                ->where("codNotaEntrada", $codEntrada)
                ->get();
    }
    
    public function getDividas($codCliente){
        return $this->db->get_where("notaentrada", array(
            "codCliente" => $codCliente
        ));
    }
    
    public function getServicosDetalhados($codNota){
        
        $aux = $this->db->select("s.descricao, s.valorComum, s.codServico, sp.valor")
                ->from("servicoprestado sp")
                ->join("servico s","s.codServico = sp.codServico")
                ->where("sp.codCompromisso", $codNota)
                ->get();
        
        return ($aux->num_rows() > 0) ? $aux : NULL;
        
    }
    
    public function getVencimentoHoje($codEmpresa){
        return $this->db->query("SELECT * FROM notaentrada where status = 0 and dataVencimento = CURDATE() and codEmpresa = $codEmpresa");
    }
    
    public function getRendimentoMensal($codUsuario){
        
        return $this->db->select("sum(CASE WHEN formaPagto = 'DINHEIRO' THEN ne.valor * 0.73 ELSE ne.valor * 0.7 END) as total, "
                                                    . "MONTH(ne.dataPagto) as 'Mes', YEAR(ne.dataPagto) as 'Ano'")
                ->from("notaentrada ne")
                ->join("compromisso c", "c.codCompromisso = ne.codCompromisso")
                ->where("c.codFuncionario", $codUsuario)
                ->where("ne.status",1)
                ->group_by("DATE_FORMAT(ne.dataPagto, '%m/%Y')")
                ->get();
    }
}
