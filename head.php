<!DOCTYPE html>
<html lang="en">
<head>
<title>The Anthropocene Reviewed fan map</title>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta charset="UTF-8">
<meta name="description" content="Fan-made map for the book The Anthropocene Reviewed">
<meta name="keywords" content="John Green, TAR, book, map, The Anthropocene Reviewed">
<meta name="author" content="Ret Samys">
<meta property="og:title" content="Map for The Anthropocene Reviewed" />
<meta property="og:description" content="Fan-made map for the book The Anthropocene Reviewed" />
<meta property="og:image" content="http://theanthropocenereviewed.com/tar.jpg" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="1298" />
<meta property="og:image:height" content="360" />
<meta property="og:image:alt" content="A path in a colour gradient with the title: The Anthropocene Reviewed Map - a fan project" />


<style>
#svganim{
position:absolute;
top:0;
left:0;
z-index:-1;
}

#pathmain {
    stroke: linear-gradient(#e66465, #9198e5,orange);
    stroke-width: 2.5;
	stroke-linecap:round;
    stroke-dasharray: 100px;
    stroke-dashoffset: 100px;
    animation-name: draw;
    animation-duration: 30s;
    animation-fill-mode: forwards; // Stay on the last frame
    animation-iteration-count: 1; // Run only once
    animation-timing-function: linear;
  }

@keyframes draw {
  to {
    stroke-dashoffset: 0;
  }
}



body{
    background:white !important;
margin:0;
padding:4.6vw;
font-weight:900;
font-family:"Arial Black", "Arial Bold", Gadget, sans-serif;
font-size:1.8vw;
}

a{
	color:inherit;
}

.head{
    color: white;
    height: 15.45vw;
	display: table;
	margin-bottom: 3.08vw;
	overflow:hidden;
}

.head h1{
    font-size: 3.75vw;
	margin-bottom:0;
	text-transform: uppercase;
}
.head h2{
	margin-top:0;
}

.content{
	padding-left:15.45vw;
	padding-right:15.45vw;
}

.content-inside{
	height:inherit;
	overflow:inherit;
	margin-left:5vw;
}

.content-outside{
	position:relative;
	z-index:2;
	top:-3.08vw;
	margin-bottom:3.08vw;
	-webkit-animation: 9s ease 0s normal forwards 1 fadein;
    animation: 9s ease 0s normal forwards 1 fadein;
	border-radius: 5vw 5vw 0 0;
}

.sidenav{
	width: 13.5319vw;
    float: left;
    padding: .85vw 1vw;
    color: white;
	-webkit-animation: 9s ease 0s normal forwards 1 fadein;
    animation: 9s ease 0s normal forwards 1 fadein;
}

.sidenav a{
	display:inline-block;
	margin-bottom:1em;
}

.sidenav,.content,.content-outside{
	max-height:162vw;
}

.content-outside{
	overflow:auto;
}

@keyframes fadein{
    0% { opacity:0; }
    66% { opacity:0; }
    100% { opacity:1; }
}

@-webkit-keyframes fadein{
    0% { opacity:0; }
    66% { opacity:0; }
    100% { opacity:1; }
}

.skip{
    animation-duration:0s !important;
}


#map{
	height:90vh;
	background:white;
}


.leaflet-container .leaflet-tile-pane img{
    filter: invert(1) opacity(0.5);
}
.leaflet-popup-content{
    max-height:60vh;
    overflow:auto;
    /*font-size:2.5vw;*/
}

@media only screen and (max-width: 900px) {
.leaflet-popup-content{
    max-height:70vh;
    overflow:auto;
    font-size:2.5vw;
}

.marker-cluster span {
    font-size: 2.75vw;
}

}

.leaflet-popup-content img{
	max-width:100%;
}
.leaflet-left .leaflet-control {
    margin-left: 2vw !important;
    margin-top: 2vw !important;
}
.leaflet-right .leaflet-control {
    margin-right: 2vw !important;
    margin-top: 2vw !important;
}

#gallery div{max-width:46%; padding:1%;display:inline-block;font-size: 20px;
    font-weight: normal;}
#gallery img{
	max-width:100%;
}
</style>

</head><body onclick="document.getElementById('pathmain').classList.add('skip');document.getElementsByClassName('content-outside')[0].classList.add('skip');document.getElementsByClassName('sidenav')[0].classList.add('skip');">
<svg id="svganim" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 35">
  <defs>
    <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" stop-color="#9198e5" /> 
	  <stop offset="2%" stop-color="#9198e5" /> 
	  <stop offset="10%" stop-color="#e66465" />
	  <stop offset="40%" stop-color="#fdae5e" />
    </linearGradient>
  </defs>
  <path id="pathmain" d="M 0 2 L 13 2 C 15 2 15 5 13 5 L 4 5 C 3 5 2 6 2 7 L 2 36" stroke="url(#gradient)" stroke-width="2.5" fill="none"/>
  
</svg>
<div class="head"><h1>The Anthropocene Reviewed Map</h1><h2>A fan project</div>
<div class="head"><div class="content content-inside" style="line-height:3.15vw">The Anthropocene Reviewed is a book by <a href="https://www.johngreenbooks.com/">John Green</a> that rates different facets of the human-centered planet on a five-star scale. Send in a photo of your copy of the book, write a review of your location, and see it on the map!
</div>
</div>
