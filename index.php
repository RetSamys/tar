<?php include "head.php"; ?>


<div class="sidenav"><a href="mapmaker.php">Add your book</a> <br> <a href="faq.php">FAQ</a><div id="realign"><p align="center"><select id="selector" onchange="var z=this.selectedIndex-1;gotom(forMarkerList[z]);return false;" style="max-width:100%">
<option disabled selected value>Jump to marker:</option>
</select></p>
<p>Too much going on in the map? View all in a <a href="gallery.php">gallery</a>.</p><p> </p><p>Talk about the book <a href="https://discord.gg/ect6w82S7U">on Discord</a></p></div></div>
<div class="content-outside">	<div id="map"></div>
</div>
<script src="data.php"></script>
<link rel="stylesheet" href="src/leaflet.css"/>
<link rel="stylesheet" href="src/MarkerCluster.css" />
	<link rel="stylesheet" href="src/MarkerCluster.Default.css" />

	<script src="src/leaflet-src.js"></script>
		
	<script src="src/leaflet.markercluster-src.js"></script>
	<script src="src/subgroup.js"></script>
	
	<script src="src/tarmap.js"></script>
	<?php
	if (isset($_GET["marker"])){
	    echo "<script>gotom(forMarkerList[".$_GET["marker"]."]);";
	}
	?></script>
<?php include "foot.php"; ?>