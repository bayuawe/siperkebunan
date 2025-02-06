<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tree extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pohon' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_tanam' => [
                'type' => 'DATE',
            ],
            'jenis_bibit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_pohon', true);
        $this->forge->createTable('tree');
    }

    public function down()
    {
        $this->forge->dropTable('tree');
    }
}
