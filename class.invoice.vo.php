<?php
/* add weavebytes header here */ 

 /* VO for invoice */

/* value object to represent invoice */ 
class invoice { 

	var $uid ,$inv_num, $customer, $total_amt, $balance_due, $inv_date , $paid_date;

	/* constructor */ 
	public function __construct($uid, $customer, $total_amt, $balance_due, $inv_date , $paid_date) { 
		$this->uid = $uid;
		$this->customer = $customer;
		$this->total_amt = $total_amt;
		$this->balance_due = $balance_due;
		$this->inv_date = $inv_date;
		$this->paid_date = $paid_date;
		$this->inv_num = 0;
	} 
 
	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid" => $this->uid,
			"customer" => $this->customer,
			"total_amt" => $this->total_amt,
			"balance_due" => $this->balance_due,
			"inv_date" => $this->inv_date,
			"paid_date" => $this->paid_date
			);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of company object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>customer</td><td>$this->customer</td></tr>";
				echo "<tr><td>total_amt</td><td>$this->total_amt</td></tr>";
				echo "<tr><td>balance_due</td><td>$this->balance_due</td></tr>";
				echo "<tr><td>inv_date</td><td>$this->inv_date</td></tr>";
				echo "<tr><td>paid_date</td><td>$this->paid_date</td></tr>";
		echo "</table>";
	} 

 }
/* expense */






?>