<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_controller extends CI_Controller{

    public function getAllCommentWithResId($Res_id){
        $this->load->model("Comment_DB");
    
        $Comment_DB = $this->Comment_DB;
        $Comment_DB->Res_id = $Res_id;
        $result = $Comment_DB->getAllCommentWithResId()->result();

        echo json_encode($result);
    }
    public function addComment(){
        $User_id = $this->input->post("User_id");
        $Res_id = $this->input->post("Res_id");
        $Com_text = $this->input->post("Com_text");

        $this->load->model("Comment_DB");
        $Comment_DB = $this->Comment_DB;
        $Comment_DB->User_id = $User_id;
        $Comment_DB->Res_id = $Res_id;
        $Comment_DB->Com_text = $Com_text;
        $Comment_DB->addComment();
    }

}
