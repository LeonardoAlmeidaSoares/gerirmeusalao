<?php

// Perceba os maiúsculos em Migration e na primeira letra do restante

class Migration_Apelido_Colaborador extends CI_Migration {

    public function up() {
        // Verificando se o campo já existe
        if (!$this->db->field_exists('apelido', 'funcionario')) {

            $campos = array(
                'apelido' => array(
                    'type' => 'varchar(45)',
                    'default' => ''
                )
            );

            $this->dbforge->add_column('funcionario', $campos);
        }
    }

    public function down() {
        $this->dbforge->drop_column('funcionario', 'apelido');
    }

}
