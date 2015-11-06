<?php
include("db.php");
include("class.customer.dao.php");
$dao = new DAOcustomer();
if(isset($_GET["id"])){
	$vo = $dao->get($_GET["id"]);
	$dao->del($vo);
}
header("Location: customer.php");
?>
