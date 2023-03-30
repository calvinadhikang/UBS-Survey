<?php
class SesiModel extends CI_Model {

    public $id;
    public $nama;
    public $mulai;
    public $akhir;
    public $status;
    public $table_name = "M_SESSION";

    public function add($nama, $mulai, $akhir, $status)
    {
        if ($mulai > $akhir) {
            return 0;
        }else{
            $this->db->query("INSERT INTO $this->table_name (NAMA, MULAI, AKHIR, STATUS) VALUES (
                '$nama',
                TO_DATE('$mulai', 'YYYY-MM-DD'),
                TO_DATE('$akhir', 'YYYY-MM-DD'),
                $status
            )");
            return 1;
        }
    }

    public function get($id = null){
        if ($id === null) {
            return $this->db->get($this->table_name)->result();
        }else{
            return $this->db->get_where($this->table_name, ['ID' => $id])->result();
        }
    }

    public function getActive(){
        $query = $this->db->get_where($this->table_name, ['STATUS' => 1])->result();
        if (count($query) > 0) {
            return $query[0];
        }else{
            return null;
        }
    }

    public function save(){
        $data = array(
            'NAMA' => $this->nama,
            'MULAI' => $this->mulai,
            'AKHIR' => $this->akhir,
            'STATUS' => $this->status,
        );
        $this->db->where('ID', $this->alias);
        $this->db->update($this->table_name, $data);
        return 1;
    }

    public function setActive($id)
    {
        try {
            $data = array(
                'STATUS' => 0
            );
            $this->db->update($this->table_name, $data);
            
            $data = array(
                'STATUS' => 1
            );
            $this->db->where('ID', $id);
            $this->db->update($this->table_name, $data);
            
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }
}