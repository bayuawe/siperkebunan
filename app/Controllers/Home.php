<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TreeModel;
use App\Models\ProductionModel;

class Home extends BaseController
{
    public function index()
    {
        $treeModel = new TreeModel();
        $productionModel = new ProductionModel();

        $totalTree = $treeModel->countAll();
        $totalProductions = $productionModel->countAll();
        
        // Get detailed tree data
        $treeData = $treeModel->select('jenis_bibit, COUNT(*) as total')
                             ->groupBy('jenis_bibit')
                             ->get()
                             ->getResultArray();
                             
        $treesByYear = $treeModel->select('tahun_tanam, COUNT(*) as total')
                                ->groupBy('tahun_tanam')
                                ->orderBy('tahun_tanam', 'ASC')
                                ->get()
                                ->getResultArray();

        // Get production statistics with default values
        $productionStats = $productionModel->select('
            COALESCE(AVG(jumlah_buah), 0) as avg_buah,
            COALESCE(AVG(buah_matang), 0) as avg_matang,
            COALESCE(AVG(berat_janjang_panen), 0) as avg_berat,
            COALESCE(SUM(jumlah_janjang_panen), 0) as total_janjang,
            COUNT(DISTINCT id_pohon) as total_pohon_produktif
        ')->get()->getRowArray();

        // Get monthly production trends
        $monthlyProduction = $productionModel->select('
            MONTH(tanggal_panen) as bulan,
            YEAR(tanggal_panen) as tahun,
            COUNT(*) as total_panen,
            COALESCE(SUM(jumlah_buah), 0) as total_buah,
            COALESCE(SUM(berat_janjang_panen), 0) as total_berat
        ')
        ->groupBy('YEAR(tanggal_panen), MONTH(tanggal_panen)')
        ->orderBy('tahun DESC, bulan DESC')
        ->limit(12)
        ->get()
        ->getResultArray();

        $data = array_merge($this->data, [
            'title'             => 'Dashboard Page',
            'totalProductions'  => $totalProductions ?? 0,
            'totalTree'         => $totalTree ?? 0,
            'treeData'          => $treeData ?? [],
            'treesByYear'       => $treesByYear ?? [],
            'productionStats'   => $productionStats ?? [
                'avg_buah' => 0,
                'avg_matang' => 0, 
                'avg_berat' => 0,
                'total_janjang' => 0,
                'total_pohon_produktif' => 0
            ],
            'monthlyProduction' => $monthlyProduction ?? []
        ]);

        return view('common/home', $data);
    }
}
