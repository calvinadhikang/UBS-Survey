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
		
		if ($username == "admin" && $password == "admin") {
			redirect(base_url('dashboard'));
		}else{
			//cek apakah ada
			$user = $this->User->find($username, $password);
			if ($user == null) {
				$this->toastr->error("Login Salah !");
				redirect(base_url());
			}else{
				$this->session->set_userdata('login', $user);
				if ($user->ROLE == 0) {
					redirect(base_url('dashboard'));
				}else{
					redirect(base_url('responden'));
				}
			}

		}
	}
}
