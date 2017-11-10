<?php
class Location extends CI_Model{
    public function getAllLocation(){
        $sql="SELECT * FROM markers";
        return $this->db->query($sql);

    }
}