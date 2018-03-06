<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Model_compromissos extends CI_Model {



    public function getCompromissos($codEmpresa, $status = 0) {
       
        $parametros = array("codEmpresa" => $codEmpresa);
        
        $filtro = ($status == 0) ? "status in (0,1)" : "status = $status";
        
        return $this->db->query("select * from compromisso where codEmpresa = $codEmpresa and $filtro");
        
        //return $this->db->get_where("compromisso", $parametros);
    }
    
    public function getCompromisso($codCompromisso) {
        
        return $this->db->get_where("compromisso", array("codCompromisso" => $codCompromisso));
    }
    
    public function getListaCompromissos($codColaborador) {
        
        return $this->db->get_where("compromisso", array("codFuncionario" => $codColaborador));
    }
    
    public function cadastrar($parametros){
        return $this->db->insert("compromisso", $parametros);
    }

    public function proximosCompromissosColaborador($codFuncionario){
        return $this->db->select("c.descricao, c.horario, s.descricao as 'serviço', c.status,"
                . "f.nome as funcionario, cli.nome as cliente, f.codFuncionario, c.codCompromisso")
                ->from("compromisso c")
                ->join("funcionario f", "f.codFuncionario = c.codFuncionario")
                ->join("servico s", "s.codServico = c.codServico")
                ->join("cliente cli", "cli.codCliente = c.codCliente")
                ->where("DAY(horario) = DAY(NOW())")
                ->where("status>",-1)
                ->where("c.status<",2)
                ->where("c.codFuncionario", $codFuncionario)
                ->order_by("c.horario")
                ->get();
    }
    
    public function proximosCompromissos($codEmpresa){
        return $this->db->select("c.descricao, c.horario, s.descricao as 'serviço', c.status,"
                . "f.nome as funcionario, cli.nome as cliente, f.codFuncionario, c.codCompromisso")
                ->from("compromisso c")
                ->join("funcionario f", "f.codFuncionario = c.codFuncionario")
                ->join("servico s", "s.codServico = c.codServico")
                ->join("cliente cli", "cli.codCliente = c.codCliente")
                ->where("DAY(horario) = DAY(NOW())")
                ->where("status>",-1)
                ->where("c.status<",2)
                ->where("c.codEmpresa", $codEmpresa)
                ->order_by("c.horario")
                ->get();
    }
    
    public function getCOmpromissoDetalhado($codCompromisso){
        return $this->db->select("comp.codCliente, serv.valorComum, cli.nome as cliente, comp.codCompromisso, 
                    CONCAT(serv.descricao,' realizado por ',func.nome,' no(a) 
                    cliente no dia ',DATE_FORMAT(comp.horario, '%d/%m/%Y'),
                    ' com inicio as ', DATE_FORMAT(comp.horario, '%h:%m')) as descricao")
                ->from("compromisso comp")
                ->join("servico serv","serv.codServico = comp.codServico")
                ->join("funcionario func","func.codFuncionario = comp.codFuncionario")
                ->join("cliente cli","cli.codCliente = comp.codCliente")
                ->where("codCompromisso",$codCompromisso)
                ->get();
    }

    public function getListaCompromissosDetalhados($codEmpresa){
        return $this->db->select("comp.codCliente, serv.valorComum, cli.nome as cliente, comp.codCompromisso, 
                    func.nome as funcionario, comp.descricao")
                ->from("compromisso comp")
                ->join("servico serv","serv.codServico = comp.codServico")
                ->join("funcionario func","func.codFuncionario = comp.codFuncionario")
                ->join("cliente cli","cli.codCliente = comp.codCliente")
                ->where("comp.codEmpresa",$codEmpresa)
                ->get();
    }

     public function getListaCompromissosDetalhadosVencendoHoje($codEmpresa){
        return $this->db->select("comp.codCliente, serv.valorComum, cli.nome as cliente, comp.codCompromisso, 
                    func.nome as funcionario, comp.descricao, comp.status")
                ->from("compromisso comp")
                ->join("servico serv","serv.codServico = comp.codServico")
                ->join("funcionario func","func.codFuncionario = comp.codFuncionario")
                ->join("cliente cli","cli.codCliente = comp.codCliente")
                ->where("comp.codEmpresa",$codEmpresa)
                ->where("date(comp.horario) = curdate()", NULL)
                ->get();
    }
    
}
