<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageUser extends CI_Model{
	
	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function userLogin(){
		$this->load->library('encrypt');		
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$encryptPassword=$this->encrypt->encode($password);
		$encryptEmail=$this->encrypt->encode($email);		
		$this->db->where('email',$this->input->post('$encryptEmail'));
		$this->db->where('password',$this->input->post('$encryptEmail'));
		$result=$this->db->get('tblperson');
		if($result->num_rows() == 1){
			$userdata=array(
				'loggedIn' => 1,
				'email' => $email,
				'password' => $password
			);
			$this->session->set_userdata($userdata);
			return true;
		}
		else{
			return false;
		}
	}
}