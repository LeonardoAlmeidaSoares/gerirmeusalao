<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Servicos extends CI_Controller {



    public function __construct(){

        parent::__construct();



        session_start();

        

        $this->load->Model("Model_servico", "serv");

        

    }

    

    public function index() {

        

        $parametrosListagem = array(

            "servicos" => $this->serv->getServicos($_SESSION["empresa"]->codEmpresa)

        );

        

        $this->load->view('inc/header');

        $this->load->view('inc/barraSuperior');

        $this->load->view('inc/menu');

        $this->load->view('servico/listagem_servicos', $parametrosListagem);

        $this->load->view('inc/footer');

    }



    

    public function cadastrar(){

        $this->load->view('inc/header');

        $this->load->view('inc/barraSuperior');

        $this->load->view('inc/menu');

        $this->load->view('servico/cadastro_servicos');

        $this->load->view('inc/footer');

    }

    

    public function realizar_cadastro(){

        

        $parametrosInsercao = array(

            "descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),

            "valorComum" => doubleval(trim(filter_input(INPUT_POST, "txtValor"))),

            "valorPromocional" => doubleval(trim(filter_input(INPUT_POST, "txtValorP"))),

            //"estoque" => intval(trim(filter_input(INPUT_POST, "txtEstoque")))

        );

        

        $parametrosInsercao["codEmpresa"] = intval($_SESSION["empresa"]->codEmpresa);

        

        if(isset($_POST["txtCod"])){

            $cod = intval(trim(filter_input(INPUT_POST, "txtCod")));

            $this->serv->alterar($cod, $parametrosInsercao);

        }else{

            $this->serv->Inserir($parametrosInsercao);

        }

        redirect(base_url("index.php/servicos/"));

    }

    

    public function alterar($cod){

        

        $parametros = array(

            "codProcesso" => $cod,

            "dados" => $this->db->get_where("servico", array("codServico" => $cod))->row(0)

        );  

        

        $this->load->view('inc/header');

        $this->load->view('inc/barraSuperior');

        $this->load->view('inc/menu');

        $this->load->view('servico/cadastro_servicos', $parametros);

        $this->load->view('inc/footer');

    }

}

