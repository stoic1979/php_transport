<?php
include("db.php");
include("class.dispatch.dao.php");
$dao = new DAOdispatch();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: dispatch.php");
?>
