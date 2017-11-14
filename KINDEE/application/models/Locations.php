<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Locations extends CI_Model{
    public function addLocation(){
        $sql = "INSERT INTO `Locations`(`Location_lat`, `Location_lng`) VALUES (?,?)";
        $bind_data = array(
            $this->Location_lat,
            $this->Location_lng
        );
        $this->db->query($sql,$bind_data);
        return $this->db->affected_rows() > 0 ? "T" : "F";
    }
}
?>