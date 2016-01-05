<?php

/**
* 
*/
class session
{
	// random seed
	private static $RSeed = 0;

	var $session_id, $uid , $start_time , $end_time , $session_code;

	function __construct($uid , $start_time , $end_time )
	{
		$this->uid = $uid;
		$this->start_time = $start_time;
		$this->end_time = $end_time;
		$this->session_code = $this->num(1,9999999);
		$this->session_id = 0;
	}

		// set seed
	public static function seed($s = 0) {
		self::$RSeed = abs(intval($s)) % 9999999 + 1;
		self::num();
	}


	// generate random number
	public static function num($min = 0, $max = 9999999) {
		if (self::$RSeed == 0) self::seed(mt_rand());
		self::$RSeed = (self::$RSeed * 125) % 2796203;
		return self::$RSeed % ($max - $min + 1) + $min;
	}

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid" => $this->uid,
			"start_time" => $this->start_time,
			"end_time" => $this->end_time,
			"session_code" => $this->session_code);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of driver object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>session_id</td><td>$this->session_id()</td></tr>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>start_time</td><td>$this->start_time</td></tr>";
				echo "<tr><td>end_time</td><td>$this->end_time</td></tr>";
				echo "<tr><td>session_code</td><td>$this->session_code</td></tr>";
		echo "</table>";
	} 



}






?>