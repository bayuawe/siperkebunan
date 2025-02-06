<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Production extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produksi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'primary' => true,
            ],
            'tanggal_panen' => [
                'type' => 'DATE',
            ],
            'id_pohon' => [
                'type' => 'VARCHAR',
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
        ]);
        
        // Menambahkan foreign key
        $this->forge->addForeignKey('id_pohon', 'tree', 'id_pohon', 'CASCADE', 'CASCADE');

        $this->forge->createTable('production');
    }

    public function down()
    {
        // Menghapus foreign key sebelum menghapus tabel
        $this->forge->dropForeignKey('production', 'production_id_pohon_foreign');
        $this->forge->dropTable('production');
    }
} 