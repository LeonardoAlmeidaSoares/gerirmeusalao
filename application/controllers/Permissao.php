<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permissao extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        session_start();
        
        $this->load->Model("Model_permissao", "perm");
    }
    
    public function index() {
        
        $this->load->Model("Model_usuario", "user");
        
        $parametrosListagem = array(
            "usuarios" => $this->user->getUsuarios($_SESSION["empresa"]->codEmpresa),
            "listaPermissoes" => $this->perm->getPermissoes()
        );
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('listagem_permissoes', $parametrosListagem);
        $this->load->view('footer');
    }
    
    public function customizar($codUsuario){
        
        $this->load->Model("Model_usuario", "user");
        
        $parametros = array(
            "permissoes" => $this->perm->getPermissoesUsuario($codUsuario),
            "dadosUsuario" => $this->user->getUsuario($codUsuario)->row(0)
        );
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('customizar_permissao', $parametros);
        $this->load->view('footer');
        
    }
    
    public function alterar(){
        
        $parametros = array(
            "perm_efetuarCadastro" => intval(trim(filter_input(INPUT_POST, "txtCadastro"))),
            "perm_efetuarAlteracao" => intval(trim(filter_input(INPUT_POST, "txtAlteracao"))),
            "perm_cadastrarUsuario" => intval(trim(filter_input(INPUT_POST, "txtUsuarios"))),
            "perm_alterarDadosEmpresa" => intval(trim(filter_input(INPUT_POST, "txtEmpresa"))),
            "perm_verRelatorios" => intval(trim(filter_input(INPUT_POST, "txtRelatorios"))),
            "perm_verNotas" => intval(trim(filter_input(INPUT_POST, "txtNotas"))),
            "perm_marcarCompromissos" => intval(trim(filter_input(INPUT_POST, "txtAgenda"))),
            "perm_cadastrarFuncionario" => intval(trim(filter_input(INPUT_POST, "txtFuncionario"))),
            "perm_cadastrarProdutosServicos" => intval(trim(filter_input(INPUT_POST, "txtServicos"))),
            "perm_alterarPermissoes" => intval(trim(filter_input(INPUT_POST, "txtPermissoes")))
        );
        
        $codUsuario = intval(trim(filter_input(INPUT_POST, "txtcodUsuario")));
        
        $this->perm->Alterar($codUsuario, $parametros);
        redirect(base_url("index.php/permissao"));
    }
}