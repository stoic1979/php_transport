<?php
 /* DAO for expense */

include ("class.expense.vo.php");

class DAOexpense { 

	/* gets a vo by expense_id */
	public function get($expense_id){
		/* ensure expense_id is an integer */
		if(!is_numeric($expense_id)) throw  new Exception("expense_id of invoice must be an integer");

		$result=mysql_query("SELECT * FROM expense WHERE expense_id=$expense_id");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new expense($row['uid'],$row['expense_type'],$row['expense_date'],$row['category'],$row['truck_id'],$row['description'],$row['amount']);
				$vo->expense_id = $expense_id;
				return $vo;
			}
		}

		return NULL;
	}

	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM expense LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new expense($row['uid'],$row['expense_type'],$row['expense_date'],$row['category'],$row['truck_id'],$row['description'],$row['amount']);
				$vo->expense_id = $row['expense_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns all vo as per user */
	public function getAllByUser($uid,$expense_type,$limit1,$limit2){
		$q = "SELECT * FROM expense where (uid=$uid) and (expense_type='$expense_type') LIMIT " . $limit1 . "," . $limit2;
		 //echo $q;
		$result=mysql_query("SELECT * FROM expense where (uid=$uid) and (expense_type='$expense_type') LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				//echo join(', ', $row);
				$vo = new expense($row['uid'],$row['expense_type'],$row['expense_date'],$row['category'],$row['truck_id'],$row['description'],$row['amount']);
				$vo->expense_id = $row['expense_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from expense"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO expense(expense_id,uid,expense_type,expense_date,category,truck_id,description,amount) VALUES(' ', '$vo->uid','$vo->expense_type','$vo->expense_date','$vo->category','$vo->truck_id','$vo->description','$vo->amount')")){
			$result = mysql_query("Select MAX(expense_id) from expense");
			if($row = mysql_fetch_array($result)){
				$vo->expense_id=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE expense SET uid = '$vo->uid',expense_type = '$vo->expense_type',expense_date = '$vo->expense_date',category = '$vo->category',truck_id = '$vo->truck_id',description = '$vo->description',amount = '$vo->amount' WHERE expense_id = $vo->expense_id ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->expense_id == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM expense WHERE expense_id=$vo->expense_id")) {
			$vo->cust_id=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(expense_id) from expense");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

 }
/* DAOexpense */
?>
