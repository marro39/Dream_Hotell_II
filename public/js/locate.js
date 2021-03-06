$(document).ready(function(){
		var position=new google.maps.LatLng(36.117778, -115.175);
		var directionsService = new google.maps.DirectionsService();
		var directionsDisplay=new google.maps.DirectionsRenderer();
		directionsDisplay.setPanel(document.getElementById('routeDescription'));
		var position1;
		var marker1;		
		var mapOptions = {
			zoom: 12,
			//center: position,
			center: position,			
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}			
		var map = new google.maps.Map(document.getElementById("locateMap"), mapOptions);		
		directionsDisplay.setMap(map);		
		var marker = new google.maps.Marker({
			position: position,
			map: map,
			title: 'Hotell Dream II',
			animation: google.maps.Animation.DROP
		});		
		google.maps.event.addListener(map, 'click', function(event){			
			var latitude=event.latLng.lat();
			var longitude=event.latLng.lng();
			position1=new google.maps.LatLng(latitude, longitude);			
			if(marker1 != null){
				marker1.setMap(null);
			}
			marker1=new google.maps.Marker({
				position:position1,
				map: map,
				animation: google.maps.Animation.DROP
			});
			calcRoute(position1);			
	    });	
		google.maps.event.addListener(map, 'idle', function(){
			google.maps.event.trigger(map, 'resize');			
		});		
		function calcRoute(endPosition) {
			  var start = position;
			  var end = endPosition;
			  var request = {
				  origin:start,
				  destination:end,
				  travelMode: google.maps.DirectionsTravelMode.DRIVING,
				  unitSystem: google.maps.UnitSystem.METRIC
			  };
			  directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {					
					directionsDisplay.setDirections(response);
				}
			  });
			  $('#routeDescription').css('display','-webkit-flex');
			  $('#routeDescription').css('display','flex');			  
		}	
});