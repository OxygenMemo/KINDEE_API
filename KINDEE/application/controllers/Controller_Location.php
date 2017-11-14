<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_Location extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{   
        $this->load->model("Types");
        $result=$this->Types->getAllTypes();

        $json = array();
        foreach($result->result() as $row){
            array_push($json,$row);
            //echo "$row->id $row->name $row->address $row->lat $row->lng $row->type <br>";
        }
        $data['Types']=$json;
		$this->load->view('addLocation',$data);
    }
    public function getAllLocation(){

    }
}
