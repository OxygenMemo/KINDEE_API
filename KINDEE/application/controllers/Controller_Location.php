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
        }
        $data['Types']=$json;
		$this->load->view('addRestaurants',$data);
    }
    public function addRestaurants(){
		//----getType-----
		$this->load->model("Types");
        $result=$this->Types->getAllTypes();

        $json = array();
        foreach($result->result() as $row){
            array_push($json,$row);
        }
		$data['Types']=$json;

		//------Validation
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<div class='error'>","</div>");
		$this->form_validation->set_rules('Res_lat','Res_lat','required');
		$this->form_validation->set_rules('Res_lng','Res_lng','required');
		$this->form_validation->set_rules('Res_name','Res_name','required');
		$this->form_validation->set_rules('Res_detail','Res_detail','required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('addRestaurants',$data);
		}else{
			$this->load->model("Restaurants");
			$this->Restaurants->Res_lat = $this->input->post('Res_lat');
			$this->Restaurants->Res_lng = $this->input->post('Res_lng');
			$this->Restaurants->Res_name = $this->input->post('Res_name');
			$this->Restaurants->Res_detail = $this->input->post('Res_detail');
			$this->Restaurants->Type_id = $this->input->post('Type_id');
			
			echo $this->Restaurants->addRestaurants();
			

			$this->load->view('addRestaurants',$data);
		}
	}

}
