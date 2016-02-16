  <div id="header" class="wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1s">
    <input id="origin-input" class="controls" type="text"
        placeholder="Enter an origin location">

    <input id="destination-input" class="controls" type="text"
        value="Department of Computer Science Engineering, JNTU College Of Engineering, Anantapur, Andhra Pradesh">

    <div id="mode-selector" class="controls">
      <input type="radio" name="type" id="changemode-walking">
      <label for="changemode-walking">Walking</label>

      <input type="radio" name="type" id="changemode-transit">
      <label for="changemode-transit">Transit</label>

      <input type="radio" name="type" id="changemode-driving" checked="checked">
      <label for="changemode-driving">Driving</label>
    </div>

    <div id="map"></div>

<script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initMap() {
  var origin_place_id = null;
  var destination_place_id = null;
  var travel_mode = google.maps.TravelMode.DRIVING;
  var myOptions = {zoom:10,center:new google.maps.LatLng(14.6501563,77.60635409999998),mapTypeId: google.maps.MapTypeId.ROADMAP};
  var map = new google.maps.Map(document.getElementById('map'),  myOptions);
    
  marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(14.6501563,77.60635409999998)});
	
	infowindow = new google.maps.InfoWindow({content:'<strong>Pixel, JNTU Anantapur</strong><br>JNTU Anantapur<br>'});
	google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);
 
  
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  directionsDisplay.setMap(map);

  var origin_input = document.getElementById('origin-input');
  var destination_input = document.getElementById('destination-input');
  var modes = document.getElementById('mode-selector');

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(origin_input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(destination_input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(modes);

  var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
  origin_autocomplete.bindTo('bounds', map);
  var destination_autocomplete =
      new google.maps.places.Autocomplete(destination_input);
  destination_autocomplete.bindTo('bounds', map);

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, mode) {
    var radioButton = document.getElementById(id);
    radioButton.addEventListener('click', function() {
      travel_mode = mode;
    });
  }
  setupClickListener('changemode-walking', google.maps.TravelMode.WALKING);
  setupClickListener('changemode-transit', google.maps.TravelMode.TRANSIT);
  setupClickListener('changemode-driving', google.maps.TravelMode.DRIVING);

  function expandViewportToFitPlace(map, place) {
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }
  }

  origin_autocomplete.addListener('place_changed', function() {
    var place = origin_autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }
    expandViewportToFitPlace(map, place);

    // If the place has a geometry, store its place ID and route if we have
    // the other place ID
    origin_place_id = place.place_id;
    route(origin_place_id, destination_place_id, travel_mode,
          directionsService, directionsDisplay);
  });

  destination_autocomplete.addListener('place_changed', function() {
    var place = destination_autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }
    expandViewportToFitPlace(map, place);

    // If the place has a geometry, store its place ID and route if we have
    // the other place ID
    destination_place_id = place.place_id;
    route(origin_place_id, destination_place_id, travel_mode,
          directionsService, directionsDisplay);
  });

  function route(origin_place_id, destination_place_id, travel_mode,
                 directionsService, directionsDisplay) {
    if (!origin_place_id || !destination_place_id) {
      return;
    }
    directionsService.route({
      origin: {'placeId': origin_place_id},
      destination: {'placeId': destination_place_id},
      travelMode: travel_mode
    }, function(response, status) {
      if (status === google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js? &signed_in=true&libraries=places&callback=initMap"
    async defer></script>
</div>
<div class="address">
  <img class="wow fadeInRight" data-wow-delay="1.5s" src="jntu-a-logo.jpg" alt="jntua logo" />
  <div class="section">
    <h3 class="wow fadeInUp" data-wow-delay="1.5s">PIXEL- <span style="font-family:'sans-serif'" >2K16</span></h3>
    <h3 class="wow fadeInUp" data-wow-delay="1.5s">Department of Computer Science and Engineering</h3>
    <h3 class="wow fadeInUp" data-wow-delay="1.5s">JNTUA College of Engineering, Ananthapuramu</h3>
  </div>
  <div class="contacts wow fadeInLeft" data-wow-delay="1.5s">
    <h3>Contact:</h3>
    N.Naveen kumar<br/>
    &#9742; 7382352503<br/>
  </div>
</div>