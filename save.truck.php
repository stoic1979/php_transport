<?php
include("db.php");
include("class.truck.dao.php");
$dao = new DAOtruck();
$vo = new truck($_POST["uid"],$_POST["make"],$_POST["yr_model"],$_POST["yr_first_sold"],$_POST["vlf_class"],$_POST["type_veh"],$_POST["type_lic"],$_POST["license_num"],$_POST["body_type_model"],$_POST["mp"],$_POST["mo"],$_POST["ax"],$_POST["wc"],$_POST["unladen_g_cgw"],$_POST["vehicle_id_num"],$_POST["type_vehicle_use"],$_POST["date_issued"],$_POST["cc_alco"],$_POST["dt_fee_recvd"],$_POST["pic"],$_POST["registered_owner"],$_POST["amount_due"],$_POST["amount_recvd"],$_POST["amount_paid"]);
if(isset($_POST["truck_id"])){
	$vo->truck_id = $_POST["truck_id"];
}
$dao->save($vo);
header("Location: truck.php");
?>
