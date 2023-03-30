<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responden extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SesiModel', 'Sesi');
        $this->load->model('UserModel', "User");
	}

	public function index()
	{
        $user = $_SESSION['login'];
        $sesi = $this->Sesi->getActive();
        $survey = $this->User->getSurvey($user->DIVISI, $sesi->ID);

		$data['sesiAktif'] = $sesi;
        $data['user'] = $user;
        $data['survey'] = $survey;

		$this->load->view('template/responden/header', $data);
		$this->load->view('responden/dashboard', $data);
		$this->load->view('template/responden/footer');
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
