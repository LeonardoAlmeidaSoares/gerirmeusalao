<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct(){
        parent::__construct();

        session_start();
        
    }
    
    public function getErrorLog() {
        $fi = new FilesystemIterator(__DIR__ . "/../logs/", FilesystemIterator::SKIP_DOTS);

	    echo json_encode(array("numLogs" => (iterator_count($fi) - 1)));
    }
    
}