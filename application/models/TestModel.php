<?php
class TestModel extends CI_Model {

    public $nama;
    public $id;

    public function getAll(){
        $query = $this->db->get('TEST');
        return $query->result();
    }

    public function get($id){
        $query = $this->db->get_where('TEST', array('NAMA' => $id));

        $obj = new TestModel();
        $obj->nama = $query->result()[0]->NAMA; 
        $obj->id = $query->result()[0]->NAMA; 
        return $obj;
    }

    public function save(){
        $data = array(
            'NAMA' => $this->nama
        );
        $this->db->where('NAMA', $this->id);
        $this->db->update('TEST', $data);
        return 1;
    }
}