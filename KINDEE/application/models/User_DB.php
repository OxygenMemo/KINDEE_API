<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_DB extends CI_Model{
    
    public function Register(){
        if(!checkUnique($this->username))
            return "F";
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
    private function checkUnique($name){
        $sqlcheckunique = "SELECT `User_username` FROM `Users` WHERE `User_name` LIKE ?";
        $data_bild = array($name); 
        $result = $this->db->query($sqlcheckunique,$data_bild);
        return $result->num_rows() == 0 ? true : false;
    }

}