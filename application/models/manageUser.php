<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManageUser extends CI_Model{	
	private $encryptionData=array(
			'key' => '1234567891234567',
			'iv' => '1234567891234567'
	);		
	public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function userLogin(){
		$this->load->library('encrypt');				
		$this->load->library('my_encryption',$this->encryptionData);
		$this->my_encryption->initializeCipher();		
		
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$encryptPassword=$this->encrypt->sha1($password);
		$encryptEmail=$this->my_encryption->encode($email);		
		$this->db->where('email',$encryptEmail);
		$this->db->where('password',$encryptPassword);
		$result=$this->db->get('tblperson');
		if($result->num_rows() == 1){			
			$row=$result->row();			
			/*
			echo $this->my_encryption->decrypt($row->firstname) . "<br />";
			echo $this->my_encryption->decrypt($row->lastname) . "<br />";
			echo $this->my_encryption->decrypt($row->email) . "<br />";
			echo $row->password . "<br />";
			echo $row->access_level . "<br />";			
			echo $row->firstname . "<br />";
			echo $row->lastname . "<br />";
			echo $row->email . "<br />";
			echo $row->password . "<br />";
			echo $row->access_level . "<br />";				
			*/
			$userdata=array(
				'firstName' => $row->firstname,
				'lastName' => $row->lastname,
				'access_level' => $row->access_level,				
				'email' => $row->email,
				'password' => $row->password
			);
			$this->session->set_userdata($userdata);			
			return true;			
		}
		else{
			return false;
		}
	}
	public function createUser(){		
		$this->load->library('encrypt');				
		$this->load->library('my_encryption',$this->encryptionData);
		$this->my_encryption->initializeCipher();
		
		$firstName=$this->input->post('firstName');
		$lastName=$this->input->post('lastName');
		$email=$this->input->post('email1');
		$password=$this->encrypt->sha1($this->input->post('password1'));
		$accessLevel=1;
		$encodedFirstName=$this->my_encryption->encode($firstName);
		$encodedLastName=$this->my_encryption->encode($lastName);
		$encodedEmail=$this->my_encryption->encode($email);
		
		/*
		echo "Firstname: " . $firstName . "<br />Decoded firstname: " . $this->my_encryption->decrypt($encodedFirstName) . "<br />";
		echo "Lastname: " . $lastName . "<br />Decoded lastname: " . $this->my_encryption->decrypt($encodedLastName) . "<br />";
		echo "Email: " . $email . "<br />Decoded email: " . $this->my_encryption->decrypt($encodedEmail) . "<br />";
		echo "Encoded email: " . $encodedEmail . "<br />";
		echo "Password: " . $this->input->post('password1') . "<br />";			
		*/
			
		//Check if user alreay exists, if one exists then abort
		$query=$this->db->get('tblperson');		
		foreach ( $query->result() as $row ) {
       		//echo "<br />Encrypted email: " . $row->email . "<br />";
       		//echo "<br />Decrypted email: " . $this->my_encryption->decrypt($row->email) . "<br />";       		
       		if(strcmp($email,$this->my_encryption->decrypt($row->email)) == 0){
       			return false;
       		}
       		else if(strcmp($encodedEmail,$row->email) == 0){
       			return false;
       		}       		
		}		
		//Generate a random key string with md5 hash
		$key=$this->encrypt->sha1(uniqid());		
		$arrayUserEnteties1=array(
			'firstname' => $encodedFirstName,
			'lastname' => $encodedLastName,
			'access_level' => $accessLevel,
			'email' => $encodedEmail,
			'password' => $password,
			'id' => $key
		);	
		//If a successful new user is inserted in database send an email to this user and finally 
		//return true.
		if($this->db->insert('temp_users',$arrayUserEnteties1)){						
			$config = array(
				'mailtype' => "html",			
				'protocol' => "smtp", 
			    'smtp_host' => "ssl://smtp.googlemail.com",			    
			    'smtp_port' => "465",
			    'smtp_user' => "marcus.rnnng@gmail.com",
			    'smtp_pass' => "charliealfa2932",
			    'starttls'  => true,
            	'newline'   => "\r\n"
		    );	
		    $this->load->library('email',$config);		
			$this->email->from('marcus.rnnng@gmail.com','Marcus Ronnang');
			$this->email->to($email);
			$this->email->subject('Create account');
			$message="<p>Please click <a href='" . base_url() . "main/confirmCreateAccount/$key'>here</a> to confirm and create your account</p>";
			$this->email->message($message);
			$this->email->send();
			return true;			
		}
		else 
			return false;		
	}
	public function confirmCreateAccount($key){
		echo "<br />The sent key: " . $key . "<br />";
		$this->db->where('id',$key);
		$query=$this->db->get('temp_users');
		if($query->num_rows() == 1){
			//Make an object
			$row=$query->row();   			
   			$firstName=$row->firstname;
   			$lastName=$row->lastname;
   			$email=$row->email;
   			$password=$row->password;		
			$this->load->library('encrypt');			
			
			$accessLevel=1;			
			$arrayUserEnteties['firstname']=$firstName;
			$arrayUserEnteties['lastname']=$lastName;
			$arrayUserEnteties['access_level']=$accessLevel;
			$arrayUserEnteties['email']=$email;
			$arrayUserEnteties['password']=$password;			
			
			//If match email a user already exists = abort!
			$query=$this->db->get('tblperson');
			foreach ( $query->result() as $row ) {       			
       			if(strcmp($row->email,$email) == 0){
       				return false;
       			}         			
			}
			//A user dont exists, create a new user			
			if($this->db->insert('tblperson',$arrayUserEnteties)){				
				//Delete all temporary users in table temp_users
				if($this->db->empty_table('temp_users')){
					return true;					
				}
				else
					return false;
			}
			else
				return false;
		}
		else{
			return false;
		}
	}
}