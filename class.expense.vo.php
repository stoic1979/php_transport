
<?php
/* add weavebytes header here */ 

 /* VO for expense */

/* value object to represent expense */ 
class expense { 

	var $uid ,$expense_type ,$expense_date, $category, $truck_id, $description, $amount;

	/* constructor */ 
	public function __construct($uid ,$expense_type ,$expense_date, $category, $truck_id, $description, $amount) { 
		$this->uid = $uid;
		$this->expense_type = $expense_type;
		$this->expense_date = $expense_date;
		$this->category = $category;
		$this->truck_id = $truck_id;
		$this->description = $description;
		$this->amount = $amount;
		$this->expense_id = 0;
	} 
 
	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid" => $this->uid,
			"expense_type" => $this->expense_type,
			"expense_date" => $this->expense_date,
			"category" => $this->category,
			"truck_id" => $this->truck_id,
			"description" => $this->description,
			"amount" => $this->amount
			);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of expense object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>expense_type</td><td>$this->expense_type</td></tr>";
				echo "<tr><td>expense_date</td><td>$this->expense_date</td></tr>";
				echo "<tr><td>category</td><td>$this->category</td></tr>";
				echo "<tr><td>truck_id</td><td>$this->truck_id</td></tr>";
				echo "<tr><td>description</td><td>$this->description</td></tr>";
				echo "<tr><td>amount</td><td>$this->amount</td></tr>";
		echo "</table>";
	} 

 }
/* expense */






?>