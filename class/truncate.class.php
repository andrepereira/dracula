<?php

class Truncate{
	
	private $string;
	private $cut;
	
	
	// Method to truncate a complex file
	// Get a complex string and cut to extract the important content
	public function truncateString($string, $cut){
	
		$string = strstr( $string, $cut, true);
	
		return $string;
	
	}
	
	
	// Method to read the complex file and put content to a string
	// Make sure to read in binary mode secured mode
	// Make possible a truncate process work with security in a complex file
	public function readFileToString($file){
		
		$filename = $file;
		$handle = fopen($filename, "rb");
		$string = fread($handle, filesize($filename));
		fclose($handle);
		
		return $string;
		
		
	}
	
	
	// Write a string to a file in a secured binary mode
	// Per example, the data of the a GIF file extracted of a string
	// stripped with trucate method
	public function writeStringToFile($file, $string){
		
		$fp = fopen($file, 'wb');
		fwrite($fp, $string);
		fclose($fp);
		
	}
	
	
	
}


?>
