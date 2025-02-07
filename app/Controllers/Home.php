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

        // Get production statistics
        $productionStats = $productionModel->select('
            AVG(jumlah_buah) as avg_buah,
            AVG(buah_matang) as avg_matang,
            AVG(berat_janjang_panen) as avg_berat,
            SUM(jumlah_janjang_panen) as total_janjang,
            COUNT(DISTINCT id_pohon) as total_pohon_produktif
        ')->get()->getRowArray();

        // Get monthly production trends
        $monthlyProduction = $productionModel->select('
            MONTH(tanggal_panen) as bulan,
            YEAR(tanggal_panen) as tahun,
            COUNT(*) as total_panen,
            SUM(jumlah_buah) as total_buah,
            SUM(berat_janjang_panen) as total_berat
        ')
        ->groupBy('YEAR(tanggal_panen), MONTH(tanggal_panen)')
        ->orderBy('tahun DESC, bulan DESC')
        ->limit(12)
        ->get()
        ->getResultArray();

        $data = array_merge($this->data, [
            'title'             => 'Dashboard Page',
            'totalProductions'  => $totalProductions,
            'totalTree'         => $totalTree,
            'treeData'          => $treeData,
            'treesByYear'       => $treesByYear,
            'productionStats'   => $productionStats,
            'monthlyProduction' => $monthlyProduction
        ]);

        return view('common/home', $data);
    }
}
