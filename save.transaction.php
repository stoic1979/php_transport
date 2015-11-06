<?php
include("db.php");
include("class.transaction.dao.php");
$dao = new DAOtransaction();
$vo = new transaction($_POST["uid"],$_POST["title"],$_POST["date"],$_POST["type"],$_POST["info"],$_POST["amount"],$_POST["sender"],$_POST["receiver"],$_POST["description"],$_POST["is_paid"]);
if(isset($_POST["tid"])){
	$vo->tid = $_POST["tid"];
}
$dao->save($vo);
header("Location: transaction.php");
?>
