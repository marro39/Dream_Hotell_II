$(document).ready(function(){
	$('#edit_delete_booking').click(function(){
		$('#edit_delete_booking_wrapper').slideDown(function(){
			$.ajax{
				type:'POST',
				url:'cd../administrate/delete_booking',
				dataType:'json'
				success:function(data){
					alart(data);
				}			
			}.error(function(data){
				
			};
		});
	});
});