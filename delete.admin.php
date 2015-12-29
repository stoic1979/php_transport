<?php
include("db.php");
include("class.admin.dao.php");
$dao = new DAOadmin();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: admin.php");
?>
