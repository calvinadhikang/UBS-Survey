<?php

class Divisi extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('DivisiModel', 'Divisi');
    }
	
	public function index()
	{
		$item = $this->Divisi->get();
		$data['data'] = $item;

		$this->load->view('template/admin/header');
		$this->load->view('admin/divisi/view', $data);
		$this->load->view('template/admin/footer');
	}

	public function add()
	{
		$nama = $this->input->post('nama');
		$alias = $this->input->post('alias');
		$result = $this->Divisi->add($alias, $nama);

		if ($result) {
			$this->toastr->success('Berhasil Menambah Divisi');
		}else {
			$this->toastr->error('Kode tidak boleh kembar');
		}
		return redirect(base_url('divisi'));
	}
	
	public function delete()
	{
		$id = $this->input->post('id');
		$this->Divisi->delete($id);

		$this->toastr->success('Berhasil Hapus Divisi');
		return redirect(base_url('divisi'));
	}
	
	public function update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alias = $this->input->post('alias');
		$result = $this->Divisi->update($id, $alias, $nama);

		if ($result) {
			$this->toastr->success('Berhasil Update Divisi');
		}else{
			$this->toastr->error('Kode tidak boleh kembar');
		}

		return redirect(base_url('divisi'));
	}
}
