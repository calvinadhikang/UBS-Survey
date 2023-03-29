<?php
class UserModel extends CI_Model {

    public $table_name = "M_USER";

    public function add($divisi, $username, $nama, $password, $role, $status)
    {
        if ($this->duplicate($username)) {
            return 0;
        }else{
            $data = array(
                'DIVISI' => $divisi,
                'USERNAME' => $username,
                'PASSWORD' => $password,
                'NAMA' => $nama ,
                'ROLE' => $role,
                'STATUS' => $status,
            );
            $this->db->insert($this->table_name, $data);
            return 1;
        }
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM $this->table_name WHERE ID = '$id'");
        return 1;
    }

    public function get($id = null){
        if ($id === null) {
            return $this->db->get($this->table_name)->result();
        }else{
            return $this->db->get_where($this->table_name, ['ID' => $id])->result();
        }
    }

    public function update($id, $divisi, $username, $nama, $password, $role, $status){
        if ($this->duplicate($username)) {
            return 0;
        }else{
            $data = array(
                'ID' => $id,
                'DIVISI' => $divisi,
                'USERNAME' => $username,
                'PASSWORD' => $password,
                'NAMA' => $nama ,
                'ROLE' => $role,
                'STATUS' => $status,
            );
            $this->db->where('ID', $id);
            $this->db->update($this->table_name, $data);
            return 1;
        }
    }

    public function duplicate($username)
    {
        $query = $this->db->query("SELECT COUNT(*) AS TOTAL FROM $this->table_name WHERE USERNAME = '$username'");
        $count_row = ($query->result()[0]->TOTAL);
        if ($count_row > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}