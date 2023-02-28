<?php

class Pertanyaan extends CI_Controller {
	
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('admin/pertanyaan/view');
		$this->load->view('template/footer');
	}
}
