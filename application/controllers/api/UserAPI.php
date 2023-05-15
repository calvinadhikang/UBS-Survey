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
        // HANDLE RANDOM USERS PASSWORD
        $command = $this->post('command') ?? "";
        if ($command == "random") {
            $usersFromDB = $this->User->get();
            
            $users = [];
            foreach ($usersFromDB as $key => $value) {
                if ($value->ROLE != 0) {
                    $users[] = $value;
                }
            }
            
            $size = count($users);
            $arrNewPassword = [];

            $a = 0;
            while ($a <= 10) {
                $length = 6;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[random_int(0, $charactersLength - 1)];
                }

                //check duplicate
                $duplicate = false;
                foreach ($arrNewPassword as $key => $value) {
                    if ($value == $randomString) {
                        $duplicate = true;
                    }
                }

                // Kalau tidak duplicate, baru masukan ke dalam array
                if (!$duplicate) {
                    $arrNewPassword[] = $randomString;
                    $a++;
                }
            }

            // Transaction
            try {
                $this->db->trans_start();

                for ($i=0; $i < $size; $i++) { 
                    $userID = $users[$i]->ID;
                    $newPass = $arrNewPassword[$i];
                    
                    $data = array(
                        'ID' => $userID,
                        'PASSWORD' => $newPass
                    );
                    $this->db->where('ID', $userID);
                    $this->db->update('M_USER', $data);
                }

                $this->db->trans_complete();
            } catch (\Throwable $th) {
                $this->response([
                    'error' => true,
                    'message' => "Gagal random password",
                    'data' => $arrNewPassword
                ], RestController::HTTP_INTERNAL_ERROR);
            }

            $this->response([
                'error' => false,
                'message' => "Berhasil random password",
                'data' => $arrNewPassword
            ], RestController::HTTP_OK);
        }

        // HANDLE USER LOGIN
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