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

        echo json_encode($User_DB->Login());

    }
}