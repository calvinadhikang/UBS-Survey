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

    public function delete($alias)
    {
        $query = $this->db->query("DELETE FROM $this->table_name WHERE ALIAS = '$alias'");
    }

    public function get($alias = null){
        if ($alias === null) {
            return $this->db->get($this->table_name)->result();
        }else{
            return $this->db->get_where($this->table_name, ['ALIAS' => $alias])->result()[0];
        }
    }

    public function update($old, $alias, $nama){
        if ($this->duplicate($alias)) {
            return FALSE;
        }else{
            $data = array(
                'ALIAS' => $alias,
                'NAMA' => $nama
            );
            $this->db->where('ALIAS', $old);
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
    
    public function getKaryawan($alias)
    {
        return $this->db->get_where("M_USER", ['DIVISI' => $alias])->result();
    }
}