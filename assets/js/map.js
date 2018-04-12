//map.js
 
//Set up some of our variables.
var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker? 
var geocoder;        
//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {
 geocoder = new google.maps.Geocoder();
    //The center location of our map.
    var edit_lat = document.getElementById('lat').value;
    var edit_long = document.getElementById('lng').value;
    var centerOfMap = new google.maps.LatLng(edit_lat, edit_long);
 
    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: 15 //The zoom value.
    };
 
    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);
 
    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {                
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation();
    });
}
        
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById('lat').value = currentLocation.lat(); //latitude
    document.getElementById('lng').value = currentLocation.lng(); //longitude
}

function codeAddress() {
    var address = document.getElementById('address').value;
    geocoder = new google.maps.Geocoder();
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        // var marker = new google.maps.Marker({
        //     map: map,
        //     position: results[0].geometry.location
        // });

        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(results[0].geometry.location);
        }

        //Get the marker's location.
        markerLocation();
        
      } else {
        alert('Geocode was not successful for the following reason: ' + status);
      }
    });
  }
        
        
//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);