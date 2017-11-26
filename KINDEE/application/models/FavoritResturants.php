<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FavoritResturants extends CI_Model{
    public function delete(){
        $sql = "DELETE FROM `FavoritResturants` WHERE `Res_id` LIKE ? AND `User_id` LIKE ?";
        $data_bild = array(
            $this->Res_id,
            $this->User_id
        );
        return $this->db->query($sql,$data_bild);
    }
    public function insert(){
        $sql = "INSERT INTO `FavoritResturants`(`Res_id`, `User_id`) VALUES (?,?)";
        $data_bild = array(
            $this->Res_id,
            $this->User_id
        );
        return $this->db->query($sql,$data_bild);
    }
    public function selectWithRes_idAndUser_id(){
        $sql = "SELECT `Res_id`, `User_id` FROM `FavoritResturants` WHERE `Res_id` LIKE ? AND `User_id` LIKE ?";
        $data_bild = array(
            $this->Res_id,
            $this->User_id
        );
        return $this->db->query($sql,$data_bild);
    }
    public function selectWithUser_id(){
        $sql = "SELECT * FROM `FavoritResturants` f LEFT JOIN `Resturant` r ON f.Res_id=r.Res_id 
        LEFT JOIN `Types` t on r.Type_id = t.Type_id
        WHERE `User_id` LIKE ?";

        $data_bild = array(
            
            $this->User_id
        );
        return $this->db->query($sql,$data_bild);   
    }
}