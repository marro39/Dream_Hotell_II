<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Room extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	function getRooms(){
		$rooms=array();
		$this->load->database();
		$query=$this->db->get('tblpicext');		
		foreach ( $query->result() as $objExtRoom ) {
       		//echo $objExtRoom->picExt;
       		$pic=array(
       			'id' => $objExtRoom->counter,
       			'picture' => $objExtRoom->picExt
       		);	       			       		
       		array_push($rooms,$pic);
		}
		$query=$this->db->get('tblpicint');	
		foreach ( $query->result() as $objIntRoom ) {
       		//echo $objExtRoom->picExt;
       		$pic=array(
       			'id' => $objIntRoom->counter,
       			'picture' => $objIntRoom->picInt
       		);	       			       		
       		array_push($rooms,$pic);
		}
		$query=$this->db->get('tblpicroom');	
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
}