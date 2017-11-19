<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_DB extends CI_Model{
    public function Login(){
        $sql = "SELECT `User_id`,`User_fullname` FROM `Users` WHERE `User_username` LIKE ? AND `User_password` LIKE ?";
        $data_bild = array(
            $this->username,
            sha1($this->password)
        );
        $resultDB = $this->db->query($sql,$data_bild);

        $result = new obj();
        $user = new obj();
        $status = new obj();
        if($resultDB->num_rows() > 0){
            $status->status = true;
            foreach($result->result() as $row){
                $user->id = $row->User_id;
                $user->fullname = $row->User_fullname;
            }   
        }else{
            $status = false;
        }
        $result->status = $status;
        $result->user = $user;
        return $result; 
    }
    public function Register(){
        if(!$this->checkUnique($this->username))
            return false;
        $sql = "INSERT INTO `Users`(`User_username`, `User_password`, `User_fullname`) VALUES (?,?,?)";
        $data_bild = array(
            $this->username,
            sha1($this->password),
            $this->fullname);
        
        
        if($this->db->query($sql,$data_bild)){
            return true;   
        }
        else{
            return false;
        }
    }
    private function checkUnique($name){
        $sqlcheckunique = "SELECT `User_username` FROM `Users` WHERE `User_username` LIKE ?";
        $data_bild = array($name); 
        $result = $this->db->query($sqlcheckunique,$data_bild);
        return $result->num_rows() == 0 ? true : false;
    }

}
class obj{}