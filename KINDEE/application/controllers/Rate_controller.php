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
        if($num>0){
            foreach($result->result() as $row){
                $sum+=$row->Rate_number;
            }
        
            $sum/=$num;
            $obj->Rate_number = sprintf("%0.02f",$sum);
            echo json_encode($obj);
        }else{
            $obj->Rate_number=0;
            echo json_encode($obj);
        }
    }
    public function getRateUser($Res_id,$User_id){
        $this->load->model("Rate_DB");
        $result = new obj();
        $Rate_DB = $this->Rate_DB;
        $Rate_DB->Res_id = $Res_id;
        $Rate_DB->User_id = $User_id;

        $result = $Rate_DB->getRateUser()->result();
        foreach($result as $row){
            echo json_encode($row);
        }
        
    }
    public function RatingRes(){
        $Rate_number = $this->input->post('Rate_number');
        $User_id = $this->input->post('User_id');
        $Res_id = $this->input->post('Res_id');

        if($Rate_number>0 && $Rate_number<=5){
            $this->load->model("Rate_DB");
            $Rate_DB = $this->Rate_DB;
            $Rate_DB->Res_id = $Res_id;
            $Rate_DB->User_id = $User_id;
            $Rate_DB->Rate_number = $Rate_number;
            $result = $Rate_DB->getRateUser();
            if($result->num_rows() > 0){
                $Rate_DB->RatingUpdate();
            }else{
                $Rate_DB->RatingInsert();
            }
        }else{
            echo "mistake rate_number";
        }

    }
    
}
class obj {}