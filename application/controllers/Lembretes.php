<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lembrete extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        session_start();
        
        $this->load->Model("Model_lembrete", "lemb");
    }
    
    public function index() {
        
        $this->load->Model("Model_usuario", "user");
        
        $parametrosListagem = array(
            "usuarios" => $this->user->getUsuarios($_SESSION["empresa"]->codEmpresa),
            "listaPermissoes" => $this->perm->getPermissoes()
        );
        
        $this->load->view('header');
        $this->load->view('barraSuperior');
        $this->load->view('menu');
        $this->load->view('listagem_permissoes', $parametrosListagem);
        $this->load->view('footer');
    }
}