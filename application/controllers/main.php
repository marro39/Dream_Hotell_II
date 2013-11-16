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
		$this->data['title'] = 'Hotel Dream II - Login';
		$this->data['navMenuClicked'] ='login';
		$this->load->view('/templates/header', $this->data);
		$this->load->view('login');
		$this->load->view('/templates/footer');
	}
	public function locate(){
		$this->data['title'] = 'Hotel Dream II - Locate';
		$this->data['navMenuClicked'] ='locate';
		$this->load->view('/templates/header', $this->data);
		$this->load->view('locate');
		$this->load->view('/templates/footer');		
	}
	public function createAccount(){
		$this->load->library('form_validation');
		//$this->load->library('../controllers/main');
		//Set rules automatically escapes bad characters!
		$this->form_validation->set_rules('email1','Email','required|trim|xss_clean|min_length[3]|max_length[30]|valid_email');
		$this->form_validation->set_rules('password1','Password','required|trim|xss_clean|matches[password2]|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('firstName','Firstname','trim|xss_clean|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('lastName','Lastname','trim|xss_clean|min_length[3]|max_length[30]');			
		if($this->form_validation->run()){			
			$this->index();
		}
		else{
			$this->login();
		}
	}
	public function logInUser(){		
		$this->load->library('form_validation');
		//$this->load->library('../controllers/main');
		//Set rules automatically escapes bad characters!
		$this->form_validation->set_rules('email','Email','required|trim|xss_clean|valid_email|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean');			
		if($this->form_validation->run()){			
			$this->index();
		}
		else{
			$this->login();
		}
	}
}

