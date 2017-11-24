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

}
