<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tiposaida extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        session_start();
        
        $this->load->Model("Model_tiposaidas", "tiposaida");
    }
    
    public function index() {
        $parametrosListagem = array(
            "tipoentradas" => $this->tiposaida->getTipoSaidas($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('categoria_saida/listagem_categoria_saida', $parametrosListagem);
        $this->load->view('inc/footer');
        
    }

    public function cadastrar(){
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('categoria_saida/cadastro_categoria_saida');
        $this->load->view('inc/footer');
    }

    public function add(){

        $parametros = array(
            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa
        );

        $this->db->insert("categoriasaida", $parametros);
        $_SESSION["msg_ok"] = "Tipo de Saída Cadastrado com sucesso";
        redirect(base_url("index.php/tipo_saida/"));

    }

}