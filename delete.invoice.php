<?php
include("db.php");
include("class.invoice.dao.php");


$dao = new DAOinvoice();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}

header("Location: invoice.php");
?>
