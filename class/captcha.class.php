<?php

require_once 'deathbycaptcha.php';

// Class have methods to retrieve, process and give captcha images/texts
// Uses standard cURL library of PHP
// Make interface with API of DeathByCaptcha webservice
class Captcha{
		
		//private $timeout;
		private $timeoutp;
		//private $filename;
		private $filenamep;
		//private $url;
		private $urlp;
		private $ch;
		private $fp;
		//public $text;
		private $client;
		private $captcha;
		

	 
	 //Retrieving Captcha
	 public function getCaptcha($filenamep, $urlp){
		 
	 // Retrieving captcha from Save.com
	 //$ch = curl_init('https://www.save.com/Captcha.jpg');
     //$fp = fopen('captcha.jpg', 'wb');
     
     $ch = curl_init($urlp);
     $fp = fopen($filenamep, 'wb');
     
     curl_setopt($ch, CURLOPT_FILE, $fp);
     curl_setopt($ch, CURLOPT_HEADER, 0);
     curl_exec($ch);
     curl_close($ch);
     fclose($fp);
	
	}
	
	
	//Send Captch to DBC read the text
	public function sendCaptchaDBC($filenamep, $timeoutp = 15){

			// DBC credentials here.
			$client = new DeathByCaptcha_SocketClient("omo1357", "omo2468@");

		// CAPTCHA file name or handler, and desired timeout (in seconds) here:
		if ($captcha = $client->decode($filenamep, $timeoutp)){
			return $captcha['text'];

		}


	}
	
	// Report the CAPTCHA if solved incorrectly.
	// Make sure the CAPTCHA was in fact incorrectly solved!
	private function reportWrongCaptcha(){
		
		$this->$client->report($captcha['captcha']);
	
	}

     
	}
?>
