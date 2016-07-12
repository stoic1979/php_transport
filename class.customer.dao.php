<?php
 /* DAO for customer */

include ("class.customer.vo.php");

class DAOcustomer { 

	/* gets a vo by cust_id */
	public function get($cust_id){
		/* ensure cust_id is an integer */
		if(!is_numeric($cust_id)) throw  new Exception("cust_id of customer must be an integer");

		$result=mysql_query("SELECT * FROM customer WHERE cust_id=$cust_id");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new customer($row['uid'],$row['name'],$row['firm_name'],$row['address'],$row['phone'],$row['email']);
				$vo->cust_id = $cust_id;
				return $vo;
			}
		}

		return NULL;
	}

	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM customer LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new customer($row['uid'],$row['name'],$row['firm_name'],$row['address'],$row['phone'],$row['email']);
				$vo->cust_id = $row['cust_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns all vo as per user */
	public function getAllByUser($uid, $limit1,$limit2){
		$result=mysql_query("SELECT * FROM customer where uid=$uid LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new customer($row['uid'],$row['name'],$row['firm_name'],$row['address'],$row['phone'],$row['email']);
				$vo->cust_id = $row['cust_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from customer"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO customer(cust_id,uid,name,firm_name,address,phone,email) VALUES(' ', '$vo->uid','$vo->name','$vo->firm_name','$vo->address','$vo->phone','$vo->email')")){
			$result = mysql_query("Select MAX(cust_id) from customer");
			if($row = mysql_fetch_array($result)){
				$vo->cust_id=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE customer SET uid = '$vo->uid',name = '$vo->name',firm_name = '$vo->firm_name',address = '$vo->address',phone = '$vo->phone',email = '$vo->email' WHERE cust_id = $vo->cust_id ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->cust_id == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM customer WHERE cust_id=$vo->cust_id")) {
			$vo->cust_id=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(cust_id) from customer");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

	public function getCustomers($uid){
		$result=mysql_query("SELECT * FROM customer where uid=$uid" );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new customer($row['uid'],$row['name'],$row['firm_name'],$row['address'],$row['phone'],$row['email']);
				$vo->cust_id = $row['cust_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}


 }
/* DAOcustomer */
?>
