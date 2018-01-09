<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_email extends CI_Model {

    public function enviarMensageUsuarioCadastrado($senha = "152321") {
        
        $this->load->library('email');
        $this->email->set_mailtype("html");
        
        $email_body = "<div>hello world, sua senha é $senha</div>";
        
        $this->email->from('gerirmeusalao.com.br', 'Gerir Meu Salão');
        $this->email->to("leonardoalmeidasoares23@gail.com");
        $this->email->subject('Cadastro realizado com sucesso');
        $this->email->message($email_body);

        $this->email->send();
        
     
        $this->email->print_debugger(array('headers'));

    }

}
