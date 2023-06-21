<?php

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel', 'User');
		$this->load->model('DivisiModel', 'Divisi');
	}
	
	public function index()
	{
		$data['data'] = $this->User->get();
		$data['divisi'] = $this->Divisi->get();

		$this->load->view('template/admin/header');
		$this->load->view('admin/user/view', $data);
		$this->load->view('template/admin/footer');
	}

	public function add()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$role = $this->input->post('role');
		if ($role == 0) {
			$divisi = "ADMIN";
		} else {
			$divisi = $this->input->post('divisi');
		}		
		$status = 1;
		$result = $this->User->add($divisi, $username, $nama, $password, $role, $status);

		if ($result) {
			$this->toastr->success('Berhasil menambah User : '.$nama);
		}else{
			$this->toastr->error("Username tidak boleh kembar");
		}
		return redirect(base_url('user'));
	}

	public function update()
	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$role = $this->input->post('role');
		if ($role == 0) {
			$divisi = "ADMIN";
		} else {
			$divisi = $this->input->post('divisi');
		}	
		$status = $this->input->post('status');

		$result = $this->User->update($id, $divisi, $username, $nama, $password, $role, $status);

		if ($result) {
			$this->toastr->success('Berhasil menambah User : '.$nama);
		}else{
			$this->toastr->error("Username tidak boleh kembar");
		}
		return redirect(base_url('user'));
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$result = $this->User->delete($id);

		$this->toastr->success('Success Hapus User');
		return redirect(base_url('user'));
	}

	public function active()
	{
		$id = $this->input->post('id');
		$result = $this->User->active($id);

		$this->toastr->success('Success Aktifkan User');
		return redirect(base_url('user'));
	}
}
