<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Venda extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
        $this->load->Model("Model_venda", "venda");
        
    }
    
    public function index() {
        
        $parametrosListagem = array(
            "vendas" => $this->venda->getVendas($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('venda/listagem_vendas', $parametrosListagem);
        $this->load->view('inc/footer');
    }

    
    public function cadastrar(){
        
        $this->load->Model("Model_clientes", "cliente");
        $this->load->Model("Model_produtos", "produtos");
        
        $parametros = array(
            "clientes" => $this->cliente->getClientes($_SESSION["empresa"]->codEmpresa),
            "produtos" => $this->produtos->getProdutos($_SESSION["empresa"]->codEmpresa)
        );
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('venda/cadastro_venda', $parametros);
        $this->load->view('inc/footer');
    }
    
    public function realizar_cadastro(){
        
        //var_dump($_POST);

        $this->load->Model("Model_entradas", "entrada");
        $this->load->Model("Model_produtos", "produto");
        
        $dadosItens = (trim(filter_input(INPUT_POST, "txtListaItens")));
        $itens = json_decode($dadosItens);
                
        $parametrosInsercao = array(
            "codCliente" => intval(trim(filter_input(INPUT_POST, "txtCliente"))),
            "valor" => doubleval(str_replace("R$", "", trim(filter_input(INPUT_POST, "txtValorTotal")))),
            "codEmpresa" => intval($_SESSION["empresa"]->codEmpresa),
        );
        
        $this->db->insert("venda", $parametrosInsercao);
        $codvenda = $this->db->insert_id();
        
        $parametrosItens = array(
            "codVenda" => $codvenda
        );
                
        $resumoVenda = "<b>COMPRA DE:</b>";

        foreach($itens as $item){         
            
            $produto = $this->produto->getProduto($item->produto);

            $parametrosItens["codProduto"] = $item->produto;
            $parametrosItens["quantidade"] = $item->quantidade;
            $parametrosItens["precoUnitario"] = str_replace("R$", "", $item->valorUnitario);
            
            $this->db->insert("itemvenda", $parametrosItens);

            $resumoVenda .= "<br/>". $item->quantidade . " unidade(s)  de " . $produto->row(0)->descricao; 
        }
        
        $parametrosNota = array(
            "valor" => $parametrosInsercao["valor"],
            "status" => 0,
            "discriminacao" => "Relativo a venda [$codvenda]",
            "dataVencimento" => date("Y/m/d"),
            "codCliente" => $parametrosInsercao["codCliente"],
            "codEmpresa" => $_SESSION["empresa"]->codEmpresa,
            "codCategoriaEntrada"=>$this->entrada->getCodCategoriaVenda(intval($_SESSION["empresa"]->codEmpresa)),
            "codCompromisso" => 0,
            "codVenda" => $codvenda,
            "formaPagto" => trim(filter_input(INPUT_POST, "formaPagto"))
        ); 
        
        $this->db->insert("notaentrada", $parametrosNota);
        $codNota = $this->db->insert_id();

        $this->db->where("codVenda", $codvenda)->update("venda", array("codNotaEntrada" => $codNota, "resumoVenda" => $resumoVenda));
        
        redirect(base_url("index.php/contasreceber/nota/$codNota"));
        
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
