<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class ResponseAPI extends RestController{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("ResponseModel");
    }

    public function index_post()
    {
        header('Access-Control-Allow-Origin: *');

        $data = $this->post('data') ?? "";
        $idUser = $this->post('user') ?? "";
        $idProfile = $this->post('profile') ?? "";

        if ($data == "" || $idUser == "" || $idProfile == "") {
            $this->response([
                'error' => true,
                'message' => "Input tidak boleh kosong"
            ], RestController::HTTP_BAD_REQUEST);
        }

        $data = json_decode($data);
        $result = $this->ResponseModel->createTransaction($idUser, $idProfile, $data);
        
        if ($result == true) {
            $this->response([
                'error' => false,
                'message' => "Berhasil insert: $result"
            ], RestController::HTTP_CREATED);
        }else{
            $this->response([
                'error' => false,
                'message' => $result
            ], RestController::HTTP_INTERNAL_ERROR);    
        }
    }
}

?>