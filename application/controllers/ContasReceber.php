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
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('contas_receber/listagem_contas_receber', $parametros);
        $this->load->view('inc/footer');
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
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('contas_receber/cadastro_contas_receber', $parametros);
        $this->load->view('inc/footer');
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
    
    public function criarNotaServicoNaoFinalizado($cod){

        $codCompromisso = $this->db->get_where("notaEntrada", array("codNotaEntrada" => $cod))->row(0)->codCompromisso;
       
        $this->db->where("codCompromisso", $codCompromisso)
                ->update("compromisso", array("status" => 1));
        redirect(base_url("index.php/contasReceber/nota/$cod"));
    }

    public function nota($codEntrada){
        
        $this->load->Model("Model_clientes", "clientes");
        
        $notaEntrada = $this->entradas->getEntrada($codEntrada);
        
        $dados = $this->entradas->getInvoice($codEntrada);

        if(is_null($notaEntrada)){
            $_SESSION["msg_erro"] = "Nota de Entrada Inexistente";
            redirect(base_url("index.php/contasReceber")); 
        } else {
            $notaEntrada = $notaEntrada->row(0);
        }

        $parametros = array(
            "dados" => $dados,
            "cliente" => $this->clientes->getCliente($notaEntrada->codCliente)->row(0),
            "contasEmAberto" => $this->entradas->getDividas($notaEntrada->codCliente),
            "descricaoServicos" => $this->entradas->getServicosDetalhados($codEntrada),
            "codNota" => $codEntrada
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('contas_receber/invoice', $parametros);
        $this->load->view('inc/footer');
        
    }
    
    public function financasMensais(){
        
        $this->load->Model("Model_entradas", "entradas");
        $this->load->Model("Model_rendimentos", "rendimentos");
        
        $parametros = array(
            "entradas" => $this->entradas->getRendimentoMensal($_SESSION["usuario"]->codUsuario),
            "servicos" => $this->rendimentos->getMensal($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('contas_receber/relatorio_financeiro', $parametros);
        $this->load->view('inc/footer');
        
    }

    public function alterarStatus(){

        $codNota = intval(trim(filter_input(INPUT_POST, "codNota")));
        $status = intval(trim(filter_input(INPUT_POST, "status")));

        $this->db->where("codNotaEntrada", $codNota)->update("notaEntrada", array("status" => $status, "dataPagto" => date("Y-m-d H:i")));
        echo $this->db->last_query();

    }

}