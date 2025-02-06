<?php

namespace App\Models;

use CodeIgniter\Model;

class TreeModel extends Model
{
    protected $table      = 'tree';         // Nama tabel
    protected $primaryKey = 'id_pohon';     // Primary key tabel
    
    // Kolom-kolom yang bisa diisi (fillables)
    protected $allowedFields = [
        'id_pohon', 'tahun_tanam', 'jenis_bibit', 'created_at', 'updated_at'
    ];    

    // Menangani timestamp otomatis
    protected $useTimestamps = true; // Mengaktifkan penggunaan timestamp otomatis
    protected $createdField  = 'created_at'; // Kolom created_at
    protected $updatedField  = 'updated_at'; // Kolom updated_at

    // Format tanggal yang digunakan jika menggunakan timestamp
    protected $dateFormat = 'datetime';  // Format datetime

    protected $validationRules = [
        'id_pohon' => 'required|is_unique[tree.id_pohon]',
        'tahun_tanam' => 'required|valid_date[Y]',
        'jenis_bibit' => 'required'
    ];

    protected $validationMessages = [
        'id_pohon' => [
            'required' => 'ID Pohon wajib diisi.',
            'is_unique' => 'ID Pohon sudah ada.'
        ],
        'tahun_tanam' => [
            'required' => 'Tahun Tanam wajib diisi.',
            'valid_date' => 'Tahun Tanam harus berupa tahun yang valid (YYYY).'
        ],
        'jenis_bibit' => [
            'required' => 'Jenis Bibit wajib diisi.'
        ]
    ];

    // Read
    public function getTree($TreeID = false)
    {
        if ($TreeID) {
            return $this->db->table('tree')
                ->where(['id_pohon' => $TreeID]) // Menggunakan 'id_pohon' sebagai kunci
                ->get()->getRowArray();
        } else {
            return $this->db->table('tree')
                ->get()->getResultArray();
        }
    }

    // Insert
    public function createTree($dataTree)
    {
        return $this->db->table('tree')->insert([
            'id_pohon'        => $dataTree['inputIdPohon'], // Menyimpan ID Pohon
            'tahun_tanam'     => $dataTree['inputTahunTanam'],
            'jenis_bibit'     => $dataTree['inputJenisBibit'],
        ]);
    }

    // Update
    public function updateTree($dataTree)
    {
        return $this->db->table('tree')->update([
            'tahun_tanam'     => $dataTree['inputTahunTanam'],
            'jenis_bibit'     => $dataTree['inputJenisBibit'],
        ], ['id_pohon' => $dataTree['inputIdPohon']]); // Menggunakan 'id_pohon' sebagai kunci
    }

    // Delete
    public function deleteTree($TreeID)
    {
        return $this->db->table('tree')->delete(['id_pohon' => $TreeID]); // Menggunakan 'id_pohon' sebagai kunci
    }
}