<?php

$sPath = "C:/Users/jack kettle/Zip Test/";

if ($o_handle = opendir($sPath)) {

	$o_file_info = new finfo();

    while ($entry = readdir($o_handle)) {
		@$s_mime_type = $o_file_info->buffer(
				file_get_contents($sPath.$entry), FILEINFO_MIME_TYPE);
		if( $s_mime_type != "application/x-empty" )
		{
			echo $s_mime_type."<br>"; 
		}
    }

    closedir($o_handle);
}
