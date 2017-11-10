<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Location extends CI_Model{
    public function getAllLocation(){
        $sql="SELECT * FROM markers";
        return $this->db->query($sql);

    }
}