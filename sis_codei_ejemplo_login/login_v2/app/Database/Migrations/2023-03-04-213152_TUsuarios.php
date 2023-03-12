<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUsuarios extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'unique'     => false,
            ],
            'ap_paterno' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'King of Town',
            ],
            'ap_materno' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'ci' => [
                'type'       => 'int',
                'unique'     => true,
            ],
            'usuario' => [
                'type'       => 'varchar',
                'constraint' => 100,
                'unique'     => true,
            ],
            'password' => [
                'type'       => 'varchar',
                'constraint' => 200,
                'unique'     => true,
            ],
            'rol' => [
                'type'       => 'varchar',
                'constraint' => 200,
                'unique'     => false,
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('t_usuarios');

    }

    public function down()
    {
        //
    }
}
