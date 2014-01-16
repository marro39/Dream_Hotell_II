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
			$this->load->model('model_Room');
			$roomPics['rooms']=$this->model_Room->getRooms();
			//echo count($rooms);		
			$this->load->view('/templates/header', $this->data);
			$this->load->view('home', $roomPics);		
			$this->load->view('/templates/footer');		
		}		
		
	}	
	public function delete_booking(){
		if($this->session->userdata('access_level') == 3){
			//echo json_encode('Success');
			$this->load->model('model_Room');
			if($message=$this->model_Room->getAllBookedRooms()){
				echo $message;	
			}						
		}	
		else {
			$this->data['title'] = 'Hotel Dream II - Home';
			$this->data['navMenuClicked'] ='main';				
			//Get all room picture names from database!
			$this->load->model('model_Room');
			$roomPics['rooms']=$this->model_Room->getRooms();
			//echo count($rooms);		
			$this->load->view('/templates/header', $this->data);
			$this->load->view('home', $roomPics);		
			$this->load->view('/templates/footer');	
		}
	}
	public function delete_selected_booking(){
		if($this->session->userdata('access_level') == 3){					
			$bookId=$this->input->post('roomId');
			if(isset($bookId)){						
				$this->load->model('model_Room');								
				if($this->model_Room->delSelBooking($bookId)){
					echo json_encode('Success! Selected booking is deleted!');
				}					
			}
				
		}			
	}
	public function showLastPicNames(){
		if($this->session->userdata('access_level') == 3){
			if($this->input->post('getLastPicName')){
				$this->load->model('model_room');	
				$lastPicNames=$this->model_room->getLastPicNames();		
				echo json_encode($lastPicNames);
			}	
		}		
			
	}	
	public function uploadPicture(){
		
	}
	
}

