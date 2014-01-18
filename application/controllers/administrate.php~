<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrate extends CI_Controller {	
	private $data=array(
		'picStatus' => ''
	);
	public function index(){				
								
	}
	public function home(){
		if($this->session->userdata('access_level') == 3){
			//$this->data['picStatus']='123';	
			$this->data['title'] = 'Hotel Dream II - Administrate';
			$this->data['navMenuClicked'] ='administrate';					
			$this->load->view('/templates/header', $this->data);
			$this->load->view('administrate',$this->data);		
			$this->load->view('/templates/footer');	
		}	
		else{
			//$this->data['picStatus']='123';			
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
		
		if($this->input->post('roomTypeAdmin')){
			$folder=$this->input->post('roomTypeAdmin');						
			$config=array(
				'upload_path' => '',
				'allowed_types' => 'gif|jpg|png',
				'max_size' => '10000',
				'overwrite' => FALSE,
				'max_filename' => 30,
				'remove_spaces' => TRUE					
			);		
			if($folder=='ext' || $folder=='int' || $folder=='room'){
				$config['upload_path']='./public/img';					
			}
			else if($folder=='book_room'){
				$config['upload_path']='./public/img/booking_rooms';
			}			
			$this->load->library('upload',$config);
			//$formName='uploadFile';						
			if($this->upload->do_upload()){
				//$this->data['picStatus']=$this->upload->data();
				//$this->data['picStatus']=$folder;
				//$this->data['picStatus']='Success upload picture1';
				$aPicData=$this->upload->data();
				$fileName=strstr($aPicData['file_name'], '.', TRUE);				
				$this->data['picStatus']=$fileName;			
				//$this->data['picStatus']=$this->upload->data();
				$this->home();
			}
			else{
				//$this->data['picStatus']='Failed upload picture';
				$this->data['picStatus']=$this->upload->display_errors();
				//$this->data['picStatus']=$folder;
				$this->home();
			}	
							
		}			
	}
	
}










