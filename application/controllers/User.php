<?php

class User extends CI_Controller {
	
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('admin/user/view');
		$this->load->view('template/footer');
	}
}
