var tars=<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$path=$_SERVER["DOCUMENT_ROOT"]."/protected/mapdata.csv";
$csv = array_map('str_getcsv', file($path));
$output=[];

foreach($csv as $line){
	if ($line[0]=="1"){
		$title=$line[4];
		if ($line[5]=="" or $line[5]=="not found"){}else{
			$title=$line[5].", ".$title;
		}
		if ($line[6]=="" or $line[6]=="not found"){}else{
			$title=$line[6]." (".$title.")";
		}
		if($title=="" or $title=="not found"){
			$title="unknown";
		}
		if (array_key_exists($line[1],$output)){
			array_push($output[$line[1]],[$line[2],$line[3],"<b>".$title."</b>".(strlen($line[8])>0?"<br><b>From:</b> ".$line[8]:"")."<br><img src='photos/".$line[7]."'><br>".$line[10].(strlen($line[9])>0?"<br><b>Date of arrival:</b> ".$line[9]:"").($line[11]>=0?"<br><b>Rating of this location:</b> ".($line[11]/2)." out of 5 stars":""),$title]);
		}else{
			$output[$line[1]]=[[$line[2],$line[3],"<b>".$title."</b><br><b>From:</b> ".$line[8]."<br><img src='photos/".$line[7]."'><br>".$line[10].(strlen($line[9])>0?"<br><b>Date of arrival:</b> ".$line[9]:"").($line[11]>=0?"<br><b>Rating of this location:</b> ".($line[11]/2)." out of 5 stars":""),$title]];
		}
	}
}

echo json_encode($output,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>;