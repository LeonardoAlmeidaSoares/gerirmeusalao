<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        session_start();
        
        $this->load->Model("Model_cargos", "cargo");
    }
    
    public function index() {
        $parametrosListagem = array(
            "cargos" => $this->cargo->getCargos($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('cargo/listagem_cargos', $parametrosListagem);
        $this->load->view('inc/footer');
        
    }

    public function cadastrar(){
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('cargo/cadastro_cargo');
        $this->load->view('inc/footer');
    }

    public function add(){

        $parametros = array(
            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa
        );

        $this->db->insert("cargo", $parametros);
        $_SESSION["msg_ok"] = "Cargo Cadastrado com sucesso";
        redirect(base_url("index.php/Cargo/"));

    }

    public function getLembrete(){

        $cod = intval(trim(filter_input(INPUT_POST, "codLembrete")));

        $dados = $this->lemb->getLembrete($cod);
        echo json_encode($dados->result_array());
    }

}