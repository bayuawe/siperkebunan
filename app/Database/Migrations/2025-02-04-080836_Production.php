<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Production extends Migration
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
            'id_produksi' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true, // Sudah didefinisikan UNIQUE di sini
            ],
            'tanggal_panen' => [
                'type' => 'DATE',
            ],
            'id_pohon' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'jumlah_buah' => [
                'type' => 'INT',
            ],
            'buah_matang' => [
                'type' => 'INT',
            ],
            'jumlah_bunga_dompet' => [
                'type' => 'INT',
            ],
            'jumlah_bunga_jantan' => [
                'type' => 'INT',
            ],
            'jumlah_bunga_betina' => [
                'type' => 'INT',
            ],
            'jumlah_janjang_panen' => [
                'type' => 'INT',
            ],
            'berat_janjang_panen' => [
                'type' => 'INT',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        // Menambahkan primary key
        $this->forge->addPrimaryKey('id');

        // Menghapus ini karena sudah dideklarasikan di addField()
        // $this->forge->addKey('id_produksi', false, true); 

        // Menambahkan foreign key ke tabel tree
        $this->forge->addForeignKey('id_pohon', 'tree', 'id_pohon', 'CASCADE', 'CASCADE', 'fk_production_tree');

        $this->forge->createTable('production');
    }

    public function down()
    {
        // Menghapus foreign key sebelum menghapus tabel
        $this->forge->dropForeignKey('production', 'fk_production_tree');
        $this->forge->dropTable('production');
    }
}
