<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'User');	
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function action()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->load->model("SesiModel", 'Sesi');
		
		//cek apakah ada
		$user = $this->User->find($username, $password);
		if ($user == null) {
			$this->toastr->error("Username / Password salah !");
			redirect(base_url());
		}
		else if ($user->STATUS == 0) {
			$this->toastr->error("Kamu tidak punya akses, Silahkan hubungi Admin !");
			redirect(base_url());
		}
		else{
			$this->session->set_userdata('login', $user);
			if ($user->ROLE == 0) {
				redirect(base_url('dashboard'));
			}else{
				$hasActiveSession = $this->Sesi->getActive();
				if ($hasActiveSession) {
					redirect(base_url('responden'));
				}else{
					$this->toastr->error("Tidak ada sesi Survey yang Aktif, Bila merasa ini sebuah kesalah, hubungi Admin !");
					redirect(base_url());
				}
			}
		}
	}
}
