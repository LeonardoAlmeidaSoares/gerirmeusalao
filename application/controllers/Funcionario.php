<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

    public function __construct() {
        parent::__construct();

        session_start();

        $this->load->Model("Model_funcionarios", "func");
    }

    public function index() {

        $parametrosListagem = array(
            "funcionarios" => $this->func->getFuncionarios($_SESSION["empresa"]->codEmpresa)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('funcionarios/listagem_funcionario', $parametrosListagem);
        $this->load->view('inc/footer');
    }

    public function cadastrar() {

        $this->load->Model("Model_cidades", "cidades");
        $this->load->Model("Model_cargos", "cargos");

        $parametrosCadastro = array(
            "estados" => $this->db->get_where("estado"),
            "cidades" => $this->cidades->getCidadesDoMesmoEstado(intval($_SESSION["empresa"]->codCidade)),
            "cargos" => $this->cargos->getCargos(intval($_SESSION["empresa"]->codEmpresa)),
            "dados" => NULL
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('funcionarios/cadastro_funcionario', $parametrosCadastro);
        $this->load->view('inc/footer');
    }

    public function realizar_cadastro() {

        if (!empty($_FILES["txtImagem"]["name"])) {
            $imagem = $_FILES["txtImagem"];
            $arr_nome_imagem = explode(".", $imagem["name"]);
            $nome_imagem = trim(uniqid() . "." . $arr_nome_imagem[count($arr_nome_imagem) - 1]);
            $upload_name = CAMINHO_IMAGENS_FUNCIONARIOS . DIRECTORY_SEPARATOR . $nome_imagem;
        } else {
            $arr_nome_imagem = [];
            $nome_imagem = "";
        }

        $parametrosInsercao = array(
            "email" => trim(filter_input(INPUT_POST, "txtEmail"), FILTER_SANITIZE_EMAIL),
            "apelido" => trim(filter_input(INPUT_POST, "txtApelido")),
            "nascimento" => trim(filter_input(INPUT_POST, "txtNascimento")),
            "sexo" => trim(filter_input(INPUT_POST, "txtSexo")),
            "nome" => trim(filter_input(INPUT_POST, "txtNome")),
            "telefone" => trim(filter_input(INPUT_POST, "txtTelefone")),
            "comissaoDinheiro" => intval(trim(filter_input(INPUT_POST, "txtComissaoDinheiro"))),
            "comissaoCartao" => intval(trim(filter_input(INPUT_POST, "txtComissaoDinheiro"))),
            "codCargo" => intval(trim(filter_input(INPUT_POST, "txtCargo"))),
            "imagem" => "assets" . DIRECTORY_SEPARATOR . "upload" . DIRECTORY_SEPARATOR . "colaboradores/" . $nome_imagem,
            "salario" => trim(filter_input(INPUT_POST, "txtSalario"))
        );

        $parametrosInsercao["nascimento"] = substr($parametrosInsercao["nascimento"], 6, 4)
                . "-" . substr($parametrosInsercao["nascimento"], 3, 2)
                . "-" . substr($parametrosInsercao["nascimento"], 0, 2);

        $parametrosInsercao["codEmpresa"] = intval($_SESSION["empresa"]->codEmpresa);

        //var_dump($parametrosInsercao, $_FILES["txtImagem"], $upload_name); exit;

        if (isset($_POST["txtCod"])) {
            if (strlen($nome_imagem) ==0) {
                unset($parametrosInsercao["imagem"]);
            } else {
                if (!move_uploaded_file($_FILES["txtImagem"]["tmp_name"], $upload_name)) {
                    var_dump("Houve um erro ao subir a imagem");
                    exit;
                }
            }
        } else {
            if (strlen($parametrosInsercao["imagem"]) == 0) {
                $parametrosInsercao["imagem"] = base_url("assets" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . CAMINHO_IMAGEM_COLABORADOR_PADRAO);
            } else {
                if (!move_uploaded_file($_FILES["txtImagem"]["tmp_name"], $upload_name)) {
                    var_dump("Houve um erro ao subir a imagem");
                    exit;
                }
            }
        }

        if (isset($_POST["txtCod"])) {

            $cod = intval(trim(filter_input(INPUT_POST, "txtCod")));

            $this->func->Alterar($cod, $parametrosInsercao);
        } else {
            if ($this->func->Inserir($parametrosInsercao)) {

                $this->load->helper('string');

                $senha = random_string('alnum', 6);

                $this->load->Model("Model_usuario", "user");

                $parametrosUsuario = array(
                    "nome" => $parametrosInsercao["nome"],
                    "email" => $parametrosInsercao["email"],
                    "status" => 1,
                    "codEmpresa" => $parametrosInsercao["codEmpresa"],
                    "codPermissao" => COD_PERMISSAO_COLABORADOR,
                    "imagem" => $parametrosInsercao["imagem"],
                    "senha" => md5($senha)
                );

                if ($this->user->Inserir($parametrosUsuario)) {
                    $config = Array(
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'wordwrap' => TRUE
                    );

                    $this->load->library('email', $config);
                    $this->load->Model("Model_email", "emails");

                    $parametros = array(
                        "senha" => $senha,
                        "logo" => "http://www.gerirmeusalao.com.br/assets/img/logo_h.png",
                        "nomeInstituicao" => $_SESSION["empresa"]->nome,
                        "email" => $parametrosInsercao["email"]
                    );

                    $this->email->from('gerirmeusalao.com.br', 'Gerir Meu Salão');
                    $this->email->to($parametrosInsercao["email"]);
                    $this->email->subject('Cadastro realizado com sucesso');
                    $this->email->message($this->load->view("emails/novoCadastro", $parametros, TRUE));
                    $this->email->send();
                    redirect(base_url("index.php/funcionario/"));
                }
            }
        }
        redirect(base_url("index.php/funcionario"));
    }

    public function visualizar($codFuncionario) {

        //$this->load->Model("Model_cidades", "cidades");
        //$this->load->Model("Model_cargos", "cargos");

        /*
          $parametrosCadastro = array(
          "estados" => $this->db->get_where("estado"),
          "cidades" => $this->cidades->getCidadesDoMesmoEstado(intval($_SESSION["empresa"]->codCidade)),
          "cargos" => $this->cargos->getCargos(intval($_SESSION["empresa"]->codEmpresa)),
          "dados" => NULL
          );
         */
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('funcionarios/visualizar'/* , $parametrosCadastro */);
        $this->load->view('inc/footer');
    }

    public function alterar($cod) {

        $this->load->Model("Model_cidades", "cidades");
        $this->load->Model("Model_cargos", "cargos");

        $parametrosCadastro = array(
            "estados" => $this->db->get_where("estado"),
            "cidades" => $this->cidades->getCidadesDoMesmoEstado(intval($_SESSION["empresa"]->codCidade)),
            "cargos" => $this->cargos->getCargos(intval($_SESSION["empresa"]->codEmpresa)),
            "codProcesso" => $cod,
            "dados" => $this->db->get_where("funcionario", array("codFuncionario" => $cod))->row(0)
        );

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('funcionarios/cadastro_funcionario', $parametrosCadastro);
        $this->load->view('inc/footer');
    }

    public function alterarSenha() {

        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('funcionarios/alterar_senha'/* , $parametros */);
        $this->load->view('inc/footer');
    }

    public function deletar() {

        $cod_func = intval(trim(filter_input(INPUT_POST, "codigo")));

        $this->func->Alterar($cod_func, [
            "status" => 0
        ]);
    }

}
