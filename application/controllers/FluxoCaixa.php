<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fluxocaixa extends CI_Controller {

    function __construct() {

        parent::__construct();

        session_start();

        $this->load->Model("Model_caixa", "caixa");

    }

    public function index() {

    }

    public function getUltimoCaixa(){

    	$item = $this->caixa->getUltimoCaixa($_SESSION["empresa"]->codEmpresa);
    	echo json_encode($item);

    }
}
