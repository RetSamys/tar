<?php include "head.php"; ?>

<div class="sidenav"><a href="index.php">Map</a> <br> <a href="mapmaker.php">Add your book</a> <br> <a href="faq.php">FAQ</a></div>
<div class="content-outside" style='padding: 2vw;
    font-size: 1.5vw;
    font-family: "Arial", sans-serif;max-height:initial;'><h2>Gallery</h2>
    <select onchange="listbooks(this.value);return false;" id="bookselect">
    <option disabled selected value>Select book:</option>
    </select>
    <div id="gallery">
        
    </div></div><script src="data.js"></script><script>var bs=document.getElementById("bookselect");
    for(var book in tars){
        bs.innerHTML+="<option value='"+book+"'>"+book+"</option>";
    }
    var gal=document.getElementById("gallery");
    var offset=50;
    function listbooks(bname,i=0,end=offset){
        var l=tars[bname].length;
        gal.innerHTML="<h3>"+bname+" ("+l+" entries)</h3>";
        var nav="<div style='text-align:center;width:100%;display:block;max-width:100%'>";
        for(var j=0;j<(l/offset);j++){
            if (j>0){nav+=" | ";}
            nav+="<a href='#' onclick='listbooks(\""+bname+"\","+(j*offset)+","+((j+1)*offset)+");return false;'>"+(j+1)+"</a>";
        }
        /*if ((i>0)&&(end<l)){
            nav+="<a href='listbooks(\""+bname+"\")'>↞first</a> | <a href='#' onclick='listbooks(\""+bname+"\","+(i-offset)+","+(end-offset)+");return false;'>←previous</a> | <a href='#' onclick='listbooks(\""+bname+"\","+(i+offset)+","+(end+offset)+");return false;'>next→</a> | <a href='#' onclick='listbooks(\""+bname+"\","+(offset*(Math.floor(l/offset)))+","+(l)+");return false;'>last↠</a>";
        }
        if (!(i>0)&&(end<l)){
            nav+="<a href='#' onclick='listbooks(\""+bname+"\","+(i+offset)+","+(end+offset)+");return false;'>next→</a> | <a href='#' onclick='listbooks(\""+bname+"\","+(offset*(Math.floor(l/offset)))+","+(l)+");return false;'>last↠</a>";
        }
        if ((i>0)&&!(end<l)){
            nav+="<a href='listbooks(\""+bname+"\")'>↞first</a> | <a href='#' onclick='listbooks(\""+bname+"\","+(i-offset)+","+(end-offset)+");return false;'>←previous</a>";
        }*/
        nav+="</div>";
        gal.innerHTML+=nav;
        for (i;((i<l)&&(i<end));i++){
            gal.innerHTML+="<div>"+tars[bname][i][2]+"<p><a href='https://theanthropocenereviewed.com/?marker="+i+"&book="+bname+"'>Link to entry on the map</a></p></div>";
        }
        gal.innerHTML+=nav;
    }
    </script>
    <!--<ul id="galmen"></ul><div id="gallery"></div>
</div><script src="data.js"></script><script>
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
</script>-->
<?php include "foot.php"; ?>
