<?php

    $it = new DirectoryIterator("C:/Users/jack kettle/Downloads/");
    
    
    foreach($it as $file) {
	if (!$it->isDot()) {
	    echo $file . "<br>".$file->getExtension()."<br><hr>";
	}
    }

?>