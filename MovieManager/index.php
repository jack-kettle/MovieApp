<?php

$sPath = "C:/Users/Jacks Desktop/Documents/";

function getFileTypes($s_Path){
    @$o_handle = opendir($s_Path);
    if ($o_handle != NULL) {
        $o_file_info = new finfo();
        while ($s_entry = readdir($o_handle)) {
            @$s_mime_type = $o_file_info->buffer(
                    file_get_contents($s_Path.$s_entry), FILEINFO_MIME_TYPE);
            if( $s_mime_type != "application/x-empty" )
            {
                echo $s_mime_type."<br>"; 
            }
        }
        closedir($o_handle);
    }else{
        echo 'Folder does not exsist';
    }
}

getFileTypes($sPath);