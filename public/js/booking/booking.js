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
				$('#bookingToCal').datepicker({
					dateFormat:'yy-mm-dd',
					maxDate:'+1y',
					minDate:2					
				});
			});
		});
		$('#buttonSearchRoom').click(function(){			
			$('#result_booking').slideDown(function(){
				$('#articleBooking2').slideUp();				
				var fromDate=$.trim($('#bookingFromCal').val() + " 00:00:00");
				var toDate=$.trim($('#bookingToCal').val() + " 00:00:00");
				$('#tableRooms tbody').empty();
				$.ajax({
					type:'POST',
					url:'../main/searchRooms',
					dataType: 'json',
					data:{
						'fromDate':fromDate,
						'toDate':toDate
					},
					success:function(data){
						//alert('Success1');
						if(data == 'Failure'){
							window.location = "/main/booking";
							alert('something went wring');
						}
						else{						
							//$('#roomResultStatus').text('Results:');
							$('#tableRooms tbody').empty();
							//First sweep through all properties in data. Every property is an object. Then get the properties 
							//of each objRoom!
							for( var objRoom in data){
								//alert(objRoom.length)
								$('#tableRooms tbody').append("<tr><td>" + data[objRoom].roomId + "</td><td>" + data[objRoom].roomNumber + "</td><td>" + data[objRoom].balcony + "</td><td>" + data[objRoom].suite + "</td><td>" + data[objRoom].beds + "</td><td>" + data[objRoom].bathroomNumber + "</td><td>" + data[objRoom].floor + "</td><td><input type='radio' id='roomSelector' value=" + data[objRoom].roomId + " name='roomSelect'></input></td></tr>");							
							}						
							$('#buttonBookRoom').remove();
							$('#roomSearchResult').append("<input type='button' id='buttonBookRoom' value='Book selected room' class='button'></input>")
							$("input:radio[name=roomSelect]:first").attr('checked', true);
						}
					}							
				}).error(function(){					
					$('#bookingMessage').text('Something went wrong, please try again');											
				});				
				$('#newSearchBooking').click(function(){
					$('#result_booking').slideUp();
					$('#articleBooking2').slideDown();					
				});
			});			
		});
	});
});