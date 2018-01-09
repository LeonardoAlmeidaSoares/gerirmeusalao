<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
        $this->load->Model("Model_produtos", "prod");
        
    }
    
    public function index() {
        
        $parametrosListagem = array(
            "produtos" => $this->prod->getProdutos($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('listagem_produtos', $parametrosListagem);
        $this->load->view('footer');
    }
    
    public function cadastrar(){
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('cadastro_produtos');
        $this->load->view('footer');
    }
    
    public function realizar_cadastro(){
        
        $parametrosInsercao = array(
            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
            "valorCompra" => doubleval(trim(filter_input(INPUT_POST, "txtValorCompra"))),
            "valorVenda" => doubleval(trim(filter_input(INPUT_POST, "txtValorVenda"))),
            "estoque" => intval(trim(filter_input(INPUT_POST, "txtEstoque")))
        );
        
        $parametrosInsercao["codEmpresa"] = intval($_SESSION["empresa"]->codEmpresa);
        
        if(isset($_POST["txtCod"])){
            $cod = intval(trim(filter_input(INPUT_POST, "txtCod")));
            $this->prod->Alterar($cod, $parametrosInsercao);
        }else{
            $this->prod->Inserir($parametrosInsercao);
        }
        redirect(base_url("index.php/produtos/"));
    }
    
    public function alterar($cod){
        
        $parametros = array(
            "codProcesso" => $cod,
            "dados" => $this->prod->getProduto($cod)->row(0)
        );
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('cadastro_produtos', $parametros);
        $this->load->view('footer');
    }

}
