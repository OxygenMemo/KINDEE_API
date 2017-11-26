<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FavoritResturants_controller extends CI_Controller {
    public function Favorit(){
        $Res_id = $this->input->post('Res_id');
        $User_id = $this->input->post('User_id');
        $status = new obj();

        $this->load->model('FavoritResturants');
        $FavoritResturants = $this->FavoritResturants;
        $FavoritResturants->Res_id = $Res_id;
        $FavoritResturants->User_id = $User_id;

        $result = $FavoritResturants->selectWithRes_idAndUser_id();
        if($result->num_rows() > 0){
            $FavoritResturants->delete();
            $status->status = false;
        }else{
            $FavoritResturants->insert();
            $status->status = true;
        }
        echo json_encode($status);
    }
    public function checkFavorite($Res_id,$User_id){
        $status = new obj();
        $this->load->model('FavoritResturants');
        $FavoritResturants = $this->FavoritResturants;
        $FavoritResturants->Res_id = $Res_id;
        $FavoritResturants->User_id = $User_id;
        $result=$FavoritResturants->selectWithRes_idAndUser_id();
        if($result->num_rows() >0 ){
            $status->status = true;
        }else{
            $status->status = false;
        }
        echo json_encode($status);
    }
    public function getFavoriteWithUser_id(){
        $User_id = $this->input->post("User_Id");
        $FavoritResturants = $this->FavoritResturants;
        $FavoritResturants->User_id = $User_id;
        $result=$FavoritResturants->selectWithUser_id();

        $arr = array();
        foreach($result->result() as $row){
            array_push($arr,$row);
        }
        echo json_encode($arr);
    }

}
class obj{}