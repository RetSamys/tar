<?php include "head.php"; ?>

<div class="sidenav"><a href="index.php">Map</a> <br> <a href="mapmaker.php">Add your book</a> <br> <a href="faq.php">FAQ</a></div>
<div class="content-outside" style='padding: 2vw;
    font-size: 1.5vw;
    font-family: "Arial", sans-serif;'><h2>Gallery</h2><ul id="galmen"></ul><div id="gallery"></div>
</div><script src="data.php"></script><script>
var gal=document.getElementById("gallery");
var galmen=document.getElementById("galmen");
for (var book in tars){
	gal.innerHTML+="<h3 id='"+book.replace(/[^a-z0-9+]+/gi, '')+"'>"+book+"</h3>";
	galmen.innerHTML+="<li><a href='#"+book.replace(/[^a-z0-9+]+/gi, '')+"'>"+book+"</a></li>";
	for (i=0;i<tars[book].length;i++){
		a=tars[book][i];
		gal.innerHTML+="<div>"+a[2]+"</div>";
	}
}
</script>
<?php include "foot.php"; ?>