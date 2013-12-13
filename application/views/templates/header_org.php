<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title ?></title>	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/templates/header.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/templates/footer.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/home.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/login.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/locate.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/booking.css" />	
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/colorbox/colorbox.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/ui-lightness/uiCustom.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/administrate.css" />		
	</head>
	<body>
		<nav id="heading_section">								
			<img id="imageLogo" src="<?php echo base_url()?>public/img/cLogo.jpg" alt="Dream Hotell II"/>				
			<div id="titleAndMenu">
				<div id="title">
					<h2 id="headingTitle">Hotell Dream II</h2>	
				</div>					
				<div id="menu">
					<ul id="mainNav">
						<li class="liMainMenu"><a href="<?php echo base_url()?>main" >Home</a></li>
						<li class="liMainMenu"><a href="<?php echo base_url()?>main/booking" >Booking</a></li>
						<li class="liMainMenu"><a href="#" >About&nbsp;&nbsp;<span class="dArrow">&#9660;</span></a>
							<ul class="subNav">									
								<li class="liSubMenu"><a href="#" >Contact</a></li>
								<li class="liSubMenu"><a href="<?php echo base_url()?>main/locate" >Locate</a></li>																						
							</ul>
						</li>												
						<?php
							if($this->session->userdata('access_level') == 3){
								echo "<li class=\"liMainMenu\"><a href=\"" . base_url() . "administrate/home\">Administrate</a></li>";	
							}						
							if($this->session->userdata('access_level') >= 1){
								echo "<li class=\"liMainMenu\"><a href=\"" . base_url() .  "main/login\" >Logout</a></li>";
							}
							else{
								echo "<li class=\"liMainMenu\"><a href=\"" . base_url() .  "main/login\" >Login</a></li>";
							}
						?>								
					</ul>										
					<span id="spanMenuMarked" data-menuClicked="<?php echo $navMenuClicked ?>"></span>						
				</div>					
			</div>						
		</nav>		
		<script type="text/javascript" src="<?php echo base_url()?>public/js/jQuery.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>public/js/header/header1.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>public/js/cycle2.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>public/js/jquery.cycle2.tile.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>public/js/colorbox/colorbox.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>public/js/ui/uiCustom.js"></script>
	
	