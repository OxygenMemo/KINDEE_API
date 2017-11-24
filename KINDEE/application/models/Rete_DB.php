<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rate_DB extends CI_Model{
    
    public function getResRate(){
        $sql = "SELECT * FROM `Rate` WHERE Res_id LIKE ?";
        $data_bild = array($this->Res_id);
        return $this->db->query($sql,$data_bild);
    }
    public function getRateUser(){
        $sql = "SELECT * FROM `Rate` WHERE `Res_id` LIKE ? AND `User_id` LIKE ?";

        $data_bild = array(
            $this->Res_id,
            $this->User_id
        );

        return $this->db->query($sql,$data_bild);
        
    }
}