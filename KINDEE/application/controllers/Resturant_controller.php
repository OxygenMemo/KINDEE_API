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
        $type = (int) $this->input->post('Res_Type_id');
        //$GetOldIdSQL ="SELECT id FROM imguploadtest ORDER BY id ASC";

        $Query = $Resturants->getLastResturant();

        foreach($Query->result() as $row){

            $DefaultId = $row->Res_id;
        }
        $DefaultId++;

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
        echo json_encode($Types);
    }
    public function searchResturant(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->load->model('Resturants');
            $Resturants=$this->Resturants;
            $Resturants->Res_name = $this->input->post('Res_name');
            $result=$Resturants->searchResturant();
            $arr = array();
            foreach($result->result() as $row){
                array_push($arr,$row);
            }
            echo json_encode($arr);
        }
    }
    public function randomRes($lat,$lng,$km){
        //13.2886393,100.9406224/13.2961419,100.9454103/@13.2947288,100.9439393
        $this->load->model("Resturants");
        $Resturants = $this->Resturants;
        $result = $Resturants->getAllRestaurantsRate_random();
        $arr=array();
        $sum=0;
        
        foreach($result->result() as $row){
            if($this->distance($lat,$lng,$row->Res_latitude,$row->Res_longitude,"K") <= $km){
                
                $obj = new obj();
                $obj->startlength = $sum;

                $sum+=$row->Rate_number;

                $obj->endlength = $sum;
                $obj->Res_id = $row->Res_id;
                array_push($arr,$obj);
                
            }
        }
        foreach($arr as $row){
            
            echo $row->Res_id."<br>".$row->startlength."<br>".$row->endlength."<br>".$row->Res_id."<hr>";
            
        }
        
    }
    private function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
        
          if ($unit == "K") {
            return ($miles * 1.609344);
          } else if ($unit == "N") {
              return ($miles * 0.8684);
            } else {
                return $miles;
              }
              
        }
        
       
    
        
}
class obj{}