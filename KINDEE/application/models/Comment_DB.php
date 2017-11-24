<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_DB extends CI_Model{
    public function getAllCommentWithResId(){
        $sql = "SELECT c.Com_text,u.User_fullname FROM `Comments` c LEFT JOIN `Users` u ON c.User_id = u.User_id WHERE `Res_id` LIKE ? group by c.Com_id desc limit 5";
        $data_bild = array($this->Res_id);

        return $this->db->query($sql,$data_bild);
    }
}