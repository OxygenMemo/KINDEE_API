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
		$this->load->view('addLocation',$data);
    }
    public function addLocation(){
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
		$this->form_validation->set_rules('lat','lat','required');
		$this->form_validation->set_rules('lng','lng','required');
		$this->form_validation->set_rules('Res_name','Res_name','required');
		$this->form_validation->set_rules('Res_detail','Res_detail','required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('addLocation',$data);
		}else{
			$this->load->model("Locations");
			$this->Locations->Location_lat = $this->input->post('lat');
			$this->Locations->Location_lng = $this->input->post('lng');
			echo $this->Locations->addLocation();
			$result = $this->Locations->getIdLocation();
			if(!empty($result->result())){
				echo "yes";
			}else{
				echo "no";
			}

			$this->load->view('addLocation',$data);
		}
	}

}
