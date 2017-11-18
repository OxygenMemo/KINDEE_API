<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {

    public function Register(){
        $result = new obj();
        $data = new obj();
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $fullname = $this->input->post('fname');
        $fullname .= " ".$this->input->post('lname');
        if(!empty($username) && !empty($password) && !empty($fullname)){
            $this->load->model("User_DB");
            $User_DB = $this->User_DB;
            $User_DB->username = $username;
            $User_DB->password = $password;
            $User_DB->fullname = $fullname;

            $data->$data = $User_DB->Register();
            $result->result = $data;
            echo json_encode($result);

        }else{
            $data->data = false;
            $result->result = $data;
            echo json_encode($result);
        }

    }
    
}
class obj{}

