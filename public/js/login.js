$(document).ready(function(){
	$('.showPassword').change(function(){
		
		var type = $('.password').attr('type');
		
		
		if(type =='password'){
			$('.password').attr('type','text');
			//alert('Password');
		}
		else{
			$('.password').attr('type','password');
			//alert('Text');
		}
		
	});
	$('#createAccount').click(function(){
		$('#createAccountContent').slideDown(function(){
			$('#inputContainer').slideUp();			
			$('#headerTitle').text('Create account');
			/*---------------Google Crome and Opera---------------------------*/			
			/*$('#createAccountContent').css('display','flex');*/
			/*---------------Firefox, explorer and W3C------------------------*/
			$('#createAccountContent').css('display','flex');							
		});
		;
	});
});