<?php
class ResponseModel extends CI_Model {

    public $header_table = "H_RESPONSE";
    public $detail_table = "D_RESPONSE";
    
    public function createTransaction($idUser, $idProfile, $dataResponse)
    {
        $dataHeader = array(
            'ID_USER' => $idUser,
            'ID_PROFILE' => $idProfile,
        );
    
        try {
            $this->db->trans_start();
            // Insert Header
            $this->db->insert($this->header_table, $dataHeader);
            $lastQuery = $this->db->query("select max(id) as lastId from h_response")->result();
            $lastId = (int)$lastQuery[0]->LASTID;
            
            // Insert Detail
            foreach ($dataResponse as $key => $value) {
                $dataDetail = array(
                    'ID_HRESPONSE' => $lastId,
                    'ID_PERTANYAAN' => $value->ID,
                    'JAWABAN' => $value->GRADE,
                    'SARAN' => $value->SARAN,
                );
                $this->db->insert($this->detail_table, $dataDetail);
            }


            $this->db->trans_complete();
            return $lastId;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    
}