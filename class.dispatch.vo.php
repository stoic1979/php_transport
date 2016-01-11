<?php
 /* add weavebytes header here */ 

 /* VO for dispatch */

/* value object to represent dispatch */ 
class dispatch { 

	var $did, $uid, $carrier,$pickup_num, $pieces, $space, $act_wgt, $as_wgt, $type, $attention ,$reference ,$trailer_id , $truck_id , $pay_code , $rate ,$total , $creation_date , $pallets ,$temp , $miles , $load_num , $load_terms , $advance , $bill_to , $from_address ,$to_address;

	/* constructor */ 
	public function __construct($uid, $creation_date, $carrier, $pieces, $space, $act_wgt, $as_wgt, $type, $attention ,$reference ,$trailer_id , $truck_id , $pay_code ,$pay_type , $rate ,$total ,$pallets , $temp , $miles , $load_num , $load_terms , $advance , $bill_to , $from_address , $to_address , $pickup_num) { 
		$this->uid = $uid;
		$this->creation_date = $creation_date;
		$this->carrier = $carrier;
		$this->pickup_num = $pickup_num;
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
		$this->pallets = $pallets;
		$this->temp = $temp;
		$this->miles = $miles;
		$this->load_num = $load_num;
		$this->load_terms = $load_terms;
		$this->advance = $advance;
		$this->bill_to = $bill_to;
		$this->from_address = $from_address;
		$this->to_address = $to_address;
		$this->did = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid"=>$this->uid,
			"creation_date"=>$this->creation_date,
			"carrier"=>$this->carrier,
			"pickup_num"=>$this->pickup_num,
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
			"pallets"=>$this->pallets,
			"temp"=>$this->temp,
			"miles"=>$this->miles,
			"load_num"=>$this->load_num,
			"load_terms"=>$this->load_terms,
			"advance"=>$this->advance,
			"bill_to"=>$this->bill_to,
			"from_address"=>$this->from_address,
			"to_address"=>$this->to_address,
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
				echo "<tr><td>creation_date</td><td>$this->creation_date</td></tr>";
				echo "<tr><td>carrier</td><td>$this->carrier</td></tr>";
				echo "<tr><td>pickup_num</td><td>$this->pickup_num</td></tr>";
				echo "<tr><td>pieces</td><td>$this->pieces</td></tr>";
				echo "<tr><td>space</td><td>$this->space</td></tr>";
				echo "<tr><td>act_wgt</td><td>$this->act_wgt</td></tr>";
				echo "<tr><td>as_wgt</td><td>$this->as_wgt</td></tr>";
				echo "<tr><td>type</td><td>$this->type</td></tr>";
				echo "<tr><td>pallets</td><td>$this->pallets</td></tr>";
				echo "<tr><td>temp</td><td>$this->temp</td></tr>";
				echo "<tr><td>miles</td><td>$this->miles</td></tr>";
				echo "<tr><td>load_num</td><td>$this->load_num</td></tr>";
				echo "<tr><td>load_terms</td><td>$this->load_terms</td></tr>";
				echo "<tr><td>attention</td><td>$this->attention</td></tr>";
				echo "<tr><td>reference</td><td>$this->reference</td></tr>";
				echo "<tr><td>trailer_id</td><td>$this->trailer_id</td></tr>";
				echo "<tr><td>truck_id</td><td>$this->truck_id</td></tr>";
				echo "<tr><td>pay_code</td><td>$this->pay_code</td></tr>";
				echo "<tr><td>pay_type</td><td>$this->pay_type</td></tr>";
				echo "<tr><td>rate</td><td>$this->rate</td></tr>";
				echo "<tr><td>total</td><td>$this->total</td></tr>";
				echo "<tr><td>advance</td><td>$this->advance</td></tr>";
				echo "<tr><td>bill_to</td><td>$this->bill_to</td></tr>";
				echo "<tr><td>from_address</td><td>$this->from_address</td></tr>";
				echo "<tr><td>to_address</td><td>$this->to_address</td></tr>";
		echo "</table>";
	} 

 }
/* dispatch */
?>
