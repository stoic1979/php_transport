<?php
 /* add weavebytes header here */ 

 /* VO for customer */

/* value object to represent customer */ 
class customer { 

	var $cust_id, $uid, $name, $firm_name, $address, $phone, $email;

	/* constructor */ 
	public function __construct($uid, $name, $firm_name, $address, $phone, $email) { 
		$this->uid = $uid;
		$this->name = $name;
		$this->firm_name = $firm_name;
		$this->address = $address;
		$this->phone = $phone;
		$this->email = $email;
		$this->cust_id = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid" => $this->uid,
			"name" => $this->name,
			"firm_name" => $this->firm_name,
			"address" => $this->address,
			"phone" => $this->phone,
			"email" => $this->email);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of customer object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>cust_id</td><td>$this->cust_id</td></tr>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>name</td><td>$this->name</td></tr>";
				echo "<tr><td>firm_name</td><td>$this->firm_name</td></tr>";
				echo "<tr><td>address</td><td>$this->address</td></tr>";
				echo "<tr><td>phone</td><td>$this->phone</td></tr>";
				echo "<tr><td>email</td><td>$this->email</td></tr>";
		echo "</table>";
	} 

 }
/* customer */
?>
