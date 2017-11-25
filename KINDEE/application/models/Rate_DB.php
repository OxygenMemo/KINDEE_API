<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate_DB extends CI_Model{
    
    public function getResRate(){
        $sql = "SELECT * FROM `Rate` WHERE Res_id LIKE ?";
        $data_bild = array($this->Res_id);
        return $this->db->query($sql,$data_bild);
    }
    public function getRateUser(){
        $sql = "SELECT `Rate_number` FROM `Rate` WHERE `Res_id` LIKE ? AND `User_id` LIKE ?";
        $data_bild = array(
            $this->Res_id,
            $this->User_id
        );

        return $this->db->query($sql,$data_bild);
        
    }
    public function RatingInsert(){
        $sql = "INSERT INTO `Rate`(`Res_id`, `User_id`, `Rate_number`) 
        VALUES (?,?,?)";
        $data_bild = array(
            $this->Res_id,
            $this->User_id,
            $this->Rate_number
        );
        return $this->db->query($sql,$data_bild);
    }
    public function RatingUpdate(){
        $sql = "UPDATE `Rate` SET `Rate_number`=? WHERE 
        `Res_id` LIKE ? AND `User_id`LIKE ? ";
        $data_bild = array(
            $this->Rate_number,
            $this->Res_id,
            $this->User_id
        );
        return $this->db->query($sql,$data_bild);
    }
}