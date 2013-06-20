<?php

    $it = new DirectoryIterator("C:/Users/jack kettle/Downloads/");
    
    
    foreach($it as $file) {
	if (!$it->isDot()) {
	    echo $file . "<br>".$file->getExtension()."<br><hr>";
	}
	//Testing Start
	$array = explode(".", $file);
	$url = "http://www.omdbapi.com/?t=".urlencode($array[0]);

	$json = file_get_contents($url);
	$data = json_decode($json, TRUE);
	print($url."<br><hr>");
	print_r($data['Title']);
	print("<br><hr>");
	//Testing End
	
    }
    
?>