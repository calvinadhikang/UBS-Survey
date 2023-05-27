<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class LaporanAPI extends RestController{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("LaporanModel", "Laporan");
    }

    public function index_get()
    {
        $type = $this->get('type') ?? "";
        $filter = $this->get('filter') ?? "";
        $sesi = $this->get('sesi') ?? "";
        $divisi = $this->get('divisi') ?? "";

        if ($type == "completion") {
            // Laporan Completion
            $result = $this->Laporan->Completion($divisi, $sesi);
            $this->response([
                'type' => 'Laporan Completion',
                'data' => $result
            ], RestController::HTTP_OK);
        }else if ($type == "grade") {
            // Laporan Grade
            $result = $this->Laporan->Grade($divisi, $sesi);
            $this->response([
                'type' => 'Laporan Grade',
                'data' => $result
            ], RestController::HTTP_OK);
        }

    }   
}

?>