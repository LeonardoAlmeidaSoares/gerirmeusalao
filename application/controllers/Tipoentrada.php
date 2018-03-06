<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tipoentrada extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        session_start();
        
        $this->load->Model("Model_tipoentradas", "tipoentrada");
    }
    
    public function index() {
        $parametrosListagem = array(
            "tipoentradas" => $this->tipoentrada->getTipoEntradas($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('categoria_entrada/listagem_categoria_entrada', $parametrosListagem);
        $this->load->view('inc/footer');
        
    }

    public function cadastrar(){
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('categoria_entrada/cadastro_categoria_entrada');
        $this->load->view('inc/footer');
    }

    public function add(){

        $parametros = array(
            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa
        );

        $this->db->insert("categoriaentrada", $parametros);
        $_SESSION["msg_ok"] = "Tipo de Entrada Cadastrado com sucesso";
        redirect(base_url("index.php/tipoentrada/"));

    }

}