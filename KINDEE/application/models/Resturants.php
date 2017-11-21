<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Resturants extends CI_Model{
    public function addRestaurants(){
        $sql = "INSERT INTO `Restaurants`( `Res_name`, `Res_detail`, `Type_id`, `Res_lat`, `Res_lng`) VALUES (?,?,?,?,?)";
        $bind_data = array(
            $this->Res_name,
            $this->Res_detail,
            $this->Type_id,
            $this->Res_lat,
            $this->Res_lng
        );
        $this->db->query($sql,$bind_data);
        return $this->db->affected_rows() > 0 ? "T" : "F";
    }
    public function getAllRestaurants(){
        $sql = "SELECT * FROM `Restaurants`";
        return $this->db->query($sql);

    }
    public function getIDResturant(){
        $sql = "SELECT Res_id FROM Resturant ORDER BY Res_id ASC";
        return $this->db->query($sql);
    }
    public function insertResturant(){
        $sql = "INSERT INTO `Resturant`(`Res_name`, `Res_detail`, `Res_img_name`, `Res_img_path`, `Res_latitude`, `Res_longitude`, `Type_id`) VALUES 
        (?,?,?,?,?,?,?)";
        $data_bild = array(
            $this->Res_name,
            $this->Res_detail,
            $this->Res_img_name,
            $this->Res_img_path,
            $this->Res_latitude,
            $this->Res_longitude,
            $this->Res_Type_id
        );
        return $this->db->query($sql,$data_bild);

    }
}
?>