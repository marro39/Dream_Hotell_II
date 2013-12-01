<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrate extends CI_Controller {	
	private $data=array();
	public function index(){				
							
	}
	public function home(){
		if($this->session->userdata('access_level') == 3){
			$this->data['title'] = 'Hotel Dream II - Administrate';
			$this->data['navMenuClicked'] ='administrate';					
			$this->load->view('/templates/header', $this->data);
			$this->load->view('administrate');		
			$this->load->view('/templates/footer');	
		}	
		else{
			$this->data['title'] = 'Hotel Dream II - Home';
			$this->data['navMenuClicked'] ='main';				
			//Get all room picture names from database!
			$this->load->model('Model_Room');
			$roomPics['rooms']=$this->Model_Room->getRooms();
			//echo count($rooms);		
			$this->load->view('/templates/header', $this->data);
			$this->load->view('home', $roomPics);		
			$this->load->view('/templates/footer');		
		}		
		
	}
	
}

