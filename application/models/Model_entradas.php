<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_entradas extends CI_Model {

    public function getCodCategoriaVenda($codEmpresa){
        $data = $this->db->get_where("categoriaentrada", 
            array(
                "descricao" => "Venda Realizada", 
                "codEmpresa" => $codEmpresa
            )
        );

        return $data->row(0)->codCategoriaEntrada;
    }

    public function getEntradas($codEmpresa) {

        return $this->db->select("n.*, c.descricao, cli.nome as nomeCliente, IF(n.codVenda = 0,
                   (select count(*) from servicoprestado sp where sp.codNotaEntrada = n.codNotaEntrada),
                   (select count(*) from itemvenda iv join venda v on v.codVenda = iv.codVenda where v.codNotaEntrada = n.codNotaEntrada)) as qtd")
                        ->from("notaentrada n")
                        ->join("cliente cli", "n.codCliente = cli.codCliente")
                        ->join("categoriaentrada c", "c.codCategoriaEntrada = n.codCategoriaEntrada")
                        ->where("n.codEmpresa", $codEmpresa)
                        ->get();
    }
    
    public function getEntradasVencendoHoje($codEmpresa){
        return $this->db->select("n.*, c.descricao, cli.nome as nomeCliente, IF(n.codVenda = 0,
                   (select count(*) from servicoprestado sp where sp.codNotaEntrada = n.codNotaEntrada),
                   (select count(*) from itemvenda iv join venda v on v.codVenda = iv.codVenda where v.codNotaEntrada = n.codNotaEntrada)) as qtd")
                        ->from("notaentrada n")
                        ->join("cliente cli", "n.codCliente = cli.codCliente")
                        ->join("categoriaentrada c", "c.codCategoriaEntrada = n.codCategoriaEntrada")
                        ->where("n.codEmpresa", $codEmpresa)
                        ->where("DATE(n.dataVencimento) = CURDATE()", NULL)
                        ->where("n.status", 0)
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

    public function getByCompromisso($codCOmpromisso){
        return $this->db->get_where("notaentrada", array("codCompromisso" => $codCOmpromisso));
    }
    
    public function getServicosDetalhados($codNota){
        $aux = $this->db->select("s.descricao, s.valorComum as Valor, s.codServico as Codigo, ne.valor")
                   ->from("servico s")
                   ->join("servicoprestado sp", "sp.codServico = s.codServico")
                   ->join("notaentrada ne","ne.codNotaEntrada = sp.codNotaEntrada")
                   ->where("ne.codNotaEntrada", $codNota)
                   ->get();
                   
       return ($aux->num_rows() > 0) ? $aux : NULL;
    }

    public function getProdutosDetalhados($codNota){
        $aux = $this->db->select("p.descricao, p.valorVenda as Valor, p.codProduto as Codigo, ne.valor")
                   ->from("produto p")
                   ->join("itemvenda iv", "iv.codProduto = p.codProduto")
                   ->join("venda v", "iv.codVenda = v.codVenda")
                   ->join("notaentrada ne","ne.codNotaEntrada = v.codNotaEntrada")
                   ->where("ne.codNotaEntrada", $codNota)
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
