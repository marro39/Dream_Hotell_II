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
	</head>
	<body>
		<nav>
			<div id="heading_section">				
				<img id="imageLogo" src="<?php echo base_url()?>public/img/cLogo.jpg" alt="Dream Hotell II"/>				
				<h2 id="headingTitle">Hotell Dream II</h2>
				<ul id="mainNav">
					<li class="liMainMenu"><a href="<?php echo base_url()?>main" >Home</a></li>
					<li class="liMainMenu"><a href="#" >Booking</a></li>
					<li class="liMainMenu"><a href="#" >About</a>
						<ul class="subNav">
							<li class="liSubMenu"><a href="#" >Contact</a></li>
							<li class="liSubMenu"><a href="<?php echo base_url()?>main/locate" >Locate</a></li>													
						</ul>
					</li>					
					<li class="liMainMenu"><a href="#" >Administrate</a></li>
					<?php
						if(isset($_SESSION['Login'])){
							echo "<li class=\"liMainMenu\"><a href=\"" . base_url() .  "main/logout\" >Logout</a></li>";
						}
						else{
							echo "<li class=\"liMainMenu\"><a href=\"" . base_url() .  "main/login\" >Login</a></li>";
						}
					?>									
				</ul>				
				<span id="spanMenuMarked" data-menuClicked="<?php echo $navMenuClicked ?>"></span>
			</div>
		</nav>		
		<script type="text/javascript" src="<?php echo base_url()?>public/js/jQuery.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>public/js/header/header.js"></script>
	
	
	