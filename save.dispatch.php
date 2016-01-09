<?php
session_start();
include("db.php");
include("class.dispatch.dao.php");
include("class.truck.dao.php");
include("class.trailer.dao.php");
$daoTruck = new DAOtruck();
$daoTruck->setTruckAvailable($_SESSION["uid"],0,$_POST["truck_id"]);
$daoTrailer = new DAOTrailer();
$daoTrailer->setTrailerAvailable($_SESSION["uid"],0,$_POST["trailer_id"]);
$dao = new DAOdispatch();
$creation_date = date('d/m/Y');
//echo $creation_date;
$vo = new dispatch($_SESSION["uid"],$creation_date,$_POST["carrier"],$_POST["pieces"],$_POST["space"],$_POST["act_wgt"],$_POST["as_wgt"],$_POST["type"],$_POST["attention"],$_POST["reference"],$_POST["trailer_id"],$_POST["truck_id"],$_POST["pay_code"],$_POST["pay_type"],$_POST["rate"],$_POST["total"],$_POST["pallets"],$_POST["temp"],$_POST["miles"],$_POST["load_num"],$_POST["load_terms"],$_POST["advance"],$_POST["bill_to"],$_POST["from_address"],$_POST["to_address"]);

if(isset($_POST["did"])){
	$vo->did = $_POST["did"];
}
$dao->save($vo);

header("Location: dispatch.php");
?>