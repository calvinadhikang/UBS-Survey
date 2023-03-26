<?php

class Pertanyaan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PertanyaanModel', 'Pertanyaan');	
	}

	public function index()
	{
		$data['data'] = $this->Pertanyaan->get();

		$this->load->view('template/admin/header');
		$this->load->view('admin/pertanyaan/view', $data);
		$this->load->view('template/admin/footer');
	}

	public function add()
	{
		$text = $this->input->post('text');
		$this->Pertanyaan->add($text);

		$this->toastr->success('Success Tambah Pertanyaan');
		return redirect(base_url('pertanyaan'));
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$obj = $this->Pertanyaan->delete($id);

		$this->toastr->success('Success Hapus Pertanyaan');
		return redirect(base_url('pertanyaan'));
	}
	
	public function update()
	{
		$id = $this->input->post('id');
		$text = $this->input->post('text');
		
		$this->Pertanyaan->update($id, $text);
	
		$this->toastr->success('Success Update Pertanyaan');
		return redirect(base_url('pertanyaan'));

		# code...
	}
}
