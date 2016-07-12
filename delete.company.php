<?php
include("db.php");
include("class.company.dao.php");
$dao = new DAOcompany();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: company.php");
?>
