<?php
session_start();
include("db.php");
include("class.invoice.dao.php");


$dao = new DAOinvoice();
$vo = new invoice($_SESSION["uid"],$_POST["customer"],$_POST["total_amt"],$_POST["balance_due"],$_POST["inv_date"],$_POST["paid_date"]);

if(isset($_POST["inv_num"])){
	$vo->inv_num = $_POST["inv_num"];
}
$dao->save($vo);

header("Location: invoice.php");
?>