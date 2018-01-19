<?php



defined('BASEPATH') OR exit('No direct script access allowed');



class Cliente extends CI_Controller {



    function __construct() {

        parent::__construct();



        session_start();



        $this->load->Model("Model_clientes", "model_clientes");

    }



    public function index() {



        $parametrosListagem = array(

            "clientes" => $this->model_clientes->getClientes($_SESSION["empresa"]->codEmpresa)

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

            "complemento" => trim(filter_input(INPUT_POST, "txtComplemento"))

        );

        

        if (!empty($_FILES['txtImagem']['name'])) {

                $imagem = explode(".", $_FILES['txtImagem']['name']);

                $comp = date('Y-m-d_HHiiss');

                $nomecerto_cadastrar = "/assets/upload/" . $imagem[0] . $comp . '.' . $imagem[1];

                $uploadfile = dirname(getcwd()) . "/assets/upload/" . $imagem[0] . $comp . '.' . $imagem[1];

                move_uploaded_file($_FILES['txtImagem']['tmp_name'], $uploadfile);

        } else {

            if($parametrosInsercao["sexo"] == "MASCULINO"){

                $nomecerto_cadastrar = base_url("assets/img/" . CAMINHO_IMAGEM_CLIENTE_PADRAO);

            }else{

                $nomecerto_cadastrar = base_url("assets/img/" . CAMINHO_IMAGEM_CLIENTE_PADRAO_MULHER);

            }

        }

        

        $parametrosInsercao["imagem"] = $nomecerto_cadastrar;

        $parametrosInsercao["codEmpresa"] = intval($_SESSION["empresa"]->codEmpresa);

        $parametrosInsercao["nascimento"] = 

                substr($parametrosInsercao["nascimento"],6,4) . "-" . 

                substr($parametrosInsercao["nascimento"],3,2) . "-" . 

                substr($parametrosInsercao["nascimento"],0,2);

        

        $this->model_clientes->Inserir($parametrosInsercao);

        

        redirect(base_url("index.php/cliente"));

    }



    public function alterar($codCliente) {



        $this->load->Model("Model_cidades", "cidades");



        $parametrosCadastro = array(

            "estados" => $this->db->get_where("estado"),

            "cidades" => $this->cidades->getCidadesDoMesmoEstado(intval($_SESSION["empresa"]->codCidade)),

            "dados" => $this->model_clientes->getCliente($codCliente)->row(0),

            "servicosprestados" => $this->model_clientes->getServicosPrestados($codCliente, $_SESSION["empresa"]->codEmpresa)

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

        

        if($elemento == "nascimento"){

            $data = $parametros[$elemento];

            $parametros[$elemento] = 

                    substr($data,6,4) . "-" . substr($data,3,2) . "-" . substr($data,0,2);

        }

        

        $this->db->where("codCliente", $cod)->update("cliente", $parametros);

    }

    

    public function getByNome(){

        

        $nome = trim(filter_input(INPUT_POST, "nome"));

        

        $ret  =$this->db->get_where("cliente", array(

            "codEmpresa" => $_SESSION["empresa"]->codEmpresa,

            "nome" => $nome

        ));

        

        echo json_encode($ret->result_array());

        

    }

	

    public function email(){

        

        //$this->load->Model("Model_email", "emails");

        

        $this->load->library('email');

        $this->email->set_mailtype("html");

        

        $parametros = array(

            "senha" => "152321",

            "logo" => "http://localhost/salao/assets/img/logo_h.png",

            "nomeInstituicao" => "Nome da Instituicao",

            "email"=> "leonardoalmeidasoares23@gmail.com"

        );

        

        $this->email->from('gerirmeusalao.com.br', 'Gerir Meu Salão');

        $this->email->to("leonardoalmeidasoares23@gail.com");

        $this->email->subject('Cadastro realizado com sucesso');

        $this->email->message($this->load->view("emails/novoCadastro", $parametros, TRUE));



        $this->email->send();

        $this->email->print_debugger(array('headers'));
        

    }



}

