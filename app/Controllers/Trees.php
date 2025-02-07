<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TreeModel;

class Trees extends BaseController
{
	protected $TreeModel;

	// Constructor
	public function __construct()
	{
		$this->TreeModel = new TreeModel();
	}

	// Read
	public function index()
	{
		$data = array_merge($this->data ?? [], [
			'title' => 'Pohon',
			'Tree'  => $this->TreeModel->getTree()
		]);
		return view('trees/treesList', $data);
	}

	// Insert
	public function createTree()
	{
		$createTree = $this->TreeModel->createTree($this->request->getPost(null, FILTER_UNSAFE_RAW));
		if ($createTree) {
			session()->setFlashdata('notif_success', '<b>Successfully added new Tree</b>');
			return redirect()->to(base_url('trees'));
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to add new Tree</b>');
			return redirect()->to(base_url('trees'));
		}
	}

	// Update
	public function updateTree()
        {
            $updateTree = $this->TreeModel->updateTree($this->request->getPost(null, FILTER_UNSAFE_RAW));
            if ($updateTree) {
                session()->setFlashdata('notif_success', '<b>Successfully update Tree</b>');
                return redirect()->to(base_url('trees'));
            } else {
                session()->setFlashdata('notif_error', '<b>Failed to update Tree</b>');
                return redirect()->to(base_url('trees'));
            }
        }

	// Delete
	public function deleteTree($TreeID)
	{
		if (!$TreeID) {
			return redirect()->to(base_url('trees'));
		}
		$deleteTree = $this->TreeModel->deleteTree($TreeID);
		if ($deleteTree) {
			session()->setFlashdata('notif_success', '<b>Successfully deleted Tree</b>');
			return redirect()->to(base_url('trees'));
		} else {
			session()->setFlashdata('notif_error', '<b>Failed to delete Tree</b>');
			return redirect()->to(base_url('trees'));
		}
	}
}