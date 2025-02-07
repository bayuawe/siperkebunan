<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'production';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_produksi',
        'tanggal_panen', 
        'id_pohon',
        'jumlah_buah',
        'buah_matang',
        'jumlah_bunga_dompet',
        'jumlah_bunga_jantan', 
        'jumlah_bunga_betina',
        'jumlah_janjang_panen',
        'berat_janjang_panen',
        'created_at',
        'updated_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getProduction($ProductionID = false)
    {
        if ($ProductionID) {
            return $this->db->table('production')
            ->where(['production.id' => $ProductionID])
            ->get()->getRowArray();
        } else {
            return $this->db->table('production')
            ->get()->getResultArray();
        }
    }

    public function createProduction($dataProduction)
    {
        return $this->db->table('production')->insert([
          'id_produksi'     	=> $dataProduction['inputIdProduksi'],
          'tanggal_panen'     	=> $dataProduction['inputTanggalPanen'],
          'id_pohon'     	=> $dataProduction['inputIdPohon'],
          'jumlah_buah'     	=> $dataProduction['inputJumlahBuah'],
          'buah_matang'     	=> $dataProduction['inputBuahMatang'],
          'jumlah_bunga_dompet'     	=> $dataProduction['inputJumlahBungaDompet'],
          'jumlah_bunga_jantan'     	=> $dataProduction['inputJumlahBungaJantan'],
          'jumlah_bunga_betina'     	=> $dataProduction['inputJumlahBungaBetina'],
          'jumlah_janjang_panen'     	=> $dataProduction['inputJumlahJanjangPanen'],
          'berat_janjang_panen'     	=> $dataProduction['inputBeratJanjangPanen'],
          'created_at'     	=> $dataProduction['inputCreatedAt'],
          'updated_at'     	=> $dataProduction['inputUpdatedAt'], 
        ]);
    }

    public function updateProduction($dataProduction)
    {
        return $this->db->table('production')->update([
          'id_produksi'     	=> $dataProduction['inputIdProduksi'],
          'tanggal_panen'     	=> $dataProduction['inputTanggalPanen'],
          'id_pohon'     	=> $dataProduction['inputIdPohon'],
          'jumlah_buah'     	=> $dataProduction['inputJumlahBuah'],
          'buah_matang'     	=> $dataProduction['inputBuahMatang'],
          'jumlah_bunga_dompet'     	=> $dataProduction['inputJumlahBungaDompet'],
          'jumlah_bunga_jantan'     	=> $dataProduction['inputJumlahBungaJantan'],
          'jumlah_bunga_betina'     	=> $dataProduction['inputJumlahBungaBetina'],
          'jumlah_janjang_panen'     	=> $dataProduction['inputJumlahJanjangPanen'],
          'berat_janjang_panen'     	=> $dataProduction['inputBeratJanjangPanen'],
          'created_at'     	=> $dataProduction['inputCreatedAt'],
          'updated_at'     	=> $dataProduction['inputUpdatedAt'], 
        ], ['id' => $dataProduction['inputProductionID']]);
    }

    public function deleteProduction($ProductionID)
    {
        return $this->db->table('production')->delete(['id' => $ProductionID]);
    }
}
