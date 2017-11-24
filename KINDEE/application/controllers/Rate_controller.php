<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate_controller extends CI_Controller {
    public function getResRate($Res_id){
        $this->load->model("Rate_DB");
        
        $Rate_DB = $this->Rate_DB;
        $Rate_DB->Res_id = $Res_id;
        $obj = new obj();
        $result = $Rate_DB->getResRate();
        $sum=0;
        $num=$result->num_rows();
        foreach($result->result() as $row){
            $sum+=$row->Rate_number;
        }
        
        $sum/=$num;
        $obj->Rate_number = sprintf("%0.02f",$sum);
        echo json_encode($sum);
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