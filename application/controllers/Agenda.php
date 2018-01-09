<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
        $this->load->Model("Model_compromissos", "agenda");
        
    }
    
    public function index() {
        
        //var_dump($_SESSION["permissoes"]);
        
        $this->load->Model("Model_clientes", "clientes");
        $this->load->Model("Model_funcionarios", "func");
        
        
        $parametros = array(
            "funcionarios" => $this->func->getFuncionarios($_SESSION["empresa"]->codEmpresa),
            
            "compromissos" => ($_SESSION["usuario"]->codPermissao != COD_PERMISSAO_COLABORADOR) 
                            ? $this->agenda->getCompromissos($_SESSION["empresa"]->codEmpresa)
                            : $this->agenda->getListaCompromissos($_SESSION["dadosColaborador"]->codFuncionario),
            
            "clientes" => $this->clientes->getClientes($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view(($_SESSION["usuario"]->codPermissao == COD_PERMISSAO_COLABORADOR)
                ? 'agendaColaborador' : "agenda", $parametros);
        $this->load->view('footer');
        
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
    }
    
    public function cadastrar(){
        
        $this->load->Model("Model_clientes", "clientes");
        $this->load->Model("Model_servico", "servico");
        
        $servico = $this->servico->getServico(intval(trim(filter_input(INPUT_POST, "txtServico"))))->row(0);
        
        $parametros = array(
            "codFuncionario" => intval(trim(filter_input(INPUT_POST, "txtCodFunc"))),
            "horario" => trim(filter_input(INPUT_POST, "txtHorario")),
            "codServico" => intval(trim(filter_input(INPUT_POST, "txtServico"))),
            "codCliente" => intval($this->clientes->getClienteByName(trim(filter_input(INPUT_POST, "txtCliente")), $_SESSION["empresa"]->codEmpresa)->row(0)->codCliente),
            "descricao" => $servico->descricao . " para " . trim(filter_input(INPUT_POST, "txtCliente")),
            "status" => 0,
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
            "dataFim" => trim(filter_input(INPUT_POST, "txtHorario")),
            "valor" => (isset($_POST["txtValor"])) ? $servico->valorComum : $servico->valorPromocional
        );
        
        $dt = new Datetime($parametros["horario"]);
        
        for($i = 1; $i <= $servico->horariosEstimados; $i++){
            $dt->add(new DateInterval('PT15M'));
            $parametros["dataFim"] = $dt->format('Y-m-d H:i:s');
        }
        
        $this->agenda->cadastrar($parametros);
        
        redirect(base_url("index.php/agenda/"));
        
    }

}
