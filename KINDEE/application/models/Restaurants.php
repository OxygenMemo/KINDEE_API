<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Restaurants extends CI_Model{
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
    public function getIDImg(){
        $sql = "SELECT id FROM imguploadtest ORDER BY id ASC";
        return $this->db->query($sql);
    }
    public function insertIMG(){
        $sql = "insert into imguploadtest (image_path,image_name) values (?,?)";
        $data_bild = array(
            $this->ServerURL,
            $this->ImageName
        );
        echo $this->db->query($sql);

    }
}
?>