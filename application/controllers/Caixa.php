<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Caixa extends CI_Controller {

    public function __construct() {
        parent::__construct();

        session_start();

        $this->load->Model("Model_caixa", "caixa");
    }

    public function index() {
        
        $this->load->Model("Model_caixa", "caixa");
        $codEmpresa = $_SESSION["empresa"]->codEmpresa;
        
        $dadosCaixa = $this->caixa->getUltimoCaixa($codEmpresa);
        
        $parametros = [
            "caixa" => $dadosCaixa,
            "totalEntradasHoje" => $this->caixa->movimentacoes_realizadas($dadosCaixa->codCaixa, "ENT"),
            "totalSaidasHoje" => $this->caixa->movimentacoes_realizadas($dadosCaixa->codCaixa, "SAI"),
            "totalCaixa" => $this->caixa->movimentacoes_realizadas($dadosCaixa->codCaixa),
        ];
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('fluxo_caixa/listagem', $parametros);
        $this->load->view('inc/footer');
    }
    
    public function finalizar(){
        
        $codCaixa = intval(trim(filter_input(INPUT_POST, "codCaixa")));
        $valorFinal = doubleval(trim(filter_input(INPUT_POST, "valorTotal")));
        $hora_fim = date("Y-m-d H:i");
        
        $parametros = [
            "valorFinal" => $valorFinal,
            "HorarioFinal" => $hora_fim,
            "codUsuarioFinal" => $_SESSION["usuario"]->codUsuario,
            "obs" => trim(filter_input(INPUT_POST, "obs"))
        ];
                
        $this->db->where("codCaixa", $codCaixa)->update("caixa", $parametros);
        
        redirect("caixa/");
        
    }
    
    public function abrir(){
        
        $obs = trim(filter_input(INPUT_POST, "mensagem"));
        $valor_inicial = doubleval(str_replace(",", ".", filter_input(INPUT_POST, "valor_inicial")));
        
        $parametros = [
            "codEmpresa" => intval($_SESSION["empresa"]->codEmpresa),
            "data" => date("Y-m-d"),
            "valorInicio" => $valor_inicial,
            "codUsuarioInicio" => intval(trim($_SESSION["usuario"]->codUsuario)),
            "HorarioInicio" => date("Y-m-d H:i"),
            "obs" => $obs
        ];
        
        $this->db->insert("caixa", $parametros);
        
        $_SESSION["caixa"] = $this->db->get_where("caixa", ["codCaixa" => $this->db->insert_id()])->row(0);
        
        redirect("caixa");
        
    }
    
    public function fechar(){
        
        $parametros = [
            "caixa" => $_SESSION["caixa"],
            "movimentacoes" => $this->caixa->movimentacoes_realizadas($_SESSION["caixa"]->codCaixa)
        ];
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('fluxo_caixa/fecharCaixa', $parametros);
        $this->load->view('inc/footer');
        
    }

}
