<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_DB extends CI_Model{
    
    public function Register(){
        $sql = "INSERT INTO `Users`(`User_username`, `User_password`, `User_fullname`) VALUES (?,?,?)";
        $data_bild = array(
            $this->username,
            sha1($this->password),
            $this->fullname);

        if($this->db->query($sql,$data_bild)){
            return "T";   
        }
        else{
            return "F";
        }
    }

}