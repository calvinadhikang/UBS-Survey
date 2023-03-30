<?php
class DivisiModel extends CI_Model {

    public $table_name = "M_DIVISI";

    public function add($alias, $nama)
    {
        if ($this->duplicate($alias)) {
            return FALSE;
        }else{
            $data = array(
                'ALIAS' => $alias,
                'NAMA' => $nama 
            );
            $this->db->insert($this->table_name, $data);

            return TRUE;
        }
    }

    public function delete($id)
    {
        $query = $this->db->query("DELETE FROM $this->table_name WHERE ID = $id");
    }

    public function get($id = null){
        if ($id === null) {
            return $this->db->get($this->table_name)->result();
        }else{
            return $this->db->get_where($this->table_name, ['ID' => $id])->result();
        }
    }

    public function update($id, $alias, $nama){
        if ($this->duplicate($alias)) {
            return FALSE;
        }else{
            $data = array(
                'ALIAS' => $alias,
                'NAMA' => $nama
            );
            $this->db->where('ID', $id);
            $this->db->update($this->table_name, $data);

            return TRUE;
        }
    }

    public function duplicate($alias)
    {
        $query = $this->db->query("SELECT COUNT(*) AS TOTAL FROM $this->table_name WHERE ALIAS = '$alias'");
        $count_row = ($query->result()[0]->TOTAL);
        if ($count_row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}