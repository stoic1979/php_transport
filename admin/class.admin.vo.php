<?php
 /* add weavebytes header here */ 

 /* VO for admin */

/* value object to represent admin */ 
class admin { 

	var $aid, $username, $password;

	/* constructor */ 
	public function __construct($username, $password) { 
		$this->username = $username;
		$this->password = $password;
		$this->aid = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"username" => $this->username,
			"password" => $this->password);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of admin object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>aid</td><td>$this->aid</td></tr>";
				echo "<tr><td>username</td><td>$this->username</td></tr>";
				echo "<tr><td>password</td><td>$this->password</td></tr>";
		echo "</table>";
	} 

 }
/* admin */
?>
