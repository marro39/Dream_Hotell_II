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
		$('#inputContainer').slideUp(1000, function(){
			$('#createAccountContent').slideDown(function(){
				$('#headerTitle').text('Create account');				
			});
		});
	});
});