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
}
?>