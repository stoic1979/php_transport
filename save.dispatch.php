<?php
session_start();
include("db.php");
include("class.dispatch.dao.php");
$dao = new DAOdispatch();
$vo = new dispatch($_SESSION["uid"],$_POST["carrier"],$_POST["phone"],$_POST["pieces"],$_POST["space"],$_POST["act_wgt"],$_POST["as_wgt"],$_POST["type"],$_POST["attention"],$_POST["reference"],$_POST["trailer_id"],$_POST["truck_id"],$_POST["pay_code"],$_POST["pay_type"],$_POST["rate"],$_POST["total"]);

if(isset($_POST["did"])){
	$vo->did = $_POST["did"];
}
$dao->save($vo);

header("Location: dispatch.php");
?>