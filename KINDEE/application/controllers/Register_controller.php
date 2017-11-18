<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {

    public function Register(){
        $result = new obj();
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

            $result->result=$User_DB->Register();
            echo json_encode($result);

        }else{
            $result->result = "missing info data !";
            echo json_encode($result);
        }

    }
    
}
class obj{}

