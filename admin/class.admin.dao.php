<?php
 /* DAO for admin */

include ("class.admin.vo.php");

class DAOadmin { 

	/* gets a vo by aid */
	public function get($aid){
		/* ensure aid is an integer */
		if(!is_numeric($aid)) throw  new Exception("aid of admin must be an integer");

		$result=mysql_query("SELECT * FROM admin WHERE aid=$aid");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new admin($row['username'],$row['password']);
				$vo->aid = $aid;
				return $vo;
			}
		}

		return NULL;
	}

	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM admin LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new admin($row['username'],$row['password']);
				$vo->aid = $row['aid'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from admin"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO admin(aid,username,password) VALUES(' ', '$vo->username','$vo->password')")){
			$result = mysql_query("Select MAX(aid) from admin");
			if($row = mysql_fetch_array($result)){
				$vo->aid=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE admin SET username = '$vo->username',password = '$vo->password' WHERE aid = $vo->aid ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->aid == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM admin WHERE aid=$vo->aid")) {
			$vo->aid=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(aid) from admin");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

 }
/* DAOadmin */
?>
