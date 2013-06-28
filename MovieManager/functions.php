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
    * Function 	:   takes a movie and returns an array of possible matches
    * Params 	:   None	
    * Returns 	:   Array of Search_Results
    */
	function fn_search_matches($s_name, $b_arrgessive_search = false){
		
	    $a_array_of_matches = array();
		
		$url = "http://www.omdbapi.com/?s=".urlencode($s_name)."&r=xml";
		$xml = simplexml_load_file($url);
		
		$b_while_flag = true;
		
		while($b_while_flag){
			if(!$xml->error){
				foreach ($xml->Movie as $movie){
					$o_search_result = new Search_Result(
							$movie['Title'],
							$movie['Year'],
							$movie['imdbID'],
							$movie['Type']
					);
					array_push($a_array_of_matches, $o_search_result);	
				}	
				$b_while_flag = false;
			}else if($b_arrgessive_search){
				// If we can't find a match first time 
				// Modify the string and do another search
				// Takes a long time
				
				$s_name = preg_split("[\s|_|\.|\t|\n|\r|-]", $s_name);
				
				if(count($s_name) <= 1){
					break;
				}
				
				$s_search = "";
				
				for($i_index_1 = count($s_name) - 1; $i_index_1 >= 0 ; $i_index_1--){
					$s_search = "";
					for($i_index_2 = 0; $i_index_2 < $i_index_1; $i_index_2++){
						$s_search = $s_search.$s_name[$i_index_2]." ";
					}
					
					$url = "http://www.omdbapi.com/?s=".urlencode($s_search)."&r=xml";
					$xml = simplexml_load_file($url);
					if(!$xml->error){
						foreach ($xml->Movie as $movie){
							$o_search_result = new Search_Result(
									$movie['Title'],
									$movie['Year'],
									$movie['imdbID'],
									$movie['Type']
							);
							array_push($a_array_of_matches, $o_search_result);	
						}	
						break;
					}
				}
				$b_while_flag = false;
				
				
			}else{
				$b_while_flag = false;
			}
		}
		if($a_array_of_matches){
			return $a_array_of_matches;
		}else{
			return null;
		}
	}
    
    /*
    * Function 	:   Search a directory and return an array of paths to files
    *				with a desired mime type (list found in the config)
    * Params 	:   String (path to directory containing files)	
    * Returns 	:   Array of file paths
    */
    function fn_get_paths($s_Path){
	
		
		$a_array_of_paths = array();
		
		$o_dir_iterator = new DirectoryIterator($s_Path);

		$a_file_types = fn_get_user_specified_file_types();

		foreach($o_dir_iterator as $o_file) {
			if (!$o_dir_iterator->isDot()) {

				$s_extension = $o_file->getExtension();

				if( in_array($s_extension, $a_file_types)){
					
					array_push($a_array_of_paths, $o_file->getRealPath());	
				}
			}
		}
		return $a_array_of_paths;
    }
	
?>
