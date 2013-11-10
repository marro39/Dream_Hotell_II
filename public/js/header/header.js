$(document).ready(function(){
	//Set all to false as a starter!
	$('.liMainMenu').find('a').data('menuClicked',false);
	
	$('.liMainMenu').find('a').click(function(){		
		$('.liMainMenu').find('a').data('menuClicked',false);
		$('.liMainMenu').find('a').css('color','#FCFFF0');
		$(this).data('menuClicked', true);
		$(this).css('color','#FFFF66');				
	});	
	$('.liMainMenu').hover(function(){
		if($(this).find('a').data('menuClicked')==false){			
			$(this).find('a').css('color','#707070');
		}		
		$(this).find('li').css('display','block');
	}, function(){				
			if($(this).find('a').data('menuClicked')==false){
				$(this).find('a').css('color','#FCFFF0');				
			}			
			$(this).find('li').css('display','none');		
	});		
	$('.liSubMenu').hover(function(){
		$(this).find('a').css('color','#707070');
	},function(){
		$(this).find('a').css('color','#FCFFF0');
	});
	
});