<?php

class Resturant_controller extends CI_Controller{
    public function addResturant(){


        //$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $DefaultId = 0;
        
        $this->load->model('Resturants');
        $Resturants = $this->Resturants
        ;
        $ImageData = $this->input->post('image_path');
        $ImageName = $this->input->post('image_name');
        $Res_name = $this->input->post('Res_name');
        $Res_detail = $this->input->post('Res_detail');
        $Res_latitude = (double)$this->input->post('Res_latitude');
        $Res_longitude = (double)$this->input->post('Res_longitude');
        $type = 1;
        //$GetOldIdSQL ="SELECT id FROM imguploadtest ORDER BY id ASC";

        $Query = $Resturants->getIDResturant();

        foreach($Query->result() as $row){

            $DefaultId = $row->id;
        }

        $ImagePath = "imageAndroid/$DefaultId.png";

        $ServerURL = "https://angsila.cs.buu.ac.th/~58160698/uploadimg/$ImagePath";

        //$InsertSQL = "insert into imguploadtest (image_path,image_name) values ('$ServerURL','$ImageName')";
            $Resturants->Res_img_path = $ServerURL;
            $Resturants->Res_img_name = $ImageName;
            $Resturants->Res_name = $Res_name;
            $Resturants->Res_detail = $Res_detail;
            $Resturants->Res_latitude = $Res_latitude;
            $Resturants->Res_longitude = $Res_longitude;
            $Resturants->Res_Type_id = $type;
            if($Resturants->insertResturant()){

                file_put_contents("/home/BUU/58160698/public_html/uploadimg/".$ImagePath,base64_decode($ImageData));
                //echo $this->input->post('latitude');
                echo "Your Image Has Been Uploaded.";
            }

        }else{
                                                             
            echo "Not Uploaded";
        }
    }
    public function getTypes(){
        $this->load->model("Types");
        $result=$this->Types->getAllTypes();

        $Types = array();
        foreach($result->result() as $row){
            array_push($Types,$row);
        }
        $data['Types']=$Types;
        echo json_encode($data);
    }
}