<?php
 /* add weavebytes header here */ 

 /* VO for driver */

/* value object to represent driver */ 
class driver { 

	var $did, $uid, $name, $photo, $address, $email, $phone, $social_security_no ,$license_num ,$expiry_date;

	/* constructor */ 
	public function __construct($uid, $name, $photo, $address, $email, $phone, $social_security_no ,$license_num ,$expiry_date) { 
		$this->uid = $uid;
		$this->name = $name;
		$this->photo = $photo;
		$this->address = $address;
		$this->email = $email;
		$this->phone = $phone;
		$this->social_security_no = $social_security_no;
		$this->license_num = $license_num;
		$this->expiry_date = $expiry_date;
		$this->did = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid" => $this->uid,
			"name" => $this->name,
			"photo" => $this->photo,
			"address" => $this->address,
			"email" => $this->email,
			"phone" => $this->phone,
			"social_security_no" => $this->social_security_no,
			"license_num" => $this->license_num,
			"expiry_date" => $this->expiry_date);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of driver object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>did</td><td>$this->did</td></tr>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>name</td><td>$this->name</td></tr>";
				echo "<tr><td>photo</td><td>$this->photo</td></tr>";
				echo "<tr><td>address</td><td>$this->address</td></tr>";
				echo "<tr><td>email</td><td>$this->email</td></tr>";
				echo "<tr><td>phone</td><td>$this->phone</td></tr>";
				echo "<tr><td>license_num</td><td>$this->license_num</td></tr>";
				echo "<tr><td>expiry_date</td><td>$this->expiry_date</td></tr>";
				echo "<tr><td>social_security_no</td><td>$this->social_security_no</td></tr>";
		echo "</table>";
	} 

 }
/* driver */
?>
