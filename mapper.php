<div style="display:table;margin:auto"><?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$path=$_SERVER["DOCUMENT_ROOT"]."/protected/mapdata.csv";
$to="TARfanmap@gmail.com";

if (isset($_POST["lat"]) and isset($_POST["lng"]) and isset($_POST["book"]) and isset($_FILES["tar"]) and !empty($_FILES["tar"])){
	$lat=fmod($_POST["lat"],90);
	$lng=fmod($_POST["lng"],180);
	$nimi=$_POST["nimi"];
	$book=$_POST["book"];
	$booktitle=$_POST["booktitle"];
	$otherdate=$_POST["otherdate"];
	$msg=str_replace(array("\n", "\r"), '<br>',$_POST["msg"]);
	$country=$_POST["country"];
	$region=$_POST["region"];
	$city=$_POST["city"];
	if(isset($_POST["rating"])){$rating=$_POST["rating"];}else{$rating=-1;}
	
	$time=round(microtime(true) * 1000);
	$books=explode("|",file_get_contents("books.txt"));
	if ($book=="other"){
		$book=$booktitle;
	}
	if(in_array($book,$books)){
		$status=true;
	}else{
		$status=false;
		mail($to,"Admin action: TAR fan map submission","Go to http://theanthropocenereviewed.com/admin.php to review changes for the book ".$book);
		echo "<p>Oh, neat! A new version of TAR! Your submission will be added shortly, after an admin reviews it.</p>";
	}
	
	$target_dir = "photos/";
	$target_file = $target_dir . basename($_FILES["tar"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$target_file = $target_dir .$time.".".$imageFileType;
	$uploadOk = 1;
$check = getimagesize($_FILES["tar"]["tmp_name"]);
  if($check !== false) {
	echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "<p>ERROR: File is not an image.</p>";
    $uploadOk = 0;
  }
// Check if file already exists
if (file_exists($target_file)) {
  echo "<p>ERROR: Sorry, file already exists.</p>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["tar"]["size"] > 5242880) {
  echo "<p>Sorry, your file is too large.</p>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "<p>ERROR: Sorry, only JPG, JPEG, PNG files are allowed.</p>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  //if (move_uploaded_file($_FILES["tar"]["tmp_name"], $target_file)) {
  $img = new Imagick($_FILES['tar']['tmp_name']);
  $profiles = $img->getImageProfiles("icc", true);
  $img->stripImage();
  $img->writeImage($target_file); 


    if(!empty($profiles)) {
       $img->profileImage("icc", $profiles['icc']);
    }
    
    echo "<p>The file ". htmlspecialchars( basename( $_FILES["tar"]["name"])). " has been uploaded.</p>";
	
$fp=fopen($path,"a");

fputcsv($fp,array($status,$book,$lat,$lng,$country,$region,$city,$time.".".$imageFileType,$nimi,$otherdate,$msg,$rating));

fclose($fp);

echo "<p>The following data has been saved:</p><p><b>Latitude</b> ".$lat."<br><b>Longitude:</b> ".$lng."<br><b>Country: ".$country."</b><br><b>Region: ".$region."</b><br><b>City: ".$city."</b><br><b>Photo:</b> ".$time.".".$imageFileType."<br><b>Name:</b> ".$nimi."<br><b>Date: ".$otherdate."</b><br><br><b>Message:</b> ".$msg."<br><b>Rating:</b> ".($rating/2)."</p>
<p><a href='index.php'>Go to the map</a></p><p> </p><p>If something went wrong, contact <a href='mailto:TARfanmap@gmail.com'>TARfanmap@gmail.com</a></p>";/*}
   else {
    echo "<p>Sorry, there was an error uploading your file.</p>";
  }*/
}
	


}else{echo "<p>Sorry, but you need to fill out all mandatory fields.</p>";}

?></div>