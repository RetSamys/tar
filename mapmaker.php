<html>
<head>
  <meta charset=utf-8 />
  <title>Add yourself to the map</title>
 
  <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />

  <!-- Load Leaflet from CDN-->
  <!--<link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
  <script src="https://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>-->
<link rel="stylesheet" href="src/mleaflet.css" />
  <script src="src/mleaflet.js"></script>

  <!-- Load Esri Leaflet from CDN -->
  <!--<script src="https://cdn-geoweb.s3.amazonaws.com/esri-src/1.0.0-rc.2/esri-leaflet.js"></script>-->
  <script src="src/esri-leaflet.js"></script>
  

<script>
function next(){
document.getElementById("parts").style.display="none";
document.getElementById("partless").style.display="table";
}

</script>
<style>
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

html, body, #container, #map {
    padding: 0;
    margin: 0;
}
html, body{
height:100%;
}

#map, #container {
    height:90vmin;
	width:90vmin;
	margin:auto;
}
#parts{
display:table;
margin:auto;
}

#part1,#part2{
display:inline-block;
padding-left:3vmin;
padding-right:3vmin;
}

/* Ratings widget */
.rate {
    display: inline-block;
    border: 0;
}
/* Hide radio */
.rate > input {
    display: none;
}
/* Order correctly by floating highest to the right */
.rate > label {
    float: right;
}
/* The star of the show */
.rate > label:before {
    display: inline-block;
    font-size: 2rem;
    padding: .3rem .2rem;
    margin: 0;
    cursor: pointer;
    font-family: FontAwesome;
    content: "\f005 "; /* full star */
}

/* Half star trick */
.rate .half:before {
    content: "\f089 "; /* half star no outline */
    position: absolute;
    padding-right: 0;
}
/* Click + hover color */
.rate input:checked ~ label, /* color current and previous stars on checked */
.rate label:hover, .rate label:hover ~ label { color: #73B100;  } /* color previous stars on hover */

/* Hover highlights */
.rate input:checked + label:hover, .rate input:checked ~ label:hover, /* highlight current and previous stars */
.rate input:checked ~ label:hover ~ label, /* highlight previous selected stars for new rating */
.rate label:hover ~ input:checked ~ label /* highlight previous selected stars */ { color: #A6E72D;  } 


/*#today:checked~#otherdate{
display:none;
}
#today:not(:checked)~#otherdate{
display:block;
}*/

#partless{display:none;margin:auto;}


</style>
</head>
<body><form action="mapper.php" method="post" enctype="multipart/form-data"><div id="parts"><div id="part1">

      <h2>Add your book's arrival to the map</h2><p><a href='index.php'>Or go back to the map</a></p>
      <p>1. Please select a point on the map or search for a location on the top right of the map.<span style="color:red">*</span><br>(A location - any location - is needed for the map. <br>Feel free to lie, don't share your exact location!)</p>
	  <p>2. <label>Your name (optional): <br><input type="text" name="nimi" /></label></p>
	  <p>3. Which book arrived?<span style="color:red">*</span><br><select id="book" name="book" onchange="if(this.selectedIndex==this.length-1){document.getElementById('hiddener').style.display='initial';};return false;"><option disabled selected value>Select a book:</option>
<?php
	  $books=explode("|",file_get_contents("books.txt"));
	  foreach ($books as $lipu){
		  echo '<option value="'.$lipu.'">'.$lipu.'</option>>';
	  }
	  ?><option value="other">Other (type in)</option></select></p>
	  <p id="hiddener" style="display:none;">Type in: <input id="booktitle" name="booktitle"></p>
	  <p><label>4. Add a date of the book's arrival (optional): <br><input id="otherdate" name="otherdate" min="2021-01-01" type="date"></p>
	  <p>5. Additional message / review (optional, max 4000 characters): 
	  <!--<input name="msg" id="msg">--><br><textarea style="width:100%" rows="5" name="msg" id="msg" maxlength="4000"></textarea></p>
	  <p>6. Upload image (jpg/png max. 5MB)<span style="color:red">*</span> <input type="file" id="tar" name="tar" accept="image/png, image/jpeg"></p><p></p><b>Disclaimer:</b>  By submitting a photo <wbr>you confirm that you are <wbr>the copyright owner of that photo, <br>and also give us permission <wbr>to display that image on this website</b></p>
	  <p>7. How would you rate the location on the map on a 5-star scale? (optional)</p><p><!-- from https://codepen.io/anefzaoui/pen/NWPZzMa -->
<fieldset class="rate">
    <input type="radio" id="rating10" name="rating" value="10" /><label for="rating10" title="5 stars"></label>
    <input type="radio" id="rating9" name="rating" value="9" /><label class="half" for="rating9" title="4 1/2 stars"></label>
    <input type="radio" id="rating8" name="rating" value="8" /><label for="rating8" title="4 stars"></label>
    <input type="radio" id="rating7" name="rating" value="7" /><label class="half" for="rating7" title="3 1/2 stars"></label>
    <input type="radio" id="rating6" name="rating" value="6" /><label for="rating6" title="3 stars"></label>
    <input type="radio" id="rating5" name="rating" value="5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
    <input type="radio" id="rating4" name="rating" value="4" /><label for="rating4" title="2 stars"></label>
    <input type="radio" id="rating3" name="rating" value="3" /><label class="half" for="rating3" title="1 1/2 stars"></label>
    <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="1 star"></label>
    <input type="radio" id="rating1" name="rating" value="1" /><label class="half" for="rating1" title="1/2 star"></label>

</fieldset></p>
	  <p><span style="color:red">*</span>mandatory</p>
	  <p><button onclick="next();return false;">Next</button></p>
    </div><div id="part2">
<!--<script src="http://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">-->
  
  <script src="src/esri-leaflet-geocoder.js"></script>
<link rel="stylesheet" type="text/css" href="src/esri-leaflet-geocoder.css">
  
<div id="map"></div>


</div></div><div id="partless">This will send the additional data:<p><p>Latitude: <span id="lats"></span><input id="latitude" name="lat" type="hidden" /></p>
      <p>Longitude: <span id="lngs"></span> 
      <input id="longitude" name="lng" type="hidden" /></p>
	  <p>Country: <span id="ctry"></span><input id="country" name="country" type="hidden"></p>
	  <p>Region: <span id="reg"></span><input id="region" name="region" type="hidden"></p>
	  <p>City: <span id="cty"></span><input id="city" name="city" type="hidden"></p>
	  <p><input type="submit" value="Send"></p>
	  </div>
</form>
<script>
//remember last position
var rememberLat = document.getElementById('latitude').value;
var rememberLong = document.getElementById('longitude').value;
if( !rememberLat || !rememberLong ) { rememberLat = 0; rememberLong = 0;}

  var map = L.map('map').setView([0, 0], 1);

  L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);
  var geocodeService = new L.esri.Services.Geocoding();

  var searchControl = new L.esri.Controls.Geosearch({collapseAfterResult:false,expanded:true,position:"topright"}).addTo(map);

  var results = new L.LayerGroup().addTo(map);
//  var geocodeService = L.esri.Geocoding.geocodeService();

  searchControl.on('results', function(data){
    results.clearLayers();
    /*for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(L.marker(data.results[i].latlng));
    }*/
	results.addLayer(L.marker(data.results[0].latlng));
	updateLatLng(data.results[0].latlng);
  });
  
/*
var marker = L.marker([rememberLat, rememberLong],{
  draggable: true
}).addTo(map);

marker.on('dragend', function (e) {
	updateLatLng(marker.getLatLng().lat, marker.getLatLng().lng);
});
*/
map.on('click', function (e) {
results.clearLayers();
var mark=L.marker(e.latlng);
results.addLayer(mark);
	updateLatLng(e.latlng);
});

function updateLatLng(latlng,reverse) {
	geocodeService.reverse(latlng,{},function (error, result) {
      if (error) {
        return;
      }console.log(result);
	  if(result.countryCode.length==0){
	  document.getElementById('country').value = "not found";
	document.getElementById('ctry').innerHTML = "not found";
	  }else{
	document.getElementById('country').value = result.countryCode;
	document.getElementById('ctry').innerHTML = result.countryCode;	}
	if(result.region.length==0){
	document.getElementById('region').value = "not found";
	document.getElementById('reg').innerHTML = "not found";
	}else{
	document.getElementById('region').value = result.region;
	document.getElementById('reg').innerHTML = result.region;}
	if(result.city.length==0){
	document.getElementById('city').value = "not found";
	document.getElementById('cty').innerHTML = "not found";
	}else{
	document.getElementById('city').value = result.city;
	document.getElementById('cty').innerHTML = result.city;}
	});

	document.getElementById('latitude').value = latlng.lat;
	document.getElementById('lats').innerHTML = latlng.lat;
	document.getElementById('longitude').value = latlng.lng;
	document.getElementById('lngs').innerHTML = latlng.lng;	
	
}

L.Icon.Default.imagePath = "/src/";

</script>
</body>
</html>

