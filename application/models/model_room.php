<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Room extends CI_Model {
    private $fromDate, $toDate;
    
    private $encryptionData=array(
			'key' => '1234567891234567',
			'iv' => '1234567891234567'
	);	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	/*Get the last row with picName for each pic category*/	   
   public function getLastPicNames(){
			$aLastPicNames=array();   		
   		$this->db->select('*');
   		$this->db->from('tblPicExt');
   		if($query=$this->db->get()){
   			$row=$query->last_row();
   			$aTempLastPic=array(
					'counter' => $row->counter,
					'picName' => $row->picExt   			
   			);	
   			array_push($aLastPicNames,$aTempLastPic);
   			
   			$this->db->select('*');
   			$this->db->from('tblPicInt');
   			if($query=$this->db->get()){
   				$row=$query->last_row();
   				$aTempLastPic=array(
						'counter' => $row->counter,
						'picName' => $row->picInt						   				
   				);
   				array_push($aLastPicNames,$aTempLastPic);
   				
   				$this->db->select('*');
	   			$this->db->from('tblPicRoom');
	   			if($query=$this->db->get()){
	   				$row=$query->last_row();
	   				$aTempLastPic=array(
						'counter' => $row->counter,
						'picName' => $row->picRoom																		   				
   					);
   					array_push($aLastPicNames,$aTempLastPic);
	   				
	   				$this->db->select('*');
	   				$this->db->from('tblRoomExample');
	   				if($query=$this->db->get()){
	   					$row=$query->last_row();
	   					$aTempLastPic=array(
								'counter' => $row->roomId,
								'picName' => $row->room																		   				
   						);	
   						array_push($aLastPicNames,$aTempLastPic);
							$this->db->close();   						
   						return json_encode($aLastPicNames);	
	   				}		
	   			}
   			}   			
   		}
   }
	function getRooms(){
		$rooms=array();
		$this->load->database();
		$query=$this->db->get('tblPicExt');		
		foreach ( $query->result() as $objExtRoom ) {
       		//echo $objExtRoom->picExt;
       		$pic=array(
       			'id' => $objExtRoom->counter,
       			'picture' => $objExtRoom->picExt
       		);	       			       		
       		array_push($rooms,$pic);
		}
		$query=$this->db->get('tblPicInt');	
		foreach ( $query->result() as $objIntRoom ) {
       		//echo $objExtRoom->picExt;
       		$pic=array(
       			'id' => $objIntRoom->counter,
       			'picture' => $objIntRoom->picInt
       		);	       			       		
       		array_push($rooms,$pic);
		}
		$query=$this->db->get('tblPicRoom');	
		foreach ( $query->result() as $objRoom ) {
       		//echo $objExtRoom->picExt;
       		$pic=array(
       			'id' => $objRoom->counter,
       			'picture' => $objRoom->picRoom
       		);	       			       		
       		array_push($rooms,$pic);
		}
		$this->db->close();
		return $rooms;
	}
	//You have to declare the parameter for the function as an array!!!
	//function bookSelectedRoom($arrayRoomData=array()){
	function bookSelectedRoom(){			
		if($this->session->userdata('access_level') >= 1){
			//$this->fromDate=$arrayRoomData['fromDate'];			
			//$this->toDate=$arrayRoomData['toDate'];			
			
			$dateFrom=date('Y-m-d H:i:s',strtotime($this->input->post('fromDate')));			
			$dateTo=date('Y-m-d H:i:s',strtotime($this->input->post('toDate')));
			
			
			$id=$this->input->post('roomId');
			
			$insertRoom=array(
				'roomId' => $id,
				'dateArrival' => $dateFrom,
				'dateDeparture' => $dateTo,
				'email' => $this->session->userdata('email'),
				'access_level' => $this->session->userdata('access_level')
			);
			
			$this->db->insert('tblBooking', $insertRoom);
			 
			return true;
			/*
			if($this->fromDate && $this->toDate){
				return true;
			}
			else {
				return false;
			}
			 
			 */
		}
		else{
			return false;
		}
	}
	public function delSelBooking($bookId){
		if($this->session->userdata('access_level') >= 3){
			$this->db->where('bookId',$bookId);			
			if($this->db->delete('tblBooking')){
				return true;	
			}
			else{
				return false;	
			}			
		}
		else{
			return false;			
		}	
	}
	public function getAllBookedRooms(){
		$this->load->library('my_encryption',$this->encryptionData);
		$this->my_encryption->initializeCipher();			
		
		$this->db->select('*');mysql_error();				
		$this->db->from('tblPerson');mysql_error();				
		$this->db->join('tblBooking','tblBooking.email = tblPerson.email');mysql_error();				
		$this->db->join('tblRoom', 'tblRoom.roomId = tblBooking.roomId');mysql_error();
		$query=$this->db->get();mysql_error();
		
		$aBookedRooms=array();
		
		if($query->num_rows() > 0 ){						
			foreach($query->result() as $row){
								
				$arrayRow=array(
					'firstName' => $this->my_encryption->decrypt($row->firstname),
					'lastName'	=> $this->my_encryption->decrypt($row->lastname),
					'email' => $this->my_encryption->decrypt($row->email),
					'roomId' => $row->roomId,
					'bookId' => $row->bookId,
					'arrival' => $row->dateArrival,
					'departure' => $row->dateDeparture
								
				);
				array_push($aBookedRooms,$arrayRow);				
			}	
			$this->my_encryption->deInitializeCipher();
			$this->my_encryption->closeCipher();
					
			//Count rows			
			//return json_encode($query->num_rows());			
			//Count fields			
			//return json_encode($query->num_fields());

			return json_encode($aBookedRooms);
		}
		else{
			return json_encode('Failure');	
		}		
	}
	public function checkFileExist($fileName,$tblName,$fieldName){
		$this->db->select('*');
		$this->db->from($tblName);
		$this->db->where($fieldName,$fileName);
		$query=$this->db->get();
		if($query->num_rows() >= 1){
			$this->db->close();	
			return false;
		}
		else{
			$this->db->close();	
			return true;
		}			
	} 
	public function uploadPicDb($fileName,$picTbl,$fieldName){
		$columns=array(
			$fieldName => $fileName
		);		
		if($this->db->insert($picTbl,$columns)){
			$this->db->close();
			return true;	
		}
		else{
			$this->db->close();
			return false;
		}		
	}
}