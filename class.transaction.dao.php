<?php
 /* DAO for transaction */

include ("class.transaction.vo.php");

class DAOtransaction { 

	/* gets a vo by tid */
	public function get($tid){
		/* ensure tid is an integer */
		if(!is_numeric($tid)) throw  new Exception("tid of transaction must be an integer");

		$result=mysql_query("SELECT * FROM transaction WHERE tid=$tid");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new transaction($row['uid'],$row['title'],$row['date'],$row['type'],$row['info'],$row['amount'],$row['sender'],$row['receiver'],$row['description'],$row['is_paid']);
				$vo->tid = $tid;
				return $vo;
			}
		}

		return NULL;
	}

	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM transaction LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new transaction($row['uid'],$row['title'],$row['date'],$row['type'],$row['info'],$row['amount'],$row['sender'],$row['receiver'],$row['description'],$row['is_paid']);
				$vo->tid = $row['tid'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

/* returns all vo by user*/
	public function getAllByUser($uid,$limit1,$limit2){
		$result=mysql_query("SELECT * FROM transaction LIMIT where uid=$uid " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new transaction($row['uid'],$row['title'],$row['date'],$row['type'],$row['info'],$row['amount'],$row['sender'],$row['receiver'],$row['description'],$row['is_paid']);
				$vo->tid = $row['tid'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}
	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from transaction"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO transaction(tid,uid,title,date,type,info,amount,sender,receiver,description,is_paid) VALUES(' ', '$vo->uid','$vo->title','$vo->date','$vo->type','$vo->info','$vo->amount','$vo->sender','$vo->receiver','$vo->description','$vo->is_paid')")){
			$result = mysql_query("Select MAX(tid) from transaction");
			if($row = mysql_fetch_array($result)){
				$vo->tid=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE transaction SET uid = '$vo->uid',title = '$vo->title',date = '$vo->date',type = '$vo->type',info = '$vo->info',amount = '$vo->amount',sender = '$vo->sender',receiver = '$vo->receiver',description = '$vo->description',is_paid = '$vo->is_paid' WHERE tid = $vo->tid ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->tid == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM transaction WHERE tid=$vo->tid")) {
			$vo->tid=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(tid) from transaction");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

 }
/* DAOtransaction */
?>
