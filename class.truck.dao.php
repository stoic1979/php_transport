<?php
 /* DAO for truck */

include ("class.truck.vo.php");

class DAOtruck { 

	/* gets a vo by truck_id */
	public function get($truck_id){
		/* ensure truck_id is an integer */
		if(!is_numeric($truck_id)) throw  new Exception("truck_id of truck must be an integer");

		$result=mysql_query("SELECT * FROM truck WHERE truck_id=$truck_id");
		if($result){/*ensure query success*/
			if($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new truck($row['uid'],$row['make'],$row['yr_model'],$row['yr_first_sold'],$row['vlf_class'],$row['type_veh'],$row['type_lic'],$row['license_num'],$row['body_type_model'],$row['mp'],$row['mo'],$row['ax'],$row['wc'],$row['unladen_g_cgw'],$row['vehicle_id_num'],$row['type_vehicle_use'],$row['date_issued'],$row['cc_alco'],$row['dt_fee_recvd'],$row['pic'],$row['registered_owner'],$row['amount_due'],$row['amount_recvd'],$row['amount_paid']);
				$vo->truck_id = $truck_id;
				return $vo;
			}
		}

		return NULL;
	}

	/* returns all vo */
	public function getAll($limit1,$limit2){
		$result=mysql_query("SELECT * FROM truck LIMIT " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new truck($row['uid'],$row['make'],$row['yr_model'],$row['yr_first_sold'],$row['vlf_class'],$row['type_veh'],$row['type_lic'],$row['license_num'],$row['body_type_model'],$row['mp'],$row['mo'],$row['ax'],$row['wc'],$row['unladen_g_cgw'],$row['vehicle_id_num'],$row['type_vehicle_use'],$row['date_issued'],$row['cc_alco'],$row['dt_fee_recvd'],$row['pic'],$row['registered_owner'],$row['amount_due'],$row['amount_recvd'],$row['amount_paid']);
				$vo->truck_id = $row['truck_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

    /* returns all vo by user */
	public function getAllByUser($uid,$limit1,$limit2){
		$result=mysql_query("SELECT * FROM truck where uid=$uid LIMIT  " . $limit1 . "," . $limit2 );
		if($result){/*ensure query success*/
			$vlist = array();
			while($row = mysql_fetch_array($result)){/*ensure record*/
				$vo = new truck($row['uid'],$row['make'],$row['yr_model'],$row['yr_first_sold'],$row['vlf_class'],$row['type_veh'],$row['type_lic'],$row['license_num'],$row['body_type_model'],$row['mp'],$row['mo'],$row['ax'],$row['wc'],$row['unladen_g_cgw'],$row['vehicle_id_num'],$row['type_vehicle_use'],$row['date_issued'],$row['cc_alco'],$row['dt_fee_recvd'],$row['pic'],$row['registered_owner'],$row['amount_due'],$row['amount_recvd'],$row['amount_paid']);
				$vo->truck_id = $row['truck_id'];
				$vlist[] = $vo;
			}
			return $vlist;
		}

		return NULL;
	}

	/* returns number of vo */
	public function getCount(){
		$result = mysql_num_rows(mysql_query("select * from truck"));
		return $result;
	}

	/* insert new record in db */
	public function insert(&$vo){
		 if(mysql_query("INSERT INTO truck(truck_id,uid,make,yr_model,yr_first_sold,vlf_class,type_veh,type_lic,license_num,body_type_model,mp,mo,ax,wc,unladen_g_cgw,vehicle_id_num,type_vehicle_use,date_issued,cc_alco,dt_fee_recvd,pic,registered_owner,amount_due,amount_recvd,amount_paid) VALUES(' ', '$vo->uid','$vo->make','$vo->yr_model','$vo->yr_first_sold','$vo->vlf_class','$vo->type_veh','$vo->type_lic','$vo->license_num','$vo->body_type_model','$vo->mp','$vo->mo','$vo->ax','$vo->wc','$vo->unladen_g_cgw','$vo->vehicle_id_num','$vo->type_vehicle_use','$vo->date_issued','$vo->cc_alco','$vo->dt_fee_recvd','$vo->pic','$vo->registered_owner','$vo->amount_due','$vo->amount_recvd','$vo->amount_paid')")){
			$result = mysql_query("Select MAX(truck_id) from truck");
			if($row = mysql_fetch_array($result)){
				$vo->truck_id=$row[0];
				return true;
			}
		}
		return false;
	}

	/* update an existing record in db */
	public function update(&$vo){
		return mysql_query("UPDATE truck SET uid = '$vo->uid',make = '$vo->make',yr_model = '$vo->yr_model',yr_first_sold = '$vo->yr_first_sold',vlf_class = '$vo->vlf_class',type_veh = '$vo->type_veh',type_lic = '$vo->type_lic',license_num = '$vo->license_num',body_type_model = '$vo->body_type_model',mp = '$vo->mp',mo = '$vo->mo',ax = '$vo->ax',wc = '$vo->wc',unladen_g_cgw = '$vo->unladen_g_cgw',vehicle_id_num = '$vo->vehicle_id_num',type_vehicle_use = '$vo->type_vehicle_use',date_issued = '$vo->date_issued',cc_alco = '$vo->cc_alco',dt_fee_recvd = '$vo->dt_fee_recvd',pic = '$vo->pic',registered_owner = '$vo->registered_owner',amount_due = '$vo->amount_due',amount_recvd = '$vo->amount_recvd',amount_paid = '$vo->amount_paid' WHERE truck_id = $vo->truck_id ");
	}

	/* save the value object in db */
	public function save(&$vo){
		if($vo->truck_id == 0){
			return $this->insert($vo);
		}
		return $this->update($vo);
	}

	/* delete an existing record from db */
	public function del(&$vo){
		if(mysql_query("DELETE FROM truck WHERE truck_id=$vo->truck_id")) {
			$vo->truck_id=0;
		}
	}

	/* gets max id from db */
	public function getMaxId(){
		$result = mysql_query("Select MAX(truck_id) from truck");
		if($row = mysql_fetch_array($result)){
			return $row[0];
		}
		return NULL;
	}

	/* get vehicle id num from db corresponding to the truck id */
	public function getVehicleId($uid,$t_av){
	
		$result = mysql_query("Select vehicle_id_num from truck where (uid = $uid) and (truck_available = $t_av)");
		
		if($result){
			$list = array();
			while($row = mysql_fetch_array($result))
			{
			   $list[] = $row['vehicle_id_num'];
			   
			}
		//echo join(', ', $row);
		return $list;
		}
	}

	public function setTruckAvailable($uid,$t_av,$v_num){
		
		return mysql_query("UPDATE truck SET truck_available = $t_av where (uid=$uid) and (vehicle_id_num=$v_num)");
	}

 }
/* DAOtruck */
?>
