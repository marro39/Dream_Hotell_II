<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	private $data=array();
	public function index(){		
		$this->data['title'] = 'Hotel Dream II - Home';		
		//Get all room picture names from database!
		$this->load->model('Model_Room');
		$roomPics['rooms']=$this->Model_Room->getRooms();
		//echo count($rooms);		
		$this->load->view('/templates/header', $this->data);
		$this->load->view('home', $roomPics);		
		$this->load->view('/templates/footer');					
	}
	public function login(){
		$this->data['title'] = 'Hotel Dream II - Login';
		$this->load->view('/templates/header', $this->data);
		$this->load->view('login');
		$this->load->view('/templates/footer');
	}
}

