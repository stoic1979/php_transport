<?php
 /* add weavebytes header here */ 

 /* VO for upload */

/* value object to represent upload */ 
class upload { 

	var $upload_id, $uid, $title, $type, $date, $img;

	/* constructor */ 
	public function __construct($uid, $title, $type, $date, $img) { 
		$this->uid = $uid;
		$this->title = $title;
		$this->type = $type;
		$this->date = $date;
		$this->img = $img;
		$this->upload_id = 0;
	} 

	/* returns json for the vo */
	public function toJSON(){
		$a = array(
			"uid" => $this->uid,
			"title" => $this->title,
			"type" => $this->type,
			"date" => $this->date,
			"img" => $this->img);
		return json_encode($a);
	}

	/* returns xml for the vo */
	public function toXML(){
		//todo
	}

	/* convenience funciton to view contents of upload object */ 
	public function show() { 
		echo "<table>";
				echo "<tr><td>upload_id</td><td>$this->upload_id</td></tr>";
				echo "<tr><td>uid</td><td>$this->uid</td></tr>";
				echo "<tr><td>title</td><td>$this->title</td></tr>";
				echo "<tr><td>type</td><td>$this->type</td></tr>";
				echo "<tr><td>date</td><td>$this->date</td></tr>";
				echo "<tr><td>img</td><td>$this->img</td></tr>";
		echo "</table>";
	} 

 }
/* upload */
?>
