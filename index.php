<?php include "head.php"; ?>


<div class="sidenav"><a href="mapmaker.php">Add your book</a> <br> <a href="faq.php">FAQ</a><div id="realign"><p align="center"><select id="selector" onchange="var z=this.selectedIndex-1;gotom(forMarkerList[z]);return false;" style="max-width:100%">
<option disabled selected value>Jump to marker:</option>
</select></p>
<p>Too much going on in the map? View all in a <a href="gallery.php">gallery</a>.</p><p> </p><p>Talk about the book <a href="https://discord.gg/ect6w82S7U">on Discord</a></p><p> </p><p><a href='https://forms.gle/BCSGyHxbydnUeBsi9'>Fill out a form about the signature</a></p></div></div>
<div class="content-outside">	<div id="map"></div>
</div>
<script src="data.js"></script>
<link rel="stylesheet" href="src/leaflet.css"/>
<link rel="stylesheet" href="src/MarkerCluster.css" />
	<link rel="stylesheet" href="src/MarkerCluster.Default.css" />

	<script src="src/leaflet-src.js"></script>
		
	<script src="src/leaflet.markercluster-src.js"></script>
	<script src="src/subgroup.js"></script>
	<script>var jumptom=-1;<?php
	if (isset($_GET["marker"])){
	    if (isset($_GET["book"])){
	        echo "var boffsetter='".$_GET["book"]."';
	        var boffset=0;
	        for (var b=0;b<allbooks.indexOf(boffsetter);b++){
	            boffset+=tars[allbooks[b]].length;
	        }
	        jumptom=".$_GET["marker"]."+boffset;";
	    }else{
	        echo "<script>jumptom=".$_GET["marker"].";";
	    }
	}
	?></script>
	<script src="src/tarmap.js"></script>
	
<?php include "foot.php"; ?>
