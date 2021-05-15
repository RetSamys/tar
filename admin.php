<form style="display:table;margin:auto;" action="" method="post"><?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["pw"])){
	$path=$_SERVER["DOCUMENT_ROOT"]."/protected/mapdata.csv";
	$csv = array_map('str_getcsv', file($path));
	
if ($_POST["pw"]=="thisisapassword"){
	if (isset($_POST["new"])){
		$books=explode("|",file_get_contents("books.txt"));
		$count=0;
		$fp=fopen($path,"w");
		foreach($csv as $line){
			if(in_array($count,$_POST["status"])){
				if($line[0]=="1"){
					$nstatus=false;
				}else{
					$nstatus=true;
					if(in_array($line[1],$books)){}else{
						$bfp=fopen("books.txt","a");
						fwrite($bfp,"|".str_replace("|","-",$line[1]));
						fclose($bfp);
					}
				}
				fputcsv($fp,array_merge([$nstatus],array_slice($line,1)));
			}else{
				fputcsv($fp,$line);
			}
			$count=$count+1;
		}
		fclose($fp);
		echo "<p>Updated!</p>";
	}else{


echo "<input type='hidden' name='new' value='yes'><input type='hidden' name='pw' value='".$_POST["pw"]."'><table><tbody><tr><th>Change?</th><th>status</th><th>book</th><th>latitude</th><th>longitude</th><th>country</th><th>region</th><th>city</th><th>image</th><th>name</th><th>date</th><th>message</th></tr>";

$count=0;
foreach ($csv as $line){
	echo "<tr><td><input type='checkbox' value='".$count."' name='status[]'></td>";
	foreach ($line as $field){
		if (strpos($field,".png")>0 or strpos($field,".jpg")>0 or strpos($field,".jpeg")>0){
			echo "<td><img style='max-height:300px' src='photos/".$field."'></td>";
		}else{
			echo "<td>".$field."</td>";
		}
		
	}
	echo "</tr>";
	$count=$count+1;
}
echo '</tbody></table><p><input type="submit" name="submit" value="Send"></p>';
}
}
}else{
echo '<p><input name="pw"></p><p><input type="submit" name="submit" value="Send"></p>';
}

?></form>