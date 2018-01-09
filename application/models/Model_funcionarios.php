<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_funcionarios extends CI_Model {

    public function getFuncionarios($codEmpresa) {
        return $this->db->select("f.nome, c.descricao as cargo, f.telefone, f.codFuncionario")
                        ->from("funcionario f")
                        ->join("cargo c", "c.codCargo = f.codCargo")
                        ->where("codEmpresa", $codEmpresa)
                        ->get();
    }

    public function inserir($parametros) {
        return $this->db->insert("funcionario", $parametros);
    }

    public function getFuncionario($codFuncionario) {
        return $this->db->get_where("funcionario", array("codFuncionario" => $codFuncionario));
    }

    public function Alterar($cod, $parametros) {
        $this->db->where("codFuncionario", $cod)->update("funcionario", $parametros);
    }
    
    public function getSituacao($codEmpresa){
        return $this->db->select("f.nome, f.email, f.imagem, f.telefone, f.codFuncionario, "
                . "ca.descricao as cargo, (select count(*) from compromisso where "
                . "codFuncionario = f.codFuncionario and status = 1 and DAY(horario) = DAY(NOW())) as status")
        ->from("compromisso c")
        ->join("funcionario f","c.codFuncionario = f.codFuncionario","right")
        ->join("cargo ca", "f.codCargo = ca.codCargo")
        ->where("f.codEmpresa", $codEmpresa)
        ->group_by("f.codFuncionario")
        ->get();
    }

}
