<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SesiModel', 'Sesi');	
		$this->load->model('DivisiModel', 'Divisi');	
	}

	public function index()
	{
		$data['sesiAktif'] = $this->Sesi->getActive();
		$data['listSesi'] = $this->Sesi->get();
		$data['divisi'] = $this->Divisi->get();

		$this->load->view('template/admin/header');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/admin/footer');
	}

	public function updateSesi()
	{
		$id = $this->input->post('sesi');

		$success = $this->Sesi->setActive($id);
		if ($success) {
			$this->toastr->success('Berhasil Set Session');
		}else{
			$this->toastr->error('Gagal Set Session');
		}
		return redirect(base_url('dashboard'));
	}
}
