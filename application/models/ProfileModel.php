<?php

class ProfileModel extends CI_Model {

    public $table_name = "R_PROFILE";

    public function duplicate($idSession, $idTanya, $idDitanya)
    {
        $query = $this->db->query("SELECT COUNT(*) AS TOTAL FROM $this->table_name WHERE ID_SESSION = $idSession AND DIVISI_TANYA = '$idTanya' AND DIVISI_DITANYA = '$idDitanya'");
        $count_row = ($query->result()[0]->TOTAL);
        if ($count_row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function addSurveyor($idSession, $idTanya, $idDitanya)
    {
        if ($this->duplicate($idSession, $idTanya, $idDitanya)) {
            return FALSE;
        }

        $data = array(
            'ID_SESSION' => $idSession,
            'DIVISI_TANYA' => $idTanya, 
            'DIVISI_DITANYA' => $idDitanya 
        );
        $this->db->insert("R_PROFILE", $data);

        return TRUE;
    }

    public function getProfile($idSession, $idDitanya, $idTanya = null)
    {
        if ($idTanya == null) {
            return $this->db->get_where("R_PROFILE", [
                'ID_SESSION' => $idSession,
                'DIVISI_DITANYA' => $idDitanya
                ])->result();
        }else{
            return $this->db->get_where("R_PROFILE", [
                'ID_SESSION' => $idSession,
                'DIVISI_DITANYA' => $idDitanya,
                'DIVISI_TANYA' => $idTanya
                ])->result()[0];
        }
    }

    public function getSurveyor($idSession, $idDitanya)
    {
        $this->load->model('DivisiModel','Divisi');
        $profile = $this->getProfile($idSession, $idDitanya);
        
        $data = [];
        foreach ($profile as $key => $value) {
            $data[] = $this->Divisi->get($value->DIVISI_TANYA);
        }

        return $data;
    }
}