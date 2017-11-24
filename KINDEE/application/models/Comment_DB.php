<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_DB extends CI_Model{
    public function getAllCommentWithResId(){
        $sql = "SELECT c.Com_text,u.User_fullname FROM `Comments` c LEFT JOIN `Users` u ON c.User_id = u.User_id WHERE `Res_id` LIKE ? group by c.Com_id desc limit 10";
        $data_bild = array($this->Res_id);

        return $this->db->query($sql,$data_bild);
    }
    public function addComment(){
        $sql = "INSERT INTO `Comments`(`User_id`, `Res_id`, `Com_text`) VALUES (?,?,?)";
        $data_bild = array(
            $this->User_id,
            $this->Res_id,
            $this->Com_text
        );
        return $this->db->query($sql,$data_bild);
    }
}