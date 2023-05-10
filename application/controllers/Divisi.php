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
		$alias = $this->input->post('alias');
		$this->Divisi->delete($alias);

		$this->toastr->success('Berhasil Hapus Divisi');
		return redirect(base_url('divisi'));
	}
	
	public function update()
	{
		$aliasOld = $this->input->post('aliasOld');
		$nama = $this->input->post('nama');
		$alias = $this->input->post('alias');
		$result = $this->Divisi->update($aliasOld, $alias, $nama);

		if ($result) {
			$this->toastr->success('Berhasil Update Divisi');
		}else{
			$this->toastr->error('Kode tidak boleh kembar');
		}

		return redirect(base_url('divisi'));
	}

	public function detail()
	{
		$this->load->model('SesiModel', 'Sesi');	
		$this->load->model('ProfileModel', 'Profile');	

		$alias = $this->input->get('alias');

		$divisi = $this->Divisi->get($alias);
		$allDivisi = $this->Divisi->get();
		$karyawan = $this->Divisi->getKaryawan($alias);
		$sesi = $this->Sesi->getActive();
		$surveyor = $this->Profile->getSurveyor($sesi->ID, $divisi->ALIAS);

		if ($sesi == null) {
			$this->toastr->error('Tidak ada Session / Sesi Survey yang Aktif. Silahkan ke Dashboard dan Pilih Sesi Survey');
			return redirect($_SERVER['HTTP_REFERER']);
		}

		$data['divisi'] = $divisi;
		$data['allDivisi'] = $allDivisi;
		$data['count_karyawan'] = count($karyawan);
		$data['karyawan'] = $karyawan;
		$data['sesi'] = $sesi;
		$data['surveyor'] = $surveyor;
		
		$this->load->view('template/admin/header');
		$this->load->view('admin/divisi/detail', $data);
		$this->load->view('template/admin/footer');
	}

	public function addSurveyor()
	{
		$this->load->model('SesiModel', 'Sesi');	
		$this->load->model('ProfileModel', 'Profile');	

		$idDitanya = $this->input->post('divisiDitanya');
		$idTanya = $this->input->post('divisiTanya');
		$sesi = $this->Sesi->getActive();

		if ($sesi == null) {
			$this->toastr->error('Session belum di set, Silahkan pilih salah satu Session di Dashboard');
			return redirect(base_url("divisi/detail?alias=$idDitanya"));
		}

		$result = $this->Profile->addSurveyor($sesi->ID, $idTanya, $idDitanya);
		if ($result) {
			$this->toastr->success('Berhasil Tambah Divisi Surveyor');
		}else{
			$this->toastr->error('Divisi Surveyor tidak boleh kembar');
		}

		return redirect(base_url("divisi/detail?alias=$idDitanya"));
	}

	public function viewSurveyor()
	{
		$surveyor = $this->input->get('surveyor');
		$target = $this->input->get('target');

		$this->load->model('SesiModel', 'Sesi');	
		$this->load->model('ProfileModel', 'Profile');	
		$this->load->model('PertanyaanModel', 'Pertanyaan');	

		$sesi = $this->Sesi->getActive();
		$profile = $this->Profile->getProfile($sesi->ID, $target, $surveyor);
		$tanya = $this->Divisi->get($surveyor);
		$ditanya = $this->Divisi->get($target);
		$pertanyaan = $this->Pertanyaan->getPertanyaanSurveyor($profile->ID);

		$data['sesi'] = $sesi;
		$data['profile'] = $profile;
		$data['tanya'] = $tanya;
		$data['ditanya'] = $ditanya;
		$data['pertanyaan'] = $pertanyaan;

		$this->load->view('template/admin/header');
		$this->load->view('admin/divisi/surveyor', $data);
		$this->load->view('template/admin/footer');
	}

	public function viewPertanyaanSurveyor()
	{
		$surveyor = $this->input->get('surveyor');
		$target = $this->input->get('target');

		$this->load->model('SesiModel', 'Sesi');	
		$this->load->model('ProfileModel', 'Profile');	
		$this->load->model('PertanyaanModel', 'Pertanyaan');
		
		$sesi = $this->Sesi->getActive();
		$profile = $this->Profile->getProfile($sesi->ID, $target, $surveyor);
		$tanya = $this->Divisi->get($surveyor);
		$ditanya = $this->Divisi->get($target);

		$data['sesi'] = $sesi;
		$data['profile'] = $profile;
		$data['tanya'] = $tanya;
		$data['ditanya'] = $ditanya;

		$this->load->view('template/admin/header');
		$this->load->view('admin/divisi/pertanyaanSurveyor', $data);
		$this->load->view('template/admin/footer');
	}

	public function addPertanyaan()
	{
		$idPertanyaan = $this->input->post('pertanyaan');
		$idProfile = $this->input->post('profile');

		$alias = $this->input->post('alias');
		$parent = $this->input->post('parent');

		$this->load->model('PertanyaanModel', 'Pertanyaan');
		$result = $this->Pertanyaan->addPertanyaanSurveyor($idPertanyaan, $idProfile);
		if ($result) {
			$this->toastr->success("Berhasil tambah pertanyaan");
		}else{
			$this->toastr->error("Pertanyaan tidak boleh duplikat");
		}

		return redirect('divisi/detail/surveyor?alias='.$alias."&parent=".$parent);
	}
}
