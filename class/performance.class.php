<?php

class Performance{
	
	private $timeStart;
	private $timeEnd;

	public function startCountTime(){
	
		$timeStart = microtime(true);
		return $timeStart;
	
	}

	public function endCountTime(){
		
		$timeEnd = microtime(true);
		return $timeEnd;
	
	}



}

?>
