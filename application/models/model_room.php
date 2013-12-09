<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Room extends CI_Model {
    private $fromDate, $toDate;
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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
}