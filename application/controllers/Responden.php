<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responden extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SesiModel', 'Sesi');
        $this->load->model('UserModel', "User");
        $this->load->model('ProfileModel', "Profile");
        $this->load->model('DivisiModel', "Divisi");
        $this->load->model('PertanyaanModel', "Pertanyaan");
	}

	public function index()
	{
        $user = $_SESSION['login'];
        $sesi = $this->Sesi->getActive();
        $survey = $this->User->getSurvey($user->ID, $user->DIVISI, $sesi->ID);

		$data['sesiAktif'] = $sesi;
        $data['user'] = $user;

		// Disimpan dalam session, untuk keperluan Data List Survey yang dijawab oleh Responden
		$this->session->set_userdata('sesi', $sesi);

		$this->load->view('template/responden/header');
		$this->load->view('responden/dashboard', $data);
		$this->load->view('template/responden/footer');
	}

	public function survey()
	{
		$idProfile = $this->input->get('quiz');

		$profile = $this->Profile->get($idProfile);
		$tanya = $this->Divisi->get($profile->DIVISI_TANYA);
		$pertanyaan = $this->Pertanyaan->getPertanyaanSurveyor($idProfile);
		
		$data['pertanyaan'] = $pertanyaan;
		$data['profile'] = $profile;
		$data['divisi'] = $tanya;

		$this->load->view('template/responden/header');
		$this->load->view('responden/survey', $data);
		$this->load->view('template/responden/footer');
	}

	public function submitSurvey()
	{

	}
}
