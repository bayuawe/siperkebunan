<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\TreeModel;
use App\Models\ProductionModel;

class Productions extends BaseController
{
    protected $ProductionModel;
    protected $TreeModel;

    public function __construct()
    {
        $this->ProductionModel = new ProductionModel();
        $this->TreeModel = new TreeModel();
    }

    public function index()
    {
        $data = array_merge($this->data, [
            'title'         => 'Production',
            'Production'    => $this->ProductionModel->getProduction(),
            'Tree'          => $this->TreeModel->getTree(),
            'treeList'      => $this->TreeModel->findAll() // Menambahkan daftar semua pohon
        ]);
        return view('production/productionsList', $data);
    }

    public function createProduction()
    {
        // Validasi id_pohon ada di tabel tree
        $treeData = $this->TreeModel->getTree($this->request->getPost('inputIdPohon'));
        if (!$treeData) {
            session()->setFlashdata('notif_error', '<b>ID Pohon tidak ditemukan</b>');
            return redirect()->to(base_url('production/productionsList'));
        }

        $createProduction = $this->ProductionModel->createProduction($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($createProduction) {
            session()->setFlashdata('notif_success', '<b>Successfully added new Production</b>');
            return redirect()->to(base_url('production/productionsList'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to add new Production</b>');
            return redirect()->to(base_url('production/productionsList'));
        }
    }

    public function updateProduction()
    {
        // Validasi id_pohon ada di tabel tree
        $treeData = $this->TreeModel->getTree($this->request->getPost('inputIdPohon'));
        if (!$treeData) {
            session()->setFlashdata('notif_error', '<b>ID Pohon tidak ditemukan</b>');
            return redirect()->to(base_url('production/productionsList'));
        }

        $updateProduction = $this->ProductionModel->updateProduction($this->request->getPost(null, FILTER_UNSAFE_RAW));
        if ($updateProduction) {
            session()->setFlashdata('notif_success', '<b>Successfully update Production</b>');
            return redirect()->to(base_url('production/productionsList'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to update Production</b>');
            return redirect()->to(base_url('production/productionsList'));
        }
    }

    public function deleteProduction($ProductionID)
    {
        if (!$ProductionID) {
            return redirect()->to(base_url('production/productionsList'));
        }
        $deleteProduction = $this->ProductionModel->deleteProduction($ProductionID);
        if ($deleteProduction) {
            session()->setFlashdata('notif_success', '<b>Successfully delete Production</b>');
            return redirect()->to(base_url('production/productionsList'));
        } else {
            session()->setFlashdata('notif_error', '<b>Failed to delete Production</b>');
            return redirect()->to(base_url('production/productionsList'));
        }
    }
}