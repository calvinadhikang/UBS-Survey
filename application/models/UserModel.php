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

    public function find($username, $password)
    {
        $result =  $this->db->query("SELECT * FROM $this->table_name WHERE USERNAME = '$username' AND PASSWORD = '$password'")->result();
        if (count($result) > 0) {
            return $result[0];
        }else{
            return null;
        }
    }

    public function delete($id)
    {
        $this->db->query("UPDATE $this->table_name SET STATUS = 0 WHERE ID = '$id'");
        return 1;
    }

    public function get($id = null){
        if ($id === null) {
            return $this->db->get($this->table_name)->result();
        }else{
            return $this->db->get_where($this->table_name, ['ID' => $id])->result();
        }
    }

    public function getActiveRespondents()
    {
        return $this->db->query("SELECT * FROM M_USER WHERE STATUS=1 AND ROLE=1 ORDER BY DIVISI")->result();
    }

    public function update($id, $divisi, $username, $nama, $password, $role, $status){
        // if ($this->duplicate($username)) {
        //     return 0;
        // }else{
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
        // }
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

    public function getSurvey($idUser, $divisiUser, $idSession)
    {
        $this->load->model("DivisiModel", 'Divisi');

        $hresponse = $this->db->query("SELECT * FROM H_RESPONSE WHERE ID_USER = $idUser")->result();
        $query = $this->db->query("SELECT * FROM R_PROFILE WHERE ID_SESSION = $idSession AND DIVISI_TANYA = '$divisiUser'")->result();
        $data = [];
        foreach ($query as $key => $value) {
            //dapatkan data divisi sesuai profile
            $row = $this->Divisi->get($value->DIVISI_DITANYA);
            $row->ID_PROFILE = $value->ID;

            //dapatkan status survey sudah terjawab apa belum
            $isFinished = false;
            foreach ($hresponse as $key => $valueH) {
                if ($valueH->ID_PROFILE == $value->ID) {
                    $isFinished = true;
                }
            }
            $row->FINISHED = $isFinished;

            $data[] = $row;
        }
        return $data;
    }
}