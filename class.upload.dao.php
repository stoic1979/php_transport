<?php
 /* DAO for upload */

include ("class.upload.vo.php");

class DAOupload { 

	/* gets a vo by upload_id */
	public function get($upload_id){
		/* ensure upload_id is an integer */
		if(!is_numeric($upload_id)) throw  new Exception("upload_id of upload must be an integer");

		$result=mysql_query("SELECT * FROM upload WHERE upload_id=$upload_id");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new upload($row['uid'],$row['title'],$row['type'],$row['date'],$row['img']);
				$vo->upload_id = $upload_id;
				return $vo;
			}
		}

		return NULL;
	}

	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM upload LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new upload($row['uid'],$row['title'],$row['type'],$row['date'],$row['img']);
				$vo->upload_id = $row['upload_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

    /* returns all vo by user*/
	public function getAllByUser($uid,$limit1,$limit2){
		$result=mysql_query("SELECT * FROM upload where uid=$uid LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new upload($row['uid'],$row['title'],$row['type'],$row['date'],$row['img']);
				$vo->upload_id = $row['upload_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from upload"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO upload(upload_id,uid,title,type,date,img) VALUES(' ', '$vo->uid','$vo->title','$vo->type','$vo->date','$vo->img')")){
			$result = mysql_query("Select MAX(upload_id) from upload");
			if($row = mysql_fetch_array($result)){
				$vo->upload_id=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE upload SET uid = '$vo->uid',title = '$vo->title',type = '$vo->type',date = '$vo->date',img = '$vo->img' WHERE upload_id = $vo->upload_id ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->upload_id == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM upload WHERE upload_id=$vo->upload_id")) {
			$vo->upload_id=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(upload_id) from upload");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

 }
/* DAOupload */
?>
