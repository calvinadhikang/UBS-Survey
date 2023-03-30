<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class UserAPI extends RestController{
    
    function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $query = $this->db->query("SELECT * FROM TEST");
            $row = $query->result_array();
        }else{
            $data = array(
                'NAMA' => $this->get('new')
            );
            $this->db->where('NAMA', $this->get($id));
            $this->db->update('TEST', $data);

            $query = $this->db->query("SELECT * FROM TEST WHERE NAMA = '$id'");
            $row = $query->result_array();
        }

        $this->response($row, RestController::HTTP_OK);
    }
}

?>