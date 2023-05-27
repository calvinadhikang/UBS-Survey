<?php
class LaporanModel extends CI_Model {

    public $header_table = "H_RESPONSE";
    public $detail_table = "D_RESPONSE";
    
    public function Grade($divisi, $sesi)
    {
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

        $result = [
            ['name' => '5', 'value' => $lima],
            ['name' => '4', 'value' => $empat],
            ['name' => '3', 'value' => $tiga],
            ['name' => '2', 'value' => $dua],
            ['name' => '1', 'value' => $satu],
        ];
        return $result;
    }

    public function Completion($divisi, $sesi)
    {
        $this->load->model("DivisiModel", "Divisi");

        // Laporan Grade
        if ($divisi == "") {
            $profiles = $this->db->query("select * from r_profile where id_session = $sesi")->result();
            $users = $this->db->query("select count(*) as JUMLAH from m_user where status=1")->result();
        }else{
            $profiles = $this->db->query("select * from r_profile where id_session = $sesi and divisi_tanya = '$divisi'")->result();
            $users = $this->db->query("select count(*) as JUMLAH from m_user where divisi='KEU' and status=1")->result();
        }

        // Ambil Jumlah HResponse / Jumlah Quiz Yang Sudah Di Submit
        $jumlahHResponse = 0;
        // Ambil Divisi Apa saja yang di Survey
        $arrDivisiDiSurvey = [];
        foreach ($profiles as $key => $value) {
            $alias = $value->DIVISI_DITANYA;
            $arrDivisiDiSurvey[] = $this->Divisi->get($alias);
            
            $hresponses = $this->db->query("select count(*) as JUMLAH from h_response where id_profile=$value->ID")->result();
            $jumlahHResponse += $hresponses[0]->JUMLAH;
        }

        // Ambil Jumlah User
        $jumlahUser = $users[0]->JUMLAH;
        $jumlahDivisiDiSurvey = count($arrDivisiDiSurvey);
        $jumlahSurveyTotal = $jumlahUser * $jumlahDivisiDiSurvey;


        $result = [
            'jumlahUser' => $jumlahUser,
            'jumlahDivisiDiSurvey' => $jumlahDivisiDiSurvey,
            'listDivisiDiSurvey' => $arrDivisiDiSurvey,
            'jumlahSurveySelesai' => $jumlahHResponse,
            'jumlahSurveyTotal' => $jumlahSurveyTotal
        ];
        return $result;
    }

    
}