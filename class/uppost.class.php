<?php

// Class have methods to control the flow of submition of data
// to remote forms and retrieve results to validate this
// submitions at runtime
class UpPost{
	
	
private $url;	
private $data;	
// Method to upload data to remote forms
// Uses PHP native methods to make posts
public function up($url, $data){
	

	//$url = 'http://server.com/post';
	//$data = array('key1' => 'value1', 'key2' => 'value2');

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data),
		),
	);
	
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);

	
	echo "<p></p>Submited to ". $url ." with success!<p></p>";
	//echo $result;
	
	
}


}

?>
