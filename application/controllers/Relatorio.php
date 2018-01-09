<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
        $this->load->Model("Model_compromissos", "agenda");
        
    }
    
    public function index(){
        
    }
    
    public function getRendimentoMensal(){
        $this->load->Model("Model_rendimentos", "rendimentos");
        
        $parametros = array(
            "entradas" => $this->rendimentos->getRendimentos($_SESSION["empresa"]->codEmpresa)
        );
        //var_dump($parametros["entradas"]->result());/*
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('relatorio_financeiro', $parametros);
        $this->load->view('footer');
    }
    
    public function getRelatorioMensal(){
        
        $this->load->Model("Model_rendimentos", "rendimentos");
        
        $parametros = array(
            "entradas" => $this->rendimentos->getMensal($_SESSION["empresa"]->codEmpresa),
            "rendimentos" => $this->rendimentos->getRendimentos($_SESSION["empresa"]->codEmpresa)
        );
        var_dump($_SESSION["permissoes"]);
        /*
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('relatorio_financeiro', $parametros);
        $this->load->view('footer');
        */
    }
    
}