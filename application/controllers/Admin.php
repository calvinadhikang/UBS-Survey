<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('template/admin/header');
		$this->load->view('admin/dashboard');
		$this->load->view('template/admin/footer');
	}

	public function test()
	{
		$this->load->view('test');
	}
}
