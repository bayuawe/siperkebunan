<?php
		namespace App\Controllers;
		use App\Controllers\BaseController;
		class Pohon extends BaseController
		{
			public function index()
			{
				$data = array_merge($this->data, [
					'title'         => 'Pohon'
				]);
				return view('pohon', $data);
			}
		}
		