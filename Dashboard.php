<?php

namespace App\Controllers;

use App\Models\RMIdeas;

class Dashboard extends BaseController
{
	public function index()
	{
		$usertype = session('user_type');

		//dashboard type based on user
		switch ($usertype) {
			case "RM":
				return view('templates/header') . view('dashboard_rm') ;
				break;
			case "C":
				return view('templates/header') . view('dashboard_investor') ;
				break;
			default:
				return redirect()->to('/');
		}
	}


	//details pop up for a single client
	public function getinvestor($id)
	{
		$model = new RMIdeas();
		$results = array(
			//details on selected investor
			"investorinfo" => $model->getselectedinvestor($id)
		);
		return json_encode($results);
	}

	// Fetches all the new ideas 
	public function getnewideaslistrm()
	{
		$model = new RMIdeas();
		return json_encode($model->getideasrm());
	}

	// Fetches all the investors
	public function getinvestorslistrm()
	{
		$model = new RMIdeas();
		return json_encode($model->getinvestorsrm());
	}

	

/*
	public function addidea(){
		$model = new RMIdeas();
		$model->ideaenter(
			$this->request->getPost('title'),
			$this->request->getPost('abs'),
			$this->request->getPost('auth'),
			$this->request->getPost('risk'),
			$this->request->getPost('pd'),
			$this->request->getPost('ed'),
			$this->request->getPost('cont'),
			$this->request->getPost('cur'),
			$this->request->getPost('int'),
			$this->request->getPost('pt'),
			$this->request->getPost('maj'),
			$this->request->getPost('min'),
			$this->request->getPost('reg'),
			$this->request->getPost('con'),
			($this->request->getPost('ideaid')=='0')?'':$this->request->getPost('ideaid')
		);
			return redirect()->to('/dashboard');
	}
*/
	public function prefup(){
		$model = new RMIdeas();
		$model->prefupdate(
			$this->request->getPost('auth'),
			$this->request->getPost('a'),
			$this->request->getPost('b'),
			$this->request->getPost('c'),
			$this->request->getPost('d'),
			$this->request->getPost('e'),
			$this->request->getPost('f'),
			$this->request->getPost('g'),
			$this->request->getPost('h'),
			$this->request->getPost('i'),
			$this->request->getPost('j'),
			$this->request->getPost('k'),
			$this->request->getPost('l')
		);
		return redirect()->to('/dashboard');
	}
}
