<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class LaporanAPI extends RestController{
    
    function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $type = $this->get('type') ?? "";
        $filter = $this->get('filter') ?? "";
        $sesi = $this->get('sesi') ?? "";
        $divisi = $this->get('divisi') ?? "";

        if ($type == "completion") {
            // Laporan Completion
        }else if ($type == "grade") {
            $lima = 0;
            $empat = 0;
            $tiga = 0;
            $dua = 0;
            $satu = 0;
            // Laporan Grade
            if ($divisi == "") {
                $profiles = $this->db->query("select id from r_profile where id_session = $sesi")->result();
            }else{
                $profiles = $this->db->query("select id from r_profile where id_session = $sesi and divisi_ditanya = '$divisi'")->result();
            }

            //dapatkan seluruh hresponse perprofile
            $hResponses = [];
            foreach ($profiles as $key => $value) {
                $temp = $this->db->query("select id from h_response where id_profile = $value->ID")->result();
                foreach ($temp as $key => $valueTemp) {
                    $hResponses[] = $valueTemp->ID;
                }
            }

            //iterate semua dresponse berdasarkan hresponse diatas
            //untuk mendapatkan grade
            foreach ($hResponses as $key => $value) {
                $temp = $this->db->query("select jawaban from d_response where id_hresponse = $value")->result();
                foreach ($temp as $key => $valueTemp) {
                    if ($valueTemp->JAWABAN == 5) {
                        $lima++;
                    }else if ($valueTemp->JAWABAN == 4) {
                        $empat++;
                    }else if ($valueTemp->JAWABAN == 3) {
                        $tiga++;
                    }else if ($valueTemp->JAWABAN == 2) {
                        $dua++;
                    }else if ($valueTemp->JAWABAN == 1) {
                        $satu++;
                    }
                }
            }
        }

        $this->response([
            'data' => [
                ['name' => '5', 'value' => $lima],
                ['name' => '4', 'value' => $empat],
                ['name' => '3', 'value' => $tiga],
                ['name' => '2', 'value' => $dua],
                ['name' => '1', 'value' => $satu],
            ]
        ], RestController::HTTP_OK);
    }   
}

?>