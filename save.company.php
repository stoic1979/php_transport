<?php
session_start();
include("db.php");
include("class.company.dao.php");
$dao = new DAOcompany();
$vo = new company($_SESSION["uid"],$_POST["title"],$_POST["phone"],$_POST["city"],$_POST["state"],$_POST["pin_code"],$_POST["country"],$_POST["address"]);
if(isset($_POST["comp_id"])){
	$vo->comp_id = $_POST["comp_id"];
}
$dao->save($vo);
header("Location: company.php");
?>
