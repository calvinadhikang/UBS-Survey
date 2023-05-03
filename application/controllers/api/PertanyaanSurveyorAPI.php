<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class PertanyaanSurveyorAPI extends RestController{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("PertanyaanModel", "Pertanyaan");
    }

    public function index_get()
    {
        // Mendapatkan pertanyaan untuk menentukan pertanyaan survey,
        // Dimana pertanyaan yang sebelumnya sudah ditambahkan akan diberi status CHECK = true.
        
        // 1. Get Pertanyaan Yang Sudah Ada sesuai Profile
        $profile = $this->get('profile');
        if ($profile != null) {
            $pertanyaanProfile = $this->Pertanyaan->getPertanyaanSurveyor($profile);
        }
        
        // 2. Get Semua Pertanyaan Yang Ada
        $pertanyaanAll = $this->Pertanyaan->get();
        
        // 3. Di ForEach agar bila data langkah 1 dan 2 ada yang sama ID nya..
        // Maka berikan status CHECK = true (sudah ditambahkan sebelumnya) 
        $data = [];
        foreach ($pertanyaanAll as $key => $value) {
            $flag = false;
            foreach ($pertanyaanProfile as $key => $valueProfile) {
                if ($value->ID == $valueProfile->ID) {
                    $flag = true;
                }
            }
            
            if ($flag) {
                $value->CHECK = true;
            }else{
                $value->CHECK = false;
            }
        }
        
        $this->response([
            "error" => false,
            'message' => 'Fetch pertanyaan profile berhasil',
            'data' => $pertanyaanAll
        ], RestController::HTTP_OK);
    }
    
    public function index_post()
    {
        $profile = $this->post('profile');
        $data = json_decode($this->post('data'));

        $this->Pertanyaan->resetPertanyaanSurveyor($profile);
        foreach ($data as $key => $value) {
            $this->Pertanyaan->addPertanyaanSurveyor($value->ID, $profile);
        }
        
        $this->response([
            'error' => false,
            'message' => $data
        ], RestController::HTTP_CREATED);
    }
}

?>