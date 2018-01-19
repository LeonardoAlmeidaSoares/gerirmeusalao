<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContasPagar extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
        $this->load->Model("Model_saidas", "saidas");
        
    }
    
    public function index() {
        
        $parametros = array(
            "saidas" => $this->saidas->getSaidas($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('contas_pagar/listagem_contas_pagar', $parametros);
        $this->load->view('inc/footer');
    }

    public function cadastrar(){
        
        $this->load->Model("Model_clientes", "clientes");
        
        $parametros = array(
            "categorias" => $this->saidas->getCategorias($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('contas_pagar/cadastro_contas_pagar', $parametros);
        $this->load->view('inc/footer');
    }
    
    public function realizar_cadastro(){
                
        $parametros = array(
            "valor" => doubleval(trim(str_replace(",",".",filter_input(INPUT_POST, "txtValor")))),
            "status" => intval(trim(filter_input(INPUT_POST, "txtStatus"))),
            "discriminacao" => trim(filter_input(INPUT_POST, "txtDiscriminacao")),
            "dataVencimento" => trim(filter_input(INPUT_POST, "txtVencimento")),
            "codcategoriaSaida" => intval(trim(filter_input(INPUT_POST, "txtCategoria"))),
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa
        );
        
        $parametros["dataVencimento"] = substr($parametros["dataVencimento"],6,4) . "-" . substr($parametros["dataVencimento"],3,2) . "-" . substr($parametros["dataVencimento"],0,2); 
        
        if($parametros["status"] == 1){
            $parametros["dataPagto"] = date("Y-m-d");
        }
        
        $this->saidas->inserir($parametros);
        redirect(base_url("index.php/contasPagar/"));
        
    }
    
    public function EfetuarPagamento(){
        
        $codNota = intval(trim(filter_input(INPUT_POST,"codigo")));
        $this->db->where("codNotaSaida", $codNota)->update("notasaida", array("status"=>1, "datapagto" => date("Y-m-d H:i")));
        
    }
    
}
