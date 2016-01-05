<?php
 /* add weavebytes header here */ 

 /* VO for company */

/* value object to represent company */ 
class dispatch { 

	var $did, $uid, $carrier, $phone, $pieces, $space, $act_wgt, $as_wgt, $type, $attention ,$reference ,$trailer_id , $truck_id , $pay_code , $rate ,$total;

	/* constructor */ 
	public function __construct($uid, $carrier, $phone, $pieces, $space, $act_wgt, $as_wgt, $type, $attention ,$reference ,$trailer_id , $truck_id , $pay_code ,$pay_type , $rate ,$total) { 
		$this->uid = $uid;
		$this->carrier = $carrier;
		$this->phone = $phone;
		$this->pieces = $pieces;
		$this->space = $space;
		$this->act_wgt = $act_wgt;
		$this->as_wgt = $as_wgt;
		$this->type = $type;
		$this->attention = $attention;
		$this->reference = $reference;
		$this->trailer_id = $trailer_id;
		$this->truck_id = $truck_id;
		$this->pay_code = $pay_code;
		$this->pay_type = $pay_type;
		$this->rate = $rate;
		$this->total = $total;
		$this->did = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid"=>$this->uid,
			"carrier"=>$this->carrier,
			"phone"=>$this->phone,
			"pieces"=>$this->pieces,
			"space"=>$this->space,
			"act_wgt"=>$this->act_wgt,
			"as_wgt"=>$this->as_wgt,
			"type"=>$this->type,
			"attention"=>$this->attention,
			"reference"=>$this->reference,
			"trailer_id"=>$this->trailer_id,
			"truck_id"=>$this->truck_id,
			"pay_code"=>$this->pay_code,
			"pay_type"=>$this->pay_type,
			"rate"=>$this->rate,
			"total"=>$this->total);
			
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of company object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>did</td><td>$this->did</td></tr>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>carrier</td><td>$this->carrier</td></tr>";
				echo "<tr><td>phone</td><td>$this->phone</td></tr>";
				echo "<tr><td>pieces</td><td>$this->pieces</td></tr>";
				echo "<tr><td>space</td><td>$this->space</td></tr>";
				echo "<tr><td>act_wgt</td><td>$this->act_wgt</td></tr>";
				echo "<tr><td>as_wgt</td><td>$this->as_wgt</td></tr>";
				echo "<tr><td>type</td><td>$this->type</td></tr>";
				echo "<tr><td>attention</td><td>$this->attention</td></tr>";
				echo "<tr><td>reference</td><td>$this->reference</td></tr>";
				echo "<tr><td>trailer_id</td><td>$this->trailer_id</td></tr>";
				echo "<tr><td>truck_id</td><td>$this->truck_id</td></tr>";
				echo "<tr><td>pay_code</td><td>$this->pay_code</td></tr>";
				echo "<tr><td>pay_type</td><td>$this->pay_type</td></tr>";
				echo "<tr><td>rate</td><td>$this->rate</td></tr>";
				echo "<tr><td>total</td><td>$this->total</td></tr>";
		echo "</table>";
	} 

 }
/* company */
?>
