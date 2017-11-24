<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate_controller extends CI_Controller {
    public function getResRate($Res_id){
        $this->load->model("Rate_DB");
        $result = new obj();
        $Rate_DB = $this->Rate_DB;
        $Rate_DB->Res_id = $Res_id;

        $result->result = $Rate_DB->getResRate()->result();
        echo json_encode($result);
    }
    public function getRateUser($Res_id,$User_id){
        $this->load->model("Rate_DB");
        $result = new obj();
        $Rate_DB = $this->Rate_DB;
        $Rate_DB->Res_id = $Res_id;
        $Rate_DB->User_id = $User_id;

        $result->result = $Rate_DB->getRateUser()->result();
        echo json_encode($result);
    }
    
}
class obj {}