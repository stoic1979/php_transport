<?php
 /* DAO for company */

include ("class.company.vo.php");

class DAOcompany { 

	/* gets a vo by comp_id */
	public function get($comp_id){
		/* ensure comp_id is an integer */
		if(!is_numeric($comp_id)) throw  new Exception("comp_id of company must be an integer");

		$result=mysql_query("SELECT * FROM company WHERE comp_id=$comp_id");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new company($row['uid'],$row['title'],$row['phone'],$row['address']);
				$vo->comp_id = $comp_id;
				return $vo;
			}
		}

		return NULL;
	}

	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM company LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new company($row['uid'],$row['title'],$row['phone'],$row['address']);
				$vo->comp_id = $row['comp_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

		/* returns all vo */
	public function getAllByUser($uid, $limit1,$limit2){
		$result=mysql_query("SELECT * FROM company where uid=$uid LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new company($row['uid'],$row['title'],$row['phone'],$row['address']);
				$vo->comp_id = $row['comp_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from company"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO company(comp_id,uid,title,phone,address) VALUES(' ', '$vo->uid','$vo->title','$vo->phone','$vo->address')")){
			$result = mysql_query("Select MAX(comp_id) from company");
			if($row = mysql_fetch_array($result)){
				$vo->comp_id=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE company SET uid = '$vo->uid',title = '$vo->title',phone = '$vo->phone',address = '$vo->address' WHERE comp_id = $vo->comp_id ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->comp_id == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM company WHERE comp_id=$vo->comp_id")) {
			$vo->comp_id=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(comp_id) from company");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

 }
/* DAOcompany */
?>
