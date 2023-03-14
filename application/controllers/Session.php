<?php

class Session extends CI_Controller {
	
	public function index()
	{
		$this->load->view('template/admin/header');
		$this->load->view('admin/session/view');
		$this->load->view('template/admin/footer');
	}
}
