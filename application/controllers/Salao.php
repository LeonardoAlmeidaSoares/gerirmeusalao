<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Salao extends CI_Controller {

    public function __construct() {
        parent::__construct();

        session_start();
    }

    public function index() {

        $this->load->library('migration');

        if (!$this->migration->current()) {
            echo $this->migration->error_string();
        }

        if (!isset($_SESSION["usuario"])) {

            $this->load->view('inc/header');
            $this->load->view('paginas_comuns/login');
        } else {

            if ($_SESSION["usuario"]->alterarSenha == 1) {
                redirect(base_url("index.php/usuario/gerarNovaSenha"));
            }
            if ($_SESSION["usuario"]->codPermissao == COD_PERMISSAO_COLABORADOR) {

                $this->load->Model("Model_relatorios", "relatorios");
                $this->load->Model("Model_compromissos", "agenda");
                $this->load->Model("Model_lembrete", "lemb");

                $parametros = array(
                    //Tabela de Próximos COmpromissos
                    "proximosCompromissos" => $this->agenda->proximosCompromissosColaborador($_SESSION["dadosColaborador"]->codFuncionario),
                    //Boxes
                    "mensagensParaHoje" => $this->lemb->getLembretes($_SESSION["empresa"]->codEmpresa)->num_rows(),
                    //Gráficos
                    "compromissosUltimoAno" => $this->relatorios->getCompromissosUltimoAnoByUser($_SESSION["dadosColaborador"]->codFuncionario),
                    "servicosPrestadosUltimoMes" => $this->relatorios->getListagemServicosMesAtualByUser($_SESSION["dadosColaborador"]->codFuncionario),
                );

                $this->load->view('inc/header');
                $this->load->view('inc/barraSuperior');
                $this->load->view('inc/menu');
                $this->load->view('dashboard/dashboardColaborador', $parametros);
                $this->load->view('inc/footer');
            } else {

                $this->load->Model("Model_relatorios", "relatorios");
                $this->load->Model("Model_compromissos", "agenda");
                $this->load->Model("Model_clientes", "clientes");
                $this->load->Model("Model_funcionarios", "func");
                $this->load->Model("Model_lembrete", "lemb");
                $this->load->Model("Model_entradas", "entradas");
                $this->load->Model("Model_saidas", "saidas");

                $parametros = array(
                    //Gráficos
                    "compromissosUltimoAno" => $this->relatorios->getCompromissosUltimoAno($_SESSION["empresa"]->codEmpresa),
                    "servicosPrestadosUltimoMes" => $this->relatorios->getListagemServicosMesAtual($_SESSION["empresa"]->codEmpresa),
                    //Tabela de Próximos COmpromissos
                    "proximosCompromissos" => $this->agenda->proximosCompromissos($_SESSION["empresa"]->codEmpresa),
                    //Informações em boxes
                    "totalClientes" => $this->clientes->getClientes($_SESSION["empresa"]->codEmpresa)->num_rows(),
                    "aniversariantes" => $this->clientes->aniversariantes($_SESSION["empresa"]->codEmpresa)->num_rows(),
                    "colaboradores" => $this->func->getSituacao($_SESSION["empresa"]->codEmpresa),
                    "mensagensParaHoje" => $this->lemb->getLembretes($_SESSION["empresa"]->codEmpresa)->num_rows(),
                    "vencimentosVencendoHoje" => $this->saidas->getVencimentoHoje($_SESSION["empresa"]->codEmpresa)->num_rows(),
                    "vencimentosRecebendoHoje" => $this->entradas->getVencimentoHoje($_SESSION["empresa"]->codEmpresa)->num_rows()
                );

                $this->load->view('inc/header');
                $this->load->view('inc/barraSuperior');
                $this->load->view('inc/menu');
                $this->load->view('dashboard/dashboardPrincipal', $parametros);
                $this->load->view('inc/footer');
            }
        }
    }

    public function login() {

        $parametros = array(
            "email" => trim(filter_input(INPUT_POST, "txtEmail")),
            "senha" => md5(trim(filter_input(INPUT_POST, "txtSenha"))),
            "status" => 1
        );

        $login = $this->db->get_where("usuario", $parametros);
        
        if ($login->num_rows() > 0) {

            $this->load->Model("Model_permissao", "perm");
            $this->load->Model("Model_caixa", "caixa");
            
            $_SESSION["usuario"] = $login->row(0);
            $_SESSION["empresa"] = $this->empresa->getDados($login->row(0)->codEmpresa)->row(0);
            $_SESSION["permissoes"] = $this->perm->getPermissoesUsuario($login->row(0)->codUsuario)->row(0);

            $_SESSION["caixa"] = $this->caixa->getUltimoCaixa($_SESSION["empresa"]->codEmpresa);

            if (is_null($_SESSION["caixa"])) {
                $parametros = [
                    "codEmpresa" => intval($_SESSION["empresa"]->codEmpresa),
                    "data" => date("Y-m-d"),
                    "valorInicio" => 0,
                    "codUsuarioInicio" => intval(trim($_SESSION["usuario"]->codUsuario)),
                    "HorarioInicio" => date("Y-m-d H:i"),
                    "obs" => "<h1>Primeiro Caixa</h1><p>Aberto Automaticamente</p>"
                ];

                $this->db->insert("caixa", $parametros);

                $_SESSION["caixa"] = $this->db->get_where("caixa", ["codCaixa" => $this->db->insert_id()])->row(0);
            }

            if ($_SESSION["usuario"]->codPermissao == COD_PERMISSAO_COLABORADOR) {
                $_SESSION["dadosColaborador"] = $this->db->get_where("funcionario", array("email" => $_SESSION["usuario"]->email))->row(0);
            }
        } else {
            $_SESSION["msg"] = MSG_LOGIN_NAO_ENCONTRADO;
        }

        redirect(base_url());
    }

    public function fluxoCaixa() {

        redirect(base_url("caixa/"));
    }

    public function logoff() {
        $_SESSION["usuario"] = NULL;
        $_SESSION["empresa"] = NULL;
        redirect(base_url());
    }

}
