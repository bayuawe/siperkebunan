<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tree extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_pohon' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun_tanam' => [
                'type' => 'DATE',
            ],
            'jenis_bibit' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
				'type'           => 'datetime'
			],
			'updated_at' => [
				'type'           => 'datetime'
			],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('id_pohon');

        $this->forge->createTable('tree');
    }

    public function down()
    {
        $this->forge->dropTable('tree');
    }
}
