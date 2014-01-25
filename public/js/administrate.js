$(document).ready(function(){	
	var uploadPic=document.getElementById('uploadPicStatus');
	if(uploadPic.innerHTML==''){
		uploadPic.style.color='white';
		//alert('Empty');
	}
	else if(uploadPic.innerHTML=='Success! File uploaded!'){
		//alert('Success!');
		uploadPic.style.color='green';
	}
	else{
		//alert('Error!');
		uploadPic.style.color='red';
	}
	var picStatusInterval=setInterval(function(){
		uploadPic.innerHTML='';
		clearInterval(picStatusInterval);
	},3000);
	
	/***********************************DELETE BOOKING**********************************************************************************************************************/	
	$('#delete_booking').click(function(){
		//Clear uploadPicData from UPLOAD PICTURE section in this file!
		uploadPic.innerHTML='';
		$('#delete_booking_wrapper').slideDown(function(){							
			$('#upload_pic_wrapper').css('display','none');				
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
/**************************UPLOAD PICTURE***************************************************************************************************************************************/
	$('#uploadPictureAdmin').click(function(){		
		$('#delete_booking_wrapper').css('display','none');		
		$('#upload_pic_wrapper').slideDown(function(){						
			/*----------------Crome and Opera-------------------------------------*/		
			$('#upload_pic_wrapper').css('display','-webkit-flex');
			/*------------------Explorer, firefox W3C*/
			$('#upload_pic_wrapper').css('display','flex');	
			/*alert('picture');*/			
			$.ajax({
					type:'POST',
					url:'../administrate/showLastPicNames',
					dataType: 'json',
					data: {'getLastPicName':'lastPicName'},
					success: function(data){
						var objRoomInformation=JSON.parse(data);						
						$('#tablePicInformationAdmin tbody').empty();
						$('#tablePicInformationAdmin tbody').append('<tr><td>External hotel pic</td><td>' + objRoomInformation[0].picName + '</td><td>' + objRoomInformation[0].counter + '</td></tr>');
						$('#tablePicInformationAdmin tbody').append('<tr><td>Internal hotel pic</td><td>' + objRoomInformation[1].picName + '</td><td>' + objRoomInformation[1].counter + '</td></tr>');
						$('#tablePicInformationAdmin tbody').append('<tr><td>Rooms pic</td><td>' + objRoomInformation[2].picName + '</td><td>' + objRoomInformation[2].counter + '</td></tr>');
						$('#tablePicInformationAdmin tbody').append('<tr><td>Room examples pic</td><td>' + objRoomInformation[3].picName + '</td><td>' + objRoomInformation[3].counter + '</td></tr>');     
					}						
			}).error(function(){
				alert('Something went wrong loading pic names! Pleast try again');	
			});
			
		});		
		
	});	
});

