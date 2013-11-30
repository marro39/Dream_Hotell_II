<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	private $data=array();
	public function index(){		
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
	public function login(){
		if($this->session->userdata('loggedIn')){
			$this->session->sess_destroy();
			redirect('main/index');
		}
		$this->data['title'] = 'Hotel Dream II - Login';
		$this->data['navMenuClicked'] ='login';
		$this->load->view('/templates/header', $this->data);
		$this->load->view('login',$this->data);
		$this->load->view('/templates/footer');
	}
	public function locate(){
		$this->data['title'] = 'Hotel Dream II - Locate';
		$this->data['navMenuClicked'] ='locate';
		$this->load->view('/templates/header', $this->data);
		$this->load->view('locate');
		$this->load->view('/templates/footer');		
	}
	//Functionality for creating a user account	
	public function createAccount(){
		$this->load->library('form_validation');
		//$this->load->library('../controllers/main');
		//Set rules automatically escapes bad characters!
		$this->form_validation->set_rules('firstName','Firstname','trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('lastName','Lastname','trim|xss_clean|max_length[30]');
		$this->form_validation->set_rules('email1','Email','required|trim|xss_clean|min_length[4]|max_length[30]|valid_email');
		$this->form_validation->set_rules('password1','Password','required|trim|xss_clean|matches[password2]|min_length[5]|max_length[30]|callback_createUser');			
		if($this->form_validation->run()){			
			$this->data['accountCreated']='* Email has been sent! Please read the mail and confirm to create your account *';
			$this->login();
		}
		else{
			$this->data['accountCreated']='* Error 1 please try again! *';
			$this->login();
		}
	}
	//This function is called from createaccunt function. It`s a callback function
	public function createUser(){
		$this->load->model('manageUser');
		if($this->manageUser->createUser()){
			return true;
		}
		else
			return false;
	}
	//This function is called from an email link
	public function confirmCreateAccount($key){		
		$this->load->model('manageUser');		
		if($this->manageUser->confirmCreateAccount($key)){
			$this->data['accountCreated']='* Account successfully created! *';
			$this->login();
		}
		else{
			$this->data['accountCreated']='* Error 2! Please try again! *';
			$this->login();
		}
		
	}
	//Login functionality	
	public function logInUser(){		
		$this->load->library('form_validation');
		//$this->load->library('../controllers/main');
		//Set rules automatically escapes bad characters!		
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean|callback_validateUser');		
		//Check if library exists!
		//echo (function_exists('mcrypt_encrypt') ? 'It exists' : 'Nope');		
		if($this->form_validation->run()){				
			$this->index();
		}
		else{
			$this->login();
		}
	}
	//A callback function from method logInUser
	public function validateUser(){
		$this->load->model('manageUser');
		if($this->manageUser->userLogin()){
			return true;
		}
		else{
			$this->form_validation->set_message('validateUser','Incorrect email/password!');
			return false;
		}
	}
	public function booking(){
		$this->data['title'] = 'Hotel Dream II - Booking';
		$this->data['navMenuClicked'] ='booking';	
		$this->load->view('/templates/header', $this->data);
		$this->load->view('booking');
		$this->load->view('/templates/footer');	
	}
	public function getRooms(){
		$this->load->model('ajax_handler');
		//echo $this->ajax_handler->getRooms();
		
		if($rooms=$this->ajax_handler->getRooms()){
			echo $rooms;
		}
		else{
			echo 'error';
		}		
	}
	//------------------------------Search for aviliable rooms----------------------------------
	public function searchRooms(){						
		$this->load->model('ajax_handler');
		echo $this->ajax_handler->searchAviliableRooms();		
		
		
		
		
	}
}

