<?php
include("db.php");
include("class.driver.dao.php");
$dao = new DAOdriver();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: driver.php");
?>
