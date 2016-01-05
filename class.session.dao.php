<?php
 /* DAO for company */

include ("class.session.vo.php");

class DAOsession { 

	/* gets a uid by session_id */
	public function get($session_code){

		$result=mysql_query("SELECT uid,end_time FROM session WHERE session_code=$session_code");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				return $row;
			}
		}

		return NULL;
	}

	

	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from session"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		$q = "INSERT INTO session(session_id,uid,start_time,end_time,session_code) VALUES(' ', '$vo->uid','$vo->start_time','$vo->end_time','$vo->session_code')";
		 if(mysql_query($q)){
			$result = mysql_query("Select MAX(session_id) from session");
			if($row = mysql_fetch_array($result)){
				$vo->session_id=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE session SET uid = '$vo->uid',start_time = '$vo->start_time',end_time = '$vo->end_time',session_code = '$vo->session_code' WHERE session_id = $vo->session_id ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->session_id == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}


	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(session_id) from session");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

 }
/* DAOsession */
?>
