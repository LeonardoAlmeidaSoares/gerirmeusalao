<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ContasReceber extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
        $this->load->Model("Model_entradas", "entradas");
        
    }
    
    public function index() {
        
        $parametros = array(
            "entradas" => $this->entradas->getEntradas($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('listagem_contas_receber', $parametros);
        $this->load->view('footer');
    }
    
    public function cadastrar($codEvento = 0){
        
        $this->load->Model("Model_clientes", "clientes");
        
        $parametros = array(
            "clientes" => $this->clientes->getClientes($_SESSION["empresa"]->codEmpresa),
            "categorias" => $this->entradas->getCategorias($_SESSION["empresa"]->codEmpresa)
        );

        if($codEvento > 0){
            $this->load->Model("Model_compromissos", "agenda");
            $parametros["values"] = $this->agenda->getCompromissoDetalhado($codEvento)->row(0);
        }
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('cadastro_contas_receber', $parametros);
        $this->load->view('footer');
    }
    
    public function realizar_cadastro(){
        
        $this->load->Model("Model_clientes", "clientes");
        
        $parametros = array(
            "valor" => doubleval(trim(filter_input(INPUT_POST, "txtValor"))),
            "status" => intval(trim(filter_input(INPUT_POST, "txtStatus"))),
            "discriminacao" => trim(filter_input(INPUT_POST, "txtDiscriminacao")),
            "dataVencimento" => trim(filter_input(INPUT_POST, "txtVencimento")),
            "codCliente" => $this->clientes->getClienteByName(trim(filter_input(INPUT_POST, "txtCliente")),$_SESSION["empresa"]->codEmpresa)->row(0)->codCliente,
            "codCategoriaEntrada" => intval(trim(filter_input(INPUT_POST, "txtCategoria"))),
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
            "formaPagto" => trim(filter_input(INPUT_POST, "txtCodFormaPagto"))
        );
        
        $parametros["dataVencimento"] = substr($parametros["dataVencimento"],6,4) . "-" . substr($parametros["dataVencimento"],3,2) . "-" . substr($parametros["dataVencimento"],0,2); 
        
        if($parametros["status"] == 1){
            $parametros["dataPagto"] = date("Y-m-d");
        }
        
        if(isset($_POST["txtCodCompromisso"])){
            $parametros["codCompromisso"] = intval(trim(filter_input(INPUT_POST, "txtCodCompromisso")));
        }
        
        $this->entradas->inserir($parametros);
        redirect(base_url("index.php/contasReceber/"));
        
    }
    
    public function nota($codEntrada){
        
        $this->load->Model("Model_clientes", "clientes");
        
        $notaEntrada = $this->entradas->getEntrada($codEntrada);
        
        $parametros = array(
            "dados" => $this->entradas->getInvoice($codEntrada),
            "cliente" => $this->clientes->getCliente($notaEntrada->row(0)->codCliente)->row(0),
            "contasEmAberto" => $this->entradas->getDividas($notaEntrada->row(0)->codCliente)
        );
         
        if($parametros["dados"]->row(0)->codCompromisso > 0){
            $parametros["descricaoServicos"] = $this->entradas->getServicosDetalhados($parametros["dados"]->row(0)->codCompromisso);
        }
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('invoice', $parametros);
        $this->load->view('footer');
        
    }
    
    public function financasMensais(){
        
        $this->load->Model("Model_entradas", "entradas");
        $this->load->Model("Model_rendimentos", "rendimentos");
        
        $parametros = array(
            "entradas" => $this->entradas->getRendimentoMensal($_SESSION["usuario"]->codUsuario),
            "servicos" => $this->rendimentos->getMensal($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('relatorio_financeiro', $parametros);
        $this->load->view('footer');
        
    }

}
