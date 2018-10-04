<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function __construct() {

        parent::__construct();
        session_start();

        $this->load->Model("Model_produtos", "prod");
    }

    public function index() {

        $parametrosListagem = array(
            "produtos" => $this->prod->getProdutos($_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('produto/listagem_produtos', $parametrosListagem);
        $this->load->view('inc/footer');
    }

    public function cadastrar() {

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('produto/cadastro_produtos');
        $this->load->view('inc/footer');
    }

    public function realizar_cadastro() {

        $parametrosInsercao = array(
            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
            "valorCompra" => doubleval(trim(filter_input(INPUT_POST, "txtValorCompra"))),
            "valorVenda" => doubleval(trim(filter_input(INPUT_POST, "txtValorVenda"))),
            "estoque" => intval(trim(filter_input(INPUT_POST, "txtEstoque")))
        );

        $parametrosInsercao["codEmpresa"] = intval($_SESSION["empresa"]->codEmpresa);

        if (isset($_POST["txtCod"])) {
            $cod = intval(trim(filter_input(INPUT_POST, "txtCod")));
            $this->prod->Alterar($cod, $parametrosInsercao);
        } else {
            $this->prod->Inserir($parametrosInsercao);
        }

        redirect(base_url("index.php/produtos/"));
    }

    public function alterar($cod) {

        $parametros = array(
            "codProcesso" => $cod,
            "dados" => $this->prod->getProduto($cod)->row(0)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('produto/cadastro_produtos', $parametros);
        $this->load->view('inc/footer');
    }
    
    public function deletar(){
        $cod_prod = intval(trim(filter_input(INPUT_POST, "codigo")));
        
        $this->prod->alterar($cod_prod, [
            "status" => 0
        ]);
        
    }

}
