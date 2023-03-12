<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class User extends RestController{
    
    function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        $this->load->database();
        $query = $this->db->query('SELECT * FROM TEST');
        $row = $query->result_array();

        $this->response($row, RestController::HTTP_OK);
    }
}

?>