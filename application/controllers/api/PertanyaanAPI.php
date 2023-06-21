<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class PertanyaanAPI extends RestController{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("PertanyaanModel", "Pertanyaan");
    }

    public function index_get()
    {
        header('Access-Control-Allow-Origin: *');

        $id = $this->get('id');
        if ($id === null) {
            $row = $this->Pertanyaan->get();
        }else{
            $row = $this->Pertanyaan->get($id);
        }

        $profile = $this->get('profile');
        if ($profile != null) {
            $row = $this->Pertanyaan->getPertanyaanSurveyor($profile);
        }

        $this->response([
            "error" => false,
            'message' => 'Fetch pertanyaan berhasil',
            'data' => $row
        ], RestController::HTTP_OK);
    }

    public function index_post()
    {
        $teks = $this->post('teks') ?? "";
        if ($teks == "") {
            $this->response([
                'error' => true,
                'message' => "Input tidak boleh kosong"
            ], RestController::HTTP_BAD_REQUEST);
        }

        $result = $this->Pertanyaan->add($teks);
        if ($result) {
            $this->response([
                'error' => false,
                'message' => "Berhasil tambah"
            ], RestController::HTTP_CREATED);
        }else{
            $this->response(['message' => "Gagal tambah"], RestController::HTTP_BAD_REQUEST);
        }
    }
}

?>