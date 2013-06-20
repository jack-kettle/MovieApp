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
	    array_push($a_file_types, $child['type']);
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
	
	@$o_handle = opendir($s_Path);

	$a_file_types = fn_get_user_specified_file_types();

	// check if directory is empty
	if ($o_handle != NULL) {

	    // create new finfo object
	    $o_file_info = new finfo();

	    while ($s_entry = readdir($o_handle)) {

		// Get the mime type of the file
		@$s_mime_type = $o_file_info->buffer(
			file_get_contents($s_Path.$s_entry),FILEINFO_MIME_TYPE);

		// If the file is not empty and it's mime type is specified add
		// the path to the array
		if( $s_mime_type != "application/x-empty" 
			&& in_array($s_mime_type, $a_file_types) ){

		    // testing
		    echo $s_mime_type." - ".$s_entry."<br>";

		}
	    }
	    closedir($o_handle);

	}else{
	    echo 'Folder does not exsist';
	}
    }
?>
