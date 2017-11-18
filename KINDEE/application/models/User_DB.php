<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_DB extends CI_Model{
    
    public function Register(){
        $sql = "INSERT INTO `Users`(`User_username`, `User_password`, `User_fullname`) VALUES (?,?,?)";
        $data_bild = array($username,$password,$fullname);

        if($this->db->query($sql)){
            return "T";   
        }
        else{
            return "F";
        }
    }

}