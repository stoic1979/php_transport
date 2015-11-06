<?php
include("db.php");
include("class.company.dao.php");
$dao = new DAOcompany();
$vo = new company($_POST["uid"],$_POST["title"],$_POST["phone"],$_POST["address"]);
if(isset($_POST["comp_id"])){
	$vo->comp_id = $_POST["comp_id"];
}
$dao->save($vo);
header("Location: company.php");
?>
