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
    
	
	
	
	
	
	
	/*
				if( in_array($s_extension, $a_file_types)){
					printf("Filename: %s<br>", $o_file);
					printf("Extension: %s<br>", $s_extension);#
					printf("Path: %s<br>", $o_file->getRealPath());
					
					//Get filename without extension
					$i_file_name_length = strlen($o_file) - strlen($s_extension) - 1;
					$s_file_name = substr($o_file->getFilename(), 0,$i_file_name_length);
					
					//array_push($a_array_of_paths, $o_file->getRealPath());	
					
					printf("Name: %s", $s_file_name);
					print("<hr>");
					print_r(fn_search_matches($s_file_name, true));
					print("<hr>");
				}
	 */
?>