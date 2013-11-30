<section id="section_content_booking1">
	<div id="articleBooking1">
		<article>		
			<div id="bookingText">							
				<h2>Welcome to the booking section</h2>
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
	</div>		
	<div id="articleBooking2">
		<article>			
			<div>
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
			</div>
			<div id="bookingDivButton">
				<input type="button" id="buttonSearchRoom" value="Search room" class="button"/>
			</div>
		</article>		
	</div>	
</section>
<aside></aside>	
<script type="text/javascript" src="<?php echo base_url()?>public/js/booking/booking.js"></script>	