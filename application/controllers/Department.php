<?php

class Department extends CI_Controller {
	
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('admin/department/view');
		$this->load->view('template/footer');
	}
}
