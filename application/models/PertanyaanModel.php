<?php
class PertanyaanModel extends CI_Model {

    public $table_name = "M_PERTANYAAN";

    public function add($text)
    {
        $data = array(
            'TEXT' => $text 
        );
        $this->db->insert($this->table_name, $data);
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM $this->table_name WHERE ID = '$id'");
    }

    public function get($id = null){
        if ($id === null) {
            return $this->db->get($this->table_name)->result();
        }else{
            return $this->db->get_where($this->table_name, ['ID' => $id])->result();
        }
    }

    public function update($id, $text){
        $data = array(
            'ID' => $id,
            'TEXT' => $text
        );
        $this->db->where('ID', $id);
        $this->db->update($this->table_name, $data);
        return 1;
    }
}