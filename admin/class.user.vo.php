<?php
 /* add weavebytes header here */ 

 /* VO for user */

/* value object to represent user */ 
class user { 

	var $uid, $username, $password, $email;

	/* constructor */ 
	public function __construct($username, $password, $email) { 
		$this->username = $username;
		$this->password = $password;
		$this->email    = $email;
		$this->uid      = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"username" => $this->username,
			"password" => $this->password,
			"full_name" => $this->full_name,
			"email" => $this->email,
			"phone" => $this->phone,
			"address" => $this->address,
			"creation_date" => $this->creation_date,
			"is_active" => $this->is_active);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of user object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>username</td><td>$this->username</td></tr>";
				echo "<tr><td>password</td><td>$this->password</td></tr>";
				echo "<tr><td>email</td><td>$this->email</td></tr>";
		echo "</table>";
	} 

 }
/* user */
?>
