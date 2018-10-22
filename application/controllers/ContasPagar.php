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

            $parametrosMovimentacao = array(
                "tipoMovimentacao" => "SAI",
                "valor" => $parametros["valor"],
                "codUsuario" => intval($_SESSION["usuario"]->codUsuario),
                "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
                "horario" => date("Y-m-d H:i:s"),
                "comentario" => $parametros['discriminacao'],
                'codCaixa' => $_SESSION["caixa"]->codCaixa
            );
            
            $this->db->insert("movimentacaofinanceira", $parametrosMovimentacao);
            
        }
        
        $this->saidas->inserir($parametros);
        
        $codNota = $this->db->insert_id();

        if($parametros["status"] == 0){

            $parametrosLembrete = array(
                "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
                "mensagem" => "Hoje vence a conta de código $codNota",
                "dataLeitura" => $parametros["dataVencimento"],
                "status" => 0,
                "titulo" => "Lembrete de Pagamento"
            );

            $this->db->insert("lembrete", $parametrosLembrete);

        }

        redirect(base_url("index.php/contas_pagar/"));
        
    }
    
    public function EfetuarPagamento(){
        
        $codNota = intval(trim(filter_input(INPUT_GET,"codigo")));
        $this->db->where("codNotaSaida", $codNota)->update("notasaida", array("status" => 1, "datapagto" => date("Y-m-d H:i")));

        $origem = trim(filter_input(INPUT_GET, "origem"));

        $dadosNota = $this->db->get_where("notasaida", array("codNotaSaida" => $codNota));

        if($origem == "caixa"){

            $parametrosMovimentacao = array(
                "tipoMovimentacao" => "SAI",
                "valor" => $dadosNota->row(0)->valor,
                "codUsuario" => intval($_SESSION["usuario"]->codUsuario),
                "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
                "horario" => date("Y-m-d H:i:s"),
                "comentario" => $dadosNota->row(0)->discriminacao,
                "codCaixa" => $_SESSION["caixa"]->codCaixa 
            );
            
            $this->db->insert("movimentacaofinanceira", $parametrosMovimentacao);
            
        }
        
        
        
    }
    
    public function vencendoHoje() {
        
        $parametros = array(
            "saidas" => $this->saidas->getSaidasVencendoHoje($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('contas_pagar/listagem_contas_vencidas', $parametros);
        $this->load->view('inc/footer');
    }

}
