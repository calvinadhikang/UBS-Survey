<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class SurveyAPI extends RestController{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel", "User");
    }

    public function index_get()
    {
        $userId = $this->get('user') ?? "";
        $divisiUserId = $this->get('divisi') ?? "";
        $sesiId = $this->get('sesi') ?? "";

        if ($divisiUserId == "" || $sesiId == "" | $userId == "") {
            $this->response([
                'error' => true,
                'message' => "Surveyor, User dan Sesi harus terisi"
            ], RestController::HTTP_BAD_REQUEST);
        }

        $survey = $this->User->getSurvey($userId, $divisiUserId, $sesiId);
        if ($survey) {
            $this->response([
                'error' => false,
                'message' => "Berhasil mendapat survey",
                'data' => $survey
            ], RestController::HTTP_OK);
        }
    }   
}

?>