<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {

    public function Register(){
        $arr = array();
        array_push($arr,"gg","gcc");
        echo json_encode($arr);
    }
}

