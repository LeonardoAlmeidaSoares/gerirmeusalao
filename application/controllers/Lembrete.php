<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lembrete extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        session_start();
        
        $this->load->Model("Model_lembrete", "lemb");
    }
    
    public function index() {
        $parametrosListagem = array(
            "lembretes" => $this->lemb->getLembretes($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('lembrete/listagem_lembrete', $parametrosListagem);
        $this->load->view('inc/footer');
        
    }

    public function cadastrar(){
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('lembrete/cadastro_lembrete');
        $this->load->view('inc/footer');
    }

    public function add(){

        $parametros = array(
            "titulo" => trim(filter_input(INPUT_POST, "txtTitulo")),
            "dataLeitura" => trim(filter_input(INPUT_POST, "txtData")),
            "mensagem" => trim(filter_input(INPUT_POST, "txtTexto")),
            "status" => 0,
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa
        );

        $parametros["dataLeitura"] = 
                substr($parametros["dataLeitura"],6,4) . "-" . 
                substr($parametros["dataLeitura"],3,2) . "-" . 
                substr($parametros["dataLeitura"],0,2);

        $this->db->insert("lembrete", $parametros);
        $_SESSION["msg_ok"] = "Lembrete Cadastrado com sucesso";
        redirect(base_url());

    }

    public function getLembrete(){

        $cod = intval(trim(filter_input(INPUT_POST, "codLembrete")));

        $dados = $this->lemb->getLembrete($cod);
        echo json_encode($dados->result_array());
    }

}