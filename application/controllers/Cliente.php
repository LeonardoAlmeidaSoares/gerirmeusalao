<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    function __construct() {
        parent::__construct();

        session_start();

        $this->load->Model("Model_clientes", "cliente");
        $this->load->Helper("Util_helper");
    }

    public function index() {

        $parametrosListagem = array(
            "clientes" => $this->cliente->getClientes($_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('cliente/listagem_cliente', $parametrosListagem);
        $this->load->view('inc/footer');
    }

    public function cadastrar() {

        $this->load->Model("Model_cidades", "cidades");

        $parametrosCadastro = array(
            "estados" => $this->db->get_where("estado"),
            "cidades" => $this->cidades->getCidadesDoMesmoEstado(intval($_SESSION["empresa"]->codCidade))
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('cliente/cadastro_cliente', $parametrosCadastro);
        $this->load->view('inc/footer');
    }

    public function realizar_cadastro() {

        if (isset($_FILES["imagem"])) {
            $imagem = $_FILES["imagem"];
            $arr_nome_imagem = explode(".", $imagem["name"]);
            $nome_imagem = trim(uniqid() . "." . $arr_nome_imagem[count($arr_nome_imagem) - 1]);
            $upload_name = CAMINHO_IMAGENS_CLIENTES .  DIRECTORY_SEPARATOR . $nome_imagem;
        } else {
            $arr_nome_imagem = [];
            $nome_imagem = "";
        }

        $parametrosInsercao = array(
            "email" => trim(filter_input(INPUT_POST, "txtEmail"), FILTER_SANITIZE_EMAIL),
            "nascimento" => trim(filter_input(INPUT_POST, "txtNascimento")),
            "sexo" => trim(filter_input(INPUT_POST, "txtSexo")),
            "nome" => trim(filter_input(INPUT_POST, "txtNome")),
            "cep" => trim(filter_input(INPUT_POST, "txtCep")),
            "cpf" => trim(filter_input(INPUT_POST, "txtCpf")),
            "telefone" => trim(filter_input(INPUT_POST, "txtTelefone")),
            "codCidade" => intval(trim(filter_input(INPUT_POST, "txtCidade"))),
            "bairro" => trim(filter_input(INPUT_POST, "txtBairro")),
            "logradouro" => trim(filter_input(INPUT_POST, "txtLogradouro")),
            "numero" => trim(filter_input(INPUT_POST, "txtNumero")),
            "complemento" => trim(filter_input(INPUT_POST, "txtComplemento")),
            "imagem" => "assets" . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . "clientes" . DIRECTORY_SEPARATOR . $nome_imagem,
        );

        if (empty($parametrosInsercao["imagem"])) {

            $parametrosInsercao["imagem"] = ($parametrosInsercao["sexo"] == "MASCULINO") 
                    ? base_url("assets" . DIRECTORY_SEPARATOR . "img"  . DIRECTORY_SEPARATOR . CAMINHO_IMAGEM_CLIENTE_PADRAO) 
                    : base_url("assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . CAMINHO_IMAGEM_CLIENTE_PADRAO_MULHER);
        } else {
            if (!move_uploaded_file($_FILES["imagem"]["tmp_name"], $upload_name)) {
                var_dump("Houve um erro ao subir a imagem");
                exit;
            }
        }
        
        $parametrosInsercao["codEmpresa"] = intval($_SESSION["empresa"]->codEmpresa);
        $parametrosInsercao["nascimento"] = substr($parametrosInsercao["nascimento"], 6, 4) . "-" .
                substr($parametrosInsercao["nascimento"], 3, 2) . "-" .
                substr($parametrosInsercao["nascimento"], 0, 2);

        $this->cliente->Inserir($parametrosInsercao);

        redirect(base_url("index.php/cliente"));
    }

    public function alterar($codCliente) {

        $this->load->Model("Model_cidades", "cidades");

        $parametrosCadastro = array(
            "estados" => $this->db->get_where("estado"),
            "cidades" => $this->cidades->getCidadesDoMesmoEstado(intval($_SESSION["empresa"]->codCidade)),
            "dados" => $this->cliente->getCliente($codCliente)->row(0),
            "servicosprestados" => $this->cliente->getServicosPrestados($codCliente, $_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('cliente/perfil_cliente', $parametrosCadastro);
        $this->load->view('inc/footer');
    }

    public function alterarElemento($elemento) {

        $parametros = array(
            $elemento => trim(filter_input(INPUT_POST, "value"))
        );

        $cod = intval(trim(filter_input(INPUT_POST, "pk")));

        if ($elemento == "nascimento") {
            $data = $parametros[$elemento];
            $parametros[$elemento] = substr($data, 6, 4) . "-" . substr($data, 3, 2) . "-" . substr($data, 0, 2);
        }

        $this->db->where("codCliente", $cod)->update("cliente", $parametros);
    }

    public function getByNome() {

        $nome = trim(filter_input(INPUT_POST, "nome"));

        $ret = $this->db->get_where("cliente", array(
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
            "nome" => $nome
        ));

        echo json_encode($ret->result_array());
    }

    public function email() {

        //$this->load->Model("Model_email", "emails");

        $this->load->library('email');
        $this->email->set_mailtype("html");

        $parametros = array(
            "senha" => "152321",
            "logo" => "http://localhost/salao/assets/img/logo_h.png",
            "nomeInstituicao" => "Nome da Instituicao",
            "email" => "leonardoalmeidasoares23@gmail.com"
        );

        $this->email->from('gerirmeusalao.com.br', 'Gerir Meu Salão');
        $this->email->to("leonardoalmeidasoares23@gail.com");
        $this->email->subject('Cadastro realizado com sucesso');
        $this->email->message($this->load->view("emails/novoCadastro", $parametros, TRUE));

        $this->email->send();
        $this->email->print_debugger(array('headers'));
    }

    public function historico($codCliente) {

        $parametros = array(
            "historico" => $this->cliente->getHistorico($codCliente, $_SESSION["empresa"]->codEmpresa),
            "dadosCliente" => $this->cliente->getCliente($codCliente)
        );

        //var_dump($parametros["historico"]->result()); exit;

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('cliente/timeline', $parametros);
        $this->load->view('inc/footer');
    }

    public function aniversariantes() {

        $parametros = array(
            "clientes" => $this->cliente->aniversariantes($_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('cliente/aniversariantes', $parametros);
        $this->load->view('inc/footer');
    }

}
