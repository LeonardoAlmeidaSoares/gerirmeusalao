<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
        $this->load->Model("Model_compromissos", "agenda");
        
    }
    
    public function index() {
        
        $this->load->Model("Model_clientes", "clientes");
        $this->load->Model("Model_funcionarios", "func");
        
        
        $parametros = array(
            "funcionarios" => $this->func->getFuncionarios($_SESSION["empresa"]->codEmpresa),
            
            "compromissos" => ($_SESSION["usuario"]->codPermissao != COD_PERMISSAO_COLABORADOR) 
                            ? $this->agenda->getCompromissos($_SESSION["empresa"]->codEmpresa)
                            : $this->agenda->getListaCompromissos($_SESSION["dadosColaborador"]->codFuncionario),
            
            "clientes" => $this->clientes->getClientes($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view(($_SESSION["usuario"]->codPermissao == COD_PERMISSAO_COLABORADOR)
                ? 'agenda/agendaColaborador' : "agenda/agenda_teste", $parametros);
        $this->load->view('inc/footer');
        
    }

    public function agenda() {
        
        $this->load->Model("Model_clientes", "clientes");
        $this->load->Model("Model_funcionarios", "func");
        
        
        $parametros = array(
            "funcionarios" => $this->func->getFuncionarios($_SESSION["empresa"]->codEmpresa),
            
            "compromissos" => ($_SESSION["usuario"]->codPermissao != COD_PERMISSAO_COLABORADOR) 
                            ? $this->agenda->getCompromissos($_SESSION["empresa"]->codEmpresa)
                            : $this->agenda->getListaCompromissos($_SESSION["dadosColaborador"]->codFuncionario),
            
            "clientes" => $this->clientes->getClientes($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view(($_SESSION["usuario"]->codPermissao == COD_PERMISSAO_COLABORADOR)
                ? 'agenda/agendaColaborador' : "agenda/agenda", $parametros);
        $this->load->view('inc/footer');
        
    }
    
    public function getListaPossibilidades(){
       
        $this->load->Model("Model_funcionarios", "func");
        $this->load->Model("Model_servico", "serv");
        
        $codFuncionario = intval(trim(filter_input(INPUT_POST, "funcionarioSelecionado")));
        $horario = trim(filter_input(INPUT_POST, "horarioClicado"));
        $codEmpresa = intval($_SESSION["empresa"]->codEmpresa);
        
        $aux = $this->serv->getServicos($codEmpresa);
        
        $datetime = new DateTime($horario);
        $dias = $datetime->format('d/m/Y H');
        $index = $datetime->format('Y-m-d H');
        $horarios = array(
            $index . ":00:00" => $dias . ":00", 
            $index . ":15:00" => $dias . ':15', 
            $index . ":30:00" => $dias . ":30", 
            $index . ":45:00" => $dias . ":45"
        );
        
        $ret = array();
        
        $ret["Funcionario"] = $this->func->getFuncionario($codFuncionario)->row(0);
        $ret["Servicos"] = $aux->result_array();
        $ret["Horarios"] = $horarios;
       
        echo json_encode($ret);
        
    }
    
    public function alterarStatus(){
        
        $codCompromisso = intval(trim(filter_input(INPUT_POST, "codEvento")));
        $status = intval(trim(filter_input(INPUT_POST, "status")));
       
        $this->db->where("codCompromisso", $codCompromisso)
                ->update("compromisso", array("status" => $status));

        if($status == 2){
            
            $this->load->Model("Model_servico", "serv");

            $resumo = "<b>REALIZOU: </b>";

            $dados = $this->agenda->getCompromisso($codCompromisso);
            $dadosNota = $this->db->get_where("notaentrada", array("codCompromisso" => $codCompromisso));

            $aux = array(
                "codFuncionario" => $dados->row(0)->codFuncionario,
                "codCliente" => $dados->row(0)->codCliente,
                "codServico" => $dados->row(0)->codServico,
                "horario" => $dados->row(0)->horario,
                "codNotaEntrada" => $dadosNota->row(0)->codNotaEntrada
            );

            $this->db->insert("servicoprestado", $aux);

            $dadosServico = $this->serv->getServico($dados->row(0)->codServico, $_SESSION["empresa"]->codEmpresa)->row(0);

            $resumo .= "<br>" . $dadosServico->descricao;
            $this->db->where("codCompromisso", $codCompromisso)->update("compromisso", array("resumo"=> $resumo));

        }
    }

    public function cadastrar(){

        $this->load->Model("Model_clientes", "clientes");
        $this->load->Model("Model_servico", "servico");
        $this->load->Model("Model_entradas", "entrada");
        
        $codEmpresa = $_SESSION["empresa"]->codEmpresa;
        $codServico = intval(trim(filter_input(INPUT_POST, "txtServico")));

        $servico = $this->servico->getServico($codServico, $codEmpresa)->row(0);

        $parametros = array(
            "codFuncionario" => intval(trim(filter_input(INPUT_POST, "txtCodFunc"))),
            "horario" => trim(filter_input(INPUT_POST, "txtHorario")),
            "codServico" => intval(trim(filter_input(INPUT_POST, "txtServico"))),
            "codCliente" => intval($this->clientes->getClienteByName(trim(filter_input(INPUT_POST, "txtCliente")), $_SESSION["empresa"]->codEmpresa)->row(0)->codCliente),
            "descricao" => $servico->descricao . " para " . trim(filter_input(INPUT_POST, "txtCliente")),
            "status" => 0,
            "codEmpresa" => $codEmpresa,
            "dataFim" => trim(filter_input(INPUT_POST, "txtHorario")),
            "valor" => $servico->valorComum
        );

        $dt = new Datetime($parametros["horario"]);

        for($i = 1; $i <= $servico->horariosEstimados; $i++){
            $dt->add(new DateInterval('PT15M'));
            $parametros["dataFim"] = $dt->format('Y-m-d H:i:s');
        }

        $this->agenda->cadastrar($parametros);

        $parametrosEntrada = array(
            "codCategoriaEntrada" => 1,
            "codCliente" => $parametros["codCliente"],
            "codCompromisso" => $this->db->insert_id(),
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
            "valor" => $parametros["valor"],
            "status" => 0,
            "discriminacao" => "Valor Referente a Serviço de Código [" . $this->db->insert_id() . "]",
            "dataVencimento" => $parametros["dataFim"]
        );

        $this->entrada->Inserir($parametrosEntrada);
        
        redirect(base_url("index.php/agenda/"));
        
    }

    public function listagem(){

        $this->load->Model("Model_funcionarios", "func");

        $parametros = array(
            "colaboradores" => $this->func->getFuncionarios($_SESSION["empresa"]->codEmpresa),
            "compromissos" => $this->agenda->getListaCompromissosDetalhados($_SESSION["empresa"]->codEmpresa)
            
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('agenda/listagem_compromissos', $parametros);
        $this->load->view('inc/footer');
    }

    public function cadastro(){

        $this->load->Model("Model_servico", "servicos");
        $this->load->Model("Model_funcionarios", "colaboradores");

        $parametros = array(
            "funcionarios" => $this->colaboradores->getFuncionarios($_SESSION["empresa"]->codEmpresa),
            "servicos" => $this->servicos->getServicos($_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('agenda/cadastro_expresso', $parametros);
        $this->load->view('inc/footer');
    }

    public function cadastro_rapido(){

        $this->load->Model("Model_clientes", "clientes");
        $this->load->Model("Model_servico", "servico");
        $this->load->Model("Model_entradas", "entrada");
        
        $codEmpresa = $_SESSION["empresa"]->codEmpresa;
        $codServico = intval(trim(filter_input(INPUT_POST, "txtServico")));

        $servico = $this->servico->getServico($codServico, $codEmpresa)->row(0);
        $horario = date("Y-m-d") . " " . trim(filter_input(INPUT_POST, "txtHorario"));


        $parametros = array(
            "codFuncionario" => intval(trim(filter_input(INPUT_POST, "txtCodColaborador"))),
            "horario" => $horario,
            "codServico" => intval(trim(filter_input(INPUT_POST, "txtServico"))),
            "codCliente" => isset($_POST["txtCodCliente"])?intval(trim(filter_input(INPUT_POST, "txtCodCliente"))) :0,
            "descricao" => $servico->descricao . " para " . trim(filter_input(INPUT_POST, "txtCliente")),
            "status" => 0,
            "codEmpresa" => $codEmpresa,
            "dataFim" => trim(filter_input(INPUT_POST, "txtHorario")),
            "valor" => $servico->valorComum
        );

        $dt = new Datetime($parametros["horario"]);

        for($i = 1; $i <= $servico->horariosEstimados; $i++){
            $dt->add(new DateInterval('PT15M'));
            $parametros["dataFim"] = $dt->format('Y-m-d H:i:s');
        }

        $this->agenda->cadastrar($parametros);

        $parametrosEntrada = array(
            "codCategoriaEntrada" => 1,
            "codCliente" => 0,
            "codCompromisso" => $this->db->insert_id(),
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
            "valor" => $parametros["valor"],
            "status" => 0,
            "discriminacao" => "Valor Referente a Serviço de Código [" . $this->db->insert_id() . "] %".trim(filter_input(INPUT_POST, "txtCliente"))."%",
            "dataVencimento" => $parametros["dataFim"]
        );

        $this->entrada->Inserir($parametrosEntrada);
        
        redirect(base_url("index.php/agenda/"));

    }

    public function getListaCompromissos(){

        $codFuncionario = intval(filter_input(INPUT_POST, "codColaborador"));

        if($codFuncionario > 0){

            $lista = $this->agenda->getListaCompromissos($codFuncionario);
            $listaComp = array();
            foreach($lista->result() as $item){

                array_push($listaComp, array(
                    "id" => $item->codCompromisso,
                    "title" => $item->descricao,
                    "start" => $item->horario,
                    "end" => $item->dataFim
                ));

            }

            echo json_encode($listaComp);

        }else{
           echo null;
        }

    }

    public function listagemHoje(){

        $this->load->Model("Model_funcionarios", "func");

        $parametros = array(
            "compromissos" => $this->agenda->getListaCompromissosDetalhadosVencendoHoje($_SESSION["empresa"]->codEmpresa),
            "colaboradores" => $this->func->getFuncionarios($_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('agenda/listagem_hoje', $parametros);
        $this->load->view('inc/footer');
        
    }

    public function novo(){
        
        $this->load->Model("Model_servico", "servicos");
        $this->load->Model("Model_funcionarios", "colaboradores");
        $this->load->Model("Model_clientes", "clientes");

        $parametros = array(
            "funcionarios" => $this->colaboradores->getFuncionarios($_SESSION["empresa"]->codEmpresa),
            "servicos" => $this->servicos->getServicos($_SESSION["empresa"]->codEmpresa),
            'clientes' => $this->clientes->getClientes($_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('agenda/cadastro', $parametros);
        $this->load->view('inc/footer');
        
    }
}