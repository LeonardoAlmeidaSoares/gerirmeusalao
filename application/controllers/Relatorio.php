<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
        $this->load->Model("Model_compromissos", "agenda");
        
    }
    
    public function index(){
        
    }
    
    public function getRendimentoMensal(){
        $this->load->Model("Model_rendimentos", "rendimentos");
        
        $parametros = array(
            "entradas" => $this->rendimentos->getRendimentos($_SESSION["empresa"]->codEmpresa)
        );



        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('relatorios/relatorio_financeiro', $parametros);
        $this->load->view('inc/footer');
    }
    
    public function getRelatorioMensal(){
        
        $this->load->Model("Model_rendimentos", "rendimentos");
        
        $parametros = array(
            "entradas" => $this->rendimentos->getMensal($_SESSION["empresa"]->codEmpresa),
            "rendimentos" => $this->rendimentos->getRendimentos($_SESSION["empresa"]->codEmpresa)
        );
        var_dump($_SESSION["permissoes"]);
        /*
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('relatorio_financeiro', $parametros);
        $this->load->view('inc/footer');
        */
    }

    public function faturamento(){

        $this->load->Model("Model_rendimentos", "rendimentos");
        
        $parametros = array(
            "dados" => $this->rendimentos->getRendimentoUltimoAno($_SESSION["empresa"]->codEmpresa),
            "dadosResumidos" => $this->rendimentos->getRedimentosUltimoAnoResumido($_SESSION["empresa"]->codEmpresa),
            "dadosMediosResumidos" => $this->rendimentos->getMediaRendimentosUltimoAno($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('relatorio/relatorio_faturamento_total', $parametros);
        $this->load->view('inc/footer');
        
    }
    
    public function faturamentoFuncionario($codCliente, $mes){

        $this->load->Model("Model_rendimentos", "rendimentos");

        $parametros = array(
            "itens" => $this->rendimentos->getRendimentoPorColaborador($_SESSION["empresa"]->codEmpresa,$codCliente, $mes)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('relatorio/relatorio_detalhamento_funcionario', $parametros);
        $this->load->view('inc/footer');
        
    }

    public function getAniversariantes($codEmpresa, $data = NULL){
        $this->load->Model("Model_rendimentos", "rendimentos");

        $parametros = array(
            "clientes" => $this->rendimentos->getAniversariantes($_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('relatorio/relatorio_listagem_aniversariantes', $parametros);
        $this->load->view('inc/footer');
    }
    
    public function servicosPrestados(){
        
        $codEmpresa = intval($_SESSION["empresa"]->codEmpresa);
        
        $this->load->Model("Model_funcionarios", "func");
        
        $parametros = [
            "colaboradores" => $this->func->getFuncionarios($codEmpresa)
        ];
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('relatorio/servicos/listagem_servicos_prestados', $parametros);
        $this->load->view('inc/footer');
        
    }
    
    public function getRelatorioServicosPrestados(){
        
        $this->load->Model("Model_relatorios", "rel");
        
        $codFuncionario = intval(trim(filter_input(INPUT_POST, "codFuncionario")));
        
        $this->load->view("relatorio/servicos/listagem_servicos_prestados/detalhes",[
            "dados" => $this->rel->getServicosPrestados($codFuncionario)
        ]);
        
    }
}