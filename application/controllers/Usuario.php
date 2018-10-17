<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();

        session_start();

        $this->load->Model("Model_usuario", "user");
    }

    public function index() {

        $this->load->Helper("Util_helper");
        
        $parametrosListagem = array(
            "usuarios" => $this->user->getUsuarios($_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('usuario/listagem_usuarios', $parametrosListagem);
        $this->load->view('inc/footer');
    }

    public function cadastrar() {

        $this->load->Model("Model_funcionarios", "func");
        $this->load->Model("Model_permissao", "perm");

        $parametrosCadastro = array(
            "funcionarios" => $this->func->getFuncionarios($_SESSION["empresa"]->codEmpresa),
            "permissoes" => $this->perm->getPermissoes()
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('usuario/cadastro_usuario', $parametrosCadastro);
        $this->load->view('inc/footer');
    }

    public function realizar_cadastro() {

        $this->load->Model("Model_funcionarios", "func");

        $codFuncionario = intval(trim(filter_input(INPUT_POST, "txtFuncionario")));

        $dadosFunc = $this->func->getFuncionario($codFuncionario)->row(0);

        $parametrosInsercao = array(
            "nome" => $dadosFunc->nome,
            "email" => $dadosFunc->email,
            "codPermissao" => intval(trim(filter_input(INPUT_POST, "txtPermissao"))),
            "senha" => md5(trim(filter_input(INPUT_POST, "txtSenha"))),
            "status" => 0,
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
            "imagem" => "https://linustechtips.com/main/uploads/set_resources_4/84c1e40ea0e759e3f1505eb1788ddf3c_default_photo.png"
        );

        $this->user->Inserir($parametrosInsercao);
        redirect(base_url("index.php/usuario/"));
    }

    public function alterar($codUsuario) {

        $this->load->Model("Model_cidades", "cidades");
        $this->load->Model("Model_permissao", "perm");

        $parametrosCadastro = array(
            "codProcesso" => $codUsuario,
            "dados" => $this->user->getUsuario($codUsuario)->row(0),
            "permissoes" => $this->perm->getPermissoes()
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('usuario/cadastro_usuario', $parametrosCadastro);
        $this->load->view('inc/footer');
    }

    public function alterarElemento($elemento) {

        $parametros = array(
            $elemento => trim(filter_input(INPUT_POST, "value"))
        );

        $cod = intval(trim(filter_input(INPUT_POST, "pk")));

        $this->db->where("codUsuario", $cod)->update("cliente", $parametros);
    }

    public function alterarSenha($cod) {

        $dados = $this->db->get_where("funcionario", array("codFuncionario" => $cod))->row(0);
        $parametros = array(
            "email" => $dados->email,
            "codigo" => $cod,
            "nome" => $dados->nome
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('funcionarios/alterar_senha', $parametros);
        $this->load->view('inc/footer');
    }

    public function gerarNovaSenha() {
        $this->load->view("paginas_comuns/alterar_propria_senha");
    }

    public function efetuarTrocaDeSenha() {

        $email = trim(filter_input(INPUT_POST, "txtEmail"));
        $senha = trim(filter_input(INPUT_POST, "txtSenha1"));

        $parametros = array(
            "senha" => md5($senha),
            "alterarSenha" => 0
        );

        $this->db->where("email", $email)->update("usuario", $parametros);

        //echo $this->db->last_query();

        $config = Array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);

        $parametrosEmail = array(
            "senha" => $senha,
            "logo" => "http://www.gerirmeusalao.com.br/assets/img/logo_h.png",
            "nomeInstituicao" => $_SESSION["empresa"]->nome,
            "email" => $email
        );

        $this->email->from('gerirmeusalao.com.br', 'Gerir Meu Salão');
        $this->email->to($email);
        $this->email->subject('Cadastro realizado com sucesso');
        $this->email->message($this->load->view("emails/novaSenha", $parametrosEmail, TRUE));

        $this->email->send();

        $_SESSION["msg_ok"] = "A Senha foi alterada com sucess";
        redirect(base_url("index.php/usuario/"));
    }
}