<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Types extends CI_Model{
    
    public function getAllTypes(){
        $sql = "SELECT * FROM Types";
        return $this->db->query($sql);
    }
}