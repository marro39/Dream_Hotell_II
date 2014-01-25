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
						<a href="#">Upload <span class="downArrow">&#9660;</span></a>
						<ul class="subOne">
							<li><a href="#" id="uploadPictureAdmin">Upload pic</a></li>						
						</ul>
					</li>				
				</ul>
			<div class="clear"></div>
			<?php 
				if(isset($picStatus)){
					echo "<span id=\"uploadPicStatus\">" . $picStatus . "</span>";			
				}			
			?>			
										
		</nav>
<!--*******************************************Pages********************************************** -->		
		<!--******Delete booking***************************** -->		
		<article id="delete_booking_wrapper">
			<header><h3>Delete booking</h3></header>
			<p id="delRoomDisplayAdmin"></p>			
			<div id="deleteRoomCont">								
				<table id="tAdminDeleteRoom" >
					<thead>
						<tr><td>First name</td><td>Last name</td><td>Mail</td><td>Room id</td><td>Book id</td><td>Arrival</td><td>Departure</td><td>Delete</td></tr>
					</thead>
					<tbody>					
					</tbody>
				</table>	
				<input type="button" id="adminDeleteBooking">Delete booking</button>						
			</div>
			<div id="confDelBooking" title="Delete booking">
				<p>Are you sure you want to delete selected booking?</p>			
			</div>
			
		</article>	
		<!--******Upload picture*************************************************************** -->
		<article id="upload_pic_wrapper">						
			<p id="upPicStatusAdmin"></p>			
			<header><h3>Upload picture</h3></header>						
			<h4>Below follows a table with information about picture category, last uploaded picture and the amount of pictures for each category</h4>
			<table id="tablePicInformationAdmin">
				<thead>
					<tr><td>Category</td><td>Name</td><td>Amount pic</td></tr>				
				</thead>
				<tbody>
				
				</tbody>
					
			</table>
			<p>Please name files as the last file in each category,	add +1 for pic number(ceasars_palace_extX)</p>							
			<p>In the select option choose which folder you want to put the picture in.</p>			
			<?php
				//echo $error;			
				echo form_open_multipart('administrate/uploadPicture');
			?>	
				<input type="file" name="userfile" id="userfile"/>
				
				<select id="roomTypeAdmin" name="roomTypeAdmin">
					<option value="ext">External pic</option>
					<option value="int">Internal pic</option>
					<option value="room">Room example</option>
					<option value="book_room" selected="selected">Booking rooms</option>		
				</select>
								
			<?php
				$roomSubmitInfo=array(
					'id' => 'uploadSubmitAdmin',
					'name' => 'uploadSubmitAdmin',
					'value' => 'Upload',
					'class' => ''
				);				
				echo form_submit($roomSubmitInfo);				
				echo form_close();			
			?>			
		</article>		
</section>

<script type="text/javascript" src="<?php echo base_url()?>public/js/administrate.js"></script>		