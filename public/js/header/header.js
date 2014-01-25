$(document).ready(function(){
	//var menuMarked= $('#spanMenuMarked').attr('name');
	
	var menuMarked= $('#spanMenuMarked').attr('data-menuClicked');
	//var homeadress='http://localhost/Dream_Hotell_II/main';
	var homeadress='http://90.225.88.116/Dream_Hotell_II/main';	
	//If homeadress is false the menu will have default color
	var bHomeAdress=false;
	//Set all menu false as a starter!
	$('.liMainMenu').find('a').data('menuClicked',false);
	$('#mainNav a').each(function(){			
		//alert($(this).attr('href'));		
		if($(this).attr('href').indexOf(menuMarked) != -1 ){					
			if($(this).attr('href') == homeadress){
				if($('#spanHome').attr('data-menuHome')){				
					$(this).css('color','#FFFF66');
					$(this).css('box-shadow', 'inset 0px 30px 0px rgba(100,147,237,0.5)');
					bHomeAdress=true;
					$(this).data('menuClicked', true);					
				}				
			}			
			else if(bHomeAdress==false){								
				$(this).css('color','#FFFF66');
				$(this).css('box-shadow', 'inset 0px 30px 0px rgba(100,147,237,0.5)');
				$(this).data('menuClicked', true);
				if(menuMarked == "locate"){
					$('#menuAbout').css('color','#FFFF66');	
					$('#menuAbout').css('box-shadow', 'inset 0px 30px 0px rgba(100,147,237,0.5)');
				}
			}			
		}					
	});
	//alert($('#spanHome').attr('data-menuHome'));			
	/* This function is no longer needed because the whole page is reloaded on each a href click!
	$('.liMainMenu').find('a').click(function(){		
		$('.liMainMenu').find('a').data('menuClicked',false);
		$('.liMainMenu').find('a').css('color','#FCFFF0');
		$(this).data('menuClicked', true);
		$(this).css('color','#FFFF66');				
	});	
	*/	
	$('.liMainMenu').hover(function(){		
		if($(this).find('a').data('menuClicked')==false){			
			$(this).find(' > a').css('color','#FBCB09').css('font-weight','bold');
			$(this).find(' > a').css('box-shadow', 'inset 0px 30px 0px rgba(100,149,237,0.1)');
			//$(this).find(' > a').css('box-shadow', 'inset 0% 100% 3px rgba(0,0,0,0.3)');
		}				
		$(this).find('ul').css('display','block');
		//alert('Hover');
	}, function(){				
			if($(this).find('a').data('menuClicked')==false){
				$(this).find('a').css('color','#FCFFF0').css('font-weight','normal');
				$(this).find(' > a').css('box-shadow', 'inset 0px 0px 0px rgba(255,255,255,1.0)');
			}			
			$(this).find('ul').css('display','none');		
	});	
	
	$('.liSubMenu').hover(function(){
		$(this).find('a').css('color','#707070');
	},function(){
		$(this).find('a').css('color','#FCFFF0');
	});	
});