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
	function searchAviliableRooms(){
		if($this->input->post('fromDate', TRUE) && $this->input->post('toDate', TRUE)){
			//Convert strings to date
			$dateFrom=date('Y-m-d H:i:s',strtotime($this->input->post('fromDate', TRUE)));			
			$dateTo=date('Y-m-d H:i:s',strtotime($this->input->post('toDate', TRUE)));
			if($dateFrom >= $dateTo){
				redirect(main/booking);
			}
			else{				
				$sSql="SELECT * FROM tblroom WHERE tblroom.roomId NOT IN (SELECT roomId FROM tblbooking WHERE ('" . $dateFrom . "' <= dateArrival AND '" . $dateTo . "' >= dateDeparture) OR ('" . $dateFrom . "' <= dateArrival AND '" . $dateTo . "' >= dateArrival) OR ('" . $dateFrom . "' <= dateDeparture AND '" . $dateTo . "' >= dateDeparture) OR ('" . $dateFrom . "'>= dateArrival AND '" . $dateTo . "' <= dateDeparture) )";
				$query=$this->db->query($sSql);
				$aRooms=array();
				foreach($query->result() as $room){
					$room=array(
						'roomId' => $room->roomId,
						'roomNumber' => $room->roomNumber,
						'balcony' => $room->balcony,
						'suite' => $room->suite,
						'beds' => $room->beds,
						'bathroomNumber' => $room->bathroomNumber,
						'floor' => $room->floor
					);
					array_push($aRooms,$room);
				}
				echo json_encode($aRooms);	
			}
						
		}
		else{
			redirect(main/booking);
			
		}	 
	}
}