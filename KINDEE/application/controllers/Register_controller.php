<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {

    public function Register(){
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
            $result=$User_DB->Register();
            return $result;

        }else{
            return "miss info";
        }

    }
    public function testJson(){
        $result->result=1;
        echo json_encode($result);
    }
}

