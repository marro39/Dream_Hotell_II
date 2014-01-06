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
	$('#adminDeleteBooking').click(function(){				
		$('#confDelBooking').dialog({
			autoOpen:true,
			show: {
				effect:'blind',
				duration:500	
			},	
			hide: {
				effect:'explode',
				duration: 1000	
			},
			height:220,
			width:420,
			modal:true,
			resizable:false,
			buttons: {'Yes':function(){
				var selectedRadio=$("input:radio[name='delBooking']:checked").val();
				//alert(selectedRadio);
				$.ajax({
					type:'POST',
					url:'../administrate/delete_selected_booking',
					dataType: 'json',
					data: {'roomId':selectedRadio},
					success: function(data){
						//alert(data);
						$('#delRoomDisplayAdmin').html(data).css('color', 'green');	
						var tempInterval=setInterval(function(){
							$('#delRoomDisplayAdmin').html('');														
							clearInterval(tempInterval);							
							//window.location('cd../administrate/');
							location.reload();	
						},3000);
					}						
				}).error(function(){
					alert('Something went wrong please try again!');
					$('#delRoomDisplayAdmin').html('Something went wrong please try again!').css('color','red');
					var tempInterval=setInterval(function(){
							$('#delRoomDisplayAdmin').html('');														
							clearInterval(tempInterval);							
							//window.location('delete_booking');
							location.reload();	
					},3000);
				});				
				$(this).dialog('close');
				
			},
			'No':function(){
				$(this).dialog('close');
				
			}}							
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

