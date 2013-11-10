<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index()
	{		
		$data['title'] = 'Hotel Dream II - Home';		
		//Get all room picture names from database!
		$this->load->model('Model_Room');
		$roomPics['rooms']=$this->Model_Room->getRooms();
		//echo count($rooms);		
		$this->load->view('/templates/header', $data);
		$this->load->view('home', $roomPics);		
		$this->load->view('/templates/footer');					
	}
}

