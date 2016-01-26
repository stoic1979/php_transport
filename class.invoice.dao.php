<?php
 /* DAO for invoice */

include ("class.invoice.vo.php");

class DAOinvoice { 

	/* gets a vo by inv_num */
	public function get($inv_num){
		/* ensure inv_num is an integer */
		if(!is_numeric($inv_num)) throw  new Exception("inv_num of invoice must be an integer");

		$result=mysql_query("SELECT * FROM invoice WHERE inv_num=$inv_num");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new invoice($row['uid'],$row['customer'],$row['total_amt'],$row['balance_due'],$row['inv_date'],$row['paid_date']);
				$vo->inv_num = $inv_num;
				return $vo;
			}
		}

		return NULL;
	}

	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM invoice LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new invoice($row['uid'],$row['customer'],$row['total_amt'],$row['balance_due'],$row['inv_date'],$row['paid_date']);
				$vo->inv_num = $row['inv_num'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns all vo as per user */
	public function getAllByUser($uid, $limit1,$limit2){
		$result=mysql_query("SELECT * FROM invoice where uid=$uid LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new invoice($row['uid'],$row['customer'],$row['total_amt'],$row['balance_due'],$row['inv_date'],$row['paid_date']);
				$vo->inv_num = $row['inv_num'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from invoice"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO invoice(inv_num,uid,customer,total_amt,balance_due,inv_date,paid_date) VALUES(' ', '$vo->uid','$vo->customer','$vo->total_amt','$vo->balance_due','$vo->inv_date','$vo->paid_date')")){
			$result = mysql_query("Select MAX(inv_num) from invoice");
			if($row = mysql_fetch_array($result)){
				$vo->inv_num=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE invoice SET uid = '$vo->uid',customer = '$vo->customer',total_amt = '$vo->total_amt',balance_due = '$vo->balance_due',inv_date = '$vo->inv_date',paid_date = '$vo->paid_date' WHERE inv_num = $vo->inv_num ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->inv_num == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM invoice WHERE inv_num=$vo->inv_num")) {
			$vo->cust_id=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(inv_num) from invoice");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

	public function getInvoices($uid){
		$result=mysql_query("SELECT * FROM invoice where uid=$uid" );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new invoice($row['uid'],$row['customer'],$row['total_amt'],$row['balance_due'],$row['inv_date'],$row['paid_date']);
				$vo->inv_num = $row['inv_num'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

 }
/* DAOinvoice */
?>
