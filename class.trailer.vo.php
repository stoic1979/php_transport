<?php
 /* add weavebytes header here */ 

 /* VO for trailer */

/* value object to represent trailer */ 
class trailer { 

	var $trailer_id, $uid, $make, $yr_model, $yr_first_sold, $vlf_class, $type_veh, $type_lic, $license_num, $body_type_model, $mp, $mo, $ax, $wc, $unladen_g_cgw, $vehicle_id_num, $type_vehicle_use, $date_issued, $cc_alco, $dt_fee_recvd, $pic, $registered_owner, $amount_due, $amount_recvd, $amount_paid ,$trailer_available;

	/* constructor */ 
	public function __construct($uid, $make, $yr_model, $yr_first_sold, $vlf_class, $type_veh, $type_lic, $license_num, $body_type_model, $mp, $mo, $ax, $wc, $unladen_g_cgw, $vehicle_id_num, $type_vehicle_use, $date_issued, $cc_alco, $dt_fee_recvd, $pic, $registered_owner, $amount_due, $amount_recvd, $amount_paid) { 
		$this->uid = $uid;
		$this->make = $make;
		$this->yr_model = $yr_model;
		$this->yr_first_sold = $yr_first_sold;
		$this->vlf_class = $vlf_class;
		$this->type_veh = $type_veh;
		$this->type_lic = $type_lic;
		$this->license_num = $license_num;
		$this->body_type_model = $body_type_model;
		$this->mp = $mp;
		$this->mo = $mo;
		$this->ax = $ax;
		$this->wc = $wc;
		$this->unladen_g_cgw = $unladen_g_cgw;
		$this->vehicle_id_num = $vehicle_id_num;
		$this->type_vehicle_use = $type_vehicle_use;
		$this->date_issued = $date_issued;
		$this->cc_alco = $cc_alco;
		$this->dt_fee_recvd = $dt_fee_recvd;
		$this->pic = $pic;
		$this->registered_owner = $registered_owner;
		$this->amount_due = $amount_due;
		$this->amount_recvd = $amount_recvd;
		$this->amount_paid = $amount_paid;
		$this->trailer_available = 1;
		$this->trailer_id = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid" => $this->uid,
			"make" => $this->make,
			"yr_model" => $this->yr_model,
			"yr_first_sold" => $this->yr_first_sold,
			"vlf_class" => $this->vlf_class,
			"type_veh" => $this->type_veh,
			"type_lic" => $this->type_lic,
			"license_num" => $this->license_num,
			"body_type_model" => $this->body_type_model,
			"mp" => $this->mp,
			"mo" => $this->mo,
			"ax" => $this->ax,
			"wc" => $this->wc,
			"unladen_g_cgw" => $this->unladen_g_cgw,
			"vehicle_id_num" => $this->vehicle_id_num,
			"type_vehicle_use" => $this->type_vehicle_use,
			"date_issued" => $this->date_issued,
			"cc_alco" => $this->cc_alco,
			"dt_fee_recvd" => $this->dt_fee_recvd,
			"pic" => $this->pic,
			"registered_owner" => $this->registered_owner,
			"amount_due" => $this->amount_due,
			"amount_recvd" => $this->amount_recvd,
			"trailer_available" => $this->trailer_available,
			"amount_paid" => $this->amount_paid);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of trailer object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>trailer_id</td><td>$this->trailer_id</td></tr>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>make</td><td>$this->make</td></tr>";
				echo "<tr><td>yr_model</td><td>$this->yr_model</td></tr>";
				echo "<tr><td>yr_first_sold</td><td>$this->yr_first_sold</td></tr>";
				echo "<tr><td>vlf_class</td><td>$this->vlf_class</td></tr>";
				echo "<tr><td>type_veh</td><td>$this->type_veh</td></tr>";
				echo "<tr><td>type_lic</td><td>$this->type_lic</td></tr>";
				echo "<tr><td>license_num</td><td>$this->license_num</td></tr>";
				echo "<tr><td>body_type_model</td><td>$this->body_type_model</td></tr>";
				echo "<tr><td>mp</td><td>$this->mp</td></tr>";
				echo "<tr><td>mo</td><td>$this->mo</td></tr>";
				echo "<tr><td>ax</td><td>$this->ax</td></tr>";
				echo "<tr><td>wc</td><td>$this->wc</td></tr>";
				echo "<tr><td>unladen_g_cgw</td><td>$this->unladen_g_cgw</td></tr>";
				echo "<tr><td>vehicle_id_num</td><td>$this->vehicle_id_num</td></tr>";
				echo "<tr><td>type_vehicle_use</td><td>$this->type_vehicle_use</td></tr>";
				echo "<tr><td>date_issued</td><td>$this->date_issued</td></tr>";
				echo "<tr><td>cc_alco</td><td>$this->cc_alco</td></tr>";
				echo "<tr><td>dt_fee_recvd</td><td>$this->dt_fee_recvd</td></tr>";
				echo "<tr><td>pic</td><td>$this->pic</td></tr>";
				echo "<tr><td>registered_owner</td><td>$this->registered_owner</td></tr>";
				echo "<tr><td>amount_due</td><td>$this->amount_due</td></tr>";
				echo "<tr><td>amount_recvd</td><td>$this->amount_recvd</td></tr>";
				echo "<tr><td>trailer_available</td><td>$this->trailer_available</td></tr>";
				echo "<tr><td>amount_paid</td><td>$this->amount_paid</td></tr>";
		echo "</table>";
	} 

 }
/* trailer */
?>
