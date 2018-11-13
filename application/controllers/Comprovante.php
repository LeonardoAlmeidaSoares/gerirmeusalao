<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comprovante extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
    }
    
    public function rendimento($codFuncionario, $mes) {
        
        $this->load->Model("Model_funcionarios", "funcionario");
        $this->load->Model("Model_rendimentos", "rendimento");
        
        $parametros = [
            "dadosFuncionario" => $this->funcionario->getFuncionario($codFuncionario),
            "dados" => $this->rendimento->getRendimentoPorColaborador(
                    $_SESSION["empresa"]->codEmpresa, $codFuncionario, $mes),
            "mes" => $mes
            
        ];
        
        $this->load->view('inc/header');
        $this->load->view('inc/barraSuperior');
        $this->load->view('inc/menu');
        $this->load->view('comprovante/relatorio/rendimento_funcionario', $parametros);
        $this->load->view('inc/footer');
        
    }
    
}