<!Doctype html>
<?php

	require 'classes.php';

    /*
    * Function 	:   get file types from xml config file
    * Params 	:   None	
    * Returns 	:   Array of file types
    */
    function fn_get_user_specified_file_types(){
		$s_path = "config/fileTypeInclude.xml";
		$o_xml = simplexml_load_file($s_path);

		$a_file_types = array();

		foreach ($o_xml->file as $child) {
			array_push($a_file_types, $child['extension']);
		}

		return $a_file_types;
    }
    
	/*
    * Function 	:   get file types from xml config file
    * Params 	:   None	
    * Returns 	:   Array of file types
    */
	function fn_search_titles($s_name){
		
		//Testing Start
		$url = "http://www.omdbapi.com/?s=".urlencode($s_name)."&r=xml";

		$xml = simplexml_load_file($url);
		
		if(!$xml->error){
		
			foreach ($xml->Movie as $movie){
				
				
				$o_search_result = new Search_Result(
						$movie['Title'],
						$movie['Year'],
						$movie['imdbID'],
						$movie['Type']
				);
				
				print("<br>");
				//print($o_search_result->s_title." - ");
				//print($o_search_result->s_year." - ");
				//print($o_search_result->s_id." - ");
				//print($o_search_result->s_type);
				print("<hr style=\"width: 50%;\">");
			}
			print("<hr>");
			
		}

	}
    
    /*
    * Function 	:   Search a directory and return an array of paths to files
    *				with a desired mime type (list found in the config)
    * Params 	:   String (path to directory containing files)	
    * Returns 	:   Array of file paths
    */
    function fn_get_files($s_Path){
	
		$o_dir_iterator = new DirectoryIterator($s_Path);

		$a_file_types = fn_get_user_specified_file_types();

		foreach($o_dir_iterator as $o_file) {
			if (!$o_dir_iterator->isDot()) {

				$s_extension = $o_file->getExtension();

				if( in_array($s_extension, $a_file_types)){
					printf("Filename: %s<br>", $o_file);
					printf("Extension: %s<br>", $s_extension);#
					printf("Path: %s<br>", $o_file->getRealPath());
					
					//Get filename without extension
					$i_file_name_length = strlen($o_file) - strlen($s_extension) - 1;
					$s_file_name = substr($o_file->getFilename(), 0,$i_file_name_length);
					
					printf("Name: %s", $s_file_name."<hr>");
					
					fn_search_titles($s_file_name);
				}
			}
		}
    }
?>
