<section id="sectionAdministrate1">	
		<header>
			<h3>Administration</h3>
		</header>
		<nav id="navContAdministrate">			
				<ul id="menulistAdmin">
					<li>
						<a href="#">Users <span class="downArrow">&#9660;</span></a>
						<ul class="subOne">
							<li>
								<a href="#">Delete user</a>
							</li>
							<li>
								<a href="#">Edit user</a>
							</li>
							<li>
								<a href="#">Add user</a>
							</li>
						</ul>
					</li>					
					<li>
						<a href="#">Bookings <span class="downArrow">&#9660;</span></a>
						<ul class="subOne">
							<li>
								<a href="#" id="delete_booking">Delete booking</a>
							</li>
							<li>
								<a href="#">Add booking</a>
							</li>							
						</ul>
					</li>
					<li>
						<a href="#">Rooms <span class="downArrow">&#9660;</span></a>
						<ul class="subOne">
							<li>
								<a href="#">Add room</a>
							</li>
							<li>
								<a href="#">Edit/remove room</a>
							</li>							
						</ul>
					</li>
					<li>
						<a href="#">Schedule staff <span class="downArrow">&#9660;</span></a>
						<ul class="subOne">
							<li>
								<a href="#" id="#">Group one</a>									
							</li>
							<li>
								<a href="#">Group two <span class="rightArrow">&#9654;</span></a>								
								<ul class="subTwo">
									<li>
										<a href="#">Add schedule</a>
									</li>
									<li>
										<a href="#">Delete schedule</a>
									</li>
									<li>
										<a href="#">Update schedule</a>
									</li>
								</ul>
							</li>												
							<li>
								<a href="#">Group three</a>
							</li>							
						</ul>
					</li>
					<li>
						<a href="#">Economy</a>
					</li>				
				</ul>
			<div class="clear"></div>							
		</nav>
		<article id="delete_booking_wrapper">
			<header><h3>Delete booking</h3></header>
			<div id="deleteRoomCont">								
				<table id="tAdminDeleteRoom" >
					<thead>
						<tr><td>First name</td><td>Last name</td><td>Mail</td><td>Room id</td><td>Book id</td><td>Arrival</td><td>Departure</td><td>Delete</td></tr>
					</thead>
					<tbody>					
					</tbody>
				</table>	
				<button type="input" id="adminDeleteBooking">Delete booking</button>						
			</div>
			
		<article>		
</section>

<script type="text/javascript" src="<?php echo base_url()?>public/js/administrate.js"></script>		