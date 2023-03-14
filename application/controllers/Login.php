<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function action()
	{
		$username = $this->input->post('username');
		
		if ($username != "admin") {
			redirect(base_url());
		}else{
			redirect(base_url().'dashboard');
		}
	}
}
