<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();

        session_start();

    }

    public function index() {

        $this->load->Model("Model_cidades", "cidades");

        $parametrosListagem = array(
            "estados" => $this->cidades->get_estados(),
            //"listaFuncionarios" => $this->func->getFuncionarios($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('empresa/cadastrar', $parametrosListagem);
        $this->load->view('inc/footer');
    }
    
    public function realizar_cadastro(){
     
        var_dump($_POST); exit;
        
    }
}