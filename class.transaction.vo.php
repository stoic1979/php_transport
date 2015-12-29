<?php
 /* add weavebytes header here */ 

 /* VO for transaction */

/* value object to represent transaction */ 
class transaction { 

	var $tid, $uid, $title, $date, $type, $info, $amount, $sender, $receiver, $description, $is_paid;

	/* constructor */ 
	public function __construct($uid, $title, $date, $type, $info, $amount, $sender, $receiver, $description, $is_paid) { 
		$this->uid = $uid;
		$this->title = $title;
		$this->date = $date;
		$this->type = $type;
		$this->info = $info;
		$this->amount = $amount;
		$this->sender = $sender;
		$this->receiver = $receiver;
		$this->description = $description;
		$this->is_paid = $is_paid;
		$this->tid = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid" => $this->uid,
			"title" => $this->title,
			"date" => $this->date,
			"type" => $this->type,
			"info" => $this->info,
			"amount" => $this->amount,
			"sender" => $this->sender,
			"receiver" => $this->receiver,
			"description" => $this->description,
			"is_paid" => $this->is_paid);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of transaction object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>tid</td><td>$this->tid</td></tr>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>title</td><td>$this->title</td></tr>";
				echo "<tr><td>date</td><td>$this->date</td></tr>";
				echo "<tr><td>type</td><td>$this->type</td></tr>";
				echo "<tr><td>info</td><td>$this->info</td></tr>";
				echo "<tr><td>amount</td><td>$this->amount</td></tr>";
				echo "<tr><td>sender</td><td>$this->sender</td></tr>";
				echo "<tr><td>receiver</td><td>$this->receiver</td></tr>";
				echo "<tr><td>description</td><td>$this->description</td></tr>";
				echo "<tr><td>is_paid</td><td>$this->is_paid</td></tr>";
		echo "</table>";
	} 

 }
/* transaction */
?>
