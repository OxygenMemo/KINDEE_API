<?php

class Resturant_controller extends CI_Controller{
    public function addResturant(){


        //$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $DefaultId = 0;
        
        $this->load->model('Resturants');
        $Resturants = $this->Resturants;
        $ImageData = $this->input->post('image_path');
        $ImageName = $this->input->post('image_name');

        //$GetOldIdSQL ="SELECT id FROM imguploadtest ORDER BY id ASC";

        $Query = $Resturants->getIDImg();

        foreach($Query->result() as $row){

            $DefaultId = $row->id;
        }

        $ImagePath = "imageAndroid/$DefaultId.png";

        $ServerURL = "https://angsila.cs.buu.ac.th/~58160698/uploadimg/$ImagePath";

        //$InsertSQL = "insert into imguploadtest (image_path,image_name) values ('$ServerURL','$ImageName')";
            $Resturants->ServerURL = $ServerURL;
            $Resturants->ImageName = $ImageName;
            if($Resturants->insertIMG()){

                file_put_contents("~/public_html/uploadimg/".$ImagePath,base64_decode($ImageData));

                echo "Your Image Has Been Uploaded.";
            }

        }else{
                                                             
            echo "Not Uploaded";
        }

    

 
    }
}