<!Doctype html>
<?php

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
    * Function 	:   Search a directory and return an array of paths to files
    *		    with a desired mime type (list found in the config)
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
		    echo $o_file . "<br>".$s_extension."<br><hr>";
		}
	    }
	}
    }
?>