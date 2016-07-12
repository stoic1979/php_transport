<?php
 /* DAO for driver */

include ("class.driver.vo.php");

class DAOdriver { 

	/* gets a vo by did */
	public function get($did){
		/* ensure did is an integer */
		if(!is_numeric($did)) throw  new Exception("did of driver must be an integer");

		$result=mysql_query("SELECT * FROM driver WHERE did=$did");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new driver($row['uid'],$row['name'],$row['photo'],$row['address'],$row['email'],$row['phone'],$row['social_security_no'],$row['license_num'],$row['expiry_date']);
				$vo->did = $did;
				return $vo;
			}
		}

		return NULL;
	}


	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM driver LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new driver($row['uid'],$row['name'],$row['photo'],$row['address'],$row['email'],$row['phone'],$row['social_security_no'],$row['license_num'],$row['expiry_date']);
				$vo->did = $row['did'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

/* returns all vo  by user*/
	public function getAllByUser($uid,$limit1,$limit2){
		$result=mysql_query("SELECT * FROM driver where uid=$uid LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new driver($row['uid'],$row['name'],$row['photo'],$row['address'],$row['email'],$row['phone'],$row['social_security_no'],$row['license_num'],$row['expiry_date']);
				$vo->did = $row['did'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}
	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from driver"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO driver(did,uid,name,photo,address,email,phone,social_security_no,license_num,expiry_date) VALUES(' ', '$vo->uid','$vo->name','$vo->photo','$vo->address','$vo->email','$vo->phone','$vo->social_security_no','$vo->license_num','$vo->expiry_date')")){
			$result = mysql_query("Select MAX(did) from driver");
			if($row = mysql_fetch_array($result)){
				$vo->did=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE driver SET uid = '$vo->uid',name = '$vo->name',photo = '$vo->photo',address = '$vo->address',email = '$vo->email',phone = '$vo->phone',social_security_no = '$vo->social_security_no',license_num = '$vo->license_num',expiry_date = '$vo->expiry_date' WHERE did = $vo->did ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->did == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM driver WHERE did=$vo->did")) {
			$vo->did=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(did) from driver");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

	/* get driver name and expiry date */
	public function getDrivers($uid){
		$result=mysql_query("SELECT * FROM driver where uid=$uid");
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new driver($row['uid'],$row['name'],$row['photo'],$row['address'],$row['email'],$row['phone'],$row['social_security_no'],$row['license_num'],$row['expiry_date']);
				$vo->did = $row['did'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;

	}

 }
/* DAOdriver */
?>
