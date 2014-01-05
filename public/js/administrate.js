$(document).ready(function(){		
/***********************************DELETE BOOKING***********************************************/	
	$('#delete_booking').click(function(){				
		$('#delete_booking_wrapper').slideDown(function(){							
			//Google crome and Opera 			
			$('#delete_booking_wrapper').css('display','-webkit-flex');
			//Explorer, firefox and w3c
			$('#delete_booking_wrapper').css('display','flex');
			
			//Clear everychild in tbody on every click before setting data in it!			
			$('#tAdminDeleteRoom tbody').empty();			
			$.ajax({
				type:'POST',
				url:'../administrate/delete_booking',
				dataType:'json',
				success:function(data){
					var bookingData=data;
															
					for(var arrBookingData in bookingData){
						$('#tAdminDeleteRoom tbody').append('<tr>' + 
						'<td>' + bookingData[arrBookingData].firstName + 
						'</td><td>' + bookingData[arrBookingData].lastName + 
						'</td><td>' + bookingData[arrBookingData].email + 
						'</td><td>' + bookingData[arrBookingData].roomId + 
						'</td><td>' + bookingData[arrBookingData].bookId + 
						'</td><td>' + bookingData[arrBookingData].arrival + 
						'</td><td>' + bookingData[arrBookingData].departure + 
						'</td><td><input type="radio" name="delBooking" value="' + bookingData[arrBookingData].bookId + '" /></td>' + 
						'</tr>');	
					}	
					$('input:radio[name=delBooking]:first').attr('checked','true');				
				}			
			}).error(function(){
				alert('error1');
			});				
		});		
	});
/**************************UPLOAD PICTURE****************************************************/
	$('#uploadPictureAdmin').click(function(){		
		$('#upload_pic_wrapper').slideDown(function(){						
			/*----------------Crome and Opera-------------------------------------*/		
			$('#upload_pic_wrapper').css('display','-webkit-flex');
			/*------------------Explorer, firefox W3C*/
			$('#upload_pic_wrapper').css('display','flex');	
			/*alert('picture');*/	
		});		
		
	});	
});

