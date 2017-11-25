<?php

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
}