<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_permissao extends CI_Model {

    public function getPermissoesUsuario($codUsuario) {
        return $this->db->select("p.*")
                        ->from("permissaousuario p")
                        ->where("codUsuario", $codUsuario)
                        ->get();
    }

    public function getPermissoes() {
        return $this->db->get("tipopermissao");
    }
    
    public function Alterar($codUsuario, $parametros){
        $this->db->where("codUsuario", $codUsuario)->update("usuario", array("codPermissao" => 0));
        return $this->db->where("codUsuario", $codUsuario)->update("permissaousuario", $parametros);
        
    }

}
