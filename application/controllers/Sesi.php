<?php

class Sesi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SesiModel', 'Sesi');	
	}
	
	public function index()
	{
		$data['data'] = $this->Sesi->get();

		$this->load->view('template/admin/header');
		$this->load->view('admin/session/view', $data);
		$this->load->view('template/admin/footer');
	}

	public function add()
	{
		$nama = $this->input->post('nama');
		$mulai = $this->input->post('mulai');
		$akhir = $this->input->post('akhir');
		$status = 0;

		$result = $this->Sesi->add($nama, $mulai, $akhir, $status);
		if ($result) {
			$this->toastr->success('Success Tambah Session');
		}else{
			$this->toastr->error('Gagal Tambah Session, Tanggal MULAI tidak boleh lebih besar dari tanggal AKHIR');
		}
		return redirect(base_url('sesi'));
	}
}
