<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller{

    public function Login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $this->load->model('User_DB');
        $User_DB = $this->User_DB;
        $User_DB->username = $username;
        $User_DB->password = $password;

        
        $result = $User_DB->Login();
        $data = new obj();
        $user = new obj();
        if($result->num_rows() > 0){
            $data->status = true;
            foreach($result->result() as $row){
                $user->User_id = $row->User_id;
                $user->User_fullname = $row->User_fullname;
            }
        
        }else{
            $data->status = false;
            $user->User_id = "null";
            $user->User_fullname = "null";
        }
        
        $data->user = $user;
        echo json_encode($data);
         

    }
}
class obj{}
    