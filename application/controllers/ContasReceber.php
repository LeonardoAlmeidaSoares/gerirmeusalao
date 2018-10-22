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
        
        //echo $this->db->last_query();exit;
        
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
        $codNota = $this->db->insert_id();

        if($parametros["formaPagto"] == "DINHEIRO"){
            if($parametros["status"] == 1){
                $parametrosMovimentacao = array(
                    "tipoMovimentacao" => "ENT",
                    "valor" => $parametros["valor"],
                    "codUsuario" => intval($_SESSION["usuario"]->codUsuario),
                    "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
                    "horario" => date("Y-m-d H:i:s"),
                    "comentario" => "Gerado a partir da compra $codNota",
                    "codCaixa" => $_SESSION["caixa"]->codCaixa 
                );

                $this->db->insert("movimentacaofinanceira", $parametrosMovimentacao);
            }
        }

        redirect(base_url("index.php/contas_receber/"));
        
    }
    
    public function criarNotaServicoNaoFinalizado($cod){

        $this->load->Model("Model_servico", "serv");
        $this->load->Model("Model_compromissos", "agenda");

        $nota = $this->db->get_where("notaentrada", 
                array("codNotaEntrada" => $cod))->row(0);
        
        $codCompromisso = $nota->codCompromisso;
        
        //var_dump($codCompromisso); exit;
        
        $this->db->where("codCompromisso", $codCompromisso)
                ->update("compromisso", array("status" => 1));

        $resumo = "<b>REALIZOU: </b>";

        $dados = $this->agenda->getCompromisso($codCompromisso);
        //$dadosNota = $this->entradas->getByCompromisso($codCompromisso);
                
        $aux = [
            "codFuncionario" => $dados->row(0)->codFuncionario,
            "codCliente" => $dados->row(0)->codCliente,
            "codServico" => $dados->row(0)->codServico,
            "horario" => $dados->row(0)->horario,
            "codNotaEntrada" => $cod
        ];

        
        $this->db->insert("servicoprestado", $aux);
                
        $dadosServico = $this->serv->getServico($dados->row(0)->codServico, $_SESSION["empresa"]->codEmpresa)->row(0);

        $resumo .= "<br>" . $dadosServico->descricao;
        $this->db->where("codCompromisso", $codCompromisso)->update("compromisso", array("resumo"=> $resumo));

        redirect(base_url("contas_receber/$cod"));
    }

    public function nota($codEntrada){
        
        $this->load->Model("Model_clientes", "clientes");
        
        $notaEntrada = $this->entradas->getEntrada($codEntrada);
        
        if(is_null($notaEntrada)){
            $_SESSION["msg_erro"] = "Nota de Entrada Inexistente";
            redirect(base_url("index.php/contas_receber")); 
        } else {
            $notaEntrada = $notaEntrada->row(0);
        }

        $dados = $this->entradas->getInvoice($codEntrada);
        $parametros = array(
            "dados" => $dados,
            "cliente" => $this->clientes->getCliente($notaEntrada->codCliente)->row(0),
            "contasEmAberto" => $this->entradas->getDividas($notaEntrada->codCliente),
            "codNota" => $codEntrada
        );

        
        if(intval($notaEntrada->codCompromisso) > 0)
            $parametros["descricaoServicos"] = $this->entradas->getServicosDetalhados($codEntrada);
        else
            $parametros["descricaoServicos"] = $this->entradas->getProdutosDetalhados($codEntrada);

        //var_dump($parametros["descricaoServicos"]); exit;
        
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
        $formaPagto = trim(filter_input(INPUT_POST, "formaPagto"));

        $dadosNota = $this->db->get_where("notaentrada", array("codNotaEntrada" => $codNota));

        if($dadosNota->row(0)->status == 1){
            echo json_encode(array("msg"=>"Nota já foi paga", "type" => "error", "title" => "Opss..."));
            exit();
        }
        
        $this->db->where("codNotaEntrada", $codNota)->update("notaentrada", array("status" => $status, "dataPagto" => date("Y-m-d H:i"), "formaPagto" => $formaPagto));

        if($formaPagto == "DINHEIRO"){
            if($status == 1){

                $parametrosMovimentacao = array(
                    "tipoMovimentacao" => "ENT",
                    "valor" => $dadosNota->row(0)->valor,
                    "codUsuario" => intval($_SESSION["usuario"]->codUsuario),
                    "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
                    "horario" => date("Y-m-d H:i:s"),
                    "comentario" => "Gerado a partir da compra $codNota",
                    "codCaixa" => $_SESSION["caixa"]->codCaixa 
                );

                $this->db->insert("movimentacaofinanceira", $parametrosMovimentacao);
            }
        }

        echo json_encode(array("msg"=>"Pagamento Realizado com Sucesso", "type" => "success", "title" => "Finalizado"));

    }

    public function vencendoHoje(){

        $parametros = array(
            "entradas" => $this->entradas->getEntradasVencendoHoje($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('contas_receber/listagem_contas_vencendo_hoje', $parametros);
        $this->load->view('inc/footer');
    }

}