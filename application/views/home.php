		<section>
			<article id="article_content1">							
				<div id="textBlock">
					<header>
						<h3 id="section_heading" >Welcome dear guest!</h3>
					</header>										
					<content >
						<p id="content_text1">
							* * * * * This site is for education purposes only * * * * *<br>						
							We are happy to announce that in spring 2013 major renovations were made. <br />
							Every room has been updated to match todays standard <br />
							Our casino is now larger, more effective and more comfortable so all <br />
							our customers will now hopefully be satisfied. <br />
							Please view our recent taken pics of the renovations of the hotel.<br /> 
							You are gladly welcome to book a room or a complete package. <br />
							You can also buy tickets to our shows. Some packages includes shows. <br />
							Please click the show tab in the menu to <br />
							see this years performanses.
						</p>	
					</content>					
				</div>					
				<?php 					
					$roomExt=array();
					$roomInt=array();
					$roomHotell=array();
					foreach ($rooms as $room) {
						//echo "ID: " . $room['id'] . "<br />";
						//echo "Picture: " . $room['picture'] . "<br />";
						if(strpos($room['picture'], 'ext') !=false){
							//echo "Exterior:" . $room['picture'] . "<br />";
							array_push($roomExt, $room['picture']);
						}						
						else if(strpos($room['picture'], 'int') !=false){
							//echo "Interior:" . $room['picture'] . "<br />";
							array_push($roomInt, $room['picture']);							
						}
						else if(strpos($room['picture'], 'room') !=false){
							//echo "Room:" . $room['picture'] . "<br />";	
							array_push($roomHotell, $room['picture']);
						}						 
					}													 
				?>					
				<div id="contPictures">				
					<div id="contPicExt" 
						data-cycle-tile-count=20
						data-cycle-fx=tileBlind
						data-cycle-tile-vertical=true
						data-cycle-next="#next0"	
						data-cycle-prev="#prev0"								
					>	
						<div class="prevNextPic">
							<span id="prev0" class="prev">&lt;&lt;Prev </span>
	        				<span id="next0" class="next"> Next&gt;&gt;</span>
	        			</div>												
						<?php 
							for ($i=0; $i < count($roomExt); $i++) { 
								echo "<img class=\"hotelPictures\" src=\"" . base_url() . "public/img/" . $roomExt[$i] . "jpg\" alt=\"" . base_url() . "public/img/" . $roomExt[$i] . "jpg\"  />";
							}
						?>
					</div>
					<div id="contPicInt" 
						data-cycle-tile-count=20
						data-cycle-fx=tileBlind
						data-cycle-tile-vertical=true
						data-cycle-next="#next1"	
						data-cycle-prev="#prev1"
					>
						<div class="prevNextPic">
							<span id="prev1" class="prev">&lt;&lt;Prev </span>
	        				<span id="next1" class="next"> Next&gt;&gt;</span>
	        			</div>
						<?php 
							for ($i=0; $i < count($roomInt); $i++) { 
								echo "<img class=\"hotelPictures\" src=\"" . base_url() . "public/img/" . $roomInt[$i] . "jpg\" alt=\"" . base_url() . "public/img/" . $roomInt[$i] . ".jpg\"  />";
							}
						?>
					</div>
					<div id="contPicRoom" 
						data-cycle-tile-count=20
						data-cycle-fx=tileBlind
						data-cycle-tile-vertical=true
						data-cycle-next="#next2"	
						data-cycle-prev="#prev2"
					>
						<div class="prevNextPic">
							<span id="prev2" class="prev">&lt;&lt;Prev </span>
	        				<span id="next2" class="next"> Next&gt;&gt;</span>
	        			</div>
						<?php						
							for ($i=0; $i < count($roomHotell); $i++) { 
								echo "<img class=\"hotelPictures\" src=\"" . base_url() . "public/img/" . $roomHotell[$i] . ".jpg\" alt=\"" . base_url() . "public/img/" . $roomHotell[$i] . ".jpg\" />";
							}						 
						?>						
					</div>					
				</div>					
			</article>
		</section>
		<aside></aside>		
		<script type="text/javascript" src="<?php echo base_url()?>public/js/home/home.js"></script>		