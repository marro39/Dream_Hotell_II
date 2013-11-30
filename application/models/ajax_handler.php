<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_handler extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	function getRooms(){
		$rooms=array();		
		if($query=$this->db->get('tblroomexample')){
			
			foreach ( $query->result() as $room ) {
	       		//echo $objExtRoom->picExt;
	       		$pic=array(
	       			'roomId' => $room->roomId,
	       			'room' => $room->room
	       		);	       			       		
	       		array_push($rooms,$pic);
			}
			return json_encode($rooms);
			
			//return json_encode('true');
		}
		else{
			return false;
		}		
	}
}