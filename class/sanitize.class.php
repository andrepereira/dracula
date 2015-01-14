<?php

// Class jave methods to sanitize input data at local forms to
// submition for remote forms
class Sanitize{

private $input;

public function cleanData($input) {
    $input = trim(htmlentities(strip_tags($input,",")));
 
    if (get_magic_quotes_gpc())
        $input = stripslashes($input);
 
 
    return $input;
	}


}

?>
