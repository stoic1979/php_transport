<?php
include("db.php");
include("class.truck.dao.php");
$dao = new DAOtruck();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: truck.php");
?>
