<?php
 /* DAO for user */

include ("class.user.vo.php");

class DAOuser { 

	/* gets a vo by uid */
	public function get($uid){
		/* ensure uid is an integer */
		if(!is_numeric($uid)) throw  new Exception("uid of user must be an integer");

		$result=mysql_query("SELECT * FROM user WHERE uid=$uid");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new user($row['username'],$row['password'],$row['full_name'],$row['email'],$row['phone'],$row['address'],$row['creation_date'],$row['is_active']);
				$vo->uid = $uid;
				return $vo;
			}
		}

		return NULL;
	}

	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM user LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new user($row['username'],$row['password'],$row['full_name'],$row['email'],$row['phone'],$row['address'],$row['creation_date'],$row['is_active']);
				$vo->uid = $row['uid'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from user"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO user(uid,username,password,full_name,email,phone,address,creation_date,is_active) VALUES(' ', '$vo->username','$vo->password','$vo->full_name','$vo->email','$vo->phone','$vo->address','$vo->creation_date','$vo->is_active')")){
			$result = mysql_query("Select MAX(uid) from user");
			if($row = mysql_fetch_array($result)){
				$vo->uid=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE user SET username = '$vo->username',password = '$vo->password',full_name = '$vo->full_name',email = '$vo->email',phone = '$vo->phone',address = '$vo->address',creation_date = '$vo->creation_date',is_active = '$vo->is_active' WHERE uid = $vo->uid ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->uid == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM user WHERE uid=$vo->uid")) {
			$vo->uid=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(uid) from user");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

 }
/* DAOuser */
?>
