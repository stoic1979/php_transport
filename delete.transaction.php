<?php
include("db.php");
include("class.transaction.dao.php");
$dao = new DAOtransaction();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: transaction.php");
?>
