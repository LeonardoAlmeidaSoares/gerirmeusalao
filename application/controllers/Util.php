<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Util extends CI_Controller {	

	    function __construct() {

    	    parent::__construct();

        	session_start();

	        //$this->load->Model("Model_clientes", "model_clientes");
    }

	public function sendmail(){

		$config = Array(
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);

        $this->email->subject('Lembrete de compromisso');
        $this->email->from('gerirmeusalao.com.br', 'Gerir Meu Salão');

        $dados = $this->db->select("DATE_FORMAT(compromisso.horario,'%H:%i') as horario, servico.descricao as servico, cliente.nome as cliente, cliente.email, compromisso.codCompromisso, compromisso.codEmpresa")
					->from("compromisso")
					->join("servico","servico.codServico = compromisso.codServico")
					->join("empresa","empresa.codEmpresa = compromisso.codEmpresa")
					->join("cliente","cliente.codCliente = compromisso.codCliente")
					->where("compromisso.horario < DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 3 HOUR)")
					->where("avisoEnviado", 0)
					->get();

		foreach($dados->result() as $item){

			$parametrosEmail = array(
				"logoGerirMeuSalao" => "http://www.gerirmeusalao.com.br/assets/img/logo_h.png",
				"descServico" => $item->servico,
				"horario" => $item->horario,
				"dadosSalao" => $this->db->get_where("empresa", array("codEmpresa" => $item->codEmpresa))->row(0)
			);

	        $this->email->to($item->email);
	        $this->email->message($this->load->view("emails/avisoMarcacao", $parametrosEmail, TRUE));

	        $this->email->send();

	        $this->db->where("codCompromisso", $item->codCompromisso)->update("compromisso", array("avisoEnviado"=>1));
	    }

	}

	public function teste(){
		$this->db->query("update cliente set codCliente = 0 where codCliente = 38");
	}
}