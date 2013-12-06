<section id="section_content_booking1">
	<article id="articleBooking1">				
		<div id="bookingText">							
			<header>
				<h2>Welcome to the booking section</h2>
			</header>
			<p>
				At hotel Dream we have many different rooms at disposal.<br>
				Our goal is to have rooms that suits every customers.<br>
				The rooms differs from one to several rooms,<br>
				one to several bathrooms, with or without balcony,<br>
				from one to several beds etc...		
			</p>
			<p>Click <a id="makeBooking" href="#">here</a> to book a room</p>			
		</div>
		<div id="bookingPictures">
			<div id="bookingFramePic"
				data-cycle-tile-count=8
				data-cycle-fx=tileSlide
				data-cycle-tile-vertical=false
				data-cycle-next="#bookingNextPic"	
				data-cycle-prev="#bookingPrevPic"
			>
				<span id="bookingPrevPic">&lt;&lt;Prev&nbsp;</span>
				<span id="bookingNextPic">&nbsp;Next&gt;&gt;</span>			
			</div>								
		</div>		
	</article>		
	<article id="articleBooking2">		
		<div id="bookingContinfo">
			<h2 id="bookRoomTitle">Book room</h2>
			<p id="bookRoomDescInfo">
				Please click your wished date to see if we have
				a room that will suit your needs!						
			</p>					
		</div>
		<div id="bookingFromToCont" class="bookingCal">
			<div id="bookingFromCont">
				<h3>From</h3>
				<div id="bookingFromCal" class="bookingCal"></div>
			</div>
			<div id="bookingToCont" class="bookingCal">
				<h3>To</h3>
				<div id="bookingToCal" class="bookingCal"></div>
			</div>
		</div>						
		<div id="bookingDivButton">
			<input type="button" id="buttonSearchRoom" value="Search room" class="button"/>
		</div>				
	</article>	
	<article id="result_booking">
		<p id="bookingMessage"></p>
		<h2>Aviliable rooms for your search</h2>		
		<div id="roomBookingCont">
			<article>
				<table id="tableRooms">
					<thead>
						<tr>
							<td>Room Id</td><td>Room number</td><td>Balcony</td><td>Suite</td><td>Beds</td><td>Bathrooms</td><td>Floor</td><td>Select room</td>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
				<div id="buttonBookRoomCont">
					<input type="button" id="bookRoom" value="Book room" class="button" />					
				</div>
				<div id="linkBookRoomCont">
					<p>Click <a href="#" id="newSearchBooking">here</a> if you want to search again!</p>
				</div>
			</article>
		</div>
	</article>
</section>
<aside></aside>	
<script type="text/javascript" src="<?php echo base_url()?>public/js/booking/booking.js"></script>	