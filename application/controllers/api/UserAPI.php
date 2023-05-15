<?php 
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class UserAPI extends RestController{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel', 'User');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $query = $this->db->query("SELECT * FROM TEST");
            $row = $query->result();
        }else{
            $data = array(
                'NAMA' => $this->get('new')
            );
            $this->db->where('NAMA', $this->get($id));
            $this->db->update('TEST', $data);

            $query = $this->db->query("SELECT * FROM TEST WHERE NAMA = '$id'");
            $row = $query->result();
        }

        $this->response($row, RestController::HTTP_OK);
    }   

    public function index_post()
    {
        $username = $this->post('username') ?? "";
        $password = $this->post('password') ?? "";

        $user = $this->User->find($username, $password);
        if ($user == null) {
            header('Access-Control-Allow-Origin: *');
            $this->response([
                'error' => true,
                'message' => 'User tidak ditemukan'
            ], RestController::HTTP_BAD_REQUEST);
        }else{
            header('Access-Control-Allow-Origin: *');
            $this->response([
                'error' => false,
                'message' => "User ditemukan",
                'data' => $user 
            ], RestController::HTTP_OK);
        }
    }
}

?>