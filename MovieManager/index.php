<?php

include 'functions.php';

$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$starttime = $mtime; 
///////////////////////////////////////////

$sPath = "C:/Users/jack kettle/Downloads/";

$array = fn_get_paths($sPath);

print("<h3>Videos Found</h3><hr style=\"background-color: #E00;
height: 3px;;\">");

foreach ($array as $value) {
	print("<hr style=\"margin: 20px 0;\">");
	
	print($value."<br>");
	$s_name = pathinfo($value)['filename'];
	print($s_name."<br>");
	
	//Posible Macthes Start
	
	print("<br><strong>List of Possible Matches:</strong><br>");
	
	$o_results = fn_search_matches($s_name, true);
	if($o_results){
		foreach ($o_results as $o_result) {
			print("<li>".$o_result->fn_get_title());
			print(" - ".$o_result->fn_get_year());
			print(" - ".$o_result->fn_get_type());
			print(" - ".$o_result->fn_get_id()."</li>");
		}
	}else{
		print("No matches");
	}
	
	
	//Posible Macthes End

	print("<br>");
}
	




///////////////////////
$mtime = microtime(); 
$mtime = explode(" ",$mtime); 
$mtime = $mtime[1] + $mtime[0]; 
$endtime = $mtime; 
$totaltime = ($endtime - $starttime); 
echo "<hr style=\"background-color: #E00;
height: 3px;;\">This page was created in <em>".$totaltime."</em> seconds"; 
