<?php
session_start();
include("db.php");
include("class.expense.dao.php");


$dao = new DAOexpense();
$vo = new expense($_SESSION["uid"],$_POST["expense_type"],$_POST["expense_date"],$_POST["category"],$_POST["truck_id"],$_POST["description"],$_POST["amount"]);

if(isset($_POST["expense_id"])){
	$vo->expense_id = $_POST["expense_id"];
}
$dao->save($vo);
if ($_POST["expense_type"] = Expense) {
	header("Location: expense.php?type=Expense");
}
else
{
	header("Location: maintenance.php?type=Maintenance");
}

?>