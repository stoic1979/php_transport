
<?php
 /* add weavebytes header here */ 

 /* VO for company */

/* value object to represent company */ 
class company { 

	var $comp_id, $uid, $title, $phone, $fax , $email , $address, $country, $city, $state, $pin_code;

	/* constructor */ 
	public function __construct($uid, $title, $phone, $fax , $email ,$city, $state, $pin_code, $country, $address) { 
		$this->uid = $uid;
		$this->title = $title;
		$this->phone = $phone;
		$this->fax = $fax;
		$this->email = $email;
		$this->address = $address;
		$this->country = $country;
		$this->city = $city;
		$this->state = $state;
		$this->pin_code = $pin_code;
		$this->comp_id = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid" => $this->uid,
			"title" => $this->title,
			"phone" => $this->phone,
			"fax" => $this->fax,
			"email" => $this->email,
			"country" => $this->country,
			"city" => $this->city,
			"state" => $this->state,
			"pin_code" => $this->pin_code,
			"address" => $this->address);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of company object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>comp_id</td><td>$this->comp_id</td></tr>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>title</td><td>$this->title</td></tr>";
				echo "<tr><td>phone</td><td>$this->phone</td></tr>";
				echo "<tr><td>fax</td><td>$this->fax</td></tr>";
				echo "<tr><td>email</td><td>$this->email</td></tr>";
				echo "<tr><td>country</td><td>$this->country</td></tr>";
				echo "<tr><td>city</td><td>$this->city</td></tr>";
				echo "<tr><td>state</td><td>$this->state</td></tr>";
				echo "<tr><td>pin_code</td><td>$this->pin_code</td></tr>";
				echo "<tr><td>address</td><td>$this->address</td></tr>";
		echo "</table>";
	} 

 }
/* company */
?>
