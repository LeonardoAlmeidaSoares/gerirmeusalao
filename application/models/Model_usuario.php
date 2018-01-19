<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_usuario extends CI_Model {

    public function getUsuarios($codEmpresa) {
        return $this->db->get_where("usuario", array("codEmpresa" => $codEmpresa));
    }

    public function Inserir($parametros) {

        $conf = $this->db->get_where("usuario", array("email" => $parametros["email"]));

        if ($conf->num_rows() == 0) {
            
            $this->db->insert("usuario", $parametros);
            $codUsuario = $this->db->insert_id();
            
            $retP = $this->db->get_where("tipopermissao", array("codTipoPermissao" => $parametros["codPermissao"]));
            $dadosP = $retP->row(0);
            
            $parametrosP = array(
                "codUsuario" => $codUsuario,
                "perm_efetuarCadastro" => $dadosP->perm_efetuarCadastro,
                "perm_efetuarAlteracao" => $dadosP->perm_efetuarAlteracao,
                "perm_cadastrarUsuario" => $dadosP->perm_cadastrarUsuario,
                "perm_alterarDadosEmpresa" => $dadosP->perm_alterarDadosEmpresa,
                "perm_verRelatorios" => $dadosP->perm_verRelatorios,
                "perm_verNotas" => $dadosP->perm_verNotas,
                "perm_marcarCompromissos" => $dadosP->perm_marcarCompromissos,
                "perm_cadastrarFuncionario" => $dadosP->perm_cadastrarFuncionario,
                "perm_cadastrarProdutosServicos" => $dadosP->perm_cadastrarProdutosServicos,
                "perm_alterarPermissoes" => $dadosP->perm_alterarPermissoes,
           );
            
            return $this->db->insert("permissaousuario", $parametrosP);
            
        }else{
            return false;
        }
    }

    public function getUsuario($codUsuario) {
        return $this->db->get_where("usuario", array("codUsuario" => $codUsuario));
    }
    
    public function Atualizar($cod, $parametros){
        
        return $this->db->where("codUsuario", $cod)->update("usuario", $parametros);
        
    }

}