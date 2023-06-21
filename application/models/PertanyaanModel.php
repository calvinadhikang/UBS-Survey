<?php

use PhpParser\Node\Stmt\TryCatch;

class PertanyaanModel extends CI_Model {

    public $table_name = "M_PERTANYAAN";

    public function add($text)
    {
        if ($this->duplicate($text)) {
            return 0;
        }else{
            $data = array(
                'TEXT' => $text,
                'STATUS' => 1
            );
            $this->db->insert($this->table_name, $data);
            return 1;
        }
    }

    public function delete($id)
    {
        $this->db->query("UPDATE $this->table_name SET STATUS = 0 WHERE ID = '$id'");
    }

    public function get($id = null){
        if ($id === null) {
            return $this->db->query("SELECT * FROM $this->table_name WHERE STATUS = 1")->result();
        }else{
            return $this->db->query("SELECT * FROM $this->table_name WHERE ID = $id")->result();
        }
    }

    public function update($id, $text){
        if ($this->duplicate($text)) {
            return 0;
        }else{
            $data = array(
                'ID' => $id,
                'TEXT' => $text
            );
            $this->db->where('ID', $id);
            $this->db->update($this->table_name, $data);
            return 1;
        }
    }

    public function duplicate($text)
    {
        $query = $this->db->query("SELECT COUNT(*) AS TOTAL FROM $this->table_name WHERE TEXT = '$text'");
        $count_row = ($query->result()[0]->TOTAL);
        if ($count_row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getPertanyaanSurveyor($idProfile)
    {
        $result = $this->db->get_where("R_PERTANYAAN", ['ID_PROFILE' => $idProfile])->result();
        $data = [];
        if (count($result) > 0) {
            foreach ($result as $key => $value) {
                $data[] = $this->Pertanyaan->get($value->ID_PERTANYAAN)[0];
            }
        }
        return $data;
    }

    public function addPertanyaanSurveyor($idPertanyaan, $idProfile)
    {
        $result = $this->db->get_where("R_PERTANYAAN", ['ID_PROFILE' => $idProfile, 'ID_PERTANYAAN' => $idPertanyaan])->result();
        if (count($result) > 0) {
            return false;
        }
        
        $data = array(
            'ID_PROFILE' => $idProfile,
            'ID_PERTANYAAN' => $idPertanyaan
        );
        $this->db->insert("R_PERTANYAAN", $data);
        return true;
    }

    public function resetPertanyaanSurveyor($idProfile)
    {
        $this->db->delete('R_PERTANYAAN', ['ID_PROFILE' => $idProfile]);
        return true;
    }
}