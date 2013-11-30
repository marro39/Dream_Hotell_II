$(document).ready(function(){	
	//------------------------------------------------------Get all rooms!---------------------------------------------------------------	
	$.ajax({
		type: 'POST',		
		url: '../main/getRooms',
		//data: {'':aInputData},
		dataType: 'json',		
		success: function(data){
			var counter=data.length;
			//alert(counter);			
			for( var room in data){				
				//alert(data[room].room);
				//alert("<img src=\"../../img/booking_rooms/" + data[room].room + ".jpg\" alt=\"../../img/booking_rooms/" + data[room].room + ".jpg\"/>");
				$('#bookingFramePic').cycle('add', "<a href=\"../public/img/booking_rooms/" + data[room].room + ".jpg\" class=\"bookingRoomExample\" ><img src=\"../public/img/booking_rooms/" + data[room].room + ".jpg\" alt=\"../public/img/booking_rooms/" + data[room].room + ".jpg\" class=\"bookingImageRoom\"/></a>");
				$('.bookingRoomExample').colorbox({
					rel:'bookingRoomExample',
					transition:"none", 
					width:"80%",
					height:"60%,",
					opacity: 0.1,
					next : 'Next',
					previous: 'Prev',
					escKey : true,
					slideshowStart : 'Start',
					slideshowStop : 'Stop'					
				});
			}			
		}		
	}).error(function(data){																		
		alert('Fail to load pictures');											
	});	
	//---------------------------------------------------Image slideshow----------------------------------------------------------------------
	$('#bookingFramePic').cycle({});
	//---------------------------------------------------Book a room-----------------------------------------------------------------------
	$('#makeBooking').on('click', function(){		
		$('#articleBooking1').slideUp(1000,function(){
			$('#articleBooking2').slideDown(1000,function(){
				$('#bookingFromCal').datepicker({
					dateFormat:'yy-mm-dd',
					maxDate:'+1y',
					minDate:1										
				});
				$('#bookingToCont').datepicker({
					dateFormat:'yy-mm-dd',
					maxDate:'+1y',
					minDate:2					
				});
			});
		});
		$('#buttonSearchRoom').click(function(){
			alert('Send');
		});
	});
});