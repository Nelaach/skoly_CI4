<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Skoly;
use App\Models\Mesta;
use App\Models\Prijati;

class Users extends BaseController
{
	public function index()
	{
		$data = [];
		helper(['form']);


		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))
											->first();

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('dashboard');

			}
		}

		echo view('templates/header', $data);
		echo view('login');
		echo view('templates/footer');
	}

	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function register(){
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];

			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];
				$model->save($newData);
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/');

			}
		}


		echo view('templates/header', $data);
		echo view('register');
		echo view('templates/footer');
	}

	public function profile(){
		
		$data = [];
		helper(['form']);
		$model = new UserModel();

		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				];

			if($this->request->getPost('password') != ''){
				$rules['password'] = 'required|min_length[8]|max_length[255]';
				$rules['password_confirm'] = 'matches[password]';
			}


			if (! $this->validate($rules)) {
				$data['validation'] = $this->validator;
			}else{

				$newData = [
					'id' => session()->get('id'),
					'firstname' => $this->request->getPost('firstname'),
					'lastname' => $this->request->getPost('lastname'),
					];
					if($this->request->getPost('password') != ''){
						$newData['password'] = $this->request->getPost('password');
					}
				$model->save($newData);

				session()->setFlashdata('success', 'Successfuly Updated');
				return redirect()->to('/profile');

			}
		}

		$data['user'] = $model->where('id', session()->get('id'))->first();
		echo view('templates/header', $data);
		echo view('profile');
		echo view('templates/footer');
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

	//--------------------------------------------------------------------

	public function skoly(){
		$skoly = new Skoly();
		$mesta = new Mesta();
		$data['skoly'] = $skoly -> select('skola.id, skola.nazev as skola, mesto.nazev, obor.nazev as obor, geo-lat, geo-long, pocet_prijatych.pocet as pocet')->join('mesto', 'skola.mesto = mesto.id')->join('pocet_prijatych', 'pocet_prijatych.skola = skola.id', 'left')->join('obor', 'pocet_prijatych.obor = obor.id', 'left')->orderBy('skola')->findAll();
		$data['mesta'] = $mesta -> orderBy('nazev')->findAll();
		echo view('templates/header');
		echo view('frontend/skoly', $data);
	}
	public function erSkoly(){

		if (session()->get('isLoggedIn')) { 
		$skoly = new Skoly();
		$mesta = new Mesta();
		$data['skoly'] = $skoly -> select('skola.id, pocet_prijatych.id as prijati_id, skola.nazev as skola, pocet_prijatych.id as obor_id, mesto.nazev, obor.nazev as obor, geo-lat, geo-long, pocet_prijatych.pocet as pocet')->join('mesto', 'skola.mesto = mesto.id')->join('pocet_prijatych', 'pocet_prijatych.skola = skola.id', 'left')->join('obor', 'pocet_prijatych.obor = obor.id', 'left')->orderBy('skola')->findAll();
		$data['mesta'] = $mesta -> orderBy('nazev')->findAll();
		echo view('templates/header');
		echo view('backend/er_skoly', $data);
		}
		else{
			echo("Bez přihlášení se sem nedostaneš");

		}
	}
	public function mapa(){
		$skoly = new Skoly();
		$data['skoly'] = $skoly -> select('skola.id, skola.nazev as skola, mesto.nazev, geo-lat, geo-long')-> orderBy('skola.id')->join('mesto', 'skola.mesto = mesto.id')->findAll();
		echo view('templates/header');
		echo view('frontend/mapa', $data);
	}	
    public function create(){
		if (session()->get('isLoggedIn')) { 

		echo view('templates/header');
        echo view('backend/add_school');
		echo view('templates/footer');
	}
	else{
		echo("Bez přihlášení se sem nedostaneš");

	}
    }
     public function store() {
		if (session()->get('isLoggedIn')) { 
        $skolyModel = new Skoly();
		$prijatiModel = new Prijati();
		//echo "<script>alert('".$skola[0]["id"]."');</script>";
        $data = [
            'nazev' => $this->request->getVar('skola'),
            'mesto'  => $this->request->getVar('mesto'),
			'geo-lat'  => $this->request->getVar('geo-lat'),
			'geo-long'  => $this->request->getVar('geo-long')

       ];
	   $skola_nazev = $skolyModel -> select('nazev', 'mesto')-> where('nazev', $this->request->getVar('skola'))-> where('mesto', $this->request->getVar('mesto'))-> findAll();
	   if(!$skola_nazev){
		$skolyModel->insert($data);
	   }

	   $skola_id = $skolyModel -> select('id')-> where('nazev', $this->request->getVar('skola'))-> findAll();
	   $id = $skola_id[0]["id"];
	   $data1 = [
		   	'obor'  => $this->request->getVar('obor'),
			'prijati'  => $this->request->getVar('prijati'),
			'pocet'  => $this->request->getVar('pocet'),
			'skola' => $id,
	   ];

	   //echo "<script>alert('".$this->request->getVar('mesto')."');</script>";
        //return $this->response->redirect(site_url('/uvodni'));
		if ($prijatiModel->insert($data1))
		{
			?><style>.center {text-align: center;color: red;}</style><?php
			echo "<h3 class='center'>Úspěšně přidáno</h3>";
			return $this->response->redirect(site_url('/erSkoly'));

		}
		else 
		{
			echo "nepřidáno";
		}	
	}
	else{
		echo("Bez přihlášení se sem nedostaneš");

	}	
    }

    // show single user
    public function edit($obor){
		if (session()->get('isLoggedIn')) { 

		if($obor == null) {

			echo "hello";
		}
		$prijatiModel = new Prijati();
        $data['prijati'] = $prijatiModel->where('id', $obor)->first();
		echo view('templates/header');
		echo view('backend/edit', $data);
	}
		else{
			echo("Bez přihlášení se sem nedostaneš");
	
		}	
		
    }
	public function novyObor($id){
		if (session()->get('isLoggedIn')) { 


		$data1 = [
				'obor'  => " ",
			 'prijati'  => " ",
			 'pocet'  => " ",
			 'skola' => $id,
		];
 
		$prijatiModel = new Prijati();

		 if ($prijatiModel->insert($data1))
		 {

			 return $this->response->redirect(site_url('/erSkoly'));
 
		 }
		 else 
		 {
			 echo "nepřidáno";
		 }
		}	
		 else {
			echo("Bez přihlášení se sem nedostaneš");
	
		}	
		
    }

    // update user data
	public function editZaklad($id = null){
		if (session()->get('isLoggedIn')) { 

        $skolyModel = new Skoly();
        $data['skoly'] = $skolyModel->where('id', $id)->first();
		echo view('templates/header');
		echo view('backend/edit_zaklad', $data);
	}	
	else {
	   echo("Bez přihlášení se sem nedostaneš");

   }

	}
	public function updateZaklad(){
		if (session()->get('isLoggedIn')) { 

		$skolyModel = new Skoly();
		$id = $this->request->getVar('id');

        $data = [
            'nazev' => $this->request->getVar('skola'),
            'mesto'  => $this->request->getVar('mesto'),
			'geo-lat'  => $this->request->getVar('geo-lat'),
			'geo-long'  => $this->request->getVar('geo-long')
       ];
    	$skolyModel->update($id, $data);

        return $this->response->redirect(site_url('/editZaklad/'.$id));
	}	
	else {
	   echo("Bez přihlášení se sem nedostaneš");

   }	
    }
 
    public function update(){
		if (session()->get('isLoggedIn')) { 

		$prijatiModel = new Prijati();
		$prijati_id = $this->request->getVar('prijati_id');

	   $data1 = [
		'obor'  => $this->request->getVar('obor'),
	 	'pocet'  => $this->request->getVar('pocet'),
];
		$prijatiModel->update($prijati_id, $data1);

        return $this->response->redirect(site_url('/edit/'.$prijati_id));
	}	
	else {
	   echo("Bez přihlášení se sem nedostaneš");

   }	
    }
 
    // delete user
    public function delete($id = null){
		if (session()->get('isLoggedIn')) { 

        $skolyModel = new Skoly();
		$prijatiModel = new Prijati();
        $data['skol_del'] = $skolyModel->where('id', $id)->delete($id);
		$data['prijati_del'] = $prijatiModel->where('skola', $id)->delete($id);
        return $this->response->redirect(site_url('/erSkoly'));
	}	
	else {
	   echo("Bez přihlášení se sem nedostaneš");

   }
    }    	
}